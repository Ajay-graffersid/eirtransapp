<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Lane;
use App\Helpers\CommonHelper;
use Illuminate\Http\Request;
use App\Exports\JobsExport;
use App\Imports\JobsImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class JobController extends Controller
{
    public function __construct(CommonHelper $common)
    { 
        $this->common_helper = $common;
    }

    public function index()
    {

   
        // $posts = Post::with(['comments', 'author'])->get();
          $jobs=Job::where('status',0)->get();
        //   $jobs=Job::with(['user','lane'])->where('status',0)->get();

     return view('job/index',compact('jobs'));
    }

    
    public function create()
    {   
        $customers = User::role('Customer')->orderBy('name', 'ASC')->get();  
            
       
         $lanes = DB::table('lanes')->get();   

          $list_count = Job::count();
		 $job_number = date('y').$list_count;
  

    return view('job.create',compact('customers','lanes','job_number'));
    }

  
    public function store(Request $request)
    {
      
        $request->validate([
            'reg' => 'required|unique:jobs,reg',
            'job_number' => 'required',
            'location' => 'required',
            'collection_address' => 'required',
            'delivery_address' => 'required',
            'booking_date' => 'required',
            'inv_file' => 'required',
        ]);

  
  
            $job = new job();
            $job->job_number = $request->job_number;
            $job->user_id  = $request->customer_id;
            $job->make_model = $request->make_model;
            //   $job->model = $request->model;
            $job->vin_number = $request->vin_number;
            $job->reg = $request->reg;
            $job->location = $request->location;
            $job->collection_address = $request->collection_address;
            $job->delivery_address = $request->delivery_address;
            $job->booking_date = $request->booking_date;
            $job->lane_id  = $request->lane_id ;
            $job->eori = $request->eori;
            $job->relese_code = $request->relese_code;
            $job->commcode = $request->commcode;
            $job->weight = $request->weight;
            $job->curr = $request->curr;
            $job->value = $request->value;
            $job->shipimo = $request->shipimo;
            $job->eta = $request->eta;
            $job->bill_of_laden = $request->bill_of_laden;
            $job->description = $request->description;
            $job->inv_ref = $request->inv_ref;
            $job->rate = $request->rate;      
            $job->bookingstatus = 0;
            $job->split_job = 0;
      
        
            if ($job->save()) {
                $job_id=$job->id;
                
                $imagess= $request->file('inv_file'); 
                if(!empty($imagess))
                {
         
         
         foreach($imagess as $imagee){
  
                         $imagenamee = rand('1111','9999').time().'.'.$imagee->getClientOriginalExtension();
                      $destinationPath = public_path('uploads/new-inv');
                      
                     
                      $imagee->move($destinationPath, $imagenamee);
  
                        
                       $invoice = new Invoice;
                       $invoice->job_id = $job_id;
                       $invoice->inv_file = $imagenamee;
                       $invoice->save();
              
         } 
         
         } 
                         
                $msg="Job created successfully..";
                    $request->session()->flash('msg', $msg);
                    return redirect()->route('job.index');
            }else{
                $msg_error="Something went wrong!";
                $request->session()->flash('msg_error', $msg_error);
              
                return redirect()->route('job.index');
            }
  
    }

  
    public function show(Job $job)
    {
        //
    }

   
    public function edit(Job $job)
    {
    
        $customers = User::role('Customer')->orderBy('name', 'ASC')->get();  
            
       
         $lanes = DB::table('lanes')->get();
    
        $jobs = Job::find($job->id);
        
        $invoices = Invoice::where('job_id',$job->id)->get();
        
    
    
        return view('job.edit',compact('customers','lanes','jobs','invoices'));
    }

   
    public function update(Request $request, Job $job)
    {
        // echo $job->id;die;
   
    $job = Job::find($job->id);
    $job->job_number = $request->job_number;
    $job->user_id = $request->user_id;
    $job->make_model = $request->make_model;
    //  $job->model = $request->model;
    $job->reg = $request->reg;
    $job->location = $request->location;
    $job->collection_address = $request->collection_address;
    $job->delivery_address = $request->delivery_address;
    $job->booking_date = $request->booking_date;
    $job->lane_id = $request->lane_id;
    $job->relese_code = $request->relese_code;
    $job->eori = $request->eori;
    $job->commcode = $request->commcode;
    $job->weight = $request->weight;
    $job->curr = $request->curr;
    $job->value = $request->value;
    $job->shipimo = $request->shipimo;
    $job->eta = $request->eta;
    $job->bill_of_laden = $request->bill_of_laden;
    $job->description = $request->description;
    $job->inv_ref = $request->inv_ref;
    
    $job->rate = $request->rate;
   

    if ($job->save()) {
        
        
     $imagess= $request->file('inv_file'); 
       if(!empty($imagess))
      {
       
       
       foreach($imagess as $imagee){

                   	$imagenamee = rand('1111','9999').time().'.'.$imagee->getClientOriginalExtension();
			        $destinationPath = public_path('uploads/new-inv');
			        
			       
			        $imagee->move($destinationPath, $imagenamee);

			          
                     $invoice = new Invoice;
                     $invoice->job_id = $job->id;
                     $invoice->inv_file = $imagenamee;
                     $invoice->save();
            
       }       
	   } 

      $msg="Job updated successfully..";
          $request->session()->flash('msg', $msg);
      
        return redirect()->route('job.index');
    }else{
      $msg_error="Something went wrong!";
        $request->session()->flash('msg_error', $msg_error);
        return redirect()->route('job.edit');
    }
    }

   
    public function destroy(Job $job)
    {
        $job->delete();
    
        return redirect()->route('job.index')
                        ->with('msg','Job deleted successfully');
    }


    public function invoice_delete(Request $request,$id='')
    {
        // echo $id;die;
      $delete = Invoice::where('id',$id)->delete();
  
      if ($delete) {
        $msg="deleted successfully..";
            $request->session()->flash('msg', $msg);
          return redirect('car_details/list');
      }else{
        $msg_error="Something went wrong!";
          $request->session()->flash('msg_error', $msg_error);
           
           return redirect()->route('job.index');
      }
    }


    public function verify_car_reg(){

        $jobs = DB::select('select * from jobs where status=0');
        return view('job.current_job_details',compact('jobs'));
    }


    public function check_Reg(Request $request){

        // echo 'ajay';die;
        $reg= $request->input('reg'); 
     
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.motorspecs.com/identity-specs/lookup',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
           "country": "ie",
           "registration": "'.$reg.'"
        }',
          CURLOPT_HTTPHEADER => array(
            'Accept: application/vnd.identity-specs.v2+json',
            'Content-Type: application/vnd.identity-specs.v2+json',
            'Authorization: Bearer 81eceda9c642cca10b425d405d86291bff15e1b9',
            'Cookie: PHPSESSID=vqjt6n9ephs7q2qsskm1496cc3'
          ),
        ));
        
        $response = curl_exec($curl);

     
        
        curl_close($curl);
        
        $json = json_decode($response, true);              
        
        $status = (isset($json['status']))?$json['status']:0;
         
       
        if(isset($status) and $status==0)
        {
          
            
            $reg= $request->input('reg'); 
            $make= $json["vehicle"]["nvdf"]["make"];
            $model= $json["vehicle"]["nvdf"]["model"];
            $modelYear= $json["specsVehicle"]["modelYear"];
            $doors= $json["vehicle"]["nvdf"]["seatingCapacity"];
            $engineCC= $json["vehicle"]["nvdf"]["cc"];
            $fuel= $json["vehicle"]["nvdf"]["fuel"];
            $vin= $json["vehicle"]["nvdf"]["vin"];
            $engineNumber= $json["vehicle"]["nvdf"]["engineNumber"];
            
             return view('job.view_reg_details',compact('reg','make','model','modelYear','doors','engineCC','fuel','vin','engineNumber'));
            
            
           
        } else{
                 $msg="Reg Not found";
                $request->session()->flash('msg_error', $msg);
                return redirect('current_job_details/list'); 
        } 
     
         
         
     }

     public function importJobs()
     {
         return view('job.importJobCsv');
     }


     public function importJobsCsv(Request $request)
	{

		if(!empty($request->file('csv'))){
          	$arr_image = $request->file('csv');
          	$arr_extension = $arr_image->getClientOriginalExtension();
          	$arr_image_name = $arr_image->getClientOriginalName();
          	$arr_img_name = str_replace(' ', '_', strtolower($arr_image_name));
          	$input['csv'] = time().'_'.$arr_img_name;
          	$arr_path = base_path().'/assets/jobs_csv/';
          	$arr_image->move($arr_path, $input['csv']);
        }

      	$file = base_path().'/assets/jobs_csv/'.$input['csv'];
      
      	$customerArr = $this->common_helper->csvToArray($file);
      	
      	$tableHeader = array(
	        'Make'=>'Make',
	        'Model'=>'Model',
	        'VIN_Number'=>'VIN_Number',
	        'Car_Reg'=>'Car_Reg',
	        'Location'=>'Location',
	        'Collection_Address'=>'Collection_Address',
	        'Delivery_Address'=>'Delivery_Address',
	        'Booking_Date'=>'Booking_Date',
	        'Lane'=>'Lane',
	        'EORI'=>'EORI',
	        'COMM_CODE'=>'COMM_CODE',
	        'Weight'=>'Weight',
	        'Currency'=>'Currency',
	        'Value'=>'Value',
	        'Ship_IMO'=>'Ship_IMO',
	        'ETA'=>'ETA',
	        'Bill_of_Laden'=>'Bill_of_Laden',
	        'Description'=>'Description',
	        'Invoice_Ref'=>'Invoice_Ref',
	        'Rate'=>'Rate',
      	);
      	
      	for ($i = 0; $i < count($customerArr); $i ++){
	        if (array_diff_key($tableHeader,$customerArr[$i])) {
	          	$msg_error="Wrong format, Please check sample format first!";
	      		$request->session()->flash('msg_error', $msg_error);
	      		return redirect()->route('importJobs');
	        }else{
	          $data[] = [
	            'job_number' => mt_rand('100000','999999'),
	            'make_model' => $customerArr[$i]['Make'],
	            'model' => $customerArr[$i]['Model'],
	            'vin_number' => $customerArr[$i]['VIN_Number'],
	            'reg' => $customerArr[$i]['Car_Reg'],
	            'location' => $customerArr[$i]['Location'],
	            'collection_address' => $customerArr[$i]['Collection_Address'],
	            'delivery_address' => $customerArr[$i]['Delivery_Address'],
	            'Booking_Date' => $customerArr[$i]['Booking_Date'],
	            'lan' => $this->getLaneId($customerArr[$i]['Lane']),
	            'eori' => $customerArr[$i]['EORI'],
	            'customer' => $this->getCustomerId($customerArr[$i]['COMM_CODE']),
	            'commcode' => $customerArr[$i]['COMM_CODE'],
	            'weight' => $customerArr[$i]['Weight'],
	            'curr' => $customerArr[$i]['Currency'],
	            'value' => $customerArr[$i]['Value'],
	            'shipimo' => $customerArr[$i]['Ship_IMO'],
	            'eta' => $customerArr[$i]['ETA'],
	            'bill_of_laden' => $customerArr[$i]['Bill_of_Laden'],
	            'description' => $customerArr[$i]['Description'],
	            'inv_ref' => $customerArr[$i]['Invoice_Ref'],
	            'rate' => $customerArr[$i]['Rate'],
	            'bookingstatus' => 0,
	            'split_job' => 0,
	          ];
	        }
      	}


    }

    public function getCustomerId($mobile)
	{
		$customer = User::where('mobile',$mobile)->first();

		if (!empty($customer)) {
			$id = $customer->id;
		}else{
			$id = 0;
		}

		return $id;
	}

	public function getLaneId($lane)
	{
		$lane = Lane::where('lane_number',$lane)->first();

		if (!empty($lane)) {
			$id = $lane->id;
		}else{
			$id = 0;
		}

		return $id;
	}

      
    public function importExportView()
    {
       return view('job.import');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new JobsExport, 'job.xlsx');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new JobsImport,request()->file('file'));
             
        return back();
    }


    public function getjobdetalsbyloc($loc)
    {     
      // echo $id;die;
      // $jobs = DB::select('select * from jobs where status=? and location=?',[0,$id]);
      $jobs=Job::where('status',0)->where('location',$loc)->get();
      // foreach($jobs as $job){
      // echo '<pre>';print_r($job->user->name);die;
      // }
     
      return view('job/index',compact('jobs','loc'));
    
    }


    public function searchjob_by_booking_date(Request $request)  {

          // echo $request->booking_date;die;
        
      $jobs=Job::where('status',0)->where('booking_date',$request->booking_date)->get();

      return view('job/index',compact('jobs'));
    
    }



    // public function searchjob_by_booking_date(Request $request)  {
  
    //   $bookingdate1= $request->input('booking_date1');
      
    //   $bookingdate2= $request->input('booking_date2');
      
    //   $customer_id= $request->input('customer_id');
    //   $status= $request->input('status');
     
    //   $lanes =  DB::select("select *from lane");

    //   $login= session()->get('login');

    //   if($login==3){
      
    //     $login_id = session()->get('login_id');
    //   }
      
        
      
         
    //     if(!empty($bookingdate1) && !empty($bookingdate2) && empty($customer_id) && empty($status))
    //     {
             
    //            $jobs = DB::select('select * from jobs where booking_date >= ? and booking_date <= ?',[$bookingdate1,$bookingdate2]);
    //     }
    //     else if(!empty($bookingdate1) && !empty($bookingdate2) && !empty($customer_id) && empty($status)){
          
    //       $jobs = DB::select('select * from jobs where booking_date >= ? and booking_date <= ? and user_id=?',[$bookingdate1,$bookingdate2,$customer_id]);
          
            
    //     }
    //     else if(!empty($bookingdate1) && !empty($bookingdate2) && empty($customer_id) && !empty($status)){
          
    //       $jobs = DB::select('select * from jobs where booking_date >= ? and booking_date <= ? and bookingstatus =?',[$bookingdate1,$bookingdate2,$status]);
            
    //     }

    //     else if(empty($bookingdate1) && empty($bookingdate2) && !empty($customer_id) && !empty($status)){
          
    //       $jobs = DB::select('select * from jobs where  user_id =? and bookingstatus =?',[$customer_id,$status]);
            
    //     }

    //     else if(empty($bookingdate1) && empty($bookingdate2) && !empty($customer_id) && empty($status)){
          
    //       $jobs = DB::select('select * from jobs where  user_id=? ',[$customer_id]);
            
    //     }
    //     else if(empty($bookingdate1) && empty($bookingdate2) && empty($customer_id) && !empty($status)){
          
    //       $jobs = DB::select('select * from jobs where  bookingstatus =?',[$status]);
            
    //     }
       


    //     else
    //     {
    //          $jobs = DB::select('select * from jobs where  bookingstatus =?',[4]);
    //     }
        
    //      $customers = DB::select('select * from jobs ORDER BY user_id ASC');
       
    //    return view('job_report',compact('jobs','customers','lanes','customer_id','bookingdate1','bookingdate2','status')); 
        
        
    // }


}
