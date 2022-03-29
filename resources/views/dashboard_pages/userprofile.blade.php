@extends('layouts.index')

@section('content')

<!-- page content --> 
        <div class="right_col" role="main">

	        <div class="col-md-12 col-sm-12 col-xs-12">
	            <div class="x_panel">
	              
					<div class="panel panel-info">
				            <div class="panel-heading">
				              <h3 class="panel-title">{{$UserProfile->first_name}} {{$UserProfile->last_name}} </h3>
				            </div>
				            <div class="panel-body">
				              <div class="row">
				                <div class="col-md-3 col-lg-3 " align="center"> 
				                
				                @if(!$UserProfile->avatar)
				                	<img alt="Upload Your Pic" src="/storage/avatars/default/img.jpg" class="img-circle img-responsive" style="width:200px; height:200px;"> 
				                @else
				                	<img alt="Upload Your Pic" src="/storage/avatars/{{$UserProfile->avatar}}" class="img-circle img-responsive" style="width:200px; height:200px;"> 
								@endif
				                </div>
				                
				                <div class=" col-md-9 col-lg-9 "> 
				                  <table class="table table-user-information">
				                    <tbody>
				                      <tr>
				                        <td>Department:</td>
				                        <td>{{$UserProfile->dept}}</td>
				                       
									  </tr>

				                      <tr>
				                        <td>Batch:</td>
				                        <td>{{$UserProfile->batch}}th</td>
				                      </tr>

				                       <tr>
				                        <td>Gender:</td>
				                        <td>{{$UserProfile->gender}}</td>
				                      </tr>

				                      <tr>
				                        <td>Role</td>
				                        <td>{{$UserProfile->role}}</td>
				                      </tr>
				                   
				                		<tr>
				                        	<td>Mobile</td>
				                        	<td>{{$UserProfile->mobile}}</td>
				                      	</tr>

				                       <tr>
				                        <td>Email</td>
				                        <td><a href="#">{{$UserProfile->email}}</a></td>
				                      </tr>

				                    </tbody>
				                  </table>
				                  
				                 <a href="{{route('UserProfile.Edit',$UserProfile->id)}}" class="btn btn-primary">Update Profile </a>
				                 <a href="{{route('Change_Password')}}" class="btn btn-primary">Change Password </a>

				                </div>
				              </div>
				            </div>
		                    <div class="panel-footer">
		                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
		                        <span class="pull-right">
		                            <a href="{{route('UserProfile.Edit',$UserProfile->id)}}" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
		                            <a href="{{route('UserDelete',$UserProfile->id)}}" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
		                        </span>
		                    </div>
		            
				    </div>


				</div>
			</div>
        </div>
        <!-- /page content -->



  
@endsection