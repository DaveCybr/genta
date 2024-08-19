<?php

use App\Http\Controllers\About2Controller;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VillaController;
use App\Http\Controllers\HomeMenuController;
use App\Http\Controllers\SiteplanController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\LandingPage\ProductController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{id}/detail', [ProductController::class, 'product_detail'])->name('product-detail');
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/{id}/kategori', [ProductController::class, 'product_kategori'])->name('product-kategori');
// Route::get('/villa', [HomeController::class, 'villa'])->name('villa');
// Route::get('/detail', [HomeController::class, 'detail'])->name('detail');
// Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.layouts.dashboard');
    })->name('dashboard');

    //user
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/simpan', [UserController::class, 'simpan']);
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    //villa
    Route::get('/datavilla', [VillaController::class, 'index'])->name('datavilla');
    Route::get('/datavilla/create', [VillaController::class, 'create'])->name('datavilla.create');
    Route::post('/datavilla/simpan', [VillaController::class, 'simpan']);
    Route::get('datavilla/edit/{id}', [VillaController::class, 'edit'])->name('datavilla.edit');
    Route::post('datavilla/update/{id}', [VillaController::class, 'update'])->name('datavilla.update');
    Route::delete('datavilla/destroy/{id}', [VillaController::class, 'destroy'])->name('datavilla.destroy');
    Route::post('gambarvilla/update/{id}', [VillaController::class, 'tambahGambar'])->name('gambarvilla.update');
    Route::get('gambarvilla/data/{id}', [VillaController::class, 'edit'])->name('gambarvilla.data');
    Route::get('mapvilla/map/{id}', [VillaController::class, 'map'])->name('mapvilla.map');
    Route::post('mapvilla/updatemap/{id}', [VillaController::class, 'updatemap'])->name('mapvilla.updatemap');

    //home
    Route::get('/homemenu', [HomeMenuController::class, 'index'])->name('homemenu');
    Route::post('homemenu/update/{id}', [HomeMenuController::class, 'update'])->name('homemenu.update');

    //about
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::post('about/update/{id}', [AboutController::class, 'update'])->name('about.update');

    //about2
    Route::get('/about2', [About2Controller::class, 'index'])->name('about2');
    Route::post('about2/update/{id}', [About2Controller::class, 'update'])->name('about2.update');

    //about3
    Route::get('/siteplanadmin', [SiteplanController::class, 'index'])->name('siteplanadmin');
    Route::post('siteplanadmin/update/{id}', [SiteplanController::class, 'update'])->name('siteplanadmin.update');

    //contact
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('contact/update/{id}', [ContactController::class, 'update'])->name('contact.update');

    //gallery
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
    Route::post('gallery/update/{id}', [GalleryController::class, 'update'])->name('gallery.update');

    //agent
    Route::get('/agent', [AgentController::class, 'index'])->name('agent');
    Route::post('agent/update/{id}', [AgentController::class, 'update'])->name('agent.update');

    //testimoni
    Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni');
    Route::post('testimoni/update/{id}', [TestimoniController::class, 'update'])->name('testimoni.update');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
