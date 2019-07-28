<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<section id="contact" style="background-image:url('<?php echo base_url();?>assets_home/material/img//panorama-3094696_1920.jpg');">
    <div class="rgba-black-strong py-5">
        <div class="container">
            <div class="wow fadeIn">
            <h2 class="h1 text-white pt-5 pb-3 text-center">Layanan Assessing</h2>
            <p class="text-white px-5 mb-5 pb-3 lead text-center">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate
                esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur accusamus veniam.
            </p>
            </div>
            <div id="form_application" class="card mb-5 wow fadeInUp" data-wow-delay=".4s">
                <div class="card-body p-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="md-form">
                                        <input class="form-control" id="name" type="text" name="name" required="required"/>
                                        <label for="name">No Surat Permohonan</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="md-form">
                                        <input class="form-control" id="name" type="text" name="name" required="required"/>
                                        <label for="name">Tanggal Surat </label>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="md-form">
                                        <input class="form-control" id="name" type="text" name="name" required="required"/>
                                        <label for="name">Berkas</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="md-form">
                                        <input class="form-control" id="name" type="text" name="name" required="required"/>
                                        <label for="name">Nama Pengawal Tahanan</label>
                                    </div>
                                </div>


                                <h3 class="col-md-12">Data Termohon</h3>
                                <div class="col-md-4">
                                    <div class="md-form">
                                        <input class="form-control" id="name" type="text" name="name" required="required"/>
                                        <label for="name">Nama</label>
                                    </div>
                                </div>                        

                                <div class="col-md-4">
                                    <div class="md-form">
                                        <input class="form-control" id="Tempat" type="text" name="_replyto" required="required"/>
                                        <label for="email">Tempat Lahir</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="md-form">
                                        <input class="form-control" id="name" type="text" name="name" required="required"/>
                                        <label for="name">Tanggal Lahir</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input class="form-control" id="name" type="text" name="name" required="required"/>
                                        <label for="name">Suku</label>
                                    </div>
                                </div>                        
                                
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input class="form-control" id="name" type="text" name="name" required="required"/>
                                        <label for="name">Agama</label>
                                    </div>
                                </div>                         
                                
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input class="form-control" id="name" type="text" name="name" required="required"/>
                                        <label for="name">Pihak Keluarga</label>
                                    </div>
                                </div>                                                         

                                <div class="col-md-6">
                                    <label for="name">Kewarganegaraan</label>                                                                          
                                    <div class="md-form">
                                        <select class="browser-default custom-select">
                                            <option>- - - Pilih Salah Satu - - -</option>

                                        </select> 
                                    </div>
                                </div>                                                                               

                                <div class="col-md-12">
                                    <div class="md-form">
                                        <input class="form-control" id="name" type="text" name="name" required="required"/>
                                        <label for="name">Alamat</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input class="form-control" id="name" type="text" name="name" required="required"/>
                                        <label for="name">Keluhan medis secara umum (Jika ada)</label>
                                    </div>
                                </div>                                

                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input class="form-control" id="name" type="text" name="name" required="required"/>
                                        <label for="name">Proses hukum yang sedang dijalani</label>
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
                                <p class="text-black col-md-12 lead text-center">
                                    Anda telah mengirim form Layanan Assessing untuk data termohon. Selanjutnya Permohonan anda akan diproses oleh tim kami.
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
            $("#form_application").removeClass("fadeInUp");            
            $("#form_application").addClass("fadeOutDown");
            $("#form_application").css({"animation-name":"fadeOutDown"});            
            $("#form_application").hide();
            setTimeout(function(){
                $("#form_message").show();                     
                $("#form_message").addClass("fadeInOut");               
                $("#form_message").css({"animation-name":"fadeInOut"});                
            }, 1000);                                        
        });        
    });    
</script>