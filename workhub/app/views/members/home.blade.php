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
            <a href="#"></a>
        </li>
    </ul>
</div>
     <div style ="text-align:center;"> 
                    @if(Session::has('global'))
                    <div style="color:#990000;">{{Session::get('global')}}</div>
                    @endif
    </div>

<div class=" row">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="" class="well top-block" href="#">
            <i class="glyphicon glyphicon-star red"></i>

            <div>Total Visits</div>
            <div>{{$totalvisits}}</div>
           
        </a>
    </div>
	  <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="" class="well top-block" href="#">
            <i class="glyphicon glyphicon-star blue"></i>

            <div>Balance</div>
            <div>{{$balance}}.00</div>
         
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="" class="well top-block" href="#">
            <i class="glyphicon glyphicon-star blue"></i>

            <div>Withdrawn</div>
            <div>Ksh {{$withdrawn}}</div>
            
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="" class="well top-block" href="#">
            <i class="glyphicon glyphicon-star red"></i>

            <div>Total Earned</div>
            <div>Ksh {{$totalearned}}.00</div>
         </a>
    </div>

  
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Squeeber WorkHub</h2>

              
            </div>
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                    <h1>Your College Notice Board <br>
                    </h1>
                    <p>Squeeber provides a simple solution to the complications involved in college students all over the world having to print notices and pin them in all notice boards within the college premises. Squeeber provides a platform where anyone can communicate to the students in any college by creating a free squeeb(notice) be it an event,an official notice, sales or Jobs and Internship information

					</p>

                </div>
               

            </div>
        </div>
    </div>
</div>


    <!--/span-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div>

@include('members.layout.footer')