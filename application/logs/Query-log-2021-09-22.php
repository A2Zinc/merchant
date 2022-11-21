INSERT INTO `front_login_session` (`username`, `role_id`, `role_name`, `name`) VALUES ('86', '4', 'Manager', 'Reshma Uma')

UPDATE `tbl_user_shift` SET `terminal_id` = '26', `username` = '86', `cash_out_drawer` = '0', `coin_dispenser_out` = '0', `bin_data_out` = '[\"0\",\"0\",\"0\",\"0\"]', `datetime_out` = '2021-09-22 04:46:11', `defer_shift` = 0, `shift_in_out` = 2
WHERE `username` = '86'
AND `id` = 259
AND `terminal_id` = '26'
AND `date` = '2021-09-22'

UPDATE `user_login` SET `user_shift_status` = 0
WHERE `username` = '86'

INSERT INTO `user_notification` (`user_id`, `notification`, `action_id`, `action`, `module`, `created_at`) VALUES ('81', 'End Shift', '81', 'shift out', 'clock in out', '2021-09-22 04:46:11')

