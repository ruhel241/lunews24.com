@extends('layouts.index')
@section('content')
@php
  use Carbon\Carbon;
  $current_time = Carbon::now('Asia/Dhaka');
@endphp

        <!-- page content -->
        <div class="right_col" role="main">

         <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Advertise Section</h2>

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
                   
                    <div class="col-md-6 col-md-offset-2">  
                      <div class="dashboard_add"> 
                        <form action="{{route('Advertise.update',$advertise_Edit->id)}}" method="POST" enctype="multipart/form-data">
                         {{csrf_field()}}
                        <!--  <label> Header Top Banner </label> -->
                      
                          <div class="form-group"> 
                            <div class="row">
                              <div class="col-md-12">
                                 @if($advertise_Edit->show_hide == 0 OR $advertise_Edit->ending_date < $current_time )
                                    <img src="/storage/addvertisefolder/default/1.jpg" width="50%" height="auto"><br><br>
                                  @else
                                   <img src="/storage/addvertisefolder/{{$advertise_Edit->add_image}}" width="50%" height="auto"><br><br>
                                  @endif 

                              </div>


                              <div class="col-md-8"> 
                                <input name="add_image" type="file" value="">
                              </div>  

                              <div class="col-md-4"> 
                                 <input name="type" type="text" value="{{$advertise_Edit->type}}" class="form-control" disabled>
                              </div>

                            </div>
                          </div>

                          <div class="form-group"> 
                            <div class="row">
                             
                             <div class="col-md-6"> 
                                <input name="title" type="text" class="form-control" placeholder="Title" value="{{$advertise_Edit->title}}">
                              </div> 

                              <div class="col-md-6">
                                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                    <input name="ending_date" value="{{ Carbon::parse($advertise_Edit->ending_date)->format('m/d/Y g:i A') }}" type="text" class="form-control datetimepicker-input datetimepicker" data-target="#datetimepicker1"/>
                                    <span class="input-group-addon" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                      <span class="fa fa-calendar"></span>
                                    </span>
                                  </div>
                              </div>
                            
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="row">
                                <div class="col-md-9"> 
                                  <input name="image_url" type="text" class="form-control" id="" value="{{$advertise_Edit->image_url}}">
                                </div>

                                <div class="col-md-3"> 
                                    <select name="show_hide" class="form-control">
                                      <option>Select</option>
                                      <option value="1" selected>Show</option>
                                      <option value="0">Hide</option>
                                    </select>
                                </div>

                            </div>  
                          </div>

                        <!-- <a href="#"><button class="btn btn-default">Cancel</button></a> -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                        
                        </form>
                      </div>
                    </div> 



                  </div>
                </div>
              </div>
       </div>
        <!-- /page content -->
@endsection