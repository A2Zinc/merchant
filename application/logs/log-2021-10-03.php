<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-10-03 21:41:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ',user_notification.action_id) >0
AND `user_notification`.`is_read` =0
AND `user_' at line 4 - Invalid query: SELECT `users`.`first_name`, `users`.`last_name`, `users`.`gender`, `user_notification`.*
FROM `user_notification`
LEFT JOIN `users` ON `users`.`user_id` = `user_notification`.`user_id`
WHERE FIND_IN_SET(,user_notification.action_id) >0
AND `user_notification`.`is_read` =0
AND `user_notification`.`is_deleted` =0
ORDER BY `user_notification`.`created_at` DESC
ERROR - 2021-10-03 21:41:43 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\a2zpos-web\application\models\Cashier_model.php 10018
ERROR - 2021-10-03 21:43:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ',user_notification.action_id) >0
AND `user_notification`.`is_read` =0
AND `user_' at line 4 - Invalid query: SELECT `users`.`first_name`, `users`.`last_name`, `users`.`gender`, `user_notification`.*
FROM `user_notification`
LEFT JOIN `users` ON `users`.`user_id` = `user_notification`.`user_id`
WHERE FIND_IN_SET(,user_notification.action_id) >0
AND `user_notification`.`is_read` =0
AND `user_notification`.`is_deleted` =0
ORDER BY `user_notification`.`created_at` DESC
INFO - 2021-10-03 21:43:06 --> Language file loaded: language/english/db_lang.php
ERROR - 2021-10-03 22:19:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ',user_notification.action_id) >0
AND `user_notification`.`is_read` =0
AND `user_' at line 4 - Invalid query: SELECT `users`.`first_name`, `users`.`last_name`, `users`.`gender`, `user_notification`.*
FROM `user_notification`
LEFT JOIN `users` ON `users`.`user_id` = `user_notification`.`user_id`
WHERE FIND_IN_SET(,user_notification.action_id) >0
AND `user_notification`.`is_read` =0
AND `user_notification`.`is_deleted` =0
ORDER BY `user_notification`.`created_at` DESC
INFO - 2021-10-03 22:19:16 --> Language file loaded: language/english/db_lang.php
ERROR - 2021-10-03 22:44:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ',user_notification.action_id) >0
AND `user_notification`.`is_read` =0
AND `user_' at line 4 - Invalid query: SELECT `users`.`first_name`, `users`.`last_name`, `users`.`gender`, `user_notification`.*
FROM `user_notification`
LEFT JOIN `users` ON `users`.`user_id` = `user_notification`.`user_id`
WHERE FIND_IN_SET(,user_notification.action_id) >0
AND `user_notification`.`is_read` =0
AND `user_notification`.`is_deleted` =0
ORDER BY `user_notification`.`created_at` DESC
INFO - 2021-10-03 22:44:13 --> Language file loaded: language/english/db_lang.php
ERROR - 2021-10-03 22:50:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ',user_notification.action_id) >0
AND `user_notification`.`is_read` =0
AND `user_' at line 4 - Invalid query: SELECT `users`.`first_name`, `users`.`last_name`, `users`.`gender`, `user_notification`.*
FROM `user_notification`
LEFT JOIN `users` ON `users`.`user_id` = `user_notification`.`user_id`
WHERE FIND_IN_SET(,user_notification.action_id) >0
AND `user_notification`.`is_read` =0
AND `user_notification`.`is_deleted` =0
ORDER BY `user_notification`.`created_at` DESC
ERROR - 2021-10-03 22:50:18 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\a2zpos-web\application\models\Cashier_model.php 10018
ERROR - 2021-10-03 22:50:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ',user_notification.action_id) >0
AND `user_notification`.`is_read` =0
AND `user_' at line 4 - Invalid query: SELECT `users`.`first_name`, `users`.`last_name`, `users`.`gender`, `user_notification`.*
FROM `user_notification`
LEFT JOIN `users` ON `users`.`user_id` = `user_notification`.`user_id`
WHERE FIND_IN_SET(,user_notification.action_id) >0
AND `user_notification`.`is_read` =0
AND `user_notification`.`is_deleted` =0
ORDER BY `user_notification`.`created_at` DESC
INFO - 2021-10-03 22:50:40 --> Language file loaded: language/english/db_lang.php
INFO - 2021-10-03 23:23:58 --> File loaded: C:\xampp\htdocs\a2zpos-web\application\views\cashier/include/header.php
INFO - 2021-10-03 23:24:00 --> File loaded: C:\xampp\htdocs\a2zpos-web\application\views\cashier/cashier.php
INFO - 2021-10-03 23:24:29 --> File loaded: C:\xampp\htdocs\a2zpos-web\application\views\cashier/include/footer.php
DEBUG - 2021-10-03 23:24:29 --> Need_lib class already loaded. Second attempt ignored.
INFO - 2021-10-03 23:24:29 --> Final output sent to browser
DEBUG - 2021-10-03 23:24:29 --> Total execution time: 35.0864
DEBUG - 2021-10-03 23:24:34 --> Need_lib class already loaded. Second attempt ignored.
INFO - 2021-10-03 23:24:34 --> Final output sent to browser
DEBUG - 2021-10-03 23:24:34 --> Total execution time: 4.1871
ERROR - 2021-10-03 23:30:02 --> Query error: Unknown column '_rights' in 'field list' - Invalid query: SELECT `_rights`
FROM `front_role_extra_permission`
WHERE `user_id` = '86'
INFO - 2021-10-03 23:30:02 --> Language file loaded: language/english/db_lang.php
