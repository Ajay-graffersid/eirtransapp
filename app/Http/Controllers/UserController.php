<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Session;
use Illuminate\Support\Arr;


class UserController extends Controller
{
    function __construct(Request $request)
    {
         $this->middleware('permission:user-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        
        $user = auth()->user();
        $login_id=$user->id;
        $v=$user->roles()->get();  
        $role= $v[0]->name;
        // echo $role;die;
        if($role=="Customer"){

         $data = User::where('id',$login_id)->orderBy('id','DESC')->paginate(10);

        }else{

        $data = User::orderBy('id','DESC')->paginate(10);

        }
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        // foreach ($roles as $name) {
        //     echo $name,"<br>";
        //     }
        //   die;
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo '<pre>';print_r($request->all());die;
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
        //    echo 'ajay';die;
        $customer_no = $request->customer_name.'_'.mt_rand('1000','9999'); 
             
        // $em = implode(',',$request->email);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['customer_no'] = $customer_no;
        // $input['email'] = $em;
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));

           $ro=$request->input('roles');

        Session::flash('success', 'User created successfully!'); 
        Session::flash('alert-class', 'alert-danger'); 

        return redirect()->route( 'users.create' )->with( [ 'ro' => $ro ] );
        
    
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->first();

        // echo '<pre>';print_r($user->name);die;
    
        return view('users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // echo $id;die;
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $user = User::find($id);

        $user->name=$request->name;
        $user->email =$request->email ;
        $user->password=Hash::make($request->password);
        $user->customer_no=$request->customer_no;
        $user->address=$request->address;
        $user->city=$request->city;
        $user->country=$request->country;
        $user->county=$request->county;
        $user->post_code=$request->post_code;
        $user->mobile=$request->mobile;
        $user->additional_comment=$request->additional_comment;
        $user->latitude=$request->latitude;
        $user->longitude=$request->longitude;
        $user->tan_number=$request->tan_number;
        $user->eori_number=$request->eori_number;

        $user->save();

        // $input = $request->all();
        // if(!empty($input['password'])){ 
        //     $input['password'] = Hash::make($input['password']);
        // }else{
        //     $input = Arr::except($input,array('password'));    
        // }
    
        // $user = User::find($id);
        // $user->update($input);

        // ??????????????????????????


        // ????????????????

        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}
