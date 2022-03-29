@extends('layouts.index')
@section('content')


        <!-- page content -->
        <div class="right_col" role="main">

         <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Logo Edit Section</h2> 

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
                   
                    <div class="col-md-6 col-md-offset-3">  
                      <div class="dashboard_add"> 
                        <form  action="{{route('logo.upload',$LogoEdit->id)}}" method="POST" enctype="multipart/form-data">
                       	{{csrf_field()}}
                         <h4> <label> Logo Upload </label></h4>
                      
                          <div class="form-group"> 
                            <div class="row">
                              <div class="col-md-12">
                                 <img src="/storage/logo/{{$LogoEdit->value}}" width="350" height="auto"><br><br>
                              	 <input type="file" name="logo" value="{{$LogoEdit->value}}">
                              </div>

                            </div>
                          </div>
								
							 <button type="submit" class="btn btn-primary" style="width: 350px">Submit</button>
                       
                        </form>
                      </div>
                    </div> 



                  </div>
                </div>
              </div>
       </div>
        <!-- /page content -->
@endsection