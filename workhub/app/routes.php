<?php

//redirect route	
Route::get('/{username}/{id}',array(
	'as' => 'click-get',
	'uses' => 'NavigateController@getRedirect'
));

//redirect route	
Route::get('/terms',array(
	'as' => 'terms-get',
	'uses' => 'NavigateController@getTerms'
));

Route::group(array('before'=>'guest'),function(){ 
//home route	
Route::get('/',array(
	'as' => 'login-get',
	'uses' => 'NavigateController@getLogin'
));

//get forgot password
Route::get('/recover',array(
	'as' => 'passwordforgot-get',
	'uses' => 'AccountController@getPasswordRecovery'
));

//
Route::get('/password/reset/{code}',array(
	'as' => 'passwordreset-get',
	'uses' => 'AccountController@getResetPassword'
));


/*
* CSRF protection
* */
Route::group(array('before' => 'csrf'),function()
{
	Route::post('/dashboard',array(
		'as' => 'login-post',
		'uses' => 'AccountController@logIn'
	));
    
    //post recover email
	Route::post('/recover',array(
		'as' => 'passwordforgot-post',
		'uses' => 'AccountController@postForgotPassword'
	));

	//post password form
	Route::post('/reset',array(
		'as' => 'passwordreset-post',
		'uses' => 'AccountController@postResetPassword'
	));



});

});

Route::group(array('before'=>'auth'),function(){ 
	//get route to home
	Route::get('/home',array(
		'as'=> 'home-get',
		'uses'=>'NavigateController@getHome'
	));
	
	//get route to add member
	Route::get('/linkadd',array(
		'as'=> 'addlink-get',
		'uses'=>'NavigateController@getAddLink'
	));
	
	//get route to view members
	Route::get('/linksview',array(
		'as'=> 'viewlink-get',
		'uses'=>'NavigateController@getViewLink'
	));
	//get route to view members
	Route::get('/linksviewall',array(
		'as'=> 'viewalllink-get',
		'uses'=>'NavigateController@getViewAllLink'
	));
	
	//get route to view members
	Route::get('/earningview',array(
		'as'=> 'viewearning-get',
		'uses'=>'NavigateController@getViewEarning'
	));
	//get route to add member
	Route::get('/withdraw',array(
		'as'=> 'withdraw-get',
		'uses'=>'NavigateController@getWithdraw'
	));
	//get route to add member
	Route::get('/paymentreport',array(
		'as'=> 'payment-get',
		'uses'=>'NavigateController@getViewPayment'
	));
	
	//get route to change password
	Route::get('/changepassword',array(
		'as'=> 'changepassword-get',
		'uses'=>'AccountController@getChangePassword'
	));

	//get route to create user
	Route::get('/newuser',array(
		'as'=> 'newuser-get',
		'uses'=>'AccountController@getAddNewUser'
	));

	//get users
	Route::get('/viewusers',array(
		'as'=> 'viewusers-get',
		'uses'=>'AccountController@getViewUsers'
	));
	
	//get route to login user
	Route::get('/logout',array(
		'as'=> 'account-logout',
		'uses'=>'AccountController@logOut'
	));
	
	Route::group(array('before' => 'csrf'),function()
{
	
	Route::post('/linkadd',array(
		'as' => 'addlink-post',
		'uses' => 'LinkController@addNew'
	));
	
	Route::post('/linkedit',array(
		'as' => 'linkedit-post',
		'uses' => 'LinkController@editLink'
	));
		Route::post('/linkdelete',array(
		'as' => 'linkdelete-post',
		'uses' => 'LinkController@deleteLink'
	));
	
	Route::post('/withdraw',array(
		'as' => 'withdraw-post',
		'uses' => 'PaymentController@addNew'
	));
	
	//post route to reports
	Route::post('/paymentreports',array(
		'as'=> 'paymentreports-post',
		'uses'=>'PaymentController@postGenerateReport'
	));	
	
   //post change password
	Route::post('/changepassword',array(
		'as'=> 'changepassword-post',
		'uses'=>'AccountController@postChangePassword'
	));

	//post add new user
	Route::post('/newuser',array(
		'as'=> 'newuser-post',
		'uses'=>'AccountController@postAddNewUser'
	));

	//edit user
	Route::post('/useredit',array(
		'as' => 'edituser-post',
		'uses' => 'AccountController@editUser'
	));

	//delete user
	Route::post('/userdelete',array(
		'as' => 'deleteuser-post',
		'uses' => 'AccountController@deleteUser'
	));



});
	
});
