<?php

use App\Livewire\Auth\ForgotPasswordPage;
use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\Auth\ResetPasswordPage;
use App\Livewire\CancelPage;
use App\Livewire\CartPage;
use App\Livewire\CategoriesPage;
use App\Livewire\CheckoutPage;
use App\Livewire\HomePage;
use App\Livewire\MyOrderDetailPage;
use App\Livewire\MyOrdersPage;
use App\Livewire\ProductDetailPage;
use App\Livewire\ProductsPage;
use App\Livewire\ShowPage;
use App\Livewire\SuccessPage;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\InvoiceController;

Route::get('/', HomePage::class);
Route::get('/categories', CategoriesPage::class);
Route::get('/products', ProductsPage::class);
Route::get('/cart', CartPage::class);
Route::get('/products/{slug}', ProductDetailPage::class);


Route::middleware('guest')->group(function(){
    Route::get('/login', LoginPage::class)->name('login');
    Route::get('/register', RegisterPage::class);
    Route::get('/forgot', ForgotPasswordPage::class)->name('password.request');
    Route::get('/reset/{token}', ResetPasswordPage::class)->name('password.reset');
});


// Logged-in user only routes
Route::middleware('auth')->group(function(){
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');

    Route::get('/my-orders', MyOrdersPage::class);
    Route::get('/my-orders/{order_id}', MyOrderDetailPage::class)->name('my-orders.show');
    Route::get('/success', SuccessPage::class)->name('success');
    Route::get('cancel', CancelPage::class)->name('cancel');
});

// Guest + Auth user both can access this
Route::get('/checkout', CheckoutPage::class)->name('checkout');
    Route::get('/success', SuccessPage::class)->name('success');
    Route::get('cancel', CancelPage::class)->name('cancel');


Route::get('/page/{id}', ShowPage::class)->name('page');


Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('orders/{order}/invoice', [InvoiceController::class, 'show'])->name('admin.orders.invoice.show');
    Route::get('orders/{order}/invoice/download', [InvoiceController::class, 'download'])->name('admin.orders.invoice.download');
});


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // এখানে import করুন

Route::post('/webhook/steadfast', function (Request $request) {
    Log::info('Received webhook:', $request->all());  // Log::info ব্যবহার
    return response()->json(['status' => 'success']);
})->name('webhooks.steadfast');

