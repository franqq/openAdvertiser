@include('members.layout.head')
@include('members.layout.header')

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#"> Settings</a>
        </li>
		<li>
            <a href="#">New</a>
        </li>
    </ul>
</div>


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-edit"></i> Create New</h2>

              
            </div>
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                  <div style ="text-align:center;"> 
                    @if(Session::has('global'))
                    <div style="color:#990000;">{{Session::get('global')}}</div>
                    @endif
            </div>
                   <form class="form-horizontal" role="form" action="{{URL::route('newuser-post')}}" method="post">
  <div class="form-group">
  	
  	<label for="inputusername" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
      <input type="text" class="form-control" id="inputusername" name="User_Name" required="required" placeholder="Enter the username*"
      e{{(Input::old('First_Name')) ? ' value ='.Input::old('User_Name'). '' : ''}} />
    </div>
     @if($errors->has('User_Name'))
              <div style="color:#990000; text-align:center;">{{$errors->first('User_Name')}}</div>
     @endif
    
   <label for="inputfirstname" class="col-sm-2 control-label">Firstname</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
      <input type="text" class="form-control" id="inputfirstname" name="First_Name" required="required" placeholder="Enter the first name*"
      e{{(Input::old('First_Name')) ? ' value ='.Input::old('First_Name'). '' : ''}} />
    </div>
     @if($errors->has('First_Name'))
              <div style="color:#990000; text-align:center;">{{$errors->first('First_Name')}}</div>
     @endif
	
	 <label for="inputsecondname" class="col-sm-2 control-label">Secondname</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
      <input type="text" class="form-control" id="inputsecondname"  name="Second_Name"  required="required" placeholder="Enter the second name*"
      e{{(Input::old('Second_Name')) ? ' value ='.Input::old('Second_Name'). '' : ''}} />
    </div>
     @if($errors->has('Second_Name'))
              <div style="color:#990000; text-align:center;">{{$errors->first('Second_Name')}}</div>
     @endif
	
	 <label for="inputmobilenumber" class="col-sm-2 control-label">Phone</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
      <input type="text" class="form-control" id="inputmobilenumber" name="Phone_Number" required="required" placeholder="Enter the phone number*"
      e{{(Input::old('Phone_Number')) ? ' value ='.Input::old('Phone_Number'). '' : ''}} />
    </div>
     @if($errors->has('Phone_Number'))
            <div style="color:#990000; text-align:center;">{{$errors->first('Phone_Number')}}</div>
     @endif
	
    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
      <input type="email" class="form-control" id="inputEmail" name="Email" placeholder="Email"
      e{{(Input::old('email')) ? ' value ='.Input::old('email'). '' : ''}} />
    </div>
    @if($errors->has('Email'))
            <div style="color:#990000; text-align:center;">{{$errors->first('Email')}}</div>
    @endif
	
	
     
     <label for="inputidnumber" class="col-sm-2 control-label">User Level</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
     <select class="form-control" name="Level" id="selectlevel" required="required" >
      <option value=''>Select</option>
       <option value="0">User</option>
       <option value="1">Admin</option>
    </select>      
     
    </div>
     @if($errors->has('Level'))
            <div style="color:#990000; text-align:center;>{{$errors->first('Level')}}</div>
     @endif
  </div>
 
 
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
  {{Form::token()}}
</form>

               </div>
           </div>
       </div>
    </div>
</div>


    <!--/span-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->


@include('members.layout.footer')
