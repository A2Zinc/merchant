<<<<<<< HEAD
INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('25', '4', 'Manager', 'Payal Motwani')

SHOW TABLES FROM `lwt_stagingPOS`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')
=======
INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '4', 'Manager', 'Gopal Yadav')
>>>>>>> 056007a8882f5f81059302b2020bbcddeb846314

UPDATE `user_login` SET `user_shift_status` = 1
WHERE `username` = '22'

<<<<<<< HEAD
INSERT INTO `tbl_user_shift` (`terminal_id`, `username`, `cash_in_drawer`, `coin_dispenser_in`, `bin_data_in`, `datetime_in`, `datetime_out`, `date`, `defer_shift`, `shift_in_out`) VALUES ('26', '22', '100.00', '0', '[\"00\",\"000\",\"000123\",\"214748364765554872\"]', '2021-09-28 00:26:54', '2021-09-28 00:26:54', '2021-09-28', '0', 1)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Start Shift', '74,55,21,24,66,25,86,33,50,31', 'shift in', 'clock in out', '2021-09-28 00:26:54')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES ('285ZB5OC81G7S2A67XHA', '4I8XHFO8B6XYX39', 'test', 'California State Lottery', 'Vendor', '70.00', 'Cash', '370', '26', '2021-09-28', '2021-09-28 00:37:30', '')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'pos', 'Payout Transaction', 'INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES (\'285ZB5OC81G7S2A67XHA\', \'4I8XHFO8B6XYX39\', \'test\', \'California State Lottery\', \'Vendor\', \'70.00\', \'Cash\', \'370\', \'26\', \'2021-09-28\', \'2021-09-28 00:37:30\', \'\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', '$70.00 Payout for Vendor Payout', '74,55,21,24,66,25,86,33,50,31', 'Vendor Payout', 'pos terminal', '2021-09-28 00:37:30')

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES ('285ZB5OC81G7S2A67XHA', '4I8XHFO8B6XYX39', 'test', 'California State Lottery', 'Vendor', '1.00', 'Cash', '370', '26', '2021-09-28', '2021-09-28 00:38:42', '')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'pos', 'Payout Transaction', 'INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES (\'285ZB5OC81G7S2A67XHA\', \'4I8XHFO8B6XYX39\', \'test\', \'California State Lottery\', \'Vendor\', \'1.00\', \'Cash\', \'370\', \'26\', \'2021-09-28\', \'2021-09-28 00:38:42\', \'\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', '$1.00 Payout for Vendor Payout', '74,55,21,24,66,25,86,33,50,31', 'Vendor Payout', 'pos terminal', '2021-09-28 00:38:42')

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES ('285ZB5OC81G7S2A67XHA', '4I8XHFO8B6XYX39', 'tsst', 'California State Lottery', 'Vendor', '1.00', 'Cash', '370', '26', '2021-09-28', '2021-09-28 00:40:21', '')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'pos', 'Payout Transaction', 'INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES (\'285ZB5OC81G7S2A67XHA\', \'4I8XHFO8B6XYX39\', \'tsst\', \'California State Lottery\', \'Vendor\', \'1.00\', \'Cash\', \'370\', \'26\', \'2021-09-28\', \'2021-09-28 00:40:21\', \'\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', '$1.00 Payout for Vendor Payout', '74,55,21,24,66,25,86,33,50,31', 'Vendor Payout', 'pos terminal', '2021-09-28 00:40:21')
=======
INSERT INTO `tbl_user_shift` (`terminal_id`, `username`, `cash_in_drawer`, `coin_dispenser_in`, `bin_data_in`, `datetime_in`, `datetime_out`, `date`, `defer_shift`, `shift_in_out`) VALUES ('26', '22', '2000.00', '1000.00', '[\"1\",\"2\",\"3\"]', '2021-09-28 04:30:28', '2021-09-28 04:30:28', '2021-09-28', '0', 1)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Start Shift', '55,22,66,25,86', 'shift in', 'clock in out', '2021-09-28 04:30:29')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '4', 'Manager', 'Gopal Yadav')
>>>>>>> 056007a8882f5f81059302b2020bbcddeb846314

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

<<<<<<< HEAD
INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES ('39VB97RFLVYAFBDRGIDO', '4I8XHFO8B6XYX39', '', 'RNDC', 'Vendor', '1.00', 'Cash', '370', '26', '2021-09-28', '2021-09-28 00:41:39', '')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'pos', 'Payout Transaction', 'INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES (\'39VB97RFLVYAFBDRGIDO\', \'4I8XHFO8B6XYX39\', \'\', \'RNDC\', \'Vendor\', \'1.00\', \'Cash\', \'370\', \'26\', \'2021-09-28\', \'2021-09-28 00:41:39\', \'\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', '$1.00 Payout for Vendor Payout', '74,55,21,24,66,25,86,33,50,31', 'Vendor Payout', 'pos terminal', '2021-09-28 00:41:40')

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`
=======
INSERT INTO `product_information` (`product_id`, `case_UPC`, `product_name`, `onsale_price`, `short_name`, `is_custom_product`, `Applicable_CRV`, `Applicable_Tax`, `image_thumb`, `created_at`, `updated_at`) VALUES ('989SFPNM', '1632833441966', 'JD TEST', '100.00', 'JD TEST', '1', '1', '1', './uploads/products/600px-No_image_available.svg (2).png', '2021-09-28 05:51:27', '2021-09-28 05:51:27')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Custom Product Insert', 'INSERT INTO `product_information` (`product_id`, `case_UPC`, `product_name`, `onsale_price`, `short_name`, `is_custom_product`, `Applicable_CRV`, `Applicable_Tax`, `image_thumb`, `created_at`, `updated_at`) VALUES (\'989SFPNM\', \'1632833441966\', \'JD TEST\', \'100.00\', \'JD TEST\', \'1\', \'1\', \'1\', \'./uploads/products/600px-No_image_available.svg (2).png\', \'2021-09-28 05:51:27\', \'2021-09-28 05:51:27\')', 0, 0)
>>>>>>> 056007a8882f5f81059302b2020bbcddeb846314

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

<<<<<<< HEAD
INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES ('285ZB5OC81G7S2A67XHA', '4I8XHFO8B6XYX39', '', 'California State Lottery', 'Vendor', '1.00', 'Cash', '370', '26', '2021-09-28', '2021-09-28 00:42:18', '')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'pos', 'Payout Transaction', 'INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES (\'285ZB5OC81G7S2A67XHA\', \'4I8XHFO8B6XYX39\', \'\', \'California State Lottery\', \'Vendor\', \'1.00\', \'Cash\', \'370\', \'26\', \'2021-09-28\', \'2021-09-28 00:42:18\', \'\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', '$1.00 Payout for Vendor Payout', '74,55,21,24,66,25,86,33,50,31', 'Vendor Payout', 'pos terminal', '2021-09-28 00:42:18')

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`
=======
INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '4', 'Manager', 'Gopal Yadav')
>>>>>>> 056007a8882f5f81059302b2020bbcddeb846314

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

<<<<<<< HEAD
INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES ('285ZB5OC81G7S2A67XHA', '4I8XHFO8B6XYX39', '', 'California State Lottery', 'Vendor', '1.00', 'Cash', '370', '26', '2021-09-28', '2021-09-28 00:45:11', '')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'pos', 'Payout Transaction', 'INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES (\'285ZB5OC81G7S2A67XHA\', \'4I8XHFO8B6XYX39\', \'\', \'California State Lottery\', \'Vendor\', \'1.00\', \'Cash\', \'370\', \'26\', \'2021-09-28\', \'2021-09-28 00:45:11\', \'\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', '$1.00 Payout for Vendor Payout', '74,55,21,24,66,25,86,33,50,31', 'Vendor Payout', 'pos terminal', '2021-09-28 00:45:11')

=======
>>>>>>> 056007a8882f5f81059302b2020bbcddeb846314
SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

<<<<<<< HEAD
INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES ('285ZB5OC81G7S2A67XHA', '4I8XHFO8B6XYX39', '', 'California State Lottery', 'Vendor', '1.00', 'Cash', '370', '26', '2021-09-28', '2021-09-28 00:45:50', '')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'pos', 'Payout Transaction', 'INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES (\'285ZB5OC81G7S2A67XHA\', \'4I8XHFO8B6XYX39\', \'\', \'California State Lottery\', \'Vendor\', \'1.00\', \'Cash\', \'370\', \'26\', \'2021-09-28\', \'2021-09-28 00:45:50\', \'\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', '$1.00 Payout for Vendor Payout', '74,55,21,24,66,25,86,33,50,31', 'Vendor Payout', 'pos terminal', '2021-09-28 00:45:50')

=======
>>>>>>> 056007a8882f5f81059302b2020bbcddeb846314
SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

<<<<<<< HEAD
INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES ('285ZB5OC81G7S2A67XHA', '4I8XHFO8B6XYX39', '', 'California State Lottery', 'Vendor', '1.00', 'Cash', '370', '26', '2021-09-28', '2021-09-28 00:49:44', '')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'pos', 'Payout Transaction', 'INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES (\'285ZB5OC81G7S2A67XHA\', \'4I8XHFO8B6XYX39\', \'\', \'California State Lottery\', \'Vendor\', \'1.00\', \'Cash\', \'370\', \'26\', \'2021-09-28\', \'2021-09-28 00:49:44\', \'\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', '$1.00 Payout for Vendor Payout', '74,55,21,24,66,25,86,33,50,31', 'Vendor Payout', 'pos terminal', '2021-09-28 00:49:45')

=======
>>>>>>> 056007a8882f5f81059302b2020bbcddeb846314
SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

<<<<<<< HEAD
INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES ('285ZB5OC81G7S2A67XHA', '4I8XHFO8B6XYX39', '', 'California State Lottery', 'Vendor', '1.00', 'Cash', '370', '26', '2021-09-28', '2021-09-28 00:50:38', '')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'pos', 'Payout Transaction', 'INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES (\'285ZB5OC81G7S2A67XHA\', \'4I8XHFO8B6XYX39\', \'\', \'California State Lottery\', \'Vendor\', \'1.00\', \'Cash\', \'370\', \'26\', \'2021-09-28\', \'2021-09-28 00:50:38\', \'\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', '$1.00 Payout for Vendor Payout', '74,55,21,24,66,25,86,33,50,31', 'Vendor Payout', 'pos terminal', '2021-09-28 00:50:39')

=======
>>>>>>> 056007a8882f5f81059302b2020bbcddeb846314
SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

<<<<<<< HEAD
INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES ('285ZB5OC81G7S2A67XHA', '4I8XHFO8B6XYX39', '', 'California State Lottery', 'Vendor', '1.00', 'Cash', '370', '26', '2021-09-28', '2021-09-28 00:51:39', '')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'pos', 'Payout Transaction', 'INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES (\'285ZB5OC81G7S2A67XHA\', \'4I8XHFO8B6XYX39\', \'\', \'California State Lottery\', \'Vendor\', \'1.00\', \'Cash\', \'370\', \'26\', \'2021-09-28\', \'2021-09-28 00:51:39\', \'\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', '$1.00 Payout for Vendor Payout', '74,55,21,24,66,25,86,33,50,31', 'Vendor Payout', 'pos terminal', '2021-09-28 00:51:39')

=======
>>>>>>> 056007a8882f5f81059302b2020bbcddeb846314
SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

<<<<<<< HEAD
INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES ('39VB97RFLVYAFBDRGIDO', '4I8XHFO8B6XYX39', '', 'RNDC', 'Vendor', '1.00', 'Cash', '370', '26', '2021-09-28', '2021-09-28 00:53:05', '')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'pos', 'Payout Transaction', 'INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES (\'39VB97RFLVYAFBDRGIDO\', \'4I8XHFO8B6XYX39\', \'\', \'RNDC\', \'Vendor\', \'1.00\', \'Cash\', \'370\', \'26\', \'2021-09-28\', \'2021-09-28 00:53:05\', \'\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', '$1.00 Payout for Vendor Payout', '74,55,21,24,66,25,86,33,50,31', 'Vendor Payout', 'pos terminal', '2021-09-28 00:53:05')

=======
>>>>>>> 056007a8882f5f81059302b2020bbcddeb846314
SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

<<<<<<< HEAD
INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

UPDATE `tbl_leave_statistics` SET `leaves_taken` = 104, `req_leave_hours` = 0
WHERE `employee_id` = '22'
AND `leave_type` = '1'

INSERT INTO `tbl_emp_leave` (`employee_id`, `employee_name`, `start_date`, `end_date`, `leaveType`, `reason`, `days_requested`, `hours_requested`, `status`, `created_at`, `updated_at`) VALUES ('22', 'Gopal Yadav', '09-30-2021', '09-30-2021', '1', 'test', '1', '', 'Pending', '2021-09-28 00:54:57', '2021-09-28 00:54:57')

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Requested for leave', '74,55,21,24,66,25,86,33,50,31', 'pending', 'hrms', '2021-09-28 00:54:57')

UPDATE `tbl_leave_statistics` SET `leaves_taken` = 105, `req_leave_hours` = 0
WHERE `employee_id` = '22'
AND `leave_type` = '1'

INSERT INTO `tbl_emp_leave` (`employee_id`, `employee_name`, `start_date`, `end_date`, `leaveType`, `reason`, `days_requested`, `hours_requested`, `status`, `created_at`, `updated_at`) VALUES ('22', 'Gopal Yadav', '09-30-2021', '09-30-2021', '1', 'test', '1', '', 'Pending', '2021-09-28 00:55:20', '2021-09-28 00:55:20')

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Requested for leave', '74,55,21,24,66,25,86,33,50,31', 'pending', 'hrms', '2021-09-28 00:55:21')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

UPDATE `tbl_leave_statistics` SET `leaves_taken` = 106, `req_leave_hours` = 0
WHERE `employee_id` = '22'
AND `leave_type` = '1'

INSERT INTO `tbl_emp_leave` (`employee_id`, `employee_name`, `start_date`, `end_date`, `leaveType`, `reason`, `days_requested`, `hours_requested`, `status`, `created_at`, `updated_at`) VALUES ('22', 'Gopal Yadav', '09-30-2021', '09-30-2021', '1', 'test', '1', '', 'Pending', '2021-09-28 00:56:13', '2021-09-28 00:56:13')

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Requested for leave', '74,55,21,24,66,25,86,33,50,31', 'pending', 'hrms', '2021-09-28 00:56:13')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

UPDATE `tbl_leave_statistics` SET `leaves_taken` = 107, `req_leave_hours` = 0
WHERE `employee_id` = '22'
AND `leave_type` = '1'

INSERT INTO `tbl_emp_leave` (`employee_id`, `employee_name`, `start_date`, `end_date`, `leaveType`, `reason`, `days_requested`, `hours_requested`, `status`, `created_at`, `updated_at`) VALUES ('22', 'Gopal Yadav', '09-30-2021', '09-30-2021', '1', 'test', '1', '', 'Pending', '2021-09-28 00:56:58', '2021-09-28 00:56:58')

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Requested for leave', '74,55,21,24,66,25,86,33,50,31', 'pending', 'hrms', '2021-09-28 00:56:58')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('25', '4', 'Manager', 'Payal Motwani')

=======
>>>>>>> 056007a8882f5f81059302b2020bbcddeb846314
SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

<<<<<<< HEAD
INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES ('285ZB5OC81G7S2A67XHA', '4I8XHFO8B6XYX39', '', 'California State Lottery', 'Vendor', '1.00', 'Cash', '370', '26', '2021-09-28', '2021-09-28 00:57:33', '')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('25', 'pos', 'Payout Transaction', 'INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES (\'285ZB5OC81G7S2A67XHA\', \'4I8XHFO8B6XYX39\', \'\', \'California State Lottery\', \'Vendor\', \'1.00\', \'Cash\', \'370\', \'26\', \'2021-09-28\', \'2021-09-28 00:57:33\', \'\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('80', '$1.00 Payout for Vendor Payout', '74,55,21,24,66,25,86,33,50,31', 'Vendor Payout', 'pos terminal', '2021-09-28 00:57:33')

=======
>>>>>>> 056007a8882f5f81059302b2020bbcddeb846314
SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

<<<<<<< HEAD
INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('25', '4', 'Manager', 'Payal Motwani')

=======
>>>>>>> 056007a8882f5f81059302b2020bbcddeb846314
SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

<<<<<<< HEAD
INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES ('285ZB5OC81G7S2A67XHA', '4I8XHFO8B6XYX39', '', 'California State Lottery', 'Vendor', '1.00', 'Cash', '370', '26', '2021-09-28', '2021-09-28 00:58:05', '')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('25', 'pos', 'Payout Transaction', 'INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES (\'285ZB5OC81G7S2A67XHA\', \'4I8XHFO8B6XYX39\', \'\', \'California State Lottery\', \'Vendor\', \'1.00\', \'Cash\', \'370\', \'26\', \'2021-09-28\', \'2021-09-28 00:58:05\', \'\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('80', '$1.00 Payout for Vendor Payout', '74,55,21,24,66,25,86,33,50,31', 'Vendor Payout', 'pos terminal', '2021-09-28 00:58:06')

=======
>>>>>>> 056007a8882f5f81059302b2020bbcddeb846314
SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

<<<<<<< HEAD
INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES ('285ZB5OC81G7S2A67XHA', '4I8XHFO8B6XYX39', '', 'California State Lottery', 'Vendor', '1.00', 'Cash', '370', '26', '2021-09-28', '2021-09-28 01:00:18', '')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('25', 'pos', 'Payout Transaction', 'INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES (\'285ZB5OC81G7S2A67XHA\', \'4I8XHFO8B6XYX39\', \'\', \'California State Lottery\', \'Vendor\', \'1.00\', \'Cash\', \'370\', \'26\', \'2021-09-28\', \'2021-09-28 01:00:18\', \'\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('80', '$1.00 Payout for Vendor Payout', '74,55,21,24,66,25,86,33,50,31', 'Vendor Payout', 'pos terminal', '2021-09-28 01:00:18')

=======
>>>>>>> 056007a8882f5f81059302b2020bbcddeb846314
SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

<<<<<<< HEAD
SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES ('285ZB5OC81G7S2A67XHA', '4I8XHFO8B6XYX39', '', 'California State Lottery', 'Vendor', '1.00', 'Cash', '370', '26', '2021-09-28', '2021-09-28 01:03:26', '')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('25', 'pos', 'Payout Transaction', 'INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES (\'285ZB5OC81G7S2A67XHA\', \'4I8XHFO8B6XYX39\', \'\', \'California State Lottery\', \'Vendor\', \'1.00\', \'Cash\', \'370\', \'26\', \'2021-09-28\', \'2021-09-28 01:03:26\', \'\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('80', '$1.00 Payout for Vendor Payout', '74,55,21,24,66,25,86,33,50,31', 'Vendor Payout', 'pos terminal', '2021-09-28 01:03:27')
=======
INSERT INTO `product_information` (`product_id`, `case_UPC`, `product_name`, `onsale_price`, `short_name`, `is_custom_product`, `Applicable_CRV`, `Applicable_Tax`, `size`, `image_thumb`, `created_at`, `updated_at`) VALUES ('W5OOQYEC', '1632836494121', 'test ravi', '1.00', 'test ravi', '1', '1', '0', '375 ml', './uploads/products/600px-No_image_available.svg (2).png', '2021-09-28 06:41:46', '2021-09-28 06:41:46')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Custom Product Insert', 'INSERT INTO `product_information` (`product_id`, `case_UPC`, `product_name`, `onsale_price`, `short_name`, `is_custom_product`, `Applicable_CRV`, `Applicable_Tax`, `size`, `image_thumb`, `created_at`, `updated_at`) VALUES (\'W5OOQYEC\', \'1632836494121\', \'test ravi\', \'1.00\', \'test ravi\', \'1\', \'1\', \'0\', \'375 ml\', \'./uploads/products/600px-No_image_available.svg (2).png\', \'2021-09-28 06:41:46\', \'2021-09-28 06:41:46\')', 0, 0)

INSERT INTO `product_information` (`product_id`, `case_UPC`, `product_name`, `onsale_price`, `short_name`, `is_custom_product`, `Applicable_CRV`, `Applicable_Tax`, `size`, `image_thumb`, `created_at`, `updated_at`) VALUES ('AZXXQ89T', '1632836494121', 'test ravi', '1.00', 'test ravi', '1', '1', '0', '375 ml', './uploads/products/600px-No_image_available.svg (2).png', '2021-09-28 06:41:47', '2021-09-28 06:41:47')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Custom Product Insert', 'INSERT INTO `product_information` (`product_id`, `case_UPC`, `product_name`, `onsale_price`, `short_name`, `is_custom_product`, `Applicable_CRV`, `Applicable_Tax`, `size`, `image_thumb`, `created_at`, `updated_at`) VALUES (\'AZXXQ89T\', \'1632836494121\', \'test ravi\', \'1.00\', \'test ravi\', \'1\', \'1\', \'0\', \'375 ml\', \'./uploads/products/600px-No_image_available.svg (2).png\', \'2021-09-28 06:41:47\', \'2021-09-28 06:41:47\')', 0, 0)
>>>>>>> 056007a8882f5f81059302b2020bbcddeb846314

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

<<<<<<< HEAD
INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES ('285ZB5OC81G7S2A67XHA', '4I8XHFO8B6XYX39', '', 'California State Lottery', 'Vendor', '1.00', 'Cash', '370', '26', '2021-09-28', '2021-09-28 01:07:25', '')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('25', 'pos', 'Payout Transaction', 'INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES (\'285ZB5OC81G7S2A67XHA\', \'4I8XHFO8B6XYX39\', \'\', \'California State Lottery\', \'Vendor\', \'1.00\', \'Cash\', \'370\', \'26\', \'2021-09-28\', \'2021-09-28 01:07:25\', \'\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('80', '$1.00 Payout for Vendor Payout', '74,55,21,24,66,25,86,33,50,31', 'Vendor Payout', 'pos terminal', '2021-09-28 01:07:25')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('25', '4', 'Manager', 'Payal Motwani')
=======
INSERT INTO `product_information` (`product_id`, `case_UPC`, `product_name`, `onsale_price`, `short_name`, `is_custom_product`, `Applicable_CRV`, `Applicable_Tax`, `size`, `image_thumb`, `created_at`, `updated_at`) VALUES ('52F5XV9R', '1632836848777', 'ravi 2', '1.00', 'ravi 2', '1', '0', '0', '0', './uploads/products/600px-No_image_available.svg (2).png', '2021-09-28 06:47:49', '2021-09-28 06:47:49')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Custom Product Insert', 'INSERT INTO `product_information` (`product_id`, `case_UPC`, `product_name`, `onsale_price`, `short_name`, `is_custom_product`, `Applicable_CRV`, `Applicable_Tax`, `size`, `image_thumb`, `created_at`, `updated_at`) VALUES (\'52F5XV9R\', \'1632836848777\', \'ravi 2\', \'1.00\', \'ravi 2\', \'1\', \'0\', \'0\', \'0\', \'./uploads/products/600px-No_image_available.svg (2).png\', \'2021-09-28 06:47:49\', \'2021-09-28 06:47:49\')', 0, 0)
>>>>>>> 056007a8882f5f81059302b2020bbcddeb846314

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

<<<<<<< HEAD
INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

UPDATE `tbl_user_shift` SET `terminal_id` = '26', `username` = '22', `cash_out_drawer` = '100.00', `coin_dispenser_out` = '0', `bin_data_out` = '[\"00\",\"000\",\"000123\",\"214748364765554872\"]', `datetime_out` = '2021-09-28 01:10:31', `defer_shift` = 0, `shift_in_out` = 2
WHERE `username` = '22'
AND `id` = 369
AND `terminal_id` = '26'
AND `date` = '2021-09-28'

UPDATE `user_login` SET `user_shift_status` = 0
WHERE `username` = '22'

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'End Shift', '74,55,21,24,66,25,86,33,50,31', 'shift out', 'clock in out', '2021-09-28 01:10:31')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('25', '4', 'Manager', 'Payal Motwani')

UPDATE `user_login` SET `user_shift_status` = 1
WHERE `username` = '25'

INSERT INTO `tbl_user_shift` (`terminal_id`, `username`, `cash_in_drawer`, `coin_dispenser_in`, `bin_data_in`, `datetime_in`, `datetime_out`, `date`, `defer_shift`, `shift_in_out`) VALUES ('26', '25', '100.00', '0', '[\"00\",\"000\",\"000123\",\"214748364765554872\"]', '2021-09-28 01:10:53', '2021-09-28 01:10:53', '2021-09-28', '0', 1)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('80', 'Start Shift', '74,55,21,24,66,25,86,33,50,31', 'shift in', 'clock in out', '2021-09-28 01:10:54')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('25', '4', 'Manager', 'Payal Motwani')

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`
=======
INSERT INTO `product_information` (`product_id`, `case_UPC`, `product_name`, `onsale_price`, `short_name`, `is_custom_product`, `Applicable_CRV`, `Applicable_Tax`, `size`, `image_thumb`, `created_at`, `updated_at`) VALUES ('A5K1FG4H', '1632836887057', 'ravi 3', '50.50', 'ravi 3', '1', '1', '0', '750 ml', './uploads/products/600px-No_image_available.svg (2).png', '2021-09-28 06:48:29', '2021-09-28 06:48:29')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Custom Product Insert', 'INSERT INTO `product_information` (`product_id`, `case_UPC`, `product_name`, `onsale_price`, `short_name`, `is_custom_product`, `Applicable_CRV`, `Applicable_Tax`, `size`, `image_thumb`, `created_at`, `updated_at`) VALUES (\'A5K1FG4H\', \'1632836887057\', \'ravi 3\', \'50.50\', \'ravi 3\', \'1\', \'1\', \'0\', \'750 ml\', \'./uploads/products/600px-No_image_available.svg (2).png\', \'2021-09-28 06:48:29\', \'2021-09-28 06:48:29\')', 0, 0)

INSERT INTO `product_information` (`product_id`, `case_UPC`, `product_name`, `onsale_price`, `short_name`, `is_custom_product`, `Applicable_CRV`, `Applicable_Tax`, `size`, `image_thumb`, `created_at`, `updated_at`) VALUES ('IT1MH1ND', '1632836887057', 'ravi 3', '50.50', 'ravi 3', '1', '1', '0', '750 ml', './uploads/products/600px-No_image_available.svg (2).png', '2021-09-28 06:48:29', '2021-09-28 06:48:29')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Custom Product Insert', 'INSERT INTO `product_information` (`product_id`, `case_UPC`, `product_name`, `onsale_price`, `short_name`, `is_custom_product`, `Applicable_CRV`, `Applicable_Tax`, `size`, `image_thumb`, `created_at`, `updated_at`) VALUES (\'IT1MH1ND\', \'1632836887057\', \'ravi 3\', \'50.50\', \'ravi 3\', \'1\', \'1\', \'0\', \'750 ml\', \'./uploads/products/600px-No_image_available.svg (2).png\', \'2021-09-28 06:48:29\', \'2021-09-28 06:48:29\')', 0, 0)
>>>>>>> 056007a8882f5f81059302b2020bbcddeb846314

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

<<<<<<< HEAD
INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES ('285ZB5OC81G7S2A67XHA', '4I8XHFO8B6XYX39', '', 'California State Lottery', 'Vendor', '1.00', 'Cash', '370', '26', '2021-09-28', '2021-09-28 01:11:39', '')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('25', 'pos', 'Payout Transaction', 'INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES (\'285ZB5OC81G7S2A67XHA\', \'4I8XHFO8B6XYX39\', \'\', \'California State Lottery\', \'Vendor\', \'1.00\', \'Cash\', \'370\', \'26\', \'2021-09-28\', \'2021-09-28 01:11:39\', \'\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('80', '$1.00 Payout for Vendor Payout', '74,55,21,24,66,25,86,33,50,31', 'Vendor Payout', 'pos terminal', '2021-09-28 01:11:39')

=======
>>>>>>> 056007a8882f5f81059302b2020bbcddeb846314
SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

<<<<<<< HEAD
SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`
=======
INSERT INTO `product_information` (`product_id`, `case_UPC`, `product_name`, `onsale_price`, `short_name`, `is_custom_product`, `Applicable_CRV`, `Applicable_Tax`, `size`, `image_thumb`, `created_at`, `updated_at`) VALUES ('AC5YC3BJ', '1632836937107', 'ravi4', '4.00', 'ravi4', '1', '1', '0', '150 ml', './uploads/products/600px-No_image_available.svg (2).png', '2021-09-28 06:52:33', '2021-09-28 06:52:33')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Custom Product Insert', 'INSERT INTO `product_information` (`product_id`, `case_UPC`, `product_name`, `onsale_price`, `short_name`, `is_custom_product`, `Applicable_CRV`, `Applicable_Tax`, `size`, `image_thumb`, `created_at`, `updated_at`) VALUES (\'AC5YC3BJ\', \'1632836937107\', \'ravi4\', \'4.00\', \'ravi4\', \'1\', \'1\', \'0\', \'150 ml\', \'./uploads/products/600px-No_image_available.svg (2).png\', \'2021-09-28 06:52:33\', \'2021-09-28 06:52:33\')', 0, 0)
>>>>>>> 056007a8882f5f81059302b2020bbcddeb846314

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

<<<<<<< HEAD
INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('25', '4', 'Manager', 'Payal Motwani')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

UPDATE `product_category` SET `measurement_value` = '3.25 oz,2.75 oz,4.76 oz,9.26 oz,4.25 oz,12.5 oz,9.25 oz,1 oz,2 oz,2.5/8 oz,2.3/4 oz,3 oz,3.5/8 oz,3.1/4 oz,4 oz,4.1/4 oz,5.1/4 oz,6 oz,7.3/4 oz,8 oz,8.1/2 oz,9.3/4 oz,9.9 oz,12.1/2 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

UPDATE `product_category` SET `is_last_size` = '12.5 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

DELETE FROM `product_combos`
WHERE `product_id` = 'TQAAI9AT'

UPDATE `product_information` SET `product_name` = 'Demo', `short_name` = 'demo', `category_id` = 'YA9VV7IK4SLX9UQ', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = '12.5 oz', `supplier` = 'lunavos', `supplier_id` = 'ZMDTDANN31RLJYIKOSPD', `product_details` = '', `producer` = '', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '7', `abv` = '', `proof` = '', `region` = '', `supplier_price` = NULL, `price` = '0', `onsale_price` = '12.56', `ecomm_sale_price` = '', `store_promotion_price` = '10.14', `ecomm_promotion_price` = '', `Applicable_CRV` = '1', `Applicable_Tax` = NULL, `is_ecommerce` = '1', `parent_product` = 'OR9AE294', `reorder_level` = '5', `created_at` = '2021-09-28 03:25:18', `updated_at` = '2021-09-28 03:25:18'
WHERE `product_id` = 'TQAAI9AT'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'Demo\', `short_name` = \'demo\', `category_id` = \'YA9VV7IK4SLX9UQ\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = \'12.5 oz\', `supplier` = \'lunavos\', `supplier_id` = \'ZMDTDANN31RLJYIKOSPD\', `product_details` = \'\', `producer` = \'\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'7\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = NULL, `price` = \'0\', `onsale_price` = \'12.56\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'10.14\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = \'1\', `Applicable_Tax` = NULL, `is_ecommerce` = \'1\', `parent_product` = \'OR9AE294\', `reorder_level` = \'5\', `created_at` = \'2021-09-28 03:25:18\', `updated_at` = \'2021-09-28 03:25:18\'\nWHERE `product_id` = \'TQAAI9AT\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Update Product Demo (jbjbjb)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 03:25:19')

UPDATE `product_category` SET `measurement_value` = '3.25 oz,2.75 oz,4.76 oz,9.26 oz,4.25 oz,12.5 oz,9.25 oz,1 oz,2 oz,2.5/8 oz,2.3/4 oz,3 oz,3.5/8 oz,3.1/4 oz,4 oz,4.1/4 oz,5.1/4 oz,6 oz,7.3/4 oz,8 oz,8.1/2 oz,9.3/4 oz,9.9 oz,12.1/2 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

UPDATE `product_category` SET `is_last_size` = '12.5 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

DELETE FROM `product_combos`
WHERE `product_id` = 'TQAAI9AT'

UPDATE `product_information` SET `product_name` = 'Demo', `short_name` = 'demo', `category_id` = 'YA9VV7IK4SLX9UQ', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = '12.5 oz', `supplier` = 'lunavos', `supplier_id` = 'ZMDTDANN31RLJYIKOSPD', `product_details` = '', `producer` = '', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '7', `abv` = '', `proof` = '', `region` = '', `supplier_price` = NULL, `price` = '0', `onsale_price` = '12.56', `ecomm_sale_price` = '', `store_promotion_price` = '10.14', `ecomm_promotion_price` = '', `Applicable_CRV` = '1', `Applicable_Tax` = NULL, `is_ecommerce` = '1', `parent_product` = 'OR9AE294', `reorder_level` = '5', `created_at` = '2021-09-28 03:25:38', `updated_at` = '2021-09-28 03:25:38'
WHERE `product_id` = 'TQAAI9AT'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'Demo\', `short_name` = \'demo\', `category_id` = \'YA9VV7IK4SLX9UQ\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = \'12.5 oz\', `supplier` = \'lunavos\', `supplier_id` = \'ZMDTDANN31RLJYIKOSPD\', `product_details` = \'\', `producer` = \'\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'7\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = NULL, `price` = \'0\', `onsale_price` = \'12.56\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'10.14\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = \'1\', `Applicable_Tax` = NULL, `is_ecommerce` = \'1\', `parent_product` = \'OR9AE294\', `reorder_level` = \'5\', `created_at` = \'2021-09-28 03:25:38\', `updated_at` = \'2021-09-28 03:25:38\'\nWHERE `product_id` = \'TQAAI9AT\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Update Product Demo (jbjbjb)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 03:25:38')

UPDATE `product_category` SET `measurement_value` = '3.25 oz,2.75 oz,4.76 oz,9.26 oz,4.25 oz,12.5 oz,9.25 oz,1 oz,2 oz,2.5/8 oz,2.3/4 oz,3 oz,3.5/8 oz,3.1/4 oz,4 oz,4.1/4 oz,5.1/4 oz,6 oz,7.3/4 oz,8 oz,8.1/2 oz,9.3/4 oz,9.9 oz,12.1/2 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

UPDATE `product_category` SET `is_last_size` = '12.5 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

DELETE FROM `product_combos`
WHERE `product_id` = 'TQAAI9AT'

UPDATE `product_information` SET `product_name` = 'Demo', `short_name` = 'demo', `category_id` = 'YA9VV7IK4SLX9UQ', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = '12.5 oz', `supplier` = 'lunavos', `supplier_id` = 'ZMDTDANN31RLJYIKOSPD', `product_details` = '', `producer` = '', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '7', `abv` = '', `proof` = '', `region` = '', `supplier_price` = NULL, `price` = '0', `onsale_price` = '12.56', `ecomm_sale_price` = '', `store_promotion_price` = '10.14', `ecomm_promotion_price` = '', `Applicable_CRV` = '1', `Applicable_Tax` = NULL, `is_ecommerce` = '1', `parent_product` = 'OR9AE294', `reorder_level` = '5', `created_at` = '2021-09-28 03:25:40', `updated_at` = '2021-09-28 03:25:40'
WHERE `product_id` = 'TQAAI9AT'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'Demo\', `short_name` = \'demo\', `category_id` = \'YA9VV7IK4SLX9UQ\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = \'12.5 oz\', `supplier` = \'lunavos\', `supplier_id` = \'ZMDTDANN31RLJYIKOSPD\', `product_details` = \'\', `producer` = \'\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'7\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = NULL, `price` = \'0\', `onsale_price` = \'12.56\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'10.14\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = \'1\', `Applicable_Tax` = NULL, `is_ecommerce` = \'1\', `parent_product` = \'OR9AE294\', `reorder_level` = \'5\', `created_at` = \'2021-09-28 03:25:40\', `updated_at` = \'2021-09-28 03:25:40\'\nWHERE `product_id` = \'TQAAI9AT\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Update Product Demo (jbjbjb)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 03:25:40')

UPDATE `product_category` SET `measurement_value` = '3.25 oz,2.75 oz,4.76 oz,9.26 oz,4.25 oz,12.5 oz,9.25 oz,1 oz,2 oz,2.5/8 oz,2.3/4 oz,3 oz,3.5/8 oz,3.1/4 oz,4 oz,4.1/4 oz,5.1/4 oz,6 oz,7.3/4 oz,8 oz,8.1/2 oz,9.3/4 oz,9.9 oz,12.1/2 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

UPDATE `product_category` SET `is_last_size` = '12.5 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

DELETE FROM `product_combos`
WHERE `product_id` = 'TQAAI9AT'

UPDATE `product_information` SET `product_name` = 'Demo', `short_name` = 'demo', `category_id` = 'YA9VV7IK4SLX9UQ', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = '12.5 oz', `supplier` = 'lunavos', `supplier_id` = 'ZMDTDANN31RLJYIKOSPD', `product_details` = '', `producer` = '', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '7', `abv` = '', `proof` = '', `region` = '', `supplier_price` = NULL, `price` = '0', `onsale_price` = '12.56', `ecomm_sale_price` = '', `store_promotion_price` = '10.14', `ecomm_promotion_price` = '', `Applicable_CRV` = '1', `Applicable_Tax` = NULL, `is_ecommerce` = '1', `parent_product` = 'OR9AE294', `reorder_level` = '5', `created_at` = '2021-09-28 03:25:42', `updated_at` = '2021-09-28 03:25:42'
WHERE `product_id` = 'TQAAI9AT'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'Demo\', `short_name` = \'demo\', `category_id` = \'YA9VV7IK4SLX9UQ\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = \'12.5 oz\', `supplier` = \'lunavos\', `supplier_id` = \'ZMDTDANN31RLJYIKOSPD\', `product_details` = \'\', `producer` = \'\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'7\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = NULL, `price` = \'0\', `onsale_price` = \'12.56\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'10.14\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = \'1\', `Applicable_Tax` = NULL, `is_ecommerce` = \'1\', `parent_product` = \'OR9AE294\', `reorder_level` = \'5\', `created_at` = \'2021-09-28 03:25:42\', `updated_at` = \'2021-09-28 03:25:42\'\nWHERE `product_id` = \'TQAAI9AT\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Update Product Demo (jbjbjb)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 03:25:42')

UPDATE `product_category` SET `measurement_value` = '3.25 oz,2.75 oz,4.76 oz,9.26 oz,4.25 oz,12.5 oz,9.25 oz,1 oz,2 oz,2.5/8 oz,2.3/4 oz,3 oz,3.5/8 oz,3.1/4 oz,4 oz,4.1/4 oz,5.1/4 oz,6 oz,7.3/4 oz,8 oz,8.1/2 oz,9.3/4 oz,9.9 oz,12.1/2 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

UPDATE `product_category` SET `is_last_size` = '12.5 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

DELETE FROM `product_combos`
WHERE `product_id` = 'TQAAI9AT'

UPDATE `product_information` SET `product_name` = 'Demo', `short_name` = 'demo', `category_id` = 'YA9VV7IK4SLX9UQ', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = '12.5 oz', `supplier` = 'lunavos', `supplier_id` = 'ZMDTDANN31RLJYIKOSPD', `product_details` = '', `producer` = '', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '7', `abv` = '', `proof` = '', `region` = '', `supplier_price` = NULL, `price` = '0', `onsale_price` = '12.56', `ecomm_sale_price` = '', `store_promotion_price` = '10.14', `ecomm_promotion_price` = '', `Applicable_CRV` = '1', `Applicable_Tax` = NULL, `is_ecommerce` = '1', `parent_product` = 'OR9AE294', `reorder_level` = '5', `created_at` = '2021-09-28 03:25:45', `updated_at` = '2021-09-28 03:25:45'
WHERE `product_id` = 'TQAAI9AT'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'Demo\', `short_name` = \'demo\', `category_id` = \'YA9VV7IK4SLX9UQ\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = \'12.5 oz\', `supplier` = \'lunavos\', `supplier_id` = \'ZMDTDANN31RLJYIKOSPD\', `product_details` = \'\', `producer` = \'\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'7\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = NULL, `price` = \'0\', `onsale_price` = \'12.56\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'10.14\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = \'1\', `Applicable_Tax` = NULL, `is_ecommerce` = \'1\', `parent_product` = \'OR9AE294\', `reorder_level` = \'5\', `created_at` = \'2021-09-28 03:25:45\', `updated_at` = \'2021-09-28 03:25:45\'\nWHERE `product_id` = \'TQAAI9AT\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Update Product Demo (jbjbjb)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 03:25:45')

UPDATE `product_category` SET `measurement_value` = '3.25 oz,2.75 oz,4.76 oz,9.26 oz,4.25 oz,12.5 oz,9.25 oz,1 oz,2 oz,2.5/8 oz,2.3/4 oz,3 oz,3.5/8 oz,3.1/4 oz,4 oz,4.1/4 oz,5.1/4 oz,6 oz,7.3/4 oz,8 oz,8.1/2 oz,9.3/4 oz,9.9 oz,12.1/2 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

UPDATE `product_category` SET `is_last_size` = '12.5 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

DELETE FROM `product_combos`
WHERE `product_id` = 'TQAAI9AT'

UPDATE `product_information` SET `product_name` = 'Demo', `short_name` = 'demo', `category_id` = 'YA9VV7IK4SLX9UQ', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = '12.5 oz', `supplier` = 'lunavos', `supplier_id` = 'ZMDTDANN31RLJYIKOSPD', `product_details` = '', `producer` = '', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '7', `abv` = '', `proof` = '', `region` = '', `supplier_price` = NULL, `price` = '0', `onsale_price` = '12.56', `ecomm_sale_price` = '', `store_promotion_price` = '10.14', `ecomm_promotion_price` = '', `Applicable_CRV` = '1', `Applicable_Tax` = NULL, `is_ecommerce` = '1', `parent_product` = 'OR9AE294', `reorder_level` = '5', `created_at` = '2021-09-28 03:25:47', `updated_at` = '2021-09-28 03:25:47'
WHERE `product_id` = 'TQAAI9AT'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'Demo\', `short_name` = \'demo\', `category_id` = \'YA9VV7IK4SLX9UQ\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = \'12.5 oz\', `supplier` = \'lunavos\', `supplier_id` = \'ZMDTDANN31RLJYIKOSPD\', `product_details` = \'\', `producer` = \'\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'7\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = NULL, `price` = \'0\', `onsale_price` = \'12.56\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'10.14\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = \'1\', `Applicable_Tax` = NULL, `is_ecommerce` = \'1\', `parent_product` = \'OR9AE294\', `reorder_level` = \'5\', `created_at` = \'2021-09-28 03:25:47\', `updated_at` = \'2021-09-28 03:25:47\'\nWHERE `product_id` = \'TQAAI9AT\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Update Product Demo (jbjbjb)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 03:25:47')

UPDATE `product_category` SET `measurement_value` = '3.25 oz,2.75 oz,4.76 oz,9.26 oz,4.25 oz,12.5 oz,9.25 oz,1 oz,2 oz,2.5/8 oz,2.3/4 oz,3 oz,3.5/8 oz,3.1/4 oz,4 oz,4.1/4 oz,5.1/4 oz,6 oz,7.3/4 oz,8 oz,8.1/2 oz,9.3/4 oz,9.9 oz,12.1/2 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

UPDATE `product_category` SET `is_last_size` = '12.5 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

DELETE FROM `product_combos`
WHERE `product_id` = 'TQAAI9AT'

UPDATE `product_information` SET `product_name` = 'Demo', `short_name` = 'demo', `category_id` = 'YA9VV7IK4SLX9UQ', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = '12.5 oz', `supplier` = 'lunavos', `supplier_id` = 'ZMDTDANN31RLJYIKOSPD', `product_details` = '', `producer` = '', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '7', `abv` = '', `proof` = '', `region` = '', `supplier_price` = NULL, `price` = '0', `onsale_price` = '12.56', `ecomm_sale_price` = '', `store_promotion_price` = '10.14', `ecomm_promotion_price` = '', `Applicable_CRV` = '1', `Applicable_Tax` = NULL, `is_ecommerce` = '1', `parent_product` = 'OR9AE294', `reorder_level` = '5', `created_at` = '2021-09-28 03:25:49', `updated_at` = '2021-09-28 03:25:49'
WHERE `product_id` = 'TQAAI9AT'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'Demo\', `short_name` = \'demo\', `category_id` = \'YA9VV7IK4SLX9UQ\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = \'12.5 oz\', `supplier` = \'lunavos\', `supplier_id` = \'ZMDTDANN31RLJYIKOSPD\', `product_details` = \'\', `producer` = \'\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'7\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = NULL, `price` = \'0\', `onsale_price` = \'12.56\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'10.14\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = \'1\', `Applicable_Tax` = NULL, `is_ecommerce` = \'1\', `parent_product` = \'OR9AE294\', `reorder_level` = \'5\', `created_at` = \'2021-09-28 03:25:49\', `updated_at` = \'2021-09-28 03:25:49\'\nWHERE `product_id` = \'TQAAI9AT\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Update Product Demo (jbjbjb)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 03:25:49')

UPDATE `product_category` SET `measurement_value` = '3.25 oz,2.75 oz,4.76 oz,9.26 oz,4.25 oz,12.5 oz,9.25 oz,1 oz,2 oz,2.5/8 oz,2.3/4 oz,3 oz,3.5/8 oz,3.1/4 oz,4 oz,4.1/4 oz,5.1/4 oz,6 oz,7.3/4 oz,8 oz,8.1/2 oz,9.3/4 oz,9.9 oz,12.1/2 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

UPDATE `product_category` SET `is_last_size` = '12.5 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

DELETE FROM `product_combos`
WHERE `product_id` = 'TQAAI9AT'

DELETE FROM `product_combos`
WHERE `product_id` = 'TQAAI9AT'

UPDATE `product_information` SET `product_name` = 'Demo', `short_name` = 'demo', `category_id` = 'YA9VV7IK4SLX9UQ', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = '12.5 oz', `supplier` = 'lunavos', `supplier_id` = 'ZMDTDANN31RLJYIKOSPD', `product_details` = '', `producer` = '', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '7', `abv` = '', `proof` = '', `region` = '', `supplier_price` = NULL, `price` = '0', `onsale_price` = '12.56', `ecomm_sale_price` = '', `store_promotion_price` = '10.14', `ecomm_promotion_price` = '', `Applicable_CRV` = '1', `Applicable_Tax` = NULL, `is_ecommerce` = '1', `parent_product` = 'OR9AE294', `reorder_level` = '5', `created_at` = '2021-09-28 03:26:11', `updated_at` = '2021-09-28 03:26:11'
WHERE `product_id` = 'TQAAI9AT'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'Demo\', `short_name` = \'demo\', `category_id` = \'YA9VV7IK4SLX9UQ\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = \'12.5 oz\', `supplier` = \'lunavos\', `supplier_id` = \'ZMDTDANN31RLJYIKOSPD\', `product_details` = \'\', `producer` = \'\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'7\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = NULL, `price` = \'0\', `onsale_price` = \'12.56\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'10.14\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = \'1\', `Applicable_Tax` = NULL, `is_ecommerce` = \'1\', `parent_product` = \'OR9AE294\', `reorder_level` = \'5\', `created_at` = \'2021-09-28 03:26:11\', `updated_at` = \'2021-09-28 03:26:11\'\nWHERE `product_id` = \'TQAAI9AT\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Update Product Demo (jbjbjb)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 03:26:11')

UPDATE `product_category` SET `measurement_value` = '3.25 oz,2.75 oz,4.76 oz,9.26 oz,4.25 oz,12.5 oz,9.25 oz,1 oz,2 oz,2.5/8 oz,2.3/4 oz,3 oz,3.5/8 oz,3.1/4 oz,4 oz,4.1/4 oz,5.1/4 oz,6 oz,7.3/4 oz,8 oz,8.1/2 oz,9.3/4 oz,9.9 oz,12.1/2 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

UPDATE `product_category` SET `is_last_size` = '12.5 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

DELETE FROM `product_combos`
WHERE `product_id` = 'TQAAI9AT'

DELETE FROM `product_combos`
WHERE `product_id` = 'TQAAI9AT'

UPDATE `product_information` SET `product_name` = 'Demo', `short_name` = 'demo', `category_id` = 'YA9VV7IK4SLX9UQ', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = '12.5 oz', `supplier` = 'lunavos', `supplier_id` = 'ZMDTDANN31RLJYIKOSPD', `product_details` = '', `producer` = '', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '7', `abv` = '', `proof` = '', `region` = '', `supplier_price` = NULL, `price` = '0', `onsale_price` = '12.56', `ecomm_sale_price` = '', `store_promotion_price` = '10.14', `ecomm_promotion_price` = '', `Applicable_CRV` = '1', `Applicable_Tax` = NULL, `is_ecommerce` = '1', `parent_product` = 'OR9AE294', `reorder_level` = '5', `created_at` = '2021-09-28 03:26:43', `updated_at` = '2021-09-28 03:26:43'
WHERE `product_id` = 'TQAAI9AT'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('25', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'Demo\', `short_name` = \'demo\', `category_id` = \'YA9VV7IK4SLX9UQ\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = \'12.5 oz\', `supplier` = \'lunavos\', `supplier_id` = \'ZMDTDANN31RLJYIKOSPD\', `product_details` = \'\', `producer` = \'\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'7\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = NULL, `price` = \'0\', `onsale_price` = \'12.56\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'10.14\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = \'1\', `Applicable_Tax` = NULL, `is_ecommerce` = \'1\', `parent_product` = \'OR9AE294\', `reorder_level` = \'5\', `created_at` = \'2021-09-28 03:26:43\', `updated_at` = \'2021-09-28 03:26:43\'\nWHERE `product_id` = \'TQAAI9AT\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('80', 'Update Product Demo (jbjbjb)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 03:26:43')

UPDATE `product_category` SET `measurement_value` = '3.25 oz,2.75 oz,4.76 oz,9.26 oz,4.25 oz,12.5 oz,9.25 oz,1 oz,2 oz,2.5/8 oz,2.3/4 oz,3 oz,3.5/8 oz,3.1/4 oz,4 oz,4.1/4 oz,5.1/4 oz,6 oz,7.3/4 oz,8 oz,8.1/2 oz,9.3/4 oz,9.9 oz,12.1/2 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

UPDATE `product_category` SET `is_last_size` = '12.5 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

DELETE FROM `product_combos`
WHERE `product_id` = 'TQAAI9AT'

DELETE FROM `product_combos`
WHERE `product_id` = 'TQAAI9AT'

UPDATE `product_information` SET `product_name` = 'Demo', `short_name` = 'demo', `category_id` = 'YA9VV7IK4SLX9UQ', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = '12.5 oz', `supplier` = 'lunavos', `supplier_id` = 'ZMDTDANN31RLJYIKOSPD', `product_details` = '', `producer` = '', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '7', `abv` = '', `proof` = '', `region` = '', `supplier_price` = NULL, `price` = '0', `onsale_price` = '12.56', `ecomm_sale_price` = '', `store_promotion_price` = '10.14', `ecomm_promotion_price` = '', `Applicable_CRV` = '1', `Applicable_Tax` = NULL, `is_ecommerce` = '1', `parent_product` = 'OR9AE294', `reorder_level` = '5', `created_at` = '2021-09-28 03:27:23', `updated_at` = '2021-09-28 03:27:23'
WHERE `product_id` = 'TQAAI9AT'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'Demo\', `short_name` = \'demo\', `category_id` = \'YA9VV7IK4SLX9UQ\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = \'12.5 oz\', `supplier` = \'lunavos\', `supplier_id` = \'ZMDTDANN31RLJYIKOSPD\', `product_details` = \'\', `producer` = \'\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'7\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = NULL, `price` = \'0\', `onsale_price` = \'12.56\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'10.14\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = \'1\', `Applicable_Tax` = NULL, `is_ecommerce` = \'1\', `parent_product` = \'OR9AE294\', `reorder_level` = \'5\', `created_at` = \'2021-09-28 03:27:23\', `updated_at` = \'2021-09-28 03:27:23\'\nWHERE `product_id` = \'TQAAI9AT\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Update Product Demo (jbjbjb)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 03:27:23')

UPDATE `product_category` SET `measurement_value` = '3.25 oz,2.75 oz,4.76 oz,9.26 oz,4.25 oz,12.5 oz,9.25 oz,1 oz,2 oz,2.5/8 oz,2.3/4 oz,3 oz,3.5/8 oz,3.1/4 oz,4 oz,4.1/4 oz,5.1/4 oz,6 oz,7.3/4 oz,8 oz,8.1/2 oz,9.3/4 oz,9.9 oz,12.1/2 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

UPDATE `product_category` SET `is_last_size` = '12.5 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

DELETE FROM `product_combos`
WHERE `product_id` = 'TQAAI9AT'

DELETE FROM `product_combos`
WHERE `product_id` = 'TQAAI9AT'

UPDATE `product_information` SET `product_name` = 'Demo', `short_name` = 'demo', `category_id` = 'YA9VV7IK4SLX9UQ', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = '12.5 oz', `supplier` = 'lunavos', `supplier_id` = 'ZMDTDANN31RLJYIKOSPD', `product_details` = '', `producer` = '', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '7', `abv` = '', `proof` = '', `region` = '', `supplier_price` = NULL, `price` = '0', `onsale_price` = '12.56', `ecomm_sale_price` = '', `store_promotion_price` = '10.14', `ecomm_promotion_price` = '', `Applicable_CRV` = '1', `Applicable_Tax` = NULL, `is_ecommerce` = '1', `parent_product` = 'OR9AE294', `reorder_level` = '5', `created_at` = '2021-09-28 03:35:05', `updated_at` = '2021-09-28 03:35:05'
WHERE `product_id` = 'TQAAI9AT'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'Demo\', `short_name` = \'demo\', `category_id` = \'YA9VV7IK4SLX9UQ\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = \'12.5 oz\', `supplier` = \'lunavos\', `supplier_id` = \'ZMDTDANN31RLJYIKOSPD\', `product_details` = \'\', `producer` = \'\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'7\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = NULL, `price` = \'0\', `onsale_price` = \'12.56\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'10.14\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = \'1\', `Applicable_Tax` = NULL, `is_ecommerce` = \'1\', `parent_product` = \'OR9AE294\', `reorder_level` = \'5\', `created_at` = \'2021-09-28 03:35:05\', `updated_at` = \'2021-09-28 03:35:05\'\nWHERE `product_id` = \'TQAAI9AT\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Update Product Demo (jbjbjb)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 03:35:06')

UPDATE `product_category` SET `measurement_value` = '3.25 oz,2.75 oz,4.76 oz,9.26 oz,4.25 oz,12.5 oz,9.25 oz,1 oz,2 oz,2.5/8 oz,2.3/4 oz,3 oz,3.5/8 oz,3.1/4 oz,4 oz,4.1/4 oz,5.1/4 oz,6 oz,7.3/4 oz,8 oz,8.1/2 oz,9.3/4 oz,9.9 oz,12.1/2 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

UPDATE `product_category` SET `is_last_size` = '12.5 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

DELETE FROM `product_combos`
WHERE `product_id` = 'TQAAI9AT'

DELETE FROM `product_combos`
WHERE `product_id` = 'TQAAI9AT'

UPDATE `product_information` SET `product_name` = 'Demo', `short_name` = 'demo', `category_id` = 'YA9VV7IK4SLX9UQ', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = '12.5 oz', `supplier` = 'lunavos', `supplier_id` = 'ZMDTDANN31RLJYIKOSPD', `product_details` = '', `producer` = '', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '7', `abv` = '', `proof` = '', `region` = '', `supplier_price` = NULL, `price` = '0', `onsale_price` = '12.56', `ecomm_sale_price` = '', `store_promotion_price` = '10.14', `ecomm_promotion_price` = '', `Applicable_CRV` = '1', `Applicable_Tax` = NULL, `is_ecommerce` = '1', `parent_product` = 'OR9AE294', `reorder_level` = '5', `created_at` = '2021-09-28 03:37:59', `updated_at` = '2021-09-28 03:37:59'
WHERE `product_id` = 'TQAAI9AT'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'Demo\', `short_name` = \'demo\', `category_id` = \'YA9VV7IK4SLX9UQ\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = \'12.5 oz\', `supplier` = \'lunavos\', `supplier_id` = \'ZMDTDANN31RLJYIKOSPD\', `product_details` = \'\', `producer` = \'\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'7\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = NULL, `price` = \'0\', `onsale_price` = \'12.56\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'10.14\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = \'1\', `Applicable_Tax` = NULL, `is_ecommerce` = \'1\', `parent_product` = \'OR9AE294\', `reorder_level` = \'5\', `created_at` = \'2021-09-28 03:37:59\', `updated_at` = \'2021-09-28 03:37:59\'\nWHERE `product_id` = \'TQAAI9AT\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Update Product Demo (jbjbjb)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 03:37:59')

UPDATE `product_category` SET `measurement_value` = '3.25 oz,2.75 oz,4.76 oz,9.26 oz,4.25 oz,12.5 oz,9.25 oz,1 oz,2 oz,2.5/8 oz,2.3/4 oz,3 oz,3.5/8 oz,3.1/4 oz,4 oz,4.1/4 oz,5.1/4 oz,6 oz,7.3/4 oz,8 oz,8.1/2 oz,9.3/4 oz,9.9 oz,12.1/2 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

UPDATE `product_category` SET `is_last_size` = '12.5 oz'
WHERE `category_id` = 'YA9VV7IK4SLX9UQ'

DELETE FROM `product_combos`
WHERE `product_id` = 'TQAAI9AT'

DELETE FROM `product_combos`
WHERE `product_id` = 'TQAAI9AT'

UPDATE `product_information` SET `product_name` = 'Demo', `short_name` = 'demo', `category_id` = 'YA9VV7IK4SLX9UQ', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = '12.5 oz', `supplier` = 'lunavos', `supplier_id` = 'ZMDTDANN31RLJYIKOSPD', `product_details` = '', `producer` = '', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '7', `abv` = '', `proof` = '', `region` = '', `supplier_price` = NULL, `price` = '0', `onsale_price` = '12.56', `ecomm_sale_price` = '', `store_promotion_price` = '10.14', `ecomm_promotion_price` = '', `Applicable_CRV` = '1', `Applicable_Tax` = NULL, `is_ecommerce` = '1', `parent_product` = 'OR9AE294', `reorder_level` = '5', `created_at` = '2021-09-28 03:38:54', `updated_at` = '2021-09-28 03:38:54'
WHERE `product_id` = 'TQAAI9AT'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'Demo\', `short_name` = \'demo\', `category_id` = \'YA9VV7IK4SLX9UQ\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = \'12.5 oz\', `supplier` = \'lunavos\', `supplier_id` = \'ZMDTDANN31RLJYIKOSPD\', `product_details` = \'\', `producer` = \'\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'7\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = NULL, `price` = \'0\', `onsale_price` = \'12.56\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'10.14\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = \'1\', `Applicable_Tax` = NULL, `is_ecommerce` = \'1\', `parent_product` = \'OR9AE294\', `reorder_level` = \'5\', `created_at` = \'2021-09-28 03:38:54\', `updated_at` = \'2021-09-28 03:38:54\'\nWHERE `product_id` = \'TQAAI9AT\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Update Product Demo (jbjbjb)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 03:38:55')

UPDATE `product_category` SET `measurement_value` = '1 oz,,50 ml,100 ml,300 ml,500 ml,750 ml,150 ml,375 ml,125 ml,600 ml,350 ml,20 ml,30 ml,60 ml,200 ml,250 ml,355 ml,1750 ml,946 ml ,473 ml,75 ml,10 ml,12.99 ml,24 ml, 200 ml,3 gallon,0.5 gallon,1 quart,0.5 quart'
WHERE `category_id` = '4QWGE8LEMIDD5OW'

UPDATE `product_category` SET `is_last_size` = '1 oz'
WHERE `category_id` = '4QWGE8LEMIDD5OW'

DELETE FROM `product_combos`
WHERE `product_id` = 'SDGKVRKY'

DELETE FROM `product_combos`
WHERE `product_id` = 'SDGKVRKY'

UPDATE `product_information` SET `product_name` = 'Liberty Distribution Big Pack Orange Tic Tac ', `short_name` = 'Liberty Distribution Big Pack Orange Tic Tac ', `category_id` = '4QWGE8LEMIDD5OW', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = '1 oz', `supplier` = 'v', `supplier_id` = 'DSCFWWW8ATINYCGAFKXH', `product_details` = '', `producer` = 'Liberty Distribution', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '12', `abv` = '', `proof` = '', `region` = '', `supplier_price` = '0.99', `price` = '0.99', `onsale_price` = '1.99', `ecomm_sale_price` = '', `store_promotion_price` = '', `ecomm_promotion_price` = '', `Applicable_CRV` = NULL, `Applicable_Tax` = NULL, `is_ecommerce` = NULL, `parent_product` = '', `reorder_level` = '10', `created_at` = '2021-09-28 03:42:07', `updated_at` = '2021-09-28 03:42:07'
WHERE `product_id` = 'SDGKVRKY'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'Liberty Distribution Big Pack Orange Tic Tac \', `short_name` = \'Liberty Distribution Big Pack Orange Tic Tac \', `category_id` = \'4QWGE8LEMIDD5OW\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = \'1 oz\', `supplier` = \'v\', `supplier_id` = \'DSCFWWW8ATINYCGAFKXH\', `product_details` = \'\', `producer` = \'Liberty Distribution\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'12\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = \'0.99\', `price` = \'0.99\', `onsale_price` = \'1.99\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = NULL, `Applicable_Tax` = NULL, `is_ecommerce` = NULL, `parent_product` = \'\', `reorder_level` = \'10\', `created_at` = \'2021-09-28 03:42:07\', `updated_at` = \'2021-09-28 03:42:07\'\nWHERE `product_id` = \'SDGKVRKY\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Update Product Liberty Distribution Big Pack Orange Tic Tac  (009800007639)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 03:42:08')

UPDATE `product_category` SET `measurement_value` = '50 ml,100 ml,300 ml,500 ml,750 ml,150 ml,375 ml,125 ml,600 ml,350 ml,20 ml,30 ml,60 ml,200 ml,250 ml,355 ml,1750 ml,946 ml ,473 ml,75 ml,10 ml,12.99 ml,24 ml, 200 ml,3 gallon,0.5 gallon,1 quart,0.5 quart'
WHERE `category_id` = '9Z2E57U4RC1YM6B'

UPDATE `product_category` SET `is_last_size` = '750 ml'
WHERE `category_id` = '9Z2E57U4RC1YM6B'

DELETE FROM `product_combos`
WHERE `product_id` = 'VRUMOVIH'

DELETE FROM `product_combos`
WHERE `product_id` = 'VRUMOVIH'

UPDATE `product_information` SET `product_name` = 'Hamilton Overproof 151 Rum Aged - 750ml Bottle', `short_name` = 'Hamilton Overproof 151 Rum Aged - 750ml Bottle', `category_id` = '9Z2E57U4RC1YM6B', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = '750 ml', `supplier` = 'Craft San Diego', `supplier_id` = 'IPW5Z17NUW3SJOIAA5TS', `product_details` = '', `producer` = 'Hamilton', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '10', `abv` = '', `proof` = '', `region` = '', `supplier_price` = '25.00', `price` = '25', `onsale_price` = '38.99', `ecomm_sale_price` = '', `store_promotion_price` = '', `ecomm_promotion_price` = '', `Applicable_CRV` = NULL, `Applicable_Tax` = '1', `is_ecommerce` = NULL, `parent_product` = '', `reorder_level` = '9', `created_at` = '2021-09-28 03:45:16', `updated_at` = '2021-09-28 03:45:16'
WHERE `product_id` = 'VRUMOVIH'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'Hamilton Overproof 151 Rum Aged - 750ml Bottle\', `short_name` = \'Hamilton Overproof 151 Rum Aged - 750ml Bottle\', `category_id` = \'9Z2E57U4RC1YM6B\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = \'750 ml\', `supplier` = \'Craft San Diego\', `supplier_id` = \'IPW5Z17NUW3SJOIAA5TS\', `product_details` = \'\', `producer` = \'Hamilton\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'10\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = \'25.00\', `price` = \'25\', `onsale_price` = \'38.99\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = NULL, `Applicable_Tax` = \'1\', `is_ecommerce` = NULL, `parent_product` = \'\', `reorder_level` = \'9\', `created_at` = \'2021-09-28 03:45:16\', `updated_at` = \'2021-09-28 03:45:16\'\nWHERE `product_id` = \'VRUMOVIH\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Update Product Hamilton Overproof 151 Rum Aged - 750ml Bottle (000513072921)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 03:45:16')

UPDATE `product_category` SET `measurement_value` = '50 ml,100 ml,300 ml,500 ml,750 ml,150 ml,375 ml,125 ml,600 ml,350 ml,20 ml,30 ml,60 ml,200 ml,250 ml,355 ml,1750 ml,946 ml ,473 ml,75 ml,10 ml,12.99 ml,24 ml, 200 ml,3 gallon,0.5 gallon,1 quart,0.5 quart'
WHERE `category_id` = '9Z2E57U4RC1YM6B'

UPDATE `product_category` SET `is_last_size` = '750 ml'
WHERE `category_id` = '9Z2E57U4RC1YM6B'

DELETE FROM `product_combos`
WHERE `product_id` = 'VRUMOVIH'

DELETE FROM `product_combos`
WHERE `product_id` = 'VRUMOVIH'

UPDATE `product_information` SET `product_name` = 'Hamilton Overproof 151 Rum Aged - 750ml Bottle', `short_name` = 'Hamilton Overproof 151 Rum Aged - 750ml Bottle', `category_id` = '9Z2E57U4RC1YM6B', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = '750 ml', `supplier` = 'Craft San Diego', `supplier_id` = 'IPW5Z17NUW3SJOIAA5TS', `product_details` = '', `producer` = 'Hamilton', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '10', `abv` = '', `proof` = '', `region` = '', `supplier_price` = '25.00', `price` = '25', `onsale_price` = '38.99', `ecomm_sale_price` = '', `store_promotion_price` = '', `ecomm_promotion_price` = '', `Applicable_CRV` = NULL, `Applicable_Tax` = '1', `is_ecommerce` = NULL, `parent_product` = '', `reorder_level` = '9', `created_at` = '2021-09-28 03:45:41', `updated_at` = '2021-09-28 03:45:41'
WHERE `product_id` = 'VRUMOVIH'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'Hamilton Overproof 151 Rum Aged - 750ml Bottle\', `short_name` = \'Hamilton Overproof 151 Rum Aged - 750ml Bottle\', `category_id` = \'9Z2E57U4RC1YM6B\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = \'750 ml\', `supplier` = \'Craft San Diego\', `supplier_id` = \'IPW5Z17NUW3SJOIAA5TS\', `product_details` = \'\', `producer` = \'Hamilton\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'10\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = \'25.00\', `price` = \'25\', `onsale_price` = \'38.99\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = NULL, `Applicable_Tax` = \'1\', `is_ecommerce` = NULL, `parent_product` = \'\', `reorder_level` = \'9\', `created_at` = \'2021-09-28 03:45:41\', `updated_at` = \'2021-09-28 03:45:41\'\nWHERE `product_id` = \'VRUMOVIH\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Update Product Hamilton Overproof 151 Rum Aged - 750ml Bottle (000513072921)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 03:45:41')

UPDATE `product_category` SET `measurement_value` = '50 ml,100 ml,300 ml,500 ml,750 ml,150 ml,375 ml,125 ml,600 ml,350 ml,20 ml,30 ml,60 ml,200 ml,250 ml,355 ml,1750 ml,946 ml ,473 ml,75 ml,10 ml,12.99 ml,24 ml, 200 ml,3 gallon,0.5 gallon,1 quart,0.5 quart'
WHERE `category_id` = '9Z2E57U4RC1YM6B'

UPDATE `product_category` SET `is_last_size` = '750 ml'
WHERE `category_id` = '9Z2E57U4RC1YM6B'

DELETE FROM `product_combos`
WHERE `product_id` = 'VRUMOVIH'

DELETE FROM `product_combos`
WHERE `product_id` = 'VRUMOVIH'

UPDATE `product_information` SET `product_name` = 'Hamilton Overproof 151 Rum Aged - 750ml Bottle', `short_name` = 'Hamilton Overproof 151 Rum Aged - 750ml Bottle', `category_id` = '9Z2E57U4RC1YM6B', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = '750 ml', `supplier` = 'Craft San Diego', `supplier_id` = 'IPW5Z17NUW3SJOIAA5TS', `product_details` = '', `producer` = 'Hamilton', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '10', `abv` = '', `proof` = '', `region` = '', `supplier_price` = '25.00', `price` = '25', `onsale_price` = '38.99', `ecomm_sale_price` = '', `store_promotion_price` = '', `ecomm_promotion_price` = '', `Applicable_CRV` = NULL, `Applicable_Tax` = '1', `is_ecommerce` = NULL, `parent_product` = '', `reorder_level` = '9', `created_at` = '2021-09-28 03:46:27', `updated_at` = '2021-09-28 03:46:27'
WHERE `product_id` = 'VRUMOVIH'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'Hamilton Overproof 151 Rum Aged - 750ml Bottle\', `short_name` = \'Hamilton Overproof 151 Rum Aged - 750ml Bottle\', `category_id` = \'9Z2E57U4RC1YM6B\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = \'750 ml\', `supplier` = \'Craft San Diego\', `supplier_id` = \'IPW5Z17NUW3SJOIAA5TS\', `product_details` = \'\', `producer` = \'Hamilton\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'10\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = \'25.00\', `price` = \'25\', `onsale_price` = \'38.99\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = NULL, `Applicable_Tax` = \'1\', `is_ecommerce` = NULL, `parent_product` = \'\', `reorder_level` = \'9\', `created_at` = \'2021-09-28 03:46:27\', `updated_at` = \'2021-09-28 03:46:27\'\nWHERE `product_id` = \'VRUMOVIH\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Update Product Hamilton Overproof 151 Rum Aged - 750ml Bottle (000513072921)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 03:46:27')

UPDATE `product_category` SET `measurement_value` = '50 ml,100 ml,300 ml,500 ml,750 ml,150 ml,375 ml,125 ml,600 ml,350 ml,20 ml,30 ml,60 ml,200 ml,250 ml,355 ml,1750 ml,946 ml ,473 ml,75 ml,10 ml,12.99 ml,24 ml, 200 ml,3 gallon,0.5 gallon,1 quart,0.5 quart'
WHERE `category_id` = '9Z2E57U4RC1YM6B'

UPDATE `product_category` SET `is_last_size` = '750 ml'
WHERE `category_id` = '9Z2E57U4RC1YM6B'

DELETE FROM `product_combos`
WHERE `product_id` = 'VRUMOVIH'

DELETE FROM `product_combos`
WHERE `product_id` = 'VRUMOVIH'

UPDATE `product_information` SET `product_name` = 'Hamilton Overproof 151 Rum Aged - 750ml Bottle', `short_name` = 'Hamilton Overproof 151 Rum Aged - 750ml Bottle', `category_id` = '9Z2E57U4RC1YM6B', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = '750 ml', `supplier` = 'Craft San Diego', `supplier_id` = 'IPW5Z17NUW3SJOIAA5TS', `product_details` = '', `producer` = 'Hamilton', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '10', `abv` = '', `proof` = '', `region` = '', `supplier_price` = '25.00', `price` = '25', `onsale_price` = '38.99', `ecomm_sale_price` = '', `store_promotion_price` = '', `ecomm_promotion_price` = '', `Applicable_CRV` = NULL, `Applicable_Tax` = '1', `is_ecommerce` = NULL, `parent_product` = '', `reorder_level` = '9', `created_at` = '2021-09-28 03:47:29', `updated_at` = '2021-09-28 03:47:29'
WHERE `product_id` = 'VRUMOVIH'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'Hamilton Overproof 151 Rum Aged - 750ml Bottle\', `short_name` = \'Hamilton Overproof 151 Rum Aged - 750ml Bottle\', `category_id` = \'9Z2E57U4RC1YM6B\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = \'750 ml\', `supplier` = \'Craft San Diego\', `supplier_id` = \'IPW5Z17NUW3SJOIAA5TS\', `product_details` = \'\', `producer` = \'Hamilton\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'10\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = \'25.00\', `price` = \'25\', `onsale_price` = \'38.99\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = NULL, `Applicable_Tax` = \'1\', `is_ecommerce` = NULL, `parent_product` = \'\', `reorder_level` = \'9\', `created_at` = \'2021-09-28 03:47:29\', `updated_at` = \'2021-09-28 03:47:29\'\nWHERE `product_id` = \'VRUMOVIH\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Update Product Hamilton Overproof 151 Rum Aged - 750ml Bottle (000513072921)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 03:47:29')

UPDATE `product_category` SET `measurement_value` = '50 ml,100 ml,300 ml,500 ml,750 ml,150 ml,375 ml,125 ml,600 ml,350 ml,20 ml,30 ml,60 ml,200 ml,250 ml,355 ml,1750 ml,946 ml ,473 ml,75 ml,10 ml,12.99 ml,24 ml, 200 ml,3 gallon,0.5 gallon,1 quart,0.5 quart'
WHERE `category_id` = '9Z2E57U4RC1YM6B'

UPDATE `product_category` SET `is_last_size` = '750 ml'
WHERE `category_id` = '9Z2E57U4RC1YM6B'

DELETE FROM `product_combos`
WHERE `product_id` = 'VRUMOVIH'

DELETE FROM `product_combos`
WHERE `product_id` = 'VRUMOVIH'

UPDATE `product_information` SET `product_name` = 'Hamilton Overproof 151 Rum Aged - 750ml Bottle', `short_name` = 'Hamilton Overproof 151 Rum Aged - 750ml Bottle', `category_id` = '9Z2E57U4RC1YM6B', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = '750 ml', `supplier` = 'Craft San Diego', `supplier_id` = 'IPW5Z17NUW3SJOIAA5TS', `product_details` = '', `producer` = 'Hamilton', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '10', `abv` = '', `proof` = '', `region` = '', `supplier_price` = '25.00', `price` = '25', `onsale_price` = '38.99', `ecomm_sale_price` = '', `store_promotion_price` = '', `ecomm_promotion_price` = '', `Applicable_CRV` = NULL, `Applicable_Tax` = '1', `is_ecommerce` = NULL, `parent_product` = '', `reorder_level` = '9', `created_at` = '2021-09-28 03:47:57', `updated_at` = '2021-09-28 03:47:57'
WHERE `product_id` = 'VRUMOVIH'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'Hamilton Overproof 151 Rum Aged - 750ml Bottle\', `short_name` = \'Hamilton Overproof 151 Rum Aged - 750ml Bottle\', `category_id` = \'9Z2E57U4RC1YM6B\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = \'750 ml\', `supplier` = \'Craft San Diego\', `supplier_id` = \'IPW5Z17NUW3SJOIAA5TS\', `product_details` = \'\', `producer` = \'Hamilton\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'10\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = \'25.00\', `price` = \'25\', `onsale_price` = \'38.99\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = NULL, `Applicable_Tax` = \'1\', `is_ecommerce` = NULL, `parent_product` = \'\', `reorder_level` = \'9\', `created_at` = \'2021-09-28 03:47:57\', `updated_at` = \'2021-09-28 03:47:57\'\nWHERE `product_id` = \'VRUMOVIH\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Update Product Hamilton Overproof 151 Rum Aged - 750ml Bottle (000513072921)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 03:47:57')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('25', '4', 'Manager', 'Payal Motwani')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('25', '4', 'Manager', 'Payal Motwani')

UPDATE `tbl_user_shift` SET `terminal_id` = '26', `username` = '25', `cash_out_drawer` = '100', `coin_dispenser_out` = '0', `bin_data_out` = '[\"00\",\"000\",\"000123\",\"214748364765554872\"]', `datetime_out` = '2021-09-28 03:48:28', `defer_shift` = 0, `shift_in_out` = 2
WHERE `username` = '25'
AND `id` = '371'
AND `terminal_id` = '26'
AND `date` = '2021-09-28'

UPDATE `user_login` SET `user_shift_status` = 0
WHERE `username` = '25'

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('80', 'End Shift', '74,55,21,24,66,25,86,33,50,31', 'shift out', 'clock in out', '2021-09-28 03:48:28')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('25', '4', 'Manager', 'Payal Motwani')

UPDATE `tbl_user_shift` SET `terminal_id` = '26', `username` = '25', `cash_out_drawer` = '100', `coin_dispenser_out` = '0', `bin_data_out` = '[\"00\",\"000\",\"000123\",\"214748364765554872\"]', `datetime_out` = '2021-09-28 03:48:46', `defer_shift` = 0, `shift_in_out` = 2
WHERE `username` = '25'
AND `id` = 371
AND `terminal_id` = '26'
AND `date` = '2021-09-28'

UPDATE `user_login` SET `user_shift_status` = 0
WHERE `username` = '25'

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('80', 'End Shift', '74,55,21,24,66,25,86,33,50,31', 'shift out', 'clock in out', '2021-09-28 03:48:46')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('25', '4', 'Manager', 'Payal Motwani')

UPDATE `user_login` SET `user_shift_status` = 1
WHERE `username` = '25'

INSERT INTO `tbl_user_shift` (`terminal_id`, `username`, `cash_in_drawer`, `coin_dispenser_in`, `bin_data_in`, `datetime_in`, `datetime_out`, `date`, `defer_shift`, `shift_in_out`) VALUES ('26', '25', '100', '0', '[\"00\",\"000\",\"000123\",\"214748364765554872\"]', '2021-09-28 03:49:01', '2021-09-28 03:49:01', '2021-09-28', '0', 1)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('80', 'Start Shift', '74,55,21,24,66,25,86,33,50,31', 'shift in', 'clock in out', '2021-09-28 03:49:01')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES ('285ZB5OC81G7S2A67XHA', '4I8XHFO8B6XYX39', '', 'California State Lottery', 'Vendor', '10.00', 'Cash', '370', '26', '2021-09-28', '2021-09-28 03:49:33', '')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'pos', 'Payout Transaction', 'INSERT INTO `tbl_payout` (`supplier_emp_id`, `category_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES (\'285ZB5OC81G7S2A67XHA\', \'4I8XHFO8B6XYX39\', \'\', \'California State Lottery\', \'Vendor\', \'10.00\', \'Cash\', \'370\', \'26\', \'2021-09-28\', \'2021-09-28 03:49:33\', \'\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', '$10.00 Payout for Vendor Payout', '74,55,21,24,66,25,86,33,50,31', 'Vendor Payout', 'pos terminal', '2021-09-28 03:49:33')

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

INSERT INTO `tbl_payout` (`supplier_emp_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES ('1', '', 'Lunavo User', 'Employee', '1.00', 'Cash', '370', '26', '2021-09-28', '2021-09-28 03:49:52', '')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'pos', 'Payout Transaction', 'INSERT INTO `tbl_payout` (`supplier_emp_id`, `notes`, `supplier_emp_name`, `type`, `payout_money`, `payment_type`, `shift`, `terminal`, `date`, `created_at`, `check_no`) VALUES (\'1\', \'\', \'Lunavo User\', \'Employee\', \'1.00\', \'Cash\', \'370\', \'26\', \'2021-09-28\', \'2021-09-28 03:49:52\', \'\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', '$1.00 Payout for Employee Payout', '74,55,21,24,66,25,86,33,50,31', 'Employee Payout', 'pos terminal', '2021-09-28 03:49:52')

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

UPDATE `product_category` SET `measurement_value` = '1 oz,,50 ml,100 ml,300 ml,500 ml,750 ml,150 ml,375 ml,125 ml,600 ml,350 ml,20 ml,30 ml,60 ml,200 ml,250 ml,355 ml,1750 ml,946 ml ,473 ml,75 ml,10 ml,12.99 ml,24 ml, 200 ml,3 gallon,0.5 gallon,1 quart,0.5 quart'
WHERE `category_id` = '4QWGE8LEMIDD5OW'

UPDATE `product_category` SET `is_last_size` = '1 oz'
WHERE `category_id` = '4QWGE8LEMIDD5OW'

DELETE FROM `product_combos`
WHERE `product_id` = 'AI3R7KOX'

DELETE FROM `product_combos`
WHERE `product_id` = 'AI3R7KOX'

UPDATE `product_information` SET `product_name` = 'Tictac Big Pack Fresh Mint - 12 Pack', `short_name` = 'Tictac Big Pack Fresh Mint - 12 Pack', `category_id` = '4QWGE8LEMIDD5OW', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = '1 oz', `supplier` = 'Trepco West', `supplier_id` = '5NAC9I6NL2X4G42Y8OCD', `product_details` = '', `producer` = 'Ddi', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '22', `abv` = '', `proof` = '', `region` = '', `supplier_price` = '0.99', `price` = '0.99', `onsale_price` = '1.99', `ecomm_sale_price` = '', `store_promotion_price` = '', `ecomm_promotion_price` = '', `Applicable_CRV` = NULL, `Applicable_Tax` = NULL, `is_ecommerce` = NULL, `parent_product` = '', `reorder_level` = '2', `created_at` = '2021-09-28 04:35:47', `updated_at` = '2021-09-28 04:35:47'
WHERE `product_id` = 'AI3R7KOX'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'Tictac Big Pack Fresh Mint - 12 Pack\', `short_name` = \'Tictac Big Pack Fresh Mint - 12 Pack\', `category_id` = \'4QWGE8LEMIDD5OW\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = \'1 oz\', `supplier` = \'Trepco West\', `supplier_id` = \'5NAC9I6NL2X4G42Y8OCD\', `product_details` = \'\', `producer` = \'Ddi\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'22\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = \'0.99\', `price` = \'0.99\', `onsale_price` = \'1.99\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = NULL, `Applicable_Tax` = NULL, `is_ecommerce` = NULL, `parent_product` = \'\', `reorder_level` = \'2\', `created_at` = \'2021-09-28 04:35:47\', `updated_at` = \'2021-09-28 04:35:47\'\nWHERE `product_id` = \'AI3R7KOX\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Update Product Tictac Big Pack Fresh Mint - 12 Pack (009800007615)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 04:35:48')

UPDATE `product_category` SET `measurement_value` = ',50 ml,100 ml,300 ml,500 ml,750 ml,150 ml,375 ml,125 ml,600 ml,350 ml,20 ml,30 ml,60 ml,200 ml,250 ml,355 ml,1750 ml,946 ml ,473 ml,75 ml,10 ml,12.99 ml,24 ml, 200 ml,3 gallon,0.5 gallon,1 quart,0.5 quart'
WHERE `category_id` = 'D9E6F4ZNFQULECR'

UPDATE `product_category` SET `is_last_size` = NULL
WHERE `category_id` = 'D9E6F4ZNFQULECR'

DELETE FROM `product_combos`
WHERE `product_id` = 'SMIQ5C48'

DELETE FROM `product_combos`
WHERE `product_id` = 'SMIQ5C48'

UPDATE `product_information` SET `product_name` = 'Zig Zag Ultra Thin Cigarette Rolling Papers, 1 1/2 Sizes, 3pk', `short_name` = 'Zig Zag Ultra Thin Cigarette Rolling Papers, 1 1/2 Sizes, 3pk', `category_id` = 'D9E6F4ZNFQULECR', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = NULL, `supplier` = 'Trepco West', `supplier_id` = '5NAC9I6NL2X4G42Y8OCD', `product_details` = '', `producer` = 'Zig Zag', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '22', `abv` = '', `proof` = '', `region` = '', `supplier_price` = '1.53', `price` = '1.53', `onsale_price` = '2.19', `ecomm_sale_price` = '', `store_promotion_price` = '', `ecomm_promotion_price` = '', `Applicable_CRV` = NULL, `Applicable_Tax` = NULL, `is_ecommerce` = NULL, `parent_product` = '', `reorder_level` = '10', `created_at` = '2021-09-28 04:36:03', `updated_at` = '2021-09-28 04:36:03'
WHERE `product_id` = 'SMIQ5C48'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'Zig Zag Ultra Thin Cigarette Rolling Papers, 1 1/2 Sizes, 3pk\', `short_name` = \'Zig Zag Ultra Thin Cigarette Rolling Papers, 1 1/2 Sizes, 3pk\', `category_id` = \'D9E6F4ZNFQULECR\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = NULL, `supplier` = \'Trepco West\', `supplier_id` = \'5NAC9I6NL2X4G42Y8OCD\', `product_details` = \'\', `producer` = \'Zig Zag\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'22\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = \'1.53\', `price` = \'1.53\', `onsale_price` = \'2.19\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = NULL, `Applicable_Tax` = NULL, `is_ecommerce` = NULL, `parent_product` = \'\', `reorder_level` = \'10\', `created_at` = \'2021-09-28 04:36:03\', `updated_at` = \'2021-09-28 04:36:03\'\nWHERE `product_id` = \'SMIQ5C48\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Update Product Zig Zag Ultra Thin Cigarette Rolling Papers, 1 1/2 Sizes, 3pk (008660097354)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 04:36:03')

UPDATE `product_category` SET `measurement_value` = '1 oz,,50 ml,100 ml,300 ml,500 ml,750 ml,150 ml,375 ml,125 ml,600 ml,350 ml,20 ml,30 ml,60 ml,200 ml,250 ml,355 ml,1750 ml,946 ml ,473 ml,75 ml,10 ml,12.99 ml,24 ml, 200 ml,3 gallon,0.5 gallon,1 quart,0.5 quart'
WHERE `category_id` = '4QWGE8LEMIDD5OW'

UPDATE `product_category` SET `is_last_size` = '1 oz'
WHERE `category_id` = '4QWGE8LEMIDD5OW'

DELETE FROM `product_combos`
WHERE `product_id` = 'AI3R7KOX'

DELETE FROM `product_combos`
WHERE `product_id` = 'AI3R7KOX'

UPDATE `product_information` SET `product_name` = 'Tictac Big Pack Fresh Mint - 12 Pack', `short_name` = 'Tictac Big Pack Fresh Mint - 12 Pack', `category_id` = '4QWGE8LEMIDD5OW', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = '1 oz', `supplier` = 'Trepco West', `supplier_id` = '5NAC9I6NL2X4G42Y8OCD', `product_details` = '', `producer` = 'Ddi', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '22', `abv` = '', `proof` = '', `region` = '', `supplier_price` = '0.99', `price` = '0.99', `onsale_price` = '1.99', `ecomm_sale_price` = '', `store_promotion_price` = '', `ecomm_promotion_price` = '', `Applicable_CRV` = NULL, `Applicable_Tax` = NULL, `is_ecommerce` = NULL, `parent_product` = '', `reorder_level` = '2', `created_at` = '2021-09-28 04:36:18', `updated_at` = '2021-09-28 04:36:18'
WHERE `product_id` = 'AI3R7KOX'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'Tictac Big Pack Fresh Mint - 12 Pack\', `short_name` = \'Tictac Big Pack Fresh Mint - 12 Pack\', `category_id` = \'4QWGE8LEMIDD5OW\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = \'1 oz\', `supplier` = \'Trepco West\', `supplier_id` = \'5NAC9I6NL2X4G42Y8OCD\', `product_details` = \'\', `producer` = \'Ddi\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'22\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = \'0.99\', `price` = \'0.99\', `onsale_price` = \'1.99\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = NULL, `Applicable_Tax` = NULL, `is_ecommerce` = NULL, `parent_product` = \'\', `reorder_level` = \'2\', `created_at` = \'2021-09-28 04:36:18\', `updated_at` = \'2021-09-28 04:36:18\'\nWHERE `product_id` = \'AI3R7KOX\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Update Product Tictac Big Pack Fresh Mint - 12 Pack (009800007615)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 04:36:19')

UPDATE `product_category` SET `measurement_value` = ',1 oz,,50 ml,100 ml,300 ml,500 ml,750 ml,150 ml,375 ml,125 ml,600 ml,350 ml,20 ml,30 ml,60 ml,200 ml,250 ml,355 ml,1750 ml,946 ml ,473 ml,75 ml,10 ml,12.99 ml,24 ml, 200 ml,3 gallon,0.5 gallon,1 quart,0.5 quart'
WHERE `category_id` = '4QWGE8LEMIDD5OW'

UPDATE `product_category` SET `is_last_size` = NULL
WHERE `category_id` = '4QWGE8LEMIDD5OW'

DELETE FROM `product_combos`
WHERE `product_id` = '7ID4J45B'

DELETE FROM `product_combos`
WHERE `product_id` = '7ID4J45B'

UPDATE `product_information` SET `product_name` = '(3 Pack) Heath King Size Milk Chocolate English Toffee Bar, 2.8 Oz', `short_name` = '(3 Pack) Heath King Size Milk Chocolate English Toffee Bar, 2.8 Oz', `category_id` = '4QWGE8LEMIDD5OW', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = NULL, `supplier` = 'Trepco West', `supplier_id` = '5NAC9I6NL2X4G42Y8OCD', `product_details` = '', `producer` = 'Heath', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '18', `abv` = '', `proof` = '', `region` = '', `supplier_price` = '1.20', `price` = '1.2', `onsale_price` = '2.39', `ecomm_sale_price` = '', `store_promotion_price` = '', `ecomm_promotion_price` = '', `Applicable_CRV` = NULL, `Applicable_Tax` = NULL, `is_ecommerce` = NULL, `parent_product` = '', `reorder_level` = '', `created_at` = '2021-09-28 04:37:21', `updated_at` = '2021-09-28 04:37:21'
WHERE `product_id` = '7ID4J45B'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'(3 Pack) Heath King Size Milk Chocolate English Toffee Bar, 2.8 Oz\', `short_name` = \'(3 Pack) Heath King Size Milk Chocolate English Toffee Bar, 2.8 Oz\', `category_id` = \'4QWGE8LEMIDD5OW\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = NULL, `supplier` = \'Trepco West\', `supplier_id` = \'5NAC9I6NL2X4G42Y8OCD\', `product_details` = \'\', `producer` = \'Heath\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'18\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = \'1.20\', `price` = \'1.2\', `onsale_price` = \'2.39\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = NULL, `Applicable_Tax` = NULL, `is_ecommerce` = NULL, `parent_product` = \'\', `reorder_level` = \'\', `created_at` = \'2021-09-28 04:37:21\', `updated_at` = \'2021-09-28 04:37:21\'\nWHERE `product_id` = \'7ID4J45B\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Update Product (3 Pack) Heath King Size Milk Chocolate English Toffee Bar, 2.8 Oz (010700060655)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 04:37:21')

UPDATE `product_category` SET `measurement_value` = '50 ml,100 ml,300 ml,500 ml,750 ml,150 ml,375 ml,125 ml,600 ml,350 ml,20 ml,30 ml,60 ml,200 ml,250 ml,355 ml,1750 ml,946 ml ,473 ml,75 ml,10 ml,12.99 ml,24 ml, 200 ml,3 gallon,0.5 gallon,1 quart,0.5 quart'
WHERE `category_id` = '9Z2E57U4RC1YM6B'

UPDATE `product_category` SET `is_last_size` = '750 ml'
WHERE `category_id` = '9Z2E57U4RC1YM6B'

DELETE FROM `product_combos`
WHERE `product_id` = 'O4MF94JQ'

DELETE FROM `product_combos`
WHERE `product_id` = 'O4MF94JQ'

UPDATE `product_information` SET `product_name` = 'Hamilton Navy Strength Rum 114pf', `short_name` = 'Hamilton Navy Strength Rum 114pf', `category_id` = '9Z2E57U4RC1YM6B', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = '750 ml', `supplier` = 'Craft San Diego', `supplier_id` = 'IPW5Z17NUW3SJOIAA5TS', `product_details` = '', `producer` = 'Hamilton', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '24', `abv` = '', `proof` = '', `region` = '', `supplier_price` = '23.67', `price` = '23.67', `onsale_price` = '36.99', `ecomm_sale_price` = '', `store_promotion_price` = '', `ecomm_promotion_price` = '', `Applicable_CRV` = NULL, `Applicable_Tax` = '1', `is_ecommerce` = NULL, `parent_product` = '', `reorder_level` = '10', `created_at` = '2021-09-28 04:39:45', `updated_at` = '2021-09-28 04:39:45'
WHERE `product_id` = 'O4MF94JQ'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'Hamilton Navy Strength Rum 114pf\', `short_name` = \'Hamilton Navy Strength Rum 114pf\', `category_id` = \'9Z2E57U4RC1YM6B\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = \'750 ml\', `supplier` = \'Craft San Diego\', `supplier_id` = \'IPW5Z17NUW3SJOIAA5TS\', `product_details` = \'\', `producer` = \'Hamilton\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'24\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = \'23.67\', `price` = \'23.67\', `onsale_price` = \'36.99\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = NULL, `Applicable_Tax` = \'1\', `is_ecommerce` = NULL, `parent_product` = \'\', `reorder_level` = \'10\', `created_at` = \'2021-09-28 04:39:45\', `updated_at` = \'2021-09-28 04:39:45\'\nWHERE `product_id` = \'O4MF94JQ\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Update Product Hamilton Navy Strength Rum 114pf (000513072945)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 04:39:45')

UPDATE `product_category` SET `measurement_value` = '2.06 oz,,1 oz,,50 ml,100 ml,300 ml,500 ml,750 ml,150 ml,375 ml,125 ml,600 ml,350 ml,20 ml,30 ml,60 ml,200 ml,250 ml,355 ml,1750 ml,946 ml ,473 ml,75 ml,10 ml,12.99 ml,24 ml, 200 ml,3 gallon,0.5 gallon,1 quart,0.5 quart'
WHERE `category_id` = '4QWGE8LEMIDD5OW'

UPDATE `product_category` SET `is_last_size` = '2.06 oz'
WHERE `category_id` = '4QWGE8LEMIDD5OW'

DELETE FROM `product_combos`
WHERE `product_id` = 'PGBV3LZK'

DELETE FROM `product_combos`
WHERE `product_id` = 'PGBV3LZK'

UPDATE `product_information` SET `product_name` = 'Jolly Rancher® Chews Original Flavors Candy 2.06 Oz. Box', `short_name` = 'Jolly Rancher® Chews Original Flavors Candy 2.06 Oz. Box', `category_id` = '4QWGE8LEMIDD5OW', `brand_id` = 'O8UHHT2JDCAVXMB', `size` = '2.06 oz', `supplier` = 'Trepco West', `supplier_id` = '5NAC9I6NL2X4G42Y8OCD', `product_details` = '', `producer` = 'Hershey\'s', `Meta_Title` = '', `Meta_Key` = '', `Meta_Desc` = '', `unit` = '1', `quantity` = '23', `abv` = '', `proof` = '', `region` = '', `supplier_price` = '0.84', `price` = '0.84', `onsale_price` = '1.69', `ecomm_sale_price` = '', `store_promotion_price` = '', `ecomm_promotion_price` = '', `Applicable_CRV` = NULL, `Applicable_Tax` = NULL, `is_ecommerce` = NULL, `parent_product` = '', `reorder_level` = '', `created_at` = '2021-09-28 04:39:59', `updated_at` = '2021-09-28 04:39:59'
WHERE `product_id` = 'PGBV3LZK'

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Update Product', 'UPDATE `product_information` SET `product_name` = \'Jolly Rancher® Chews Original Flavors Candy 2.06 Oz. Box\', `short_name` = \'Jolly Rancher® Chews Original Flavors Candy 2.06 Oz. Box\', `category_id` = \'4QWGE8LEMIDD5OW\', `brand_id` = \'O8UHHT2JDCAVXMB\', `size` = \'2.06 oz\', `supplier` = \'Trepco West\', `supplier_id` = \'5NAC9I6NL2X4G42Y8OCD\', `product_details` = \'\', `producer` = \'Hershey\\\'s\', `Meta_Title` = \'\', `Meta_Key` = \'\', `Meta_Desc` = \'\', `unit` = \'1\', `quantity` = \'23\', `abv` = \'\', `proof` = \'\', `region` = \'\', `supplier_price` = \'0.84\', `price` = \'0.84\', `onsale_price` = \'1.69\', `ecomm_sale_price` = \'\', `store_promotion_price` = \'\', `ecomm_promotion_price` = \'\', `Applicable_CRV` = NULL, `Applicable_Tax` = NULL, `is_ecommerce` = NULL, `parent_product` = \'\', `reorder_level` = \'\', `created_at` = \'2021-09-28 04:39:59\', `updated_at` = \'2021-09-28 04:39:59\'\nWHERE `product_id` = \'PGBV3LZK\'', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Update Product Jolly Rancher® Chews Original Flavors Candy 2.06 Oz. Box (010700519528)', '74,55,21,24,66,25,86,33,50,31', 'update product', 'inventory', '2021-09-28 04:39:59')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

UPDATE `tbl_user_shift` SET `terminal_id` = '26', `username` = '22', `cash_out_drawer` = '500.00', `coin_dispenser_out` = '0', `bin_data_out` = '[\"00\",\"000\",\"000123\",\"214748364765554872\"]', `datetime_out` = '2021-09-28 04:46:38', `defer_shift` = 0, `shift_in_out` = 2
WHERE `username` = '22'
AND `id` = '370'
AND `terminal_id` = '26'
AND `date` = '2021-09-28'

UPDATE `user_login` SET `user_shift_status` = 0
WHERE `username` = '22'

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'End Shift', '74,55,21,24,66,25,86,33,50,31', 'shift out', 'clock in out', '2021-09-28 04:46:39')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

UPDATE `user_login` SET `user_shift_status` = 1
WHERE `username` = '22'

INSERT INTO `tbl_user_shift` (`terminal_id`, `username`, `cash_in_drawer`, `coin_dispenser_in`, `bin_data_in`, `datetime_in`, `datetime_out`, `date`, `defer_shift`, `shift_in_out`) VALUES ('26', '22', '500.00', '0', '[\"00\",\"000\",\"000123\",\"214748364765554872\"]', '2021-09-28 04:46:54', '2021-09-28 04:46:54', '2021-09-28', '0', 1)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'Start Shift', '74,55,21,24,66,25,86,33,50,31', 'shift in', 'clock in out', '2021-09-28 04:46:54')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES ('22', '10.00', '2021-09-28 04:47:18', 373, '26', '09-28-2021')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Cash Drop Transaction', 'INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES (\'22\', \'10.00\', \'2021-09-28 04:47:18\', 373, \'26\', \'09-28-2021\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'cash dropped $10.00', '74,55,21,24,66,25,86,33,50,31', 'cash drop', 'pos terminal', '2021-09-28 04:47:18')

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES ('22', '10.00', '2021-09-28 04:48:34', 373, '26', '09-28-2021')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Cash Drop Transaction', 'INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES (\'22\', \'10.00\', \'2021-09-28 04:48:34\', 373, \'26\', \'09-28-2021\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'cash dropped $10.00', '74,55,21,24,66,25,86,33,50,31', 'cash drop', 'pos terminal', '2021-09-28 04:48:34')

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES ('22', '100.00', '2021-09-28 04:50:09', 373, '26', '09-28-2021')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Cash Drop Transaction', 'INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES (\'22\', \'100.00\', \'2021-09-28 04:50:09\', 373, \'26\', \'09-28-2021\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'cash dropped $100.00', '74,55,21,24,66,25,86,33,50,31', 'cash drop', 'pos terminal', '2021-09-28 04:50:09')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES ('22', '10.10', '2021-09-28 04:51:06', 373, '26', '09-28-2021')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Cash Drop Transaction', 'INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES (\'22\', \'10.10\', \'2021-09-28 04:51:06\', 373, \'26\', \'09-28-2021\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'cash dropped $10.10', '74,55,21,24,66,25,86,33,50,31', 'cash drop', 'pos terminal', '2021-09-28 04:51:07')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES ('22', '1.00', '2021-09-28 04:53:27', 373, '26', '09-28-2021')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Cash Drop Transaction', 'INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES (\'22\', \'1.00\', \'2021-09-28 04:53:27\', 373, \'26\', \'09-28-2021\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'cash dropped $1.00', '74,55,21,24,66,25,86,33,50,31', 'cash drop', 'pos terminal', '2021-09-28 04:53:28')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES ('22', '1.00', '2021-09-28 04:54:03', 373, '26', '09-28-2021')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Cash Drop Transaction', 'INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES (\'22\', \'1.00\', \'2021-09-28 04:54:03\', 373, \'26\', \'09-28-2021\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'cash dropped $1.00', '74,55,21,24,66,25,86,33,50,31', 'cash drop', 'pos terminal', '2021-09-28 04:54:04')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES ('22', '10.00', '2021-09-28 04:54:57', 373, '26', '09-28-2021')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Cash Drop Transaction', 'INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES (\'22\', \'10.00\', \'2021-09-28 04:54:57\', 373, \'26\', \'09-28-2021\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'cash dropped $10.00', '74,55,21,24,66,25,86,33,50,31', 'cash drop', 'pos terminal', '2021-09-28 04:54:58')

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES ('22', '1.00', '2021-09-28 05:05:55', 373, '26', '09-28-2021')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Cash Drop Transaction', 'INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES (\'22\', \'1.00\', \'2021-09-28 05:05:55\', 373, \'26\', \'09-28-2021\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'cash dropped $1.00', '74,55,21,24,66,25,86,33,50,31', 'cash drop', 'pos terminal', '2021-09-28 05:05:55')

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES ('22', '1.00', '2021-09-28 05:07:25', 373, '26', '09-28-2021')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Cash Drop Transaction', 'INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES (\'22\', \'1.00\', \'2021-09-28 05:07:25\', 373, \'26\', \'09-28-2021\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'cash dropped $1.00', '74,55,21,24,66,25,86,33,50,31', 'cash drop', 'pos terminal', '2021-09-28 05:07:26')

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES ('22', '1.00', '2021-09-28 05:08:07', 373, '26', '09-28-2021')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Cash Drop Transaction', 'INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES (\'22\', \'1.00\', \'2021-09-28 05:08:07\', 373, \'26\', \'09-28-2021\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'cash dropped $1.00', '74,55,21,24,66,25,86,33,50,31', 'cash drop', 'pos terminal', '2021-09-28 05:08:07')

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES ('22', '1.00', '2021-09-28 05:09:47', 373, '26', '09-28-2021')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Cash Drop Transaction', 'INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES (\'22\', \'1.00\', \'2021-09-28 05:09:47\', 373, \'26\', \'09-28-2021\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'cash dropped $1.00', '74,55,21,24,66,25,86,33,50,31', 'cash drop', 'pos terminal', '2021-09-28 05:09:47')

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES ('22', '1.00', '2021-09-28 05:10:44', 373, '26', '09-28-2021')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Cash Drop Transaction', 'INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES (\'22\', \'1.00\', \'2021-09-28 05:10:44\', 373, \'26\', \'09-28-2021\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'cash dropped $1.00', '74,55,21,24,66,25,86,33,50,31', 'cash drop', 'pos terminal', '2021-09-28 05:10:44')

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES ('22', '1.00', '2021-09-28 05:12:08', 373, '26', '09-28-2021')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Cash Drop Transaction', 'INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES (\'22\', \'1.00\', \'2021-09-28 05:12:08\', 373, \'26\', \'09-28-2021\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'cash dropped $1.00', '74,55,21,24,66,25,86,33,50,31', 'cash drop', 'pos terminal', '2021-09-28 05:12:09')

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES ('22', '1.00', '2021-09-28 05:13:55', 373, '26', '09-28-2021')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Cash Drop Transaction', 'INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES (\'22\', \'1.00\', \'2021-09-28 05:13:55\', 373, \'26\', \'09-28-2021\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'cash dropped $1.00', '74,55,21,24,66,25,86,33,50,31', 'cash drop', 'pos terminal', '2021-09-28 05:13:55')

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES ('22', '10.00', '2021-09-28 05:18:06', 373, '26', '09-28-2021')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Cash Drop Transaction', 'INSERT INTO `cash_drop` (`user_id`, `cash_amount`, `datetime`, `shift`, `terminal`, `date`) VALUES (\'22\', \'10.00\', \'2021-09-28 05:18:06\', 373, \'26\', \'09-28-2021\')', 0, 0)

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('51', 'cash dropped $10.00', '74,55,21,24,66,25,86,33,50,31', 'cash drop', 'pos terminal', '2021-09-28 05:18:06')

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('25', '4', 'Manager', 'Payal Motwani')

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`
=======
INSERT INTO `product_information` (`product_id`, `case_UPC`, `product_name`, `onsale_price`, `short_name`, `is_custom_product`, `Applicable_CRV`, `Applicable_Tax`, `size`, `image_thumb`, `created_at`, `updated_at`) VALUES ('KSHBGGYA', '1632837159913', 'ravi 45', '7.00', 'ravi 45', '1', '1', '0', '125 ml', './uploads/products/600px-No_image_available.svg (2).png', '2021-09-28 06:52:52', '2021-09-28 06:52:52')

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('22', 'Inventory', 'Custom Product Insert', 'INSERT INTO `product_information` (`product_id`, `case_UPC`, `product_name`, `onsale_price`, `short_name`, `is_custom_product`, `Applicable_CRV`, `Applicable_Tax`, `size`, `image_thumb`, `created_at`, `updated_at`) VALUES (\'KSHBGGYA\', \'1632837159913\', \'ravi 45\', \'7.00\', \'ravi 45\', \'1\', \'1\', \'0\', \'125 ml\', \'./uploads/products/600px-No_image_available.svg (2).png\', \'2021-09-28 06:52:52\', \'2021-09-28 06:52:52\')', 0, 0)
>>>>>>> 056007a8882f5f81059302b2020bbcddeb846314

SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`

