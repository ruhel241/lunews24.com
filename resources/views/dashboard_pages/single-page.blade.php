@extends('layouts.index')
@section('content')

<!-- page content -->
        <div class="right_col" role="main">

	        <div class="col-md-12 col-sm-12 col-xs-12">
	            <div class="x_panel">
	               
		            <div class="row"> 
						<div class="col-md-12"> 
							 <h2 style="color: #c50001">  {{$SinglePost->title}} </h2>
						</div> 
					</div>

	             	<span class="singleresponsive"> Author By <i class="fa fa-user" style="color:orange"> {{$SinglePost->users->first_name}} {{$SinglePost->users->last_name}}</i></span>,
	              	<span class="singleresponsive"> Category: {{$SinglePost->categories->title}}</span>,
	              	<span class="singleresponsive"> <i>{{$SinglePost->status}} </i> Post</span>
	              	@if(Auth::user()->role == 'admin' OR Auth::user()->role == 'sub-admin')
	              		<a href="{{route('EditPost',$SinglePost->id)}}"><span class="singleresponsive btn btn-primary btn-sm"> Edit </span></a> 
	              		<a href="{{route('DeletePost',$SinglePost->id)}}"><span class="singleresponsive btn btn-primary btn-sm"> Delete </span></a> 
	              	@elseif( $SinglePost->status !== "Approve" ) 
	              		<a href="{{route('EditPost',$SinglePost->id)}}"><span class="singleresponsive btn btn-primary btn-sm"> Edit </span></a> 
	              		<a href="{{route('DeletePost',$SinglePost->id)}}"><span class="singleresponsive btn btn-primary btn-sm"> Delete </span></a> 
	              	@endif
					<br><br>
	              	<div class="row"> 
						<div class="col-md-6 col-md-offset-2"> 
							<div class="postImage"> 
								<img src="/storage/upload/{{$SinglePost->post_thumbnail}}">
							</div>
						</div>
					</div>

	              	<div class="row"> 
						<div class="col-md-12" style="font-size: 15px"> 
							<p>{!! $SinglePost->description !!} </p>
						</div>
	                </div>
         
	            </div>
			</div>
        </div>
        <!-- /page content -->



  
@endsection