@php
use App\Advertisement;
use App\Post;
use Carbon\Carbon;
$current_time = Carbon::now('Asia/Dhaka');

$showAddImages = Advertisement::all();
$AllPosts = Post::where('status','Approve')->orderBy('id','DESC')->get();
$Notice2 = Post::where([['status','Approve'],['category_id', 8]])->take(30)->orderBy('id','DESC')->get();

@endphp
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


						<div class="siderbarAdd"> 
							@foreach($showAddImages as $showAddImage)
								@if($showAddImage->type == 'SaidarImage_1')
								  @if($showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time)
									<a href="http://{{$showAddImage->image_url}}" target="_blank"><img src="/storage/addvertisefolder/default/3.gif"></a>
								  @else
								  	<a href="http://{{$showAddImage->image_url}}" target="_blank"><img src="/storage/addvertisefolder/{{$showAddImage->add_image}}"></a>
								  @endif

								@endif
							@endforeach
						</div>

						<div class="siderbarAdd"> 
							@foreach($showAddImages as $showAddImage)
								@if($showAddImage->type == 'SaidarImage_2')
								  @if($showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time)
									<a href="http://{{$showAddImage->image_url}}" target="_blank"><img src="/storage/addvertisefolder/default/20.jpg"></a>
								  @else
								  	<a href="http://{{$showAddImage->image_url}}" target="_blank"><img src="/storage/addvertisefolder/{{$showAddImage->add_image}}"></a>
								  @endif
								@endif
							@endforeach 
						</div>

						<div class="siderbarAdd"> 
							@foreach($showAddImages as $showAddImage)
								@if($showAddImage->type == 'SaidarImage_3')
								  @if($showAddImage->show_hide == 0 OR $showAddImage->ending_date < $current_time)
									<a href="http://{{$showAddImage->image_url}}" target="_blank"><img src="/storage/addvertisefolder/default/40.gif"></a>
								  @else
								  	<a href="http://{{$showAddImage->image_url}}" target="_blank"><img src="/storage/addvertisefolder/{{$showAddImage->add_image}}"></a>
								  @endif
								@endif
							@endforeach
						</div>

						<div class="facebook_page">
							<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FLUnews24com%2F&tabs=timeline&width=300&height=600&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="300" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
						</div>