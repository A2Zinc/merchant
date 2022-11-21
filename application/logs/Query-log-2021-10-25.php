test run

UPDATE `cron_status` SET `status` = 1
WHERE `id` = 1

test run

test run

UPDATE `cron_status` SET `status` = 1
WHERE `id` = 1

test run

test run

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '4', 'Manager', 'Gopal Yadav')

test run

test run

test run

UPDATE `user_login` SET `user_shift_status` = 1
WHERE `username` = '22'

INSERT INTO `tbl_user_shift` (`terminal_id`, `username`, `cash_in_drawer`, `coin_dispenser_in`, `bin_data_in`, `datetime_in`, `datetime_out`, `date`, `defer_shift`, `shift_in_out`) VALUES ('26', '22', '2000.00', '1000.00', '[\"1\",\"2\",\"3\"]', '2021-10-25 22:36:02', '2021-10-25 22:36:02', '2021-10-25', '0', 1)

test run

UPDATE `cron_status` SET `status` = 1
WHERE `id` = 1

test run

test run

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

test run

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

test run

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

test run

test run

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

test run


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
			


			SELECT 
			purchase_date,
			EXTRACT(MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y')) as month, 
			COUNT(purchase_id) as total_month
			FROM 
			product_purchase
			WHERE 
			EXTRACT(YEAR FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))  >= EXTRACT(YEAR FROM NOW())
			GROUP BY 
			EXTRACT(YEAR_MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))
			ORDER BY
			month ASC
			

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

test run


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
			


			SELECT 
			purchase_date,
			EXTRACT(MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y')) as month, 
			COUNT(purchase_id) as total_month
			FROM 
			product_purchase
			WHERE 
			EXTRACT(YEAR FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))  >= EXTRACT(YEAR FROM NOW())
			GROUP BY 
			EXTRACT(YEAR_MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))
			ORDER BY
			month ASC
			

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

test run


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
			


			SELECT 
			purchase_date,
			EXTRACT(MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y')) as month, 
			COUNT(purchase_id) as total_month
			FROM 
			product_purchase
			WHERE 
			EXTRACT(YEAR FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))  >= EXTRACT(YEAR FROM NOW())
			GROUP BY 
			EXTRACT(YEAR_MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))
			ORDER BY
			month ASC
			

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

test run


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
			


			SELECT 
			purchase_date,
			EXTRACT(MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y')) as month, 
			COUNT(purchase_id) as total_month
			FROM 
			product_purchase
			WHERE 
			EXTRACT(YEAR FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))  >= EXTRACT(YEAR FROM NOW())
			GROUP BY 
			EXTRACT(YEAR_MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))
			ORDER BY
			month ASC
			

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

test run


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
			


			SELECT 
			purchase_date,
			EXTRACT(MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y')) as month, 
			COUNT(purchase_id) as total_month
			FROM 
			product_purchase
			WHERE 
			EXTRACT(YEAR FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))  >= EXTRACT(YEAR FROM NOW())
			GROUP BY 
			EXTRACT(YEAR_MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))
			ORDER BY
			month ASC
			

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

test run

test run


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
			


			SELECT 
			purchase_date,
			EXTRACT(MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y')) as month, 
			COUNT(purchase_id) as total_month
			FROM 
			product_purchase
			WHERE 
			EXTRACT(YEAR FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))  >= EXTRACT(YEAR FROM NOW())
			GROUP BY 
			EXTRACT(YEAR_MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))
			ORDER BY
			month ASC
			

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

test run


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
			


			SELECT 
			purchase_date,
			EXTRACT(MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y')) as month, 
			COUNT(purchase_id) as total_month
			FROM 
			product_purchase
			WHERE 
			EXTRACT(YEAR FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))  >= EXTRACT(YEAR FROM NOW())
			GROUP BY 
			EXTRACT(YEAR_MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))
			ORDER BY
			month ASC
			

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

test run

test run


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
			


			SELECT 
			purchase_date,
			EXTRACT(MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y')) as month, 
			COUNT(purchase_id) as total_month
			FROM 
			product_purchase
			WHERE 
			EXTRACT(YEAR FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))  >= EXTRACT(YEAR FROM NOW())
			GROUP BY 
			EXTRACT(YEAR_MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))
			ORDER BY
			month ASC
			

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

test run


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
			


			SELECT 
			purchase_date,
			EXTRACT(MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y')) as month, 
			COUNT(purchase_id) as total_month
			FROM 
			product_purchase
			WHERE 
			EXTRACT(YEAR FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))  >= EXTRACT(YEAR FROM NOW())
			GROUP BY 
			EXTRACT(YEAR_MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))
			ORDER BY
			month ASC
			

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

test run

test run


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
			


			SELECT 
			purchase_date,
			EXTRACT(MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y')) as month, 
			COUNT(purchase_id) as total_month
			FROM 
			product_purchase
			WHERE 
			EXTRACT(YEAR FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))  >= EXTRACT(YEAR FROM NOW())
			GROUP BY 
			EXTRACT(YEAR_MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))
			ORDER BY
			month ASC
			

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

test run

test run


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
			


			SELECT 
			purchase_date,
			EXTRACT(MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y')) as month, 
			COUNT(purchase_id) as total_month
			FROM 
			product_purchase
			WHERE 
			EXTRACT(YEAR FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))  >= EXTRACT(YEAR FROM NOW())
			GROUP BY 
			EXTRACT(YEAR_MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))
			ORDER BY
			month ASC
			

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

test run


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
			


			SELECT 
			purchase_date,
			EXTRACT(MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y')) as month, 
			COUNT(purchase_id) as total_month
			FROM 
			product_purchase
			WHERE 
			EXTRACT(YEAR FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))  >= EXTRACT(YEAR FROM NOW())
			GROUP BY 
			EXTRACT(YEAR_MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))
			ORDER BY
			month ASC
			

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

test run

test run


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
			


			SELECT 
			purchase_date,
			EXTRACT(MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y')) as month, 
			COUNT(purchase_id) as total_month
			FROM 
			product_purchase
			WHERE 
			EXTRACT(YEAR FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))  >= EXTRACT(YEAR FROM NOW())
			GROUP BY 
			EXTRACT(YEAR_MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))
			ORDER BY
			month ASC
			

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

test run


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
			


			SELECT 
			purchase_date,
			EXTRACT(MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y')) as month, 
			COUNT(purchase_id) as total_month
			FROM 
			product_purchase
			WHERE 
			EXTRACT(YEAR FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))  >= EXTRACT(YEAR FROM NOW())
			GROUP BY 
			EXTRACT(YEAR_MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))
			ORDER BY
			month ASC
			

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

test run

test run


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
			


			SELECT 
			purchase_date,
			EXTRACT(MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y')) as month, 
			COUNT(purchase_id) as total_month
			FROM 
			product_purchase
			WHERE 
			EXTRACT(YEAR FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))  >= EXTRACT(YEAR FROM NOW())
			GROUP BY 
			EXTRACT(YEAR_MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))
			ORDER BY
			month ASC
			

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

test run

test run


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
			


			SELECT 
			purchase_date,
			EXTRACT(MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y')) as month, 
			COUNT(purchase_id) as total_month
			FROM 
			product_purchase
			WHERE 
			EXTRACT(YEAR FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))  >= EXTRACT(YEAR FROM NOW())
			GROUP BY 
			EXTRACT(YEAR_MONTH FROM STR_TO_DATE(purchase_date,'%m-%d-%Y'))
			ORDER BY
			month ASC
			

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

