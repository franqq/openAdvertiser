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
            <a href="#">Links</a>
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
                <h2><i class="glyphicon glyphicon-user"></i> My Links</h2>

              
            </div>
           <div class="box-content">
     <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
	  
	  <th>Name</th>
        <th>Share Link</th>
        <th>Unique Visits</th>
        <th>Status</th>
        <th>Actions/Options</th>
    </tr>
    </thead>
    <tbody>
        @foreach($links as $link)
    <tr>

       
        <td>{{$link->name}}</td>
        <td class="center"> <a href="{{URL::to(Auth::user()->username.'/'.$link->id)}}">share.squeeber.com/{{Auth::user()->username}}/{{$link->id}}</a></td>
        <td class="center">{{$link->clicks}}</td>
        <td class="center">@if($link->active == TRUE) Active @else In Active @endif</td>
        
        <td class="center">
         
            <a class="btn btn-info" data-toggle="modal" data-target="#mysecondModal{{$link->id}}"  href="#">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
 <!-- Modal -->
<div class="modal fade" id="mysecondModal{{$link->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Link</h4>
      </div>
      <div class="modal-body">
       <form class="form-horizontal" role="form" action="{{URL::route('linkedit-post')}}" method="post">
  <div class="form-group">
    
   <label for="Name" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
      <input type="text" class="form-control" id="Name" name="Name" required="required" 
      placeholder="Enter Name*" value="{{$link->name}}" />
    </div>
     @if($errors->has('Name'))
         <div style="color:#990000; text-align:center;">{{$errors->first('Name')}}</div>
     @endif
    
    <label for="Link" class="col-sm-2 control-label">Link</label>
    <div class="col-sm-10" style="margin-bottom:15px;">
      <input type="url" class="form-control" id="Link" name="Link" required="required" 
      placeholder="Enter link*" value="{{$link->link_name}}" />
    </div>
     @if($errors->has('Link'))
         <div style="color:#990000; text-align:center;">{{$errors->first('Link')}}</div>
     @endif
    
     
    <label for="inputidnumber" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="5" id="inputmessage"  name="Description" required="required" placeholder="Type your a description of your share link here.....*">{{$link->link_description}}</textarea>
   		 @if($errors->has('Description'))
              <div style="color:#990000; text-align:center;"><br />{{$errors->first('Description')}}</div>
    	 @endif
    
     
     
 
 <input type="hidden" name="memberID" value="{{$link->id}}">
 
  
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
</div>
</div>

<a class="btn btn-danger"  data-toggle="modal" data-target="#mydeleteModal{{$link->id}}" href="">
    <i class="glyphicon glyphicon-trash icon-white"></i>
    Delete
</a>

<!-- Modal -->
<div class="modal fade" id="mydeleteModal{{$link->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"> Confirm Delete</h4>
      </div>
      <div class="modal-body">
       Are You Sure You Sure You Want To Delete?
       <form id="deleteinfo" action="{{URL::route('linkdelete-post')}}" method="post">
        <input type="hidden" id="memberID" name="memberID" value="{{$link->id}}">
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
