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
                    <h2>Advertise Section</h2>

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
                      <h4><label>  Header Top Banner </label></h4>
                          <div class="form-group"> 
                                @foreach($showAddImages as $showAddImage)
                                  @if($showAddImage->type == 'top-banner')
                                   
                                    @if($showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                      <img src="/storage/addvertisefolder/default/1.jpg"><br><br>
                                    @else
                                      <img src="/storage/addvertisefolder/{{$showAddImage->add_image}}" class="top-banner"><br><br>
                                    @endif
   
                                    Title: {{$showAddImage->title}} <br>
                                    Advertise Link: <a href="http://{{$showAddImage->image_url}}">{{$showAddImage->image_url}}</a><br>
                                    Type: {{$showAddImage->type}}<br>

                                    Ending Time: <span style="color: red ; font-weight: bold;"> {{ Carbon::parse($showAddImage->ending_date)->format('d-m-Y g:i A') }} </span> <br>

                                    @php 
                                        $end_days = Carbon::parse($showAddImage->ending_date);
                                        $Ending_days_count = $end_days->diffInDays($current_time); 
                                    @endphp
                                    Ending Days Count: <span style="color: red ; font-weight: bold;"> {{$Ending_days_count}} @if($Ending_days_count == 0) day <br> @else days <br> @endif </span>
                                    Visiable:
                                    @if( $showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                        <span style="color: red ; font-weight: bold;"> OFF  </span><br><br>
                                    @else
                                          <span style="color:green; font-weight: bold;">  ON </span><br><br>
                                    @endif

                                    <a href="{{route('Advertise_Edit',$showAddImage->id)}}"><button class="btn btn-default">Edit</button></a>
                                    <button type="#" class="btn btn-default">Delete</button>
                                  @endif
                                @endforeach 
                           </div>
                           <br> <div style="border-top: 2px solid #E6E9ED"></div><br>
                       </div> 

                    <div class="col-md-8 col-md-offset-3">  
                      <h4><label> Header Banner </label></h4>
                          <div class="form-group"> 
                                @foreach($showAddImages as $showAddImage)
                                  @if($showAddImage->type == 'header-banner')
                                   
                                    @if($showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                      <img src="/storage/addvertisefolder/default/1.jpg"><br><br>
                                    @else
                                      <img src="/storage/addvertisefolder/{{$showAddImage->add_image}}" class="header-banner"><br><br>
                                    @endif
   
                                    Title: {{$showAddImage->title}} <br>
                                    Advertise Link: <a href="http://{{$showAddImage->image_url}}">{{$showAddImage->image_url}}</a><br>
                                    Type: {{$showAddImage->type}}<br>

                                    Ending Time: <span style="color: red ; font-weight: bold;"> {{ Carbon::parse($showAddImage->ending_date)->format('d-m-Y g:i A') }} </span> <br>

                                    @php 
                                        $end_days = Carbon::parse($showAddImage->ending_date);
                                        $Ending_days_count = $end_days->diffInDays($current_time); 
                                    @endphp
                                    Ending Days Count: <span style="color: red ; font-weight: bold;"> {{$Ending_days_count}} @if($Ending_days_count == 0) day <br> @else days <br> @endif </span>
                                    Visiable:
                                    @if( $showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                        <span style="color: red ; font-weight: bold;"> OFF  </span><br><br>
                                    @else
                                          <span style="color:green; font-weight: bold;">  ON </span><br><br>
                                    @endif

                                    <a href="{{route('Advertise_Edit',$showAddImage->id)}}"><button class="btn btn-default">Edit</button></a>
                                    <button type="#" class="btn btn-default">Delete</button>
                                  @endif
                                @endforeach 
                           </div>

                           <br> <div style="border-top: 2px solid #E6E9ED"></div><br>
                      </div> 



                    <div class="col-md-8 col-md-offset-3">  
                       <h4><label> Home Post Image 1 </label> </h4>
                          <div class="form-group"> 
                                @foreach($showAddImages as $showAddImage)
                                  @if($showAddImage->type == 'PostImage_1')
                                   
                                    @if($showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                      <img src="/storage/addvertisefolder/default/1.jpg"><br><br>
                                    @else
                                      <img src="/storage/addvertisefolder/{{$showAddImage->add_image}}" class="PostImage_1"><br><br>
                                    @endif
   
                                    Title: {{$showAddImage->title}} <br>
                                    Advertise Link: <a href="http://{{$showAddImage->image_url}}">{{$showAddImage->image_url}}</a><br>
                                    Type: {{$showAddImage->type}}<br>

                                    Ending Time: <span style="color: red ; font-weight: bold;"> {{ Carbon::parse($showAddImage->ending_date)->format('d-m-Y g:i A') }} </span> <br>

                                    @php 
                                        $end_days = Carbon::parse($showAddImage->ending_date);
                                        $Ending_days_count = $end_days->diffInDays($current_time); 
                                    @endphp
                                    Ending Days Count: <span style="color: red ; font-weight: bold;"> {{$Ending_days_count}} @if($Ending_days_count == 0) day <br> @else days <br> @endif </span>
                                    Visiable:
                                    @if( $showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                        <span style="color: red ; font-weight: bold;"> OFF  </span><br><br>
                                    @else
                                          <span style="color:green; font-weight: bold;">  ON </span><br><br>
                                    @endif

                                    <a href="{{route('Advertise_Edit',$showAddImage->id)}}"><button class="btn btn-default">Edit</button></a>
                                    <button type="#" class="btn btn-default">Delete</button>
                                  @endif
                                @endforeach 
                           </div>   
                          <br> <div style="border-top: 2px solid #E6E9ED"></div><br>
                      </div> 

                    <div class="col-md-8 col-md-offset-3">  
                       <h4><label>Home Post Image 2 </label> </h4>
                          <div class="form-group"> 
                                @foreach($showAddImages as $showAddImage)
                                  @if($showAddImage->type == 'PostImage_2')
                                   
                                    @if($showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                      <img src="/storage/addvertisefolder/default/1.jpg"><br><br>
                                    @else
                                      <img src="/storage/addvertisefolder/{{$showAddImage->add_image}}" class="PostImage_2"><br><br>
                                    @endif
   
                                    Title: {{$showAddImage->title}} <br>
                                    Advertise Link: <a href="http://{{$showAddImage->image_url}}">{{$showAddImage->image_url}}</a><br>
                                    Type: {{$showAddImage->type}}<br>

                                    Ending Time: <span style="color: red ; font-weight: bold;"> {{ Carbon::parse($showAddImage->ending_date)->format('d-m-Y g:i A') }} </span> <br>

                                    @php 
                                        $end_days = Carbon::parse($showAddImage->ending_date);
                                        $Ending_days_count = $end_days->diffInDays($current_time); 
                                    @endphp
                                    Ending Days Count: <span style="color: red ; font-weight: bold;"> {{$Ending_days_count}} @if($Ending_days_count == 0) day <br> @else days <br> @endif </span>
                                    Visiable:
                                    @if( $showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                        <span style="color: red ; font-weight: bold;"> OFF  </span><br><br>
                                    @else
                                          <span style="color:green; font-weight: bold;">  ON </span><br><br>
                                    @endif

                                    <a href="{{route('Advertise_Edit',$showAddImage->id)}}"><button class="btn btn-default">Edit</button></a>
                                    <button type="#" class="btn btn-default">Delete</button>
                                  @endif
                                @endforeach 
                           </div>    
                           <br> <div style="border-top: 2px solid #E6E9ED"></div><br>
                      </div> 


                    <div class="col-md-8 col-md-offset-3">  
                       <h4><label> Home Post Image Gif 1 </label></h4>
                          <div class="form-group"> 
                                @foreach($showAddImages as $showAddImage)
                                  @if($showAddImage->type == 'PostImage_Gif_1')
                                   
                                    @if($showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                      <img src="/storage/addvertisefolder/default/1.jpg"><br><br>
                                    @else
                                      <img src="/storage/addvertisefolder/{{$showAddImage->add_image}}" class="PostImage_Gif_1"><br><br>
                                    @endif
   
                                    Title: {{$showAddImage->title}} <br>
                                    Advertise Link: <a href="http://{{$showAddImage->image_url}}">{{$showAddImage->image_url}}</a><br>
                                    Type: {{$showAddImage->type}}<br>

                                    Ending Time: <span style="color: red ; font-weight: bold;"> {{ Carbon::parse($showAddImage->ending_date)->format('d-m-Y g:i A') }} </span> <br>

                                    @php 
                                        $end_days = Carbon::parse($showAddImage->ending_date);
                                        $Ending_days_count = $end_days->diffInDays($current_time); 
                                    @endphp
                                    Ending Days Count: <span style="color: red ; font-weight: bold;"> {{$Ending_days_count}} @if($Ending_days_count == 0) day <br> @else days <br> @endif </span>
                                    Visiable:
                                    @if( $showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                        <span style="color: red ; font-weight: bold;"> OFF  </span><br><br>
                                    @else
                                          <span style="color:green; font-weight: bold;">  ON </span><br><br>
                                    @endif

                                    <a href="{{route('Advertise_Edit',$showAddImage->id)}}"><button class="btn btn-default">Edit</button></a>
                                    <button type="#" class="btn btn-default">Delete</button>
                                  @endif
                                @endforeach 
                           </div>  
                         <br> <div style="border-top: 2px solid #E6E9ED"></div><br>
                    </div> 



                    <div class="col-md-8 col-md-offset-3">  
                       <h4><label> Home Post Image 3</label> </h4>
                          <div class="form-group"> 
                                @foreach($showAddImages as $showAddImage)
                                  @if($showAddImage->type == 'PostImage_3')
                                   
                                    @if($showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                      <img src="/storage/addvertisefolder/default/1.jpg"><br><br>
                                    @else
                                      <img src="/storage/addvertisefolder/{{$showAddImage->add_image}}" class="PostImage_3"><br><br>
                                    @endif
   
                                    Title: {{$showAddImage->title}} <br>
                                    Advertise Link: <a href="http://{{$showAddImage->image_url}}">{{$showAddImage->image_url}}</a><br>
                                    Type: {{$showAddImage->type}}<br>

                                    Ending Time: <span style="color: red ; font-weight: bold;"> {{ Carbon::parse($showAddImage->ending_date)->format('d-m-Y g:i A') }} </span> <br>

                                    @php 
                                        $end_days = Carbon::parse($showAddImage->ending_date);
                                        $Ending_days_count = $end_days->diffInDays($current_time); 
                                    @endphp
                                    Ending Days Count: <span style="color: red ; font-weight: bold;"> {{$Ending_days_count}} @if($Ending_days_count == 0) day <br> @else days <br> @endif </span>
                                    Visiable:
                                    @if( $showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                        <span style="color: red ; font-weight: bold;"> OFF  </span><br><br>
                                    @else
                                          <span style="color:green; font-weight: bold;">  ON </span><br><br>
                                    @endif

                                    <a href="{{route('Advertise_Edit',$showAddImage->id)}}"><button class="btn btn-default">Edit</button></a>
                                    <button type="#" class="btn btn-default">Delete</button>
                                  @endif
                                @endforeach 
                           </div>   
                         <br> <div style="border-top: 2px solid #E6E9ED"></div><br>
                      </div> 

                    <div class="col-md-8 col-md-offset-3">  
                       <h4><label>Home Post Image 4 </label> </h4>
                          <div class="form-group"> 
                                @foreach($showAddImages as $showAddImage)
                                  @if($showAddImage->type == 'PostImage_4')
                                   
                                    @if($showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                      <img src="/storage/addvertisefolder/default/1.jpg"><br><br>
                                    @else
                                      <img src="/storage/addvertisefolder/{{$showAddImage->add_image}}" class="PostImage_4"><br><br>
                                    @endif
   
                                    Title: {{$showAddImage->title}} <br>
                                    Advertise Link: <a href="http://{{$showAddImage->image_url}}">{{$showAddImage->image_url}}</a><br>
                                    Type: {{$showAddImage->type}}<br>

                                    Ending Time: <span style="color: red ; font-weight: bold;"> {{ Carbon::parse($showAddImage->ending_date)->format('d-m-Y g:i A') }} </span> <br>

                                    @php 
                                        $end_days = Carbon::parse($showAddImage->ending_date);
                                        $Ending_days_count = $end_days->diffInDays($current_time); 
                                    @endphp
                                    Ending Days Count: <span style="color: red ; font-weight: bold;"> {{$Ending_days_count}} @if($Ending_days_count == 0) day <br> @else days <br> @endif </span>
                                    Visiable:
                                    @if( $showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                        <span style="color: red ; font-weight: bold;"> OFF  </span><br><br>
                                    @else
                                          <span style="color:green; font-weight: bold;">  ON </span><br><br>
                                    @endif

                                    <a href="{{route('Advertise_Edit',$showAddImage->id)}}"><button class="btn btn-default">Edit</button></a>
                                    <button type="#" class="btn btn-default">Delete</button>
                                  @endif
                                @endforeach 
                           </div>   
                         <br> <div style="border-top: 2px solid #E6E9ED"></div><br>
                      </div> 


                    <div class="col-md-8 col-md-offset-3">  
                       <h4><label> Home Post Image Gif 2 </label></h4>
                          <div class="form-group"> 
                                @foreach($showAddImages as $showAddImage)
                                  @if($showAddImage->type == 'PostImage_Gif_2')
                                   
                                    @if($showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                      <img src="/storage/addvertisefolder/default/1.jpg"><br><br>
                                    @else
                                      <img src="/storage/addvertisefolder/{{$showAddImage->add_image}}" class="PostImage_Gif_2"><br><br>
                                    @endif
   
                                    Title: {{$showAddImage->title}} <br>
                                    Advertise Link: <a href="http://{{$showAddImage->image_url}}">{{$showAddImage->image_url}}</a><br>
                                    Type: {{$showAddImage->type}}<br>

                                    Ending Time: <span style="color: red ; font-weight: bold;"> {{ Carbon::parse($showAddImage->ending_date)->format('d-m-Y g:i A') }} </span> <br>

                                    @php 
                                        $end_days = Carbon::parse($showAddImage->ending_date);
                                        $Ending_days_count = $end_days->diffInDays($current_time); 
                                    @endphp
                                    Ending Days Count: <span style="color: red ; font-weight: bold;"> {{$Ending_days_count}} @if($Ending_days_count == 0) day <br> @else days <br> @endif </span>
                                    Visiable:
                                    @if( $showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                        <span style="color: red ; font-weight: bold;"> OFF  </span><br><br>
                                    @else
                                          <span style="color:green; font-weight: bold;">  ON </span><br><br>
                                    @endif

                                    <a href="{{route('Advertise_Edit',$showAddImage->id)}}"><button class="btn btn-default">Edit</button></a>
                                    <button type="#" class="btn btn-default">Delete</button>
                                  @endif
                                @endforeach 
                           </div> 

                          <br> <div style="border-top: 2px solid #E6E9ED"></div><br>
                    </div> 

               
                  <div class="col-md-8 col-md-offset-3">  
                       <h4><label> Saidar Image 1</label></h4>
                        <div class="form-group"> 
                                @foreach($showAddImages as $showAddImage)
                                  @if($showAddImage->type == 'SaidarImage_1')
                                   
                                    @if($showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                      <img src="/storage/addvertisefolder/default/1.jpg"><br><br>
                                    @else
                                      <img src="/storage/addvertisefolder/{{$showAddImage->add_image}}" class="SaidarImage_1"><br><br>
                                    @endif
   
                                    Title: {{$showAddImage->title}} <br>
                                    Advertise Link: <a href="http://{{$showAddImage->image_url}}">{{$showAddImage->image_url}}</a><br>
                                    Type: {{$showAddImage->type}}<br>

                                    Ending Time: <span style="color: red ; font-weight: bold;"> {{ Carbon::parse($showAddImage->ending_date)->format('d-m-Y g:i A') }} </span> <br>

                                    @php 
                                        $end_days = Carbon::parse($showAddImage->ending_date);
                                        $Ending_days_count = $end_days->diffInDays($current_time); 
                                    @endphp
                                    Ending Days Count: <span style="color: red ; font-weight: bold;"> {{$Ending_days_count}} @if($Ending_days_count == 0) day <br> @else days <br> @endif </span>
                                    Visiable:
                                    @if( $showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                        <span style="color: red ; font-weight: bold;"> OFF  </span><br><br>
                                    @else
                                          <span style="color:green; font-weight: bold;">  ON </span><br><br>
                                    @endif

                                    <a href="{{route('Advertise_Edit',$showAddImage->id)}}"><button class="btn btn-default">Edit</button></a>
                                    <button type="#" class="btn btn-default">Delete</button>
                                  @endif
                                @endforeach 
                           </div> 
                         <br> <div style="border-top: 2px solid #E6E9ED"></div><br>
                   </div>


                     <div class="col-md-8 col-md-offset-3">  
                       <h4><label> Saidar Image 2</label></h4>
                          <div class="form-group"> 
                                @foreach($showAddImages as $showAddImage)
                                  @if($showAddImage->type == 'SaidarImage_2')
                                   
                                    @if($showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                      <img src="/storage/addvertisefolder/default/1.jpg"><br><br>
                                    @else
                                      <img src="/storage/addvertisefolder/{{$showAddImage->add_image}}" class="SaidarImage_2"><br><br>
                                    @endif
   
                                    Title: {{$showAddImage->title}} <br>
                                    Advertise Link: <a href="http://{{$showAddImage->image_url}}">{{$showAddImage->image_url}}</a><br>
                                    Type: {{$showAddImage->type}}<br>

                                    Ending Time: <span style="color: red ; font-weight: bold;"> {{ Carbon::parse($showAddImage->ending_date)->format('d-m-Y g:i A') }} </span> <br>

                                    @php 
                                        $end_days = Carbon::parse($showAddImage->ending_date);
                                        $Ending_days_count = $end_days->diffInDays($current_time); 
                                    @endphp
                                    Ending Days Count: <span style="color: red ; font-weight: bold;"> {{$Ending_days_count}} @if($Ending_days_count == 0) day <br> @else days <br> @endif </span>
                                    Visiable:
                                    @if( $showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                        <span style="color: red ; font-weight: bold;"> OFF  </span><br><br>
                                    @else
                                          <span style="color:green; font-weight: bold;">  ON </span><br><br>
                                    @endif

                                    <a href="{{route('Advertise_Edit',$showAddImage->id)}}"><button class="btn btn-default">Edit</button></a>
                                    <button type="#" class="btn btn-default">Delete</button>
                                  @endif
                                @endforeach 
                           </div>
                          <br> <div style="border-top: 2px solid #E6E9ED"></div><br>
                    </div>


                    <div class="col-md-8 col-md-offset-3">  
                       <h4><label> Saidar Image 3 </label> </h4>
                          <div class="form-group"> 
                                @foreach($showAddImages as $showAddImage)
                                  @if($showAddImage->type == 'SaidarImage_3')
                                   
                                    @if($showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                      <img src="/storage/addvertisefolder/default/1.jpg"><br><br>
                                    @else
                                      <img src="/storage/addvertisefolder/{{$showAddImage->add_image}}" class="SaidarImage_3"><br><br>
                                    @endif
   
                                    Title: {{$showAddImage->title}} <br>
                                    Advertise Link: <a href="http://{{$showAddImage->image_url}}">{{$showAddImage->image_url}}</a><br>
                                    Type: {{$showAddImage->type}}<br>

                                    Ending Time: <span style="color: red ; font-weight: bold;"> {{ Carbon::parse($showAddImage->ending_date)->format('d-m-Y g:i A') }} </span> <br>

                                    @php 
                                        $end_days = Carbon::parse($showAddImage->ending_date);
                                        $Ending_days_count = $end_days->diffInDays($current_time); 
                                    @endphp
                                    Ending Days Count: <span style="color: red ; font-weight: bold;"> {{$Ending_days_count}} @if($Ending_days_count == 0) day <br> @else days <br> @endif </span>
                                    Visiable:
                                    @if( $showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                        <span style="color: red ; font-weight: bold;"> OFF  </span><br><br>
                                    @else
                                          <span style="color:green; font-weight: bold;">  ON </span><br><br>
                                    @endif

                                    <a href="{{route('Advertise_Edit',$showAddImage->id)}}"><button class="btn btn-default">Edit</button></a>
                                    <button type="#" class="btn btn-default">Delete</button>
                                  @endif
                                @endforeach 
                           </div>
                           <br> <div style="border-top: 2px solid #E6E9ED"></div><br>
                    </div>

                    <div class="col-md-8 col-md-offset-3">  
                       <h4><label> Saidar Image 4 </label> </h4>
                          <div class="form-group"> 
                                @foreach($showAddImages as $showAddImage)
                                  @if($showAddImage->type == 'SaidarImage_4')
                                   
                                    @if($showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                      <img src="/storage/addvertisefolder/default/1.jpg"><br><br>
                                    @else
                                      <img src="/storage/addvertisefolder/{{$showAddImage->add_image}}" class="SaidarImage_4"><br><br>
                                    @endif
   
                                    Title: {{$showAddImage->title}} <br>
                                    Advertise Link: <a href="http://{{$showAddImage->image_url}}">{{$showAddImage->image_url}}</a><br>
                                    Type: {{$showAddImage->type}}<br>

                                    Ending Time: <span style="color: red ; font-weight: bold;"> {{ Carbon::parse($showAddImage->ending_date)->format('d-m-Y g:i A') }} </span> <br>

                                    @php 
                                        $end_days = Carbon::parse($showAddImage->ending_date);
                                        $Ending_days_count = $end_days->diffInDays($current_time); 
                                    @endphp
                                    Ending Days Count: <span style="color: red ; font-weight: bold;"> {{$Ending_days_count}} @if($Ending_days_count == 0) day <br> @else days <br> @endif </span>
                                    Visiable:
                                    @if( $showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                        <span style="color: red ; font-weight: bold;"> OFF  </span><br><br>
                                    @else
                                          <span style="color:green; font-weight: bold;">  ON </span><br><br>
                                    @endif

                                    <a href="{{route('Advertise_Edit',$showAddImage->id)}}"><button class="btn btn-default">Edit</button></a>
                                    <button type="#" class="btn btn-default">Delete</button>
                                  @endif
                                @endforeach 
                           </div>  
                          <br> <div style="border-top: 2px solid #E6E9ED"></div><br>
                    </div>

                    <div class="col-md-8 col-md-offset-3">  
                       <h4><label> Saidar Image 5</label> </h4>
                          <div class="form-group"> 
                                @foreach($showAddImages as $showAddImage)
                                  @if($showAddImage->type == 'SaidarImage_5')
                                   
                                    @if($showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                      <img src="/storage/addvertisefolder/default/1.jpg"><br><br>
                                    @else
                                      <img src="/storage/addvertisefolder/{{$showAddImage->add_image}}" class="SaidarImage_5"><br><br>
                                    @endif
   
                                    Title: {{$showAddImage->title}} <br>
                                    Advertise Link: <a href="http://{{$showAddImage->image_url}}">{{$showAddImage->image_url}}</a><br>
                                    Type: {{$showAddImage->type}}<br>

                                    Ending Time: <span style="color: red ; font-weight: bold;"> {{ Carbon::parse($showAddImage->ending_date)->format('d-m-Y g:i A') }} </span> <br>

                                    @php 
                                        $end_days = Carbon::parse($showAddImage->ending_date);
                                        $Ending_days_count = $end_days->diffInDays($current_time); 
                                    @endphp
                                    Ending Days Count: <span style="color: red ; font-weight: bold;"> {{$Ending_days_count}} @if($Ending_days_count == 0) day <br> @else days <br> @endif </span>
                                    Visiable:
                                    @if( $showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
                                        <span style="color: red ; font-weight: bold;"> OFF  </span><br><br>
                                    @else
                                          <span style="color:green; font-weight: bold;">  ON </span><br><br>
                                    @endif

                                    <a href="{{route('Advertise_Edit',$showAddImage->id)}}"><button class="btn btn-default">Edit</button></a>
                                    <button type="#" class="btn btn-default">Delete</button>
                                  @endif
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