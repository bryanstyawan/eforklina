<!-- <script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script> -->
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

<section id="viewdata">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"></h3>
				<?php
					if ($this->session->userdata('session_role') == 4) {
						# code...
				?>
				<div class="box-tools pull-right"><button class="btn btn-block btn-primary" id="addData"><i class="fa fa-plus-square"></i> Permohonan Consulting (client)</button></div>
				<?php
					}
				?>				
			</div><!-- /.box-header -->
			<div class="box-body" id="table_fill">
				<table class="table table-bordered table-striped table-view">
					<thead>
				<tr>
					<th>No</th>
					<th>Surat Permohonan Consulting</th>
					<th>Nama, Tempat Tanggal Lahir</th>
					<th>Keluhan Medis</th>
					<th>Berkas (scan)</th>
					<th>Aksi</th>
				</tr>
				</thead>
				<tbody>
					<td>1</td>
					<td>Consulting-01/2019/06-1</td>
					<td>User1. Jakarta, 15 Agustus 1995</td>							
					<td>Stroke</td>
					<td><button class="btn btn-primary btn-xs"><i class="fa fa-download"></i> Unduh Berkas</button>&nbsp;&nbsp;&nbsp;</th>
					<td>
						<button class="btn btn-primary btn-xs col-lg-12" style="margin-bottom:10px;" onclick="timeline(1,0)"><i class="fa fa-edit"></i> Timeline</button>					
						<button class="btn btn-primary btn-xs col-lg-12" style="margin-bottom:10px;"><i class="fa fa-edit"></i> Proses (Tim Forensik)</button>					
						<?php
							if ($this->session->userdata('session_role') == 4) {
								# code...
						?>
							<button class="btn btn-primary btn-xs col-lg-12" style="margin-bottom:10px;"><i class="fa fa-edit"></i> Ubah (Client)</button>
							<button class="btn btn-danger btn-xs col-lg-12"  style="margin-bottom:10px;"><i class="fa fa-trash"></i> Hapus (Client)</button>
						<?php
							}
						?>				
					</td>				
				<?php $x=1;
					if ($list != array()) {
						# code...
						foreach($list->result() as $row){?>
							<tr>
								<td><?php echo $x;?></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>
									<button class="btn btn-primary btn-xs" onclick="edit('<?php echo $row->id;?>')"><i class="fa fa-edit"></i> Ubah</button>&nbsp;&nbsp;&nbsp;
									<button class="btn btn-danger btn-xs" onclick="del('<?php echo $row->id;?>')"><i class="fa fa-trash"></i> Hapus</button>
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
							<label>Surat Permohonan Consulting</label>
							<label class="pull-right">(Nomor surat)</label>							
							<input type="text" class="form-control" id="f_surat" placeholder="Surat Permohonan Assessing">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Tanggal Surat</label>
							<input type="text" class="form-control" id="f_surat" placeholder="Tanggal Surat">
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
							<input type="text" class="form-control timerange" id="f_date" placeholder="Tanggal Lahir">
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
							<input type="text" class="form-control" id="f_agama" placeholder="Agama">
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
							<label>Keluhan Medis Secara Umum (jika ada)</label>
							<textarea  class="form-control" id="f_keluhan" placeholder="Keluhan Medis Secara Umum"></textarea>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Berkas</label>
							<input type="File" class="form-control" id="f_file" placeholder="Berkas">
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
<script>
$(document).ready(function(){
	$("#addData").click(function()
	{
		$(".form-control").val('');
		$("#formdata").css({"display": ""})
		$("#viewdata").css({"display": "none"})
		$("#formdata > div > div > div.box-header > h3").html("Permohonan Consulting");		
		$("#crud").val('insert');
	})

	$(".closeData").click(function(){
		$("#formdata").css({"display": "none"})
		$("#timelinedata").css({"display": "none"})		
		$("#viewdata").css({"display": ""})		
	})

	$("#btn-trigger-controll").click(function(){
        $("#loadprosess").modal('show');        
        Lobibox.notify('info', {msg: 'Proses'});
        $("#loadprosess").modal('hide');        				
		// var res_status = 0;
		// var oid        = $("#oid").val();
		// var crud       = $("#crud").val();
		// var f_username = $("#f_username").val();
		// var f_name     = $("#f_name").val();
		// var f_password = $("#f_password").val();
		// var f_role     = $("#f_role").val();

		// var data_sender = {
		// 	'oid'       : oid,
		// 	'crud'      : crud,
		// 	'f_username': f_username,
		// 	'f_name'    : f_name,
		// 	'f_password': f_password,
		// 	'f_role'    : f_role
		// }

		// if (crud == 'insert') {
		// 	if (f_username.length <= 0 || f_name.length <= 0 || f_password.length <= 0 || f_role.length <= 0) {
		// 		res_status = 0;
		// 		if (f_username.length <= 0) {
		// 			Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
		// 			{
		// 				title: 'Peringatan',					
		// 				msg: "Data Username belum terisi, mohon lengkapi data tersebut"
		// 			});				
		// 		} else if(f_name.length <= 0) {
		// 			Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
		// 			{
		// 				title: 'Peringatan',					
		// 				msg: "Data Nama belum terisi, mohon lengkapi data tersebut"
		// 			});								
		// 		} else if(f_password.length <= 0) {
		// 			Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
		// 			{
		// 				title: 'Peringatan',					
		// 				msg: "Data Password belum terisi, mohon lengkapi data tersebut"
		// 			});								
		// 		} else if(f_role.length <= 0) {
		// 			Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
		// 			{
		// 				title: 'Peringatan',					
		// 				msg: "Data Level Pengguna belum terisi, mohon lengkapi data tersebut"
		// 			});								
		// 		}
		// 	}
		// 	else
		// 	{
		// 		res_status = 1;
		// 	}			
		// }
		// else if(crud == 'update')
		// {
		// 	if (f_username.length <= 0 || f_name.length <= 0 || f_role.length <= 0) {
		// 		res_status = 0;
		// 		if (f_username.length <= 0) {
		// 			Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
		// 			{
		// 				title: 'Peringatan',					
		// 				msg: "Data Username belum terisi, mohon lengkapi data tersebut"
		// 			});				
		// 		} else if(f_name.length <= 0) {
		// 			Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
		// 			{
		// 				title: 'Peringatan',					
		// 				msg: "Data Nama belum terisi, mohon lengkapi data tersebut"
		// 			});								
		// 		} else if(f_role.length <= 0) {
		// 			Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
		// 			{
		// 				title: 'Peringatan',					
		// 				msg: "Data Level Pengguna belum terisi, mohon lengkapi data tersebut"
		// 			});								
		// 		}
		// 	}
		// 	else
		// 	{
		// 		res_status = 1;
		// 	}			
		// }

		// if(res_status == 1)
		// {
		// 	$.ajax({
		// 		url :"<?php echo site_url();?>bank_data/user/store",
		// 		type:"post",
		// 		data:{data_sender : data_sender},
		// 		beforeSend:function(){
		// 			$("#editData").modal('hide');
		// 			$("#loadprosess").modal('show');
		// 		},
		// 		success:function(msg){
		// 			var obj = jQuery.parseJSON (msg);
		// 			ajax_status(obj);
		// 		},
		// 		error:function(jqXHR,exception)
		// 		{
		// 			ajax_catch(jqXHR,exception);					
		// 		}
		// 	})	
		// }
	
	})
})

function timeline(params,id) {
	$(".form-control").val('');
	$("#timelinedata").css({"display": ""})
	$("#viewdata").css({"display": "none"})
	$("#timelinedata > div > div > div.box-header > h3").html("Timeline Consulting");	
}

function edit(id){
	$.ajax({
		url :"<?php echo site_url();?>bank_data/user/get_data/"+id+"/ajax/mr_user",
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
				$("#f_username").val(obj.data[0]['username']);								
				$("#f_name").val(obj.data[0]['name']);				
				$("#f_role").val(obj.data[0]['id_role']);								
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
</script>