<section id="forensikdata"></section>

<section id="viewdata">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"></h3>
			</div><!-- /.box-header -->
			<div class="box-body" id="table_fill">
				<table class="table table-bordered table-striped table-view">
					<thead>
				<tr>
					<th>No</th>
					<th>Layanan</th>
					<th>Proses Hukum</th>
					<th>Nama Jaksa</th>
					<th>Jabatan Jaksa</th>
					<th>NIP/NRP</th>
					<th>No Telpon</th>
					<th>Email</th>
					<th>Asal Instansi</th>
					<!-- <th>Berkas</th> -->
					<!-- <th>Proses Hukum Yang sedang dijalani</th>
					<th>Berkas (scan)</th>
					<th>Tanggal Pengajuan</th> -->
					<th>Aksi</th>
				</tr>
				</thead>
				<tbody>
					<?php
						if ($list != 0) {
							# code...
							for ($i=0; $i < count($list); $i++) { 
								# code...
					?>
							<tr>
								<td><?=$i+1;?></td>
								<td><?=$list[$i]->name_forensik;?></td>
								<td><?=$list[$i]->name_alur_perkara;?></td>
								<td><?=$list[$i]->name_jaksa;?></td>
								<td><?=$list[$i]->jabatan;?></td>
								<td><?=$list[$i]->nrp;?></td>
								<td><?=$list[$i]->telepon_jaksa;?></td>
								<td><?=$list[$i]->email_jaksa;?></td>
								<!-- <td><?=$list[$i]->token;?></td> -->
								<td></td>
								<td>
									<a class="btn btn-warning col-lg-12" onclick="scheduling('<?=$list[$i]->token;?>')" style="margin:5px;">Beri Jadwal</a>
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

function scheduling(token) {
	$.ajax({
		url :"<?php echo site_url();?>forensic_services/scheduling_process/"+token,
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
			$("#loadprosess").modal('hide');						
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