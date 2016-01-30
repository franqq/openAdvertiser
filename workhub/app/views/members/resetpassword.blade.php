@include('members.layout.head')
<body>
<div class="ch-container">
    <div class="row">
        
    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Welcome to VentiSMS</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Please Enter Your New Password
            </div>
            @if(Session::has('global'))
            <div style="color:#990000;">{{Session::get('global')}}</div>
            @endif
            <form class="form-horizontal" name="loginform" id="loginform" action="{{URL::route('passwordreset-post')}}" method="post" >
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="password" name="Password" class="form-control"  required="required" placeholder="Enter Your New Password Please..*"  />
                    </div>
                    @if($errors->has('Password'))
                       <div style="color:#990000;">{{$errors->first('Password')}}</div>
                    @endif
                   
                    <div class="clearfix"></div><br>


                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="password" name=" Confirm_Password" class="form-control"  required="required" placeholder="Please Confirm Your Password..*">
                    </div>
                     @if($errors->has('Confirm_Password'))
                       <div style="color:#990000;">{{$errors->first('Confirm_Password')}}</div>
                    @endif
                    <div class="clearfix"></div>

                    <div class="clearfix"></div>

                    <input type="hidden" name="identity_token" value="{{$code}}" />

                    {{Form::token()}}

                    <p class="center col-md-5">
                        <button type="submit" onclick="document.getElementById(('loginform').submit())"  class="btn btn-primary">Save</button>
                    </p>
                </fieldset>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->

</div><!--/.fluid-container-->

<!-- external javascript -->



{{HTML::script('bower_components/bootstrap/dist/js/bootstrap.min.js')}}

<!-- library for cookie management -->
{{HTML::script('js/jquery.cookie.js')}}
<!-- calender plugin -->
{{HTML::script('bower_components/moment/min/moment.min.js')}}
{{HTML::script('bower_components/fullcalendar/dist/fullcalendar.min.js')}}
<!-- data table plugin -->
{{HTML::script('js/jquery.dataTables.min.js')}}

<!-- select or dropdown enhancer -->
{{HTML::script('bower_components/chosen/chosen.jquery.min.js')}}
<!-- plugin for gallery image view -->
{{HTML::script('bower_components/colorbox/jquery.colorbox-min.js')}}
<!-- notification plugin -->
{{HTML::script('js/jquery.noty.js')}}
<!-- library for making tables responsive -->
{{HTML::script('bower_components/responsive-tables/responsive-tables.js')}}
<!-- tour plugin -->
{{HTML::script('bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js')}}
<!-- star rating plugin -->
{{HTML::script('js/jquery.raty.min.js')}}
<!-- for iOS style toggle switch -->
{{HTML::script('js/jquery.iphone.toggle.js')}}
<!-- autogrowing textarea plugin -->
{{HTML::script('js/jquery.autogrow-textarea.js')}}
<!-- multiple file upload plugin -->
{{HTML::script('js/jquery.uploadify-3.1.min.js')}}
<!-- history.js for cross-browser state change on ajax -->
{{HTML::script('js/jquery.history.js')}}
<!-- application script for Charisma demo -->
{{HTML::script('js/charisma.js')}}


</body>
</html>
