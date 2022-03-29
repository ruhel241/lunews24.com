@extends('layouts.index')
@section('content')

        <!-- page content -->
        <div class="right_col" role="main">

          <div class="col-md-9 col-sm-9 col-xs-12">
             
             <div class="x_panel">
                <div class="x_title">
                  <h2>Add New Post</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="pull-right"><a class="collapse-link "><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                  <div class="clearfix"></div>
                </div>

            <form action="{{route('CreatePost')}}" method="Post" enctype="multipart/form-data">
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
                        <div class="col-md-6">
                          
                        @if(Auth::user()->role == 'admin')
                          <select name="status" class="form-control" style="font-size: 15px; padding:0; display:none;">
                            <option value="Approve">Approve</option>
                          </select>
                        @elseif(Auth::user()->role == 'sub-admin')
                          <select name="status" class="form-control" style="font-size: 15px; padding:0; display:none;">
                            <option value="Approve">Approve</option>
                          </select>
                        @elseif(Auth::user()->role == 'author')
                          <select name="status" class="form-control" style="font-size: 15px; padding: 0; display:none;">
                              <option value="Pending">Pending</option>
                          </select>
                        @endif

                        </div>
                        <div class="col-md-6">
                          <button type="submit" class="btn btn-primary "> Publish </button>
                        </div>
                      </div>
                  </div>
              </div>
            </div>

              <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> সকল ক্যাটাগরি </h2>
                   
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right"><a class="collapse-link "><i class="fa fa-chevron-up"></i></a></li>
                    </ul>

                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}"> 
                      <select name="category_id" class="form-control" style="font-size: 15px;  padding: 0" title="ক্যাটাগরি নির্বাচন করুন ।" required >
                        <option value=" " style="text-align: center;"> ক্যাটাগরি নির্বাচন করুন </option>
                        @foreach($categories as $category)
                          <option value="{{$category->id}}">{{$category->title}}</option>
                         @endforeach
                      </select> 
                        @if ($errors->has('category_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('category_id') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>
              </div>
            </div>

              <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> বিভাগীয় ক্যাটাগরি </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right"><a class="collapse-link "><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                   <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                     <div class="form-group"> 
                      <select name="department_id" class="form-control" style="font-size: 15px; padding: 0"  title="বিভাগীয় কোন পোষ্ট থাকলে বিভাগ নির্বাচন করুন ।">
                        <option value=" ">বিভাগীয় ক্যাটাগরি নির্বাচন করুন</option>
                        @foreach($departments as $department)
                          <option value="{{$department->id}}">{{ $department->title }} </option>
                        @endforeach
                      </select> 
                     </div>
                  </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> সংগঠন  ক্যাটাগরি</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right"><a class="collapse-link "><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="form-group"> 
                      <select name="organization_id" class="form-control" style="font-size: 15px; padding: 0"  title="সংগঠনের কোন পোষ্ট থাকলে সংগঠন নির্বাচন করুন ।" >
                        <option value=" ">  সংগঠন ক্যাটাগরি নির্বাচন করুন</option>
                        @foreach($organizations as $organization)
                          <option value="{{$organization->id}}"> {{ $organization->title }}</option>
                        @endforeach
                      </select> 
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
                       <!-- <input type="file" name=""> -->
                      <div class="post_thumbnail {{ $errors->has('post_thumbnail') ? ' has-error' : '' }}">
                        <!-- <form enctype="multipart/form-data"> -->
                           <!-- <input name="post_thumbnail" id="file-0a" class="file" type="file" multiple data-min-file-count="1"> -->
<!--                         </form> -->
                            <input type="file" name="post_thumbnail" class="form-contro" style="font-size:13px">
                          @if ($errors->has('post_thumbnail'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('post_thumbnail') }}</strong>
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