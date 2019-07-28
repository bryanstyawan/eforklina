<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<section id="contact" style="background-image:url('<?php echo base_url();?>assets_home/material/img//panorama-3094696_1920.jpg');">
    <div class="rgba-black-strong py-5">
        <div class="container">
            <div class="wow fadeIn">
                <h2 class="h1 text-white pt-5 pb-3 text-center">Permohonan</h2>
                <!-- <p class="text-white px-5 mb-5 pb-3 lead text-center">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate
                    esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur accusamus veniam.
                </p> -->
            </div>
            <div id="form_application" class="card mb-5 wow fadeInUp" data-wow-delay=".4s">
                <div class="card-body p-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="md-form">
                                        <input class="form-control" id="f_nama_jaksa" type="text"/>
                                        <label for="name">Nama Jaksa</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="md-form">
                                        <input class="form-control" id="f_jabatan_jaksa" type="text"/>
                                        <label for="name">Jabatan Jaksa</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="md-form">
                                        <input class="form-control" id="f_nrp_jaksa" type="number"/>
                                        <label for="name">NRP/NIP Jaksa</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input class="form-control" id="f_telepon_jaksa" type="number"/>
                                        <label for="name">Telepon</label>
                                    </div>
                                </div>                        

                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input class="form-control" id="f_email_jaksa" type="text"/>
                                        <label for="email">Email</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input class="form-control" id="f_instansi_jaksa" type="text"/>
                                        <label for="name">Asal Instansi</label>
                                    </div>
                                </div>
                                <br>
                                <br> 
                                <div class="col-md-12">
                                    <label for="name">Jenis Permohonan</label>                                                                          
                                    <div class="md-form">
                                        <select id="f_permohonan" class="browser-default custom-select">
                                            <option>- - - Pilih Salah Satu - - -</option>
                                            <?php
                                                if ($layanan != array()) {
                                                    # code...
                                                    for ($i=0; $i < count($layanan); $i++) { 
                                                        # code...
                                            ?>
                                                    <option value="<?=$layanan[$i]['id'];?>"><?=$layanan[$i]['name'];?></option>                                                    
                                            <?php
                                                    }
                                                } 
                                            ?>
                                        </select> 
                                    </div>
                                </div>                                                                               
                            </div>
                            <div class="center-on-small-only mb-4">
                                <button class="btn btn-indigo ml-0" id="btn_send_app" type="submit"><i class="fa fa-paper-plane-o mr-2"></i> Kirim</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="form_message" class="card mb-5 wow" data-wow-delay=".4s" style="display:none;">
                <div class="card-body p-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <p class="text-black px-5 mb-5 pb-3 lead text-center">
                                    Terimakasih telah mengajukan layanan foreksi, Kode token anda adalah H6xs12. Gunakan kode token ini untuk melakukan verifikasi data.
                                </p>

                                <p class="text-black col-md-12 text-center lead">
                                    Download bukti pendaftaran layanan forensik.
                                    </br>
                                    <button type="button" class="btn btn-secondary px-3"><i class="fa fa-download" aria-hidden="true"></i></button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</section>
<script>
    $(document).ready(function()
    {
        $("#btn_send_app").click(function()
        {            
            $("#progress_load").modal('show');
            $("#form_application").removeClass("fadeInUp");            
            $("#form_application").addClass("fadeOutDown");
            $("#form_application").css({"animation-name":"fadeOutDown"});            
            $("#form_application").hide();
            setTimeout(function(){
                $("#form_message").show();                     
                $("#form_message").addClass("fadeInOut");               
                $("#form_message").css({"animation-name":"fadeInOut"});                
                $("#progress_load").modal('hide');
            }, 1000);                                        
        });        
    });    
</script>