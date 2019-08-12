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
        <link href="<?php echo base_url();?>assets_home/material/css/addons-pro/mstepper.min.css" rel="stylesheet">
        <style type="text/css">@import url("<?php echo base_url() . 'assets/plugins/datepicker/css/bootstrap-datepicker3.css'; ?>");</style>        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">                
    </head>
    <body id="top">
        <header <?php echo ($carousel == 'off') ? 'style="height: 0px;"' : '' ;?>>
            <!-- Navbar-->
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" style="background-color: #3949ab !important;" id="navbar">
                <div class="container"><a class="navbar-brand" href="#"><strong>E-Forklina</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav ml-auto">
                        <?php
                            if ($this->session->userdata('_session_login') == 1) {
                                # code...
                        ?>
                                <li class="nav-item"><a class="nav-link" href="<?=base_url().'home/track_request/';?>">Penelusuran</a></li>                                 
                                <li class="nav-item"><a class="nav-link" href="#">Informasi</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Help Desk</a></li>
                                <li class="nav-item"><a class="nav-link active" href="#about">Tentang Kami</a></li>                    
                                <li class="nav-item">
                                        <a class="nav-link" href="<?=base_url().'auth/signout';?>">Keluar</a>                  
                                </li>                                                        
                        <?php
                            } else {
                                # code...
                        ?>
                                <li class="nav-item"><a class="nav-link" href="<?=base_url().'home/request';?>">Permohonan</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?=base_url().'home/track_request/';?>">Penelusuran</a></li>                                 
                                <li class="nav-item"><a class="nav-link" href="#">Informasi</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Help Desk</a></li>
                                <li class="nav-item"><a class="nav-link active" href="#about">Tentang Kami</a></li>                                            
                                <li class="nav-item">
                                        <a class="nav-link" href="<?=base_url().'auth';?>">
                                            <?php echo "Masuk";?>
                                        </a>                  
                                </li>                            
                        <?php
                            }
                            
                        ?>
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
                        <img class="d-block w-100" src="<?=base_url();?>assets_home/slider/C360_2018-11-07-19-58-32-673.jpg" style="height: 660px;" alt="First slide">
                    </div>                                        
                    <!-- 
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?=base_url();?>assets_home/slider/tim.JPG" style="height: 660px;" alt="First slide">
                    </div>                     -->
                    <!-- <div class="carousel-item">
                        <img class="d-block w-100" src="<?=base_url();?>assets_home/slider/1900x900medic.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(16).jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(17).jpg" alt="Third slide">
                    </div> -->
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
        <div class="modal fade progress_load" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <p>Development.V.1.0.Beta&copy; <a href="#">E-Forklina</a></p>
                </div>
            </div>
        </footer>
        <!-- <script type="text/javascript" src="<?php echo base_url();?>assets_home/material/js/jquery-3.2.1.min.js"></script> -->
        <script type="text/javascript" src="<?php echo base_url();?>assets_home/material/js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets_home/material/js/popper.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets_home/material/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets_home/material/js/mdb.min.js"></script>   
        <script type="text/javascript" src="<?php echo base_url();?>assets_home/material/js/addons-pro/mstepper.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets_home/material/js/addons-pro/datepicker.js"></script>        
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>             
        <script>
            new WOW().init();
             
            // $('.datepicker').pickadate();            
            $('.datepicker').datepicker({
                maxDate: new Date,
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                daysOfWeekHighlighted: "0,6"
            });            
            
            function ajax_status(obj,arg)
            {
                if (obj.status == 1)
                {
                    // toastr["info"]("I was launched via jQuery!")                    
                    toastr.success(obj.text)
                    setTimeout(function(){
                        $("#loadprosess").modal('hide');
                        setTimeout(function(){
                            // alert(arg);
                            if (arg == null) {
                                location.reload();                    
                            }
                            else if(arg == 'no-refresh')
                            {

                            }
                            else
                            {
                                window.location.href = "<?=base_url();?>"+arg;                    
                            }
                        }, 500);
                    }, 500);
                }
                else
                {
                    // Lobibox.notify('error', {
                    //     msg: obj.text
                    //     });
                    setTimeout(function(){
                        $("#loadprosess").modal('hide');
                    }, 500);
                }
            }    

            function ajax_catch(jqXHR,exception) {
                $(".progress_load").modal('hide');
                if (jqXHR.status === 0) 
                {
                    toastr.error('Not connect.\n Verify Network.')                    
                } 
                else if (jqXHR.status == 404) 
                {
                    toastr.error('Requested page not found. [404]')                    
                } 
                else if (jqXHR.status == 500) 
                {
                    toastr.error('ERROR '+jqXHR.status+'\n'+jqXHR.statusText)                    
                } 
                else if (exception === 'parsererror') 
                {
                    toastr.error('ERROR '+exception+'\n'+'Requested JSON parse failed')                                        
                } 
                else if (exception === 'timeout') 
                {
                    toastr.error('ERROR '+exception+'\n'+'Time out error')                    
                } 
                else if (exception === 'abort') 
                {
                    toastr.error('ERROR '+exception+'\n'+'Ajax request aborted')                                        
                } 
                else 
                {
                    toastr.error('ERROR '+jqXHR.status+'\n'+jqXHR.statusText)                    
                }

                setTimeout(function(){
                    setTimeout(function(){
                        $("#loadprosess").modal('hide');
                    }, 500);
                }, 500);    
            }                    
        </script>
    </body>
</html>