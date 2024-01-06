<?php

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
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PdfService;
use App\Models\Businessinfo;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/logout',[UserController::class,'logout'])->name('logout');
Route::get('pdf/{bizno}', [PdfController::class, 'index'])->name('pdf');
Route::get('test', [PdfController::class, 'test'])->name('test');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/applicants', [SiteController::class, 'applicants'])->name('applicants');
Route::get('/nbp',[SiteController::class, 'nbp'])->name('nbp');
Route::get('/mbp',[SiteController::class, 'mbp'])->name('mbp');
Route::get('/calculator',[SiteController::class, 'calculator'])->name('calculator');
Route::get('learn',[SiteController::class,'learn'])->name('learn');

Route::get('purchase',[SiteController::class,'purchase'])->name('purchase');
Route::get('purchase/mbp',[SiteController::class,'purchasembp'])->name('purchasembp');
Route::get('purchase/nbp',[SiteController::class,'purchasenbp'])->name('purchasenbp');
Route::get('nanoplan',[SiteController::class,'nanoplan'])->name('nanoplan');
Route::get('nanoplaninfo',[SiteController::class,'nanoplaninfo'])->name('nanoplaninfo');
Route::get('previewinfo',[SiteController::class,'previewinfo'])->name('previewinfo');
Route::get('preview',[SiteController::class,'preview'])->name('preview');
Route::get('application/{bizno}',[BusinessinfoController::class,'application'])->name('application');
Route::get('applications/{bizno}',[BusinessinfoController::class,'applications'])->name('applications');
Route::get('product',[SiteController::class,'product'])->name('product');
Route::get('contact',[SiteController::class,'contact'])->name('contact');
Route::get('comingsoon',[SiteController::class,'comingsoon'])->name('comingsoon');

Route::get('myproducts',[ProductController::class,'myproducts'])->name('myproducts');
Route::get('extrainfo',[CashflowController::class,'extrainfo'])->name('extrainfo');
Route::get('fixedprojection',[SiteController::class,'fixedprojection'])->name('fixedprojection');
Route::get('success',[SiteController::class,'success'])->name('success');
Route::post('finalsubmission',[BusinessinfoController::class,'finalsubmission'])->name('finalsubmission');

Route::get('business',[SiteController::class,'business'])->name('business');
Route::get('businessinfo',[SiteController::class,'businessinfo'])->name('businessinfo');
Route::get('payment',[PaystackController::class,'store'])->name('payment');
Route::get('sbpayment',[PaystackController::class,'sbpayment'])->name('sbpayment');

Route::post('audience_need',[BusinessinfoController::class,'audience_need'])->name('audience_need');
Route::post('business_model',[BusinessinfoController::class,'business_model'])->name('business_model');
Route::post('target_market',[BusinessinfoController::class,'target_market'])->name('target_market');
Route::post('competition_ad',[BusinessinfoController::class,'competition_ad'])->name('competition_ad');
Route::post('management_team',[BusinessinfoController::class,'management_team'])->name('management_team');
Route::post('loan_amount',[BusinessinfoController::class,'loan_amount'])->name('loan_amount');
Route::post('loan_reason',[BusinessinfoController::class,'loan_reason'])->name('loan_reason');
Route::post('about',[BusinessinfoController::class,'about'])->name('about');
Route::post('mission',[BusinessinfoController::class,'mission'])->name('mission');
Route::post('journey',[BusinessinfoController::class,'journey'])->name('journey');

Route::post('add_product',[ProductController::class,'add_product'])->name('add_product');
Route::post('update_product',[ProductController::class,'update_product'])->name('update_product');
Route::delete('deleteProduct/{id}',[ProductController::class,'deleteProduct'])->name('deleteProduct');


Route::post('updateinfo',[UserController::class,'updateinfo'])->name('updateinfo');
Route::post('updatepersonalinfo',[UserController::class,'updatepersonalinfo'])->name('updatepersonalinfo');
Route::post('updatebusinessinfo',[BusinessinfoController::class,'updatebusinessinfo'])->name('updatebusinessinfo');
Route::post('updatebusiness',[BusinessinfoController::class,'updatebusiness'])->name('updatebusiness');
// Route::post('audience_need',[BusinessinfoController::class,'audience_need'])->name('audience_need');
Route::post('saveproductioncost',[SalesforcastController::class,'updatesales'])->name('saveproductioncost');
Route::get('/get-lgas/{stateId}', [LgaController::class, 'getLGAs'])->name('get-lgas');


Route::get('/sme',[SiteController::class, 'sme'])->name('sme');
Route::get('/loaners',[SiteController::class, 'loaners'])->name('loaners');
Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::get('pdf',[PdfService::class,'viewPdf'])->name('viewPdf');
        Route::resource('businessinfos', BusinessinfoController::class);
        Route::resource('cashlows', CashflowController::class);
        // Route::resource('products', ProductController::class);
        Route::resource('salesforcasts', SalesforcastController::class);
        Route::resource('users', UserController::class);
        Route::get('personal',[SiteController::class,'personal'])->name('personal');
        Route::post('create-expenses',[ExpensesController::class,'update'])->name('create-expenses');
        Route::get('employees',[SiteController::class,'employees'])->name('employees');
        Route::get('finance',[SiteController::class,'finance'])->name('finance');
        Route::get('financial-record/{id}',[SiteController::class,'financialRecord'])->name('financial-record');
        Route::get('startup-cost',[SiteController::class,'startupCost'])->name('startup-cost');
        Route::get('personalinfo',[SiteController::class,'personalinfo'])->name('personalinfo');
        Route::get('dashboard',[SiteController::class,'dashboard'])->name('dashboard');
        Route::get('loanamount',[SiteController::class,'loanamount'])->name('loanamount');
       
    });
