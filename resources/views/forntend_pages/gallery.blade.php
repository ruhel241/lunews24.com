@extends('layout.index')
@section('content')

<section class="singlePageSection">
	<div class="row"> 
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
			@foreach($Galleries as $Gallery)
			  	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding: 10px"> 
					<div class="AllGallery">
						<a class="example-image-link" href="/storage/gallery/{{$Gallery->gallery_img}}" data-lightbox="example-set" data-title="{{$Gallery->title}}"><img class="example-image" src="/storage/gallery/{{$Gallery->gallery_img}}" alt=""/>
							<span class="caption fade-caption">  
								<h3>{!! \Illuminate\Support\Str::words($Gallery->title,8,'....') !!} </h3>  
								<p>{!! \Illuminate\Support\Str::words($Gallery->description,22,'....') !!} </p>  
					        </span> 
				        </a>
					</div>
				</div>
		  	@endforeach
		</div>
	</div>
</section>

@endsection


