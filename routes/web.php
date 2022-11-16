<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserPackageController;
use App\Http\Controllers\PaymentCallbackController;
use App\Http\Controllers\DisableDateController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('dashboard');
Route::get('/home', [HomeController::class, 'index_home'])->name('home_user');
Route::get('/home/gallery', [HomeController::class, 'gallery'])->name('gallery_user');
Route::get('/home/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/home/contact', [HomeController::class, 'send_email'])->name('contact.email');
Route::get('/home/profile', [ProfileController::class, 'information'])->name('profile');
Route::get('/home/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::get('/home/{order}/edit', [ProfileController::class, 'edit_order'])->name('profile.edit_order');
Route::post('/home/{order}/edit', [ProfileController::class, 'update_order'])->name('profile.update_order');
Route::get('/home/{order}/cancel', [ProfileController::class, 'cancel_order'])->name('profile.cancel_order');
Route::get('/home/{order}/cancel_car', [ProfileController::class, 'cancel_car_order'])->name('profile.cancel_car_order');
Route::get('/home/profile/list', [ProfileController::class, 'order'])->name('profile.list');
Route::get('/home/profile/list_order', [ProfileController::class, 'list_order'])->name('profile.list_order');
Route::get('/home/profile/list_car', [ProfileController::class, 'car_order'])->name('profile.list_car');
Route::get('/home/profile/list_car_order', [ProfileController::class, 'list_car_order'])->name('profile.list_car_order');
Route::get('/home/{order}/review', [ProfileController::class, 'review'])->name('profile.review');
Route::post('/home/{order}/review', [ProfileController::class, 'review_order'])->name('profile.review_order');
Route::post('/home/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/home/profile/delete', [ProfileController::class, 'delete'])->name('profile.delete');
Route::get('/logout', [ProfileController::class, 'logout'])->name('logout');





Route::group(['middleware' => ['admin']], function () {

    Route::get('/dashboard/list', [DashboardController::class, 'list'])->name('dashboard.list');
    Route::get('/dashboard/{order}/edit_order', [DashboardController::class, 'edit_order'])->name('dashboard.edit');
    Route::post('/dashboard/{order}', [DashboardController::class, 'update'])->name('dashboard.update');
    Route::get('/dashboard/list_car_order', [DashboardController::class, 'list_car_order'])->name('dashboard.list_car_order');
    Route::get('/dashboard/{car_order}/edit_car_order', [DashboardController::class, 'edit_car_order'])->name('dashboard.edit_car_order');
    Route::post('/dashboard/{car_order}/update_car_order', [DashboardController::class, 'update_car_order'])->name('dashboard.update_car_order');
    Route::get('/dashboard/{date}/departure_date', [DashboardController::class, 'departure'])->name('dashboard.departure');
    Route::get('/dashboard/{date}/departure_list', [DashboardController::class, 'departure_list'])->name('dashboard.departure_list');
    Route::get('/dashboard/{date}/car_list', [DashboardController::class, 'car_list'])->name('dashboard.car_list');
    Route::get('/dashboard/{date}/date', [DashboardController::class, 'disable_date'])->name('dashboard.disable_date');
    Route::get('/dashboard/{date}/car', [DashboardController::class, 'disable_date_car'])->name('dashboard.disable_date_car');
    Route::get('/dashboard/{date}/enable_date', [DashboardController::class, 'enable_date'])->name('dashboard.enable_date');
    Route::get('/dashboard/{date}/enable_car', [DashboardController::class, 'enable_date_car'])->name('dashboard.enable_date_car');

    Route::get('/package', [PackageController::class, 'index'])->name('package.index');
    Route::get('/package/add', [PackageController::class, 'add_show'])->name('package.add');
    Route::post('/package/add', [PackageController::class, 'add'])->name('package.store');
    Route::get('/package/add_tour_hotel', [PackageController::class, 'add_tour_hotel_show'])->name('package.add_tour_hotel');
    Route::post('/package/add_tour_hotel', [PackageController::class, 'add_tour_hotel'])->name('package.store_tour');
    Route::get('/package/list', [PackageController::class, 'list'])->name('package.list');
    Route::get('/package/{package}/edit', [PackageController::class, 'edit'])->name('package.edit');
    Route::post('/package/{package}', [PackageController::class, 'update'])->name('package.update');
    Route::post('/package/{package}/update_tour', [PackageController::class, 'update_tour'])->name('package.update_tour');
    Route::get('/package/{package}/destroy', [PackageController::class, 'destroy'])->name('package.destroy');
    Route::get('/package/{package}/info', [PackageController::class, 'info'])->name('package.info');

    Route::get('/destination', [DestinationController::class, 'index'])->name('destination.index');
    Route::get('/destination/add', [DestinationController::class, 'add_show'])->name('destination.add');
    Route::post('/destination/add', [DestinationController::class, 'add'])->name('destination.store');
    Route::get('/destination/list', [DestinationController::class, 'list'])->name('destination.list');
    Route::get('/destination/{destination}/edit', [DestinationController::class, 'edit'])->name('destination.edit');
    Route::post('/destination/{destination}', [DestinationController::class, 'update'])->name('destination.update');
    Route::get('/destination/{destination}/destroy', [DestinationController::class, 'destroy'])->name('destination.destroy');
    Route::get('/destination/getData', [DestinationController::class, 'getData'])->name('destination.getData');

    Route::get('/restaurant', [RestaurantController::class, 'index'])->name('restaurant.index');
    Route::get('/restaurant/add', [RestaurantController::class, 'add_show'])->name('restaurant.add');
    Route::post('/restaurant/add', [RestaurantController::class, 'add'])->name('restaurant.store');
    Route::get('/restaurant/list', [RestaurantController::class, 'list'])->name('restaurant.list');
    Route::get('/restaurant/{restaurant}/edit', [RestaurantController::class, 'edit'])->name('restaurant.edit');
    Route::post('/restaurant/{restaurant}', [RestaurantController::class, 'update'])->name('restaurant.update');
    Route::get('/restaurant/{restaurant}/destroy', [RestaurantController::class, 'destroy'])->name('restaurant.destroy');
    Route::get('/restaurant/getData', [RestaurantController::class, 'getData'])->name('restaurant.getData');

    Route::get('/hotel', [HotelController::class, 'index'])->name('hotel.index');
    Route::get('/hotel/add', [HotelController::class, 'add_show'])->name('hotel.add');
    Route::post('/hotel/add', [HotelController::class, 'add'])->name('hotel.store');
    Route::get('/hotel/list', [HotelController::class, 'list'])->name('hotel.list');
    Route::get('/hotel/{hotel}/edit', [HotelController::class, 'edit'])->name('hotel.edit');
    Route::post('/hotel/{hotel}', [HotelController::class, 'update'])->name('hotel.update');
    Route::get('/hotel/{hotel}/destroy', [HotelController::class, 'destroy'])->name('hotel.destroy');

    Route::get('/ticket', [TicketController::class, 'index'])->name('ticket.index');
    Route::get('/ticket/add', [TicketController::class, 'add_show'])->name('ticket.add');
    Route::post('/ticket/add', [TicketController::class, 'add'])->name('ticket.store');
    Route::get('/ticket/list', [TicketController::class, 'list'])->name('ticket.list');
    Route::get('/ticket/{ticket}/edit', [TicketController::class, 'edit'])->name('ticket.edit');
    Route::post('/ticket/{ticket}', [TicketController::class, 'update'])->name('ticket.update');
    Route::get('/ticket/{ticket}/destroy', [TicketController::class, 'destroy'])->name('ticket.destroy');

    Route::get('/disable_date', [DisableDateController::class, 'index'])->name('disable_date.index');
    Route::get('/disable_date/add', [DisableDateController::class, 'add_show'])->name('disable_date.add');
    Route::post('/disable_date/add', [DisableDateController::class, 'add'])->name('disable_date.store');
    Route::get('/disable_date/list', [DisableDateController::class, 'list'])->name('disable_date.list');
    Route::get('/disable_date/{date}/destroy', [DisableDateController::class, 'destroy'])->name('disable_date.destroy');

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/list', [UserController::class, 'list'])->name('user.list');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/{user}/ban', [UserController::class, 'ban'])->name('user.ban');
    Route::get('/user/{user}/info', [UserController::class, 'info'])->name('user.info');
    Route::get('/user/{user}/list', [UserController::class, 'list_order'])->name('user.list_order');

    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order/add', [OrderController::class, 'add_show'])->name('order.add');
    Route::post('/order/add', [OrderController::class, 'add'])->name('order.store');
    Route::get('/order/add_car', [OrderController::class, 'add_car_show'])->name('order.add_car');
    Route::post('/order/add_car', [OrderController::class, 'add_car'])->name('order.store_car');
    Route::get('/order/list', [OrderController::class, 'list'])->name('order.list');
    Route::get('/order/{order}/edit', [orderController::class, 'edit'])->name('order.edit');
    Route::post('/order/{order}', [OrderController::class, 'update'])->name('order.update');
    Route::get('/order/{order}/destroy', [OrderController::class, 'destroy'])->name('order.destroy');

    Route::get('/car', [CarController::class, 'index'])->name('car.index');
    Route::get('/car/add', [CarController::class, 'add_show'])->name('car.add');
    Route::post('/car/add', [CarController::class, 'add'])->name('car.store');
    Route::get('/car/list', [CarController::class, 'list'])->name('car.list');
    Route::get('/car/{car}/edit', [CarController::class, 'edit'])->name('car.edit');
    Route::post('/car/{car}', [CarController::class, 'update'])->name('car.update');
    Route::get('/car/{car}/destroy', [CarController::class, 'destroy'])->name('car.destroy');

    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/gallery/add', [GalleryController::class, 'add_show'])->name('gallery.add');
    Route::post('/gallery/add', [GalleryController::class, 'add'])->name('gallery.store');
    Route::get('/gallery/list', [GalleryController::class, 'list'])->name('gallery.list');
    Route::get('/gallery/{gallery}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::post('/gallery/{gallery}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::get('/gallery/{gallery}/destroy', [GalleryController::class, 'destroy'])->name('gallery.destroy');
 });

Route::get('/get_villages', [OrderController::class, 'get_villages'])->name('order.get_villages');
Route::get('/get_districts', [OrderController::class, 'get_districts'])->name('order.get_districts');

Route::get('/home/car', [UserPackageController::class, 'list_car'])->name('user_car.list');
Route::get('/home/car/{car}/order', [UserPackageController::class, 'order_car'])->name('user_car.order');
Route::post('/home/car/{car}/store', [UserPackageController::class, 'store_car_order'])->name('user_car.store');
Route::get('/home/optional_package', [UserPackageController::class, 'list_optional_package'])->name('optional_package.list');
Route::get('/home/tour_package', [UserPackageController::class, 'list_tour_package'])->name('tour_package.list');
Route::get('/home/tour_package/{package}/detail', [UserPackageController::class, 'tour_package_detail'])->name('tour_package.info');
Route::get('/home/optional_package/{package}/detail', [UserPackageController::class, 'optional_package_detail'])->name('optional_package.info');
Route::get('/home/package/{package}/order', [UserPackageController::class, 'order_package'])->name('user_package.order');
Route::post('/home/package/{package}/store', [UserPackageController::class, 'store_package_order'])->name('user_package.store');
Route::get('/home/{type}/{order}/payment', [UserPackageController::class, 'payment'])->name('user.payment');
Route::post('/home/{type}/{order}/payment', [UserPackageController::class, 'payment_post'])->name('user.payment_post');
Route::post('/home/{type}/{order}/payment_update', [UserPackageController::class, 'update_payment'])->name('user.update_payment');
Route::post('/payments/midtrans-notification', [PaymentCallbackController::class, 'receive']);

Auth::routes();