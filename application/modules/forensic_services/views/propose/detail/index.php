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
    <h3 class="col-lg-11 pull-left">Usulkan Team</h3>
    <div class="col-lg-1 pull-right"><button class="btn btn-block btn-danger closeData"><i class="fa fa-close"></i></button></div>
</div>
<?php
if ($list != 0) {
    # code...
?>
<div class="col-xs-6">
    <?=$this->load->view('forensic_services/component/info_pemohon',$list);?>
</div>
<div class="col-xs-6">
    <?=$this->load->view('forensic_services/component/info_termohon',$list);?>
</div>
<div class="col-xs-6">
    <?=$this->load->view('forensic_services/component/info_schedule',array('list'=>$list,'priority'=>$priority,'events'=>$events,'set_schedule'=>'off'));?>
</div>  
<div class="col-xs-6">
    <?=$this->load->view('forensic_services/component/info_team',array('dokter'=>$dokter,'set_team'=>'on'));?>    
    <div class="col-lg-12">
        <a class="btn btn-success pull-right" id="btn-proses-yes-ksp"><i class="fa fa-save"></i>&nbsp; Selesai</a>        
    </div>    
</div>
<?php
}
?>            
<script>
    $(document).ready(function(){        

        $("#btn-proses-yes-ksp").click(function() {
            var data_sender = {
			'remarks' : 'Telah memberikan usulan team'
		}		
            Lobibox.confirm({
                title: "Konfirmasi",
                msg: "Apakah anda ingin melaporkan permintaan layanan ini ke Kepala Bidang ?",
                callback: function ($this, type) {
                    if (type === 'yes'){
                        $.ajax({
                            url :"<?php echo site_url();?>forensic_services/next_step/<?=$token;?>/8/",
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