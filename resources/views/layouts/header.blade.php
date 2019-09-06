<header>
        <ul class="menu-main">
            <li
                    class="left-item"><a href="{{route('index')}}"">Main</a>
            </li>
                <li class="left-item" >
                    <a href="{{route('offers')}}">Offers</a>
                </li>
            @if(Auth::user())
                <li class="left-item" >
                    <a  href="{{route('add-offer')}}">Add Offer</a>
                </li>
            @endif
            @if(Auth::user())
                <li class="right-item" >
                    <a  href="{{route('add-article')}}">Add Article</a>
                </li>
            @endif
                    @guest
                        <li class="right-item" ><a  href="{{ route('login') }}">Login</a></li>
                        <li class="right-item"><a  href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class=>
                            <a href="#" >
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li >
                            <a  href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endguest
            </ul>
    <form method = "get" action="{{route('search-offer')}}">
     <div id="wrap">
        <form action="" autocomplete="on">
            <input class="my-input" type="text" name="search" placeholder="Search..">         </form>
        </div>
    </form>
</header>

