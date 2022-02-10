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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('delete/{dealer_id}','RecordDeleteController@destroy');

//Update dealer
Route::post('update_dealer','RecordDeleteController@update_local_dealer')->name('update.dealer');

// Route::view('form', 'companyview');

// Route::post('update', 'company@update');




Route::get('/','AdminController@login')->name('/');

Route::post('admin_login','AdminController@admin_login')->name('admin.login');


Route::get('logout','AdminController@logout')->name('logout');

Route::get('dashboard','AdminController@dashboard')->name('dashboard');

//Dealers

Route::get('add_new_dealer','AdminController@add_new_dealer')->name('add.new.dealer');

Route::post('dealer_add','AdminController@dealer_add')->name('dealer.add');

Route::get('view_dealers_local','AdminController@view_dealers_local')->name('view.dealers.local');

Route::get('view_dealers_fisheries','AdminController@view_dealers_fisheries')->name('view.dealers.fisheries');
Route::get('delete_dealer','AdminController@delete_dealer')->name('delete_dealer');


//Employees

Route::get('add_new_employee','AdminController@add_new_employee')->name('add.new.employee');

Route::post('employee_add','AdminController@employee_add')->name('employee.add');

Route::get('view_employees','AdminController@view_employees')->name('view.employees');

Route::get('delete_employee','AdminController@delete_employee')->name('delete.employee');


Route::post('pay_employee_salary','AdminController@pay_employee_salary')->name('pay.employee.salary');

Route::post('update_employee_salary','AdminController@update_employee_salary')->name('update.employee.salary');

//Sales


Route::get('add_new_sale','SalesController@add_new_sale')->name('add.new.sale');

Route::post('sale_add','SalesController@sale_add')->name('sale.add');

Route::get('view_overall_sales','SalesController@view_overall_sales')->name('view.overall.sales');

Route::get('overall_sale_details/{id?}','SalesController@overall_sale_details')->name('overall.sale.details');

//Expense

Route::get('add_new_expense','ExpenseController@add_new_expense')->name('add.new.expense');

Route::post('expense_add','ExpenseController@expense_add')->name('expense.add');

Route::get('view_expenses','ExpenseController@view_expenses')->name('view.expenses');


//Reports

Route::get('view_general_report','SalesController@view_general_report')->name('view.general.report');

Route::post('general_report_details','SalesController@general_report_details')->name('general.report.details');

Route::get('view_dealerwise_report','SalesController@view_dealerwise_report')->name('view.dealerwise.report');

Route::post('dealerwise_report_details','SalesController@dealerwise_report_details')->name('dealerwise.report.details');

Route::post('add_dealer_amount','SalesController@add_dealer_amount')->name('add.dealer.amount');

//add dealer amount through dealer report

Route::post('add_dealer_amount2','SalesController@add_dealer_amount2')->name('add.dealer.amount2');

Route::get('view_expense_report','ExpenseController@view_expense_report')->name('view.expense.report');

Route::post('expense_report_details','ExpenseController@expense_report_details')->name('expense.report.details');

Route::get('view_arrears_report','SalesController@view_arrears_report')->name('view.arrears.report');

Route::post('arrears_report_details','SalesController@arrears_report_details')->name('arrears.report.details');


//Factory Goods Report
Route::get('view_factory_goods_report','FactoryGoodsController@view_factory_goods_report')->name('view.factory.goods.report');


Route::post('factory_goods_report_details','FactoryGoodsController@factory_goods_report_details')->name('factory.goods.report.details');



//Cash Management

Route::get('cash_management','SalesController@cash_management')->name('cash.management');

Route::post('add_cash_in_factory','SalesController@add_cash_in_factory')->name('add.cash.in.factory');

Route::post('subtract_cash_in_factory','SalesController@subtract_cash_in_factory')->name('subtract.cash.in.factory');


Route::post('add_cash_in_meezan_bank','SalesController@add_cash_in_meezan_bank')->name('add.cash.in.meezan.bank');

Route::post('subtract_cash_in_meezan_bank','SalesController@subtract_cash_in_meezan_bank')->name('subtract.cash.in.meezan.bank');


Route::post('add_cash_in_soneri_bank','SalesController@add_cash_in_soneri_bank')->name('add.cash.in.soneri.bank');

Route::post('subtract_cash_in_soneri_bank','SalesController@subtract_cash_in_soneri_bank')->name('subtract.cash.in.soneri.bank');

//View Arrears

Route::get('view_arrears_local_dealer','SalesController@view_arrears_local_dealer')->name('view.arrears.local.dealer');

Route::get('view_arrears_fisheries','SalesController@view_arrears_fisheries')->name('view.arrears.fisheries');


//Cheque Management

Route::get('add_new_cheque_received','ChequeController@add_new_cheque_received')->name('add.new.cheque.received');

Route::post('cheque_received_add','ChequeController@cheque_received_add')->name('cheque.received.add');

Route::get('add_new_cheque_given','ChequeController@add_new_cheque_given')->name('add.new.cheque.given');

Route::post('cheque_given_add','ChequeController@cheque_given_add')->name('cheque.given.add');

//view cheques

Route::get('view_cheque_received','ChequeController@view_cheque_received')->name('view.cheque.received');

Route::get('view_cheque_given','ChequeController@view_cheque_given')->name('view.cheque.given');

Route::post('update_cheque_status','ChequeController@update_cheque_status')->name('update.cheque.status');

//Cheque details

Route::get('single_cheque_details/{id?}','ChequeController@single_cheque_details')->name('single.cheque.details');


//Factory Goods Management
Route::get('factory_goods_management','FactoryGoodsController@factory_goods_management')->name('factory.goods.management');

Route::post('add_new_good','FactoryGoodsController@add_new_good')->name('add.new.good');
//add goods quantity
Route::post('update_goods_quantity','FactoryGoodsController@update_goods_quantity')->name('update.goods.quantity');

//subtract goods quantity
Route::post('subtract_goods_quantity','FactoryGoodsController@subtract_goods_quantity')->name('subtract.goods.quantity');
