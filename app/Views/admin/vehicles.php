<!doctype html>
<html lang="en">
  <!--begin::Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SRI PALANI MURUGAN TRANSPORT | Vechiles</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="SRI PALANI MURUGAN TRANSPORT | | Vechiles" />
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
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Vechiles</a></li>
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
                    <div class="col-sm-6"><h3 class="mb-0">Vechiles</h3></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Vechiles</li>
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
                            <form action="<?= base_url('admin/vehicles/store') ?>" method="POST" enctype="multipart/form-data">
                                <?= csrf_field() ?>

                                <div class="mb-3">
                                    <label>Vehicle Name</label>
                                    <input type="text" name="vehicle_name" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>Registration Number</label>
                                    <input type="text" name="registration_number" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>RC Expiry Date</label>
                                    <input type="date" name="rc_expiry_date" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>RC Attachment</label>
                                    <input type="file" name="rc_attachment" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label>Insurance Expiry Date</label>
                                    <input type="date" name="insurance_expiry_date" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>Insurance Attachment</label>
                                    <input type="file" name="insurance_attachment" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label>Pollution Certificate Expiry Date</label>
                                    <input type="date" name="pollution_certificate_expiry_date" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>Pollution Certificate Attachment</label>
                                    <input type="file" name="pollution_attachment" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-success">Add Vehicle</button>
                            </form>
                        </div>

                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header"><h3 class="card-title">Vechiles</h3></div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Vehicle Name</th>
                                                <th>Registration Number</th>
                                                <th>RC Expiry</th>
                                                <th>Insurance Expiry</th>
                                                <th>Pollution Expiry</th>
                                                <th>Download</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($vehicles)): ?>
                                                <?php foreach ($vehicles as $vehicle): ?>
                                                    <tr>
                                                        <td><?= $vehicle['id'] ?></td>
                                                        <td><?= $vehicle['vehicle_name'] ?></td>
                                                        <td><?= $vehicle['registration_number'] ?></td>
                                                        <td><?= $vehicle['rc_expiry_date'] ?></td>
                                                        <td><?= $vehicle['insurance_expiry_date'] ?></td>
                                                        <td><?= $vehicle['pollution_certificate_expiry_date'] ?></td>
                                                        <td>
                                                            <!-- Download RC Attachment -->
                                                            <?php if (!empty($vehicle['rc_attachment'])): ?>
                                                                <a href="<?= base_url('uploads/' . $vehicle['rc_attachment']) ?>" download class="badge text-bg-primary">Download RC</a>
                                                            <?php endif; ?>

                                                            <!-- Download Insurance Attachment -->
                                                            <?php if (!empty($vehicle['insurance_attachment'])): ?>
                                                                <a href="<?= base_url('uploads/' . $vehicle['insurance_attachment']) ?>" download class="badge text-bg-success">Download Insurance</a>
                                                            <?php endif; ?>

                                                            <!-- Download Pollution Certificate -->
                                                            <?php if (!empty($vehicle['pollution_attachment'])): ?>
                                                                <a href="<?= base_url('uploads/' . $vehicle['pollution_attachment']) ?>" download class="badge text-bg-warning">Download Pollution</a>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                                <!-- Edit Button -->
                                                            <button class="badge text-bg-info edit-vehicle"
                                                                    data-id="<?= esc($vehicle['id']) ?>"
                                                                    data-name="<?= esc($vehicle['vehicle_name']) ?>"
                                                                    data-registration="<?= esc($vehicle['registration_number']) ?>"
                                                                    data-rc-expiry="<?= esc($vehicle['rc_expiry_date']) ?>"
                                                                    data-rc-attachment="<?= esc($vehicle['rc_attachment']) ?>"
                                                                    data-insurance-expiry="<?= esc($vehicle['insurance_expiry_date']) ?>"
                                                                    data-insurance-attachment="<?= esc($vehicle['insurance_attachment']) ?>"
                                                                    data-pollution-expiry="<?= esc($vehicle['pollution_certificate_expiry_date']) ?>"
                                                                    data-pollution-attachment="<?= esc($vehicle['pollution_attachment']) ?>">
                                                                Edit
                                                            </button>
                                                            <a href="<?= site_url('vehicle/delete/'.$vehicle['id']) ?>" class="badge text-bg-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr><td colspan="7" class="text-center">No vechiles available.</td></tr>
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

        <!-- Vehicle Edit Modal -->
        <div class="modal fade" id="editVehicleModal" tabindex="-1" aria-labelledby="editVehicleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Vehicle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="editVehicleForm" action="<?= base_url('vehicles/update') ?>" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" id="editVehicleId" name="id">
                            
                            <div class="mb-3">
                                <label for="editVehicleName" class="form-label">Vehicle Name</label>
                                <input type="text" class="form-control" id="editVehicleName" name="vehicle_name" required>
                            </div>

                            <!-- RC Expiry Date -->
                            <div class="mb-3">
                                <label for="editRcExpiry" class="form-label">RC Expiry Date</label>
                                <input type="date" class="form-control" id="editRcExpiry" name="rc_expiry_date">
                            </div>
                            <div class="mb-3">
                                <label for="editRcAttachment" class="form-label">RC Attachment</label>
                                <input type="file" class="form-control" id="editRcAttachment" name="rc_attachment">
                            </div>

                            <!-- Insurance Expiry Date -->
                            <div class="mb-3">
                                <label for="editInsuranceExpiry" class="form-label">Insurance Expiry Date</label>
                                <input type="date" class="form-control" id="editInsuranceExpiry" name="insurance_expiry_date">
                            </div>
                            <div class="mb-3">
                                <label for="editInsuranceAttachment" class="form-label">Insurance Attachment</label>
                                <input type="file" class="form-control" id="editInsuranceAttachment" name="insurance_attachment">
                            </div>

                            <!-- Pollution Expiry Date -->
                            <div class="mb-3">
                                <label for="editPollutionExpiry" class="form-label">Pollution Certificate Expiry Date</label>
                                <input type="date" class="form-control" id="editPollutionExpiry" name="pollution_certificate_expiry_date">
                            </div>
                            <div class="mb-3">
                                <label for="editPollutionAttachment" class="form-label">Pollution Certificate Attachment</label>
                                <input type="file" class="form-control" id="editPollutionAttachment" name="pollution_attachment">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Vehicle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


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

        $(document).ready(function () {
            $(".edit-vehicle").on("click", function () {
                let id = $(this).data("id");
                let name = $(this).data("name");
                let rcExpiry = $(this).data("rc-expiry");
                let insuranceExpiry = $(this).data("insurance-expiry");
                let pollutionExpiry = $(this).data("pollution-expiry");

                $("#editVehicleId").val(id);
                $("#editVehicleName").val(name);
                $("#editRcExpiry").val(rcExpiry);
                $("#editInsuranceExpiry").val(insuranceExpiry);
                $("#editPollutionExpiry").val(pollutionExpiry);

                $("#editVehicleModal").modal("show");
            });

            $("input[type='date']").on("change", function () {
                let fileInput = $(this).closest(".mb-3").next().find("input[type='file']");
                if ($(this).val()) {
                    fileInput.prop("required", true);
                } else {
                    fileInput.prop("required", false);
                }
            });
        });


    </script>
</body>
</html>