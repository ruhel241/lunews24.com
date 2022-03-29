@extends('layout.index')

@section('og_tags')
<meta property="og:url"           content="http://lunews24.com/single-page/{{$SinglePosts->id}}"/>
<meta property="og:type"          content="website"/>
<meta property="og:title"         content="{{$SinglePosts->title}}"/>
<meta property="og:description"   content="{!! \Illuminate\Support\Str::words($SinglePosts->description,20,'....') !!}"/>
<meta property="og:image"         content="http://lunews24.com/storage/upload/{{$SinglePosts->post_thumbnail }}" />
@endsection 

@section('content')
@php
use App\Category;
//date
$currentDate = Carbon\Carbon::parse($SinglePosts->created_at)->format('l, d F Y, g:i');   
$engDATE = array(1,2,3,4,5,6,7,8,9,0,'January','February','March','April','May','June','July','August','September','October','November','December','Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
$bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
$convertedDATE = str_replace($engDATE, $bangDATE, $currentDate);

//hits count
$Total_Hits = $SinglePosts->hits;
$engHit	= array(1,2,3,4,5,6,7,8,9,0);
$bangHit = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
$convertHit = str_replace($engHit, $bangHit, $Total_Hits);
@endphp



	<section class="singlePageSection">
		<div class="row"> 
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8"> 
				<div class="singlePage"> 
					<div class="SinglecatTitle">
						<a href="{{route('Category',$SinglePosts->categories->id)}}"><i class="fa fa-list"></i> {{ $SinglePosts->categories->title }}</a> 
						 <span class="authorNews">নিউজটি করেছেনঃ {{ $SinglePosts->users->first_name}} {{ $SinglePosts->users->last_name}}&nbsp;&nbsp;</span>
					</div> 

					<h3 class="single-title">{{$SinglePosts->title}}</h3>

					<div class="datetime">
					 <p><span style="color:#787878"> এলইউ নিউজ টুয়েন্টিফোর ডটকম, {{$convertedDATE}}</span></p>

					</div> 

					<div class="single_img">
						<img src="/storage/upload/{{$SinglePosts->post_thumbnail }}" alt="">
					</div> 

					<div class="singledes"><span style="float:left"><b>{{ $SinglePosts->users->first_name }} {{ $SinglePosts->users->last_name}} ::</b>&nbsp;&nbsp;</span>{!!$SinglePosts->description !!}</div>
					
					<p id="newsBrief"> 
						<span style="color:#133151;font-size:18px;">সংবাদটি পড়া হয়েছে মোট : 
						</span>  

						<span style="color:#C50001;font-size:20px;">
							{{ $convertHit }} বার
						</span> 
					</p>

					<br/>

					<!-- Facebook Share start -->
					<div class="facebook_share">
						
						<span class='st_facebook_hcount' displayText='Facebook'></span>
						<span class='st_twitter_hcount' displayText='Tweet'></span>
						<span class='st_googleplus_hcount' displayText='Google +'></span>
						<span class='st_pinterest_hcount' displayText='Pinterest'></span>

						<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
						<script type="text/javascript">stLight.options({publisher: "ur-448a73fe-e6c1-f7a5-f0a5-3912c860fc9e"});</script>
					</div>

					
					<!-- facbook comments start -->
					<div class="facebook_commentbox"> 
						<div id="fb-root"></div>
		                <script>(function(d, s, id) {
		                  var js, fjs = d.getElementsByTagName(s)[0];
		                  if (d.getElementById(id)) return;
		                  js = d.createElement(s); js.id = id;
		                  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9";
		                  fjs.parentNode.insertBefore(js, fjs);
		                }(document, 'script', 'facebook-jssdk'));
		                </script>
						<div class="fb-comments" data-href="http://lunews24.com/single-page/{{$SinglePosts->id}}" data-numposts="5"></div>
					</div>

					<!-- facbook comments End -->


					<!-- test start -->

						   <!-- Your share button code -->
							 <!--  <div class="fb-share-button" data-href="http://lunews24.com/single-page/{{$SinglePosts->id}}" data-layout="button_count"></div> -->
					<!-- test end -->
				</div>
			</div> 

			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 sidebar">
					@include('frontend_advertisement.singlepage_sidebar')
			</div>

		</div>
</section>
@endsection