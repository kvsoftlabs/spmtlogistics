<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRI PALANI MURUGAN TRANSPORT | Trips</title>
    <?php include('common_styles.php'); ?>
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        
        <?php include('common_sidebar.php'); ?>
        
        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6"><h3 class="mb-0">Trips</h3></div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Trips</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row g-4">
                        <div class="col-md-12">
                            <form action="/admin/trips/store" method="POST">
                                <?= csrf_field(); ?>
                                <div class="card card-primary card-outline mb-4">
                                    <div class="card-header">
                                        <div class="card-title">Create Trip</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-4">
                                            <div class="mb-3 col-md-4">
                                                <label for="customer" class="form-label">Customer</label>
                                                <select class="form-control" id="customer" name="customer_id" required>
                                                    <option value="">Select Customer</option>
                                                    <?php foreach ($customers as $customer): ?>
                                                        <option value="<?= $customer['id'] ?>"><?= esc($customer['name']) ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label for="vehicle" class="form-label">Vehicle</label>
                                                <select class="form-control" id="vehicle" name="vehicle_id" required>
                                                    <option value="">Select Vehicle</option>
                                                    <?php foreach ($vehicles as $vehicle): ?>
                                                        <option value="<?= $vehicle['id'] ?>"><?= esc($vehicle['vehicle_name']) ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label for="vehicle" class="form-label">Driver</label>
                                                <select class="form-control" id="driver" name="driver_id" required>
                                                    <option value="">Select Driver</option>
                                                    <?php foreach ($drivers as $driver): ?>
                                                        <option value="<?= $driver['id'] ?>"><?= esc($driver['name']) ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row g-4">
                                            <div class="mb-3 col-md-6">
                                                <label for="from_city" class="form-label">From City</label>
                                                <input type="text" class="form-control" id="from_city" name="from_city" required>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="to_city" class="form-label">To City</label>
                                                <input type="text" class="form-control" id="to_city" name="to_city" required>
                                            </div>
                                        </div>
                                        <div class="row g-4">
                                            <div class="mb-3 col-md-6">
                                                <label for="material" class="form-label">Material</label>
                                                <input type="text" class="form-control" id="material" name="material" required>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="weight" class="form-label">Weight</label>
                                                <input type="text" class="form-control" id="weight" name="weight" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary" id="createTrip" disabled>Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-header"><h3 class="card-title">Trips</h3></div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Customer</th>
                                                    <th>Vehicle</th>
                                                    <th>Driver</th>
                                                    <th>From</th>
                                                    <th>To</th>
                                                    <th>Advance</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($trips)): ?>
                                                    <?php foreach ($trips as $index => $trip): ?>
                                                        <tr>
                                                            <td><?= esc($trip['id']) ?></td>
                                                            <td><?= esc($trip['customer_name']) ?></td>
                                                            <td><?= esc($trip['vehicle_registration_number']) ?></td>
                                                            <td><?= esc($trip['driver_name']) ?></td>
                                                            <td><?= esc($trip['from_city']) ?></td>
                                                            <td><?= esc($trip['to_city']) ?></td>
                                                            <td>
                                                                <button class="btn btn-sm btn-warning add-advance-btn" data-trip-id="<?= esc($trip['id']) ?>" data-driver-name="<?= esc($trip['driver_name']) ?>" data-driver-id="<?= esc($trip['driver_id']) ?>">
                                                                    Add Advance
                                                                </button>
                                                            </td>
                                                            <td>
                                                                <a href="<?= site_url('trip/delete/'.$trip['id']) ?>" class="badge text-bg-danger" onclick="return confirm('Are you sure?');">Delete</a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr><td colspan="8" class="text-center">No trips available.</td></tr>
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


        <div class="modal fade" id="advanceModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Advance</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form id="advanceForm">
                        <div class="modal-body">
                            <input type="hidden" id="trip_id" name="trip_id">
                            <input type="hidden" id="driver_id" name="driver_id">
                            <div class="mb-3">
                                <label for="driver_name" class="form-label">Driver Name</label>
                                <input type="text" class="form-control" id="driver_name" name="driver_name" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="amount">Advance Amount</label>
                                <input type="number"  class="form-control" id="amount" name="amount">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Advance</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php include('common_footer.php'); ?>

    <script>
        $(document).ready(function () {
            $("#customer, #vehicle, #from_city, #to_city, #material, #weight").on("change", function() {
                let customer = $("#customer").val();
                let vehicle = $("#vehicle").val();
                let from_city = $("#from_city").val();
                let to_city = $("#to_city").val();
                let material = $("#material").val();
                let weight = $("#weight").val();
                if (customer && vehicle && from_city && to_city && material && weight) {
                    $("#createTrip").prop('disabled', false);
                } else {
                    $("#createTrip").prop('disabled', true);
                }
            });

            $(".add-advance-btn").on("click", function () {
                let tripId = $(this).data("trip-id");
                let driverId = $(this).data("driver-id");
                let driverName = $(this).data("driver-name");
                $("#trip_id").val(tripId);
                $("#driver_id").val(driverId);
                $("#driver_name").val(driverName);

                let advanceModal = new bootstrap.Modal(document.getElementById("advanceModal"));
                advanceModal.show();
            });

            $("#advanceForm").on("submit", function (e) {
                e.preventDefault();
                $.ajax({
                    url: "/admin/trip-advance/store",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function (response) {
                        alert("Advance saved successfully!");
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error:", xhr.responseText);
                        alert("Error: " + xhr.status + " - " + xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>
