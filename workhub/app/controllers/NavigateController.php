<?php

class NavigateController extends BaseController {

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
	
	public function getLogin()
	{
		return View::make('members.login');
	}

	public function getHome()
	{
		$totalvisits = Link::where('username','=',Auth::user()->username)->where('active','=',TRUE)->sum('clicks');
		View::share('totalvisits',$totalvisits);
		$totalearned = ceil($totalvisits*0.1);
		View::share('totalearned',$totalearned);
		$withdrawn = Payment::where('user_id','=',Auth::user()->id)->sum('amount');
		View::share('withdrawn',$withdrawn);
		$balance = ceil($totalearned-$withdrawn);
		View::share('balance',$balance);
		
		return View::make('members.home');
	}
	
	public function getAddLink()
	{
		return View::make('members.addlink');
	}
	public function getViewLink()
	{
		
		$links = Link::where('username','=',Auth::user()->username)->where('active','=',TRUE)->get();
		View::share('links',$links);
		return View::make('members.viewlink');
	}
	
	public function getViewAllLink()
	{
		
		$links = Link::where('username','=',Auth::user()->username)->get();
		View::share('links',$links);
		return View::make('members.viewlink');
	}
	
	public function getViewEarning()
	{
		
		$links = Link::where('username','=',Auth::user()->username)->where('active','=',TRUE)->get();
		View::share('links',$links);
		return View::make('members.earning');
	}
	public function getWithdraw()
	{
		return View::make('members.withdraw');
	}
	
	public function getViewPayment()
	{
		
		$payments = Payment::where('user_id','=',Auth::user()->id)->get();
		View::share('payments',$payments);
		return View::make('members.payment');
	}
	
	public function getRedirect($username,$id)
	{
		$link = Link::where('id','=',$id)->first();
		
		/*Get user ip address*/
		$ip_address=$_SERVER['REMOTE_ADDR'];
		
		$device = Device::where('ip','=',$ip_address);
		if(!$device->count())
		{
			
			 //record the device
			 $user		= Device::create(array(
			 				'ip'		=>$ip_address,
			 ));	
			 $link->clicks = $link->clicks+1;
			 $link_save = $link->save();
		}
		
		return Redirect::away($link->link_name);
	}

	public function getTerms()
	{
		return View::make('members.terms');
	}
	
}
