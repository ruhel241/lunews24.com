@extends('layouts.index')

@section('content')

<!-- page content --> 
        <div class="right_col" role="main">

	        <div class="col-md-12 col-sm-12 col-xs-12">
	           
	            <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Profile Information</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form enctype="multipart/form-data" method="POST" action="{{route('UserprofileUpdate',$UserProfileEdit->id)}}" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left">
                         {!! csrf_field() !!}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="first_name" id="first_name" required="required" class="form-control col-md-7 col-xs-12" type="text" value="{{$UserProfileEdit->first_name}}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="last_name" id="last_name"  required="required" class="form-control col-md-7 col-xs-12" type="text" value="{{$UserProfileEdit->last_name}}">
                        </div>
                      </div> 

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dept">Department<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="dept" id="dept" required="required" class="form-control col-md-7 col-xs-12" type="text" value="{{$UserProfileEdit->dept}}">
                        </div>
                      </div> 

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="batch">Batch<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="batch" id="batch" required="required" class="form-control col-md-7 col-xs-12" type="text" value="{{$UserProfileEdit->batch}}">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile">Mobile<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="mobile" id="mobile" required="required" class="form-control col-md-7 col-xs-12" type="text" value="{{$UserProfileEdit->mobile}}">
                        </div>
                      </div>
                    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile">Gender<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                               <select name="gender" class="form-control" required> 
                                  @if($UserProfileEdit->gender == 'Male')
                                    <option vale="{{$UserProfileEdit->gender}}"> {{$UserProfileEdit->gender}}</option>
                                    <option value="Female">Female</option>
                                  @elseif($UserProfileEdit->gender == 'Female')
                                    <option vale="{{$UserProfileEdit->gender}}"> {{$UserProfileEdit->gender}}</option>
                                    <option value="Male">Male</option>
                                  @endif
                                </select>
                          </div>
                      </div>


                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          @if(Auth::user()->role == 'author') 
                            <input name="{{$UserProfileEdit->email}}" title="Sorry you can't change your Email, Plz Contact with admin" class="form-control col-md-7 col-xs-12" value="{{$UserProfileEdit->email}}" disabled>
                          @endif

                          @if(Auth::user()->role == 'admin' OR Auth::user()->role == 'sub-admin') 
                            <input name="email" id="email" required="required" class="form-control col-md-7 col-xs-12" type="text" value="{{$UserProfileEdit->email}}">
                           @endif
                        </div>
                      </div>
                   

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role">Role<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          @if(Auth::user()->role == 'author') 
                            <input name="{{$UserProfileEdit->role}}" title="Sorry you can't change your Role, Plz Contact with admin" class="form-control col-md-7 col-xs-12" value="{{$UserProfileEdit->role}}" disabled>
                          @endif

                          @if(Auth::user()->role == 'admin' OR Auth::user()->role == 'sub-admin')
                              <select name="role" id="role" class="form-control col-md-7 col-xs-12">
                                @if($UserProfileEdit->role == 'admin')
                                  <option selected value="{{$UserProfileEdit->role}}">{{$UserProfileEdit->role}}</option>

                                @elseif($UserProfileEdit->role == 'sub-admin')
                                  <option selected value="{{$UserProfileEdit->role}}">{{$UserProfileEdit->role}}</option> 
                                  <option value="author"> author </option>

                                @elseif($UserProfileEdit->role == 'author')
                                 <option selected value="{{$UserProfileEdit->role}}">{{$UserProfileEdit->role}}</option>
                                 <option value="sub-admin"> sub-admin </option>

                                @endif
                              </select>
                          @endif
                        
                       </div>
                      </div>
                   

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file">Profile Image
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="avatar" style="margin-top:8px" value="{{$UserProfileEdit->avatar}}">
                        </div>
                      </div>


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                         <a href="{{route('UserProfile',$UserProfileEdit->id)}}"><button class="btn btn-danger" type="button">Cancel</button></a> 
						              <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>

			</div>
        </div>
        <!-- /page content -->



  
@endsection