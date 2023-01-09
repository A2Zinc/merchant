<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

DEBUG - 2022-12-29 22:22:27 --> Super_auth class already loaded. Second attempt ignored.
ERROR - 2022-12-29 22:22:27 --> Query error: Table 'super_admin.merchant' doesn't exist - Invalid query: SELECT `store_set`.*, `m`.`name` as `merchant_name`
FROM `store_set`
LEFT JOIN `merchant` `m` ON `store_set`.`merchant_id`= `m`.`merchant_id`
WHERE `default_status` =0
ORDER BY `store_name` ASC
INFO - 2022-12-29 22:22:27 --> Language file loaded: language/english/db_lang.php
DEBUG - 2022-12-29 22:26:42 --> Super_auth class already loaded. Second attempt ignored.
ERROR - 2022-12-29 22:26:42 --> Query error: Unknown column 'm.name' in 'field list' - Invalid query: SELECT `store_set`.*, `m`.`name` as `merchant_name`
FROM `store_set`
LEFT JOIN `merchant` `m` ON `store_set`.`merchant_id`= `m`.`merchant_id`
WHERE `default_status` =0
ORDER BY `store_name` ASC
INFO - 2022-12-29 22:26:42 --> Language file loaded: language/english/db_lang.php
DEBUG - 2022-12-29 22:27:50 --> Super_auth class already loaded. Second attempt ignored.
ERROR - 2022-12-29 22:27:50 --> Query error: Unknown column 'm.name' in 'field list' - Invalid query: SELECT `store_set`.*, `m`.`name` as `merchant_name`
FROM `store_set`
LEFT JOIN `merchant` `m` ON `store_set`.`merchant_id`= `m`.`merchant_id`
WHERE `default_status` =0
ORDER BY `store_name` ASC
INFO - 2022-12-29 22:27:50 --> Language file loaded: language/english/db_lang.php
ERROR - 2022-12-29 22:33:28 --> Query error: Table 'a2zpos.product_purchase' doesn't exist - Invalid query: SELECT `a`.*, `b`.`supplier_name`
FROM `product_purchase` `a`
JOIN `supplier_information` `b` ON `b`.`supplier_id` = `a`.`supplier_id`
INFO - 2022-12-29 22:33:28 --> Language file loaded: language/english/db_lang.php
ERROR - 2022-12-29 22:34:14 --> Query error: Table 'a2zpos.accounts' doesn't exist - Invalid query: SELECT *
FROM `accounts`
WHERE `status` = 1
INFO - 2022-12-29 22:34:14 --> Language file loaded: language/english/db_lang.php
ERROR - 2022-12-29 22:34:16 --> Query error: Table 'a2zpos.accounts' doesn't exist - Invalid query: SELECT *
FROM `accounts`
WHERE `status` = 1
INFO - 2022-12-29 22:34:16 --> Language file loaded: language/english/db_lang.php
ERROR - 2022-12-29 22:34:50 --> Query error: Table 'a2zpos.invoice' doesn't exist - Invalid query: 
			SELECT 
			date,
			EXTRACT(MONTH FROM STR_TO_DATE(date,'%m-%d-%Y')) as month,
			COUNT(invoice_id) as total
			FROM 
			invoice
			WHERE 
			EXTRACT(YEAR FROM STR_TO_DATE(date,'%m-%d-%Y'))  >= EXTRACT(YEAR FROM NOW())
			GROUP BY 
			EXTRACT(YEAR_MONTH FROM STR_TO_DATE(date,'%m-%d-%Y'))
			ORDER BY
			month ASC
			
INFO - 2022-12-29 22:34:50 --> Language file loaded: language/english/db_lang.php
ERROR - 2022-12-29 22:35:26 --> Query error: Table 'a2zpos.invoice' doesn't exist - Invalid query: 
			SELECT 
			date,
			EXTRACT(MONTH FROM STR_TO_DATE(date,'%m-%d-%Y')) as month,
			COUNT(invoice_id) as total
			FROM 
			invoice
			WHERE 
			EXTRACT(YEAR FROM STR_TO_DATE(date,'%m-%d-%Y'))  >= EXTRACT(YEAR FROM NOW())
			GROUP BY 
			EXTRACT(YEAR_MONTH FROM STR_TO_DATE(date,'%m-%d-%Y'))
			ORDER BY
			month ASC
			
INFO - 2022-12-29 22:35:26 --> Language file loaded: language/english/db_lang.php
ERROR - 2022-12-29 22:36:22 --> Query error: Table 'a2zpos.invoice' doesn't exist - Invalid query: 
			SELECT 
			date,
			EXTRACT(MONTH FROM STR_TO_DATE(date,'%m-%d-%Y')) as month,
			COUNT(invoice_id) as total
			FROM 
			invoice
			WHERE 
			EXTRACT(YEAR FROM STR_TO_DATE(date,'%m-%d-%Y'))  >= EXTRACT(YEAR FROM NOW())
			GROUP BY 
			EXTRACT(YEAR_MONTH FROM STR_TO_DATE(date,'%m-%d-%Y'))
			ORDER BY
			month ASC
			
INFO - 2022-12-29 22:36:22 --> Language file loaded: language/english/db_lang.php
ERROR - 2022-12-29 22:36:24 --> Query error: Table 'a2zpos.invoice' doesn't exist - Invalid query: 
			SELECT 
			date,
			EXTRACT(MONTH FROM STR_TO_DATE(date,'%m-%d-%Y')) as month,
			COUNT(invoice_id) as total
			FROM 
			invoice
			WHERE 
			EXTRACT(YEAR FROM STR_TO_DATE(date,'%m-%d-%Y'))  >= EXTRACT(YEAR FROM NOW())
			GROUP BY 
			EXTRACT(YEAR_MONTH FROM STR_TO_DATE(date,'%m-%d-%Y'))
			ORDER BY
			month ASC
			
INFO - 2022-12-29 22:36:24 --> Language file loaded: language/english/db_lang.php
ERROR - 2022-12-29 22:36:51 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 146
ERROR - 2022-12-29 22:36:51 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 183
ERROR - 2022-12-29 22:36:51 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 223
ERROR - 2022-12-29 22:36:51 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 246
ERROR - 2022-12-29 22:36:51 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 378
INFO - 2022-12-29 22:36:51 --> File loaded: D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include/admin_home.php
INFO - 2022-12-29 22:36:51 --> Model Class Initialized
ERROR - 2022-12-29 22:36:51 --> Query error: Table 'a2zpos.product_purchase_details' doesn't exist - Invalid query: SELECT `a`.`product_name`, `a`.`unit`, `a`.`product_id`, `a`.`price`, `a`.`supplier_price`, `a`.`product_model`, `c`.`category_name`, sum(d.quantity) as totalSalesQnty, sum(b.quantity) as totalPurchaseQnty, `e`.`purchase_date` as `purchase_date`, `e`.`purchase_id`, (sum(b.quantity) - sum(d.quantity)) as stock
FROM `product_information` `a`
LEFT JOIN `product_category` `c` ON `c`.`category_id` = `a`.`category_id`
LEFT JOIN `product_purchase_details` `b` ON `b`.`product_id` = `a`.`product_id`
LEFT JOIN `invoice_details` `d` ON `d`.`product_id` = `a`.`product_id`
LEFT JOIN `product_purchase` `e` ON `e`.`purchase_id` = `b`.`purchase_id`
GROUP BY `a`.`product_id`
HAVING stock < 10
AND totalPurchaseQnty < 10
ORDER BY `a`.`product_name` ASC
INFO - 2022-12-29 22:36:51 --> Language file loaded: language/english/db_lang.php
ERROR - 2022-12-29 22:36:59 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 146
ERROR - 2022-12-29 22:36:59 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 183
ERROR - 2022-12-29 22:36:59 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 223
ERROR - 2022-12-29 22:36:59 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 246
ERROR - 2022-12-29 22:36:59 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 378
INFO - 2022-12-29 22:36:59 --> File loaded: D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include/admin_home.php
INFO - 2022-12-29 22:36:59 --> Model Class Initialized
ERROR - 2022-12-29 22:36:59 --> Query error: Table 'a2zpos.product_purchase_details' doesn't exist - Invalid query: SELECT `a`.`product_name`, `a`.`unit`, `a`.`product_id`, `a`.`price`, `a`.`supplier_price`, `a`.`product_model`, `c`.`category_name`, sum(d.quantity) as totalSalesQnty, sum(b.quantity) as totalPurchaseQnty, `e`.`purchase_date` as `purchase_date`, `e`.`purchase_id`, (sum(b.quantity) - sum(d.quantity)) as stock
FROM `product_information` `a`
LEFT JOIN `product_category` `c` ON `c`.`category_id` = `a`.`category_id`
LEFT JOIN `product_purchase_details` `b` ON `b`.`product_id` = `a`.`product_id`
LEFT JOIN `invoice_details` `d` ON `d`.`product_id` = `a`.`product_id`
LEFT JOIN `product_purchase` `e` ON `e`.`purchase_id` = `b`.`purchase_id`
GROUP BY `a`.`product_id`
HAVING stock < 10
AND totalPurchaseQnty < 10
ORDER BY `a`.`product_name` ASC
INFO - 2022-12-29 22:36:59 --> Language file loaded: language/english/db_lang.php
ERROR - 2022-12-29 22:37:59 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 146
ERROR - 2022-12-29 22:37:59 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 183
ERROR - 2022-12-29 22:37:59 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 223
ERROR - 2022-12-29 22:37:59 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 246
ERROR - 2022-12-29 22:37:59 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 378
INFO - 2022-12-29 22:37:59 --> File loaded: D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include/admin_home.php
INFO - 2022-12-29 22:37:59 --> Model Class Initialized
ERROR - 2022-12-29 22:37:59 --> Query error: Table 'a2zpos.product_purchase_details' doesn't exist - Invalid query: SELECT `a`.`product_name`, `a`.`unit`, `a`.`product_id`, `a`.`price`, `a`.`supplier_price`, `a`.`product_model`, `c`.`category_name`, sum(d.quantity) as totalSalesQnty, sum(b.quantity) as totalPurchaseQnty, `e`.`purchase_date` as `purchase_date`, `e`.`purchase_id`, (sum(b.quantity) - sum(d.quantity)) as stock
FROM `product_information` `a`
LEFT JOIN `product_category` `c` ON `c`.`category_id` = `a`.`category_id`
LEFT JOIN `product_purchase_details` `b` ON `b`.`product_id` = `a`.`product_id`
LEFT JOIN `invoice_details` `d` ON `d`.`product_id` = `a`.`product_id`
LEFT JOIN `product_purchase` `e` ON `e`.`purchase_id` = `b`.`purchase_id`
GROUP BY `a`.`product_id`
HAVING stock < 10
AND totalPurchaseQnty < 10
ORDER BY `a`.`product_name` ASC
INFO - 2022-12-29 22:37:59 --> Language file loaded: language/english/db_lang.php
ERROR - 2022-12-29 22:38:00 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 146
ERROR - 2022-12-29 22:38:00 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 183
ERROR - 2022-12-29 22:38:00 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 223
ERROR - 2022-12-29 22:38:00 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 246
ERROR - 2022-12-29 22:38:00 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 378
INFO - 2022-12-29 22:38:00 --> File loaded: D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include/admin_home.php
INFO - 2022-12-29 22:38:00 --> Model Class Initialized
ERROR - 2022-12-29 22:38:00 --> Query error: Table 'a2zpos.product_purchase_details' doesn't exist - Invalid query: SELECT `a`.`product_name`, `a`.`unit`, `a`.`product_id`, `a`.`price`, `a`.`supplier_price`, `a`.`product_model`, `c`.`category_name`, sum(d.quantity) as totalSalesQnty, sum(b.quantity) as totalPurchaseQnty, `e`.`purchase_date` as `purchase_date`, `e`.`purchase_id`, (sum(b.quantity) - sum(d.quantity)) as stock
FROM `product_information` `a`
LEFT JOIN `product_category` `c` ON `c`.`category_id` = `a`.`category_id`
LEFT JOIN `product_purchase_details` `b` ON `b`.`product_id` = `a`.`product_id`
LEFT JOIN `invoice_details` `d` ON `d`.`product_id` = `a`.`product_id`
LEFT JOIN `product_purchase` `e` ON `e`.`purchase_id` = `b`.`purchase_id`
GROUP BY `a`.`product_id`
HAVING stock < 10
AND totalPurchaseQnty < 10
ORDER BY `a`.`product_name` ASC
INFO - 2022-12-29 22:38:00 --> Language file loaded: language/english/db_lang.php
INFO - 2022-12-29 22:38:22 --> File loaded: D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include/admin_home.php
INFO - 2022-12-29 22:38:22 --> Model Class Initialized
ERROR - 2022-12-29 22:38:22 --> Query error: Table 'a2zpos.product_purchase_details' doesn't exist - Invalid query: SELECT `a`.`product_name`, `a`.`unit`, `a`.`product_id`, `a`.`price`, `a`.`supplier_price`, `a`.`product_model`, `c`.`category_name`, sum(d.quantity) as totalSalesQnty, sum(b.quantity) as totalPurchaseQnty, `e`.`purchase_date` as `purchase_date`, `e`.`purchase_id`, (sum(b.quantity) - sum(d.quantity)) as stock
FROM `product_information` `a`
LEFT JOIN `product_category` `c` ON `c`.`category_id` = `a`.`category_id`
LEFT JOIN `product_purchase_details` `b` ON `b`.`product_id` = `a`.`product_id`
LEFT JOIN `invoice_details` `d` ON `d`.`product_id` = `a`.`product_id`
LEFT JOIN `product_purchase` `e` ON `e`.`purchase_id` = `b`.`purchase_id`
GROUP BY `a`.`product_id`
HAVING stock < 10
AND totalPurchaseQnty < 10
ORDER BY `a`.`product_name` ASC
INFO - 2022-12-29 22:38:22 --> Language file loaded: language/english/db_lang.php
INFO - 2022-12-29 22:38:23 --> File loaded: D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include/admin_home.php
INFO - 2022-12-29 22:38:23 --> Model Class Initialized
ERROR - 2022-12-29 22:38:23 --> Query error: Table 'a2zpos.product_purchase_details' doesn't exist - Invalid query: SELECT `a`.`product_name`, `a`.`unit`, `a`.`product_id`, `a`.`price`, `a`.`supplier_price`, `a`.`product_model`, `c`.`category_name`, sum(d.quantity) as totalSalesQnty, sum(b.quantity) as totalPurchaseQnty, `e`.`purchase_date` as `purchase_date`, `e`.`purchase_id`, (sum(b.quantity) - sum(d.quantity)) as stock
FROM `product_information` `a`
LEFT JOIN `product_category` `c` ON `c`.`category_id` = `a`.`category_id`
LEFT JOIN `product_purchase_details` `b` ON `b`.`product_id` = `a`.`product_id`
LEFT JOIN `invoice_details` `d` ON `d`.`product_id` = `a`.`product_id`
LEFT JOIN `product_purchase` `e` ON `e`.`purchase_id` = `b`.`purchase_id`
GROUP BY `a`.`product_id`
HAVING stock < 10
AND totalPurchaseQnty < 10
ORDER BY `a`.`product_name` ASC
INFO - 2022-12-29 22:38:23 --> Language file loaded: language/english/db_lang.php
INFO - 2022-12-29 22:38:24 --> File loaded: D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include/admin_home.php
INFO - 2022-12-29 22:38:24 --> Model Class Initialized
ERROR - 2022-12-29 22:38:24 --> Query error: Table 'a2zpos.product_purchase_details' doesn't exist - Invalid query: SELECT `a`.`product_name`, `a`.`unit`, `a`.`product_id`, `a`.`price`, `a`.`supplier_price`, `a`.`product_model`, `c`.`category_name`, sum(d.quantity) as totalSalesQnty, sum(b.quantity) as totalPurchaseQnty, `e`.`purchase_date` as `purchase_date`, `e`.`purchase_id`, (sum(b.quantity) - sum(d.quantity)) as stock
FROM `product_information` `a`
LEFT JOIN `product_category` `c` ON `c`.`category_id` = `a`.`category_id`
LEFT JOIN `product_purchase_details` `b` ON `b`.`product_id` = `a`.`product_id`
LEFT JOIN `invoice_details` `d` ON `d`.`product_id` = `a`.`product_id`
LEFT JOIN `product_purchase` `e` ON `e`.`purchase_id` = `b`.`purchase_id`
GROUP BY `a`.`product_id`
HAVING stock < 10
AND totalPurchaseQnty < 10
ORDER BY `a`.`product_name` ASC
INFO - 2022-12-29 22:38:24 --> Language file loaded: language/english/db_lang.php
INFO - 2022-12-29 22:38:25 --> File loaded: D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include/admin_home.php
INFO - 2022-12-29 22:38:25 --> Model Class Initialized
ERROR - 2022-12-29 22:38:25 --> Query error: Table 'a2zpos.product_purchase_details' doesn't exist - Invalid query: SELECT `a`.`product_name`, `a`.`unit`, `a`.`product_id`, `a`.`price`, `a`.`supplier_price`, `a`.`product_model`, `c`.`category_name`, sum(d.quantity) as totalSalesQnty, sum(b.quantity) as totalPurchaseQnty, `e`.`purchase_date` as `purchase_date`, `e`.`purchase_id`, (sum(b.quantity) - sum(d.quantity)) as stock
FROM `product_information` `a`
LEFT JOIN `product_category` `c` ON `c`.`category_id` = `a`.`category_id`
LEFT JOIN `product_purchase_details` `b` ON `b`.`product_id` = `a`.`product_id`
LEFT JOIN `invoice_details` `d` ON `d`.`product_id` = `a`.`product_id`
LEFT JOIN `product_purchase` `e` ON `e`.`purchase_id` = `b`.`purchase_id`
GROUP BY `a`.`product_id`
HAVING stock < 10
AND totalPurchaseQnty < 10
ORDER BY `a`.`product_name` ASC
INFO - 2022-12-29 22:38:25 --> Language file loaded: language/english/db_lang.php
INFO - 2022-12-29 22:38:27 --> File loaded: D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include/admin_home.php
INFO - 2022-12-29 22:38:27 --> Model Class Initialized
ERROR - 2022-12-29 22:38:27 --> Query error: Table 'a2zpos.product_purchase_details' doesn't exist - Invalid query: SELECT `a`.`product_name`, `a`.`unit`, `a`.`product_id`, `a`.`price`, `a`.`supplier_price`, `a`.`product_model`, `c`.`category_name`, sum(d.quantity) as totalSalesQnty, sum(b.quantity) as totalPurchaseQnty, `e`.`purchase_date` as `purchase_date`, `e`.`purchase_id`, (sum(b.quantity) - sum(d.quantity)) as stock
FROM `product_information` `a`
LEFT JOIN `product_category` `c` ON `c`.`category_id` = `a`.`category_id`
LEFT JOIN `product_purchase_details` `b` ON `b`.`product_id` = `a`.`product_id`
LEFT JOIN `invoice_details` `d` ON `d`.`product_id` = `a`.`product_id`
LEFT JOIN `product_purchase` `e` ON `e`.`purchase_id` = `b`.`purchase_id`
GROUP BY `a`.`product_id`
HAVING stock < 10
AND totalPurchaseQnty < 10
ORDER BY `a`.`product_name` ASC
INFO - 2022-12-29 22:38:27 --> Language file loaded: language/english/db_lang.php
INFO - 2022-12-29 22:38:27 --> File loaded: D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include/admin_home.php
INFO - 2022-12-29 22:38:27 --> Model Class Initialized
ERROR - 2022-12-29 22:38:27 --> Query error: Table 'a2zpos.product_purchase_details' doesn't exist - Invalid query: SELECT `a`.`product_name`, `a`.`unit`, `a`.`product_id`, `a`.`price`, `a`.`supplier_price`, `a`.`product_model`, `c`.`category_name`, sum(d.quantity) as totalSalesQnty, sum(b.quantity) as totalPurchaseQnty, `e`.`purchase_date` as `purchase_date`, `e`.`purchase_id`, (sum(b.quantity) - sum(d.quantity)) as stock
FROM `product_information` `a`
LEFT JOIN `product_category` `c` ON `c`.`category_id` = `a`.`category_id`
LEFT JOIN `product_purchase_details` `b` ON `b`.`product_id` = `a`.`product_id`
LEFT JOIN `invoice_details` `d` ON `d`.`product_id` = `a`.`product_id`
LEFT JOIN `product_purchase` `e` ON `e`.`purchase_id` = `b`.`purchase_id`
GROUP BY `a`.`product_id`
HAVING stock < 10
AND totalPurchaseQnty < 10
ORDER BY `a`.`product_name` ASC
INFO - 2022-12-29 22:38:27 --> Language file loaded: language/english/db_lang.php
ERROR - 2022-12-29 22:38:57 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 146
ERROR - 2022-12-29 22:38:57 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 183
ERROR - 2022-12-29 22:38:57 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 223
ERROR - 2022-12-29 22:38:57 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 246
ERROR - 2022-12-29 22:38:57 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 378
INFO - 2022-12-29 22:38:57 --> File loaded: D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include/admin_home.php
INFO - 2022-12-29 22:38:57 --> Model Class Initialized
ERROR - 2022-12-29 22:38:57 --> Query error: Table 'a2zpos.product_purchase_details' doesn't exist - Invalid query: SELECT `a`.`product_name`, `a`.`unit`, `a`.`product_id`, `a`.`price`, `a`.`supplier_price`, `a`.`product_model`, `c`.`category_name`, sum(d.quantity) as totalSalesQnty, sum(b.quantity) as totalPurchaseQnty, `e`.`purchase_date` as `purchase_date`, `e`.`purchase_id`, (sum(b.quantity) - sum(d.quantity)) as stock
FROM `product_information` `a`
LEFT JOIN `product_category` `c` ON `c`.`category_id` = `a`.`category_id`
LEFT JOIN `product_purchase_details` `b` ON `b`.`product_id` = `a`.`product_id`
LEFT JOIN `invoice_details` `d` ON `d`.`product_id` = `a`.`product_id`
LEFT JOIN `product_purchase` `e` ON `e`.`purchase_id` = `b`.`purchase_id`
GROUP BY `a`.`product_id`
HAVING stock < 10
AND totalPurchaseQnty < 10
ORDER BY `a`.`product_name` ASC
INFO - 2022-12-29 22:38:57 --> Language file loaded: language/english/db_lang.php
ERROR - 2022-12-29 22:38:57 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 146
ERROR - 2022-12-29 22:38:57 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 183
ERROR - 2022-12-29 22:38:57 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 223
ERROR - 2022-12-29 22:38:57 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 246
ERROR - 2022-12-29 22:38:57 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 378
INFO - 2022-12-29 22:38:57 --> File loaded: D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include/admin_home.php
INFO - 2022-12-29 22:38:57 --> Model Class Initialized
ERROR - 2022-12-29 22:38:58 --> Query error: Table 'a2zpos.product_purchase_details' doesn't exist - Invalid query: SELECT `a`.`product_name`, `a`.`unit`, `a`.`product_id`, `a`.`price`, `a`.`supplier_price`, `a`.`product_model`, `c`.`category_name`, sum(d.quantity) as totalSalesQnty, sum(b.quantity) as totalPurchaseQnty, `e`.`purchase_date` as `purchase_date`, `e`.`purchase_id`, (sum(b.quantity) - sum(d.quantity)) as stock
FROM `product_information` `a`
LEFT JOIN `product_category` `c` ON `c`.`category_id` = `a`.`category_id`
LEFT JOIN `product_purchase_details` `b` ON `b`.`product_id` = `a`.`product_id`
LEFT JOIN `invoice_details` `d` ON `d`.`product_id` = `a`.`product_id`
LEFT JOIN `product_purchase` `e` ON `e`.`purchase_id` = `b`.`purchase_id`
GROUP BY `a`.`product_id`
HAVING stock < 10
AND totalPurchaseQnty < 10
ORDER BY `a`.`product_name` ASC
INFO - 2022-12-29 22:38:58 --> Language file loaded: language/english/db_lang.php
ERROR - 2022-12-29 22:39:26 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 146
ERROR - 2022-12-29 22:39:26 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 183
ERROR - 2022-12-29 22:39:26 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 223
ERROR - 2022-12-29 22:39:26 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 246
ERROR - 2022-12-29 22:39:26 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 378
INFO - 2022-12-29 22:39:26 --> File loaded: D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include/admin_home.php
INFO - 2022-12-29 22:39:26 --> Model Class Initialized
ERROR - 2022-12-29 22:39:26 --> Query error: Table 'a2zpos.product_purchase_details' doesn't exist - Invalid query: SELECT `a`.`product_name`, `a`.`unit`, `a`.`product_id`, `a`.`price`, `a`.`supplier_price`, `a`.`product_model`, `c`.`category_name`, sum(d.quantity) as totalSalesQnty, sum(b.quantity) as totalPurchaseQnty, `e`.`purchase_date` as `purchase_date`, `e`.`purchase_id`, (sum(b.quantity) - sum(d.quantity)) as stock
FROM `product_information` `a`
LEFT JOIN `product_category` `c` ON `c`.`category_id` = `a`.`category_id`
LEFT JOIN `product_purchase_details` `b` ON `b`.`product_id` = `a`.`product_id`
LEFT JOIN `invoice_details` `d` ON `d`.`product_id` = `a`.`product_id`
LEFT JOIN `product_purchase` `e` ON `e`.`purchase_id` = `b`.`purchase_id`
GROUP BY `a`.`product_id`
HAVING stock < 10
AND totalPurchaseQnty < 10
ORDER BY `a`.`product_name` ASC
INFO - 2022-12-29 22:39:26 --> Language file loaded: language/english/db_lang.php
ERROR - 2022-12-29 22:39:26 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at D:\xampp\htdocs\a2z-management\a2zpos-store\application\controllers\Admin_dashboard.php:81) D:\xampp\htdocs\a2z-management\a2zpos-store\system\core\Common.php 570
ERROR - 2022-12-29 22:39:48 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 146
ERROR - 2022-12-29 22:39:48 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 183
ERROR - 2022-12-29 22:39:48 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 223
ERROR - 2022-12-29 22:39:48 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 246
ERROR - 2022-12-29 22:39:48 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 378
INFO - 2022-12-29 22:39:48 --> File loaded: D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include/admin_home.php
INFO - 2022-12-29 22:39:48 --> Final output sent to browser
DEBUG - 2022-12-29 22:39:48 --> Total execution time: 0.3154
ERROR - 2022-12-29 22:39:59 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 146
ERROR - 2022-12-29 22:39:59 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 183
ERROR - 2022-12-29 22:39:59 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 223
ERROR - 2022-12-29 22:39:59 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 246
ERROR - 2022-12-29 22:39:59 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include\admin_home.php 378
INFO - 2022-12-29 22:39:59 --> File loaded: D:\xampp\htdocs\a2z-management\a2zpos-store\application\views\include/admin_home.php
INFO - 2022-12-29 22:39:59 --> Final output sent to browser
DEBUG - 2022-12-29 22:39:59 --> Total execution time: 3.1733
