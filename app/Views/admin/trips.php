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
                                                    <th>Expenses</th>
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
                                                                <?php if ($trip['expense_id'] > 0): ?>
                                                                    <button class="btn btn-sm btn-info edit-expense-btn"
                                                                            data-trip-id="<?= esc($trip['id']) ?>"
                                                                            data-driver-name="<?= esc($trip['driver_name']) ?>"
                                                                            data-driver-id="<?= esc($trip['driver_id']) ?>"
                                                                            data-advance="<?= esc($trip['advance_amount']) ?>">
                                                                        Edit Expense
                                                                    </button>
                                                                <?php else: ?>
                                                                    <button class="btn btn-sm btn-primary add-expense-btn"
                                                                            data-trip-id="<?= esc($trip['id']) ?>"
                                                                            data-driver-name="<?= esc($trip['driver_name']) ?>"
                                                                            data-driver-id="<?= esc($trip['driver_id']) ?>"
                                                                            data-advance="<?= esc($trip['advance_amount']) ?>">
                                                                        Add Expense
                                                                    </button>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?= site_url('trip/delete/'.$trip['id']) ?>" class="badge text-bg-danger" onclick="return confirm('Are you sure?');">Delete</a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr><td colspan="9" class="text-center">No trips available.</td></tr>
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

        <!-- Trip Expense Modal -->
        <div class="modal fade" id="expenseModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Trip Expense</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form id="expenseForm">
                        <div class="modal-body">
                            <input type="hidden" id="ex_trip_id" name="trip_id">
                            <input type="hidden" id="ex_driver_id" name="driver_id">
                            
                            <!-- Driver Name -->
                            <div class="mb-3">
                                <label for="ex_driver_name" class="form-label">Driver Name</label>
                                <input type="text" class="form-control" id="ex_driver_name" name="ex_driver_name" readonly>
                            </div>

                            <!-- Expense Fields -->
                            <div class="mb-3">
                                <label for="bata" class="form-label">Driver Bata</label>
                                <input type="number" class="form-control expense-input" id="bata" name="bata" >
                            </div>

                            <div class="mb-3">
                                <label for="vehicle_maintenance" class="form-label">Vehicle Maintenance</label>
                                <input type="number" class="form-control expense-input" id="vehicle_maintenance" name="vehicle_maintenance">
                            </div>

                            <div class="mb-3">
                                <label for="police_fine" class="form-label">Police Fine</label>
                                <input type="number" class="form-control expense-input" id="police_fine" name="police_fine">
                            </div>

                            <div class="mb-3">
                                <label for="other_expense" class="form-label">Other Expenses</label>
                                <input type="number" class="form-control expense-input" id="other_expense" name="other_expense">
                            </div>

                            <!-- Advance Paid -->
                            <div class="mb-3">
                                <label for="advance_amount" class="form-label">Advance Paid</label>
                                <input type="number" class="form-control" id="advance_amount" name="advance_amount" readonly>
                            </div>

                            <!-- Total Expense (Calculated) -->
                            <div class="mb-3">
                                <label for="total_expense" class="form-label">Total Expense (After Advance Deduction)</label>
                                <input type="number" class="form-control" id="total_expense" name="total_expense" readonly>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="saveExpenseBtn">Save Expense</button>
                            <button type="submit" class="btn btn-success" id="updateExpenseBtn" style="display: none;">Update Expense</button>
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

            $(".add-expense-btn, .edit-expense-btn").on("click", function () {
                let tripId = $(this).data("trip-id");
                let driverName = $(this).data("driver-name");
                let driverId = $(this).data("driver-id");
                let advance = parseFloat($(this).data("advance")) || 0;

                // Set values in modal
                $("#ex_trip_id").val(tripId);
                $("#ex_driver_id").val(driverId);
                $("#ex_driver_name").val(driverName);
                $("#advance_amount").val(advance);

                if ($(this).hasClass("edit-expense-btn")) {
                    $.ajax({
                        url: "/admin/trip-expense/get/" + tripId,
                        type: "GET",
                        dataType: "json",
                        success: function (response) {
                            if (response.status === "success" && response.data) {
                                let data = response.data;
                                
                                // Populate the form fields with fetched data
                                $("#ex_trip_id").val(data.trip_id);
                                $("#ex_driver_id").val(data.driver_id);
                                $("#ex_driver_name").val(data.driver_name); // Assuming driver_name is available
                                $("#bata").val(data.bata || 0);
                                $("#vehicle_maintenance").val(data.vehicle_maintenance || 0);
                                $("#police_fine").val(data.police_fine || 0);
                                $("#other_expense").val(data.other_expense || 0);
                                $("#advance_amount").val(data.advance || 0);
                                $("#total_expense").val(data.total || 0);

                                // Show "Update Expense" button and hide "Save Expense"
                                $("#saveExpenseBtn").hide();
                                $("#updateExpenseBtn").show();
                            } else {
                                // Clear the form for a new entry
                                $("#expenseForm")[0].reset();
                                $("#ex_trip_id").val(tripId);

                                // Show "Save Expense" button and hide "Update Expense"
                                $("#saveExpenseBtn").show();
                                $("#updateExpenseBtn").hide();
                            }

                            // Show the modal
                            $("#expenseModal").modal("show");
                        },
                        error: function () {
                            alert("Error fetching expense details!");
                        }
                    });
                } else {
                    $(".expense-input").val(0); // Reset inputs for new expense
                    updateTotalExpense();
                }

                let expenseModal = new bootstrap.Modal(document.getElementById("expenseModal"));
                expenseModal.show();
            });

            // Function to update total expense calculation
            function updateTotalExpense() {
                let bata = parseFloat($("#bata").val()) || 0;
                let maintenance = parseFloat($("#vehicle_maintenance").val()) || 0;
                let fine = parseFloat($("#police_fine").val()) || 0;
                let other = parseFloat($("#other_expense").val()) || 0;
                let advance = parseFloat($("#advance_amount").val()) || 0;

                let total = bata + maintenance + fine + other - advance;
                $("#total_expense").val(total >= 0 ? total : 0);
            }

            $(".expense-input").on("input", function () {
                updateTotalExpense();
            });

            $("#expenseForm").on("submit", function (e) {
                e.preventDefault();

                var formData = $(this).serialize();
                var tripId = $("#ex_trip_id").val();
                var url = $("#updateExpenseBtn").is(":visible") 
                    ? "/admin/trip-expense/update/" + tripId 
                    : "/admin/trip-expense/store"; 

                $.ajax({
                    url: url,
                    type: "POST",
                    data: $(this).serialize(),
                    success: function (response) {
                        alert("Expense saved successfully!");
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
