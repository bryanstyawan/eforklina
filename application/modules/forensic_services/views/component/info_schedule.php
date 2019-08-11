<?php
    $text_disabled = "";
    if ($set_schedule == 'off') {
        # code...
        $text_disabled = "disabled='disabled'";
    }
?>

<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Jadwal</h3>
    </div>

    <div class="box-body">
        <div id="calendar" class="fc fc-unthemed fc-ltr"></div>

            <div class="row col-lg-12">

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" class="form-control timerange" id="f_date_scheduling" value="<?=$list[0]->date_scheduling;?>" <?=$text_disabled;?>>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Prioritas</label>
                        <select class="form-control" id="f_priority" <?=$text_disabled;?>>
                            <option>- - - Pilih Salah Satu - - -</option>
                            <?php
                                if ($priority != array()) {
                                    # code...
                                    for ($i=0; $i < count($priority); $i++) { 
                                        # code...
                            ?>
                                    <option value="<?=$priority[$i]['id'];?>" <?=($priority[$i]['id'] == $list[0]->id_priority) ? 'selected' : '' ;?>><?=$priority[$i]['name'];?></option>                                                    
                            <?php
                                    }
                                } 
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" id="f_remarks_scheduling" <?=$text_disabled;?>><?=$list[0]->remarks_scheduling;?></textarea>
                    </div>
                </div>                
            </div>     
    </div>

    <?php
        if ($set_schedule == 'on') {
            # code...
    ?>    
        <div class="box-footer">
            <a class="btn btn-success pull-right" id="btn-propose"><i class="fa fa-save"></i>&nbsp; Tetapkan</a>
        </div>
    <?php
        }
    ?>     
</div>    

<?php
$data_calendar = array();
if ($events != 0) {
    # code...
    for ($i=0; $i < count($events); $i++) { 
        # code...
        $data_calendar[$i] = array
                            (
                                'title'           => $events[$i]->remarks_scheduling,
                                'start'           => $events[$i]->date_scheduling,
                                'backgroundColor' => '#f56954',
                                'borderColor'     => '#f56954' 
                            );
    }    
}
$data_calendar = json_encode($data_calendar);
?>
<script>
    $(document).ready(function(){        
        var get_data_calendar = jQuery.parseJSON ('<?=$data_calendar;?>');
        const data_calendarArray = Object.keys(get_data_calendar).map(i => get_data_calendar[i])        
        $('#calendar').fullCalendar({
            header    : {
                left  : 'prev,next today',
                center: 'title',
                right : 'month'
            },
            buttonText: {
                today: 'Lihat jadwal bulan ini',
                month: 'Bulan'
            },
            //Random default events
            events    : data_calendarArray
        })

        $('.timerange').datepicker({
            maxDate: new Date,
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            daysOfWeekHighlighted: "0,6"
        });

        $(".timerange").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});                

        $("#btn-propose").click(function(){
            var f_date_scheduling    = $("#f_date_scheduling").val();
            var f_priority           = $("#f_priority").val();						
            var f_remarks_scheduling = $("#f_remarks_scheduling").val(); 		


            var data_sender = {
                'f_date_scheduling'     : f_date_scheduling,
                'f_priority' 			: f_priority,
                'f_remarks_scheduling'  : f_remarks_scheduling 
            }

            $.ajax({
                url :"<?php echo site_url();?>forensic_services/set_scheduling/<?=$token;?>",
                type:"post",
                data:{data_sender : data_sender},
                beforeSend:function(){
                    $("#editData").modal('hide');
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
        
        })                
    });
</script>