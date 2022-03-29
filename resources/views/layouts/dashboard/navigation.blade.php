 <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{route('dashboard')}}" class="site_title"><i class="fa fa-paw"></i> <span> LUnews24.com</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                @if(!Auth::user()->avatar)
                    <img src="/storage/avatars/default/img.jpg" style="width:60px; height:60px; float: right;" alt="..." class="img-circle profile_img">
                @else
                      <img src="/storage/avatars/{{Auth::user()->avatar}}" style="width:60px; height:60px; float: right;" alt="..." class="img-circle profile_img">
                @endif

              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}  </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
                @if(Auth::user()->role == 'admin')
                  <h3>Admin</h3>
                @elseif(Auth::user()->role == 'sub-admin')
                  <h3>Sub Admin</h3>
                @else
                  <h3>Author</h3>
                @endif

                <ul class="nav side-menu">
                  
                  <li><a href="#"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                      <li><a href="{{route('FrontEnd')}}">Visit Site</a></li>
                    </ul>
                  </li>


                  <li><a><i class="fa fa-edit"></i> Posts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <li><a href="{{route('AllPosts')}}">All Posts </a></li>
                     <li><a href="{{route('AddNewPost')}}">Add New </a></li>
                      @if(Auth::user()->role == 'admin')
                       <li><a href="{{route('AllCategories')}}">Categories </a></li>
                       <li><a href="{{route('AllDepartments')}}">Department Categories </a></li>
                       <li><a href="{{route('AllOrganization')}}">Organization Categories </a></li>
                     @endif
                    </ul>
                  </li>
                 @if(Auth::user()->role == 'admin' OR Auth::user()->role == 'sub-admin') 
                  <li><a><i class="fa fa-desktop"></i> Gallery <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <li><a href="{{route('AllGallery')}}">All Gallery</a></li>
                     <li><a href="{{route('AddGallery')}}">Add New Gallery</a></li>
                    </ul>
                  </li>
                  @endif

                  @if(Auth::user()->role == 'admin')
                    <li><a><i class="fa fa-table"></i> Advertise <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="{{route('Advertise')}}">Advertise Option</a></li>
                      </ul>
                    </li>
                  @endif
                 
                @if(Auth::user()->role == 'admin' OR Auth::user()->role == 'sub-admin')
                  <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('All.Users')}}">All Users</a></li>
                      <li><a href="{{route('Add.User')}}">Add New User</a></li>
                      <li><a href="{{route('UserProfile',Auth::user()->id)}}">My Profile</a></li>
                    </ul> 
                  </li>
                @else 
                  <li><a href="{{route('UserProfile',Auth::user()->id)}}"><i class="fa fa-user"></i> My Profile</a>
                @endif

                @if(Auth::user()->role == 'admin' OR Auth::user()->role == 'sub-admin')  
                  <li><a><i class="fa fa-wrench"></i> Settings <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('logoshow')}}">Logo Upload</a></li>
                    </ul>
                  </li>
                @endif

                </ul>
              </div>
           


            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a href="{{route('logoshow')}}" data-toggle="tooltip" data-placement="top" title="Settings">
                <i class="fa fa-wrench"></i>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <i class="fa fa-desktop"></i> 
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <i class="fa fa-lock"></i>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="#">
                <i class="fa fa-sign-out"></i>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>


        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    @if(!Auth::user()->avatar)
                        <img src="/storage/avatars/default/img.jpg" alt="">
                    @else
                       <img src="/storage/avatars/{{Auth::user()->avatar}}" alt=""> 
                    @endif

                    {{Auth::user()->first_name}} {{Auth::user()->last_name}}

                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{route('UserProfile',Auth::user()->id)}}"> Profile</a></li>
                    <li>
                      <a href="{{route('logoshow')}}">
                        <!-- <span class="badge bg-red pull-right">50%</span> -->
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="#">Help</a></li>
                    <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          <i class="fa fa-sign-out pull-right"></i>Logout
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                    </li>
                  </ul>
                </li>
                  @php 
                     use App\Post;
                    $PostNotifi = Post::where('status','Pending')->orderBy('id','DESC')->get();
                    $count =  Post::where('status','Pending')->count();
                  @endphp
                  
                @if(Auth::user()->role == 'admin' OR Auth::user()->role == 'sub-admin')
                 <li role="presentation" class="dropdown">
                      <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-red">{{$count}}</span>
                      </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    @foreach($PostNotifi as $Notifi)
                      <li>
                        <a href="{{route('SinglePost',$Notifi->id)}}">
                          <span class="image">
                          <!-- <img src="{{asset('dashboard_assets/images/img.jpg')}}" alt="Profile Image" /></span> -->
                          @if($Notifi->users->avatar)
                            <img src="/storage/avatars/{{$Notifi->users->avatar}}" alt="Profile Image" /></span>
                          @else
                            <img src="{{asset('dashboard_assets/images/img.jpg')}}" alt="Profile Image" /></span>
                          @endif
                          <span>
                            <span>{{$Notifi->users->first_name}} {{$Notifi->users->last_name}}</span>
                            <span class="time">{{$Notifi->created_at->diffForHumans()}}

                             </span>
                          </span>
                          <span class="message">
                           {!! \Illuminate\Support\Str::words($Notifi->title,5,'....') !!}
                          </span>
                        </a>
                      </li>
                    @endforeach
                   
                    <li>
                      <div class="text-center">
                        <a href="{{route('AllPosts')}}">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>

                  </ul>
              </li>

              @endif

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->