@extends('layout.index')
@section('content')

@php 
  use Carbon\Carbon;
  $current_time = Carbon::now('Asia/Dhaka');
@endphp

<section class="Homeslider">
	<div class="row"> 
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8"> 
			<div id="slider">
				<div id="slide-left" class="flexslider">
				   <ul class="slides">
						@foreach($AllPosts->take(4) as $AllPost)
							<li data-thumb="/storage/upload/{{$AllPost->post_thumbnail }}">
								<a href="{{route('SinglePage', $AllPost->id)}}" title="" rel="bookmark">
									<img width="546" height="291" src="/storage/upload/{{$AllPost->post_thumbnail }}" alt="photodune-3834701-laughing-girl-xs" />
								</a>
								<div class="entry">
									<h4> <a href="{{route('SinglePage', $AllPost->id)}}" style="color: white">{!! \Illuminate\Support\Str::words($AllPost->title,8,'....') !!}</a></h4>
									<p> <a href="{{route('SinglePage', $AllPost->id)}}" style="color: white">{!! \Illuminate\Support\Str::words($AllPost->description,25,'....') !!}</a></p>
								</div>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div> 

		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"> 
			<div class="well">
			    <ul class="nav nav-tabs">
			      <li class="active"><a href="#home" data-toggle="tab">সর্বশেষ সংবাদ</a></li>
			      <li><a href="#profile" data-toggle="tab">বিজ্ঞপ্তি</a></li> <!-- সর্বাধিক পঠিত -->
			    </ul>
			    <div id="myTabContent" class="tab-content">
			      	<div class="nano tab-pane active in" id="home">
			        	<ul class="content recent-list">
							@foreach($AllPosts->take(30) as $AllPost)
							<li> <a href="{{route('SinglePage', $AllPost->id)}}" style="color: #133151">{{ $AllPost->title }}</a></li>
							@endforeach
						</ul>
					</div>

					<div class="nano tab-pane fade" id="profile">
			    		<ul class="content recent-list">
			    			@foreach($Notice2 as $posts)
							 	<li> <a href="{{route('SinglePage', $posts->id)}}" style="color: #133151">{{ $posts->title }}</a></li>
							@endforeach
			    		</ul>
			      	</div>
			    </div>
			</div>
		</div>
  	</div>
</section>

<section class="category-section">
	<div class="row">  
	 	
	 	<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8"> 
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<article class="1stArticle">
						<h4 class="cat-title">
							@foreach($categories as $category)
								@if($category->slug == "বিভাগীয়")
									<a href="{{route('Category',$category->id)}}"> {{$category->title}}</a>
								@endif
							@endforeach

						</h4>
							@php $postcount = 0 @endphp
							@foreach($Alldeptnews as $posts)
					 			@if($postcount == 0)
				       			<div class="post-image">
									<a href="{{route('SinglePage', $posts->id)}}"><img src="/storage/upload/{{$posts->post_thumbnail }}"></a>
								</div>
								<div class="post-container">
									<h2 class="postTitle"><a href="{{route('SinglePage', $posts->id)}}" style="color: #133151">{!! \Illuminate\Support\Str::words($posts->title,5,'....') !!} </a></h2>
										
									<div class="post-content">
										<p>{!! \Illuminate\Support\Str::words($posts->description,20,'....') !!}</p>
									</div>
								</div>
								@else
							
								<div class="other-posts">
									<div class="no-bullet">
										<div class="ff">
											<a href="{{route('SinglePage', $posts->id)}}"><img src="/storage/upload/{{$posts->post_thumbnail }}" alt=""></a>
											<h3 class="post-title"><a href="{{route('SinglePage', $posts->id)}}">{!! \Illuminate\Support\Str::words($posts->title,5,'....') !!}</a></h3>
											<span class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>
												@php
													$Post_Date = Carbon::parse($posts->created_at)->format('d F Y');   
													$engDATE = array(1,2,3,4,5,6,7,8,9,0,'January','February','March','April','May','June','July','August','September','October','November','December');
													$bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর');
													$convertDate = str_replace($engDATE, $bangDATE, $Post_Date);
												@endphp
												{{$convertDate}}
											</span>
										</div>

									</div>
								</div>
								@endif  @php $postcount++ @endphp
							@endforeach
					</article>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<article class="1stArticle">
							<h4 class="cat-title">
								@foreach($categories as $category)
									@if($category->slug == "সংগঠন")
										<a href="{{route('Category',$category->id)}}"> {{$category->title}}</a>
									@endif
								@endforeach
							</h4>
							@php $postcount = 0 @endphp
								@foreach($AllClubsnews as $posts)
									@if($postcount == 0)
						       
							       		<div class="post-image">
											<a href="{{route('SinglePage', $posts->id)}}"><img src="/storage/upload/{{$posts->post_thumbnail }}"></a>
										</div>
										<div class="post-container">
											<h2 class="postTitle"><a href="{{route('SinglePage', $posts->id)}}" style="color: #133151">{!! \Illuminate\Support\Str::words($posts->title,5,'....') !!} </a></h2>
												
											<div class="post-content">
												<p>{!! \Illuminate\Support\Str::words($posts->description,20,'....') !!}</p>
											</div>
										</div>
										@else
									
										<div class="other-posts">
											<div class="no-bullet">
												<div class="ff">
													<a href="{{route('SinglePage', $posts->id)}}"><img src="/storage/upload/{{$posts->post_thumbnail }}" alt=""></a>
													<h3 class="post-title"><a href="{{route('SinglePage', $posts->id)}}">{!! \Illuminate\Support\Str::words($posts->title,5,'....') !!}</a></h3>
													<span class="date"><i class="fa fa-clock-o" aria-hidden="true"></i> 
														@php
															$Post_Date = Carbon::parse($posts->created_at)->format('d F Y');   
															$engDATE = array(1,2,3,4,5,6,7,8,9,0,'January','February','March','April','May','June','July','August','September','October','November','December');
															$bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর');
															$convertDate = str_replace($engDATE, $bangDATE, $Post_Date);
														@endphp
														{{$convertDate}}
													</span>
												</div>

											</div>
										</div>
									@endif  @php $postcount++ @endphp
								@endforeach
					</article>
				</div>

			@foreach($showAddImages as $showAddImage)
				@if($showAddImage->type == 'PostImage_1')
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
						<div class="postAdd">
						  @if($showAddImage->show_hide == 0)
							<a href="http://{{$showAddImage->image_url}}" target="_blank"><img src="/storage/addvertisefolder/default/3.gif"></a>
						  @else
						  	<a href="http://{{$showAddImage->image_url}}" target="_blank"><img src="/storage/addvertisefolder/{{$showAddImage->add_image}}"></a>
						  @endif
						</div>
					</div>
				@endif
			@endforeach

			@foreach($showAddImages as $showAddImage)
				@if($showAddImage->type == 'PostImage_2')
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
						<div class="postAdd">
						  @if($showAddImage->show_hide == 0)
							<a href="http://{{$showAddImage->image_url}}" target="_blank"><img src="/storage/addvertisefolder/default/36.jpg"></a>
						  @else
						  	<a href="http://{{$showAddImage->image_url}}" target="_blank"><img src="/storage/addvertisefolder/{{$showAddImage->add_image}}"></a>
						  @endif
						</div>
					</div>
				@endif
	  		@endforeach


			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<article class="1stArticle">
					<h4 class="cat-title">
						@foreach($categories as $category)
							@if($category->slug == "বিজ্ঞপ্তি")
								<a href="{{route('Category',$category->id)}}"> {{$category->title}}</a>
							@endif
						@endforeach

					</h4>
						@php $postcount = 0 @endphp
								@foreach($Notice as $posts)
									@if($postcount == 0)
								       
						       		<div class="post-image">
										<a href="{{route('SinglePage', $posts->id)}}"><img src="/storage/upload/{{$posts->post_thumbnail }}"></a>
									</div>
									<div class="post-container">
										<h2 class="postTitle"><a href="{{route('SinglePage', $posts->id)}}" style="color: #133151">{!! \Illuminate\Support\Str::words($posts->title,5,'....') !!} </a></h2>
											
										<div class="post-content">
											<p>{!! \Illuminate\Support\Str::words($posts->description,20,'....') !!}</p>
										</div>
									</div>
									@else
								
									<div class="other-posts">
										<div class="no-bullet">
											<div class="ff">
												<a href="{{route('SinglePage', $posts->id)}}"><img src="/storage/upload/{{$posts->post_thumbnail }}" alt=""></a>
												<h3 class="post-title"><a href="{{route('SinglePage', $posts->id)}}">{!! \Illuminate\Support\Str::words($posts->title,5,'....') !!}</a></h3>
												<span class="date"><i class="fa fa-clock-o" aria-hidden="true"></i> 
													@php
														$Post_Date = Carbon::parse($posts->created_at)->format('d F Y');   
														$engDATE = array(1,2,3,4,5,6,7,8,9,0,'January','February','March','April','May','June','July','August','September','October','November','December');
														$bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর');
														$convertDate = str_replace($engDATE, $bangDATE, $Post_Date);
													@endphp
													{{$convertDate}}
												</span>
											</div>

										</div>
									</div>
						@endif  @php $postcount++ @endphp
					@endforeach
				</article>
			</div>

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<article class="1stArticle">
					<h4 class="cat-title">
						@foreach($categories as $category)
							@if($category->slug == "শিক্ষা-ক্যাম্পাস")
								<a href="{{route('Category',$category->id)}}"> {{$category->title}}</a>
							@endif
						@endforeach
					</h4> 
					@php $postcount = 0 @endphp
						@foreach($Education as $posts)
							@if($postcount == 0)
					       
						       		<div class="post-image">
										<a href="{{route('SinglePage', $posts->id)}}"><img src="/storage/upload/{{$posts->post_thumbnail }}"></a>
									</div>
									<div class="post-container">
										<h2 class="postTitle"><a href="{{route('SinglePage', $posts->id)}}" style="color: #133151">{!! \Illuminate\Support\Str::words($posts->title,5,'....') !!} </a></h2>
											
										<div class="post-content">
											<p>{!! \Illuminate\Support\Str::words($posts->description,20,'....') !!}</p>
										</div>
									</div>
									@else
								
									<div class="other-posts">
										<div class="no-bullet">
											<div class="ff">
												<a href="{{route('SinglePage', $posts->id)}}"><img src="/storage/upload/{{$posts->post_thumbnail }}" alt=""></a>
												<h3 class="post-title"><a href="{{route('SinglePage', $posts->id)}}">{!! \Illuminate\Support\Str::words($posts->title,5,'....') !!}</a></h3>
												<span class="date"><i class="fa fa-clock-o" aria-hidden="true"></i> 
													@php
														$Post_Date = Carbon::parse($posts->created_at)->format('d F Y');   
														$engDATE = array(1,2,3,4,5,6,7,8,9,0,'January','February','March','April','May','June','July','August','September','October','November','December');
														$bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর');
														$convertDate = str_replace($engDATE, $bangDATE, $Post_Date);
													@endphp
													{{$convertDate}}
												</span>
											</div>

										</div>
									</div>
						@endif  @php $postcount++ @endphp
					@endforeach
				</article>
			</div>


			@foreach($showAddImages as $showAddImage)
				@if($showAddImage->type == 'PostImage_Gif_1')
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
						<div class="postAddGif">
						  @if($showAddImage->show_hide == 0)
							<a href="http://{{$showAddImage->image_url}}" target="_blank"><img src="/storage/addvertisefolder/default/9.jpg"></a>
						  @else
						  	<a href="http://{{$showAddImage->image_url}}" target="_blank"><img src="/storage/addvertisefolder/{{$showAddImage->add_image}}"></a>
						  @endif
						</div>
					</div>
				@endif
			@endforeach


			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<article class="1stArticle">
					<h4 class="cat-title">
						@foreach($categories as $category)
							@if($category->slug == "কৃতিত্ব")
								<a href="{{route('Category',$category->id)}}"> {{$category->title}}</a>
							@endif
						@endforeach
					</h4>
					@php $postcount = 0 @endphp
						@foreach($Achievement as $posts)
							@if($postcount == 0)
						       <div class="post-image">
									<a href="{{route('SinglePage', $posts->id)}}"><img src="/storage/upload/{{$posts->post_thumbnail }}"></a>
								</div>
								<div class="post-container">
									<h2 class="postTitle"><a href="{{route('SinglePage', $posts->id)}}" style="color: #133151">{!! \Illuminate\Support\Str::words($posts->title,5,'....') !!} </a></h2>
										
									<div class="post-content">
										<p>{!! \Illuminate\Support\Str::words($posts->description,20,'....') !!}</p>
									</div>
								</div>
								@else
							
								<div class="other-posts">
									<div class="no-bullet">
										<div class="ff">
											<a href="{{route('SinglePage', $posts->id)}}"><img src="/storage/upload/{{$posts->post_thumbnail }}" alt=""></a>
											<h3 class="post-title"><a href="{{route('SinglePage', $posts->id)}}">{!! \Illuminate\Support\Str::words($posts->title,5,'....') !!}</a></h3>
											<span class="date"><i class="fa fa-clock-o" aria-hidden="true"></i> 
												@php
													$Post_Date = Carbon::parse($posts->created_at)->format('d F Y');   
													$engDATE = array(1,2,3,4,5,6,7,8,9,0,'January','February','March','April','May','June','July','August','September','October','November','December');
													$bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর');
													$convertDate = str_replace($engDATE, $bangDATE, $Post_Date);
												@endphp
												{{$convertDate}}
											</span>										
										</div>

									</div>
								</div>
							@endif  @php $postcount++ @endphp
						@endforeach
				</article>
			</div>

		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<article class="1stArticle">
				<h4 class="cat-title">
					@foreach($categories as $category)
						@if($category->slug == "খেলাধুলা")
							<a href="{{route('Category',$category->id)}}"> {{$category->title}}</a>
						@endif
					@endforeach
				</h4>
				@php $postcount = 0 @endphp
					@foreach($Playing as $posts)
						@if($postcount == 0)
		       
			       		<div class="post-image">
							<a href="{{route('SinglePage', $posts->id)}}"><img src="/storage/upload/{{$posts->post_thumbnail }}"></a>
						</div>
						<div class="post-container">
							<h2 class="postTitle"><a href="{{route('SinglePage', $posts->id)}}" style="color: #133151">{!! \Illuminate\Support\Str::words($posts->title,5,'....') !!} </a></h2>
								
							<div class="post-content">
								<p>{!! \Illuminate\Support\Str::words($posts->description,20,'....') !!}</p>
							</div>
						</div>
						@else
					
						<div class="other-posts">
							<div class="no-bullet">
								<div class="ff">
									<a href="{{route('SinglePage', $posts->id)}}"><img src="/storage/upload/{{$posts->post_thumbnail }}" alt=""></a>
									<h3 class="post-title"><a href="{{route('SinglePage', $posts->id)}}">{!! \Illuminate\Support\Str::words($posts->title,5,'....') !!}</a></h3>
									<span class="date"><i class="fa fa-clock-o" aria-hidden="true"></i> 
										@php
											$Post_Date = Carbon::parse($posts->created_at)->format('d F Y');   
											$engDATE = array(1,2,3,4,5,6,7,8,9,0,'January','February','March','April','May','June','July','August','September','October','November','December');
											$bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর');
											$convertDate = str_replace($engDATE, $bangDATE, $Post_Date);
										@endphp
										{{$convertDate}}
									</span>
								</div>
							</div>
						</div>
						@endif  @php $postcount++ @endphp
					@endforeach
			</article>
		</div>

		@foreach($showAddImages as $showAddImage)
			@if($showAddImage->type == 'PostImage_3')
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
					<div class="postAdd">
					  @if($showAddImage->show_hide == 0)
						<a href="http://{{$showAddImage->image_url}}" target="_blank"><img src="/storage/addvertisefolder/default/6.jpg"></a>
					  @else
					  	<a href="http://{{$showAddImage->image_url}}" target="_blank"><img src="/storage/addvertisefolder/{{$showAddImage->add_image}}"></a>
					  @endif

					</div>
				</div>
			@endif
		@endforeach

		@foreach($showAddImages as $showAddImage)
			@if($showAddImage->type == 'PostImage_4')
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
					<div class="postAdd">
					 @if($showAddImage->show_hide == 0)
						<a href="http://{{$showAddImage->image_url}}" target="_blank"><img src="/storage/addvertisefolder/default/3.gif"></a>
					  @else
					  	<a href="http://{{$showAddImage->image_url}}" target="_blank"><img src="/storage/addvertisefolder/{{$showAddImage->add_image}}"></a>
					  @endif
					</div>
				</div>
			@endif
		@endforeach


		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<article class="1stArticle">
				<h4 class="cat-title">
					@foreach($categories as $category)
						@if($category->slug == "তথ্য-প্রযুক্তি")
							<a href="{{route('Category',$category->id)}}"> {{$category->title}}</a>
						@endif
					@endforeach
				</h4>
					@php $postcount = 0 @endphp
						@foreach($ICT as $posts)
							@if($postcount == 0)
						       <div class="post-image">
									<a href="{{route('SinglePage', $posts->id)}}"><img src="/storage/upload/{{$posts->post_thumbnail }}"></a>
								</div>
								<div class="post-container">
									<h2 class="postTitle"><a href="{{route('SinglePage', $posts->id)}}" style="color: #133151">{!! \Illuminate\Support\Str::words($posts->title,5,'....') !!} </a></h2>
										
									<div class="post-content">
										<p>{!! \Illuminate\Support\Str::words($posts->description,20,'....') !!}</p>
									</div>
								</div>
								@else
							
								<div class="other-posts">
									<div class="no-bullet">
										<div class="ff">
											<a href="{{route('SinglePage', $posts->id)}}"><img src="/storage/upload/{{$posts->post_thumbnail }}" alt=""></a>
											<h3 class="post-title"><a href="{{route('SinglePage', $posts->id)}}">{!! \Illuminate\Support\Str::words($posts->title,5,'....') !!}</a></h3>
											<span class="date"><i class="fa fa-clock-o" aria-hidden="true"></i> 
												@php
													$Post_Date = Carbon::parse($posts->created_at)->format('d F Y');   
													$engDATE = array(1,2,3,4,5,6,7,8,9,0,'January','February','March','April','May','June','July','August','September','October','November','December');
													$bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর');
													$convertDate = str_replace($engDATE, $bangDATE, $Post_Date);
												@endphp
												{{$convertDate}}
											</span>
										</div>

									</div>
								</div>
						@endif  @php $postcount++ @endphp
					@endforeach
			</article>
		</div>

		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<article class="1stArticle">
				<h4 class="cat-title">
					@foreach($categories as $category)
						@if($category->slug == "চাকরির-খবর")
							<a href="{{route('Category',$category->id)}}"> {{$category->title}}</a>
						@endif
					@endforeach
				</h4>
					@php $postcount = 0 @endphp
						@foreach($Jobs as $posts)
							@if($postcount == 0)
						        		<div class="post-image">
											<a href="{{route('SinglePage', $posts->id)}}"><img src="/storage/upload/{{$posts->post_thumbnail }}"></a>
										</div>
										<div class="post-container">
											<h2 class="postTitle"><a href="{{route('SinglePage', $posts->id)}}" style="color: #133151">{!! \Illuminate\Support\Str::words($posts->title,5,'....') !!} </a></h2>
												
											<div class="post-content">
												<p>{!! \Illuminate\Support\Str::words($posts->description,20,'....') !!}</p>
											</div>
										</div>
										@else
									
										<div class="other-posts">
											<div class="no-bullet">
												<div class="ff">
													<a href="{{route('SinglePage', $posts->id)}}"><img src="/storage/upload/{{$posts->post_thumbnail }}" alt=""></a>
													<h3 class="post-title"><a href="{{route('SinglePage', $posts->id)}}">{!! \Illuminate\Support\Str::words($posts->title,5,'....') !!}</a></h3>
													<span class="date"><i class="fa fa-clock-o" aria-hidden="true"></i> 
														@php
															$Post_Date = Carbon::parse($posts->created_at)->format('d F Y');   
															$engDATE = array(1,2,3,4,5,6,7,8,9,0,'January','February','March','April','May','June','July','August','September','October','November','December');
															$bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর');
															$convertDate = str_replace($engDATE, $bangDATE, $Post_Date);
														@endphp
														{{$convertDate}}
													</span>
												</div>

											</div>
										</div>
								@endif  @php $postcount++ @endphp
						@endforeach
			</article>
		</div>

		
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<section class="gallery"> 
					<h4 style="color: white">ফটো গ্যালারী</h4>
						<div class="flexslider photogallery">
							<ul class="slides">
								@foreach($Galleries as $Gallery)
							    	<li>
							    		<a class="example-image-link" href="/storage/gallery/{{$Gallery->gallery_img}}" data-lightbox="example-set" data-title="{{$Gallery->title}}"><img class="example-image" src="/storage/gallery/{{$Gallery->gallery_img}}" alt=""/>
										<div class="flex-caption">
							                <div class="desc">
							                	<h1><a href="">{!! \Illuminate\Support\Str::words($Gallery->title,8,'....') !!}</a></h1>
							                	<p>{!! \Illuminate\Support\Str::words($Gallery->description,20,'....') !!}</p> 
							                </div>
							            </div>
									</li>
							   @endforeach
							</ul>
						</div>
				</section>
			</div> 

				<!-- <div class="col-md-3"> sdasc </div> -->

		 </div>
	</div>


		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 sidebar">
			@include('frontend_advertisement.home_sidebar')
		</div>

	</div>
</section>

@endsection