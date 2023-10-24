<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="{{url('/admin_dashboard')}}"><img src="admin/assets/images/tgb.png" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="{{url('/admin_dashboard')}}"><img src="admin/assets/images/tgb-mini.png" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?php echo(Auth::user()->name);?></h5>
                  <span>Admin</span>
                </div>
              </div>                
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('/admin_dashboard')}}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
          
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('manage_user')}}">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Manage User</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Products</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('/add_products')}}">Add Products</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('/manage_products')}}">Manage Products</a></li> 
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link"  href="{{url('/manage_orders')}}">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Manage Orders</span>
            </a>
          </li>
         
        </ul>
      </nav>