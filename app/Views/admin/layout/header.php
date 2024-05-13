<div class="main-wrapper main-wrapper-1">
  <div class="navbar-bg"></div>
  <nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      </ul>
    </form>
    <ul class="navbar-nav navbar-right">
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <img alt="image" src="<?= base_url(); ?>/assets/img/avatar/<?= user()->user_image; ?>" class="rounded-circle mr-1">
          <div class="d-sm-none d-lg-inline-block">Hi, <?= user()->username; ?></div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">

          <a href="features-profile.html" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url('logout'); ?>" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="/">FOGGING</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="/home/dashboard">FG</a>
      </div>
      <ul class="sidebar-menu">
        <li><a class="nav-link" href="<?= base_url(); ?>admin"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
        <?php if (in_groups('admin', 'manager')) : ?>
          <li class="menu-header">MASTER DATA</li>
          <li><a class="nav-link" href="/admin/orders"><i class="fas fa-university"></i> <span>Data Pemesanan</span></a></li>

          <li><a class="nav-link" href="/admin/services"><i class="fas fa-university"></i> <span>Data Layanan</span></a></li>

        <?php endif; ?>

        <?php if (in_groups('manager')) : ?>
          <li class="menu-header">Manager</li>
          <li><a class="nav-link" href="/admin/users"><i class="fas fa-university"></i> <span>Data User</span></a></li>
        <?php endif; ?>

        <?php if (in_groups('manager')) : ?>
          <li class="menu-header">Worker</li>
          <li><a class="nav-link" href="/worker"><i class="fas fa-university"></i> <span>Orderan</span></a></li>
        <?php endif; ?>

        <?php if (in_groups('manager')) : ?>
          <li class="menu-header">Pemesanan</li>
          <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Report Data</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="blank.html"></i> <span>Laporan Penjualan</span></a></li>
              <li><a class="nav-link" href="blank.html"> <span>Laporan Pendapatan</span></a></li>
            </ul>
          </li>
        <?php endif; ?>

      </ul>

      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="<?= base_url('logout'); ?>" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </aside>
  </div>