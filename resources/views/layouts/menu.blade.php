<li class="nav-item">
    <a class="nav-link {{ Request::is('home*') ? 'active' : '' }}" href="{!! route('home.index') !!}">
        <i class="nav-icon icon-speedometer"></i>
        <span>Dashboard</span>
    </a>
</li>
@if (Auth::user()->role_id != 1)
<li class="nav-item">
    <a class="nav-link {{ Request::is('order*') ? 'active' : '' }}" href="{!! route('order.index') !!}">
        <i class="nav-icon icon-basket"></i>
        <span>Order</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('history*') ? 'active' : '' }}" href="{!! route('order.history') !!}">
        <i class="nav-icon icon-book-open"></i>
        <span>Order History</span>
    </a>
</li>
@endif
<li class="nav-title">My Shop</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('customer*') ? 'active' : '' }}" href="{!! route('customer.index') !!}">
        <i class="nav-icon icon-user"></i>
        <span>Customer</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('mylicense*') ? 'active' : '' }}" href="{!! route('mylicense.index') !!}">
        <i class="nav-icon icon-key"></i>
        <span>Stocks</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('mypackage*') ? 'active' : '' }}" href="{!! route('mypackage.index') !!}">
        <i class="nav-icon icon-layers"></i>
        <span>Packages</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link  {{ Request::is('mytransaction*') ? 'active' : '' }}" href="{!! route('mytransaction.index') !!}">
        <i class="nav-icon icon-bag"></i>
        <span>Transactions</span>
    </a>
</li>
@if (Auth::user()->role_id == 1)
<li class="nav-title">Admin Menu</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('roles*') ? 'active' : '' }}" href="{!! route('roles.index') !!}">
        <i class="nav-icon icon-shield"></i>
        <span>Roles</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" href="{!! route('users.index') !!}">
        <i class="nav-icon icon-people"></i>
        <span>All User</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('licenses*') ? 'active' : '' }}" href="{!! route('licenses.index') !!}">
        <i class="nav-icon icon-key"></i>
        <span>All License</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('packages*') ? 'active' : '' }}" href="{!! route('packages.index') !!}">
        <i class="nav-icon icon-layers"></i>
        <span>All Packages</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link  {{ Request::is('transactions*') ? 'active' : '' }}" href="{!! route('transactions.index') !!}">
        <i class="nav-icon icon-bag"></i>
        <span>All Transactions</span>
    </a>
</li>
@endif