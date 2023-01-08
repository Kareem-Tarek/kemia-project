<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="{{ route('users.edit', auth()->user()->id) }}">
            <i data-feather="settings"></i>
        </a>
        <img class="img-90 rounded-circle"
            src="
                    {{ auth()->user()->getFirstMediaUrl('user') != null
                        ? auth()->user()->getFirstMediaUrl('user')
                        : asset('assets/images/dashboard/1.png') }}"
            alt="" />
        <div class="badge-bottom"><span class="badge badge-primary">{{ auth()->user()->roles_name }}</span></div>
        <a href="user-profile">
            <h6 class="mt-3 f-14 f-w-600">{{ auth()->user()->name }}</h6>
        </a>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div class="text-center">
                            <h6>{{ __('master.list') }}</h6>
                        </div>
                    </li>

                    <li class="dropdown">
                        <a href="{{ route('dashboard.home') }}" class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="home"></i>
                            <span>{{ __('master.dashboard') }}</span>
                        </a>
                    </li>

                    @can('role-list')
                        <li class="dropdown">
                            <a class="nav-link menu-title {{ prefixActive('roles') }}" href="javascript:void(0)">
                                <i data-feather="home"></i>
                                <span>{{ __('role.role') }}</span>
                            </a>
                            <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('roles') }};">
                                <li><a href="{{ route('roles.index') }}"
                                        class="{{ routeActive('roles.index') }}">{{ __('role.role_list') }}</a>
                                </li>
                                @can('role-create')
                                    <li><a href="{{ route('roles.create') }}"
                                            class="{{ routeActive('roles.create') }}">{{ __('role.add_role') }}
                                        </a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                    @can('user-list')
                        <li class="dropdown">
                            <a class="nav-link menu-title {{ prefixActive('users') }}" href="javascript:void(0)">
                                <i data-feather="home"></i>
                                <span>{{ __('user.user') }}</span>
                            </a>
                            <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('users') }};">
                                <li><a href="{{ route('users.index') }}"
                                        class="{{ routeActive('users.index') }}">{{ __('user.user_list') }}</a>
                                </li>
                                @can('user-create')
                                    <li><a href="{{ route('users.create') }}"
                                            class="{{ routeActive('users.create') }}">{{ __('user.user_add') }}
                                        </a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                    @can('category-list')
                        <li class="dropdown">
                            <a class="nav-link menu-title {{ prefixActive('categories') }}" href="javascript:void(0)">
                                <i data-feather="home"></i>
                                <span>{{ __('category.category') }}</span>
                            </a>
                            <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('categories') }};">
                                <li><a href="{{ route('categories.index') }}"
                                        class="{{ routeActive('categories.index') }}">{{ __('category.category_list') }}</a>
                                </li>
                                @can('category-create')
                                    <li><a href="{{ route('categories.create') }}"
                                            class="{{ routeActive('categories.create') }}">{{ __('category.add_category') }}
                                        </a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                    @can('product-list')
                        <li class="dropdown">
                            <a class="nav-link menu-title {{ prefixActive('products') }}" href="javascript:void(0)">
                                <i data-feather="home"></i>
                                <span>{{ __('product.product') }}</span>
                            </a>
                            <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('products') }};">
                                <li><a href="{{ route('products.index') }}"
                                        class="{{ routeActive('products.index') }}">{{ __('product.product_list') }}</a>
                                </li>
                                @can('product-create')
                                    <li><a href="{{ route('products.create') }}"
                                            class="{{ routeActive('products.create') }}">{{ __('product.add_product') }}
                                        </a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
