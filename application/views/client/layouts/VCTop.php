<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ?></title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/client/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/client/css/icomoon.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/client/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/client/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/client/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/client/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/client/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/client/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/client/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/client/css/extra.css">
    <script src="<?php echo base_url() ?>assets/client/js/modernizr-2.6.2.min.js"></script>
    <script src="<?php echo base_url() ?>assets/client/js/jquery.min.js"></script>
</head>

<body>
    <div class="gtco-loader"></div>
    <div id="page">
        <?php if ($this->session->flashdata()) { ?>
            <div class="alert alert-la alert-<?php echo $this->session->flashdata('type'); ?> alert-dismissible show animated fadeInUp" role="alert">
                <span class="alert-text mb-4 mt-3">
                    <strong><?php echo $this->session->flashdata('title'); ?></strong> <br>
                    <?php echo $this->session->flashdata('msg'); ?>
                </span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>