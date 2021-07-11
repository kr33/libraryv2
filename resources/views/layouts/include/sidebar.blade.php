<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="sjdsd">
                    <h2 class="brand-text mb-0" style="color: white;">Library</h2>
                </a>
            </li>
        </ul>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content ps ps--active-y">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item active" data-current="{{url('/dashboard')}}">
                <a href="{{url('/admin/dashboard')}}">
                    <i class="feather icon-home"></i><span class="menu-title" data-i18n="">Dashboard</span>
                </a>
            </li>
            <li class="nav-item has-sub" data-current="{{route('categories.index')}}">
               <a href="javascript:;"><i class="fas fa-list"></i>
                <span class="menu-title" data-i18n="">Categories</span>
                </a>
               <ul class="menu-content">
                    <li class="">
                        <a href="{{route('categories.create')}}"><i class="far fa-plus-square"></i>
                            <span class="menu-title" data-i18n="nav.sk_layout_2_columns">Create</span>
                        </a>
                    </li>
                    <li class="">
                    <a href="{{route('categories.index')}}"><i class="fas fa-list"></i>
                        <span class="menu-title" data-i18n="nav.sk_layout_2_columns">List</span>
                    </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-sub" data-current="{{route('languages.index')}}">
               <a href="javascript:;"><i class="fas fa-language"></i>
                <span class="menu-title" data-i18n="">Languages</span>
                </a>
               <ul class="menu-content">
                    <li class="">
                        <a href="{{route('languages.create')}}"><i class="far fa-plus-square"></i>
                            <span class="menu-title" data-i18n="nav.sk_layout_2_columns">Create</span>
                        </a>
                    </li>
                    <li class="">
                    <a href="{{route('languages.index')}}"><i class="fas fa-list"></i>
                        <span class="menu-title" data-i18n="nav.sk_layout_2_columns">List</span>
                    </a>
                    </li>
                </ul>
            </li>
            <!--<li class="nav-item has-sub" data-current="">-->
            <!--   <a href="javascript:;"><i class="feather icon-users"></i>-->
            <!--    <span class="menu-title" data-i18n="">Users</span>-->
            <!--    </a>-->
            <!--   <ul class="menu-content">-->
            <!--        <li class="">-->
            <!--        <a href="javascript:;"><i class="fas fa-list"></i>-->
            <!--            <span class="menu-title" data-i18n="nav.sk_layout_2_columns">List</span>-->
            <!--        </a>-->
            <!--        </li>-->
            <!--        <li class="">-->
            <!--            <a href="javascript:;"><i class="far fa-plus-square"></i>-->
            <!--                <span class="menu-title" data-i18n="nav.sk_layout_2_columns">Create</span>-->
            <!--            </a>-->
            <!--        </li>-->
            <!--    </ul>-->
            <!--</li>-->
            <li class="nav-item has-sub" data-current="{{route('books.index')}}">
               <a href="javascript:;"><i class="fas fa-book"></i>
                <span class="menu-title" data-i18n="">Books</span>
                </a>
               <ul class="menu-content">
                    <li class="">
                        <a href="{{route('books.create')}}"><i class="far fa-plus-square"></i>
                            <span class="menu-title" data-i18n="nav.sk_layout_2_columns">Create</span>
                        </a>
                    </li>
                    <li class="">
                    <a href="{{route('books.index')}}"><i class="fas fa-list"></i>
                        <span class="menu-title" data-i18n="nav.sk_layout_2_columns">List</span>
                    </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-current="{{route('users.index')}}">
                <a href="{{route('users.index')}}">
                    <i class="feather icon-users"></i>
                    <span class="menu-title" data-i18n="">Users</span>
                </a>
            </li>
            <li class="nav-item" data-current="{{route('messages.index')}}">
                <a href="{{route('messages.index')}}">
                    <i class="fa fa-envelope"></i>
                    <span class="menu-title" data-i18n="">Messages</span>
                </a>
            </li>   
            <!-- <li class="nav-item" data-current="{{route('logout')}}">
                <a href="javascript:document.getElementById('sidebarLogoutForm').submit();">
                    <i class="feather icon-power"></i>
                    <span class="menu-title" data-i18n="">Logout</span>
                </a>
            </li>                              -->
        </ul>
        <!-- <form method="post" action="{{route('logout')}}" id="sidebarLogoutForm">
            {{csrf_field()}}
        </form> -->
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px; height: 243px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 196px;"></div></div></div>
    </div>
</div>
<!-- END: Main Menu-->