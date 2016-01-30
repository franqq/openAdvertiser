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
            <a href="#">Link</a>
        </li>
		<li>
            <a href="#">Create</a>
        </li>
    </ul>
</div>


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-edit"></i> Add Link</h2>

              
            </div>
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                  <div style ="text-align:center;"> 
                    @if(Session::has('global'))
                    <div style="color:#990000;">{{Session::get('global')}}</div>
                    @endif
            </div>
                   <form class="form-horizontal" role="form" action="{{URL::route('addlink-post')}}" method="post">
  <div class="form-group">
  	
  	<label for="inputfirstname" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
      <input type="text" class="form-control" id="Name" name="Name" required="required" placeholder="Enter Short Title*"
      e{{(Input::old('Name')) ? ' value ='.Input::old('Name'). '' : ''}} />
    </div>
     @if($errors->has('Name'))
              <div style="color:#990000; text-align:center;">{{$errors->first('Name')}}</div>
     @endif
    
   <label for="inputfirstname" class="col-sm-2 control-label">Link</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
      <input type="url" class="form-control" id="Link" name="Link" required="required" placeholder="eg. http://www.example.com*"
      e{{(Input::old('Link')) ? ' value ='.Input::old('Link'). '' : ''}} />
    </div>
     @if($errors->has('Link'))
              <div style="color:#990000; text-align:center;">{{$errors->first('Link')}}</div>
     @endif    
     
     <label for="inputidnumber" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="5" id="inputmessage"  name="Description" required="required" placeholder="Type your a description of your share link here.....*">@if(Input::old('Description')){{Input::old('Description')}}@endif</textarea>
   		 @if($errors->has('Description'))
              <div style="color:#990000; text-align:center;"><br />{{$errors->first('Description')}}</div>
    	 @endif

    </div>
	
	 
  </div>
 
 
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Create</button>
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
