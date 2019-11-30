<?php

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





//Auth::routes();

Route::get('/register', 'Auth\RegisterController@showRegister')->name('register');
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::get('/login', 'Auth\LoginController@showLogin')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'RootController@root')->name('root');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/view_product/{id}', 'RootController@show')->name('product.show');
Route::post('/add_to_cart', 'CartController@add_to_cart')->name('product.add_to_cart');
Route::get('/show_cart', 'CartController@show')->name('product.show_cart');
Route::get('/delete_to_cart/{rowId}', 'CartController@delete_to_cart')->name('product.delete_cart');
Route::get('/checkout', 'CheckoutController@show')->name('product.checkout');
Route::post('/order', 'CheckoutController@order')->name('product.order');
Route::get('/orders_list', 'CheckoutController@order_list')->name('product.order_list');
Route::get('/orders_list/{id}', 'CheckoutController@order_details')->name('product.order_details');
//
//Route::match(['get', 'post'], '/admin', 'AdminController@login');


// Pro Member

Route::get('/pro_member', 'PromemberController@index')->name('proMember');
Route::get('/pro_member/register','promemberController@proregister')->name('promember.register');
Route::post('/proregister','promemberController@register')->name('promember.register.submit');
Route::get('/prologin','PromemberLoginController@showprologin')->name('promember.login');
Route::post('/prologin','PromemberLoginController@login')->name('promember.login.submit');
Route::get('/promember/home','PromemberLoginController@promember_home')->name('promember.home');
Route::get('/promember/profile_update','Promember\PromemberProfileController@profile_edit')->name('promember.profile_edit');
Route::put('/promember/profile_update','Promember\PromemberProfileController@profile_update')->name('promember.profile_update');

Route::post('/promember/profile_update/divition','Promember\PromemberProfileController@divition')->name('promember.divition');
Route::post('/promember/profile_update/district','Promember\PromemberProfileController@district')->name('promember.district');
//pro user logout
Route::get('/promember/logout','PromemberLoginController@logout')->name('promember.logout');


//Prouser withdraw money
Route::get('/promember/withdraw_form','WithdrawMoneyController@index')->name('promember.withdraw_money');
Route::post('/promember/withdraw_amount','WithdrawMoneyController@amount_check')->name('promember.withdraw_amount');
Route::get('/promember/withdraw_confirm_form','WithdrawMoneyController@confirm_form')->name('promember.withdraw_confirm_form');
Route::post('/promember/withdraw_confirm','WithdrawMoneyController@confirm_withdraw')->name('promember.withdraw_confirm');


Route::get('/promember/income_history','Promember\PromemberProfileController@profile_incomes')->name('promember.income_history');
// PRouser user checking
Route::post('/promember/user_check','ProuserCheckController@index')->name('promember.user_check');
Route::post('/promember/point_user_check','ProuserCheckController@point_user')->name('promember.point_user_check');
Route::post('/promember/reference_user_check','ProuserCheckController@reference_user')->name('promember.reference_check');
Route::post('/promember/placement_user_check','ProuserCheckController@placement_user')->name('promember.placement_check');
// PRouser user placement
Route::post('/promember/get_placement_users','ProuserCheckController@get_placement_users')->name('promember.placement_users');
Route::get('/promember/services','Promember\PromemberServiceController@index')->name('promember.service');




Route::get('/promember/balacne','ProuserCheckController@balance_close')->name('prouser.balance_close');

Route::get('/promember/clear_history','ProuserCheckController@clear_history')->name('prouser.clear_history');







// Backend Product Crud
Route::prefix('admin')->name('admin')->group(function (){
//    admin auth
    Route::get('/','AdminController@index')->name('.show_login');
    Route::post('/','AdminController@login')->name('.login');
    Route::get('/logout','AdminController@logout')->name('.logout');
//    products
    Route::get('/dashboard','AdminController@dashboard')->name('.dashboard');
    Route::get('/products','AdminProductController@index')->name('.products');
    Route::get('/product/create','AdminProductController@create')->name('.create');
    Route::post('/product','AdminProductController@store')->name('.store');
    Route::get('product/{id}', 'AdminProductController@show')->name('.show');
    Route::get('product/{id}/edit', 'AdminProductController@edit')->name('.edit');
    Route::put('product/{id}/edit', 'AdminProductController@update')->name('.update');
    Route::delete('/product/{id}', 'AdminProductController@destroy')->name('.delete');
    Route::post('/product/update_quantity/{id}', 'AdminProductController@quantity_update')->name('.quantity');

//    Orders
    Route::get('/orders','AdminOrdersController@index')->name('.orders');
    Route::get('/order_details/{id}','AdminOrdersController@showOrder')->name('.order_details');
    Route::get('/order_confirm/{pid}/{order}','AdminOrdersController@orderConfirm')->name('.order_confirm');

//    Withdraw list
    Route::get('/withdraw','Admin\AdminWithdrawController@index')->name('.withdraw');

//    User

    Route::get('/users', 'AdminUsersController@index')->name('.users');

//    Pro User
    Route::get('/pro_users', 'AdminProusersController@index')->name('.pro_users');
    Route::get('/pro_user/add_to_profit/{id}', 'AdminProusersController@add_to_profit')->name('.pro_user.add_to_profit');
    Route::get('/pro_user/details{id}', 'AdminProusersController@show')->name('.pro_user.show');
    Route::get('/pro_user/edit/{id}', 'AdminProusersController@edit')->name('.pro_user.edit');
    Route::put('/pro_user/update/{id}', 'AdminProusersController@update')->name('.pro_user.update');
    Route::get('/pro_user/details/cost/{id}', 'AdminProusersController@cost_amount')->name('.pro_user.cost');
//    Prouser Withdraw
    Route::get('/pro_user/details/withdraw/{id}', 'Admin\AdminWithdrawMoney@index')->name('.pro_user.withdraw');
    Route::post('/pro_user/details/withdraw_confirm/{id}', 'Admin\AdminWithdrawMoney@confirm')->name('.pro_user.withdraw_confirm');
    Route::get('/pro_user/details/withdraw_confirm_final/{id}', 'Admin\AdminWithdrawMoney@final_confirm')->name('.pro_user.withdraw_final');
    Route::post('/pro_user/details/withdraw_confirm_final_action/{id}', 'Admin\AdminWithdrawMoney@final_confirm_action')->name('.pro_user.withdraw_final_action');
//    profit club member
    Route::get('/profit_club_member', 'ProfitClubController@index')->name('.profit_club');
    Route::get('/profit_club_member/remove/{id}', 'ProfitClubController@remove')->name('.profit_club.remove');

//    commission
    Route::get('/commission', 'Admin\AdminCommission@index')->name('.commission');
    Route::put('/commission', 'Admin\AdminCommission@update')->name('.commission_update');
    Route::put('/ex_commission', 'Admin\AdminCommission@ex_update')->name('.ex_commission_update');
    Route::put('/profit_club_commission', 'Admin\AdminCommission@profit_club_update')->name('.profit_club_commission_update');

    Route::get('/blood_information', 'Admin\AdminBloodController@index')->name('.blood');
//    Hospital
    Route::get('/hospitals', 'Admin\AdminHospitalController@index')->name('.hospital');
    Route::post('/hospitals_create', 'Admin\AdminHospitalController@hospital_create')->name('.hospital_create');


    //    Restaurant
    Route::get('/restaurants', 'Admin\AdminRestaurantController@index')->name('.restaurant');
    Route::post('/restaurants_create', 'Admin\AdminRestaurantController@restaurant_create')->name('.restaurant_create');

    //    Hotel
    Route::get('/hotels', 'Admin\AdminHotelController@index')->name('.hotel');
    Route::post('/hotels_create', 'Admin\AdminHotelController@hotel_create')->name('.hotel_create');

    //    Recreations
    Route::get('/recreations', 'Admin\AdminRecreationController@index')->name('.recreation');
    Route::post('/recreations_create', 'Admin\AdminRecreationController@recreation_create')->name('.recreation_create');

});





