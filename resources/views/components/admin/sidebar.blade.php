<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <span class="brand-text font-weight-light">Hexide App</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                       class="nav-link">
                        <i class="nav-icon fas fa-solid far fa-share-square"></i>
                        <p>
                            {{ __('Головна сторінка') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                       class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('Панель керування') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}"
                       class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            {{ __('Користувачі') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.orders.index') }}"
                       class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>
                            {{ __('Замовлення') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.products.index') }}"
                       class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-barcode"></i>
                        <p>
                            {{ __('Товари') }}
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
