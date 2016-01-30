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
            <a href="#">Change Password</a>
        </li>
    </ul>
</div>


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-edit"></i> Change Password</h2>

              
            </div>
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                  <div style ="text-align:center;"> 
                    @if(Session::has('global'))
                    <div style="color:#990000;">{{Session::get('global')}}</div>
                    @endif
            </div>
                   <form class="form-horizontal" role="form" action="{{URL::route('changepassword-post')}}" method="post">
  <div class="form-group">
    
   <label for="inputfirstname" class="col-sm-2 control-label">Old Password</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
      <input type="password" class="form-control" id="inputoldpassword" name="Old_Password" required="required" placeholder="Enter your old password*" />
    </div>
     @if($errors->has('Old_Password'))
              <div style="color:#990000; text-align:center;">{{$errors->first('Old_Password')}}</div>
     @endif
	
	 <label for="inputsecondname" class="col-sm-2 control-label">New Password</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
      <input type="password" class="form-control" id="inputnewpassword"  name="New_Password"  required="required" placeholder="Enter the your new password*"  />
    </div>
     @if($errors->has('New_Passord'))
              <div style="color:#990000; text-align:center;">{{$errors->first('New_Password')}}</div>
     @endif

      <label for="inputsecondname" class="col-sm-2 control-label">Confirm Password</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
      <input type="password" class="form-control" id="inputnewpassword2"  name="Confirm_Password"  required="required" placeholder="Enter the your new password*"  />
    </div>
     @if($errors->has('Confirm_Password'))
              <div style="color:#990000; text-align:center;">{{$errors->first('Confirm_Password')}}</div>
     @endif
  
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
