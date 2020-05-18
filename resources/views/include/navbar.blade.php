
@php

$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp

<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
   
          @if(Auth::user()->userType == 'Admin')
          <li class="nav-item has-treeview {{ $prefix == '/user' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('user.view')}}" class="nav-link {{ $route == 'user.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          <li class="nav-item has-treeview {{ $prefix == '/profile' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('profile.view')}}" class="nav-link {{ $route == 'profile.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Profile</p>
                </a>
              </li>
            </ul>
          </li>

        <li class="nav-item has-treeview {{ $prefix == '/supplier' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Supplier
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('supplier.view')}}" class="nav-link {{ $route == 'supplier.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Supplier</p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item has-treeview {{ $prefix == '/customer' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Customer
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('customer.view')}}" class="nav-link {{ $route == 'customer.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Customer</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{ $prefix == '/unit' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Unit
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('unit.view')}}" class="nav-link {{ $route == 'unit.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Unit</p>
                </a>
              </li>
            </ul>
          </li>

             <li class="nav-item has-treeview {{ $prefix == '/category' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category.view')}}" class="nav-link {{ $route == 'category.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Category</p>
                </a>
              </li>
            </ul>
          </li>

             <li class="nav-item has-treeview {{ $prefix == '/product' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Product
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('product.view')}}" class="nav-link {{ $route == 'product.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Product</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{ $prefix == '/purchase' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Purchase
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('purchase.view')}}" class="nav-link {{ $route == 'purchase.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Purchase</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('approve.purchase')}}" class="nav-link {{ $route == 'approve.purchase' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approve Purchase</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item has-treeview {{ $prefix == '/invoice' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Invoice
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('invoice.view')}}" class="nav-link {{ $route == 'invoice.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Invoice</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('pending.invoice')}}" class="nav-link {{ $route == 'pending.invoice' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approve Invoice</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('invoice.print.list')}}" class="nav-link {{ $route == 'invoice.print.list' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Printing Invoice</p>
                </a>
              </li>
            </ul>

             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('invoice.daily.report')}}" class="nav-link {{ $route == 'invoice.daily.report' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Invoice Report</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{ $prefix == '/stock' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Stock
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('stock.view')}}" class="nav-link {{ $route == 'stock.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock Report</p>
                </a>
              </li>
            </ul>
          </li>
          
            </ul>
          </li></ul>
      </nav>