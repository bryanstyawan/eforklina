<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<section id="form_application" style="background-image:url('<?php echo base_url();?>assets_home/material/img//panorama-3094696_1920.jpg');">
    <div class="rgba-black-strong py-5">
        <div class="container">
            <div class="wow fadeIn">
                <h2 class="h1 text-white pt-5 pb-3 text-center">Unggah Berkas Tahap Tahap <?=$info[0]->name_alur_perkara;?></h2>
                <!-- <p class="text-white px-5 mb-5 pb-3 lead text-center">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate
                    esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur accusamus veniam.
                </p> -->
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
                                        <span class="badge badge-primary badge-pill"><?=$info[0]->id_instansi;?></span>
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

                <div class="card col-lg-8 col-md-12">
                    <div class="card-body p-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th class="th-sm">Nama Dokumen
                                                </th>
                                                <th class="th-sm">Berkas
                                                </th>
                                                <th class="th-sm">Unggah File
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if ($alur_perkara != 0) {
                                                    # code...
                                                    for ($i=0; $i < count($alur_perkara); $i++) { 
                                                        # code...
                                            ?>
                                                        <tr>
                                                            <td><?=$i+1;?></td>
                                                            <td><?=$alur_perkara[$i]->name_file;?></td>
                                                            <td></td>
                                                            <td></td>                                                                                                                                                                                    
                                                        </tr>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>                                    
                                </div>
                                <div class="center-on-small-only mb-4">
                                    <button class="btn btn-indigo ml-0" data-toggle="modal" type="button" data-target="#modal_confirmation"><i class="fa fa-paper-plane-o mr-2"></i> Kirim Permohonan</button>
                                </div>

                                <!--Modal: modal_confirmation-->
                                <div class="modal fade" id="modal_confirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                    <div class="modal-dialog modal-notify modal-info" role="document">
                                        <!--Content-->
                                        <div class="modal-content text-center">
                                            <!--Header-->
                                            <div class="modal-header d-flex justify-content-center">
                                                <p class="heading">Konfirmasi</p>
                                            </div>

                                        <!--Body-->
                                        <div class="modal-body">
                                            <!-- <i class="far fa-paper-plane fa-4x animated rotateIn mb-4"></i> -->
                                            <p>Pastikan semua dokumen yang telah diunggah benar, sebelum melakukan permohonan layanan</p>

                                        </div>

                                        <!--Footer-->
                                        <div class="modal-footer flex-center">
                                            <a id="btn_next_step" class="btn btn-info">Ya</a>
                                            <a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">Tidak</a>
                                        </div>
                                        </div>
                                        <!--/.Content-->
                                    </div>
                                </div>
                                <!--Modal: modal_confirmation-->                                
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
            
        </div>
    </div>
</section>

<section id="form_message" style="display:none;background-image:url('<?php echo base_url();?>assets_home/material/img//panorama-3094696_1920.jpg');">

    <div class="rgba-black-strong py-5">
        <div class="container">
            <div class="wow fadeIn">
                <h2 class="h1 text-white pt-5 pb-3 text-center">Unggah Berkas Tahap Tahap <?=$info[0]->name_alur_perkara;?></h2>
                <!-- <p class="text-white px-5 mb-5 pb-3 lead text-center">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate
                    esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur accusamus veniam.
                </p> -->
            </div>

            <div class="row">
                <div class="card col-lg-12">
                    <div class="card-body p-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <p class="text-black px-5 mb-5 pb-3 lead text-center">
                                        Terimakasih telah melengkapi berkas, Silahkan <a class="btn btn-success" href="<?=base_url();?>home/services/<?=$token;?>">Click Disini</a> untuk mengisi data termohon.
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
        $("#btn_next_step").click(function()
        {                                                                 
			$.ajax({
				url :"<?=base_url();?>home/verifikasi_berkas/<?=$token;?>",
				type:"post",
				beforeSend:function(){
                    $(".progress_load").modal('show');
                    $("#modal_confirmation").modal('hide');
				},
				success:function(msg){
					var obj = jQuery.parseJSON (msg);
					ajax_status(obj,'no-refresh');
                    if (obj.status == 1)
                    { 
                        $("#form_application").hide();                    
                        setTimeout(function(){
                            $("#form_message > div > div > div > div > p.text-black.px-5.mb-5.pb-3.lead.text-center").html('Terimakasih telah mengajukan layanan foreksi, Kode token anda adalah <b><u>'+obj.token+'</u></b>. Gunakan kode token ini untuk melakukan verifikasi data. <a class="btn btn-success" href="<?=base_url();?>home/verify/'+obj.token+'">click</a> disini untuk verifikasi data');                        
                            $("#form_message").show();                     
                            $("#form_message").addClass("fadeInOut");               
                            $("#form_message").css({"animation-name":"fadeInOut"});                
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