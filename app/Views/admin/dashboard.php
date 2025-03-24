<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <title>SRI PALANI MURUGAN TRANSPORT | Dashboard</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="SRI PALANI MURUGAN TRANSPORT | Dashboard" />
    <meta name="author" content="ColorlibHQ" />
    <?php include('common_styles.php'); ?>
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Home</a></li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Contact</a></li>
          </ul>
          <!--end::Start Navbar Links-->
            <!--begin::End Navbar Links-->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item user-menu">
                    <a href="#" class="nav-link" id="logoutBtn">
                        <span class="d-none d-md-inline">Sign out</span>
                    </a>
                </li>
            </ul>
            <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>
      <!--end::Header-->
      <!--begin::Sidebar-->
      <?php include('common_sidebar.php'); ?>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Dashboard</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header"><h3 class="card-title">Trips</h3></div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Customer Name</th>
                                            <th>Customer Number</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Material</th>
                                            <th>Weight(Ton)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($trips)): ?>
                                            <?php foreach ($trips as $index => $trip): ?>
                                                <tr class="align-middle">
                                                    <td><?= esc($index + 1) ?></td>
                                                    <td><?= esc($trip['name']) ?></td>
                                                    <td><?= esc($trip['number']) ?></td>
                                                    <td><?= esc($trip['from_city']) ?></td>
                                                    <td><?= esc($trip['to_city']) ?></td>
                                                    <td><?= esc($trip['material']) ?></td>
                                                    <td><?= esc($trip['weight']) ?></td>
                                                    <td>
                                                        <!-- Accept Trip Button -->
                                                        <a href="<?= site_url('trip/accept/'.$trip['id']) ?>" class="badge text-bg-success"> Accepted </a>
                                                        
                                                        <!-- Delete Trip Button -->
                                                        <a href="<?= site_url('trip/delete/'.$trip['id']) ?>" class="badge text-bg-danger" onclick="return confirm('Are you sure you want to delete this trip?');"> Delete </a>
                                                    </td>
        
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr><td colspan="8" class="text-center">No trips.</td></tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->

      <?php include('common_footer.php'); ?>
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <?php include('common_script.php'); ?>
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>