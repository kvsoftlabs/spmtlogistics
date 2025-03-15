<!-- Topbar Start -->
<div class="container-fluid bg-dark">
    <div class="row py-2 px-lg-5">
        <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center text-white">
                <small><i class="fa fa-phone-alt mr-2"></i>+91 948 913 0052</small>
                <small class="px-3">|</small>
                <small><i class="fa fa-envelope mr-2"></i>info@example.com</small>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <a class="text-white px-2" href="">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-white px-2" href="">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->
<?php 
    $uri = service('uri'); 
    $totalSegments = $uri->getTotalSegments();
    
    // Ensure there is at least one segment before accessing it
    $last_segment = ($totalSegments > 0) ? $uri->getSegment($totalSegments) : 'home';      
?>

<!-- Navbar Start -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-lg-5">
        <a href="<?php echo base_url(); ?>" class="navbar-brand ml-lg-3">
            <h1 class="m-0 display-5 text-uppercase text-primary"><i class="fa fa-truck mr-2"></i>Palani Murugan Transport</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
            <div class="navbar-nav m-auto py-0">
                <a href="<?php echo base_url(); ?>" class="nav-item nav-link <?php if($last_segment == 'home' ) { echo 'active'; } ?>">Home</a>
                <a href="<?php echo base_url('about'); ?>" class="nav-item nav-link <?php if($last_segment == 'about' ) { echo 'active'; } ?>">About</a>
                <a href="<?php echo base_url('service'); ?>" class="nav-item nav-link <?php if($last_segment == 'service' ) { echo 'active'; } ?>">Service</a>
                <a href="<?php echo base_url('contact'); ?>" class="nav-item nav-link <?php if($last_segment == 'contact' ) { echo 'active'; } ?>">Contact</a>
            </div>
            <a href="javascript:void(0)" class="btn btn-primary py-2 px-4 d-none d-lg-block" id="get-quote-btn">Get A Quote</a>
        </div>
    </nav>
<!-- Navbar End -->
<!-- Modal Structure -->
<div class="modal fade" id="quoteModal" tabindex="-1" aria-labelledby="quoteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quoteModalLabel">Request a Quote</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="bg-primary modal-body">
                <!-- Form inside the modal -->
                <div class="col-lg-12">
                    <div class="py-5 px-4 px-sm-5">
                        <form action="<?= site_url('trip/submit') ?>" method="post" class="py-5">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="from" class="form-control border-0 p-4" placeholder="From" required="required" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="to" class="form-control border-0 p-4" placeholder="To" required="required" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="contact_name" class="form-control border-0 p-4" placeholder="Contact Person Name" required="required" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="contact_number" class="form-control border-0 p-4" placeholder="Contact Number" required="required" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="material" class="form-control border-0 p-4" placeholder="Material" required="required" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="weight" class="form-control border-0 p-4" placeholder="Weight in ton" required="required" />
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-dark btn-block border-0 py-3" type="submit">Get A Quote</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get the modal and button references
        const quoteButton = document.getElementById("get-quote-btn");

        // Add event listener to trigger modal
        quoteButton.addEventListener("click", function() {
            // Show the modal
            var myModal = new bootstrap.Modal(document.getElementById('quoteModal'), {
                keyboard: false
            });
            myModal.show();
        });
    });
</script>
