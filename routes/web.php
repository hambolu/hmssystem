<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminDoctorController;
use App\Http\Controllers\AdminPatientController;
use App\Http\Controllers\AdminInvoiceController;
use App\Http\Controllers\AccountantController;
use App\Http\Controllers\AdminAccountantController;
use App\Http\Controllers\AdminAppointmentController;
use App\Http\Controllers\AdminBedwardController;
use App\Http\Controllers\AdminBloodBankController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminHistoryController;
use App\Http\Controllers\AdminNurseController;
use App\Http\Controllers\AdminPaymentController;
use App\Http\Controllers\BloodBankController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticeboardController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientForCrudController;
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
    return view('frontend.index');
});
Route::get('/about', function () {
    return view('frontend.about');
});
Route::get('/doctor-fornend', function () {
    return view('frontend.doctor');
});
Route::get('/department', function () {
    return view('frontend.department');
});
Route::get('/price', function () {
    return view('frontend.price');
});
Route::get('/contact', function () {
    return view('frontend.contact');
});
Route::get('/blog', function () {
    return view('frontend.blog');
});
Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/login/custom',[LoginController::class, 'login'])->name('login.custom');
Route::group(['middleware'=>'auth'],function(){
    Route::get('/home',function(){
        return view('home');
    })->name('home');
    Route::get('/dashboard',function(){ //for admin
        return view('dashboard');
    })->name('dashboard');
    Route::get('/patient',function(){   //for patient
        return view('patient');
    })->name('patient');
    Route::get('/doctor',function(){    //for doctor
        return view('doctor');
    })->name('doctor');
    Route::get('/nurse',function(){ //for nurse
        return view('nurse.dashboard');
    })->name('nurse');
    Route::get('/accountant',function(){ //for accountant
        return view('accountant.accountant_dashboard');
    })->name('accountant');
    //Route::resource('/emp',LoginController::class);
    
    //Route::resource('adminurl',AdminController::class);
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/AdminControlUser', 'index')->name('index');
        Route::post('admin/store', 'store')->name('store');
        //Route::get('admin_invoice_show/create', 'create')->name('admin_invoice_show.create');
        //Route::get('admin_invoice_show', 'show')->name('admin_invoice_show.show');
        Route::put('admin/{id}', 'update')->name('update');
        Route::delete('admin/{id}', 'destroy')->name('destroy');
        Route::get('admin/{id}/edit', 'edit')->name('edit');
    });
    //Route::resource('doctorurl',DoctorController::class);
    Route::controller(DoctorController::class)->group(function(){
        Route::get('/doctorurl', 'index')->name('index');
        Route::post('admin/store', 'store')->name('store');
        Route::get('admin_invoice_show/create', 'create')->name('admin_invoice_show.create');
        //Route::get('admin_invoice_show', 'show')->name('admin_invoice_show.show');
        Route::put('admin/{id}', 'update')->name('update');
        Route::delete('admin/{id}', 'destroy')->name('destroy');
        Route::get('admin/{id}/edit', 'edit')->name('edit');
    });

    //for Admin View History(AdminHistoryController & AdminHistory Model)
    Route::resource('adminhistory','AdminHistoryController');
    /////////////////////////////////////
    Route::get('/changepassword', function () {
        return view('changepassword');
    });
    Route::get('/AdminProfileUpdate', function () {
        return view('AdminProfileUpdate');
    });
    Route::post('/changepassword','ProfileController@changepassword')->name('changepassword');
    Route::post('/AdminProfileUpdate','ProfileController@AdminProfileUpdate')->name('AdminProfileUpdate');
    //History of Register User
    Route::get('/registerUserHistory', function () {
        return view('admin.registerUserHistory');
    });
    Route::post('/registerUserHistory','ProfileController@registerUserHistory')->name('admin.registerUserHistory');

    //picture upload
    // Route::get('/profilepicture','ProfileController@getProfileAvatar')->name('profileavatar');
    // Route::post('/profilepicture','ProfileController@profilePictureUpload')->name('profileavatar');

    Route::get('/profilepicture', function () {
        return view('profilepicture');
    });
    Route::post('/profilepicture','ProfileController@profilepicture')->name('profilepicture');


    //View Profile
    Route::get('/displayuserprofile', function () {
        return view('displayuserprofile');
    });

    //get route of doctordashboard
    Route::get('/doctor-dashboard',function(){
        return view('doctor.doctor_dashboard');
    });
    //get route of patient dashboard
    Route::get('/patient-dashboard',function(){
        return view('patient.patient_dashboard');
    });

    //  //get route of Make Patient Appointment
    //  Route::get('/make-appointment',function(){
    //     return view('patient.make');
    // });
    //resource controller for patient crud
    Route::resource('/make-appiontment',PatientControllerForCrud::class);
    Route::get('/patient-dashboard',function(){
        return view('patient.patient_dashboard');
    });
    //simple controller for display doctor in patient panel
    // Route::get('/view_doctor', function () {
    //     return view('patient.view_doctor');
    // });
    // -----------------------Routing of Admin Dashboard----------------------------------
    Route::get('/view_doctor','PatientController@view_doctor')->name('view_doctor');
    //routing of blood bank view in patient folder
    Route::resource('/blood_bank',BloodBankController::class);
    //routing of blood bank for admin panel
    Route::resource('/admin_blood_bank',AdminBloodBankController::class);
    //routing for admin panel doctor show
    Route::resource('/admin_doctor_show',AdminDoctorController::class);
    //routing for admin panel patient show
   // Route::resource('/admin_patient_show',AdminPatientController::class);
    Route::controller(AdminPatientController::class)->group(function(){
        Route::get('/admin_patient_show', 'index')->name('index');
        Route::post('/admin_patient_show/create', 'create')->name('create');
      
        Route::put('admin_patient_show/{id}', 'update')->name('update');
        Route::delete('admin_patient_show/{id}', 'destroy')->name('destroy');
        Route::get('admin_patient_show/{id}/edit', 'edit')->name('edit');
    });
    //routing for admin panel nurse show
    Route::resource('/admin_nurse_show',AdminNurseController::class);
     //routing for admin panel accountant show
    Route::resource('/admin_accountant_show',AdminAccountantController::class);
    //routing for noticeboard
    Route::resource('/noticeboard',NoticeboardController::class);
    //routing of admin to assign bed to patient
    Route::resource('/admin_bedward_show',AdminBedwardController::class);
    //routing for admin to change aur add patient appointment
    Route::resource('/admin_appointment_show',AdminAppointmentController::class);
    
    //routing for adminpanel to make invoice or edit
    Route::resource('admin_invoice_show',AdminInvoiceController::class);
    Route::controller(AdminInvoiceController::class)->group(function(){
            Route::get('admin_invoice_show', 'index')->name('admin_invoice_show.index');
            Route::post('admin_invoice_show', 'store')->name('admin_invoice_show.store');
            Route::get('admin_invoice_show/create', 'create')->name('admin_invoice_show.create');
            //Route::get('admin_invoice_show', 'show')->name('admin_invoice_show.show');
            Route::put('admin_invoice_show/{id}', 'update')->name('admin_invoice_show.update');
            Route::delete('admin_invoice_show/{id}', 'destroy')->name('admin_invoice_show.destroy');
            Route::get('admin_invoice_show/{id}/edit', 'edit')->name('admin_invoice_show.edit');
        });
    
        //routing for adminpanel to download invoice in the form of pdf invoice
    Route::get('/admin_download/{id}',[AdminInvoiceController::class, 'downloadPDF']);
    //routing for adminpanel to view payments
    Route::resource('/admin_payment_show',AdminPaymentController::class);
    //routing for adminpanel to accept new user requests
    Route::get('/new_user_requests','AdminController@newRequests');
    // ------------------------Routing of Accountant Dashboard-------------------------------
    //routing for Accountant to change password
    Route::get('/accountant_changepassword', function () {
        return view('accountant.changepassword');
    });
     Route::post('/accountant_changepassword','ProfileController@changepassword')->name('accountant_changepassword');
    // //routing for Accounting to change image
    Route::get('/accountant_profilepicture', function () {
        return view('accountant.profilepicture');
    });
    Route::post('/accountant_profilepicture','ProfileController@profilepicture')->name('accountant_profilepicture');
    // routing of Accoutant to update profile
    Route::get('/accountant_ProfileUpdate', function () {
        return view('accountant.ProfileUpdate');
    });
    Route::post('/accountant_ProfileUpdate','ProfileController@AdminProfileUpdate')->name('accountant_ProfileUpdate');
    //routing for invoice
    Route::resource('/accountant_invoice_show',AdminInvoiceController::class);
    //routing for display user profile
    // Route::get('/accountant_displayuserprofile', function () {
    //     return view('accountant.displayuserprofile');
    // });
    //routing for noticeboard
    Route::resource('/accountant_noticeboard',NoticeboardController::class);
     //routing accountant upadte profile
    Route::resource('/accountant_updateprofile',AccountantController::class);

    Route::get('/accountant_profileview','AccountantController@profileview');
    // --------------------------------------Routing for Nurse Panel---------------------------------------
     //routing for change password
     Route::get('/nurse_changepassword', function () {
        return view('nurse.changepassword');
    });
     Route::post('/nurse_changepassword','ProfileController@changepassword')->name('nurse_changepassword');

     //routing for nurse to view our profile
     Route::get('/display_nurse_profile','NurseController@display_profile');
     //routing for update profile
     Route::get('/update_nurse_profile','NurseController@nurse_update');
     //routing to store data receving from previous line route
     Route::resource('/update_nursecrud_profile',NurseCrudController::class);
      // routing for  change image
    Route::get('/nurse_profilepicture', function () {
        return view('nurse.profilepicture');
    });
    Route::post('/nurse_profilepicture','ProfileController@profilepicture')->name('nurse_profilepicture');
    //routing for doctor view
    Route::get('/nurse_doctor_view','NurseController@doctor');
    //routing for patient view
    Route::get('/nurse_patient_view','NurseController@patient');
     //routing for blood bank view
     Route::get('/nurse_blood_bank_view','NurseController@blood_bank');
      //routing for bedward view
    Route::get('/nurse_bedward_view','NurseController@bedward');
    //routing for noticeboard view
    Route::get('/nurse_noticeboard_view','NurseController@notice_board');
    // ---------------------------------Routing for Patient Panel-----------------------------------------
    Route::get('/patient_bedward_view','PatientController@bed_ward');
     //routing for change password
     Route::get('/patient_changepassword', function () {
        return view('patient.changepassword');
    });
     Route::post('/patient_changepassword','ProfileController@changepassword')->name('patient_changepassword');
      // routing for  change image
    Route::get('/patient_profilepicture', function () {
        return view('patient.profilepicture');
    });
    Route::post('/patient_profilepicture','ProfileController@profilepicture')->name('patient_profilepicture');
    //routing for invoice download or  view
    Route::get('/patient_invoice_view','PatientController@invoice_view');
    //routing for payment view
    Route::get('/patient_payment_view','PatientController@payment_view');
     //routing for make appointment and for edit function call PatientCrudContrller
    Route::get('/patient_make_appointment','PatientController@make_appiontment');
    //routing for patient profile  view
    Route::get('/patient_profile_view','PatientController@patient_profile_view');
    //routing for update profile
    //1-first called  controller  return view with data
    //2-form action call  PatientCrudController for edit
    Route::get('/update_patient_profile','PatientController@patient_update');
    //for patient profile edit
    Route::resource('/patient_profile_edit',PatientControllerForCrud::class);
    //routing for  notice board
    Route::get('/patient_noticeboard','PatientControllerForCrud@noticeboard');
    // ----------------------------for doctor route---------------------
    //routing for change password
    Route::get('/doctor_changepassword', function () {
        return view('doctor.changepassword');
    });
     Route::post('/doctor_changepassword','ProfileController@changepassword')->name('doctor_changepassword');
    // routing for  change image
    Route::get('/doctor_profilepicture', function () {
        return view('doctor.profilepicture');
    });
    Route::post('/doctor_profilepicture',[ProfileController::class,'profilepicture'])->name('doctor_profilepicture');
    //routing for doctor view bedward
    Route::get('/doctor_view_badward',[DoctorController::class, 'view_badward'])->name('view_badward');
     //routing for doctor view bloodbank
     Route::get('/doctor_view_bloodbank',[DoctorController::class, 'view_bloodbank'])->name('view_bloodbank');
      //routing for doctor view profile
     Route::get('/doctor_view_profile',[DoctorController::class, 'view_profile'])->name('view_profile');
    //routing for update profile
    //1-first called  controller  return view with data
    //2-form action call  DoctorController for edit
    Route::get('/update_doctor_profile',[DoctorController::class, 'doctor_update'])->name('doctor_update');
    //for doctor profile edit
    Route::resource('/doctor_profile_edit',DoctorController::class);
    //routing for pending appointments
    Route::get('/doctor_pending_appointments',[DoctorController::class,'pending_appointments'])->name('pending_appointments');
    //routing for cancel appointments
    Route::get('/doctor_cancel_appointments',[DoctorController::class, 'cancel_appointments'])->name('cancel_appointments');
    //routing for  appointment history
    Route::get('/doctor_appointment_history',[DoctorController::class, 'appointment_history'])->name('appointment_history');
    //routing for  notice board
    Route::get('/doctor_noticeboard',[DoctorController::class, 'noticeboard'])->name('noticeboard');

});

Route::get('admin-control-user',function(){
    return view('admin.AdminControlUser');
});
//routing of controller
Route::get('/emp','LoginController@index')->name('AdminControlUser');

///-------------------
// Route::get('/test', function () {
//     return view('admin.pdf');
// });

Route::get('/doctor', function () {
    return view('admin.doctor');
});
