<script type="text/javascript" src="<?php echo base_url();?>assets_home/material/js/jquery-3.2.1.min.js"></script>
<section id="form_application" style="background-image:url('<?php echo base_url();?>assets_home/material/img//panorama-3094696_1920.jpg');">
    <div class="rgba-black-strong py-5">
        <div class="container">
            <div class="wow fadeIn">
                <h2 class="h1 text-white pt-5 pb-3 text-center">Unggah kelengkapan Berkas Data Termohon <br> Layanan <?=$info[0]->name_forensik;?> [Tahap <?=$info[0]->name_alur_perkara;?>]</h2>
                <!-- <p class="text-white px-5 mb-5 pb-3 lead text-center">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate
                    esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur accusamus veniam.
                </p> -->
            </div>

            <div class="progress md-progress" style="height: 20px">
                <div class="progress-bar" role="progressbar" style="width: 75%; height: 20px" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
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

                <div class="mb-4 col-lg-8  col-md-12 wow fadeInUp" data-wow-delay=".4s">
                    <div class="card p-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="md-form">
                                            <input class="form-control" id="f_nomor_surat" type="text" disabled="disabled" value="<?=$info[0]->no_surat_service;?>"/>
                                            <label for="name">No Surat Permohonan</label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="md-form">
                                            <input class="form-control" id="f_tanggal_surat" type="text" disabled="disabled" value="<?=$info[0]->tanggal_surat_service;?>"/>
                                            <label for="name">Tanggal Surat </label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="md-form">
                                            <input class="form-control" id="f_nama_pengawal" type="text" disabled="disabled" value="<?=$info[0]->identitas_pengawal_service;?>"/>
                                            <label for="name">Nama Pengawal Tahanan</label>
                                        </div>
                                    </div>


                                    <h2 class="col-md-12">Data Termohon</h2>
                                    <div class="col-md-4">
                                        <div class="md-form">
                                            <input class="form-control" id="f_nama_termohon" type="text" disabled="disabled" value="<?=$info[0]->name_termohon;?>"/>
                                            <label for="name">Nama</label>
                                        </div>
                                    </div>                        

                                    <div class="col-md-4">
                                        <div class="md-form">
                                            <input class="form-control" id="f_tempat_lahir_termohon" type="text" disabled="disabled" value="<?=$info[0]->tempat_lahir_termohon;?>"/>
                                            <label for="email">Tempat Lahir</label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="md-form">
                                            <input class="form-control" id="f_tanggal_lahir_termohon" type="text" disabled="disabled" value="<?=$info[0]->tanggal_lahir_termohon;?>"/>
                                            <label for="name">Tanggal Lahir</label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="md-form">
                                            <input class="form-control" id="f_suku_termohon" type="text" disabled="disabled" value="<?=$info[0]->suku_termohon;?>"/>
                                            <label for="name">Suku</label>
                                        </div>
                                    </div>                        
                                    
                                    <div class="col-md-4">
                                        <div class="md-form">
                                            <input class="form-control" id="f_agama_termohon" type="text" disabled="disabled" value="<?=$info[0]->agama_termohon;?>"/>
                                            <label for="name">Agama</label>
                                        </div>
                                    </div>                         

                                    <div class="col-md-4">
                                        <label for="name">Kewarganegaraan</label>                                                                          
                                        <div class="md-form">
                                            <select id="f_warga_termohon" class="browser-default custom-select" disabled="disabled">
                                                <option value="1">Indonesia</option>
                                            </select> 
                                        </div>
                                    </div>                                                  
                                    
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input class="form-control" id="f_keluarga_termohon" type="text" disabled="disabled" value="<?=$info[0]->pihak_keluarga_termohon;?>"/>
                                            <label for="name">Pihak Keluarga</label>
                                        </div>
                                    </div>                                                                                                                         

                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input class="form-control" id="f_alamat_termohon" type="text" disabled="disabled" value="<?=$info[0]->alamat_termohon;?>"/>
                                            <label for="name">Alamat</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input class="form-control" id="f_keluhan_termohon" type="text" disabled="disabled" value="<?=$info[0]->keluhan_medis_service;?>"/>
                                            <label for="name">Keluhan medis secara umum (Jika ada)</label>
                                        </div>
                                    </div>                                

                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input class="form-control" id="f_proses_hukum_termohon" type="text" disabled="disabled" value="<?=$info[0]->name_alur_perkara;?>"/>
                                            <label for="name">Proses hukum yang sedang dijalani</label>
                                        </div>
                                    </div>                                
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mb-4 col-lg-12 col-md-12 wow fadeInUp" data-wow-delay=".4s">
                    <div class="card p-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <!-- <h2 class="col-md-12">Surat</h2>                                     -->
                                    <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th class="th-sm">Nama Dokumen</th>
                                                <th class="th-sm">Berkas</th>
                                                <th class="th-sm">Unggah File
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $x = 0;
                                                if ($alur_perkara != 0) {
                                                    # code...
                                                    for ($i=0; $i < count($alur_perkara); $i++) { 
                                                        # code...
                                                        $link     = "";
                                                        $get_file = $this->Allcrud->getData('mr_request_file',array('token'=>$token,'id_alur_perkara_berkas'=>$alur_perkara[$i]->id_alur_berkas_perkara))->result_array();
                                                        if ($get_file != array()) {
                                                            # code...
                                                            $link = "<a target='_blank' href='".base_url()."public/request/".$token."/".$get_file[0]['file']."' class='btn btn-success btn-download-pemohon'><i class='fa fa-download'></i> Unduh</a>";
                                                        }
                                                        $x = $i + 1;
                                                        
                                            ?>
                                                        <tr>
                                                            <td><?=$x;?></td>
                                                            <td><?=$alur_perkara[$i]->name_file;?></td>
                                                            <td><?=$link;?></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="data_upload_<?=$alur_perkara[$i]->id_alur_berkas_perkara;?>" aria-describedby="inputGroupFileAddon01">
                                                                        <label class="custom-file-label" for="data_upload_<?=$alur_perkara[$i]->id_alur_berkas_perkara;?>">Pilih Berkas</label>
                                                                    </div>
                                                                </div>    
                                                                <button class="btn btn-secondary ml-0" onclick="upload_data('<?=$alur_perkara[$i]->id_alur_berkas_perkara;?>','<?=$token;?>')" data-toggle="modal" type="button" ><i class="fa fa-upload mr-2"></i> Unggah Berkas</button>                                                                                                                                                                                               
                                                            </td>                                                                                                                                                                                    
                                                        </tr>
                                            <?php
                                                    }
                                                }

                                                $link_10 = "";
                                                $get_file_10 = $this->Allcrud->getData('mr_request_file',array('token'=>$token,'id_alur_perkara_berkas'=>10))->result_array();
                                                if ($get_file_10 != array()) {
                                                    # code...
                                                    $link_10 = "<a target='_blank' href='".base_url()."public/request/".$token."/".$get_file_10[0]['file']."' class='btn btn-success btn-download-pemohon'><i class='fa fa-download'></i> Unduh</a>";
                                                }

                                                $link_11 = "";
                                                $get_file_11 = $this->Allcrud->getData('mr_request_file',array('token'=>$token,'id_alur_perkara_berkas'=>11))->result_array();
                                                if ($get_file_11 != array()) {
                                                    # code...
                                                    $link_11 = "<a target='_blank' href='".base_url()."public/request/".$token."/".$get_file_11[0]['file']."' class='btn btn-success btn-download-pemohon'><i class='fa fa-download'></i> Unduh</a>";
                                                }                                                
                                            ?>

                                                <tr>
                                                    <td><?=$x+1;?></td>
                                                    <td>Surat Permohonan Layanan</td>
                                                    <td><?=$link_10;?></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="data_upload_10" aria-describedby="inputGroupFileAddon01">
                                                                <label class="custom-file-label" for="data_upload_10">Pilih Berkas</label>
                                                            </div>
                                                        </div>    
                                                        <button class="btn btn-secondary ml-0" onclick="upload_data('10','<?=$token;?>')" data-toggle="modal" type="button"><i class="fa fa-upload mr-2"></i> Unggah Berkas</button>                                                                                                                                                                                               
                                                    </td>                                                                                                                                                                                    
                                                </tr>
                                                <tr>
                                                    <td><?=$x+2;?></td>
                                                    <td>Surat Pengawal Tahanan</td>
                                                    <td><?=$link_11;?></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="data_upload_11" aria-describedby="inputGroupFileAddon01">
                                                                <label class="custom-file-label" for="data_upload_11">Pilih Berkas</label>
                                                            </div>
                                                        </div>    
                                                        <button class="btn btn-secondary ml-0" onclick="upload_data('11','<?=$token;?>')" data-toggle="modal" type="button"><i class="fa fa-upload mr-2"></i> Unggah Berkas</button>                                                                                                                                                                                               
                                                    </td>                                                                                                                                                                                    
                                                </tr>                                                                                            
                                        </tbody>
                                    </table>                                    


                                    <div class="col-lg-12 center-on-small-only mb-4" style="margin-top: 50px;">
                                        <button class="btn btn-indigo ml-0 pull-right" id="btn_send_app" type="submit"><i class="fa fa-paper-plane-o mr-2"></i> Selesai</button>
                                    </div>                                    
                                
                                </div>
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
                <h2 class="h1 text-white pt-5 pb-3 text-center">Layanan <?=$info[0]->name_forensik;?> [Tahap <?=$info[0]->name_alur_perkara;?>]</h2>
                <!-- <p class="text-white px-5 mb-5 pb-3 lead text-center">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate
                    esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur accusamus veniam.
                </p> -->
            </div>

            <div class="progress md-progress" style="height: 20px">
                <div class="progress-bar" role="progressbar" style="width: 75%; height: 20px" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
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
    function upload_data(id,token) {
        file_pendukung = $('#data_upload_'+id).prop('files')[0];
        if(file_pendukung != undefined)
        {
            var form_data  = new FormData();
            form_data.append('file', file_pendukung);
            $.ajax({
                url: '<?php echo site_url();?>home/upload_step_1/'+token+'/'+id, // point to server-side PHP script
                // dataType: 'json',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                beforeSend:function(){
                    $(".progress_load").modal('show');
                    toastr.info('Menyiapkan data untuk unggah file.')                                    
                },
                success: function(msg1){
                    var obj1 = jQuery.parseJSON (msg1);
                    ajax_status(obj1);
                },
                error:function(jqXHR,exception)
                {
                    ajax_catch(jqXHR,exception);					
                }
            });
        }
        else
        {
            toastr.error('Harap pilih file terlebih dahulu sebelum melakukan unggah file.')            
        }

    }
        
    $(document).ready(function () {
        // $('.stepper').mdbStepper();        
        $("#btn_send_app").click(function()
        {                                                                 
            var count_file_req      = '<?=count($alur_perkara)+2;?>';                                                          
            var count_file_download = $('.btn-download-pemohon').length;            
            if(count_file_req == count_file_download)
            {
                $.ajax({
                    url :"<?php echo site_url();?>home/verifikasi_berkas_1/<?=$token;?>",
                    type:"post",
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
            }
            else
            {
                toastr.error('Harap lengkapi berkas yang dibutuhkan.')
            }            
        })
    });
</script>