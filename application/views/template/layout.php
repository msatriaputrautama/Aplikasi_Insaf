<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Aplikasi InSAF - BRKS</title>
    <link rel="icon" href="<?= base_url('assets/img/favicon.ico'); ?>" type="image/x-icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url('assets/modules/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/modules/fontawesome/css/all.min.css'); ?>">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo base_url('assets/modules/jqvmap/dist/jqvmap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/modules/summernote/summernote-bs4.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css'); ?>">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/components.css'); ?>">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo base_url('assets/modules/datatables/Responsive-2.2.1/css/dataTables.bootstrap4.css'); ?>">
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <?php $this->load->view('template/header'); ?>

            <div class="main-sidebar sidebar-style-2">
                <?php $this->load->view('template/sidebar'); ?>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <?php echo $contents; ?>
            </div>

            <?php $this->load->view('template/footer'); ?>

        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?php echo base_url('assets/modules/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/modules/popper.js'); ?>"></script>
    <script src="<?php echo base_url('assets/modules/tooltip.js'); ?>"></script>
    <script src="<?php echo base_url('assets/modules/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/modules/nicescroll/jquery.nicescroll.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/modules/moment.min.js'); ?>"></script>
    <script src="<?= base_url('assets/modules/datatables/datatables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/stisla.js'); ?>"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>

    <script>
        $(document).ready(function() {
            $('#default-table').DataTable();
        });
    </script>

    <!-- Placeholder for additional scripts -->
    <?php $this->template->print_scripts(); ?>
</body>

</html>