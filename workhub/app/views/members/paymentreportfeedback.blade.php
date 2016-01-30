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
	
	<input type="date" class="form-control"  e{{(Input::old('Start_Date')) ? ' value ='.Input::old('Start_Date'). '' : ''}} name="Start_Date">
	</div>
	<div   style="float:left;margin-left:10px;">
	
     <label for="inputdateto" class="col-sm-2 ">Date To</label>
	 </div>
	<div  style="float:left;margin-left:0;">
    <input type="date" class="form-control"   e{{(Input::old('End_Date')) ? ' value ='.Input::old('End_Date'). '' : ''}} name="End_Date">
  </div>
  </div>
 
 
  
  <div class="form-group" style="float:left;">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Generate</button>
    </div>
  </div>
  
  <div id="ourtable" class="box-content">
  <table class="table table-striped table-bordered bootstrap-datatable  responsive">
    <thead>
    <tr>
	<th>Withdrawal Date</th>
  	<th>Amount</th>
	<th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($payments as $payment)
    <tr>
	  <td class="center">{{date("m-d-Y",strtotime($payment->withdrawal_date))}}</td>
	  <td class="center">{{$payment->amount}}</td>
	  <td class="center">@if($payment->paid == TRUE)Paid @else In Process @endif</td>
    </tr>
    @endforeach
    
    </tbody>
    </table>
	</div>
	
	 <div class="form-group" style="float:left;">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" onclick="printDiv()" class="btn btn-primary">Print</button>

      <script type="text/javascript">
        function printDiv() {
         var printContents = document.getElementById('ourtable').innerHTML;
         var originalContents = document.body.innerHTML;

         document.body.innerHTML = printContents;

         window.print();

         document.body.innerHTML = originalContents;
        }
     </script>

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

@include('members.layout.head')