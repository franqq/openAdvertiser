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
            <a href="#"> Withdraw</a>
        </li>
		
    </ul>
</div>


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-edit"></i> Withdraw</h2>

              
            </div>
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                  <div style ="text-align:center;"> 
                    @if(Session::has('global'))
                    <div style="color:#990000;">{{Session::get('global')}}</div>
                    @endif
            </div>
                   <form class="form-horizontal" role="form" action="{{URL::route('withdraw-post')}}" method="post">
  <div class="form-group">
    
   <label for="Amount" class="col-sm-2 control-label">Amount</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
      <input type="text" class="form-control" id="Amount" name="Amount" required="required" placeholder="Enter Amount: Minimum is Ksh 500*"
      e{{(Input::old('Amount')) ? ' value ='.Input::old('Amount'). '' : ''}} />
    </div>
     @if($errors->has('Amount'))
              <div style="color:#990000; text-align:center;">{{$errors->first('Amount')}}</div>
     @endif	
	
  </div>
 
 
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Request Withdrawal</button>
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
