<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{ asset('img/48.jpg') }}" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ (Request::is('home') ? "active" : "") }}" href="{{ route('home') }}"><i
                    class="app-menu__icon fas fa-tachometer-alt"></i>
                <span class="app-menu__label">सारांश/विवरण</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ (Request::is('share*') ? "active" : "") }}"
               href="{{ route('share.index') }}"><i
                    class="app-menu__icon fa fa-file"></i>
                <span class="app-menu__label">सेयर</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ (Request::is('savings*') ? "active" : "") }}"
               href="{{ route('savings.index') }}"><i
                    class="app-menu__icon fa fa-wallet"></i>
                <span class="app-menu__label">बचत</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ (Request::is('loan*') ? "active" : "") }}"
               href="{{ route('loan.index') }}"><i
                    class="app-menu__icon fa fa-money-bill-alt"></i>
                <span class="app-menu__label">ऋण</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ (Request::is('food*') ? "active" : "") }}"
               href="{{ route('food.index') }}"><i
                    class="app-menu__icon fa fa-utensils"></i>
                <span class="app-menu__label">अन्न स्टोर</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ (Request::is('buy-n-sell') ? "active" : "") }}"
               href="{{ route('buy-n-sell') }}"><i
                    class="app-menu__icon fa fa-shopping-basket"></i>
                <span class="app-menu__label">अन्न खरीद/बिक्रि</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ (Request::is('harvester*') ? "active" : "") }}"
               href="{{ route('harvester.index') }}"><i
                    class="app-menu__icon fa fa-snowplow"></i>
                <span class="app-menu__label">हार्वेस्टर</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item"
               href="#"><i
                    class="app-menu__icon fa fa-tractor"></i>
                <span class="app-menu__label">ट्रयाक्टर</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ (Request::is('report*') ? "active" : "") }}"
               href="{{ route('import.index') }}"><i
                    class="app-menu__icon fa fa-copy"></i>
                <span class="app-menu__label">रिपोर्ट</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ (Request::is('import*') ? "active" : "") }}"
               href="{{ route('import.index') }}"><i
                    class="app-menu__icon fa fa-upload"></i>
                <span class="app-menu__label">डाटा आयात गर्नुहोस्</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                    class="app-menu__icon fa fa-power-off"></i>
                <span class="app-menu__label">साइन आउट गर्नुहोस्</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</aside>
