<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-05-29 04:34:46 --> 404 Page Not Found: /index
ERROR - 2019-05-29 04:35:07 --> 404 Page Not Found: /index
ERROR - 2019-05-29 04:37:34 --> 404 Page Not Found: /index
ERROR - 2019-05-29 04:37:47 --> 404 Page Not Found: /index
ERROR - 2019-05-29 04:37:49 --> 404 Page Not Found: /index
ERROR - 2019-05-29 04:37:50 --> 404 Page Not Found: /index
ERROR - 2019-05-29 04:37:52 --> 404 Page Not Found: /index
ERROR - 2019-05-29 04:37:56 --> 404 Page Not Found: /index
ERROR - 2019-05-29 04:37:59 --> 404 Page Not Found: /index
ERROR - 2019-05-29 04:42:43 --> 404 Page Not Found: /index
ERROR - 2019-05-29 04:44:08 --> 404 Page Not Found: /index
ERROR - 2019-05-29 04:45:57 --> 404 Page Not Found: /index
ERROR - 2019-05-29 04:47:56 --> 404 Page Not Found: /index
ERROR - 2019-05-29 04:48:53 --> 404 Page Not Found: /index
ERROR - 2019-05-29 04:52:53 --> 404 Page Not Found: /index
ERROR - 2019-05-29 04:53:28 --> 404 Page Not Found: /index
ERROR - 2019-05-29 04:55:07 --> 404 Page Not Found: /index
ERROR - 2019-05-29 05:03:53 --> 404 Page Not Found: /index
ERROR - 2019-05-29 05:04:49 --> 404 Page Not Found: /index
ERROR - 2019-05-29 05:05:22 --> 404 Page Not Found: /index
ERROR - 2019-05-29 05:05:32 --> 404 Page Not Found: /index
ERROR - 2019-05-29 05:05:41 --> 404 Page Not Found: /index
ERROR - 2019-05-29 05:05:44 --> 404 Page Not Found: /index
ERROR - 2019-05-29 05:05:46 --> 404 Page Not Found: /index
ERROR - 2019-05-29 05:06:03 --> 404 Page Not Found: /index
ERROR - 2019-05-29 05:06:12 --> 404 Page Not Found: /index
ERROR - 2019-05-29 05:06:22 --> 404 Page Not Found: /index
ERROR - 2019-05-29 05:06:34 --> 404 Page Not Found: /index
ERROR - 2019-05-29 10:13:50 --> Query error: Invalid use of group function - Invalid query: SELECT DISTINCT b.name,
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
				WHERE COUNT(a.id_user_sender) <> 0
				GROUP BY a.id_materi, a.id_user_sender, b.name
		
ERROR - 2019-05-29 10:14:53 --> Query error: Unknown column 'counter' in 'where clause' - Invalid query: SELECT DISTINCT b.name,
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
				WHERE counter <> 0
				GROUP BY a.id_materi, a.id_user_sender, b.name
		
