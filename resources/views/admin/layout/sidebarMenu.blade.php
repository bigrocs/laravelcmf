@if ($nav['header'])
						<li class="header">{{ $nav['name'] }}</li>
						@if (isset($nav['subNav']))
							{{-- 引入一级导航 --}}
							@each('admin.layout.sidebarMenu', $nav['subNav'], 'nav')
						@endif
@else
						@if (isset($nav['active']))
	                        <li class="treeview active">
	                    @else
	                    	<li class="treeview">
	                    @endif
	                            <a href="@if ($nav['routeName']) {{ route($nav['routeName']) }} @else javascript:; @endif">
	                                <i class="{{ $nav['icon'] }}"></i>
	                                <span>{{ $nav['name'] }}</span>
									@if (isset($nav['subNav']))
                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
									@endif
	                            </a>
								@if (isset($nav['subNav']))
									{{-- 引入子导航 --}}
	                            <ul class="treeview-menu">
									@each('admin.layout.sidebarMenu', $nav['subNav'], 'nav')
								</ul>
								@endif
	                        </li>
@endif
