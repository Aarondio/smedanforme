<?php

use App\Http\Controllers\AccountStatementController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CashflowController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BusinessinfoController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\LgaController;
use App\Http\Controllers\PaystackController;
use App\Http\Controllers\SalesforcastController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PdfService;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StaffAuth\LoginStaffController;
use App\Models\Businessinfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Route::get('/email/verify', function () {

    if(empty(Auth::user()->email_verified_at)){
        return view('auth.verify');
    }else{
        return redirect('/home');
    }
   
})->middleware('auth')->name('verification.notice');

// Route::post('/email/verify/resend', [VerificationController::class,'resend'])
//     ->name('verification.resend');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Route::post('/email/verify/resend', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
//     return redirect()->route('home')->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Route::post('/email/verify/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('resent','Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Auth::routes();
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
// Route::get('pdf/{bizno}', [PdfController::class, 'index'])->name('pdf');
// Route::get('test', [PdfController::class, 'test'])->name('test');


Route::get('/applicants', [SiteController::class, 'applicants'])->name('applicants');
Route::get('/nbp', [SiteController::class, 'nbp'])->name('nbp');
Route::get('/mbp', [SiteController::class, 'mbp'])->name('mbp');
Route::get('/calculator', [SiteController::class, 'calculator'])->name('calculator');
Route::get('learn', [SiteController::class, 'learn'])->name('learn');


Route::get('nanoplaninfo', [SiteController::class, 'nanoplaninfo'])->name('nanoplaninfo');
Route::get('previewinfo', [SiteController::class, 'previewinfo'])->name('previewinfo');

Route::get('application/{bizno}', [BusinessinfoController::class, 'application'])->name('application');
Route::get('applications/{bizno}', [BusinessinfoController::class, 'applications'])->name('applications');
Route::get('product', [SiteController::class, 'product'])->name('product');
Route::get('contact', [SiteController::class, 'contact'])->name('contact');
Route::get('comingsoon', [SiteController::class, 'comingsoon'])->name('comingsoon');

Route::get('myproducts', [ProductController::class, 'myproducts'])->name('myproducts');
Route::get('extrainfo', [CashflowController::class, 'extrainfo'])->name('extrainfo');
Route::get('fixedprojection', [SiteController::class, 'fixedprojection'])->name('fixedprojection');









Route::get('/smedan', [LoginStaffController::class, 'showLoginForm'])->name('staff.login');

Route::post('/staffsignin', [LoginStaffController::class, 'login'])->name('slogin');

Route::prefix('/smedan')->middleware(['auth:staff'])->group(function () {
    Route::get('/index', [StaffController::class, 'index'])->name('admindashboard');
    Route::get('/pending', [StaffController::class, 'pending'])->name('pending');
    Route::get('/reviewed', [StaffController::class, 'reviewed'])->name('reviewed');
    Route::get('/disqualified', [StaffController::class, 'disqualified'])->name('disqualified');
   
    Route::get('/settings', [StaffController::class, 'settings'])->name('settings');
    Route::get('/campaign', [StaffController::class, 'campaign'])->name('campaign');
    Route::get('/staff', [StaffController::class, 'staff'])->name('staff');
    Route::get('/profile/{id}', [StaffController::class, 'profile'])->name('profile');

    Route::post('/approve', [StaffController::class, 'approve'])->name('approve');
    Route::post('/decline', [StaffController::class, 'decline'])->name('decline');
    Route::post('/appeal', [StaffController::class, 'appeal'])->name('appeal');



    Route::post('/logout', [LoginStaffController::class, 'logout'])->name('staff.logout');
    Route::get('businessplan/{bizid}', [PdfService::class, 'businessplan'])->name('businessplan');
    Route::get('previews/{bizid}', [StaffController::class, 'preview'])->name('previews');


    Route::get('/history', [HistoryController::class, 'index'])->name('history');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::get('/campaign', [CampaignController::class, 'index'])->name('campaign');


    Route::post('/enablelogin', [SettingsController::class, 'enableLogin'])->name('enablelogin');
    Route::post('/disablelogin', [SettingsController::class, 'disableLogin'])->name('disablelogin');

    Route::post('/enablevisitation', [SettingsController::class, 'enableVisitation'])->name('enablevisitation');
    Route::post('/disablevisitation', [SettingsController::class, 'disableVisitation'])->name('disablevisitation');


    Route::post('/enablereview', [SettingsController::class, 'enableReview'])->name('enablereview');
    Route::post('/disablereview', [SettingsController::class, 'disableReview'])->name('disablereview');


    Route::post('/enableregistration', [SettingsController::class, 'enableRegistration'])->name('enableregistration');
    Route::post('/disableregistration', [SettingsController::class, 'disableRegistration'])->name('disableregistration');
    
});










Route::get('purchase/nbp', [SiteController::class, 'purchasenbp'])->name('purchasenbp');
Route::get('sbpayment', [PaystackController::class, 'sbpayment'])->name('sbpayment');
Route::get('payment', [PaystackController::class, 'store'])->name('payment');
Route::get('/get-lgas/{stateId}', [LgaController::class, 'getLGAs'])->name('get-lgas');

Route::prefix('/')
    ->middleware(['auth', 'verified','paystack','check.suin'])
    ->group(function () {
        Route::get('home', [HomeController::class, 'index'])->name('home');
     
        Route::get('success', [SiteController::class, 'success'])->name('success');
        Route::get('business', [SiteController::class, 'business'])->name('business');
        Route::get('error', function(){
            return view('app.dashboard.error');
        })->name('error');
        Route::get('businessinfo', [SiteController::class, 'businessinfo'])->name('businessinfo');

        Route::post('upload-pdf', [AccountStatementController::class, 'uploadPdf'])->name('uploadPdf');
        Route::get('statement',[AccountStatementController::class, 'index'])->name('statement');
        Route::get('sheet',[AccountStatementController::class, 'balanceSheet'])->name('balance');
        Route::post('updatesheet', [BusinessinfoController::class, 'updateSheet'])->name('updatesheet');
        
        
        
        Route::post('add_product', [ProductController::class, 'add_product'])->name('add_product');
        Route::post('update_product', [ProductController::class, 'update_product'])->name('update_product');
        Route::delete('deleteProduct/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
        
        
        Route::post('updateinfo', [UserController::class, 'updateinfo'])->name('updateinfo');
        Route::post('updatepersonalinfo', [UserController::class, 'updatepersonalinfo'])->name('updatepersonalinfo');
        Route::post('updatebusinessinfo', [BusinessinfoController::class, 'updatebusinessinfo'])->name('updatebusinessinfo');
        Route::post('updatebusiness', [BusinessinfoController::class, 'updatebusiness'])->name('updatebusiness');
        Route::post('activatesuin', [BusinessinfoController::class, 'updatesuin'])->name('activatesuin');
        // Route::post('audience_need',[BusinessinfoController::class,'audience_need'])->name('audience_need');
        Route::post('saveproductioncost', [SalesforcastController::class, 'updatesales'])->name('saveproductioncost');
 
        
        




        
        Route::post('/get-smedan-user', [SiteController::class,'getSmedanUser'])->name('getSmedanUser');
        Route::get('showsuin',[SiteController::class, 'showsuin'])->name('showsuin');

        Route::get('/suindetail',[SiteController::class, 'suindetail'] )->name('suindetail');
        Route::get('/suin',[SiteController::class, 'suin'] )->name('suin');

        Route::get('purchase', [SiteController::class, 'purchase'])->name('purchase');
        Route::get('purchase/mbp', [SiteController::class, 'purchasembp'])->name('purchasembp');
       



        Route::get('nanoplan', [SiteController::class, 'nanoplan'])->name('nanoplan');
        Route::get('swot', [SiteController::class, 'swot'])->name('swot');


        Route::get('pdf', [PdfService::class, 'viewPdf'])->name('viewPdf');
        
        Route::resource('businessinfos', BusinessinfoController::class);
        Route::resource('cashlows', CashflowController::class);
        // Route::resource('products', ProductController::class);
        Route::resource('salesforcasts', SalesforcastController::class);
        Route::resource('users', UserController::class);
        Route::get('personal', [SiteController::class, 'personal'])->name('personal');
        Route::post('create-expenses', [ExpensesController::class, 'update'])->name('create-expenses');
        Route::get('employees', [SiteController::class, 'employees'])->name('employees');
        Route::get('finance', [SiteController::class, 'finance'])->name('finance');
        Route::get('financial-record/{id}', [SiteController::class, 'financialRecord'])->name('financial-record');
        Route::get('startup-cost', [SiteController::class, 'startupCost'])->name('startup-cost');
        Route::get('personalinfo', [SiteController::class, 'personalinfo'])->name('personalinfo');
        Route::get('dashboard', [SiteController::class, 'dashboard'])->name('dashboard');
        Route::get('loanamount', [SiteController::class, 'loanamount'])->name('loanamount');

        Route::get('preview', [SiteController::class, 'preview'])->name('preview');


        Route::post('audience_need', [BusinessinfoController::class, 'audience_need'])->name('audience_need');
        Route::post('business_model', [BusinessinfoController::class, 'business_model'])->name('business_model');
        Route::post('target_market', [BusinessinfoController::class, 'target_market'])->name('target_market');
        Route::post('competition_ad', [BusinessinfoController::class, 'competition_ad'])->name('competition_ad');
        Route::post('management_team', [BusinessinfoController::class, 'management_team'])->name('management_team');
        Route::post('loan_amount', [BusinessinfoController::class, 'loan_amount'])->name('loan_amount');
        Route::post('loan_reason', [BusinessinfoController::class, 'loan_reason'])->name('loan_reason');
        Route::post('about', [BusinessinfoController::class, 'about'])->name('about');
        Route::post('mission', [BusinessinfoController::class, 'mission'])->name('mission');
        Route::post('journey', [BusinessinfoController::class, 'journey'])->name('journey');

        Route::post('finalsubmission', [BusinessinfoController::class, 'finalsubmission'])->name('finalsubmission');
        Route::post('strength', [BusinessinfoController::class, 'strength'])->name('strength');
        Route::post('weakness', [BusinessinfoController::class, 'weakness'])->name('weakness');
        Route::post('opportunity', [BusinessinfoController::class, 'opportunity'])->name('opportunity');
        Route::post('threats', [BusinessinfoController::class, 'threats'])->name('threats');
    });
