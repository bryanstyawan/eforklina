<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Usulan Team</h3>
    </div>

    <div class="box-body" id="list_doc">
        <?php
            if ($set_team == 'on') {
                # code...
        ?>
            <div class="col-lg-12" style="margin-bottom: 10px;">
                <div class="col-lg-12">
                    <div class="pull-right"><a class="btn btn-success" id="btn_choose_doc">Pilih Dokter</a></div>
                </div>
            </div>                                    
        <?php
            }
        ?>                                             

        <table class="table table-bordered table-striped" id="table-view-child">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Dokter</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if ($dokter != 0) {
                        # code...
                        for ($i=0; $i < count($dokter); $i++) { 
                            # code...
                ?>
                            <tr id="tr_<?=$dokter[$i]->id_team_dokter;?>">
                                <td><?=$i+1;?></td>
                                <td><?=$dokter[$i]->name_dokter;?></td>
                                <td>
                                    <?php
                                        if ($set_team == 'on') {
                                            # code...
                                    ?>
                                    <a id="btn_delete_<?=$dokter[$i]->id_team_dokter;?>" class="btn btn-danger" onclick="del('<?=$dokter[$i]->id_team_dokter;?>','<?=$token;?>')"><i class="fa fa-delete"></i> Hapus</a>                                    
                                    <?php
                                        }
                                    ?>                                     
                                </td>
                            </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>

    <div id="list_doc_dac"></div>
</div>
<script>
function del(id,token)
{					
    $.ajax({
        url :"<?php echo site_url();?>forensic_services/delete_team_dokter/"+id+'/'+token,
        type:"post",
        beforeSend:function(){
            $("#editData").modal('hide');
            $("#loadprosess").modal('show');
            $('#btn_delete_'+id).prop('disabled', true);                        
            $('#tr_'+id).css({'background-color': '#dd4b39'});            
        },
        success:function(msg){
            var obj = jQuery.parseJSON (msg);
            ajax_status(obj,'no-refresh');
            $('#tr_'+id).css({'display': 'none'}); //The specific CSS changes after the first one, are, of course, just examples.
        },
        error:function(jqXHR,exception)
        {
            $('#btn_delete_'+id).prop('disabled', false);                        
            $('#tr_'+id).css({'background-color': ''});            
            ajax_catch(jqXHR,exception);					
        }
    })
}        
    $(document).ready(function(){

        $("#btn_choose_doc").click(function(){
            $.ajax({
                url :"<?php echo site_url();?>forensic_services/get_data_doc_status/"+'<?=$token;?>/'+'D',
                type:"post",
                beforeSend:function(){
                    $("#loadprosess").modal('show');
                    $("#list_doc").css({'display': 'none'});
                },
                success:function(msg){
                    $("#loadprosess").modal('hide');                    
                    $("#list_doc_dac").html(msg);
                },
                error:function(jqXHR,exception)
                {
                    $('#btn_delete_'+id).prop('disabled', false);                        
                    $('#tr_'+id).css({'background-color': ''});            
                    ajax_catch(jqXHR,exception);					
                }
            })
        })

        $("#table-view-child").DataTable({
            "oLanguage": {
                "sSearch"    : "Pencarian :",
                "sInfoEmpty" : "",
                "sLengthMenu": "Show _MENU_ entries",
                "oPaginate"  : {
                    "sFirst"   : "Halaman Pertama",       // This is the link to the first page
                    "sPrevious": "Halaman Sebelumnya",    // This is the link to the previous page
                    "sNext"    : "Halaman Selanjutnya",   // This is the link to the next page
                    "sLast"    : "Halaman Terakhir"       // This is the link to the last page
                },
                "sSearchPlaceholder": "Ketik untuk mencari",
                "sLengthMenu"       : "Menampilkan &nbsp; _MENU_ &nbsp;Data",
                "sInfo"             : "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "sZeroRecords"      : "Data tidak ditemukan"
            },
            "dom": "<'row'<'col-sm-6'f><'col-sm-6'l>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            "bSort": false

            // "dom": '<"top"f>rt'
            // "dom": '<"top"fl>rt<"bottom"ip><"clear">'
        });        
    });        
</script>