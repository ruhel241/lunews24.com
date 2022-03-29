@php 
use App\Department;
use App\Organization;
use App\Category; 
@endphp

<section class="nav-section"> 
	<div class="row"> 
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="no-padding"> 
		  <nav class="navbar navbar-default">
	        <div class="container-fluid">
	          <div class="navbar-header">
	            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	              <span class="sr-only">Toggle navigation</span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href="/"> <i class="fa fa-home fa-lg"></i> <span> | </span> </a>
	          </div>
	          <div id="navbar" class="navbar-collapse collapse">
	            <ul class="nav navbar-nav cateNav">

					<li class="dropdown">
					   <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">বিভাগীয় <span class="caret"></span> <span> | </span></a>
						<ul class="dropdown-menu">
							@foreach(Department::all() as $menu)
								<li><a href="{{Route('Department',$menu->id)}}"> {{ $menu->title }}</a></li>
							@endforeach
						</ul>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">সংগঠন <span class="caret"></span> <span> | </span></a>
						<ul class="dropdown-menu">
							@foreach(Organization::all() as $menu)
								<li><a href="{{Route('Organization',$menu->id)}}"> {{$menu->title}}</a></li>
							@endforeach
						</ul>
					</li>

				  @foreach(Category::all() as $menu)
	              	@if($menu->title !== 'বিভাগীয়' and $menu->title !== 'সংগঠন')
	              		<li><a href="{{route('Category', $menu->id)}}">{{$menu->title}}<span> | </span></a></li>
	              	@endif
	              @endforeach

	              <li><a href="{{Route('Gallery')}}"> ক্যাম্পাস গ্যালারী  <span> | </span></a></li>

	            </ul>

	        	@if(!Auth::user())
	            <ul class="nav navbar-nav navbar-right cateNavright">
	              <!-- <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li> -->
	              <li><a href="{{route('register')}}"> <i class="fa fa-sign-in"></i> সাইন আপ <span> | </span></a></li>
	              <li> <a href="{{route('login')}}"> <i class="fa fa-user"></i> লগ ইন</a> </li>
	              
	            </ul>
	          @else 
				<ul class="nav navbar-nav navbar-right cateNavright">
	             	<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="margin: -1px"> <i class="fa fa-sign-out"></i> লগ আউট <span>|</span></a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                    </li>
					<li><a href="{{route('dashboard')}}" style="margin: -1px"> <i class="fa fa-dashboard"></i> ড্যাশবোর্ড </a></li>
				</ul>
	          @endif
	           
	          </div><!--/.nav-collapse -->
	        </div><!--/.container-fluid -->
	      </nav>

		</div>
	 </div>
</section>

