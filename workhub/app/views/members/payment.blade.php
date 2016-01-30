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
            <a href="#">Payments</a>
        </li>
        <li>
            <a href="#"> Report</a>
        </li>
		
    </ul>
</div>


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-list-alt"></i>  Generate Report</h2>

              
            </div>
             <div style ="text-align:center;"> 
                    @if(Session::has('global'))
                    <div style="color:#990000;">{{Session::get('global')}}</div>
                    @endif
            </div>
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                   <form class="form-horizontal" role="form" action="{{URL::route('paymentreports-post')}}" method="post">
 <div  style="float:left;margin-left:10px;">
	 <label class="col-sm-2 " for="inputdate" >Date From</label>
    </div>
	<div  style="float:left;margin-left:0;">
	
	<input type="date" class="form-control" e{{(Input::old('Start_Date')) ? ' value ='.Input::old('Start_Date'). '' : ''}} name="Start_Date" placeholder="mm/dd/yyyy">
	</div>
	<div   style="float:left;margin-left:10px;">
	
     <label for="inputdateto" class="col-sm-2 ">Date To</label>
	 </div>
	<div  style="float:left;margin-left:0;">
    <input type="date" class="form-control" e{{(Input::old('End_Date')) ? ' value ='.Input::old('End_Date'). '' : ''}}  name="End_Date" placeholder="mm/dd/yyyy">
  </div>
  </div>
 
 
  
  <div class="form-group" style="float:left;">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Generate</button>
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
