<?php

class LinkController extends BaseController {

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
				'Name' 				=>'required|max:200',
				'Link'				=>'required|url|max:500',
				'Description'		=>'max:500',
		));
		
		if($validator->fails())
		{
			return Redirect::route('addlink-get')
			->withErrors($validator)
			->withInput();
		}
		else {
			$name = Input::get('Name');
			$link = Input::get('Link');
			$description = Input::get('Description');
			 
			 //register the new user
			 $newlink		= Link::create(array(
			 				'username'  		=>Auth::user()->username,
			 				'name'					=>$name,
			 				'link_name'				=>$link,
			 				'link_description'		=>$description,
							'clicks'				=>0,
							'active'				=>TRUE,
							
			 ));
			 
			 if($newlink)
			 {
				return Redirect::route('addlink-get')
					->with('global','Success! Your link has been added.');	
			 }
			
		}
		
	}

	public function editLink()
	{
		//verify the user input and create account
		$validator = Validator::make(Input::all(),array(
				'Name' 				=>'required|max:200',
				'Link'				=>'required|url|max:500',
				'Description'		=>'max:500',
		));
		
		if($validator->fails())
		{
			return Redirect::route('addlink-get')
			->withErrors($validator)
			->withInput();
		}
		else {
			$linkId  = Input::get('memberID');
			$name = Input::get('Name');
			$link = Input::get('Link');
			$description = Input::get('Description');
						
 			$link_edit = Link::where('id','=',$linkId)->first();

 			$link_edit->name = $name;
 			$link_edit->link_name = $link;
 			$link_edit->link_description = $description;
 		
 			$linksave = $link_edit->save();
			 
			 if($linksave)
			 {
				return Redirect::route('viewlink-get')
					->with('global','Success! link details have been updated.');	
			 }
			
		}
		
	}

	public function deleteLink()
	{
		
		
			$linkId  = Input::get('memberID');
			
						
 			$link_delete = Link::where('id','=',$linkId)->first();
 			$link_delete->active = FALSE;

 			$link_delete = $link_delete->save();
			 
			 if($link_delete)
			 {
				return Redirect::route('viewlink-get')
					->with('global','Success! Link information has been deleted successfully.');	
			 }	
	}
		
}
