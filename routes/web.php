<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LaneController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LoadcontenerController;
use App\Http\Controllers\LoadbuilderController;
use App\Http\Controllers\LoadAssignToDriver;
use App\Http\Controllers\DriverController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('roles', RoleController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    // Route::resource('products', ProductController::class);  
    Route::get('customer', [CustomerController::class, 'create'])->name('customer.add');
   
    Route::post('customer/store', [CustomerController::class, 'store'])->name('customer.store');
    
     Route::resource('lanes', LaneController::class); 
     Route::get('lane-active/{id}', [LaneController::class, 'laneactive'])->name('lane-active');
      Route::get('lane-inactive/{id}',[LaneController::class,'laneinactive'])->name('lane-inactive');
      
// **********************************
    //  jobs
// *********************************
      Route::resource('job', JobController::class); 
      Route::get('verify-car-reg',[JobController::class,'verify_car_reg'])->name('verify-car-reg');
      Route::post('check-Reg',[JobController::class,'check_Reg'])->name('check-Reg');    
      Route::get('invoice-delete/{id}',[JobController::class,'invoice_delete'])->name('invoicedelete');

      Route::get('importJobs',[JobController::class,'importJobs'])->name('importJobs');
   
        Route::get('export', [JobController::class, 'export'])->name('export');
        Route::post('import', [JobController::class, 'import'])->name('import');

        Route::post('import', [JobController::class, 'import'])->name('import');
     
        Route::get('getjobdetailsbylocations/{id}', [JobController::class, 'getjobdetalsbyloc'])->name('getjobdetalsbyloc');
        Route::post('searchjob_by_booking_date', [JobController::class, 'searchjob_by_booking_date'])->name('searchjob_by_booking_date');

      
// **********************************
    //    loadcontener
// *********************************        
       Route::resource('loadcontener', LoadcontenerController::class); 

    //    **********************************
       //    LoadbuilderController
   // *********************************  
   
       Route::get('loadbuilder-create', [LoadbuilderController::class, 'loadbuldercreates'])->name('loadbuldercreates');
       Route::get('loadbuilder-for_delivery/{lane}', [LoadbuilderController::class, 'viewcar_for_delivery'])->name('viewcar_for_delivery');
       Route::get('loadbuilder-pendingdeliverjob', [LoadbuilderController::class, 'pendingdeliverjob'])->name('pendingdeliverjob');
       Route::get('loadbuilder-get-job-by-location/{location}', [LoadbuilderController::class, 'get_job_by_location'])->name('get_job_by_location');
       Route::get('loadbuilder-get-job-by-collectonaddress/{collectonaddress}', [LoadbuilderController::class, 'get_job_by_collectonaddress'])->name('get_job_by_collectonaddress');
       Route::get('createsloadbulderAjaxData/{city}/{county?}/{country?}', [LoadbuilderController::class, 'createsloadbulderAjaxData']);
       Route::post('jobassign_to_load', [LoadbuilderController::class, 'jobassign_to_load']);
       Route::get('removejob_toload/{loadid}/{carcollection}', [LoadbuilderController::class, 'removejob_toload']);
    
     
       

    //    **********************************
       //    LoadAssignToDriver
   // *********************************
    
   Route::get('loadassigntodriver/{id?}', [LoadAssignToDriver::class, 'index'])->name('loadassigntodriver');
   Route::post('loadassign', [LoadAssignToDriver::class, 'loadassign'])->name('loadassign');
   Route::get('removeassignload/{id}/{driverid}/{date}', [LoadAssignToDriver::class, 'removeload']);
   Route::post('viewassignload', [LoadAssignToDriver::class, 'viewassignload']);
   Route::post('pushingajob', [LoadAssignToDriver::class, 'pushingajob']);

   Route::post('savesipingd', [LoadAssignToDriver::class, 'savesipingd']);
   Route::get('getpdfbyload/{id?}', [LoadAssignToDriver::class, 'getpdfbyload'])->name('shiping_withjob_pdf');  //done
   Route::get('jobeditonplanner/{id}', [LoadAssignToDriver::class, 'jobeditonplanner'])->name('jobeditonplanner'); //done
   Route::post('updateJobplanner', [LoadAssignToDriver::class, 'updateJobplanner'])->name('updateJobplanner');  //done
   Route::post('deljob', [LoadAssignToDriver::class, 'deljob']);    //done
   Route::post('updatelannumber', [LoadAssignToDriver::class, 'updatelannumber']);    //done
   
  
   

   
   
   
   
    
      
         //    **********************************
       //    DriverController
   // *********************************

        Route::resource('driver', DriverController::class);       

    Route::get('driverstatusupdate/{id}', [DriverController::class, 'driverstatusupdate'])->name('driverstatusupdate');
    Route::get('driverinctive/{id}', [DriverController::class, 'driverinctive'])->name('driverinctive');

       
});

