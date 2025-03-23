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
                                            <div class="mb-3 col-md-6">
                                                <label for="customer" class="form-label">Customer</label>
                                                <select class="form-control" id="customer" name="customer_id" required>
                                                    <option value="">Select Customer</option>
                                                    <?php foreach ($customers as $customer): ?>
                                                        <option value="<?= $customer['id'] ?>"><?= esc($customer['name']) ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="vehicle" class="form-label">Vehicle</label>
                                                <select class="form-control" id="vehicle" name="vehicle_id" required>
                                                    <option value="">Select Vehicle</option>
                                                    <?php foreach ($vehicles as $vehicle): ?>
                                                        <option value="<?= $vehicle['id'] ?>"><?= esc($vehicle['vehicle_name']) ?></option>
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
                                                    <th>From</th>
                                                    <th>To</th>
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
                                                            <td><?= esc($trip['from_city']) ?></td>
                                                            <td><?= esc($trip['to_city']) ?></td>
                                                            <td>
                                                                <a href="<?= site_url('trip/delete/'.$trip['id']) ?>" class="badge text-bg-danger" onclick="return confirm('Are you sure?');">Delete</a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr><td colspan="6" class="text-center">No trips available.</td></tr>
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
        <?php include('common_footer.php'); ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

        });
    </script>
</body>
</html>
