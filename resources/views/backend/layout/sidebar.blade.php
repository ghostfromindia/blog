<div class="flex-shrink-0 p-3 bg-white sidebar" >
    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
        <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-5 fw-semibold">{{env('APP_NAME')}}</span>
    </a>
    <ul class="list-unstyled ps-0">
        <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                Manage
            </button>
            <div class="collapse show" id="home-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small menu-ul">
                    <li><a href="{{route('product.home')}}" class="hover-underline pl-5">Product</a></li>
                    <li><a href="{{route('category.home')}}" class="hover-underline pl-5">Category</a></li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="true">
                Order
            </button>
            <div class="collapse show" id="dashboard-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small menu-ul">
                    <li><a href="#" class="hover-underline pl-5">Orders</a></li>
                    <li><a href="#" class="hover-underline pl-5">Inventory</a></li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded " data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="true">
                Leads
            </button>
            <div class="collapse show" id="orders-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small menu-ul">
                    <li><a href="#" class="hover-underline pl-5">Leads</a></li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded " data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="true">
                Users
            </button>
            <div class="collapse show" id="orders-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small menu-ul">
                    <li><a href="{{route('user.home')}}" class="hover-underline pl-5">Users</a></li>
                    <li><a href="#" class="hover-underline pl-5">Promoters</a></li>
                    <li><a href="#" class="hover-underline pl-5">Admin</a></li>
                    <li><a href="#" class="hover-underline pl-5">Address</a></li>
                </ul>
            </div>
        </li>
        <li class="border-top my-3"></li>
        <li>{{Auth::user()->name}}</li>
        <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                Account
            </button>
            <div class="collapse" id="account-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small menu-ul">
                    <li><a href="#" class="hover-underline pl-5">Profile</a></li>
                    <li><a href="#" class="hover-underline pl-5">Settings</a></li>
                    <li><a href="{{route('logout')}}" class="hover-underline pl-5">Sign out</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>
