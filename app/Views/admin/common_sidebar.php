<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="<?php echo base_url(); ?>" class="brand-link">
        <!--begin::Brand Text-->
        <span class="brand-text fw-light"><i class="nav-icon bi bi-truck"></i> SRI PALANI MURUGAN</span>
        <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul
            class="nav sidebar-menu flex-column"
            data-lte-toggle="treeview"
            role="menu"
            data-accordion="false"
        >
            <?php 
                $uri = service('uri'); 
                $totalSegments = $uri->getTotalSegments();
                
                // Ensure there is at least one segment before accessing it
                $last_segment = ($totalSegments > 0) ? $uri->getSegment($totalSegments) : 'home';      
            ?>
            <li class="nav-item">
                <a href="<?php echo base_url('admin/dashboard'); ?>" class="nav-link <?php if($last_segment == 'dashboard' ) { echo 'active'; } ?>">
                    <i class="nav-icon bi bi-speedometer"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url('admin/drivers'); ?>" class="nav-link <?php if($last_segment == 'drivers' ) { echo 'active'; } ?>">
                    <i class="nav-icon bi bi-people-fill"></i>
                    <p>
                        Drivers
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url('admin/customers'); ?>" class="nav-link <?php if($last_segment == 'customers' ) { echo 'active'; } ?>">
                    <i class="nav-icon bi bi-person-workspace"></i>
                    <p>
                        Customers
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url('admin/vehicles'); ?>" class="nav-link <?php if($last_segment == 'vehicles' ) { echo 'active'; } ?>">
                    <i class="nav-icon bi bi-truck"></i>
                    <p>
                        Vehicles
                    </p>
                </a>
            </li>
        </ul>
        <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>