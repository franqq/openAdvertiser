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
            <a href="#">Earnings</a>
        </li>
    </ul>
</div>

<div style ="text-align:center;"> 
                    @if(Session::has('global'))
                    <div style="color:#990000;">{{Session::get('global')}}</div>
                    @endif
</div>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-user"></i> My Links</h2>

              
            </div>
           <div class="box-content">
     <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
	  <th>ID</th>
	  
        <th>Share Link</th>
        <th>Earned (Kes)</th>
        
    </tr>
    </thead>
    <tbody>
    @foreach($links as $link)
    <tr>

        <td>{{$link->id}}</td>
        
        <td class="center"> www.squeeber.com/share/{{Auth::user()->username}}/{{$link->id}}</td>
        <td class="center">{{ceil($link->clicks * 0.1)}}.00</td>
       
        
    </tr>
    @endforeach
    
  
    </tbody>
    </table>
     </div>
        </div>
    </div>
</div>


    <!--/span-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

@include('members.layout.footer')
