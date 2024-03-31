<div class="dashboard-column leftside-bar ">
    <div class="top-logo text-center">
        <a href=""><img src="images/logo.png"></a>
    </div>
    <div class="sidebar-list">
        <ul class="menu-list">
            <li>
                <a href="{{ route('admin.owners') }}"><i class="dashboard-icon"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ route('admin.properties') }}"><i class="order-icon"></i> Properties</a>
            </li>
            <li>
                <a href="{{ route('admin.clients') }}"><i class="save-order-icon"></i> Clients</a>
            </li>
            <li>
                <a href="{{ route('admin.owners') }}"><i class="save-properties-icon"></i> Owner</a>
            </li>
            <li>
                <a href="{{ route('admin.earnings') }}"><i class="save-existing-icon"></i> Earnings</a>
            </li>
            <li>
                <a href="{{ route('admin.orders') }}"><i class="total-order-icon"></i> Total Orders</a>
            </li>
        </ul>
    </div>
    <div class="user-profile  d-flex align-items-center">
        <div class="dropdown">
            <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img src="images/user-img.png">
                Jhon Doe
                <span>My Account <i class="fa fa-caret-down"></i></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
        <a href="" class="setting-button"><i class="setting-icon"></i></a>
    </div>
</div>
