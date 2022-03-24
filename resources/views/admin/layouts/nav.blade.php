<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      {{-- <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Dashboard v1</p>
            </a>
          </li>
        </ul>
      </li> --}}
      <li class="nav-item">
        <a href="{{ url('/admin/categories') }}" class="nav-link">
          <i class="fas fa-folder"></i>
          <p>
            Category
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/admin/products') }}" class="nav-link">
          <i class="fas fa-folder"></i>
          <p>
            Products
          </p>
        </a>
      </li>
    </ul>
  </nav> 