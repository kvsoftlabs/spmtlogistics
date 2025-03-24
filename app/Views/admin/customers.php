<!doctype html>
<html lang="en">
  <!--begin::Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SRI PALANI MURUGAN TRANSPORT | Customers</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="SRI PALANI MURUGAN TRANSPORT | | Customers" />
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
            <li class="nav-item d-none d-md-block"><a href="<?php echo base_url('admin/dashboard'); ?>" class="nav-link">Home</a></li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Customer</a></li>
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
        <!--begin::App Main-->
        <main class="app-main">
                    <!--begin::App Content Header-->
            <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                    <div class="col-sm-6"><h3 class="mb-0">Customers</h3></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Customers</li>
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
                        <form action="<?= site_url('admin/customers/store') ?>" method="POST">
                            <?= csrf_field(); ?>
                            <div class="card card-primary card-outline mb-4">
                                <div class="card-header">
                                    <div class="card-title">Create Customers</div>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Customer Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="number" class="form-label">Contact Number</label>
                                        <input type="text" class="form-control" id="number" name="number" required>
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="gst_number" class="form-label">GST Number</label>
                                        <input type="text" class="form-control" id="gst_number" name="gst_number">
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="company_name" class="form-label">Company Name</label>
                                        <input type="text" class="form-control" id="company_name" name="company_name">
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea class="form-control" id="address" name="address"></textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                        </div>

                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header"><h3 class="card-title">Customers</h3></div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped datatable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Number</th>
                                                    <th>GST Number</th>
                                                    <th>Company Name</th>
                                                    <th>Address</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($customers)): ?>
                                                    <?php foreach ($customers as $customer): ?>
                                                        <tr>
                                                            <td><?= esc($customer['id']) ?></td>
                                                            <td><?= esc($customer['name']) ?></td>
                                                            <td><?= esc($customer['number']) ?></td>
                                                            <td><?= esc($customer['gst_number']) ?></td>
                                                            <td><?= esc($customer['company_name']) ?></td>
                                                            <td><?= esc($customer['address']) ?></td>
                                                            <td>
                                                                <a href="<?= site_url('admin/customers/delete/'.$customer['id']); ?>" 
                                                                class="badge text-bg-danger" 
                                                                onclick="return confirm('Are you sure you want to delete this customer?');"> 
                                                                Delete 
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr><td colspan="7" class="text-center">No customers available.</td></tr>
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
    <!-- Driver Details Modal -->
    <div class="modal fade" id="driverModal" tabindex="-1" aria-labelledby="driverModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="driverModalLabel">Driver Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Name:</strong> <span id="modalDriverName"></span></p>
                    <p><strong>Number:</strong> <span id="modalDriverNumber"></span></p>
                    <p><strong>Address:</strong> <span id="modalDriverAddress"></span></p>

                    <!-- Display License (If Available) -->
                    <p><strong>Driving License:</strong></p>
                    <img id="modalDriverLicense" src="" class="img-fluid" alt="License Image" style="display: none; max-width: 100%; height: auto;">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <?php include('common_script.php'); ?>

    <script>
        $("#driverName, #number, #address, #drivingLicense").on("change", function() {
            let driverName = $("#driverName").val();
            let number = $("#number").val();
            let address = $("#address").val().trim();  // Use .trim() to remove leading/trailing spaces
            let drivingLicense = $("#drivingLicense").val();

            if (driverName && number && address && drivingLicense) {
                // If all fields have a value, enable the button
                $("#createDriver").prop('disabled', false);
            } else {
                // If any field is empty, disable the button
                $("#createDriver").prop('disabled', true);
            }
        });

        $(document).ready(function () {
            $(".view-driver").on("click", function () {
                let name = $(this).data("name");
                let number = $(this).data("number");
                let address = $(this).data("address");
                let license = $(this).data("license");

                $("#modalDriverName").text(name);
                $("#modalDriverNumber").text(number);
                $("#modalDriverAddress").text(address);

                if (license) {
                    $("#modalDriverLicense").attr("src", "/" + license).show();
                } else {
                    $("#modalDriverLicense").hide();
                }

                let driverModal = new bootstrap.Modal(document.getElementById("driverModal"));
                driverModal.show();
            });
        });


    </script>
</body>
</html>