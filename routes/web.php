<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\PdfController;
use App\Http\Controllers\dashboard\PackController;
use App\Http\Controllers\dashboard\AdminController;
use App\Http\Controllers\AjaxRequest\AjaxController;
use App\Http\Controllers\dashboard\DomaineController;
use App\Http\Controllers\dashboard\QualiteController;
use App\Http\Controllers\dashboard\SecteurController;
use App\Http\Controllers\dashboard\ActiviteController;
use App\Http\Controllers\dashboard\ServicesController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\PartenaireController;
use App\Http\Controllers\dashboard\IntervenantController;
use App\Http\Controllers\dashboard\NotificationController;
use App\Http\Controllers\dashboard\RepresentantsController;
use App\Http\Controllers\dashboard\RessortissantController;
use App\Http\Controllers\dashboard\TypesServicesController;
use App\Http\Controllers\dashboard\FormeJuridiqueController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthenticatedSessionController::class, 'create'])
    ->name('home');

});

Route::group([ 'prefix' => 'dashboard','middleware' => 'auth'], function() {
   
    Route::get('/',[DashboardController::class, 'dashboard'])->name('dashboard');
    
    Route::get('/contrat-accompagnement',[DashboardController::class, 'accompagnement'])->name('accompagnement');
    Route::post('/contrat-accompagnement',[DashboardController::class, 'enregis_accompagnement'])->name('enregis_accompagnement');

    Route::get('/contrat-adhesion',[DashboardController::class, 'adhesion'])->name('adhesion');
    Route::post('/contrat-adhesion',[DashboardController::class, 'enregis_adhesion'])->name('enregis_adhesion');

    Route::get('/orientation',[DashboardController::class, 'orientation'])->name('orientation');
    Route::post('/orientation',[DashboardController::class, 'enregis_orientation'])->name('enregis_orientation');

    Route::get('/documents',[DashboardController::class, 'documents'])->name('documents');
    Route::post('/documents',[DashboardController::class, 'enregis_documents'])->name('enregis_documents');

    // Is Admin
Route::group(['middleware' => 'IsAdmin'], function() { 

    Route::get('/notifications',[NotificationController::class, 'notifications'])->name('notifications');
    Route::resource('administation', AdminController::class);
    Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    
    Route::resource('typesServices', TypesServicesController::class);
    Route::resource('services', ServicesController::class);
    Route::resource('representants', RepresentantsController::class);
    Route::resource('formesJuridiques', FormeJuridiqueController::class);
    Route::resource('secteurs', SecteurController::class);
    Route::resource('packs', PackController::class);
    Route::resource('domaines', DomaineController::class);
    Route::resource('activites', ActiviteController::class);
    Route::resource('qualites', QualiteController::class);
    Route::resource('partenaires', PartenaireController::class);
    Route::resource('intervenants', IntervenantController::class);


});


    Route::resource('ressortissant', RessortissantController::class);

// PDF ROUTES
    Route::get('fiche_res/{id}', [PdfController::class, 'fiche_res'])->name('fiche_res');
    Route::get('action_effectue/{id}', [PdfController::class, 'action_effectue'])->name('action_effectue');
    Route::get('contratAccompagnement/{id}', [PdfController::class, 'contratAccompagnement'])->name('contratAccompagnement');
    Route::get('orientation/{id}', [PdfController::class, 'orientation']);
    Route::get('documents/{action}/{id}', [PdfController::class, 'documents']);
    Route::get('adhesion/{id}', [PdfController::class, 'adhesion']);


// Ajax Routes 
Route::post('/getservice', [AjaxController::class, 'getservice'])->name('getservice');
Route::post('/packs/getservice', [AjaxController::class, 'getservice'])->name('packgetservice');
Route::post('/packs/{id}/getservice', [AjaxController::class, 'getservice'])->name('packgetserviceedit');

Route::post('/suppservice', [AjaxController::class, 'suppservice'])->name('suppservice');
Route::post('/packs/{id}/suppservice', [AjaxController::class, 'suppservice'])->name('suppservicedepack');

Route::post('/getpack', [AjaxController::class, 'getpack'])->name('getpack');
Route::post('/supppack', [AjaxController::class, 'supppack'])->name('supppack');

Route::post('/getactivite', [AjaxController::class, 'getactivite'])->name('getactivite');
Route::post('/getdomaine', [AjaxController::class, 'getdomaine'])->name('getdomaine');

Route::post('/getpartenaire', [AjaxController::class, 'getpartenaire']);
// Route::post('/confirmerSupp', [AjaxController::class, 'confirmerSupp']);

});
Route::post('/chercher', [AjaxController::class, 'chercher']);

require __DIR__.'/auth.php';
