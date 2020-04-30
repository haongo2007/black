<div class="navbar-minimize-fixed" style="opacity: 1;">
    <button class="minimize-sidebar btn btn-link btn-just-icon">
        <i class="tim-icons icon-align-center visible-on-sidebar-regular text-muted"></i>
        <i class="tim-icons icon-bullet-list-67 visible-on-sidebar-mini text-muted"></i>
    </button>
</div>
<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('BD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Black Dashboard') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('admin.home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'brand') class="active " @endif>
                <a href="{{ route('admin.brand.index') }}">
                    <i class="tim-icons icon-tag"></i>
                    <p>{{ __('Brands') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'categories') class="active " @endif>
                <a href="{{ route('admin.categories.index') }}">
                    <i class="tim-icons icon-bag-16"></i>
                    <p>{{ __('Categories') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'products') class="active " @endif>
                <a href="{{ route('admin.products.index') }}" aria-expanded="true" >
                    <i class="tim-icons icon-app"></i>
                    <p>
                        {{ __('Products') }}
                    </p>
                </a>
            </li>
            <li @if ($pageSlug == 'profile' || $pageSlug == 'users') class="active " @endif >
                <a data-toggle="collapse" href="#admin" aria-expanded="true">
                    <i class="tim-icons icon-single-02"></i>
                    <p>
                        {{ __('Admin') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if ($pageSlug == 'roles' || $pageSlug == 'permissions' || $pageSlug == 'users' ) show @endif" id="admin">
                <ul class="nav">
                    <li @if ($pageSlug == 'permissions') class="active " @endif>
                        <a href="{{ route('admin.permissions.index')  }}">
                            <span class="sidebar-mini-icon">P</span>
                            <span class="sidebar-normal"> {{ __('Permission') }} </span>
                        </a>
                    </li>
                    <li @if ($pageSlug == 'roles') class="active " @endif>
                        <a href="{{ route('admin.roles.index') }}">
                            <span class="sidebar-mini-icon">R</span>
                            <span class="sidebar-normal"> Role </span>
                        </a>
                    </li>
                    <li @if ($pageSlug == 'users') class="active " @endif>
                        <a href="{{ route('admin.user.index')  }}">
                            <span class="sidebar-mini-icon">U</span>
                            <span class="sidebar-normal"> {{ __('Users') }} </span>
                        </a>
                    </li>
                </ul>
                </div>
              </li>
            <li @if ($pageSlug == 'icons') class="active " @endif>
                <a href="{{ route('admin.pages.icons') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'maps') class="active " @endif>
                <a href="{{ route('admin.pages.maps') }}">
                    <i class="tim-icons icon-pin"></i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'notifications') class="active " @endif>
                <a href="{{ route('admin.pages.notifications') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'tables') class="active " @endif>
                <a href="{{ route('admin.pages.tables') }}">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'typography') class="active " @endif>
                <a href="{{ route('admin.pages.typography') }}">
                    <i class="tim-icons icon-align-center"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li>
            <li class=" {{ $pageSlug == 'upgrade' ? 'active' : '' }}">
                <a href="{{ route('admin.pages.upgrade') }}">
                    <i class="tim-icons icon-spaceship"></i>
                    <p>{{ __('Upgrade to PRO') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
