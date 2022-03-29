@extends('layouts.index')

@section('content')

<!-- page content --> 
        <div class="right_col" role="main">

	        <div class="col-md-12 col-sm-12 col-xs-12">
	           
	            <div class="x_panel">
                  <div class="x_title">
                    <h2> Add New User </h2>
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
                    <form enctype="multipart/form-data" method="POST" action="{{route('Add.Create')}}" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left">
                        {{csrf_field()}}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="first_name" id="first_name" required="required" class="form-control col-md-7 col-xs-12" type="text" value="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="last_name" id="last_name"  required="required" class="form-control col-md-7 col-xs-12" type="text" value="">
                        </div>
                      </div> 

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dept">Department<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="dept" id="dept" required="required" class="form-control col-md-7 col-xs-12" type="text" value="">
                        </div>
                      </div> 

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="batch">Batch<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="batch" id="batch" required="required" class="form-control col-md-7 col-xs-12" type="text" value="">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile">Gender<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="gender" class="form-control" required> 
                              <option vale="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile">Mobile<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="mobile" id="mobile" required="required" class="form-control col-md-7 col-xs-12" type="text" value="">
                        </div>
                      </div>
                    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         	<input name="email" id="email" required="required" class="form-control col-md-7 col-xs-12" type="text" value="">
                        </div>
                      </div>
                   

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role">Role<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                       		<select name="role" id="role" class="form-control col-md-7 col-xs-12">
                                 <option value="admin">Admin</option>
                                 <option value="sub-admin"> Sub-admin </option>
                                 <option value="author" selected> Author </option>
                            </select>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                         <a href=""><button class="btn btn-danger" type="button">Cancel</button></a> 
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