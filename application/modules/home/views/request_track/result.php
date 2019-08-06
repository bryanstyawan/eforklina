<?php
    if ($list != array()) {
        # code...
?>
    <div class="card text-center"">
        <div class=" card-header success-color white-text"></div>
        <div class="card-body">
            <h4 class="card-title">Data token <?=$list[0]['token'];?> ditemukan.</h4>
            <a class="btn btn-success btn-sm" href="<?=base_url();?>home/route/<?=$list[0]['token'];?>">Klik Disini</a> untuk melanjutkan proses anda.
        </div>
        <div class="card-footer text-muted success-color white-text"></div>
    </div>
<?php
    }
    else {
        # code...
?>
    <div class="card text-center"">
        <div class=" card-header danger-color white-text"></div>
        <div class="card-body">
            <h4 class="card-title">Opps, Data tidak ditemukan.</h4>

        </div>
        <div class="card-footer text-muted danger-color white-text"></div>
    </div>
<?php
    }
?>