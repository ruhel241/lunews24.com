@extends('layouts.index')
@section('content')
@php
  $engDATE = array(1,2,3,4,5,6,7,8,9,0,'January','February','March','April','May','June','July','August','September','October','November','December');
  $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর');
@endphp
  <!-- page content -->
        <div class="right_col" role="main">

         <div class="col-md-12 col-sm-12 col-xs-12">

              @if(session()->has('Postnotification'))
                  <div class="row"> 
                      <div class="col-md-12">
                       <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <strong>Notification: </strong>{{session()->get('Postnotification')}}
                        </div>
                      </div>
                   </div>
              @endif


                <div class="x_panel">
                  <div class="x_title">
                    <h2>Posts</h2> &nbsp; 
                    <a href="{{route('AddNewPost')}}">
                    <button class="btn btn-primary btn-sm pull-left" style="margin-left: 10px"> Add new</button> </a>

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
                   
                   <div class="col-md-6" style="margin-top:-8px"> 
                      <ul class="nav nav-tabs">
                        @if(Auth::user()->role == 'admin' OR Auth::user()->role == 'sub-admin')
                        <li class="active"><a data-toggle="tab" href="#AllPosts">All Posts</a></li>
                       @endif
                        <li><a data-toggle="tab" href="#MyPost">My Posts</a></li>
                        <li class="@if(Auth::user()->role == 'author') active @endif"><a data-toggle="tab" href="#pending">Pending Posts</a></li>
                        <li><a data-toggle="tab" href="#reject">Reject Posts</a></li>
                      </ul>
                  </div>
                   <div class="clearfix"></div>

                </div>

                  <div class="x_content">
                   
                      <div class="tab-content">
                      @if(Auth::user()->role == 'admin' OR Auth::user()->role == 'sub-admin')
                        <div id="AllPosts" class="tab-pane fade in active">
                          <div class="table-responsive">
                              <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                  <tr class="headings">
                                    <th>
                                      <input type="checkbox" id="check-all" class="flat">
                                    </th>
                                    <th class="column-title">Title</th>
                                    <th class="column-title">Author</th>
                                    <th class="column-title">Role</th>
                                    <th class="column-title">Categories</th>
                                    <th class="column-title">Dept</th>
                                    <th class="column-title">Club</th>
                                    <th class="column-title">Status</th>
                                    <th class="column-title">Date/Time</th>

                                    <!-- <th class="column-title">Amount </th> -->
                                    <th class="column-title no-link last"><span class="nobr">Action</span>
                                    </th>
                                    <th class="column-title no-link last"><span class="nobr">Edit /Delete</span>
                                    </th>

                                    <th class="bulk-actions" colspan="7">
                                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                    </th>
                                  </tr>
                                </thead>
                                  <tbody>
                                    @foreach($AllPostApps as $AllPostApp)
                                       <tr class="even pointer">
                                          <td class="a-center "><input type="checkbox" class="flat" name="table_records"></td>
                                          <td class=""> <a href="{{route('SinglePost', $AllPostApp->id)}}">{!! \Illuminate\Support\Str::words($AllPostApp->title,7,'....')  !!} </a></td>
                                          <td class=""> {{ $AllPostApp->users->first_name }} {{ $AllPostApp->users->last_name }} </td>
                                           <td class=""> {{ $AllPostApp->users->role }}</td>
                                          <td class=""> {{ $AllPostApp->categories->title }} </td>
                                          <td class=""> @if( !empty($AllPostApp->departments->title) ) {{ $AllPostApp->departments->title }} @endif </td>
                                          <td class=""> @if( !empty($AllPostApp->organizations->title) ) {{ $AllPostApp->organizations->title }} @endif </td>
                                          <td class=""> {{ $AllPostApp->status }} </td>
                                          <td class="">@php $AllPost_AppDate = Carbon\Carbon::parse($AllPostApp->created_at)->format('d F Y g:i'); $convertDateAllApp = str_replace($engDATE, $bangDATE, $AllPost_AppDate); @endphp {{$convertDateAllApp}} </td>
                                          <td class="last"><a href="{{route('SinglePost', $AllPostApp->id)}}">View</a></td>
                                          <td class="last"><a href="{{route('EditPost', $AllPostApp->id)}}">Edit</a> / 
                                          <a href="{{route('DeletePost', $AllPostApp->id)}}"> Delete </a></td>
                                        </tr>
                                    @endforeach
                                  </tbody>
                              </table>
                            </div>
                        </div>
                        @endif
                        
                        <div id="MyPost" class="tab-pane fade">
                          <div class="table-responsive">
                              <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                  <tr class="headings">
                                    <th>
                                      <input type="checkbox" id="check-all" class="flat">
                                    </th>
                                    <th class="column-title">Title</th>
                                    <th class="column-title">Author</th>
                                    <th class="column-title">Role</th>
                                    <th class="column-title">Categories</th>
                                    <th class="column-title">Dept</th>
                                    <th class="column-title">Club</th>
                                    <th class="column-title">Status</th>
                                    <th class="column-title">Date/Time</th>

                                    <!-- <th class="column-title">Amount </th> -->
                                    <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                     @if(Auth::user()->role == 'admin' OR Auth::user()->role == 'sub-admin')
                                       <th class="column-title no-link last"><span class="nobr">Edit /Delete</span></th>
                                     @endif
                                    <th class="bulk-actions" colspan="7">
                                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($OwnPostsApps as $OwnPostsApp)
                                      <tr class="even pointer">
                                        <td class="a-center "><input type="checkbox" class="flat" name="table_records"></td>
                                        <td class=""> <a href="{{route('SinglePost', $OwnPostsApp->id)}}"> {!! \Illuminate\Support\Str::words($OwnPostsApp->title,7,'....') !!} </a></td>
                                        <td class=""> {{ $OwnPostsApp->users->first_name }} {{ $OwnPostsApp->users->last_name }} </td>
                                        <td class=""> {{ $OwnPostsApp->categories->title }}  </td>
                                        <td class=""> @if( !empty($OwnPostsApp->departments->title) ) {{ $OwnPostsApp->departments->title }} @endif </td>
                                        <td class=""> @if( !empty($OwnPostsApp->organizations->title) ) {{ $OwnPostsApp->organizations->title }} @endif </td>
                                        <td class=""> {{ $OwnPostsApp->status }} </td>
                                        <td class="">@php $OwnPostsAppDate = Carbon\Carbon::parse($OwnPostsApp->created_at)->format('d F Y g:i'); $convertDateOwnPostsApp = str_replace($engDATE, $bangDATE, $OwnPostsAppDate); @endphp {{$convertDateOwnPostsApp}} </td>
                                        <td class="last"><a href="{{route('SinglePost', $OwnPostsApp->id)}}">View</a></td>
                                        @if(Auth::user()->role == 'admin' OR Auth::user()->role == 'sub-admin')
                                          <td class=" last"><a href="{{route('EditPost', $OwnPostsApp->id)}}">Edit</a> / 
                                             <a href="{{route('DeletePost', $OwnPostsApp->id)}}"> Delete </a>
                                          </td>
                                        @endif
                                      </tr> 
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                        </div>


                        <div id="pending" class="tab-pane fade @if(Auth::user()->role == 'author') in active @endif">
                           <div class="table-responsive">
                              <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                  <tr class="headings">
                                    <th>
                                      <input type="checkbox" id="check-all" class="flat">
                                    </th>
                                    <th class="column-title">Title</th>
                                    <th class="column-title">Author</th>
                                    <th class="column-title">Role</th>
                                    <th class="column-title">Categories</th>
                                    <th class="column-title">Dept</th>
                                    <th class="column-title">Club</th>
                                    <th class="column-title">Status</th>
                                    <th class="column-title">Date/Time</th>

                                    <!-- <th class="column-title">Amount </th> -->
                                    <th class="column-title no-link last"><span class="nobr">Action</span>
                                    </th>
                                    <th class="column-title no-link last"><span class="nobr">Edit /Delete</span>
                                    </th>

                                    <th class="bulk-actions" colspan="7">
                                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @if(Auth::user()->role == 'admin' OR Auth::user()->role == 'sub-admin')
                                    @foreach($AllPostPens as $AllPostPen)
                                       <tr class="even pointer">
                                          <td class="a-center "><input type="checkbox" class="flat" name="table_records"></td>
                                          <td class=""> <a href="{{route('SinglePost', $AllPostPen->id)}}">{!! \Illuminate\Support\Str::words($AllPostPen->title,7,'....')  !!} </a></td>
                                          <td class=""> {{ $AllPostPen->users->first_name }} {{ $AllPostPen->users->last_name }} </td>
                                          <td class=""> {{ $AllPostPen->categories->title }} </td>
                                          <td class=""> @if( !empty($AllPostPen->departments->title) ) {{ $AllPostPen->departments->title }} @endif </td>
                                          <td class=""> @if( !empty($AllPostPen->organizations->title) ) {{ $AllPostPen->organizations->title }} @endif </td>
                                          <td class=""> {{ $AllPostPen->status }} </td>
                                          <td class="">@php $AllPostPenDate = Carbon\Carbon::parse($AllPostPen->created_at)->format('d F Y g:i'); $convertDateAllPostPen = str_replace($engDATE, $bangDATE, $AllPostPenDate); @endphp {{$convertDateAllPostPen}}   </td>
                                          <td class="last"><a href="{{route('SinglePost', $AllPostPen->id)}}">View</a></td>
                                          <td class="last"><a href="{{route('EditPost', $AllPostPen->id)}}">Edit</a> / 
                                          <a href="{{route('DeletePost', $AllPostPen->id)}}"> Delete </a></td>
                                        </tr>
                                    @endforeach
                                  @endif

                                  @if(Auth::user()->role == 'author')
                                     @foreach($OwnPostsPens as $OwnPostsPen)
                                         <tr class="even pointer">
                                          <td class="a-center "><input type="checkbox" class="flat" name="table_records"></td>
                                          <td class=""> <a href="{{route('SinglePost', $OwnPostsPen->id)}}"> {!! \Illuminate\Support\Str::words($OwnPostsPen->title,7,'....') !!} </a></td>
                                          <td class=""> {{ $OwnPostsPen->users->first_name }} {{ $OwnPostsPen->users->last_name }} </td>
                                          <td class=""> {{ $OwnPostsPen->categories->title }} </td>
                                          <td class=""> @if( !empty($OwnPostsPen->departments->title) ) {{ $OwnPostsPen->departments->title }} @endif </td>
                                          <td class=""> @if( !empty($OwnPostsPen->organizations->title) ) {{ $OwnPostsPen->organizations->title }} @endif </td>
                                          <td class=""> {{ $OwnPostsPen->status }} </td>
                                          <td class="">@php $OwnPostsPenDate = Carbon\Carbon::parse($OwnPostsPen->created_at)->format('d F Y g:i'); $convertDateOwnPostsPen = str_replace($engDATE, $bangDATE, $OwnPostsPenDate); @endphp {{$convertDateOwnPostsPen}} </td>
                                          <td class="last"><a href="{{route('SinglePost', $OwnPostsPen->id)}}">View</a></td>
                                          <td class="last"><a href="{{route('EditPost', $OwnPostsPen->id)}}">Edit</a> / 
                                          <a href="{{route('DeletePost', $OwnPostsPen->id)}}"> Delete </a></td>
                                        </tr> 
                                     @endforeach
                                  @endif

                                </tbody>
                              </table>
                            </div>
                        </div>


                        <div id="reject" class="tab-pane fade">
                          <div class="table-responsive">
                              <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                  <tr class="headings">
                                    <th>
                                      <input type="checkbox" id="check-all" class="flat">
                                    </th>
                                    <th class="column-title">Title</th>
                                    <th class="column-title">Author</th>
                                    <th class="column-title">Role</th>
                                    <th class="column-title">Categories</th>
                                    <th class="column-title">Dept</th>
                                    <th class="column-title">Club</th>
                                    <th class="column-title">Status</th>
                                    <th class="column-title">Date/Time</th>

                                    <!-- <th class="column-title">Amount </th> -->
                                    <th class="column-title no-link last"><span class="nobr">Action</span>
                                    </th>
                                    <th class="column-title no-link last"><span class="nobr">Edit /Delete</span>
                                    </th>

                                    <th class="bulk-actions" colspan="7">
                                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>

                                  @if(Auth::user()->role == 'admin' OR Auth::user()->role == 'sub-admin')
                                    @foreach($AllPostRejs as $AllPostRej)
                                        <tr class="even pointer">
                                          <td class="a-center "><input type="checkbox" class="flat" name="table_records"></td>
                                          <td class=""> <a href="{{route('SinglePost', $AllPostRej->id)}}">{!! \Illuminate\Support\Str::words($AllPostRej->title,7,'....') !!} </a></td>
                                          <td class=""> {{ $AllPostRej->users->first_name }} {{ $AllPostRej->users->last_name }} </td>
                                          <td class=""> {{ $AllPostRej->categories->title }} </td>
                                          <td class=""> @if( !empty($AllPostRej->departments->title) ) {{ $AllPostRej->departments->title }} @endif </td>
                                          <td class=""> @if( !empty($AllPostRej->organizations->title) ) {{ $AllPostRej->organizations->title }} @endif </td>
                                          <td class=""> {{ $AllPostRej->status }} </td>
                                          <td class=""> @php $AllPostRejDate = Carbon\Carbon::parse($AllPostRej->created_at)->format('d F Y g:i'); $convertDateAllPostRej = str_replace($engDATE, $bangDATE, $AllPostRejDate); @endphp {{$convertDateAllPostRej}} </td>
                                          <td class="last"><a href="{{route('SinglePost', $AllPostRej->id)}}">View</a></td>
                                          <td class="last"><a href="{{route('EditPost', $AllPostRej->id)}}">Edit</a> / 
                                          <a href="{{route('DeletePost', $AllPostRej->id)}}"> Delete </a></td>
                                        </tr>
                                    @endforeach
                                  @endif

                                 @if(Auth::user()->role == 'author')
                                    @foreach($OwnPostsRejs as $OwnPostsRej)
                                       <tr class="even pointer">
                                        <td class="a-center "><input type="checkbox" class="flat" name="table_records"></td>
                                        <td class=""> <a href="{{route('SinglePost', $OwnPostsRej->id)}}"> {!! \Illuminate\Support\Str::words($OwnPostsRej->title,7,'....') !!} </a></td>
                                        <td class=""> {{ $OwnPostsRej->users->first_name }} {{ $OwnPostsRej->users->last_name }} </td>
                                        <td class=""> {{ $OwnPostsRej->categories->title }} </td>
                                        <td class=""> @if( !empty($OwnPostsRej->departments->title) ) {{ $OwnPostsRej->departments->title }} @endif </td>
                                        <td class=""> @if( !empty($OwnPostsRej->organizations->title) ) {{ $OwnPostsRej->organizations->title }} @endif </td>
                                        <td class=""> {{ $OwnPostsRej->status }} </td>
                                        <td class="">@php $OwnPostsRejDate = Carbon\Carbon::parse($OwnPostsRej->created_at)->format('d F Y g:i'); $convertDateOwnPostsRej = str_replace($engDATE, $bangDATE, $OwnPostsRejDate); @endphp {{$convertDateOwnPostsRej}}  </td>
                                        <td class="last"><a href="{{route('SinglePost', $OwnPostsRej->id)}}">View</a></td>
                                        <td class="last"><a href="{{route('EditPost', $OwnPostsRej->id)}}">Edit</a> / 
                                        <a href="{{route('DeletePost', $OwnPostsRej->id)}}"> Delete </a></td>
                                      </tr> 
                                    @endforeach
                                 @endif
                                </tbody>
                              </table>
                            </div>
                          </div>


                    </div>
                  </div>
                </div>
              </div>
       </div>
        <!-- /page content -->

@endsection