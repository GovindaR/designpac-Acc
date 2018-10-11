<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::post(
    'stripe/webhook',
    '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook'
);
Route::get('/test',function (){
    $user="test";
    $email="suman@designpac.net";
    \Illuminate\Support\Facades\Mail::send('email.test',compact('user'), function ($m) use($email){
        $m->from('notifications@designpac.net', 'DesignPac');
        $m->to($email)->subject('Register Notification!');
    });
});

Route::post('/create/register', 'ClientController@createRegister');
Route::get('/signup', 'ClientController@signUp');
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
    Route::post('/home', 'HomeController@store');
    Route::post('/homehr', 'HomeController@storehr');
    Route::get('/client-notification', 'HomeController@clientNotification');
    Route::get('/designer-notification', 'HomeController@designerNotification');
    Route::get('/designer-other-notification', 'HomeController@designerOtherNotification');
    Route::get('/client-other-notification', 'HomeController@clientOtherNotification');
    Route::get('/notification-test', 'HomeController@testNotification');
    Route::get('/client-activity', 'HomeController@clientActivity');
    Route::get('/designer-activity', 'HomeController@designerActivity');
    Route::get('/subscribe', 'SubscriptionController@index');
    Route::get('/pack', 'HomeController@index');

    Route::get('/designs', 'HomeController@design');
    Route::get('/services', 'HomeController@services');
    Route::get('/developers', 'HomeController@developer');
    Route::get('/marketings', 'HomeController@marketing');
    Route::post('/devdesire', 'HomeController@devdesire');
    Route::post('/payment', 'HomeController@payment');
    Route::post('/payhr', 'HomeController@payhr');

    Route::get('/checkout', 'HomeController@checkout');
    

});


# Users Add, Edit and Delete by Admin
Route::group(['middleware' => ['auth', 'role:administrator']], function () {
    Route::resources([
        'users' => 'UsersController',
        'roles' => 'RolesController'
    ]);
    Route::get('/tasks', 'AdminController@tasks');
    Route::post('admin/task/assign', 'AdminController@assign');
    Route::post('admin/client/assign', 'ClientController@assign');
    Route::get('/clients', 'ClientController@index');
    Route::get('/admin/client/task/{id}', 'ClientController@task');
    Route::post('/clients/destroy', 'ClientController@destroy');
    Route::get('/admin/tasks/details/{id}', 'AdminController@taskDetail');
    Route::post('/admin/tasks/delete/{id}', 'AdminController@taskDelete');
    Route::post('/admin/client/package', 'AdminController@package');

});

Route::group(['middleware' => ['auth', 'role:client|designer']], function () {
    //changes start
    Route::post('/update/file/{id}', 'TaskClientController@updateFile');
    Route::post('/file/delete/{id}', 'TaskClientController@fileDelete');
    Route::post('/update/task/description/{id}', 'HomeController@updateDescription');
    Route::post('/title-upload/{id}', 'HomeController@updateTitle');
    Route::get('/file-uploaded/{id}', 'HomeController@fileUploaded');
    Route::get('/comment-uploaded/{id}', 'HomeController@commentsUploaded');
    Route::get('/comments-save', 'HomeController@commentsSave');
    Route::get('/todos-save', 'HomeController@todosSave');
    Route::get('/designer-model/{id}', 'DesignerController@designerTaskModel');
    //changes end


    Route::post('/create/task', 'ClientTaskController@create');
    Route::post('/update/task/{id}', 'ClientTaskController@update');


    Route::get('/profile/{id}', 'ClientTaskController@profile');
    Route::post('/profile/update/{id}', 'ClientTaskController@profileUpdate');
    Route::get('/project_status', 'ClientTaskController@projectStatus');
    Route::post('/create/comment', 'ClientTaskController@createComment');
    Route::get('/comment/delete/{id}', 'ClientTaskController@remove');
    Route::get('/client-model/{id}', 'ClientTaskController@clientTaskModel');
    Route::get('/account', 'AccountController@index');
    Route::get('/account/{id}', 'AccountController@index1');
    Route::post('/account/complete', 'AccountController@complete');
    Route::get('/client/tasks/delete/{id}', 'ClientTaskController@taskDelete');


//    Route::resources([
//        'client' => 'ClientController'
//    ]);


});

Route::group(['middleware' => ['auth', 'role:designer']], function () {
    Route::resources([
        'designer' => 'DesignerController'
    ]);
    Route::get('/designer/tasks/{id}', 'DesignerController@index');
    Route::get('/designer/profile/{id}', 'DesignerController@profile');

});


//Route::group(['middleware' => ['auth', 'role:consultant|administrator']], function () {
//
//    Route::controller('events', 'EventsController');}