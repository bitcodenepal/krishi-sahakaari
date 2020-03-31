<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?php echo e(asset('img/48.jpg')); ?>" alt="User Image">
        <div>
            <p class="app-sidebar__user-name"><?php echo e(Auth::user()->name); ?></p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item <?php echo e((Request::is('home') ? "active" : "")); ?>" href="<?php echo e(route('home')); ?>"><i
                    class="app-menu__icon fas fa-tachometer-alt"></i>
                <span class="app-menu__label">सारांश/विवरण</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php echo e((Request::is('share*') ? "active" : "")); ?>"
               href="<?php echo e(route('share.index')); ?>"><i
                    class="app-menu__icon fa fa-file"></i>
                <span class="app-menu__label">सेयर</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php echo e((Request::is('savings*') ? "active" : "")); ?>"
               href="<?php echo e(route('savings.index')); ?>"><i
                    class="app-menu__icon fa fa-wallet"></i>
                <span class="app-menu__label">बचत</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php echo e((Request::is('loan*') ? "active" : "")); ?>"
               href="<?php echo e(route('loan.index')); ?>"><i
                    class="app-menu__icon fa fa-money-bill-alt"></i>
                <span class="app-menu__label">ऋण</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php echo e((Request::is('food*') ? "active" : "")); ?>"
               href="<?php echo e(route('food.index')); ?>"><i
                    class="app-menu__icon fa fa-utensils"></i>
                <span class="app-menu__label">अन्न स्टोर</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php echo e((Request::is('buy-n-sell') ? "active" : "")); ?>"
               href="<?php echo e(route('buy-n-sell')); ?>"><i
                    class="app-menu__icon fa fa-shopping-basket"></i>
                <span class="app-menu__label">अन्न खरीद/बिक्रि</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php echo e((Request::is('harvester*') ? "active" : "")); ?>"
               href="<?php echo e(route('harvester.index')); ?>"><i
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
            <a class="app-menu__item <?php echo e((Request::is('import*') ? "active" : "")); ?>"
               href="<?php echo e(route('import.index')); ?>"><i
                    class="app-menu__icon fa fa-upload"></i>
                <span class="app-menu__label">डाटा आयात गर्नुहोस्</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="<?php echo e(route('logout')); ?>"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                    class="app-menu__icon fa fa-power-off"></i>
                <span class="app-menu__label">साइन आउट गर्नुहोस्</span>
            </a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
            </form>
        </li>
    </ul>
</aside>
<?php /**PATH /home/bitsahakaari/public_html/sahakaari/resources/views/layouts/partials/_sidebar.blade.php ENDPATH**/ ?>