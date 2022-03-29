@extends('layouts.index')
@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="col-md-9 col-sm-9 col-xs-12">
             
             <div class="x_panel">
                <div class="x_title">
                  <h2>Edit Post</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="pull-right"><a class="collapse-link "><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                  <div class="clearfix"></div>
                </div>

            <form action="{{route('UpdatePost', $EditPost->id )}}" method="post"  enctype="multipart/form-data">
              {{csrf_field() }}
                <div class="x_content">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                      <input name= "title" type="text" placeholder="Enter title here" class="form-control" value="{{$EditPost->title}}">
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
                  <textarea id="editor-one" name="description" class="form-control" style="height: 300px; font-family:monospace;">{{$EditPost->description}}</textarea>
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
                          
                        @if(Auth::user()->role == 'admin' OR Auth::user()->role == 'sub-admin')
                          <select name="status" class="form-control" style="font-size: 15px; padding: 0">
                            @if($EditPost->status == 'Approve')
                             <option value="Approve">{{$EditPost->status}}</option>
                             <option value="Pending">Pending</option>
                             <option value="Reject">Reject</option>
                            @elseif($EditPost->status == 'Pending')
                              <option value="Pending">{{$EditPost->status}}</option>
                              <option value="Approve">Approve</option>
                              <option value="Reject">Reject</option>
                            @elseif($EditPost->status == 'Reject')
                              <option value="Reject">{{$EditPost->status}}</option>
                              <option value="Approve">Approve</option>
                              <option value="Pending">Pending</option>
                            @endif
                          </select>
                        
                        @elseif(Auth::user()->role == 'author')
                          <select name="status" class="form-control" style="font-size: 15px; padding: 0; display: none;">
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
                    <h2>Categories</h2>
                   
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right"><a class="collapse-link "><i class="fa fa-chevron-up"></i></a></li>
                    </ul>

                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                     <!-- </form> -->
                      <select name="category_id" class="form-control" style="font-size: 15px; padding: 0">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($EditPost->category_id == $category->id) selected @endif> {{$category->title}} </option>
                        @endforeach
                      </select>
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
                          <option value="{{$department->id}}" @if($EditPost->department_id == $department->id) selected @endif >{{ $department->title }} </option>
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
                          <option value="{{$organization->id}}" @if($EditPost->organization_id == $organization->id) selected @endif > {{ $organization->title }}</option>
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
                      <div class="post_thumbnail">
                        <!-- <form enctype="multipart/form-data"> -->
                           <!-- <input name="post_thumbnail" id="file-0a" class="file" type="file" multiple data-min-file-count="1"> -->
<!--                         </form> -->
  
                          <div class=""> <img src="/storage/upload/{{$EditPost->post_thumbnail}}" style="width: 100%; height:auto;"> </div>

                            <input name="post_thumbnail" value="{{$EditPost->post_thumbnail}}" type="file" class="form-control" style="font-size:13px">

                            
                      </div>

                  </div>

                  

              </div>
            </div>

          </form>
    </div>
</div>
        <!-- /page content -->


@endsection