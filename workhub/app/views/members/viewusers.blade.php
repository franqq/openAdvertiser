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
            <a href="#">Members</a>
        </li>
        <li>
            <a href="#">View</a>
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
                <h2><i class="glyphicon glyphicon-user"></i> Users</h2>

              
            </div>
           <div class="box-content">
     <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
  <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>User Level</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
        @foreach($members as $member)
    <tr>

        <td>{{$member->username}}</td>
        <td class="center">{{$member->firstname}}</td>
        <td class="center">{{$member->lastname}}</td>
        <td class="center">@if($member->admin==0) User @else Admin @endif</td>
        <td class="center">
            <a class="btn btn-success" data-toggle="modal" data-target="#myModal{{$member->id}}" href="#">
               
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
              
                View
              
            </a>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">View Details</h4>
      </div>
      <div class="modal-body">
         <form class="form-horizontal" role="form" >
  <div class="form-group">
  	
  	 <label for="inputfirstname" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
      <input type="text"  disabled="true" class="form-control" id="inputfirstname" name="User_Name"
      value = "{{$member->username}}" />
    </div>
    
   <label for="inputfirstname" class="col-sm-2 control-label">Firstname</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
      <input type="text"  disabled="true" class="form-control" id="inputfirstname" name="First_Name"
      value = "{{$member->firstname}}" />
    </div>
    
     <label for="inputsecondname" class="col-sm-2 control-label">Secondname</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
      <input type="text"  disabled="true" class="form-control" id="inputsecondname"  name="Second_Name" 
      value = "{{$member->lastname}}" />
    </div>
    
     <label for="inputmobilenumber" class="col-sm-2 control-label">Phone</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
      <input type="text" disabled="true" class="form-control" id="inputmobilenumber" name="Phone_Number" 
      value = "{{$member->phone_number}}" />
    </div>
     
    
    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
      <input type="email" disabled="true" class="form-control" id="inputEmail" name="Email"
      value = "{{$member->email}}" />
    </div>
    

     <label for="inputidnumber" class="col-sm-2 control-label">User Level</label>
    <div class="col-sm-10" >
    <input type="text"  disabled="true" class="form-control" id="inputidnumber" name="National_ID" placeholder="Enter the national Id*"
      value = "@if($member->admin==0) User @else Admin @endif" />
    </div> 
     
    
</div>
 
</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
            <a class="btn btn-info" data-toggle="modal" data-target="#mysecondModal{{$member->id}}"  href="#">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <!-- Modal -->
<div class="modal fade" id="mysecondModal{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
       <form class="form-horizontal" role="form" action="{{URL::route('edituser-post')}}" method="post">
  <div class="form-group">
  	
  	<label for="inputusername" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
      <input type="text" class="form-control" id="inputusername" name="User_Name" required="required" placeholder="Enter the username*"
      value="{{$member->username}}" />
    </div>
     @if($errors->has('User_Name'))
              <div style="color:#990000; text-align:center;">{{$errors->first('User_Name')}}</div>
     @endif
    
   <label for="inputfirstname" class="col-sm-2 control-label">Firstname</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
      <input type="text" class="form-control" id="inputfirstname" name="First_Name" required="required" placeholder="Enter the first name*"
      value="{{$member->firstname}}" />
    </div>
     @if($errors->has('First_Name'))
              <div style="color:#990000; text-align:center;">{{$errors->first('First_Name')}}</div>
     @endif
    
     <label for="inputsecondname" class="col-sm-2 control-label">Secondname</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
      <input type="text" class="form-control" id="inputsecondname"  name="Second_Name"  required="required" placeholder="Enter the second name*"
       value="{{$member->lastname}}" />
    </div>
     @if($errors->has('Second_Name'))
              <div style="color:#990000; text-align:center;">{{$errors->first('Second_Name')}}</div>
     @endif
    
     <label for="inputmobilenumber" class="col-sm-2 control-label">Phone</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
      <input type="text" class="form-control" id="inputmobilenumber" name="Phone_Number" required="required" placeholder="Enter the phone number*"
       value="{{$member->phone_number}}" />
    </div>
     @if($errors->has('Phone_Number'))
            <div style="color:#990000; text-align:center;">{{$errors->first('Phone_Number')}}</div>
     @endif
    
    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
      <input type="email" class="form-control" id="inputEmail" name="Email" placeholder="Email"
       value="{{$member->email}}" />
    </div>
    @if($errors->has('Email'))
            <div style="color:#990000; text-align:center;">{{$errors->first('Email')}}</div>
    @endif
    

    <label for="inputidnumber" class="col-sm-2 control-label">User Level</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
     <select class="form-control" name="Level" id="selectlevel" required="required" >
      <option value=''>Select</option>
       <option @if($member->admin == 0) selected="true" @endif value="0">User</option>
       <option @if($member->admin == 1) selected="true" @endif value="1">Admin</option>
    </select>      
     
    </div>
     @if($errors->has('Level'))
            <div style="color:#990000; text-align:center;>{{$errors->first('Level')}}</div>
     @endif
  </div>
 
 <input type="hidden" name="memberID" value="{{$member->id}}">
 
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    </div>
  </div>
  {{Form::token()}}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
            <a class="btn btn-danger"  data-toggle="modal" data-target="#mydeleteModal{{$member->id}}" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>

<!-- Modal -->
<div class="modal fade" id="mydeleteModal{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"> Confirm Delete</h4>
      </div>
      <div class="modal-body">
       Are You Sure You Sure You Want To Delete?
       <form id="deleteinfo" action="{{URL::route('deleteuser-post')}}" method="post">
        <input type="hidden" id="memberID" name="memberID" value="{{$member->id}}">
        {{Form::token()}}
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-danger">Yes</button>
      </div>
       </form>
    </div>
  </div>
</div>
        </td>
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
