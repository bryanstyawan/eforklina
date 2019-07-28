<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
ERROR - 2019-06-12 08:52:13 --> Query error: Table 'sisforklina.mr_video' doesn't exist - Invalid query: SELECT DISTINCT b.name,
								COUNT(a.id_user_sender) as counter,
								a.id_user_sender,
								a.id_materi,
								d.name as materi
				FROM tr_chat a
				LEFT JOIN mr_user b
				ON a.id_user_sender = b.id
				LEFT JOIN mr_video c
				ON a.id_materi = c.id_materi
				LEFT JOIN mr_materi d
				ON c.id_materi = d.id				
				
				GROUP BY a.id_materi, a.id_user_sender, b.name
		
ERROR - 2019-06-12 08:54:10 --> Query error: Table 'sisforklina.mr_materi' doesn't exist - Invalid query: SELECT DISTINCT b.name,
								COUNT(a.id_user_sender) as counter,
								a.id_user_sender,
								a.id_materi,
								d.name as materi
				FROM tr_chat a
				LEFT JOIN mr_user b
				ON a.id_user_sender = b.id
--				LEFT JOIN mr_video c
--				ON a.id_materi = c.id_materi
				LEFT JOIN mr_materi d
				ON c.id_materi = d.id				
				
				GROUP BY a.id_materi, a.id_user_sender, b.name
		
ERROR - 2019-06-12 09:10:37 --> Severity: Notice --> Undefined variable: user_chat C:\xampp\htdocs\sisforklina\application\modules\dashboard\views\vdashboard.php 38
