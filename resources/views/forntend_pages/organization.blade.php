@extends('layout.index')
@section('content') 
@php
use App\Advertisement;
	$showAddImages = Advertisement::all();
@endphp

<section class="singlePageSection">
	<div class="row"> 
	  	<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8"> 
			<div class="row"> 
			 @php $postcount = 1 @endphp
				@foreach($AllOrganization as $Organization)
				  @if($postcount == 1) 
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
						<div class="category-option">
							<img src="/storage/upload/{{$Organization->post_thumbnail }}">
							<h1><a href="{{route('SinglePage', $Organization->id)}}" style="color:#c50001;">{!! \Illuminate\Support\Str::words($Organization->title,5,'....') !!}</a></h1>
							<p>{!! \Illuminate\Support\Str::words($Organization->description,80,'....') !!} </p>
						</div>
					</div>
					@else 
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
						<div class="category-small"> 
							<img src="/storage/upload/{{$Organization->post_thumbnail }}">
							<h1><a href="{{route('SinglePage', $Organization->id)}}" style="color:#c50001;">{!! \Illuminate\Support\Str::words($Organization->title,9,'....') !!}</a></h1>
							<p>{!! \Illuminate\Support\Str::words($Organization->description,35,'....') !!} </p>
						</div>
					</div>
					@endif
				   @php $postcount++ @endphp
				@endforeach

			</div>	
		</div> 

			
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 sidebar">	
			@include('frontend_advertisement.categorypage_sidebar')
		</div>

	</div>
</section>

			
@endsection