{{-- Navigation --}}
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        {{-- Brand and toggle get grouped for better mobile display --}}
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#navbar-main">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">{{ config('blo g.name') }}</a>
        </div>
        {{-- Collect the nav links, forms, and other content for toggling --}}
        <div class="collapse navbar-collapse" id="navbar-main">


            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="glyphicon glyphicon-globe"></i></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        @if (!App::isLocale('zh_cn'))
                            <li><a style="color:black" href="/lang/zh_cn">
                                    简体中文
                                </a></li>
                        @endif
                        @if (!App::isLocale('zh_tw'))
                            <li><a style="color:black" href="/lang/zh_tw">
                                    繁體中文
                                </a></li>
                            @endif
                            @if (!App::isLocale('en'))
                            <li><a style="color:black" href="/lang/en">
                                    ENGLISH
                                </a></li>
                        @endif

                    </ul>
                </li>



                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">@lang('common.login')</a></li>
                    <li><a href="{{ url('/register') }}">@lang('common.register')</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @if (Auth::user()->can('admin-action'))
                            <li><a style="color:black" href="/admin">
                                    @lang('common.admin_panel')
                                </a></li>
                            @endif
                            <li>
                                <a style="color:black" href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    @lang('common.logout')
                                </a>


                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                                <a href="/">HOME@lang('common.home')</a>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>