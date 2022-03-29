@extends('layouts.index')
@section('content')

        <!-- page content -->
        <div class="right_col" role="main">

         <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Users</h2> &nbsp; 
                    <a href="{{route('Add.User')}}">
                    <button class="btn btn-primary btn-sm pull-left" style="margin-left: 10px"> Add new User</button> </a>

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
                   	<div class="tab-content">
                     <div id="AllPosts">
                          <div class="table-responsive">
                              <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                  <tr class="headings">
                                    <th>
                                      <input type="checkbox" id="check-all" class="flat">
                                    </th>
                                    <th class="column-title">Name </th>
                                    <th class="column-title">Role </th>
                                    <th class="column-title">Eamil </th>
                                    <th class="column-title">Date/Time </th>
									                  <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                    <th class="column-title no-link last"><span class="nobr">Edit /Delete</span></th>

                                    <th class="bulk-actions" colspan="7">
                                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                    </th>
                                  </tr>
                                </thead>
                                   <tbody>
                                  	
                                  	@foreach($AllUsers as $AllUser)
                                      @if(Auth::user()->role == 'admin')
                                        <tr class="even pointer">
                                          <td class="a-center "><input type="checkbox" class="flat" name="table_records"></td>
                                          <td class=""><a href="{{route('UserProfile',$AllUser->id)}}">{{$AllUser->first_name}} {{$AllUser->last_name}}</a></td>
                                          <td class=""><a href="{{route('UserProfile',$AllUser->id)}}">{{$AllUser->role}}</a></td>
                                          <td class=""><a href="{{route('UserProfile',$AllUser->id)}}">{{$AllUser->email}}</a></td>
                                          <td class=""><a href="{{route('UserProfile',$AllUser->id)}}">{{$AllUser->created_at}}</a></td>
                                          <td class=""><a href="{{route('UserProfile',$AllUser->id)}}">View</a></td>
                                          <td class=""><a href="{{route('UserProfile.Edit',$AllUser->id)}}">Edit</a> / 
                                          <a href="{{route('UserDelete',$AllUser->id)}}"> Delete </a></td>
                                        </tr>
                                      @else

                                       @if($AllUser->role !== 'admin')
                                        <tr class="even pointer">
                                          <td class="a-center "><input type="checkbox" class="flat" name="table_records"></td>
                                          <td class=""><a href="{{route('UserProfile',$AllUser->id)}}">{{$AllUser->first_name}} {{$AllUser->last_name}}</a></td>
                                          <td class=""><a href="{{route('UserProfile',$AllUser->id)}}">{{$AllUser->role}}</a></td>
                                          <td class=""><a href="{{route('UserProfile',$AllUser->id)}}">{{$AllUser->email}}</a></td>
                                          <td class=""><a href="{{route('UserProfile',$AllUser->id)}}">{{$AllUser->created_at}}</a></td>
                                          <td class=""><a href="{{route('UserProfile',$AllUser->id)}}">View</a></td>
                                          <td class=""><a href="{{route('UserProfile.Edit',$AllUser->id)}}">Edit</a> / 
                                          <a href="{{route('UserDelete',$AllUser->id)}}"> Delete </a></td>
                                        </tr>
                                        @endif

                                    @endif
                                  @endforeach
                                
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