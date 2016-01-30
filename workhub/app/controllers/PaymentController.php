<?php

class PaymentController extends BaseController {

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
	
	public function addNew()
	{
		//verify the user input and create account
		$validator = Validator::make(Input::all(),array(
				'Amount' 				=>'required|numeric',
		));
		
		if($validator->fails())
		{
			return Redirect::route('withdraw-get')
			->withErrors($validator)
			->withInput();
		}
		else {
			$amount = Input::get('Amount');
			$todaysdate 	  = date("Y-m-d");
			
			$totalvisits = Link::where('username','=',Auth::user()->username)->where('active','=',TRUE)->sum('clicks');
			$totalearned = $totalvisits*0.1;
			$withdrawn = Payment::where('user_id','=',Auth::user()->id)->sum('amount');
			$balance = $totalearned-$withdrawn;
			
			if($amount<=$balance)
			{
				
				
				if($amount>=500)
				{
				
				 //register the new user
				 $newwithdrawal		= Payment::create(array(
				 				'user_id'  				=>Auth::user()->id,
				 				'amount'				=>$amount,
				 				'withdrawal_date'		=>$todaysdate,
				 				'paid'					=>FALSE,			
				 ));
				 
				 if($newwithdrawal)
				 {
					return Redirect::route('withdraw-get')
						->with('global','Success! Your Withdrawal request is being processed.');	
				 }
				}
				else {
					return Redirect::route('withdraw-get')
					->with('global','Failed!! You are allowed to withdraw a minimum of Ksh 500.')->withInput();	
				}
			}
			else {
				return Redirect::route('withdraw-get')
					->with('global','Failed!! The amount exceeds your balance.')->withInput();	
			}
			
		}
		
	}

public function postGenerateReport()
	{
		//verify the user input and create account
		$validator = Validator::make(Input::all(),array(
				'Start_Date'				=>'required',
				'End_Date'				=>'required',
		));
		if($validator->fails())
		{
			return Redirect::route('payment-get')
			->withErrors($validator)
			->withInput();
		}
		else {
				$startdate = date("Y-m-d",strtotime(Input::get('Start_Date')));
				$enddate =  date("Y-m-d",strtotime(Input::get('End_Date')));

			if($startdate<=$enddate)
			{				
				$payments = Payment::where('withdrawal_date','>=',$startdate)->where('withdrawal_date','<=',$enddate)->get();
				
				
				View::share('startdate',$startdate);
				View::share('enddate',$enddate);

		
				View::share('payments',$payments);
				return View::make('members.paymentreportfeedback');
			}
			else{
				return Redirect::route('reports-get')->withInput()->with('global','Failed, Please Enter The Correct Date Formats');
			}


			}
	}
		
}
