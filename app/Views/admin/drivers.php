<!doctype html>
<html lang="en">
  <!--begin::Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PALANI MURUGAN TRANSPORT | | Drivers</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="PALANI MURUGAN TRANSPORT | | Drivers" />
    <meta name="author" content="ColorlibHQ" />
    <?php include('common_styles.php'); ?>
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
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
        </div>
        <!--end::Container-->
      </nav>
      <!--end::Header-->
      <!--begin::Sidebar-->
      <?php include('common_sidebar.php'); ?>
        <!--begin::App Main-->
        <main class="app-main">
                    <!--begin::App Content Header-->
            <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                    <div class="col-sm-6"><h3 class="mb-0">Drivers</h3></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Drivers</li>
                        </ol>
                    </div>
                    </div>
                    <!--end::Row-->
                </div>
            <!--end::Container-->
            </div>
            <div class="app-content">

                <div class="container-fluid">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <form action="/admin/drivers/store" method="POST" enctype="multipart/form-data">
                                <?= csrf_field(); ?> <!-- CSRF token -->
                                <div class="card card-primary card-outline mb-4">
                                    <div class="card-header">
                                        <div class="card-title">Create Drivers</div>
                                    </div>

                                    <div class="card-body">
                                        <!-- Driver Name -->
                                        <div class="mb-3">
                                            <label for="driverName" class="form-label">Driver Name</label>
                                            <input type="text" class="form-control" id="driverName" name="name" required>
                                        </div>

                                        <!-- number -->
                                        <div class="mb-3">
                                            <label for="number" class="form-label">Contact Number</label>
                                            <input type="text" class="form-control" id="number" name="number" required>
                                        </div>

                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Address</span>
                                            <textarea class="form-control" aria-label="Address" name="address" id="address"></textarea>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary" id="createDriver" disabled>Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header"><h3 class="card-title">Drivers</h3></div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Name</th>
                                                    <th>Number</th>
                                                    <th>Address</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($drivers)): ?>
                                                    <?php foreach ($drivers as $index => $driver): ?>
                                                        <tr class="align-middle">
                                                            <td><?= esc($driver['id']) ?></td>
                                                            <td><?= esc($driver['name']) ?></td>
                                                            <td><?= esc($driver['number']) ?></td>
                                                            <td><?= esc($driver['address']) ?></td>
                                                            <td><a href="<?= site_url('driver/delete/'.$driver['id']) ?>" class="badge text-bg-danger" onclick="return confirm('Are you sure you want to delete this driver?');"> Delete </a></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr><td colspan="5" class="text-center">No drivers available.</td></tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
        <!--end::App Main-->

        <?php include('common_footer.php'); ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <?php include('common_script.php'); ?>

    <script>
        $("#driverName, #number, #address").on("change", function() {
            let driverName = $("#driverName").val();
            let number = $("#number").val();
            let address = $("#address").val().trim();  // Use .trim() to remove leading/trailing spaces

            if (driverName && number && address) {
                // If all fields have a value, enable the button
                $("#createDriver").prop('disabled', false);
            } else {
                // If any field is empty, disable the button
                $("#createDriver").prop('disabled', true);
            }
        });

    </script>
</body>
</html>