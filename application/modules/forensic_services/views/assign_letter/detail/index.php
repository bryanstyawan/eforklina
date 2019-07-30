<script>
    $(document).ready(function(){        
        $(".closeData").click(function(){
            $("#formdata").css({"display": "none"})
            $("#timelinedata").css({"display": "none"})
            $("#forensikdata").css({"display": "none"})				
            $("#viewdata").css({"display": ""})		
        })
    });    
</script>
<div class="col-lg-12">
    <h3 class="col-lg-11 pull-left">Membuat Surat Penetapan</h3>
    <div class="col-lg-1 pull-right"><button class="btn btn-block btn-danger closeData"><i class="fa fa-close"></i></button></div>
</div>
<?php
// echo "<pre>";
// // print_r($list);
// echo "</pre>";

// die();
if ($list != 0) {
    # code...
?>
<div class="col-xs-3">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Pemohon</h3>
        </div>
        <hr>
        <div class="box-body">

            <div class="row col-lg-12">
                <div class="col-md-12">
                    <!-- <input class="form-control" type="hidden" id="oid" value="">                     -->
                    <div class="form-group">
                        <label>Nama Jaksa</label>
                        <input type="text" class="form-control" value="<?=$list[0]->name_jaksa;?>" disabled="disabled">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Jabatan Jaksa</label>
                        <input type="text" class="form-control timerange" id="f_tanggal_surat" value="<?=$list[0]->jabatan;?>" disabled="disabled">
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label>NRP/NIP Jaksa</label>
                        <input type="text" class="form-control timerange" value="<?=$list[0]->nrp;?>" disabled="disabled">
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Telepon Jaksa</label>
                        <input type="text" class="form-control timerange" value="<?=$list[0]->telepon_jaksa;?>" disabled="disabled">
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control timerange" value="<?=$list[0]->email_jaksa;?>" disabled="disabled">
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Asal Instansi</label>
                        <input type="text" class="form-control timerange" value="" disabled="disabled">
                    </div>
                </div>                

            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
<div class="col-xs-5">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Termohon</h3>
        </div>
        <hr>
        <div class="box-body">

            <div class="row col-lg-12">

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Layanan</label>
                        <input type="text" class="form-control" value="<?=$list[0]->name_services;?>" disabled="disabled">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Proses Hukum</label>
                        <input type="text" class="form-control" value="<?=$list[0]->name_perkara;?>" disabled="disabled">
                    </div>
                </div>                

                <div class="col-md-12">                    
                    <div class="form-group">
                        <label>Nomor Surat Permohonan</label>
                        <input type="text" class="form-control" value="<?=$list[0]->no_surat_service;?>" disabled="disabled">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Tanggal Surat</label>
                        <input type="text" class="form-control timerange" value="<?=$list[0]->tanggal_surat_service;?>" disabled="disabled">
                    </div>
                </div>
                
                <div class="col-md-9">
                    <div class="form-group">
                        <label>Nama Pengawal Tahanan</label>
                        <input type="text" class="form-control timerange" value="<?=$list[0]->identitas_pengawal_service;?>" disabled="disabled">
                    </div>
                </div>                

                <div class="col-md-3" style="margin-top: 25px;">
                    <div class="form-group">
                        <button class="btn btn-block btn-success"><i class="fa fa-download"></i> Unduh</button>
                    </div>
                </div>                

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Keluhan medis secara umum</label>
                        <textarea  class="form-control" disabled="disabled"><?=$list[0]->keluhan_medis_service;?></textarea>
                    </div>
                </div>                                

                <div class="col-md-12">
                    <div class="form-group" style="border-top: 1px solid #9E9E9E;"></div>
                </div>					

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="<?=$list[0]->name_termohon;?>" disabled="disabled">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tempat</label>
                        <input type="text" class="form-control" value="<?=$list[0]->tempat_lahir_termohon;?>" disabled="disabled">
                    </div>
                </div>				

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="text" class="form-control timerange" value="<?=$list[0]->tanggal_lahir_termohon;?>" disabled="disabled">
                    </div>
                </div>				

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Suku</label>
                        <input type="text" class="form-control" value="<?=$list[0]->suku_termohon;?>" disabled="disabled">
                    </div>
                </div>				

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Agama</label>
                        <select class="form-control" id="f_agama" placeholder="Agama" disabled="disabled">
                            <option value="" selected> - - - -</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Pihak Keluarga</label>
                        <input type="text" class="form-control" value="<?=$list[0]->pihak_keluarga_termohon;?>" disabled="disabled">
                    </div>
                </div>				

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kewarganegaraan</label>
                        <select class="form-control" id="f_warganegara" disabled="disabled">
                            <option></option>
                        </select>
                    </div>
                </div>										

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea  class="form-control" disabled="disabled"><?=$list[0]->alamat_termohon;?></textarea>
                    </div>
                </div>
            </div>
        </div><!-- /.box-body -->

        <div class="box-footer">
            <a class="btn btn-success pull-right" id="btn-proses-yes-ksp"><i class="fa fa-save"></i>&nbsp; Disposisi ke KSP</a>
        </div>
    </div><!-- /.box -->
</div>
<div class="col-xs-4">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Usulan</h3>
        </div>
        <hr>
        <div class="box-body">

            <div class="row col-lg-12">

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Data Usulan Team</label>
                        <a class="btn btn-success pull-right" ><i class="fa fa-download"></i>&nbsp; Unduh</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.box -->

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tetapkan Surat</h3>
        </div>
        <hr>
        <div class="box-body">

            <div class="row col-lg-12">

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Surat Penetapan</label>
                        <input type="file" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <a class="btn btn-success pull-right" id="btn-propose"><i class="fa fa-save"></i>&nbsp; Tetapkan</a>
        </div>        
    </div><!-- /.box -->    
</div>  
<?php
}
?>            
<script>
    $(document).ready(function(){        

        $("#btn-proses-yes-ksp").click(function() {
            var data_sender = {
			'remarks' : 'Telah menetapkan surat dan di disposisi ke Kepala Satuan Pelaksana'
		}		
            Lobibox.confirm({
                title: "Konfirmasi",
                msg: "Apakah anda ingin melaporkan desposisi layanan ini ke KSP ?",
                callback: function ($this, type) {
                    if (type === 'yes'){
                        $.ajax({
                            url :"<?php echo site_url();?>forensic_services/next_step/<?=$token;?>/7/",
                            type:"post",
                            data:{data_sender : data_sender},                            
                            beforeSend:function(){
                                $("#loadprosess").modal('show');
                            },
                            success:function(msg){
                                var obj = jQuery.parseJSON (msg);
                                ajax_status(obj);
                            },
                            error:function(jqXHR,exception)
                            {
                                ajax_catch(jqXHR,exception);					
                            }
                        })
                    }
                }
            })           
        })
    });    
</script>