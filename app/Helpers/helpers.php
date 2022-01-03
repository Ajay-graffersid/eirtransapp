
<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


  if (!function_exists('test')){
       function test(){
           $user= Auth::user();
          return $user->email;
       }
  }

  if (!function_exists('productImagePath')){
   function productImagePath($image_name)
   {
    
    return   asset('uploads/'.$image_name);
  }
  }


  if (!function_exists('edit_image')){
    function edit_image($image)
    {
      $image =  time().'.'.$image->extension();      
      return $image;  
    }
   }

   if (!function_exists('p')){
    function p($p)
    {
     echo '<pre>';print_r($p);'</pre>'; 
    }
   }
 

   if (!function_exists('getCarCollectionData1')){
    function getCarCollectionData1($car_id){
    $ids = explode(',',$car_id);
         
  foreach($ids as $job_id){
    $cheklan= DB::select("select *from jobs where id=?",[$job_id]);
    if($cheklan[0]->lane_id==null){
        
        $jobs[]=Job::where('id',$job_id)->first();
    }else{
       
              $jobs[]=Job::where('id',$job_id)->first();
    }
    
}
    return $jobs;
}
   }



//   if (!function_exists('myCustomHelper')) {
//     function myCustomHelper() {
//         // logic here
//     }
// }
