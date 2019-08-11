   <div class="box">
        <div class="box-header">
            <h3 class="box-title">Berkas</h3>
        </div>
        <hr>
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Berkas</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    if ($files != 0) {
                        # code...
                        for ($i=0; $i < count($files); $i++) { 
                            # code...
                ?>
                            <tr>
                                <td><?=$i+1;?></td>
                                <td><?=$files[$i]->name_file_general;?></td>
                                <td><a target="_blank" href="<?=base_url();?>public/request/<?=$files[$i]->token.'/'.$files[$i]->file;?>" class="btn btn-primary"><i class="fa fa-download"></i> Unduh</a></td>
                                <td></td>
                                <td>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="data_upload_<?=$files[$i]->id_request_file;?>" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="data_upload_<?=$files[$i]->id_request_file;?>">Pilih Berkas</label>
                                        </div>
                                    </div>    
                                    <button class="btn btn-secondary ml-0" onclick="upload_data('<?=$files[$i]->id_request_file;?>','<?=$token;?>')" data-toggle="modal" type="button" ><i class="fa fa-upload mr-2"></i> Unggah Berkas</button>                                    
                                    <!-- <a class="btn btn-success"><i></i> Berkas telah sesuai</a>
                                    <a class="btn btn-danger"><i></i> Berkas tidak sesuai</a>                         -->
                                </td>
                            </tr>                
                <?php
                        }
                    }
                ?>
            </tbody>
            </table>    
        </div><!-- /.box-body -->
    </div><!-- /.box -->