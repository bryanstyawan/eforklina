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
    <h3 class="col-lg-11 pull-left">Verifikasi Permohonan Layanan</h3>
    <div class="col-lg-1 pull-right"><button class="btn btn-block btn-danger closeData"><i class="fa fa-close"></i></button></div>
</div>
<?php
// die();
if ($list != 0) {
    # code...
?>
<div class="col-xs-5">
    <?=$this->load->view('forensic_services/component/info_pemohon',$list);?>    
</div>
<div class="col-xs-6">
    <?=$this->load->view('forensic_services/component/info_berkas',$files);?>   
    <a class="btn btn-success pull-right" id="btn-proses-yes-ksp"><i class="fa fa-save"></i>&nbsp; Selesai</a>     
</div>  
<?php
}
?>            
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
                    Lobibox.notify('info', {
                        msg: 'Menyiapkan data untuk unggah file'
                    });                    
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
            $(".progress_load").modal('show');
            Lobibox.notify('info', {
                msg: 'Harap pilih file terlebih dahulu sebelum melakukan unggah file.'
            });                                
        }
    }    
    
        
    $(document).ready(function(){        

        $("#btn-proses-yes-ksp").click(function() {
            var data_sender = {
			'remarks' : 'Telah memverifikasi berkas, memberi hak akses dan meneruskan ke tahap selanjutnya'
		}		
            Lobibox.confirm({
                title: "Konfirmasi",
                msg: "Lanjut ke tahap berikutnya ?",
                callback: function ($this, type) {
                    if (type === 'yes'){
                        $.ajax({
                            url :"<?php echo site_url();?>forensic_services/next_step/<?=$token;?>/5/",
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