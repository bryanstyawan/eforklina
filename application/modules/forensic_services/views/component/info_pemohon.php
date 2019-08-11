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