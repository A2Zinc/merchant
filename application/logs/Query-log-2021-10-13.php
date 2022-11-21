test run

<<<<<<< HEAD
SHOW TABLES FROM `lwtPOS`

SHOW COLUMNS FROM `language`

test run

test run

=======
test run

test run

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

test run

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

>>>>>>> c5331bc24127cb9b73b4ad49d77282c5c4b92bb4
test run

test run

<<<<<<< HEAD
SHOW TABLES FROM `lwtPOS`
=======
SHOW TABLES FROM `lwtpos`
>>>>>>> c5331bc24127cb9b73b4ad49d77282c5c4b92bb4

SHOW COLUMNS FROM `language`

test run

test run

<<<<<<< HEAD
test run

test run
=======
SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`
>>>>>>> c5331bc24127cb9b73b4ad49d77282c5c4b92bb4

test run

test run

test run

test run

<<<<<<< HEAD
INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('86', '4', 'Manager', 'Reshma Uma')

test run
=======
SHOW TABLES FROM `lwtpos`

SHOW COLUMNS FROM `language`
>>>>>>> c5331bc24127cb9b73b4ad49d77282c5c4b92bb4

test run

test run

<<<<<<< HEAD
UPDATE `user_login` SET `user_shift_status` = 1
WHERE `username` = '86'

INSERT INTO `tbl_user_shift` (`terminal_id`, `username`, `cash_in_drawer`, `coin_dispenser_in`, `bin_data_in`, `datetime_in`, `datetime_out`, `date`, `defer_shift`, `shift_in_out`) VALUES ('26', '86', '0', '0', '[\"0\",\"0\",\"0\",\"0\"]', '2021-10-13 00:21:02', '2021-10-13 00:21:02', '2021-10-13', '0', 1)

=======
>>>>>>> c5331bc24127cb9b73b4ad49d77282c5c4b92bb4
test run

test run

test run

<<<<<<< HEAD
INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('86', '4', 'Manager', 'Reshma Uma')

test run

test run

SHOW TABLES FROM `lwtPOS`

SHOW COLUMNS FROM `language`
=======
test run

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

test run

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')
>>>>>>> c5331bc24127cb9b73b4ad49d77282c5c4b92bb4

test run

test run

test run

<<<<<<< HEAD
INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('86', '4', 'Manager', 'Reshma Uma')

test run

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('86', '4', 'Manager', 'Reshma Uma')

test run
=======
test run

UPDATE `user_login` SET `user_shift_status` = 1
WHERE `username` = '22'

INSERT INTO `tbl_user_shift` (`terminal_id`, `username`, `cash_in_drawer`, `coin_dispenser_in`, `bin_data_in`, `datetime_in`, `datetime_out`, `date`, `defer_shift`, `shift_in_out`) VALUES ('26', '22', '1000.00', '0', '[\"00\",\"000\",\"000123\",\"214748364765554872\"]', '2021-10-13 03:37:55', '2021-10-13 03:37:55', '2021-10-13', '0', 1)
>>>>>>> c5331bc24127cb9b73b4ad49d77282c5c4b92bb4

test run

test run

<<<<<<< HEAD
INSERT INTO `refund_order` (`order_id`, `customer_id`, `date`, `total_amount`, `order`, `paid_amount`, `due_amount`, `tax_amount`, `shift`, `terminal`, `container_deposit`) VALUES ('TJOCBCZBGL85LVK', 0, '10-13-2021', 'NaN', 4053, 'NaN', 'NaN', '3.02', 267, '26', '0.00')

INSERT INTO `order` (`order_id`, `customer_id`, `date`, `total_amount`, `order`, `paid_amount`, `due_amount`, `tax_amount`, `shift`, `terminal`, `container_deposit`, `refunded`) VALUES ('TJOCBCZBGL85LVK', 0, '10-13-2021', 'NaN', 4053, 'NaN', 'NaN', '3.02', 267, '26', '0.00', 1)

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('86', 'pos', 'Insert Refund Transaction', 'INSERT INTO `order` (`order_id`, `customer_id`, `date`, `total_amount`, `order`, `paid_amount`, `due_amount`, `tax_amount`, `shift`, `terminal`, `container_deposit`, `refunded`) VALUES (\'TJOCBCZBGL85LVK\', 0, \'10-13-2021\', \'NaN\', 4053, \'NaN\', \'NaN\', \'3.02\', 267, \'26\', \'0.00\', 1)', 0, 0)

INSERT INTO `order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `quantity`, `rate`, `total_price`, `variant_id`, `store_id`, `supplier_rate`, `discount`, `container_deposit`) VALUES ('OVA6NB5Y3I782GT', 'TJOCBCZBGL85LVK', 'VRUMOVIH', 'Hamilton Overproof 151 Rum Aged - 750ml Bottle', '1', '38.99', '38.99', 0, 0, 0, 0, 0)

INSERT INTO `refund_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `quantity`, `rate`, `total_price`, `variant_id`, `store_id`, `supplier_rate`, `discount`, `container_deposit`) VALUES ('OVA6NB5Y3I782GT', 'TJOCBCZBGL85LVK', 'VRUMOVIH', 'Hamilton Overproof 151 Rum Aged - 750ml Bottle', '1', '38.99', '38.99', 0, 0, 0, 0, 0)

INSERT INTO `query_logs` (`user_id`, `module`, `module_operation`, `query_string`, `is_dependent`, `query_from`) VALUES ('86', 'pos', 'Insert Refund Transaction', 'INSERT INTO `refund_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `quantity`, `rate`, `total_price`, `variant_id`, `store_id`, `supplier_rate`, `discount`, `container_deposit`) VALUES (\'OVA6NB5Y3I782GT\', \'TJOCBCZBGL85LVK\', \'VRUMOVIH\', \'Hamilton Overproof 151 Rum Aged - 750ml Bottle\', \'1\', \'38.99\', \'38.99\', 0, 0, 0, 0, 0)', 1, 0)

INSERT INTO `customer_redeem_trans_point_master` (`customer_id`, `order_id`, `redeem_point`) VALUES ('0', 'TJOCBCZBGL85LVK', -3.02)
=======
test run

UPDATE `user_notification` SET `is_read` = 1

test run

test run

test run

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('25', '4', 'Manager', 'Payal Motwani')
>>>>>>> c5331bc24127cb9b73b4ad49d77282c5c4b92bb4

test run

test run

test run

<<<<<<< HEAD
test run

test run

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('86', '4', 'Manager', 'Reshma Uma')

test run

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('86', '4', 'Manager', 'Reshma Uma')

test run

test run
=======
UPDATE `user_login` SET `user_shift_status` = 1
WHERE `username` = '25'

INSERT INTO `tbl_user_shift` (`terminal_id`, `username`, `cash_in_drawer`, `coin_dispenser_in`, `bin_data_in`, `datetime_in`, `datetime_out`, `date`, `defer_shift`, `shift_in_out`) VALUES ('26', '25', '2000.00', '0', '[\"00\",\"000\",\"000123\",\"214748364765554872\"]', '2021-10-13 03:43:56', '2021-10-13 03:43:56', '2021-10-13', '0', 1)

test run

test run

test run

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')

test run

INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('22', '10', 'Cashier', 'Gopal Yadav')
>>>>>>> c5331bc24127cb9b73b4ad49d77282c5c4b92bb4

test run

test run

test run

test run

<<<<<<< HEAD
INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('86', '4', 'Manager', 'Reshma Uma')

=======
>>>>>>> c5331bc24127cb9b73b4ad49d77282c5c4b92bb4
test run

test run

test run

test run

test run

<<<<<<< HEAD
INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('86', '4', 'Manager', 'Reshma Uma')
=======
UPDATE `tbl_leave_statistics` SET `leaves_taken` = 5, `req_leave_hours` = 0
WHERE `employee_id` = '22'
AND `leave_type` = '2'

INSERT INTO `tbl_emp_leave` (`employee_id`, `employee_name`, `start_date`, `end_date`, `leaveType`, `reason`, `days_requested`, `hours_requested`, `status`, `created_at`, `updated_at`) VALUES ('22', 'Gopal Yadav', '10-30-2021', '10-30-2021', '2', 'moj', '1', '', 'Pending', '2021-10-13 03:50:00', '2021-10-13 03:50:00')
>>>>>>> c5331bc24127cb9b73b4ad49d77282c5c4b92bb4

test run

test run

test run

<<<<<<< HEAD
UPDATE `tbl_user_shift` SET `terminal_id` = '26', `username` = '86', `cash_out_drawer` = '0', `coin_dispenser_out` = '0', `bin_data_out` = '[\"0\",\"0\",\"0\",\"0\"]', `datetime_out` = '2021-10-13 04:26:57', `defer_shift` = 0, `shift_in_out` = 2
WHERE `username` = '86'
AND `id` = '267'
AND `terminal_id` = '26'
AND `date` = '2021-10-13'

UPDATE `user_login` SET `user_shift_status` = 0
WHERE `username` = '86'
=======
UPDATE `user_notification` SET `is_read` = 1

test run
>>>>>>> c5331bc24127cb9b73b4ad49d77282c5c4b92bb4

test run

test run

test run

<<<<<<< HEAD
INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('86', '4', 'Manager', 'Reshma Uma')
=======
test run
>>>>>>> c5331bc24127cb9b73b4ad49d77282c5c4b92bb4

test run

test run

test run

<<<<<<< HEAD
UPDATE `user_login` SET `user_shift_status` = 1
WHERE `username` = '86'

INSERT INTO `tbl_user_shift` (`terminal_id`, `username`, `cash_in_drawer`, `coin_dispenser_in`, `bin_data_in`, `datetime_in`, `datetime_out`, `date`, `defer_shift`, `shift_in_out`, `id`) VALUES ('26', '86', '10.00', '10.00', '[\"00\",\"0\",\"0\",\"0\"]', '2021-10-13 04:27:22', '2021-10-13 04:27:22', '2021-10-13', '0', 1, '211013042722')
=======
test run

UPDATE `user_notification` SET `is_read` = 1
>>>>>>> c5331bc24127cb9b73b4ad49d77282c5c4b92bb4

test run

test run

test run

<<<<<<< HEAD
INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('86', '4', 'Manager', 'Reshma Uma')
=======
test run
>>>>>>> c5331bc24127cb9b73b4ad49d77282c5c4b92bb4

test run

test run

test run

<<<<<<< HEAD
UPDATE `tbl_user_shift` SET `terminal_id` = '26', `username` = '86', `cash_out_drawer` = '10', `coin_dispenser_out` = '10.00', `bin_data_out` = '[\"0\",\"0\",\"0\",\"0\"]', `datetime_out` = '2021-10-13 04:28:28', `defer_shift` = 0, `shift_in_out` = 2
WHERE `username` = '86'
AND `id` = 2147483647
AND `terminal_id` = '26'
AND `date` = '2021-10-13'

UPDATE `user_login` SET `user_shift_status` = 0
WHERE `username` = '86'

test run

test run
=======
test run

UPDATE `user_notification` SET `is_read` = 1

test run

UPDATE `user_notification` SET `is_read` = 1
>>>>>>> c5331bc24127cb9b73b4ad49d77282c5c4b92bb4

test run

test run

test run

<<<<<<< HEAD
INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('86', '4', 'Manager', 'Reshma Uma')
=======
UPDATE `user_notification` SET `is_read` = 1

test run
>>>>>>> c5331bc24127cb9b73b4ad49d77282c5c4b92bb4

test run

