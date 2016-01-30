<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"> <div class="hidden-xs" >{{HTML::image('img/logo20.png')}}</div>
                <span>Ad Hub</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs">{{Auth::user()->firstname}}</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                   
                    <li><a href="{{URL::route('account-logout')}}">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

			 <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                <li><a href="#"><i class="glyphicon glyphicon-globe"></i> adback.co.ke</a></li>
                
            </ul>

            <!-- theme selector starts -->
          
            <!-- theme selector ends -->

        

        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>
                        <li><a class="ajax-link" href="{{URL::route('home-get')}}"><i class="glyphicon glyphicon-home"></i> Home</a>                        </li>
						 
                                    
                           <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i><span> My Links</span></a>
                            <ul class="nav nav-pills nav-stacked">
                              <li><a href="{{URL::route('addlink-get')}}">New</a></li>
                              <li><a href="{{URL::route('viewlink-get')}}">Active</a></li>
							  <li><a href="{{URL::route('viewalllink-get')}}">All</a></li>
                            </ul>
                        
                         <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i><span> Payment</span></a>
                            <ul class="nav nav-pills nav-stacked">
                            	 <li><a href="{{URL::route('viewearning-get')}}">My Earnings</a></li>
                                <li><a href="{{URL::route('withdraw-get')}}">Request Payment</a></li>
                                <li><a href="{{URL::route('payment-get')}}">Payment Report</a></li>
							
                            </ul>
                        
						</li>
                        
                        

                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i><span> Settings</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="{{URL::route('changepassword-get')}}">Change Password</a></li>
                                @if(Auth::user()->admin == TRUE)<li><a href="{{URL::route('newuser-get')}}">New User</a></li>@endif
                                 @if(Auth::user()->admin == TRUE)<li><a href="{{URL::route('viewusers-get')}}">View Users</a></li>@endif
                              
                             
                            
                            </ul>
                        </li>
						
						
                        <li><a class="ajax-link" href="{{URL::route('terms-get')}}"><i
                                    class="glyphicon glyphicon-list-alt"></i><span> Terms</span></a></li>
  

						<li><a href="{{URL::route('account-logout')}}"><i class="glyphicon glyphicon-lock"></i><span> Logout</span></a>
                        </li>    
                    </ul>
                    
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>
