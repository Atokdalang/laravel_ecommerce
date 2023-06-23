<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}"><img
            src="{{ asset('storage/images/assets/Gadget.png') }}" width="50px">
        <div class="sidebar-brand-text mx-3">{{ __('Homepage') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('admin/dashboard') || request()->is('admin/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Dashboard') }}</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @if (auth()->check() &&
            auth()->user()->can('user_management_access'))
        <!-- Nav Item - User Management -->
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                aria-controls="collapseTwo">
                <span>{{ __('User Management') }}</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @can('permission_access')
                        <!-- Pengecekan izin untuk akses menu Permissions -->
                        <a class="collapse-item {{ request()->is('admin/permissions*') ? 'active' : '' }}"
                            href="{{ route('admin.permissions.index') }}"> <i class="fas fa-cogs mr-2"></i>
                            {{ __('Permissions') }}</a>
                    @endcan
                    @can('role_access')
                        <!-- Pengecekan izin untuk akses menu Roles -->
                        <a class="collapse-item {{ request()->is('admin/roles*') ? 'active' : '' }}"
                            href="{{ route('admin.roles.index') }}"><i class="fas fa-user-cog mr-2"></i>
                            {{ __('Roles') }}</a>
                    @endcan
                    @can('user_access')
                        <!-- Pengecekan izin untuk akses menu Users -->
                        <a class="collapse-item {{ request()->is('admin/users*') ? 'active' : '' }}"
                            href="{{ route('admin.users.index') }}"> <i class="fas fa-users mr-2"></i>
                            {{ __('Users') }}</a>
                    @endcan
                </div>
            </div>
        </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true"
            aria-controls="collapseTwo">
            <span>{{ __('Product Management') }}</span>
        </a>
        <div id="collapseProduct" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}"
                    href="{{ route('admin.categories.index') }}"> <i class="fas fa-bars mr-2"></i>
                    {{ __('Categories') }}</a>
                <a class="collapse-item {{ request()->is('admin/tags') || request()->is('admin/tags/*') ? 'active' : '' }}"
                    href="{{ route('admin.tags.index') }}"> <i class="fas fa-tag mr-2"></i>
                    {{ __('Tags') }}</a>
                <a class="collapse-item {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}"
                    href="{{ route('admin.products.index') }}"> <i class="fas fa-box-open mr-2"></i>
                    {{ __('Products') }}</a>
                <a class="collapse-item {{ request()->is('admin/reviews') || request()->is('admin/reviews/*') ? 'active' : '' }}"
                    href="{{ route('admin.reviews.index') }}"> <i class="fas fa-comments mr-2"></i>
                    {{ __('Reviews') }}</a>
                <a class="collapse-item {{ request()->is('admin/slides') || request()->is('admin/slides/*') ? 'active' : '' }}"
                    href="{{ route('admin.slides.index') }}"> <i class="fas fa-exchange-alt mr-2"></i>
                    {{ __('Slides') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseOrder" aria-expanded="true"
            aria-controls="collapseTwo">
            <span>{{ __('Order Management') }}</span>
        </a>
        <div id="collapseOrder" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('admin/orders') || request()->is('admin/orders/*') ? 'active' : '' }}"
                    href="{{ route('admin.orders.index') }}"> <i class="fas fa-shopping-cart mr-2"></i>
                    {{ __('Orders') }}</a>
                <a class="collapse-item {{ request()->is('admin/shipments') || request()->is('admin/shipmentss/*') ? 'active' : '' }}"
                    href="{{ route('admin.shipments.index') }}"> <i class="fas fa-truck mr-2"></i>
                    {{ __('Shipments') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseReports" aria-expanded="true"
            aria-controls="collapseTwo">
            <span>{{ __('Report Management') }}</span>
        </a>
        <div id="collapseReports" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('admin/reports/revenue') ? 'active' : '' }}"
                    href="{{ route('admin.reports.revenue') }}"> <i class="fas fa-book mr-2"></i>
                    {{ __('Revenues') }}</a>
            </div>
        </div>
    </li>
</ul>
