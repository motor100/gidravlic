<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LkController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\AjaxController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'home'])->name('home');

Route::get('/catalog', [MainController::class, 'catalog']);

Route::get('/catalog/{slug}', [MainController::class, 'single_product']);

Route::get('/cart', [MainController::class, 'cart'])->name('cart');

Route::post('/rmfromcart', [MainController::class, 'rm_from_cart']);

Route::get('/clear-cart', [MainController::class, 'clear_cart']);

Route::get('/poisk', [MainController::class, 'poisk']);

Route::get('/favourites', [MainController::class, 'favourites']);

Route::get('/clear-favourites', [MainController::class, 'clear_favourites']);

Route::get('/comparison', [MainController::class, 'comparison']);

Route::get('/clear-comparison', [MainController::class, 'clear_comparison']);

Route::get('/company', [MainController::class, 'company']);

Route::get('/services', [MainController::class, 'services']);

Route::get('/payment', [MainController::class, 'payment']);

Route::get('/delivery', [MainController::class, 'delivery']);

Route::get('/warranty', [MainController::class, 'warranty']);

Route::get('/calculators', [CalculatorController::class, 'calculators']);

Route::get('/calculators/raschet-moshchnosti-raskhoda-i-davleniya-gidroprivoda', [CalculatorController::class, 'raschet_moshchnosti_raskhoda_i_davleniya_gidroprivoda']);

Route::get('/calculators/raschet-diametra-truboprovoda-skorosti-potoka', [CalculatorController::class, 'raschet_diametra_truboprovoda_skorosti_potoka']);

Route::get('/calculators/raschet-parametrov-gidrocilindra-po-ego-razmeram', [CalculatorController::class, 'raschet_parametrov_gidrocilindra_po_ego_razmeram']);

Route::get('/calculators/raschet-razmerov-gidrocilindra-po-tekhnicheskim-parametram', [CalculatorController::class, 'raschet_razmerov_gidrocilindra_po_tekhnicheskim_parametram']);

Route::get('/calculators/raschet-podachi-nasosa', [CalculatorController::class, 'raschet_podachi_nasosa']);

Route::get('/calculators/raschet-oborotov-gidromotora', [CalculatorController::class, 'raschet_oborotov_gidromotora']);

Route::get('/calculators/raschet-krutyashchego-momenta-gidromotora-obem-i-davlenie', [CalculatorController::class, 'raschet_krutyashchego_momenta_gidromotora_obem_i_davlenie']);

Route::get('/calculators/raschet-krutyashchego-momenta-na-valu-moshchnost-i-oboroty', [CalculatorController::class, 'raschet_krutyashchego_momenta_na_valu_moshchnost_i_oboroty']);

Route::get('/calculators/raschet-obema-plastinchatogo-nasosa-po-geometricheskim-razmeram', [CalculatorController::class, 'raschet_obema_plastinchatogo_nasosa_po_geometricheskim_razmeram']);

Route::get('/calculators/raschet-obema-shesterennogo-nasosa-po-geometricheskim-razmeram', [CalculatorController::class, 'raschet_obema_shesterennogo_nasosa_po_geometricheskim_razmeram']);

Route::get('/contacts', [MainController::class, 'contacts']);

Route::get('/create-order', [MainController::class, 'create_order']);

Route::post('create-order-handler', [MainController::class, 'create_order_handler']);

Route::get('/thank-you', [MainController::class, 'thank_you'])->name('thank-you');



// temp
Route::get('/category', [MainController::class, 'category']);




Route::get('/politika-konfidencialnosti', [MainController::class, 'politika_konfidencialnosti']);

Route::get('/polzovatelskoe-soglashenie-s-publichnoj-ofertoj', [MainController::class, 'polzovatelskoe_soglashenie_s_publichnoj_ofertoj']);

Route::get('/garantiya-vozvrata-denezhnyh-sredstv', [MainController::class, 'garantiya_vozvrata_denezhnyh_sredstv']);

Route::get('/ajax/we-use-cookie', [AjaxController::class, 'we_use_cookie']);

Route::get('/ajax/add-to-cart', [AjaxController::class, 'add_to_cart']);

Route::get('/ajax/add-to-favourites', [AjaxController::class, 'add_to_favourites']);

Route::get('/ajax/add-to-comparison', [AjaxController::class, 'add_to_comparison']);

Route::post('/ajax/pluscart', [AjaxController::class, 'ajax_plus_cart']);

Route::post('/ajax/minuscart', [AjaxController::class, 'ajax_minus_cart']);


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Личный кабинет
Route::middleware('auth')->group(function () {
    Route::get('/lk/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/lk/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/lk/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/lk', [LkController::class, 'home'])->name('lk.index');
    Route::get('/lk/{id}', [LkController::class, 'order'])->name('lk.order');
});

require __DIR__.'/auth.php';

// Fallback route
Route::fallback([MainController::class, 'page_404']);