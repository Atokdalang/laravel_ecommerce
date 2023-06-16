<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
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
Route::post('payments/notification', [\App\Http\Controllers\PaymentController::class, 'notification'])->name('payment.notification');
// Rute untuk menangani notifikasi pembayaran


Route::get('payments/completed', [\App\Http\Controllers\PaymentController::class, 'completed'])->name('payment.completed');
// Rute untuk menangani pembayaran yang telah selesai


Route::get('payments/failed', [\App\Http\Controllers\PaymentController::class, 'failed'])->name('payment.failed');
// Rute untuk menangani pembayaran yang gagal


Route::get('payments/unfinish', [\App\Http\Controllers\PaymentController::class, 'unfinish'])->name('payment.unfinish');
// Rute untuk menangani pembayaran yang belum selesai


Route::get('text', function() { return view('frontend.payments.success');});
// Rute untuk menampilkan halaman teks contoh


Route::get('profile', [\App\Http\Controllers\Auth\ProfileController::class, 'index'])->name('profile.index');
// Rute untuk menampilkan profil pengguna


Route::put('profile', [\App\Http\Controllers\Auth\ProfileController::class, 'update'])->name('profile.update');
// Rute untuk memperbarui profil pengguna


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
//Route untuk homepage atau halaman awal setelah login


Route::get('/contact', [\App\Http\Controllers\HomeController::class, 'contact'])->name('frontend.contact');
//Route untuk halaman contact


Route::post('/contact', '\App\Http\Controllers\HomeController@submitContactForm')->name('contact.submit');
//Route untuk halaman notifikasi contact


Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
//Route untuk halaman menangani langganan newsletter


Route::get('search', [\App\Http\Controllers\ShopController::class, 'search'])->name('search');
// Route ini digunakan untuk melakukan pencarian produk di toko.
// Ketika URL '/search' diakses dengan metode GET, akan menjalankan method 'search' pada 'ShopController'.
// Route ini diberi nama 'search' untuk memudahkan penggunaan URL dan pembuatan tautan.


Route::get('shop/{slug?}', [\App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
// Route ini digunakan untuk menampilkan halaman utama toko.
// Ketika URL '/shop' diakses dengan metode GET, akan menjalankan method 'index' pada 'ShopController'.
// Jika terdapat parameter slug (opsional), akan digunakan untuk menampilkan halaman toko spesifik.
// Route ini diberi nama 'shop.index' untuk memudahkan penggunaan URL dan pembuatan tautan.


Route::get('shop/tag/{slug}', [\App\Http\Controllers\ShopController::class, 'tag'])->name('shop.tag');
// Route ini digunakan untuk menampilkan produk berdasarkan tag di toko.
// Ketika URL '/shop/tag/{slug}' diakses dengan metode GET, akan menjalankan method 'tag' pada 'ShopController'.
// Parameter slug akan digunakan untuk mencari produk dengan tag tertentu.
// Route ini diberi nama 'shop.tag' untuk memudahkan penggunaan URL dan pembuatan tautan.


Route::get('product/{slug}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
// Route ini digunakan untuk menampilkan halaman detail produk.
// Ketika URL '/product/{slug}' diakses dengan metode GET, akan menjalankan method 'show' pada 'ProductController'.
// Parameter slug akan digunakan untuk mencari produk berdasarkan slug (identifikasi unik).
// Route ini diberi nama 'product.show' untuk memudahkan penggunaan URL dan pembuatan tautan.


Route::resource('favorite', \App\Http\Controllers\FavoriteController::class)->only(['index','store','destroy']);
// Route ini digunakan untuk mengatur operasi CRUD terhadap favorit.
// Menggunakan controller 'FavoriteController' dengan menggunakan metode resource.
// Hanya mengizinkan operasi index (menampilkan daftar favorit), store (menyimpan favorit baru), dan destroy (menghapus favorit).


Route::resource('cart', \App\Http\Controllers\CartController::class)->only(['index','store','update', 'destroy']);
// Route ini digunakan untuk mengatur operasi CRUD terhadap keranjang belanja.
// Menggunakan controller 'CartController' dengan menggunakan metode resource.
// Hanya mengizinkan operasi index (menampilkan isi keranjang), store (menambahkan item ke keranjang),
// update (mengupdate item dalam keranjang), dan destroy (menghapus item dari keranjang).


Route::group(['middleware' => 'auth'], function() {
    // Rute-rute yang membutuhkan autentikasi pengguna
    // Ditempatkan di sini


    Route::get('orders/checkout', [\App\Http\Controllers\OrderController::class, 'process'])->name('checkout.process');
    // Rute ini digunakan untuk memproses checkout saat pengguna ingin melakukan pembelian.
    // Mengarahkan ke method process di OrderController.
    // Dinamai dengan alias checkout.process.


    Route::get('orders/cities', [\App\Http\Controllers\OrderController::class, 'cities']);
    // Rute ini digunakan untuk mengambil daftar kota yang tersedia untuk pengiriman.
    // Mengarahkan ke method cities di OrderController.


    Route::post('orders/shipping-cost', [\App\Http\Controllers\OrderController::class, 'shippingCost']);
    // Rute ini digunakan untuk menghitung biaya pengiriman berdasarkan kota pengiriman yang dipilih.
    // Mengarahkan ke method shippingCost di OrderController.


    Route::post('orders/set-shipping', [\App\Http\Controllers\OrderController::class, 'setShipping']);
    // Rute ini digunakan untuk mengatur opsi pengiriman yang dipilih oleh pengguna.
    // Mengarahkan ke method setShipping di OrderController.


    Route::post('orders/checkout', [\App\Http\Controllers\OrderController::class, 'checkout'])->name('checkout');
    // Rute ini digunakan untuk menyelesaikan proses checkout dan menyimpan pesanan.
    // Mengarahkan ke method checkout di OrderController.
    // Dinamai dengan alias checkout.


    Route::get('orders/received/{orderId}', [\App\Http\Controllers\OrderController::class, 'received'])->name('checkout.received');
    // Rute ini digunakan untuk menampilkan halaman terima kasih setelah pengguna berhasil melakukan pembayaran dan pesanan diterima.
    // Mengarahkan ke method received di OrderController.
    // Dinamai dengan alias checkout.received.


    Route::get('orders', [\App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
    // Rute ini digunakan untuk menampilkan daftar pesanan pengguna.
    // Mengarahkan ke method index di OrderController.
    // Dinamai dengan alias orders.index.


    Route::get('orders/{orderId}', [\App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');
    // Rute ini digunakan untuk menampilkan detail pesanan tertentu berdasarkan ID pesanan.
    // Mengarahkan ke method show di OrderController.
    // Dinamai dengan alias orders.show.


    Route::group(['middleware' => 'isAdmin','prefix' => 'admin', 'as' => 'admin.'], function() {
        // Rute-rute yang membutuhkan autentikasi admin
        // Tempatkan route admin disini


        Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
        // Route untuk halaman dashboard admin


        Route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class);
        // Resource routes untuk manajemen izin (permissions)


        Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
        // Resource routes untuk manajemen peran (roles)


        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        // Resource routes untuk manajemen pengguna (users)


        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
        // Resource routes untuk manajemen kategori (categories)


        Route::resource('tags', \App\Http\Controllers\Admin\TagController::class);
        // Resource routes untuk manajemen tag


        Route::post('/products/remove-image', [\App\Http\Controllers\Admin\ProductController::class, 'removeImage'])->name('products.removeImage');
        // Route untuk menghapus gambar produk


        Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
        // Resource routes untuk manajemen produk (products)


        Route::resource('reviews', \App\Http\Controllers\Admin\ReviewController::class)->only(['index','edit','update','destroy','show']);
        // Resource routes untuk manajemen ulasan (reviews)


        Route::resource('slides', \App\Http\Controllers\Admin\SlideController::class);
        // Resource routes untuk manajemen slide


        Route::get('slides/{slideId}/up', [\App\Http\Controllers\Admin\SlideController::class, 'moveUp']);
        // Route untuk memindahkan slide ke atas


        Route::get('slides/{slideId}/down', [\App\Http\Controllers\Admin\SlideController::class, 'moveDown']);
        // Route untuk memindahkan slide ke bawah


        Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class)->only(['index','show','destroy']);
        // Resource routes untuk manajemen pesanan (orders)


        Route::get('orders/{orderId}/cancel', [\App\Http\Controllers\Admin\OrderController::class, 'cancel'])->name('orders.cancel');
        // Route untuk membatalkan pesanan


        Route::put('orders/cancel/{orderId}', [\App\Http\Controllers\Admin\OrderController::class, 'cancelUpdate'])->name('orders.cancelUpdate');
        // Route untuk memperbarui pembatalan pesanan


        Route::post('orders/complete/{orderId}', [\App\Http\Controllers\Admin\OrderController::class, 'complete'])->name('orders.complete');
        // Route untuk menandai pesanan sebagai selesai


        Route::resource('shipments', \App\Http\Controllers\Admin\ShipmentController::class)->only(['index','edit','update']);
        // Resource routes untuk manajemen pengiriman (shipments)


        Route::get('reports/revenue', [\App\Http\Controllers\Admin\ReportController::class, 'revenue'])->name('reports.revenue');
        // Route untuk melihat laporan pendapatan (revenue)

    });
});


Auth::routes();
// Route untuk autentikasi pengguna seperti login, registrasi, dan pengaturan ulang kata sandi.
// Route ini disediakan oleh sistem otentikasi bawaan Laravel.
