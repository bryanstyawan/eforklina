<?php
if ($list != array()) {
    # code...
?>
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"></h3>
            <div class="box-tools pull-right"><button class="btn btn-block btn-danger closeData"><i class="fa fa-close"></i></button></div>				
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <input class="form-control" type="hidden" id="oid" value="<?=$list[0]['id'];?>">                    
                    <div class="form-group">
                        <label>Surat Permohonan Assessing</label>
                        <label class="pull-right">(Nomor surat)</label>							
                        <input type="text" class="form-control" id="f_surat" placeholder="Surat Permohonan Assessing" value="<?=$list[0]['no_surat'];?>" disabled="disabled">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal Surat</label>
                        <input type="text" class="form-control timerange" id="f_tanggal_surat" placeholder="Tanggal Surat" value="<?=$list[0]['tanggal_surat'];?>" disabled="disabled">
                    </div>
                </div>					

                <div class="col-md-12">
                    <div class="form-group" style="border-top: 1px solid #9E9E9E;">
                        <h3>Data Termohon</h3>
                    </div>
                </div>					

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" id="f_name" placeholder="Nama" value="<?=$list[0]['nama'];?>" disabled="disabled">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tempat</label>
                        <input type="text" class="form-control" id="f_tempat" placeholder="Tempat" value="<?=$list[0]['tempat'];?>" disabled="disabled">
                    </div>
                </div>				

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="text" class="form-control timerange" id="f_tanggal_lahir" placeholder="Tanggal Lahir" value="<?=$list[0]['tanggal_lahir'];?>" disabled="disabled">
                    </div>
                </div>				

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Suku</label>
                        <input type="text" class="form-control" id="f_suku" placeholder="Suku" value="<?=$list[0]['suku'];?>" disabled="disabled">
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
                        <input type="text" class="form-control" id="f_keluarga" placeholder="Pihak Keluarga" value="<?=$list[0]['pihak_keluarga'];?>" disabled="disabled">
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

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea  class="form-control" id="f_alamat" placeholder="Alamat" disabled="disabled"><?=$list[0]['alamat'];?></textarea>
                    </div>
                </div>									


                <div class="col-md-12">
                    <div class="form-group" style="border-top: 1px solid #9E9E9E;">
                        <h3>Data Lebih Lanjut</h3>
                    </div>
                </div>					



                <div class="col-md-6">
                    <div class="form-group">
                        <label>Identitas Jaksa</label>
                        <input type="text" class="form-control" id="f_jaksa" placeholder="Identitas Jaksa" value="<?=$list[0]['identitas_jaksa'];?>" disabled="disabled">
                    </div>
                </div>					

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Pengawal Tahanan</label>
                        <input type="text" class="form-control" id="f_pengawal" placeholder="Pengawal Tahanan" value="<?=$list[0]['identitas_pengawal'];?>" disabled="disabled">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Keluhan Medis Secara Umum (jika ada)</label>
                        <textarea  class="form-control" id="f_keluhan" placeholder="Keluhan Medis Secara Umum" disabled="disabled"><?=$list[0]['keluhan_medis'];?></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Proses Hukum Yang Sedang Dijalani</label>
                        <textarea  class="form-control" id="f_proses_hukum" placeholder="Proses Hukum Yang Sedang Dijalani" disabled="disabled"><?=$list[0]['proses_hukum'];?></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">                        
                        <a href="<?php base_url();?>public/assessing/<?=$list[0]['audit_user_insert'];?>/<?=$list[0]['berkas'];?>" class="btn btn-success"><i class="fa fa-download"></i> Unduh Berkas</a>
                    </div>
                </div>                
            </div>

        </div><!-- /.box-body -->
        <div class="box-footer">
            <a class="btn btn-success pull-right" id="btn-proses-1"><i class="fa fa-save"></i>&nbsp; Melapor Ke Direktur</a>
        </div>
    </div><!-- /.box -->
</div>
<?php
}
?>

<script>
    $(document).ready(function(){        

        $(".closeData").click(function(){
            $("#formdata").css({"display": "none"})
            $("#timelinedata").css({"display": "none"})
            $("#forensikdata").css({"display": "none"})				
            $("#viewdata").css({"display": ""})		
        })

        $("#btn-proses-1").click(function() {
            var id =$("#oid").val();		
            Lobibox.confirm({
                title: "Konfirmasi",
                msg: "Pastikan data yang akan diajukan telah benar",
                callback: function ($this, type) {
                    if (type === 'yes'){
                        $.ajax({
                            url :"<?php echo site_url();?>assessing/proses_2/"+id,
                            type:"post",
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