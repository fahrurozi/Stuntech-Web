<!-- Font Awesome -->
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('home') }}">STUNTECH</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="#">ST</a>
    </div>
    <ul class="sidebar-menu">
      {{-- <a href="{{ route('article') }}" style="display: block">Article</a>
    <a href="{{ route('user') }}" style="display: block">User</a> --}}
      <li class="menu-header">Dashboard</li>
      <li class="nav-item">
        <a href="{{ route('article') }}" class="nav-link"><i class="fas fa-fire"></i><span>Article</span></a>
      </li>
      <li class="nav-item">
        <a href="{{ route('stunting_info') }}" class="nav-link"><i class="fas fa-fire"></i><span>Stunting Info</span></a>
      </li>
      <li class="nav-item">
        <a href="{{ route('nutrition_info') }}" class="nav-link"><i class="fas fa-info"></i><span>Nutrition Info</span></a>
      </li>
      <li class="nav-item">
        <a href="/trace/index" class="nav-link"><i class="far fa-square"></i><span>Trace</span></a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link"><i class="fa-solid fa-bell"></i> <span>Reminder</span></a>
      </li>
      <li class="nav-item">
        <a href="/mapsadmin/index" class="nav-link"><i class="fas fa-th"></i> <span>Maps Admin</span></a>
      </li>
      </li>
      <li class="nav-item">
        <a href="{{ route('user') }}" class="nav-link"><i class="far fa-user"></i><span>User</span></a>
      </li>
    </ul>
  </aside>
</div>