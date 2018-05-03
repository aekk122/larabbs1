<nav class="navbar navbar-default navbar-static-top">
	<div class="container">
		<div class="navbar-header">
			
			<!-- Collapsed Hamburger -->
			<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#app-navbar-collapse">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<!-- Branding Image -->
			<a href="{{ url('/') }}" class="navbar-brand">
				Here
			</a>
		</div>

		<div class="collapse navbar-collapse" id="app-navbar-collapse">
			<!-- Left Side Of Navbar -->
			<ul class="nav navbar-nav">
				<li class="{{ active_class(if_route('topics.index'))}}"><a href="{{ route('topics.index') }}">话题</a></li>
				<li class="{{ active_class((if_route('categories.show') && if_route_param('category', 1)))}}"><a href="{{ route('categories.show', 1) }}">分享</a></li>
				<li class="{{ active_class((if_route('categories.show') && if_route_param('category', 2)))}}"><a href="{{ route('categories.show', 2) }}">教程</a></li>
				<li class="{{ active_class((if_route('categories.show') && if_route_param('category', 3)))}}"><a href="{{ route('categories.show', 3) }}">问答</a></li>
				<li class="{{ active_class((if_route('categories.show') && if_route_param('category', 4)))}}"><a href="{{ route('categories.show', 4) }}">公告</a></li>
			</ul>
			<!-- 搜索框 -->
			<div class="col-sm-4" id="so">  
	             <div class="input-group search-input">  
	                 <input type="text" class="form-control" id="search" onblur="search()"/>  
	                 <span class="input-group-addon"><a href="#"><i class="glyphicon glyphicon-search"> <span >搜索<span class="space" style="white-space:pre;display:inline-block;text-indent:2em;line-height:inherit;"> </span><span class="space" style="white-space:pre;display:inline-block;text-indent:2em;line-height:inherit;"> </span><span class="space" style="white-space:pre;display:inline-block;text-indent:2em;line-height:inherit;"> </span></span></i></a></span>  
	             </div>  
			</div>   
			

			<!-- Right Side of Navbar -->
			<ul class="nav navbar-nav navbar-right">
				<!-- Authentication Link -->
				@guest

					<li><a href="{{ route('login') }}"><i class="glyphicon glyphicon glyphicon-user" aria-hidden="true"></i> 登录</a></li>
					<li><a href="{{ route('register') }}"><i class="glyphicon glyphicon-triangle-right"></i> 注册</a></li>

				@else 
					<li>
						<a href="{{ route('topics.create') }}">
							<span class="glyphicon glyphicon-plus" aira-hidden="true"></span>
						</a>
					</li>
					{{--消息通知标记--}}
					<li>
						<a href="{{ route('notifications.index') }}" class="notifications-badge" style="margin-top: -2px;">
							<span class="badge badge-{{ Auth::user()->notification_count > 0 ? 'hint' : 'fade' }}" title="消息提醒">
								{{ Auth::user()->notification_count }}
							</span>
						</a>
					</li>


					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                                <img src="{{ Auth::user()->avatar }}" class="img-responsive img-circle" width="30px" height="30px">
                            </span>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

						<ul class="dropdown-menu" role='menu'>
							
							@can('manage_contents')
                                <li>
                                    <a href="{{ url(config('administrator.uri')) }}">
                                        <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>
                                        管理后台
                                    </a>
                                </li>
                            @endcan

							<li>
								<a href="{{ route('users.show', Auth::id()) }}">
									<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
									个人中心
								</a>
							</li>

							<li>
								<a href="{{ route('users.edit', Auth::id()) }}">
									<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
									编辑资料
								</a>
							</li>

							<li>
								<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
									<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
									退出登录
								</a>
							</li>

							<form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">
								{{ csrf_field() }}
							</form>
						</ul>
					</li>
				@endguest
			</ul>
		</div>
	</div>
</nav>