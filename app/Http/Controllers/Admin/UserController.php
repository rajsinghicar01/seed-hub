<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Designation;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;
use Auth;
use Session;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        if ($request->ajax()) {

            // $users = User::with('roles')->get();
            $users = User::whereDoesntHave(
                'roles',
                function ($q) {
                    $q->where('name', 'Admin');
                }
            )->get();
                
            return Datatables::of($users)
                    ->addIndexColumn()
                    ->addColumn('avatar', function ($row) {
                        // if(!empty($row->avatar)){
                        //     return '<img src="'.asset('storage/profiles/' . $row->avatar).'" class="img-circle" style="width: 30px;">';
                        // }else{
                        //     return '<img src="'.asset('storage/profiles/avatar.png').'" class="img-circle" style="width: 30px;">';
                        // } 

                        if(!empty($row->avatar)){
                            if(str_contains($row->avatar, 'https')){
                                return '<img src="'.$row->avatar.'" class="img-circle" style="width: 30px;">';
                            }else{
                                return '<img src="'.asset('storage/profiles/' . $row->avatar).'" class="img-circle" style="width: 30px;">';
                            }
                        }else{
                            return '<img src="'.asset('storage/profiles/avatar.png').'" class="img-circle" style="width: 30px;">';
                        }
                    })
                    
                    ->addColumn('status', function ($row) {
                        if($row->status){
                            return '<label class="badge bg-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Active</label> ';
                        }else{
                            return '<label class="badge bg-danger"><i class="fa fa-ban" aria-hidden="true"></i> Inactive</label>';
                        } 
                    })
                    ->addColumn('roles', function ($row) {
                        if(!empty($row->getRoleNames())){
                            $roles = '';
                            foreach($row->getRoleNames() as $v){
                                $roles .= '<label class="badge bg-primary">'.$v.'</label> ';          
                            }
                            return $roles;
                        }
                    })
                    ->addColumn('action', function ($row) {
                        $actionBtn = '<div style="display:flex">';
                        if( Auth::user()->hasPermissionTo('user-list') ) {
                            $actionBtn .= '<a href="'.route('users.show',$row->id).'"  title="View" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-eye"></i></a>';
                        }
                        if( Auth::user()->hasPermissionTo('user-edit') ) {
                            $actionBtn .= '<a href="'.route('users.edit',$row->id).'" title="Edit" class="btn btn-outline-primary btn-sm mr-1"><i class="fas fa-edit"></i></a>';
                        }
                        if( Auth::user()->hasPermissionTo('user-delete') ) {
                            $actionBtn .= '<form method="POST" action="'.route('users.destroy', $row->id).'" onsubmit="return confirm_delete()">
                                <input type="hidden" name="_token" id="csrf-token" value="'.Session::token().'" />
                                <input type="hidden" name="_method" id="csrf-token" value="DELETE" />   
                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form></div>';
                        } 
                        return $actionBtn;
                    })
                    ->rawColumns(['avatar','roles','status','action'])
                    ->make(true);
        }
                  
        return view('admin.users.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        $designations = Designation::all();
        return view('admin.users.create',compact('roles','designations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'numeric|digits:10||unique:users,phone',
            // 'designation_id' => 'numeric',
            'pincode' => 'numeric|digits:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
            'status' => 'numeric|digits:1'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('profiles', 'public');
            $path = $request->file('avatar')->store('images', 'public');
            $pathArray = explode('/',$path);
            $imgPath = $pathArray[1];

            $user->avatar = $imgPath;
            $user->save();
        }
    
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $designations = Designation::all();
    
        return view('admin.users.edit',compact('user','roles','userRole','designations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone' => 'numeric|digits:10||unique:users,phone,'.$id,
            // 'designation_id' => 'numeric',
            'pincode' => 'numeric|digits:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'same:confirm-password',
            'roles' => 'required',
            'status' => 'numeric|digits:1'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('profiles', 'public');
            $path = $request->file('avatar')->store('images', 'public');
            $pathArray = explode('/',$path);
            $imgPath = $pathArray[1];

            $user->avatar = $imgPath;
            $user->save();
        }
    
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

    public function profile(){
        $user = Auth::user();
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $designations = Designation::all();
    
        return view('admin.users.profile',compact('user','roles','userRole','designations'));
    }

    public function update_profile(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone' => 'numeric|digits:10||unique:users,phone,'.$id,
            'pincode' => 'numeric|digits:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $input = $request->all();
    
        $user = User::find($id);
        $user->update($input);

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('profiles', 'public');
            $path = $request->file('avatar')->store('images', 'public');
            $pathArray = explode('/',$path);
            $imgPath = $pathArray[1];

            $user->avatar = $imgPath;
            $user->save();
        }
    
        return redirect()->route('profile')->with('success','Profile updated successfully');
    }


}