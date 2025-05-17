<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="" class="brand-link">
    <img src="/assets/images/soli-lms-logo.png"
      alt="SOLI lms Logo"
      class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">SOLI lms</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview">
          <a href="/admin/dashboard.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>

        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Abcenses
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <!-- Create Absence -->
              <li class="nav-item">
                  <a href="/admin/Absence_form/create.php" class="nav-link">
                      <i class="fas fa-plus-circle nav-icon"></i> <!-- Icon for "Create" -->
                      <p>Create Absence</p>
                  </a>
              </li>
              <!-- Show Absences -->
              <li class="nav-item">
                  <a href="/admin/Absence_form/index.php" class="nav-link">
                      <i class="fas fa-list-alt nav-icon"></i> <!-- Icon for "Show" -->
                      <p>Show Absences</p>
                  </a>
              </li>
          </ul>

        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>