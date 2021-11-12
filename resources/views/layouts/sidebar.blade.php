<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('front.home') }}" class="brand-link text-center">
        <span class="brand-text font-weight-light"><b>Cust App</b></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('front.customer.index') }}" class="nav-link @if(Route::is('front.customer.*')) active @endif">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Müştərilər</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('front.product.index') }}" class="nav-link @if(Route::is('front.product.*')) active @endif">
                        <i class="nav-icon fas fa-cart-arrow-down"></i>
                        <p>Mallar</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
