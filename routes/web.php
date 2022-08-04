<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrokerController;
use App\Http\Controllers\InvesterController;
use App\Http\Controllers\EmailTemplateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PropertyController;
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
Route::any('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
});
Route::any('/', [LoginController::class,'index']);
Route::any('/submitlogin', [LoginController::class,'submitlogin']);
Route::any('/sentinvesterlink/{token}', [InvesterController::class,'sentinvesterlink']);
Route::any('/submitlinkinvester', [InvesterController::class,'submitlinkinvester']);
Route::middleware('login.check')->group(function(){
    Route::any('/logout', [LoginController::class,'logout']);

    Route::any('/admindashboard', [DashboardController::class,'admindashboard']);
    Route::any('/clientdashboard', [DashboardController::class,'clientdashboard']);
    Route::any('/vadashboard', [DashboardController::class,'vadashboard']);

    Route::any('/adminresources', [AdminController::class,'adminresources']);
    Route::any('/adduser', [AdminController::class,'adduser']);
    Route::any('/submituser', [AdminController::class,'submituser']);
    Route::any('/edituser/{id}', [AdminController::class,'edituser']);
    Route::any('/submitedituser', [AdminController::class,'submitedituser']);
    Route::any('/viewprofile/{id}', [AdminController::class,'viewprofile']);

    Route::any('/addinvester', [InvesterController::class,'addinvester']);
    Route::any('/investerlist', [InvesterController::class,'investerlist']);
    Route::any('/submitinvester', [InvesterController::class,'submitinvester']);
    Route::any('/editinvester/{id}', [InvesterController::class,'editinvester']);
    Route::any('/submiteditinvester', [InvesterController::class,'submiteditinvester']);
    Route::any('/deleteinvester/{id}', [InvesterController::class,'deleteinvester']);
    Route::any('/submitcommentinvester/{id}/{comment}', [InvesterController::class,'submitcommentinvester']);
    Route::any('/commentinvester/{id}', [InvesterController::class,'commentinvester']);
    Route::any('/submitassigntask/{id}/{name}/{to}/{at}', [InvesterController::class,'submitassigntask']);
    Route::any('/taskinvester/{id}', [InvesterController::class,'taskinvester']);
    Route::any('/generateinvesterlink', [InvesterController::class,'generateinvesterlink']);

    Route::any('/brokerlist', [BrokerController::class,'brokerlist']);
    Route::any('/addbroker', [BrokerController::class,'addbroker']);
    Route::any('/submitbroker', [BrokerController::class,'submitbroker']);
    Route::any('/editbroker/{id}', [BrokerController::class,'editbroker']);
    Route::any('/submiteditbroker', [BrokerController::class,'submiteditbroker']);
    Route::any('/deletebroker/{id}', [BrokerController::class,'deletebroker']);
    Route::any('/brokeruploader', [BrokerController::class,'brokeruploader']);

    Route::any('/submitemailtemplate', [EmailTemplateController::class,'submitemailtemplate']);
    Route::any('/editemailtemplate/{id}/{type}', [EmailTemplateController::class,'editemailtemplate']);
    Route::any('/submiteditemailtemplate', [EmailTemplateController::class,'submiteditemailtemplate']);
    Route::any('/deleteemailtemplate/{id}/{type}', [EmailTemplateController::class,'deleteemailtemplate']);
    Route::any('/emailtemplatelist', [EmailTemplateController::class,'emailtemplatelist']);

    Route::any('/tasklist', [TaskController::class,'tasklist']);
    Route::any('/submittask/{name}/{to}/{at}/{type}/{for}', [TaskController::class,'submittask']);
    Route::any('/task', [TaskController::class,'task']);

    Route::any('/clientresources', [ClientController::class,'clientresources']);
    Route::any('/varesources', [ClientController::class,'varesources']);
    Route::any('/valist', [ClientController::class,'valist']);
    Route::any('/removeva', [ClientController::class,'removeva']);
    Route::any('/editva/{id}', [ClientController::class,'editva']);

    Route::any('/propertyuploader', [PropertyController::class,'propertyuploader']);
    Route::any('/propertylist', [PropertyController::class,'propertylist']);
    Route::any('/deleteproperty/{id}/{type}', [PropertyController::class,'deleteproperty']);
    Route::any('/deletepropertyupload/{id}', [PropertyController::class,'deletepropertyupload']);
    Route::any('/propertyboard', [PropertyController::class,'propertyboard']);
    Route::any('/propertydetails/{id}', [PropertyController::class,'propertydetails']);
    Route::any('/editproperty/{id}/{type}', [PropertyController::class,'editproperty']);
    Route::any('/submiteditproperty', [PropertyController::class,'submiteditproperty']);
    Route::any('/submitcommentproperty/{id}/{comment}', [PropertyController::class,'submitcommentproperty']);
    Route::any('/commentproperty/{id}', [PropertyController::class,'commentproperty']);
    Route::any('/submitpropertyassigntask/{id}/{name}/{to}/{at}', [PropertyController::class,'submitpropertyassigntask']);
    Route::any('/taskproperty/{id}', [PropertyController::class,'taskproperty']);
});