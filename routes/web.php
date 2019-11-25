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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/create-video', function () {
    return view('create-video');
});
Auth::routes();
#Auth controller
Route::get('activate/{token}', 'Auth\RegisterController@activate')->name('activate');
Route::get('thanks', 'ThanksController@index')->name('thanks');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
//for employee
Route::get('emp_activate/{token}','Auth\RegisterController@activateEmp')->name('emp_activate');
Route::get('emplogin','Employee\EmployeeController@loginEmploye')->name('emplogin');
Route::get('EmpUpdatePass','Employee\EmployeeController@forgetPass')->name('EmpUpdatePass');
Route::post('password/emp', 'Auth\ForgotPasswordController@postEmail')->name('password.emp');
Route::get('email/ResetPassword/{id}', 'Auth\ResetPasswordController@EmpResetPassword')->name('email.ResetPassword');
Route::post('emp/resetpassword', 'Auth\ResetPasswordController@EmpResetPass')->name('emp.resetpassword');
//end employee
#SubscribeMember Controller
Route::get('/get-started', 'SubscribeMemberController@subscribememberlist')->name("subscribe.subscribememberlist");
Route::get('/faq', 'Customer\CustomerController@faq')->name("faq");
#Admin Controller
//datatable
Route::get('datatables', 'Admin\AdminController@getAllQPRUPloaded')->name('datatables');
//dashboard
//Route::get('admin/dashboard', 'Admin\AdminController@dashboard')->name('admin/dashboard');
Route::get('admin/dashboard', 'Admin\AdminController@adminDashboard')->name('admin/employee-details');
Route::get('admin/addimage', 'Admin\AdminController@imageLayout')->name('admin/addimage');
Route::post('admin/addimage-Layout', 'Admin\AdminController@storeimageLayout')->name('admin/addimage-Layout');
Route::get('admin/add-video', 'Admin\AdminController@addVideoStyle')->name('admin/add-video');
Route::post('admin/video','Admin\AdminController@storeAddVideoStyle')->name('admin/video');
Route::get('admin/deletevideo/{id}','Admin\AdminController@deletevideo')->name('admin/deletevideo');
Route::post('updateEditEmp', 'Admin\AdminController@editVideoData');
Route::post('updateEditEmpData','Admin\AdminController@updateVideo')->name('updateEditEmpData');
Route::get('admin/thumImg','Admin\AdminController@ShowThumlist')->name('admin/thumImg');
Route::post('admin/thumb','Admin\AdminController@AddthumVideo')->name('admin/thumb');
Route::post('Editthum','Admin\AdminController@EditThumbVideo');
Route::post('UpdateThumblayout','Admin\AdminController@UpdateThumbVideo');
Route::get('admin/delthum/{id}','Admin\AdminController@deletethumb')->name('admin/delthum');
Route::post('updateImg','Admin\AdminController@updateImg');
Route::post('UpdateImglayout','Admin\AdminController@UpdateImglayout');


Route::post('addEmployee', 'Admin\AdminController@addEmployee');
Route::get('admin/deleteimage/{id}', 'Admin\AdminController@deleteimage')->name('admin/deleteimage');
Route::delete('removeEmployee', 'Admin\AdminController@removeEmployee');
Route::post('updateEmp', 'Admin\AdminController@editEmployee');
Route::post('updateEmpData', 'Admin\AdminController@updateEmp');

#Employee Controller
#Route::get('employee/dashboard', 'Employee\EmployeeController@dashboard')->name('employee/dashboard');
Route::any('employee/dashboard', 'Employee\EmployeeController@viewOrders')->name('employee/orders');
Route::get('employee/viewOrderDetails/{id}', 'Employee\EmployeeController@viewOrderByEmp')->name('employee/viewOrderDetails');
Route::post('assidnedOrder', 'Employee\EmployeeController@assignedOrderByEmp');
Route::post('rejectOrder', 'Employee\EmployeeController@rejectOrderByEmp');
Route::post('proceedOrder', 'Employee\EmployeeController@proceedOrderByEmp');
Route::post('addVideo', 'Employee\EmployeeController@videoUploadByEmp');
Route::post('rewiseOrder', 'Employee\EmployeeController@rewiseOrderByEmp');

//Customer Controller
Route::get('/customer/dashboard',"Customer\CustomerController@customerlist")->name('customer.dashboard');
Route::get('/customer/profile',"Customer\CustomerController@customerprofile")->name("customer.customer.profile");
#Route::get('create-video', 'Customer\CustomerController@viewCreateVideos')->name('create-video');
#Route::get('create-video/{id?}', 'Customer\CustomerController@viewCreateVideos')->name('create-video}');
Route::post('storeCustomerData', 'Customer\CustomerController@storeFirstPageData');
Route::get('select-video', 'Customer\CustomerController@selectVideo')->name('select-video');
Route::get('select-video/{id?}', 'Customer\CustomerController@selectVideo')->name('select-video');
Route::post('storeSelectVideoData', 'Customer\CustomerController@storeSelectVideoData');
Route::post('saveImage', 'Customer\CustomerController@custOrderLogo')->name('save.logo');
Route::post('saveMusic', 'Customer\CustomerController@custOrderMusic')->name('save.music');
Route::post('bakToCreateVideo', 'Customer\CustomerController@bakToCreateVideo');
Route::get('video-variations/{id}', 'Customer\CustomerController@customerVideoVariation')->name('video-variations/{id}');
Route::get('video-variations', 'Customer\CustomerController@customerVideoVariation')->name('video-variations/{id}');
Route::post('storeSubscribePlan','Customer\CustomerController@subscribeMember');
Route::post('storeUnSubscribePlan','Customer\CustomerController@UnsubscribeMember');
Route::post('storesubscribestatus','Customer\CustomerController@subscribestatus');
Route::get('admin/CustOrd','Customer\CustomerController@ViewcustOrder')->name('admin.CustOrd');
Route::get('admin/CustomerDetail','Customer\CustomerController@ViewcustList')->name('admin.CustomerDetail');
Route::post('showcustomertimer', 'Customer\CustomerController@StartCustVidTimers');

#PayPalController
Route::get('/paypal/{order?}','PayPalController@form')->name('order.paypal');
Route::post('/checkout/payment/{order}/paypal','PayPalController@checkout')->name('checkout.payment.paypal');
Route::get('/paypal/checkout/{order}/completed','PayPalController@completed')->name('paypal.checkout.completed');
Route::get('/paypal/checkout/{order}/cancelled','PayPalController@cancelled')->name('paypal.checkout.cancelled');
Route::post('/webhook/paypal/{order?}/{env?}','PayPalController@webhook')->name('webhook.paypal.ipn');
Route::get('payment-completed/{order}','PayPalController@paymentCompleted')->name('paymentCompleted');

#Recuring Controller
Route::get('/recuring', 'RecuringPaymentController@getIndex');
Route::get('/eccheckout', 'RecuringPaymentController@getExpressCheckout')->name('paypal.eccheckout');
Route::get('/eccheckoutsuccess', 'RecuringPaymentController@getExpressCheckoutSuccess');
Route::get('paypal/adaptive-pay', 'RecuringPaymentController@getAdaptivePay');
Route::post('paypal/notify', 'RecuringPaymentController@notify');

#CustomerDownloadVideo
Route::get('video/download/{id}','Customer\CustomerController@downloadvideo')->name('video.download');
Route::post('/addCusComm', 'Customer\CustomerController@addCustomerComment');
Route::get('/customizeVideo/{id}', 'LayoutController@custvideo')->name('customizeVideo');


Route::get('/editor', 'EditorController@index')->name('editor');
Route::post('/editor/apply', 'EditorController@apply')->name('apply');

Route::get('/modelDetails', 'CustomerVideoEditController@logosetting');
Route::get('/settingtexts', 'CustomerVideoEditController@textsetting');
Route::get('/watermarks', 'CustomerVideoEditController@markwter');
Route::get('/transitionsPage', 'CustomerVideoEditController@transtion');
Route::get('/LanguagePage', 'CustomerVideoEditController@language');
Route::get('/CropPage', 'CustomerVideoEditController@crop');
Route::get('/DeletePage', 'CustomerVideoEditController@delete');
Route::get('/changeBG', 'CustomerVideoEditController@background');
Route::get('/changeMusic', 'CustomerVideoEditController@music');
Route::post('/changeMusic', 'CustomerVideoEditController@music');
Route::post('/changeBG', 'CustomerVideoEditController@background');
Route::post('/modelDetails', 'CustomerVideoEditController@logosetting');
Route::post('/settingtexts', 'CustomerVideoEditController@textsetting');
Route::post('/watermarks', 'CustomerVideoEditController@markwter');
Route::post('/transitionsPage', 'CustomerVideoEditController@transtion');
Route::post('/LanguagePage', 'CustomerVideoEditController@language');
Route::post('/CropPage', 'CustomerVideoEditController@crop');
Route::post('/DeletePage', 'CustomerVideoEditController@delete');

Route::get('/deleteFiles', 'CustomerVideoEditController@deleteFile');
Route::post('/deleteFiles', 'CustomerVideoEditController@deleteFile');
Route::get('/finalOutput', 'CustomerVideoEditController@saveOutput');
Route::post('/finalOutput', 'CustomerVideoEditController@saveOutput');