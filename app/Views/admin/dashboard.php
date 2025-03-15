<!doctype html>
<html lang="en">
  <!--begin::Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PALANI MURUGAN TRANSPORT | Dashboard</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="PALANI MURUGAN TRANSPORT | Dashboard" />
    <meta name="author" content="ColorlibHQ" />
    <?php include('common_styles.php'); ?>
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
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
        <?php include('common_sidebar.php'); ?>
        <!--begin::App Main-->
        <main class="app-main">
            <div class="app-content">

                <div class="container-fluid">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header"><h3 class="card-title">Trips</h3></div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Customer Name</th>
                                                <th>Customer Number</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Material</th>
                                                <th>Weight</th>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($trips)): ?>
                                                <?php foreach ($trips as $index => $trip): ?>
                                                    <tr class="align-middle">
                                                        <td><?= esc($index) ?></td>
                                                        <td><?= esc($trip['name']) ?></td>
                                                        <td><?= esc($trip['number']) ?></td>
                                                        <td><?= esc($trip['from_city']) ?></td>
                                                        <td><?= esc($trip['to_city']) ?></td>
                                                        <td><?= esc($trip['material']) ?></td>
                                                        <td><?= esc($trip['weight']) ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr><td colspan="5" class="text-center">No trips.</td></tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
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
    <?php include('common_script.php'); ?>
</body>
</html>