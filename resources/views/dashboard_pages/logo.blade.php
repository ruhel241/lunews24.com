@extends('layouts.index')
@section('content')


        <!-- page content -->
        <div class="right_col" role="main">

         <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Logo Section</h2>

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
                   <div class="row">
                    
                    <div class="col-md-8 col-md-offset-3">  
                      	<h4><label>  Logo </label></h4>
                          <div class="form-group"> 
                           		@foreach($LogoShow as $Logo)
                                 	<img src="/storage/logo/{{$Logo->value}}" width="350" height="auto"><br><br>
                                  <a href="{{route('logo.Edit',$Logo->id)}}"><button class="btn btn-info" style="width: 350px">Edit</button></a>
                              @endforeach 
							            </div>
                    </div> 

            </div>
          </div>
      </div>
    </div>
</div>
        <!-- /page content -->
@endsection