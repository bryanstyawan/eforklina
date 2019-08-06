<div class="card p-5">
    <h3 class="card-header light-blue lighten-1 white-text text-uppercase font-weight-bold text-center py-5">Info Pemohon</h3>
    <div class="card-body">
        <?php
            if ($info != 0) 
            {
                # code...
        ?>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Nama Jaksa
                    <span class="badge badge-primary badge-pill"><?=$info[0]->nama;?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Jabatan Jaksa
                    <span class="badge badge-primary badge-pill"><?=$info[0]->jabatan;?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    NRP/NIP Jaksa
                    <span class="badge badge-primary badge-pill"><?=$info[0]->nrp;?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Telepon
                    <span class="badge badge-primary badge-pill"><?=$info[0]->telepon;?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Email
                    <span class="badge badge-primary badge-pill"><?=$info[0]->email;?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Asal Instansi
                    <span class="badge badge-primary badge-pill"><?=$info[0]->name_instansi;?></span>
                </li>                    
            </ul>                        
        <?php
            } 
            else 
            {
                # code...
            }
            
        ?>
    </div>
</div>