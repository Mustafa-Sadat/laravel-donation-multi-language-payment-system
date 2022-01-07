<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportedController;
use App\Http\Controllers\SponsorDataController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\Users;
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Crypt;

use App\Http\Controllers\PayPalController;





// index code -- Supported --
Route::get('/',[SupportedController::class,'index'] )->name('index'); 
Route::get('view/{id}',[SupportedController::class,'view'] ); 

Route::get('/en',[SupportedController::class,'indexEn'] ); 

// Farsi code
Route::get('/fa',[SupportedController::class,'indexFarsi'] )->name('indexFarsi'); 
// Route::get('/{lang}/view/{id}',[SupportedController::class,'viewFarsi'] ); 
// Farsi code
Route::get('/ps',[SupportedController::class,'indexpashto'] )->name('indexpashto'); 

Route::middleware(['auth'])->group(function () {
    
    Route::match(['get', 'post'], 'add_sponsor',[SponsorDataController::class,'index']);
    Route::get('/admin', function () {
        return redirect()->route('dashboard');
    })->name('admin')->middleware('admin'); 
    
    Route::get('/user', function () {
        return redirect()->route('index');
    })->name('user')->middleware('user');
    
    Route::get('/dash', function () {
        return view('dash');
    });
    
    Route::middleware(['admin'])->group(function () {
        Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[Dashboard::class,'Home'])->name('dashboard');
        // Dashboard code
        Route::post('submitHistory',[SupportedController::class,'insert'] ); 

        Route::get('/familylist',[SupportedController::class,'show'] ); 
        Route::post('familylist',[SupportedController::class,'show'] ); 

        Route::get('/addhistory',[SupportedController::class,'addhistory'] ); 
        Route::get('/model/{id}', [SupportedController::class,'model'] );
        Route::post('supportedUpdate', [SupportedController::class,'supportedUpdate'] );
        Route::post('supportedDelete', [SupportedController::class,'supportedDelete'] );
        // dashobard Sponsor data code
        Route::get('/paymentlog', [SponsorDataController::class,'showTable'] );
        Route::post('paymentlog', [SponsorDataController::class,'showTable'] );
        Route::post('sponsor-data-content', [SponsorDataController::class,'details'] );
        Route::post('sponsorDelete', [SponsorDataController::class,'sponsorDelete'] );
        Route::get('/history_details/{id}', [SponsorDataController::class,'history_details'] );
        Route::get('/history_modal_url/{id}', [SponsorDataController::class,'history_modal_url'] );
        // users
        Route::get('/donors',[Users::class,'donors']);
        Route::post('donors',[Users::class,'donors']);
        Route::get('/addUser',[Users::class,'addUser']);
        Route::post('submitUser',[Users::class,'submitUser']);
        Route::post('deleteUser',[Users::class,'deleteUser']);
        Route::get('/showUserUpdate/{id}',[Users::class,'showUserUpdate']);
        Route::post('insertUpdate',[Users::class,'insertUpdate']);
        Route::get('/user_details/{id}',[Users::class,'user_details']);
        Route::get('/user_modal_url/{id}',[Users::class,'user_modal_url']);
        // donors
        Route::get('/donarDetails/{id}',[Users::class,'donarDetails']);
        // Admin
        Route::get('/systemadmin',[Users::class,'systemadmin']);
        Route::get('/historydetails/{id}',[SupportedController::class,'historydetails'] ); 
        Route::post('updatePassword',[Users::class,'updatePassword']);
        Route::post('updateadmin',[Users::class,'updateadmin']);
        Route::get('/email', function () {
            return view('email');
        });
        Route::get('/chart',[Dashboard::class,'chart']);
        Route::get('404', function () {
            return view('404');
        });

    });
        
    Route::get('sponsor_data_view/{username}/{email}/{created}',[SponsorDataController::class,'sponsor_data_view'] );
    Route::get('/sponsor',[SponsorDataController::class,'view'] ); 
    Route::post('delete',[SponsorDataController::class,'delete'] ); 
    Route::post('checkout',[SponsorDataController::class,'checkout'] ); 
    Route::get('/checkout',function(){
        return redirect('sponsor');
    } ); 

    // Farsi Route
    Route::get('fa/sponsor',[SponsorDataController::class,'viewfarsi'] );
    Route::post('fa/deletefarsi',[SponsorDataController::class,'deletefarsi'] ); 
    Route::match(['get', 'post'], 'fa-add_sponsor',[SponsorDataController::class,'indexfarsi']);

    Route::post('fa/checkout',[SponsorDataController::class,'checkoutfarsi'] ); 
    Route::get('fa/checkout',function(){
        return redirect('fa/sponsor');
    } );

    // Pashto Route
    Route::get('ps/sponsor',[SponsorDataController::class,'viewpashto'] );
    Route::post('ps/deletefarsi',[SponsorDataController::class,'deletepashto'] ); 
    Route::match(['get', 'post'], 'ps-add_sponsor',[SponsorDataController::class,'indexpashto']);

    Route::post('ps/checkout',[SponsorDataController::class,'checkoutpashto'] ); 
    Route::get('ps/checkout',function(){
        return redirect('ps/sponsor');
    } );

    
});


Route::get('stripe', [StripePaymentController::class,'stripe'] );
Route::post('stripe', [StripePaymentController::class,'stripePost'] )->name('stripe.post');


Route::get('familylist/{id?}',[SupportedController::class,'history'] );
Route::get('payment/{total?}', [PayPalController::class,'payment'] )->name('payment');
Route::get('cancel', [PayPalController::class,'cancel'] )->name('payment.cancel');
Route::get('payment/success', [PayPalController::class,'success'] )->name('payment.success');

Route::get('test', function () {
    return view('stripe');
});



Route::get('/fa/familylist/{id}', [SupportedController::class,'historyFarsi'] );
Route::get('/ps/familylist/{id}', [SupportedController::class,'historypashto'] );


