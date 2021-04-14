<main id="main">
    <aside class="sidebar">
        <div class="dashboard_list">
            <ul>
                <li>
                    <div id="user_id">
                        <i class="fas fa-user-shield"><p>{{ Auth::user()->name }} </p></i>
                    </div>
                </li>
                <li class="{{ Route::currentRouteName() === 'admin.index' ? 'active' : '' }}"><a href="{{ route('admin.index') }}"><i class="fas fa-home"></i> <span class="d_none_span">Dashboard</span></a></li>
                <li class="{{ Route::currentRouteName() === 'admin.restaurants.index' ? 'active' : '' }}"><a href="{{ route('admin.restaurants.index') }}"><i class="fas fa-store"></i> <span class="d_none_span">Restaurant</span></a></li>
                <li class="{{ Route::currentRouteName() === 'admin.types.index' ? 'active' : '' }}"><a href="{{ route('admin.types.index') }}"><i class="fas fa-utensils"></i> <span class="d_none_span">Types</span></a></li>
                <li class="{{ Route::currentRouteName() === 'admin.dishes.index' ? 'active' : '' }}"><a id="dishes" href="{{ route('admin.dishes.index') }}"><i class="fas fa-pizza-slice"></i> <span class="d_none_span">Dishes</span></a></li>
                <li class="{{ Route::currentRouteName() === 'admin.orders.index' ? 'active' : '' }}"><a href="{{ route('admin.orders.index') }}"><i class="fas fa-scroll"></i> <span class="d_none_span">Orders</span></a></li>
                <li><i id="logout"class="fas fa-sign-out-alt"></i> <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }} </a> </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </div>
    </aside>   
    <div class="responsive">
        <div class="dashboard_list">
            <ul>
                <li id="user_id"> <a href=""><i class="fas fa-user-shield"></i></a></li>
                <li class="{{ Route::currentRouteName() === 'admin.index' ? 'active' : '' }}"> <a href="{{ route('admin.index') }}"><i class="fas fa-home"></i> </a></li>
                <li class="{{ Route::currentRouteName() === 'admin.restaurants.index' ? 'active' : '' }}"><a href="{{ route('admin.restaurants.index') }}"><i class="fas fa-store"></i> </a></li>
                <li class="{{ Route::currentRouteName() === 'admin.types.index' ? 'active' : '' }}"><a href="{{ route('admin.types.index') }}"><i class="fas fa-utensils"></i> </a></li>
                <li class="{{ Route::currentRouteName() === 'admin.dishes.index' ? 'active' : '' }}"><a href="{{ route('admin.dishes.index') }}"><i class="fas fa-pizza-slice"></i> </a></li>
                <li class="{{ Route::currentRouteName() === 'admin.orders.index' ? 'active' : '' }}"><a href="{{ route('admin.orders.index') }}"><i class="fas fa-scroll"></i> </a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i></a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
    <div id="main_content">
        @yield('content')
    </div>
</main>