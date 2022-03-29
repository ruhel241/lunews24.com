@php 
	use App\Advertisement;
	use Carbon\Carbon;
	$current_time = Carbon::now('Asia/Dhaka');
	$showAddImages = Advertisement::all();
@endphp


<!-- Container -->
<div class="container"> 
	@foreach($showAddImages as $showAddImage)
		@if($showAddImage->type == 'top-banner')
			<section class="headerTopBanner"> 
				<div class="row"> 
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 headertop"> 
						<div class="headerTopBannerimg"> 
							@if($showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time )
								<a href="http://{{$showAddImage->image_url}}" target="_blank"><img src="/storage/addvertisefolder/default/1.jpg"></a>
							@else
								<a href="http://{{$showAddImage->image_url}}" target="_blank"><img src="/storage/addvertisefolder/{{$showAddImage->add_image}}"></a>
							@endif
						</div>
					</div>
				</div> 
			</section>
		@endif
	@endforeach


		<section class="tickerSection">
			<div class="row tickerdiv"> 
			 	<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="no-padding"> 
					<div class="headline"> 
						<h2> শিরোনাম </h2>
					</div>
				</div> 
			 	

				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"> 
					<div id="outer">
					  <div id ="tick">
					  	@php 
					  		use App\Post; 
					  		$All_Posts = Post::orderBy('id', 'DESC')->where('status','Approve')->get();

					  	@endphp
					  	@foreach ($All_Posts->take(10) as $post)
					  		<li><a href="{{route('SinglePage', $post->id)}}"><i class="fa fa-forward"></i> {{$post->title}}</a></li> 
					   @endforeach
					  </div>
					  <!-- <div id="tick2"></div> -->
					</div> 
				</div>

				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="button_box2">
						<form action="{{route('search')}}" class="form-wrapper-2 cf" method="get">
							<input name="query" id="#tags" type="text" placeholder="এখানে সার্চ করুন..." required value="{{ Request::get('query') }}">
							<button type="submit">সার্চ করুন</button>
						</form>

					</div>
				</div> 
			</div>
		</section>


		<!-- Header -->
			<section class="header">
				<div class="row"> 
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" id="no-padding">
						<div class="logo">
						@php use App\Setting; @endphp
							@foreach(Setting::all() as $logo)
								<a href="/"><img alt="LUNews24.com" src="/storage/logo/{{$logo->value}}"></a>
							@endforeach
						</div>
			 		</div>  

					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" id="no-padding"> 
						@foreach($showAddImages as $showAddImage)
							@if($showAddImage->type == 'header-banner')
								<div class="header-banner"> <!-- ads-728x90 -->
								  @if($showAddImage->show_hide == 0)
									 <a href="http://{{$showAddImage->image_url}}" target="_blank"><img src="/storage/addvertisefolder/default/5.jpg"></a>
								  @else
									 <a href="http://{{$showAddImage->image_url}}" target="_blank"><img src="/storage/addvertisefolder/{{$showAddImage->add_image}}"></a>
								  @endif
								</div>
							@endif
						@endforeach

					</div> 

				</div>
			</section>
			<!-- End Header -->
		
			
				<!-- Navigation start -->
					@include('layout/frontend/navigation')
				<!-- Navigation End -->


			<!-- content section -->
				 @yield('content')
			
			<!-- content section end -->



		<section class="footer"> 
			<div class="row"> 
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
					<div class="row"> 
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"> 
						  <div class="address"> 
							<h4> লিডিং ইউনিভার্সিটির সিলেট</h4>
							<span>ঠিকানা: তালতলা রোড, সিলেট, বাংলাদেশ </span><br/>
							<span>ইমেল: lunews24@gmail.com</span><br/>
							<span> মোবাইল: ০১৬১৬-৪৪০০৯৫(বিজ্ঞাপন),<br/>০১৭৯১-৫৬৭ ৩৮৭ (নিউজ) 
							</span>
						  </div>
						</div> 

						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 pull-right"> 
							<div class="Copyright"> 
								<span> &copy; LUnews24.com <!-- এলইউ নিউজ টুয়েন্টিফোর ডটকম -->  </span> 
								<p> নিউজ পোর্টাল বাস্তবায়নে : <a href="https://www.facebook.com/ruhel.khan.543" title="https://www.facebook.com/ruhel.khan.543" target="_blank"> মোঃ রুহেল খান </a></p>
							</div>
						</div>
					</div> 
				</div> 
			</div>
		</section>

</div>


