<script type="text/javascript" src="<?php echo base_url();?>assets_home/material/js/jquery-3.2.1.min.js"></script>
<section id="contact" style="background-image:url('<?php echo base_url();?>assets_home/material/img//panorama-3094696_1920.jpg');">
    <div class="rgba-black-strong py-5">
        <div class="container">
            <div class="wow fadeIn">
                <h2 class="h1 text-white pt-5 pb-3 text-center">Permohonan Layanan Forensik Klinik [Data Pemohon]</h2>
                <!-- <p class="text-white px-5 mb-5 pb-3 lead text-center">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate
                    esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur accusamus veniam.
                </p> -->
            </div>

            <div class="progress md-progress" style="height: 20px">
                <div class="progress-bar" role="progressbar" style="width: 0%; height: 20px" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
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
                                    <label for="name">Asal Instansi</label>                                                                          
                                    <div class="md-form">
                                        <select id="f_instansi_jaksa" class="browser-default custom-select">
                                            <option>- - - Pilih Salah Satu - - -</option>
                                            <?php
                                                if ($instansi != array()) {
                                                    # code...
                                                    for ($i=0; $i < count($instansi); $i++) { 
                                                        # code...
                                            ?>
                                                    <option value="<?=$instansi[$i]['id'];?>"><?=$instansi[$i]['name'];?></option>                                                    
                                            <?php
                                                    }
                                                } 
                                            ?>
                                            <option value="others">Lainnya</option>                                            
                                        </select> 
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

                                <div class="col-md-12">
                                    <label for="name">Proses Hukum yang dijalani</label>                                                                          
                                    <div class="md-form">
                                        <select id="f_alur_perkara" class="browser-default custom-select">
                                            <option>- - - Pilih Salah Satu - - -</option>
                                            <?php
                                                if ($alur_proses != array()) {
                                                    # code...
                                                    for ($i=0; $i < count($alur_proses); $i++) { 
                                                        # code...
                                            ?>
                                                    <option value="<?=$alur_proses[$i]['id'];?>"><?=$alur_proses[$i]['name'];?></option>                                                    
                                            <?php
                                                    }
                                                } 
                                            ?>
                                        </select> 
                                    </div>
                                </div> 
                                
                                <div class="col-md-12">
                                    <label for="name">Penjamin Biaya</label>                                                                          
                                    <div class="md-form">
                                        <select id="f_penjamin_biaya" class="browser-default custom-select">
                                            <option>- - - Pilih Salah Satu - - -</option>
                                            <?php
                                                if ($penjamin_biaya != array()) {
                                                    # code...
                                                    for ($i=0; $i < count($penjamin_biaya); $i++) { 
                                                        # code...
                                            ?>
                                                    <option value="<?=$penjamin_biaya[$i]['id'];?>"><?=$penjamin_biaya[$i]['name'];?></option>                                                    
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
                                    
                                </p>

                                <p class="text-black col-md-12 text-center lead">
                                    Download form token pendaftaran.
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
            var f_nama_jaksa     = $("#f_nama_jaksa").val();
            var f_jabatan_jaksa  = $("#f_jabatan_jaksa").val();
            var f_nrp_jaksa      = $("#f_nrp_jaksa").val();
            var f_telepon_jaksa  = $("#f_telepon_jaksa").val();
            var f_email_jaksa    = $("#f_email_jaksa").val();
            var f_instansi_jaksa = $("#f_instansi_jaksa").val();
            var f_permohonan     = $("#f_permohonan").val();      
            var f_alur_perkara   = $("#f_alur_perkara").val();      
            var f_penjamin_biaya = $("#f_penjamin_biaya").val();                                                             

            var data_sender = {
                'crud'              : 'insert',
                'f_nama_jaksa'      : f_nama_jaksa,
                'f_jabatan_jaksa'   : f_jabatan_jaksa,
                'f_nrp_jaksa'       : f_nrp_jaksa,
                'f_telepon_jaksa'   : f_telepon_jaksa,
                'f_email_jaksa'     : f_email_jaksa,
                'f_instansi_jaksa'  : f_instansi_jaksa,
                'f_permohonan'      : f_permohonan,
                'f_alur_perkara'    : f_alur_perkara,
                'f_penjamin_biaya'  : f_penjamin_biaya
            }                

			$.ajax({
				url :"<?php echo site_url();?>home/store_request",
				type:"post",
				data:{data_sender : data_sender},
				beforeSend:function(){
                    $(".progress_load").modal('show');
				},
				success:function(msg){
					var obj = jQuery.parseJSON (msg);
					ajax_status(obj,'no-refresh');
                    if (obj.status == 1)
                    {
                        $("#form_application").removeClass("fadeInUp");            
                        $("#form_application").addClass("fadeOutDown");
                        $("#form_application").css({"animation-name":"fadeOutDown"});            
                        $("#form_application").hide();                    
                        setTimeout(function(){
                            $("#form_message > div > div > div > div > p.text-black.px-5.mb-5.pb-3.lead.text-center").html('Terimakasih telah mengajukan layanan foreksi, Kode token anda adalah <b><u>'+obj.token+'</u></b>. Gunakan kode token ini untuk melakukan verifikasi data. <a class="btn btn-success" href="<?=base_url();?>home/verify/'+obj.token+'">click</a> disini untuk verifikasi data');                        
                            $("#form_message").show();                                                 
                            $("#form_message").addClass("fadeInOut");               
                            $("#form_message").css({"animation-name":"fadeInOut"});                
                            $(".progress-bar").css({"width":"35%"});
                            $(".progress-bar").html('35%');                            
                            $(".progress_load").modal('hide');
                        }, 1000);                                            
                    }                    
				},
				error:function(jqXHR,exception)
				{
					ajax_catch(jqXHR,exception);					
				}
			})	
        })
    });    
</script>