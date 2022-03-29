@extends('layouts.index')
@section('content')

      
 <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->

         @if(session()->has('PasswordUpadate'))
              <div class="row"> 
                  <div class="col-md-12">
                   <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <strong>Notification: </strong>{{session()->get('PasswordUpadate')}}
                    </div>
                  </div>
               </div>
          @endif
          @php
            use App\User;
            use App\Post;
            $TotalUserCount = User::where('status', 1)->count();
            
            $TotalMaleCount = User::where([['status', 1],['gender', 'Male']])->count();
            $TotalFemaleCount = User::where([['status', 1],['gender', 'Female']])->count();
            
            $TotalMalePosts =  User::where([['status', 1],['gender', 'Male']])->first()->posts()->where('status', 'Approve')->count();
            $TotalFemalePosts = User::where([['status', 1],['gender', 'Female']])->first()->posts()->where('status', 'Approve')->count();
          @endphp     
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-users"></i> Total Users</span>
              <div class="count">{{$TotalUserCount}}</div>
              <span class="count_bottom"><i class="green">4% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
              <div class="count">123.50</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-male"></i> Total Males</span>
              <div class="count green">{{$TotalMaleCount}}</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-female"></i> Total Females</span>
              <div class="count blue">{{$TotalFemaleCount}}</div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-male"></i> Total Males Posts</span>
              <div class="count green">{{ $TotalMalePosts }}</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-female"></i> Total Females Posts</span>
              <div class="count blue">{{ $TotalFemalePosts }}</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
          </div>
          <!-- /top tiles -->

         
        </div>
        <!-- /page content -->


@endsection