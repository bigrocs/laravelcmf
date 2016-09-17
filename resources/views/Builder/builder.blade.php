                            <div class="row">
                                <div class="col-md-12">
                                    <div class="nav-tabs-custom">
                                        {{-- BEGIN Tab导航 --}}
                                        @if (!empty($tabNav))
                                        <ul class="nav nav-tabs ">
                                            @foreach ($tabNav['tabList'] as $k=>$val)
                                                <li class="@if ($k == $tabNav['currentTab']) active @endif">
                                                    <a href="{{ $val['href'] }}"> {{ $val['title'] }} </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                        {{-- END Tab导航 --}}
                                        <div class="builder tab-content">
                                            {{-- BEGIN Tab导航数据区 --}}
                                            @include($template)
                                            {{-- END Tab导航数据区 --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
