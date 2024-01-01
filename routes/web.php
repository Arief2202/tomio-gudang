<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Item;
use App\Models\ItemBrand;
use App\Models\ItemType;
use App\Http\Controllers\OutcomeController;
use App\Http\Controllers\ItemController;
use Illuminate\Http\Request;
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

// Route::get('/', function () {
//     return redirect('/login');
// });

Route::get('/test', function () {
    return view('test');
});

Route::get('/', function () {
    return view('login.read');
});

Route::get('/get-item', function(Request $request){
    return response()->json(Item::where('id', '=', $request->id)->first());
});
Route::get('/get-type', function(Request $request){
    return response()->json(ItemType::where('id', '=', $request->id)->first());
});
Route::get('/get-brand', function(Request $request){
    return response()->json(ItemBrand::where('id', '=', $request->id)->first());
});

Route::middleware('auth')->group(function () {    
    Route::get('/dashboard', function () {
        return redirect('/permintaan');
    })->name('dashboard');

    Route::post('/changeSideBarState', function(Request $request) {
        $user = User::where('id', Auth::user()->id)->first();
        $user->openSidebar = $request->sideBarState;
        $user->save();
    });
    Route::post('/changeDarkMode', function(Request $request) {
        $user = User::where('id', Auth::user()->id)->first();
        $user->darkMode = $request->darkMode;
        $user->save();
    });

    // Route::controller(OutcomeController::class)->group(function () {
    //     Route::get('/dashboard', 'read')->name('dashboard');
    // });
    
    Route::controller(ItemController::class)->group(function () {
        Route::post('/gudang/item/create', 'item_create');
        Route::post('/gudang/jenis/create', 'type_create');
        Route::post('/gudang/merk/create', 'brand_create');

        Route::get('/gudang/item', 'item_read')->name('gudang_item');
        Route::get('/gudang/jenis', 'type_read')->name('gudang_jenis');
        Route::get('/gudang/merk', 'brand_read')->name('gudang_merk');
        
        Route::post('/gudang/item/update', 'item_update');
        Route::post('/gudang/jenis/update', 'type_update');
        Route::post('/gudang/merk/update', 'brand_update');

        Route::post('/gudang/item/delete', 'item_delete');
        Route::post('/gudang/jenis/delete', 'type_delete');
        Route::post('/gudang/merk/delete', 'brand_delete');
        
        Route::get('/stock', 'stock_read')->name('stock');
        Route::get('/stock/income', 'stock_in_read')->name('stock_income');
        Route::get('/stock/outcome', 'stock_out_read')->name('stock_outcome');
    });
});


Route::get('/permintaan', function () {
    return view('test');
})->middleware(['auth', 'verified'])->name('permintaan');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
