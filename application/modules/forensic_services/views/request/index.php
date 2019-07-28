<!-- <script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script> -->
<section id="forensikdata"></section>

<section id="viewdata">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"></h3>
				<?php
					if ($this->session->userdata('_session_role') == 4) {
						# code...
				?>
					<div class="box-tools pull-right"><button class="btn btn-block btn-primary" id="addData"><i class="fa fa-plus-square"></i> Permohonan Assessing (Client)</button></div>				
				<?php
					}
				?>
			</div><!-- /.box-header -->
			<div class="box-body" id="table_fill">
				<table class="table table-bordered table-striped table-view">
					<thead>
				<tr>
					<th>No</th>
					<th>Nama Jaksa</th>
					<th>Jabatan Jaksa</th>
					<th>NIP/NRP</th>
					<th>No Telpon</th>
					<th>Email</th>
					<th>Asal Instansi</th>
					<th>Berkas</th>
					<!-- <th>Proses Hukum Yang sedang dijalani</th>
					<th>Berkas (scan)</th>
					<th>Tanggal Pengajuan</th> -->
					<th>Aksi</th>
				</tr>
				</thead>
				<tbody>
				<?php $x=1;
					if ($list != array()) {
						# code...
						foreach($list->result() as $row){?>
							<tr>
								<td><?php echo $x;?></td>
								<td><?=$row->no_surat;?></td>
								<td><?=$row->nama;?> - <?=$row->tempat;?>, <?=$row->tanggal_lahir;?></td>
								<td><?=$row->pihak_keluarga;?></td>							
								<td><?=$row->identitas_jaksa;?> dan <?=$row->identitas_pengawal	;?></td>
								<td><?=$row->keluhan_medis;?></td>		
								<td></td>
								<td>
									<a href="<?php base_url();?>public/assessing/<?=$row->audit_user_insert;?>/<?=$row->berkas;?>" class="btn btn-success btn-xs col-lg-12"  style="margin:5px;"><i class="fa fa-download"></i> Unduh Dokument 1</a>									
									<br>
									<a href="<?php base_url();?>public/assessing/<?=$row->audit_user_insert;?>/<?=$row->berkas;?>" class="btn btn-success btn-xs col-lg-12"  style="margin:5px;"><i class="fa fa-download"></i> Unduh Dokument 2</a>									
									<br>
									<a href="<?php base_url();?>public/assessing/<?=$row->audit_user_insert;?>/<?=$row->berkas;?>" class="btn btn-success btn-xs col-lg-12"  style="margin:5px;"><i class="fa fa-download"></i> Unduh Dokument 3</a>																																		
								</td>			
								<td>
									<a class="btn btn-success btn-xs col-lg-12"  style="margin:5px;"><i class="fa fa-"></i> Akses Username-Password</a>
									<a class="btn btn-success btn-xs col-lg-12"  style="margin:5px;"><i class="fa fa-"></i> Melapor Ke KSP</a>									
								</td>
							</tr>
						<?php $x++; }						
					}
				?>
				</tbody>
				</table>
				
			</div><!-- /.box-body -->
			</div><!-- /.box -->
	</div>
</section>

<section id="formdata" style="display:none">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"></h3>
				<div class="box-tools pull-right"><button class="btn btn-block btn-danger closeData"><i class="fa fa-close"></i></button></div>				
			</div>
			<div class="box-body">
				<div class="row">
					<input class="form-control" type="hidden" id="oid">
					<input class="form-control" type="hidden" id="crud">					

					<div class="col-md-12">
						<div class="form-group">
							<label>Surat Permohonan Assessing</label>
							<label class="pull-right">(Nomor surat)</label>							
							<input type="text" class="form-control" id="f_surat" placeholder="Surat Permohonan Assessing">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Tanggal Surat</label>
							<input type="text" class="form-control timerange" id="f_tanggal_surat" placeholder="Tanggal Surat">
						</div>
					</div>					

					<div class="col-md-12">
						<div class="form-group" style="border-top: 1px solid #9E9E9E;">
							<h3>Data Termohon</h3>
						</div>
					</div>					

					<div class="col-md-6">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" id="f_name" placeholder="Nama">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Tempat</label>
							<input type="text" class="form-control" id="f_tempat" placeholder="Tempat">
						</div>
					</div>				

					<div class="col-md-6">
						<div class="form-group">
							<label>Tanggal Lahir</label>
							<input type="text" class="form-control timerange" id="f_tanggal_lahir" placeholder="Tanggal Lahir">
						</div>
					</div>				

					<div class="col-md-6">
						<div class="form-group">
							<label>Suku</label>
							<input type="text" class="form-control" id="f_suku" placeholder="Suku">
						</div>
					</div>				

					<div class="col-md-6">
						<div class="form-group">
							<label>Agama</label>
							<select class="form-control" id="f_agama" placeholder="Agama">
								<option value="" selected> - - - -</option>
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Pihak Keluarga</label>
							<input type="text" class="form-control" id="f_keluarga" placeholder="Pihak Keluarga">
						</div>
					</div>				

					<div class="col-md-6">
						<div class="form-group">
							<label>Kewarganegaraan</label>
							<select class="form-control" id="f_warganegara">
								<option></option>
							</select>
						</div>
					</div>										

					<div class="col-md-6">
						<div class="form-group">
							<label>Alamat</label>
							<textarea  class="form-control" id="f_alamat" placeholder="Alamat"></textarea>
						</div>
					</div>									


					<div class="col-md-12">
						<div class="form-group" style="border-top: 1px solid #9E9E9E;">
							<h3>Data Lebih Lanjut</h3>
						</div>
					</div>					



					<div class="col-md-6">
						<div class="form-group">
							<label>Identitas Jaksa</label>
							<input type="text" class="form-control" id="f_jaksa" placeholder="Identitas Jaksa">
						</div>
					</div>					

					<div class="col-md-6">
						<div class="form-group">
							<label>Pengawal Tahanan</label>
							<input type="text" class="form-control" id="f_pengawal" placeholder="Pengawal Tahanan">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Keluhan Medis Secara Umum (jika ada)</label>
							<textarea  class="form-control" id="f_keluhan" placeholder="Keluhan Medis Secara Umum"></textarea>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Proses Hukum Yang Sedang Dijalani</label>
							<textarea  class="form-control" id="f_proses_hukum" placeholder="Proses Hukum Yang Sedang Dijalani"></textarea>
						</div>
					</div>
				</div>

			</div><!-- /.box-body -->
			<div class="box-footer">
				<a class="btn btn-success pull-right" id="btn-trigger-controll"><i class="fa fa-save"></i>&nbsp; Simpan</a>
			</div>
		</div><!-- /.box -->
	</div>
</section>

<section id="uploaddata" style="display:none">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"></h3>
				<div class="box-tools pull-right"><button class="btn btn-block btn-danger closeData"><i class="fa fa-close"></i></button></div>				
			</div>
			<div class="box-body">
				<div class="row">					
					<div class="col-md-6">
						<div class="form-group">
							<label>Berkas</label>
							<input type="file" class="form-control" id="f_file" placeholder="Berkas">
						</div>
					</div>																				
				</div>

			</div><!-- /.box-body -->
			<div class="box-footer">
				<a class="btn btn-success pull-right" id="btn-upload"><i class="fa fa-upload"></i>&nbsp; Unggah</a>
			</div>
		</div><!-- /.box -->
	</div>
</section>

<section id="timelinedata" style="display:none">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"></h3>
				<div class="box-tools pull-right"><button class="btn btn-block btn-danger closeData"><i class="fa fa-close"></i></button></div>				
			</div>
			<div class="box-body">
				<ul class="timeline">

					<?php
						if ($timeline != array()) {
							# code...
							for ($i=0; $i < count($timeline); $i++) { 
								# code...
					?>
					<li class="time-label">
						<span class="bg-red">
							<?=date('Y-m-d');?>
						</span>
					</li>
					<li>
						<i class="fa fa-envelope bg-blue"></i>
						<div class="timeline-item">
							<span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

							<h3 class="timeline-header"><a href="#"><?=$timeline[$i]['actor'];?></a> ...</h3>

							<div class="timeline-body">
								<?=$timeline[$i]['name'];?>
							</div>

							<!-- <div class="timeline-footer">
								<a class="btn btn-primary btn-xs">...</a>
							</div> -->
						</div>
					</li>					
					<?php
							}
						}
					?>
				</ul>

			</div><!-- /.box-body -->
			<div class="box-footer">

			</div>
		</div><!-- /.box -->
	</div>
</section>
<script>
$(document).ready(function(){
	$("#addData").click(function()
	{
		$(".form-control").val('');
		$("#formdata").css({"display": ""})
		$("#viewdata").css({"display": "none"})
		$("#formdata > div > div > div.box-header > h3").html("Permohonan Assessing");		
		$("#crud").val('insert');
	})	

	$("#btn-trigger-controll").click(function(){
        $("#loadprosess").modal('show');        
        Lobibox.notify('info', {msg: 'Proses'});
        $("#loadprosess").modal('hide');        				
		var res_status = 0;
		var oid                 = $("#oid").val();
		var crud                = $("#crud").val();
		var f_surat             = $("#f_surat").val();
		var f_tanggal_surat     = $("#f_tanggal_surat").val();
		var f_name              = $("#f_name").val();
		var f_tempat            = $("#f_tempat").val();
		var f_tanggal_lahir     = $("#f_tanggal_lahir").val();
		var f_suku              = $("#f_suku").val();
		var f_agama             = $("#f_agama").val();
		var f_keluarga          = $("#f_keluarga").val();
		var f_warganegara       = $("#f_warganegara").val();										
		var f_alamat            = $("#f_alamat").val();
		var f_jaksa             = $("#f_jaksa").val();
		var f_pengawal          = $("#f_pengawal").val();
		var f_keluhan           = $("#f_keluhan").val();
		var f_proses_hukum      = $("#f_proses_hukum").val();								


		var data_sender = {
			'oid'       			: oid,
			'crud'      			: crud,
			'f_surat'				: f_surat,
			'f_tanggal_surat'    	: f_tanggal_surat,
			'f_name'				: f_name,
			'f_tempat'    			: f_tempat,
			'f_tanggal_lahir' 		: f_tanggal_lahir,
			'f_suku' 				: f_suku,
			'f_agama' 				: f_agama,
			'f_keluarga' 			: f_keluarga,
			'f_warganegara' 		: f_warganegara,
			'f_alamat' 				: f_alamat,
			'f_jaksa' 				: f_jaksa,
			'f_pengawal' 			: f_pengawal,
			'f_keluhan' 			: f_keluhan,
			'f_proses_hukum' 		: f_proses_hukum
		}

		if (crud == 'insert') 
		{
			res_status = 1;			
			// if (f_username.length <= 0 || f_name.length <= 0 || f_password.length <= 0 || f_role.length <= 0) {
			// 	res_status = 0;
			// 	if (f_username.length <= 0) {
			// 		Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
			// 		{
			// 			title: 'Peringatan',					
			// 			msg: "Data Username belum terisi, mohon lengkapi data tersebut"
			// 		});				
			// 	} else if(f_name.length <= 0) {
			// 		Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
			// 		{
			// 			title: 'Peringatan',					
			// 			msg: "Data Nama belum terisi, mohon lengkapi data tersebut"
			// 		});								
			// 	} else if(f_password.length <= 0) {
			// 		Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
			// 		{
			// 			title: 'Peringatan',					
			// 			msg: "Data Password belum terisi, mohon lengkapi data tersebut"
			// 		});								
			// 	} else if(f_role.length <= 0) {
			// 		Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
			// 		{
			// 			title: 'Peringatan',					
			// 			msg: "Data Level Pengguna belum terisi, mohon lengkapi data tersebut"
			// 		});								
			// 	}
			// }
			// else
			// {
			// 	res_status = 1;
			// }			
		}
		else if(crud == 'update')
		{
			res_status = 1;
			// if (f_username.length <= 0 || f_name.length <= 0 || f_role.length <= 0) {
			// 	res_status = 0;
			// 	if (f_username.length <= 0) {
			// 		Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
			// 		{
			// 			title: 'Peringatan',					
			// 			msg: "Data Username belum terisi, mohon lengkapi data tersebut"
			// 		});				
			// 	} else if(f_name.length <= 0) {
			// 		Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
			// 		{
			// 			title: 'Peringatan',					
			// 			msg: "Data Nama belum terisi, mohon lengkapi data tersebut"
			// 		});								
			// 	} else if(f_role.length <= 0) {
			// 		Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
			// 		{
			// 			title: 'Peringatan',					
			// 			msg: "Data Level Pengguna belum terisi, mohon lengkapi data tersebut"
			// 		});								
			// 	}
			// }
			// else
			// {
			// 	res_status = 1;
			// }			
		}

		if(res_status == 1)
		{
			$.ajax({
				url :"<?php echo site_url();?>assessing/store",
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
		}
	
	})

	$("#btn-upload").click(function(){
		var oid        = $("#oid").val();		
		f_file         = $('#f_file').prop('files')[0];
		var form_data  = new FormData();
		form_data.append('file', f_file);
		$.ajax({
			url: '<?php echo site_url();?>assessing/upload/'+oid, // point to server-side PHP script
			// dataType: 'json',  // what to expect back from the PHP script, if anything
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			type: 'post',
			beforeSend:function(){
				$("#loadprosess").modal('show');
				Lobibox.notify('info', {
					msg: 'Menyiapkan data untuk upload file'
				});
			},
			success: function(msg1){
				var obj = jQuery.parseJSON (msg1);
				ajax_status(obj);				
			},
			error:function(jqXHR,exception)
			{
				ajax_catch(jqXHR,exception);					
			}
		});		
	})	
})

function timeline(params,id) {
	$(".form-control").val('');
	$("#timelinedata").css({"display": ""})
	$("#viewdata").css({"display": "none"})
	$("#timelinedata > div > div > div.box-header > h3").html("Timeline Assessing");	
}

function edit(id){
	$.ajax({
		url :"<?php echo site_url();?>assessing/get_data/"+id+"/ajax/mr_assessing",
		type:"post",
		beforeSend:function(){
			$("#loadprosess").modal('show');
		},
		success:function(msg){
			var obj = jQuery.parseJSON (msg);
			if (obj.status == 1)
			{
				$(".form-control").val('');
				$("#formdata").css({"display": ""})
				$("#viewdata").css({"display": "none"})
				$("#formdata > div > div > div.box-header > h3").html("Ubah Data Pengguna");		
				$("#crud").val('update');
				$("#oid").val(obj.data[0]['id']);

				$("#f_surat").val(obj.data[0]['no_surat']);
				$("#f_tanggal_surat").val(convertDate(obj.data[0]['tanggal_surat']));
				$("#f_name").val(obj.data[0]['nama']);
				$("#f_tempat").val(obj.data[0]['tempat']);
				$("#f_tanggal_lahir").val(convertDate(obj.data[0]['tanggal_lahir']));
				$("#f_suku").val(obj.data[0]['suku']);
				$("#f_agama").val(obj.data[0]['agama']);
				$("#f_keluarga").val(obj.data[0]['keluarga']);
				$("#f_warganegara").val(obj.data[0]['id_kewarganegaraan']);										
				$("#f_alamat").val(obj.data[0]['alamat']);
				$("#f_jaksa").val(obj.data[0]['identitas_jaksa']);
				$("#f_pengawal").val(obj.data[0]['identitas_pengawal']);
				$("#f_keluhan").val(obj.data[0]['keluhan_medis']);
				$("#f_proses_hukum").val(obj.data[0]['proses_hukum']);								
				$("#loadprosess").modal('hide');				
			}
			else
			{
				Lobibox.notify('warning',{msg: obj.text});
				setTimeout(function(){
					$("#loadprosess").modal('hide');
				}, 500);
			}						
		},
		error:function(jqXHR,exception)
		{
			ajax_catch(jqXHR,exception);					
		}
	})
}

function upload(id) {
	$(".form-control").val('');
	$("#uploaddata").css({"display": ""})
	$("#viewdata").css({"display": "none"})
	$("#uploaddata > div > div > div.box-header > h3").html("Unggah Dokumen Permohonan Assessing");		
	$("#crud").val('insert');	
	$("#oid").val(id);	
}

function del(id)
{					
	Lobibox.confirm({
		title   : "Konfirmasi",
		msg     : "Anda yakin akan menghapus data ini ?",
		callback: function ($this, type) {
			if (type === 'yes'){			
				$.ajax({
					url :"<?php echo site_url();?>bank_data/user/store/"+'delete/'+id,
					type:"post",
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
			}
		}
	})		
}

function proses(id) {
	$.ajax({
		url :"<?php echo site_url();?>assessing/proses_1/"+id,
		type:"post",
		beforeSend:function(){
			$("#loadprosess").modal('show');
			$("#forensikdata").html('');			
		},
		success:function(msg){
			$(".form-control").val('');
			$("#forensikdata").html(msg);			
			$("#forensikdata").css({"display": ""})
			$("#viewdata").css({"display": "none"})
			$("#forensikdata > div > div > div.box-header > h3").html("Verifikasi Permohonan Assessing");		
			$("#loadprosess").modal('hide');						
		},
		error:function(jqXHR,exception)
		{
			ajax_catch(jqXHR,exception);					
		}
	});	
}

function proses_direktur(id) {
	$.ajax({
		url :"<?php echo site_url();?>assessing/proses_permintaan_layanan_direktur/"+id,
		type:"post",
		beforeSend:function(){
			$("#loadprosess").modal('show');
			$("#forensikdata").html('');			
		},
		success:function(msg){
			$(".form-control").val('');
			$("#forensikdata").html(msg);			
			$("#forensikdata").css({"display": ""})
			$("#viewdata").css({"display": "none"})
			$("#forensikdata > div > div > div.box-header > h3").html("Permintaan Layanan Assessing");		
			$("#loadprosess").modal('hide');						
		},
		error:function(jqXHR,exception)
		{
			ajax_catch(jqXHR,exception);					
		}
	});	
}
</script>