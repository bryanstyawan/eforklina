    <div class="box-body" id="list_doc">
        <div class="col-lg-12" style="margin-bottom: 10px;">
            <div class="col-lg-12">
                <div class="pull-right">
                    <a class="btn <?=($label == 'A') ? 'btn-success' : 'btn-danger';?>" id="btn_back_doc"><?=($label == 'A') ? 'Pilih Dokter' : 'Kembali';?></a>
                </div>
            </div>
        </div>                                             

        <table class="table table-bordered table-striped" id="table-view-child1">
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
                            $text_label = "";
                            if ($label == 'D') {
                                # code...
                                $text_label = "Pilih";
                            }
                            else
                            {
                                $text_label = "Hapus";
                            }
                ?>
                            <tr id="tr_<?=$dokter[$i]->id_team_dokter;?>">
                                <td><?=$i+1;?></td>
                                <td><?=$dokter[$i]->name_dokter;?></td>
                                <td>
                                <a id="btn_update_<?=$dokter[$i]->id_team_dokter;?>" class="btn <?=($label == 'A') ? 'btn-danger' : 'btn-success';?>" onclick="choose('<?=$dokter[$i]->id_team_dokter;?>','<?=$token;?>')"><i class="fa fa-delete"></i> <?=$text_label;?></a>                                     
                                </td>
                            </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
<script>
function choose(id,token)
{					
    $.ajax({
        url :"<?php echo site_url();?>forensic_services/update_team_dokter/"+id+'/'+token,
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
        $("#btn_back_doc").click(function () {
            var status = ('<?=$label;?>' == 'A')? 'D' : 'A' ;
            
            // if (status == 'A') {
            //     status = 'D';
            // } else {
            //     status = 'A';                
            // }
            $.ajax({
                url :"<?php echo site_url();?>forensic_services/get_data_doc_status/"+'<?=$token;?>/'+status,
                type:"post",
                beforeSend:function(){
                    $("#loadprosess").modal('show');
                    $("#list_doc_dac").css({'display': 'none'});
                },
                success:function(msg){
                    $("#loadprosess").modal('hide');                    
                    $("#list_doc").css({'display': ''});                    
                    $("#list_doc").html(msg);
                },
                error:function(jqXHR,exception)
                {
                    $('#btn_delete_'+id).prop('disabled', false);                        
                    $('#tr_'+id).css({'background-color': ''});            
                    ajax_catch(jqXHR,exception);					
                }
            })            
        })

        $("#table-view-child1").DataTable({
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
    })
</script>    