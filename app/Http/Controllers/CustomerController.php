<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Lane;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lane = Lane::all();
        return view('customer.create',['lanes'=>$lane]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $customer = Customer::where('mobile',$request->mobile)->first();
       
        $request->validate([
            'mobile' => 'required|min:11|max:11|unique:customers,mobile,'.$customer->id,
        ]);
       
  
          $customer_no = $request->customer_name.'_'.mt_rand('1000','9999');
  
          $customer = new Customer();
          
          $em = implode(',',$request->email);
          
          
          $customer->customer_no = $request->customer_no;
          $customer->name = $request->name;
          $customer->email = $em;
          $customer->address = $request->address;
          $customer->city = $request->city;
          $customer->country = $request->country;
          $customer->county = $request->county;
          $customer->post_code = $request->post_code;
          $customer->mobile = $request->mobile;
          $customer->tan_number = $request->tan_number;
          $customer->eori_number = $request->eori_number;
          $customer->eori_number = $request->eori_number;
          $customer->password = $request->password;
          $customer->rules = '14,16';
          $customer->additional_comment = $request->additional_comment;          
        
          $customer->latitude = $request->latitude != '' ? $request->latitude : "";
          $customer->longitude = $request->longitude != '' ? $request->longitude : "";
         
  
          if ($customer->save()) {
            $msg=" New Customer create successfully..";
            $request->session()->flash('msg', $msg);
            return redirect()->route('customer.add');
          }else{
            $msg_error="Something went wrong!";
            $request->session()->flash('msg_error', $msg_error);
            return redirect()->route('customer.add'); 
          }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function customer_login(Request $request)
    {
        echo 'ajay';die;
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->except(['_token']);

        $user = User::where('name',$request->name)->first();

        if (auth()->attempt($credentials)) {

            return redirect()->route('home');

        }else{
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }
    }


}
