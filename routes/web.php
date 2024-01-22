<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EndowController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountAdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\IntroduceController;
use App\Http\Controllers\AccountUserController;
use App\Http\Controllers\CategoryDetailController;
    // Login
    Route::get('/admin-login', [AdminController::class, 'admin_login'])->name('login');
    Route::get('/register-admin', [AdminController::class, 'register_admin']);
    Route::post('/save-admin-register', [AdminController::class, 'save_admin_register']);
    
Route::group(['middleware' => 'adminlogin'], function () {
    //boss admin
    Route::get('/admin-boss', [AdminController::class, 'admin_boss'])->name('admin-boss');
    Route::get('/all-account-user', [AdminController::class, 'all_account_user']);
    Route::post('/admin-dashboard', [AdminController::class, 'admin_dashboard']);
    Route::get('/admin-dashboard', [AdminController::class, 'admin_dashboard']);
    Route::get('/admin-logout', [AdminController::class, 'admin_logout']);
    // End Login
    // staff admin
    Route::get('/admin-staff', [AdminController::class, 'admin_staff'])->name('admin-staff');
    Route::post('/load-basis-spa', [AdminController::class, 'load_basis_spa']);
    Route::get('/load-register-staff', [AdminController::class, 'load_register_staff']);
    Route::post('/add-register-staff', [AdminController::class, 'add_register_staff']);
    // AccountAdmin
    Route::get('/admin-account', [AccountAdminController::class, 'admin_account']);
    Route::post('/select-delivery-home', [AccountAdminController::class, 'select_delivery_home']);
    Route::post('/add-information-account', [AccountAdminController::class, 'add_information_account']);
    Route::get('/all-basis', [AccountAdminController::class, 'all_basis']);
    Route::get('/all-account-admin', [AccountAdminController::class, 'all_account_admin']);
    Route::get('/all-account-user', [AccountAdminController::class, 'all_account_user']);
    Route::get('/delete-admin/{admin_id}', [AccountAdminController::class, 'delete_admin']);
    Route::get('/confirm-admin-staff/{admin_id}', [AccountAdminController::class, 'confirm_admin_staff']);
    // Category
    Route::get('/all-category', [CategoryController::class, 'all_category']);
    Route::post('/add-category', [CategoryController::class, 'add_category']);
    Route::post('/delete-category', [CategoryController::class, 'delete_category']);
    Route::get('/load-category', [CategoryController::class, 'load_category']);
    Route::get('/detail-category/{category_id}', [CategoryController::class, 'detail_category']);
    Route::post('/add-detail-category/{category_id}', [CategoryController::class, 'add_detail_category']);
    Route::get('/delete-detail-category/{category_id}', [CategoryController::class, 'delete_detail_category']);
    // Service
    Route::get('/all-service', [ServiceController::class, 'all_service']);
    Route::post('/add-service', [ServiceController::class, 'add_service']);
    Route::get('/load-service', [ServiceController::class, 'load_service']);
    Route::post('/delete-service', [ServiceController::class, 'delete_service']);
    Route::post('/edit-service', [ServiceController::class, 'edit_service']);
    // endow
    Route::get('/all-endow', [EndowController::class, 'all_endow']);
    Route::post('/add-endow', [EndowController::class, 'add_endow']);
    Route::get('/load-endow', [EndowController::class, 'load_endow']);
    Route::post('/delete-endow', [EndowController::class, 'delete_endow']);

    // Staff
    Route::get('/all-experience', [ExperienceController::class, 'all_experience']);
    Route::post('/add-experience', [ExperienceController::class, 'add_experience']);
    Route::post('/delete-experience', [ExperienceController::class, 'delete_experience']);
    Route::get('/load-experience', [ExperienceController::class, 'load_experience']);

    // Calendar
    Route::get('/all-calendar', [CalendarController::class, 'all_calendar']);
    Route::post('/add-calendar', [CalendarController::class, 'add_calendar']);
    Route::post('/delete-calendar', [CalendarController::class, 'delete_calendar']);
    Route::get('/load-calendar', [CalendarController::class, 'load_calendar']);
    Route::post('/load-calendar-last-week', [CalendarController::class, 'load_calendar_last_week']);
    Route::get('/calendar-booking', [CalendarController::class, 'calendar_booking']);
    Route::get('/load-lastweek-booking', [CalendarController::class, 'load_lastweek_booking']);
    Route::get('/load-nextweek-booking', [CalendarController::class, 'load_nextweek_booking']);
    //booking
    Route::get('/all-calendar-booking', [BookingController::class, 'all_calendar_booking']);
    Route::get('/detail-calendar-booking/{booking_id}/{admin_information_id}', [BookingController::class, 'detail_calendar_booking']);
    Route::post('/add-status-booking/{booking_id}', [BookingController::class, 'add_status_booking']);
    Route::post('/edit-booking-user/{booking_user_id}/{admin_information_id}', [BookingController::class, 'edit_booking_user']);
    Route::post('/edit-booking-service/{booking_service_id}', [BookingController::class, 'edit_booking_service']);
    Route::post('/edit-booking/{booking_id}', [BookingController::class, 'edit_booking']);
    Route::get('/send-mail-booking', [BookingController::class, 'send_mail_booking']);
    //room
    Route::get('/load-room', [RoomController::class, 'load_room']);
    Route::get('/all-room', [RoomController::class, 'all_room']);
    Route::post('/add-room', [RoomController::class, 'add_room']);
    Route::post('/delete-room', [RoomController::class, 'delete_room']);

    //revenue
    Route::post('/search-order-revenue', [AdminController::class, 'search_order_revenue']);
    Route::post('/chart-day', [AdminController::class, 'chart_day']);
    Route::post('/dashboard-filter', [AdminController::class, 'dashboard_filter']);
    Route::get('/revenue', [AdminController::class, 'revenue']);
});


    //fontend
    //home
    Route::get('/home', [HomeController::class, 'home']);
    Route::get('/basis-detail/{admin_information_id}', [HomeController::class, 'basis_detail']);
    Route::post('/load-basis', [HomeController::class, 'load_basis']);
    Route::post('/booking-service-b1', [HomeController::class, 'booking_service_b1']);
    Route::post('/load-slot-day', [HomeController::class, 'load_slot_day']);
    //search-service
    Route::get('/search-service', [HomeController::class, 'search_service']);
    //check -code
    Route::get('/check-endow', [HomeController::class, 'check_endow']);
    //introduce
    Route::get('/introduce', [IntroduceController::class, 'introduce']);

    //comment
    Route::post('/add-comment', [CommentController::class, 'add_comment']);
    Route::get('/load-comment', [CommentController::class, 'load_comment']);
    //booking
    Route::post('/load-booking', [BookingController::class, 'booking_service']);
    Route::post('/pay-vnpay', [BookingController::class, 'pay_vnpay']);
   



    //login
    Route::post('/register-user', [LoginController::class, 'register_user']);
    Route::get('/login-user', [LoginController::class, 'showLoginForm']);
    Route::get('/load-login', [LoginController::class, 'load_login']);

    //account user
    Route::post('/chat-bot', [AccountUserController::class, 'chat_bot']);
    Route::get('/load-message-user', [AccountUserController::class, 'load_message_user']);
    Route::get('/account-user', [AccountUserController::class, 'account_user']);
    Route::post('/update-image-user', [AccountUserController::class, 'update_image_user']);
    Route::get('/find-password', [AccountUserController::class, 'find_password']);
    Route::get('/check-code', [AccountUserController::class, 'check_code']);
    Route::post('/new-password', [AccountUserController::class, 'new_password']);
    //select staff booking
    Route::get('/select-staff', [HomeController::class, 'select_staff']);
    Route::get('/check-radio-date', [HomeController::class, 'check_radio_date']);

    //Category detail
    
    Route::get('/category-detail/{category_id}', [CategoryDetailController::class, 'category_detail']);
    
Route::group(['middleware' => 'userlogin'], function () {  
    Route::post('/form-login', [LoginController::class, 'login']);
    Route::get('/logout', [LoginController::class, 'logout']);

});