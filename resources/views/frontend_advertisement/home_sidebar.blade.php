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
			<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FLUnews24com%2F&tabs=timeline&width=300&height=600&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="300" height="600" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
		</div>