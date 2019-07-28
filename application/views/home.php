<!DOCTYPE html>
<html class="full-height" lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>E-Forklina</title>
        <meta name="description" content="Material design landing page template built by TemplateFlip.com"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="<?php echo base_url();?>assets_home/material/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets_home/material/css/mdb.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets_home/material/styles/main.css" rel="stylesheet">
    </head>
    <body id="top">
        <header <?php echo ($carousel == 'off') ? 'style="height: 0px;"' : '' ;?>>
            <!-- Navbar-->
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" id="navbar">
                <div class="container"><a class="navbar-brand" href="#"><strong>E-Forklina</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="<?=base_url().'home/request';?>">Permohonan</a></li>             
                    <li class="nav-item"><a class="nav-link" href="<?=base_url().'home/services';?>">Layanan</a></li>              
                    <li class="nav-item"><a class="nav-link" href="#">Informasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Help Desk</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#about">Tentang Kami</a></li>                    
                    <li class="nav-item">
                            <a class="nav-link" href="<?=base_url().'auth';?>">
                                <?php
                                    if ($this->session->userdata('session_login')) {
                                        // code...
                                        echo "<b>Sisforklina</b>";
                                    }
                                    else {
                                        // code...
                                        echo "Masuk";
                                    }
                                ?>
                            </a>                  
                    </li>
                    </ul>
                </div>
                </div>
            </nav>

            <?php
                if ($carousel == 'on') {
                    # code...
            ?>
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(15).jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(16).jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(17).jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>                  
            <?php
                }
            ?>
        </header>
        <div id="content"><?php ($content!='') ? $this->load->view($content) : '';?></div>
        <div class="modal fade" id="progress_load" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
            <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">

                <div class="modal-content text-center">
                    <div class="modal-header d-flex justify-content-center">
                        <p class="heading">Mohon Tunggu</p>
                    </div>
                    <div class="modal-body">
                        <i class="fa fa-paper-plane-o mr-2 fa-4x animated rotateIn"></i>                        
                    </div>
                </div>
            </div>
        </div>

        <footer class="page-footer indigo darken-2 center-on-small-only pt-0 mt-0">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="mb-5 flex-center"><a class="px-3"><i class="fa fa-facebook fa-lg white-text"></i></a><a class="px-3"><i class="fa fa-twitter fa-lg white-text"></i></a><a class="px-3"><i class="fa fa-google-plus fa-lg white-text"></i></a><a class="px-3"><i class="fa fa-linkedin fa-lg white-text"></i></a></div>
                </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container-fluid">
                <p>Development.V.1.0.Alpha&copy; <a href="#">E-Forklina</a></p>
                </div>
            </div>
        </footer>
        <script type="text/javascript" src="<?php echo base_url();?>assets_home/material/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets_home/material/js/popper.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets_home/material/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets_home/material/js/mdb.min.js"></script>
        <script>new WOW().init();</script>
    </body>
</html>