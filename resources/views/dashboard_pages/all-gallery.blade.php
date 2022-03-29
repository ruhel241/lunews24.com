@extends('layouts.index')
@section('content')

    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <!-- <div class="page-title">
              <div class="title_left">
                <h3> All Gallery <small> gallery design</small> </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div> -->

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Gallery</h2>
                    <a href="{{route('AddGallery')}}"><button class="btn btn-primary btn-sm pull-left" style="margin-left: 10px"> Add new Gallery</button></a>

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

                     <!--  <p>Media gallery design emelents</p> -->
                     
                        @foreach($Galleries as $Gallery)
                              <div class="col-md-55">
                                    <div class="thumbnail">
                                      <div class="image view view-first">
                                        <img style="width: 100%;  height: 117px; display: block;" src="/storage/gallery/{{$Gallery->gallery_img }}" alt="image" />
                                         <!-- <a class="example-image-link" href="/storage/gallery/{{$Gallery->gallery_img}}" data-lightbox="example-set" data-title="{{$Gallery->title}}"><img class="example-image" src="/storage/gallery/{{$Gallery->gallery_img}}" alt=""/>
                                         </a> -->
                                        <div class="mask">
                                          <p>{!! \Illuminate\Support\Str::words($Gallery->title,5,'....')  !!} </p>
                                          <div class="tools tools-bottom">
                                            <a href="#"><i class="fa fa-link"></i></a>
                                            <a href="{{Route('EditGallery',$Gallery->id)}}"><i class="fa fa-pencil"></i></a>
                                            <a href="#"><i class="fa fa-times"></i></a>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="caption">
                                        <p>{!! \Illuminate\Support\Str::words($Gallery->description,5,'....')  !!} </p>
                                      </div>
                                    </div>
                                </div> 
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