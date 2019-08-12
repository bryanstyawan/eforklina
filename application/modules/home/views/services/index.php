<script type="text/javascript" src="<?php echo base_url();?>assets_home/material/js/jquery-3.2.1.min.js"></script>
<section id="form_application" style="background-image:url('<?php echo base_url();?>assets_home/material/img//C360_2018-11-07-19-58-32-673.jpg');">
    <div class="rgba-black-strong py-5">
        <div class="container">
            <div class="wow fadeIn">
                <h2 class="h1 text-white pt-5 pb-3 text-center">Mengisi Data Termohon <br>[Layanan <?=$info[0]->name_forensik;?> Tahap <?=$info[0]->name_alur_perkara;?>]</h2>
                <!-- <p class="text-white px-5 mb-5 pb-3 lead text-center">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate
                    esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur accusamus veniam.
                </p> -->
            </div>

            <div class="progress md-progress" style="height: 20px">
                <div class="progress-bar" role="progressbar" style="width: 70%; height: 20px" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">70%</div>
            </div>            

            <div class="row">

                <div class="col-lg-4 col-md-12">
                    <div class="card p-5">
                        <h3 class="card-header light-blue lighten-1 white-text text-uppercase font-weight-bold text-center py-5">Info Pemohon</h3>
                        <div class="card-body">
                            <?php
                                if ($info != 0) 
                                {
                                    # code...
                            ?>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Nama Jaksa
                                        <span class="badge badge-primary badge-pill"><?=$info[0]->nama;?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Jabatan Jaksa
                                        <span class="badge badge-primary badge-pill"><?=$info[0]->jabatan;?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        NRP/NIP Jaksa
                                        <span class="badge badge-primary badge-pill"><?=$info[0]->nrp;?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Telepon
                                        <span class="badge badge-primary badge-pill"><?=$info[0]->telepon;?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Email
                                        <span class="badge badge-primary badge-pill"><?=$info[0]->email;?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Asal Instansi
                                        <span class="badge badge-primary badge-pill"><?=$info[0]->name_instansi;?></span>
                                    </li>                    
                                </ul>                        
                            <?php
                                } 
                                else 
                                {
                                    # code...
                                }
                                
                            ?>
                        </div>
                    </div>
                </div>

                <div class="card mb-5 col-lg-8 col-md-12 wow fadeInUp" data-wow-delay=".4s">
                    <div class="card-body p-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <!-- <h2 class="col-md-12">Surat</h2>                                     -->
                                    <div class="col-md-6" style="display: none;">
                                        <div class="md-form">
                                            <input class="form-control" id="f_nomor_surat" type="text"/>
                                            <label for="name">No Surat Permohonan</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6" style="display: none;">
                                        <div class="md-form">
                                            <input class="form-control datepicker" id="f_tanggal_surat" type="text"/>
                                            <label for="name">Tanggal Surat </label>
                                        </div>
                                    </div>
                                

                                    <h2 class="col-md-12">Data Termohon</h2>
                                    <div class="col-md-4">
                                        <div class="md-form">
                                            <input class="form-control" id="f_nama_termohon" type="text"/>
                                            <label for="name">Nama</label>
                                        </div>
                                    </div>                        

                                    <div class="col-md-4">
                                        <div class="md-form">
                                            <input class="form-control" id="f_tempat_lahir_termohon" type="text"/>
                                            <label for="email">Tempat Lahir</label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="md-form">
                                            <input class="form-control datepicker" id="f_tanggal_lahir_termohon" type="text"/>
                                            <label for="name">Tanggal Lahir</label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="name">Jenis Kelamin</label>                                                                          
                                        <div class="md-form">
                                            <select id="f_jenis_kelamin_termohon" class="browser-default custom-select">
                                            <option>- - - Pilih Salah Satu - - -</option>
                                            <option value="L">Laki - Laki</option>
                                            <option value="P">Perempuan</option>                                            
                                            </select> 
                                        </div>
                                    </div>                                    

                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input class="form-control" id="f_suku_termohon" type="text"/>
                                            <label for="name">Suku</label>
                                        </div>
                                    </div>                        
                                    
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input class="form-control" id="f_agama_termohon" type="text"/>
                                            <label for="name">Agama</label>
                                        </div>
                                    </div>                         
                                    
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input class="form-control" id="f_keluarga_termohon" type="text"/>
                                            <label for="name">Pihak Keluarga</label>
                                        </div>
                                    </div>                                                         

                                    <div class="col-md-6">
                                        <label for="name">Kewarganegaraan</label>                                                                          
                                        <div class="md-form">
                                            <select id="f_warga_termohon" class="browser-default custom-select">
                                            <option>- - - Pilih Salah Satu - - -</option>
                                            <?php
                                                if ($negara != array()) {
                                                    # code...
                                                    for ($i=0; $i < count($negara); $i++) { 
                                                        # code...
                                                        $select = "";
                                                        if ($negara[$i]['id'] == 1) {
                                                            # code...
                                                            $select = "selected";
                                                        }
                                            ?>
                                                    <option value="<?=$negara[$i]['id'];?>" <?=$select;?>><?=$negara[$i]['name'];?></option>                                                    
                                            <?php
                                                    }
                                                } 
                                            ?>

                                            </select> 
                                        </div>
                                    </div>                                                                               

                                    <div class="col-md-12">
                                        <div class="md-form">
                                            <input class="form-control" id="f_alamat_termohon" type="text"/>
                                            <label for="name">Alamat</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input class="form-control" id="f_keluhan_termohon" type="text"/>
                                            <label for="name">Keluhan medis secara umum (Jika ada)</label>
                                        </div>
                                    </div>                                

                                    <div class="col-md-6" style="display:none;">
                                        <div class="md-form">
                                            <input class="form-control" id="f_proses_hukum_termohon" type="text"/>
                                            <label for="name">Proses hukum yang sedang dijalani</label>
                                        </div>
                                    </div>                                

                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input class="form-control" id="f_nama_pengawal" type="text"/>
                                            <label for="name">Nama Pengawal Tahanan</label>
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

            </div>
            
        </div>
    </div>
</section>

<section id="form_message" style="display:none;background-image:url('<?php echo base_url();?>assets_home/material/img//C360_2018-11-07-19-58-32-673.jpg');">

    <div class="rgba-black-strong py-5">
        <div class="container">
            <div class="wow fadeIn">
                <h2 class="h1 text-white pt-5 pb-3 text-center">Layanan <?=$info[0]->name_forensik;?> [Tahap <?=$info[0]->name_alur_perkara;?>]</h2>
                <!-- <p class="text-white px-5 mb-5 pb-3 lead text-center">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate
                    esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur accusamus veniam.
                </p> -->
            </div>

            <div class="progress md-progress" style="height: 20px">
                <div class="progress-bar" role="progressbar" style="width: 50%; height: 20px" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
            </div>            

            <div class="row">
                <div class="card col-lg-12">
                    <div class="card-body p-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <p class="text-black px-5 mb-5 pb-3 lead text-center">
                                        Terimakasih telah melengkapi data termohon, Selanjutnya akan diproses oleh tim kami untuk lebih lanjut.
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
    </div>
</section>
<script>
    $(document).ready(function () {
        // $('.stepper').mdbStepper();        
        $("#btn_send_app").click(function()
        {                                                                 
            var f_nomor_surat              = $("#f_nomor_surat").val();
            var f_tanggal_surat            = $("#f_tanggal_surat").val();
            var f_nama_pengawal            = $("#f_nama_pengawal").val();
            var f_nama_termohon            = $("#f_nama_termohon").val();
            var f_tempat_lahir_termohon    = $("#f_tempat_lahir_termohon").val();
            var f_tanggal_lahir_termohon   = $("#f_tanggal_lahir_termohon").val();
            var f_suku_termohon            = $("#f_suku_termohon").val();
            var f_agama_termohon           = $("#f_agama_termohon").val();
            var f_keluarga_termohon        = $("#f_keluarga_termohon").val();
            var f_warga_termohon           = $("#f_warga_termohon").val();
            var f_alamat_termohon          = $("#f_alamat_termohon").val();
            var f_jenis_kelamin_termohon   = $("#f_jenis_kelamin_termohon").val(); 
            var f_keluhan_termohon         = $("#f_keluhan_termohon").val();
            var f_proses_hukum_termohon    = $("#f_proses_hukum_termohon").val();
            var f_token                    = '<?=$token;?>'

            var data_sender = {
                'crud'                      : 'insert',
                'f_token'                   : f_token,
                'f_nomor_surat'             : f_nomor_surat,
                'f_tanggal_surat'           : f_tanggal_surat,
                'f_nama_pengawal'           : f_nama_pengawal,
                'f_nama_termohon'           : f_nama_termohon,
                'f_tempat_lahir_termohon'   : f_tempat_lahir_termohon,
                'f_tanggal_lahir_termohon'  : f_tanggal_lahir_termohon,
                'f_suku_termohon'           : f_suku_termohon,
                'f_agama_termohon'          : f_agama_termohon,
                'f_keluarga_termohon'       : f_keluarga_termohon,
                'f_warga_termohon'          : f_warga_termohon,
                'f_jenis_kelamin_termohon'  : f_jenis_kelamin_termohon,
                'f_alamat_termohon'         : f_alamat_termohon,
                'f_keluhan_termohon'        : f_keluhan_termohon,
                'f_proses_hukum_termohon'   : f_proses_hukum_termohon
            }                

			$.ajax({
				url :"<?php echo site_url();?>home/store_services",
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
                            $(".progress-bar").css({"width":"100%"});
                            $(".progress-bar").html('100%');                            
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