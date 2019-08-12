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
                    <label>Nama Pengawal Tahanan</label>
                    <input type="text" class="form-control timerange" value="<?=$list[0]->identitas_pengawal_service;?>" disabled="disabled">
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

    </div>
    
</div><!-- /.box -->

