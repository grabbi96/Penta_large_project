<div class="sidebar" data-color="orange">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            CT
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Creative Tim
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="active ">
                <a href="{{route('admin.dashboard')}}"><i class="now-ui-icons design_app"></i> <p>Dashboard</p></a>
            </li>
            <li>
                <a href="{{route('admin.products')}}"><i class="now-ui-icons design_app"></i> <p>Product</p></a>
            </li>
            <li>
                <a href="{{route('admin.create')}}"><i class="now-ui-icons design_app"></i> <p>Create Product</p></a>
            </li>
            <li>
                <a href="{{route('admin.orders')}}"><i class="now-ui-icons design_app"></i> <p>Orders</p></a>
            </li>
            <li>
                <a href="{{route('admin.withdraw')}}"><i class="now-ui-icons design_app"></i> <p>Withdraw</p></a>
            </li>
            <li>
                <a href="{{route('admin.users')}}"><i class="now-ui-icons design_app"></i> <p>Users</p></a>
            </li>
            <li>
                <a href="{{route('admin.pro_users')}}"><i class="now-ui-icons design_app"></i> <p>Pro Users</p></a>
            </li>
            <li>
                <a href="{{route('admin.profit_club')}}"><i class="now-ui-icons design_app"></i> <p>Profit Club Member</p></a>
            </li>
            <li>
                <a href="{{route('admin.commission')}}">
                    <i class="now-ui-icons education_atom"></i>
                    <p>Commissions</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin.blood')}}">
                    <i class="now-ui-icons location_map-big"></i>
                    <p>Blood Information</p>
                </a>
            </li>
{{--            <li>--}}
{{--                <a href="./notifications.html">--}}
{{--                    <i class="now-ui-icons ui-1_bell-53"></i>--}}
{{--                    <p>Notifications</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="./user.html">--}}
{{--                    <i class="now-ui-icons users_single-02"></i>--}}
{{--                    <p>User Profile</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="./tables.html">--}}
{{--                    <i class="now-ui-icons design_bullet-list-67"></i>--}}
{{--                    <p>Table List</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="./typography.html">--}}
{{--                    <i class="now-ui-icons text_caps-small"></i>--}}
{{--                    <p>Typography</p>--}}
{{--                </a>--}}
{{--            </li>--}}


        </ul>

        <ul id="menu" class="nav">
            <li>
                <i class="now-ui-icons text_caps-small"></i>
                <input id="check01" type="checkbox" name="menu"/>

                <label for="check01">Service</label>
                <ul class="submenu">
                    <li><a href="{{route('admin.hospital')}}">Hospitals</a></li>
                    <li><a href="{{route('admin.restaurant')}}">Restaurants</a></li>
                    <li><a href="{{route('admin.hotel')}}">Hotel</a></li>
                    <li><a href="{{route('admin.recreation')}}">Recreation</a></li>
                </ul>
            </li>
{{--            <li>--}}
{{--                <input id="check02" type="checkbox" name="menu"/>--}}
{{--                <label for="check02">Tasto menu 02</label>--}}
{{--                <ul class="submenu">--}}
{{--                    <li><a href="#">Sotto menu 3 (long text)</a></li>--}}
{{--                    <li><a href="#">Sotto menu 4</a></li>--}}
{{--                    <li><a href="#">Sotto menu 5</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
        </ul>
    </div>
</div>
