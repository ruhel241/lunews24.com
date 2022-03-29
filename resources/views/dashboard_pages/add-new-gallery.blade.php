@extends('layouts.index')
@section('content')

        <!-- page content -->
        <div class="right_col" role="main">

          <div class="col-md-9 col-sm-9 col-xs-12">
             
             <div class="x_panel">
                <div class="x_title">
                  <h2>Add New Gallery</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="pull-right"><a class="collapse-link "><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                  <div class="clearfix"></div>
                </div>

            <form action="{{Route('CreateGallery')}}" method="Post" enctype="multipart/form-data">
             {{ csrf_field() }}
                <div class="x_content">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                      <input name="title" type="text" placeholder="Enter title here" class="form-control">
                       @if ($errors->has('title'))
                          <span class="help-block">
                              <strong>{{ $errors->first('title') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                </div>

              </div>


              <div class="x_panel">
                <div class="x_title">
                  <h2>Description</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="pull-right"><a class="collapse-link "><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!-- editor test start -->
                    <div class="form-form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                         @if ($errors->has('description'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('description') }}</strong>
                              </span>
                          @endif
                        <textarea name="description" style="font-size: 25px"></textarea>
                    </div> 
                    <!-- editor test end -->
                   <br />

                  <div class="ln_solid"></div>
                </div>
              </div>
        </div>


        <div class="post_sidebar">
            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Publish</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right"><a class="collapse-link "><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                    <div class="x_content">
                      <div class="form-group">
                        <div class="col-md-6 pull-right">
                          <button type="submit" class="btn btn-primary "> Publish </button>
                        </div>
                      </div>
                  </div>
              </div>
            </div>

              
            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Photo Upload</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right"><a class="collapse-link "><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                       
                      <div class="gallery_img {{ $errors->has('gallery_img') ? ' has-error' : '' }}">
                        <input type="file" name="gallery_img" class="form-contro" style="font-size:13px">
                          @if ($errors->has('gallery_img'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('gallery_img') }}</strong>
                              </span>
                          @endif
                      </div>

                  </div>
              </div>
            </div>

          </form>
    </div>
</div>
        <!-- /page content -->


@endsection