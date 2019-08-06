<script type="text/javascript" src="<?php echo base_url();?>assets_home/material/js/jquery-3.2.1.min.js"></script>
<section id="form_application" style="background-image:url('<?php echo base_url();?>assets_home/material/img//panorama-3094696_1920.jpg');">
    <div class="rgba-black-strong py-5">
        <div class="container">
            <div class="wow fadeIn">
                <h2 class="h1 text-white pt-5 pb-3 text-center">Unggah Berkas Tahap <?=$info[0]->name_alur_perkara;?></h2>
                <!-- <p class="text-white px-5 mb-5 pb-3 lead text-center">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate
                    esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur accusamus veniam.
                </p> -->
            </div>

            <div class="progress md-progress" style="height: 20px">
                <div class="progress-bar" role="progressbar" style="width: 35%; height: 20px" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">35%</div>
            </div>            

            <div class="row">

                <div class="col-lg-4 col-md-12">
                    <?=$this->load->view('home/component/pemohon',$info);?>
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
                                                        $x        = $i + 1;                                                        
                                                        $get_file = $this->Allcrud->getData('mr_request_file',array('token'=>$token,'id_alur_perkara_berkas'=>$alur_perkara[$i]->id_alur_berkas_perkara))->result_array();
                                                        if ($get_file != array()) {
                                                            # code...
                                                            $link = "<a target='_blank' href='".base_url()."public/request/".$token."/".$get_file[0]['file']."' class='btn btn-success btn-download-pemohon'><i class='fa fa-download'></i> Unduh</a>";
                                                        }
                                                        
                                            ?>
                                                        <tr>
                                                            <td><?=$i+1;?></td>
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

                                                $link_11 = "";
                                                $get_file_11 = $this->Allcrud->getData('mr_request_file',array('token'=>$token,'id_alur_perkara_berkas'=>11))->result_array();
                                                if ($get_file_11 != array()) {
                                                    # code...
                                                    $link_11 = "<a target='_blank' href='".base_url()."public/request/".$token."/".$get_file_11[0]['file']."' class='btn btn-success btn-download-pemohon'><i class='fa fa-download'></i> Unduh</a>";
                                                }                                                
                                            ?>
                                                <tr>
                                                    <td><?=$x+1;?></td>
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
                                </div>
                                <div class="center-on-small-only mb-4">
                                    <button class="btn btn-indigo ml-0" data-toggle="modal" type="button" data-target="#modal_confirmation"><i class="fa fa-paper-plane-o mr-2"></i> Lanjutkan Proses Permohonan</button>
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

            <div class="progress md-progress" style="height: 20px">
                <div class="progress-bar" role="progressbar" style="width: 25%; height: 20px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
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
        $("#btn_next_step").click(function()
        {       
            var count_file_req      = parseInt('<?=count($alur_perkara);?>') +1;                                                          
            var count_file_download = $('.btn-download-pemohon').length;
            if(count_file_req == count_file_download)
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
                                $(".progress-bar").css({"width":"70%"});
                                $(".progress-bar").html('70%');                            
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