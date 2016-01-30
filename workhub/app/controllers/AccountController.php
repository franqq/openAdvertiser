<?php

class AccountController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	
	public function logIn()
	{

		
		//code to login user
		$validator = Validator::make(Input::all(),array(
				'User_Name'		=>'required',
				'Password'			=>'required'
		));
		
		if($validator->fails())
		{
			return Redirect::route('login-get')
			->withErrors($validator)
			->withInput();
		}
		else{
			$auth = Auth::attempt(array(
				'username' => Input::get('User_Name'),
				'password' => Input::get('Password'),
			));
			
			if($auth)
			{
				// select the account to load and redirect to the intended page
				return Redirect::intended();
				
			}
			else{
				$auth2 = Auth::attempt(array(
					'email' => Input::get('User_Name'),
					'password' => Input::get('Password'),
				));
				if($auth2)
				{
					// select the account to load and redirect to the intended page
					return Redirect::intended();
					
				}
				else{
					$auth3 = Auth::attempt(array(
						'phone_number' => Input::get('User_Name'),
						'password' => Input::get('Password'),
					));
					if($auth3)
					{
						// select the account to load and redirect to the intended page
						return Redirect::intended();
						
					}
					else {
						return Redirect::route('login-get')
							->with('global','Username - Password Mismatch');
					}
				}
			}
		}
	}
	
	public function logOut()
	{
		//code to logout user
		Auth::logout();
		return Redirect::route('login-get');
	}

	//change password functionality
	public function getChangePassword()
	{
		return View::make('members.changepassword');
	}
	
	public function postChangePassword()
	{

		
		//code to login user
		$validator = Validator::make(Input::all(),array(
				'Old_Password'			=>'required',
				'New_Password'			=>'required',
				'Confirm_Password'		=>'required|same:New_Password'			
		));
		
		if($validator->fails())
		{
			return Redirect::route('changepassword-get')
			->withErrors($validator)
			->withInput();
		}
		else{
			//change password
			$user = User::find(Auth::user()->id);
			$oldpassword = Input::get('Old_Password');
			$password = Input::get('New_Password');
			
			if (Hash::check($oldpassword,$user->getAuthPassword())) {
				$user->password = Hash::make($password);
				if($user->save())
				{
					return Redirect::route('home-get')
					->with('global','Success!!!  Your Password Has Been Changed');
				}
				else{
					return Redirect::route('changepassword-get')
					->with('global','Your Password is Incorrect');
				}
			}
		
		return Redirect::route('changepassword-get')
		->with('global','Your Password Could Not Be Changed <br /><b>Please Try Again!!</b>');
		
		}
	}


//method to load password recovery page
	public function getPasswordRecovery()
	{
		return View::make('members.recover');
	}	

	//get information from the user and send them a recoverly link
	public function postForgotPassword()
	{
		$validator = Validator::make(Input::all(),array(
				'Email'				=>'required|email',
		));
		
		if($validator->fails())
		{
			return Redirect::route('passwordforgot-get')
			->withErrors($validator)
			->withInput();
		}
		else{
			//get the user with the email entered
			$email = Input::get('Email');
			
			$user = User::where('email','=',$email);
			
			//if user exists
			if ($user->count()) {
				$user = $user->first();
				//generate a new code and password
				$code = str_random(60);
				$password = str_random(10);
				
				$user->code = $code;
				$fullname = $user->firstname.' '.$user->lastname;

				
				//account recovery for a user whose registration was incomplete				
				if($user->save())
				{
					//Send email
					Mail::send('emails.auth.forgot',
						array(
								'passlink' 		=> URL::route('passwordreset-get',$code),
								'fullname'		=>$fullname,
						),
						function($message) use ($user)
						{
							$message->to($user->email)->subject('Password Reset');
						}
						);
						
						
					return Redirect::route('passwordforgot-get')
							->with('global','We have Sent you an email');
				}
			}
			//if the email does not exist inform them
			else {
				return Redirect::route('passwordforgot-get')
							->with('global','This email is not registered. Please try again');
			}
			return Redirect::route('forgotpassword-get')
							->with('global','Some error occured. Please try again');
		}
	}
	
	//get the password reset page
	public function getResetPassword($code)
	{
		View::share('code',$code);
		return View::make('members.resetpassword');
	}
	
	
	public function postResetPassword()
	{
		$code = Input::get('identity_token');
		
		$validator = Validator::make(Input::all(),array(
				'Password'				=>'required',
				'Confirm_Password'		=>'required|same:Password'
		));
		
		if($validator->fails())
		{
			return Redirect::route('passwordforgot-get',$code)
			->withErrors($validator)
			->withInput();
		}
		else {
			
			$user = User::where('code','=',$code);
			//if user exists
			if ($user->count()) {
				$user = $user->first();
				$user->password = Hash::make(Input::get('Password'));
				
				//success message			
				if($user->save())
				{
					return Redirect::route('login-get')
					->with('global','Success!! Your password has been reset');
				}
				
			}
			
		}
		return Redirect::route('passwordforgot-get')
							->with('global','Some error occured. Please try again');
	}


	public function getAddNewUser()
	{
		return View::make('members.createnew');
	}
	public function postAddNewUser()
	{
		//verify the user input and create account
		$validator = Validator::make(Input::all(),array(
				'First_Name'				=>'required|max:50',
				'Second_Name'				=>'required|max:50',
				'Email'					    =>'email|unique:users',
				'Phone_Number'				=>'required|max:12|unique:users',
				'User_Name'					=>'required|max:10',
				'Level'						=>'required',

		));
		
		if($validator->fails())
		{
			return Redirect::route('newuser-get')
			->withErrors($validator)
			->withInput();
		}
		else {
			$firstname = Input::get('First_Name');
			$secondname = Input::get('Second_Name');
			$email = Input::get('Email');
			$phone_number = Input::get('Phone_Number');
			$username = Input::get('User_Name');
			$level = Input::get('Level');
			
			 //generate a ten digit alphanumeric password
			 $password					= str_random(10);
						
 
			 
			 //register the new user
			 $user		= User::create(array(
			 				'firstname'		=>$firstname,
			 				'lastname'		=>$secondname,
			 				'password'		=>Hash::make($password),
							'email'			=>$email,
							'phone_number'		=>$phone_number,
							'username'		=>$username,
							'activate'		=>TRUE,
							'admin'			=>$level,
			 ));
			 
			 if($user)
			 {
			 	Mail::send('emails.auth.newuser',
					 array(
					 		'fullname'			=>$firstname.' '.$secondname,
							'username' 			=>$username,
							'password'			=>$password,
					 ),
					function($message) use ($user)
					{
							$message->to($user->email)->subject('Account Details');
					}
				);
				
				return Redirect::route('newuser-get')
					->with('global','Success! '.$firstname. ' has been added.<br/>An email has been sent to '.$email);	
			 }
			
		}
		
	}

	public function getViewUsers()
	{
		
		$members = User::where('activate','=',TRUE)->get();
		View::share('members',$members);
		return View::make('members.viewusers');
	}

	public function editUser()
	{
		//verify the user input and create account
		$validator = Validator::make(Input::all(),array(
				'First_Name'				=>'required|max:50',
				'Second_Name'				=>'required|max:50',
				'Email'					    =>'email',
				'Phone_Number'				=>'required|max:12',
				'User_Name'					=>'max:10',
				'Level'						=>'required',

		));
		
		if($validator->fails())
		{
			return Redirect::route('addmember-get')
			->withErrors($validator)
			->withInput();
		}
		else {
			$userId  = Input::get('memberID');
			$firstname = Input::get('First_Name');
			$secondname = Input::get('Second_Name');
			$email = Input::get('Email');
			$phone_number = Input::get('Phone_Number');
			$username = Input::get('User_Name');
			$level        =Input::get('Level');
						
 			$user_edit = User::where('id','=',$userId)->first();

 			$user_edit->firstname = $firstname;
 			$user_edit->lastname = $secondname;
 			$user_edit->email = $email;
 			$user_edit->phone_number = $phone_number;
 			$user_edit->username = $username;
			$user_edit->admin = $level;

 			$usersave = $user_edit->save();
			 
			 if($usersave)
			 {
				return Redirect::route('viewusers-get')
					->with('global','Success! '.$firstname.'\'s details have been updated.');	
			 }
			
		}
		
	}

	public function deleteUser()
	{
		
		
			$memberId  = Input::get('memberID');
			
						
 			$user_delete = User::where('id','=',$memberId)->first();
 			$user_delete->activate = FALSE;

 			$user_delete = $user_delete->save();
			 
			 if($user_delete)
			 {
				return Redirect::route('viewusers-get')
					->with('global','Success! Member information has been deleted successfully.');	
			 }	
	}
	
}
