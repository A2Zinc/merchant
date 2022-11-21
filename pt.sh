#!/bin/bash


RESULT="`wget -qO- http://localhost/POS/cashier/Cashier/customsync`"
echo $RESULT

if [ "$RESULT" = "success" ]; then
pt-table-sync --execute --verbose h=104.43.252.46,u=swazeiCentral,p=swazeiCentral@123 h=127.0.0.1,p=,u=root --databases lwtPOS --tables order,order_details,front_login_session,user_notification,tbl_payout,cash_drop,product_category,product_information,web_setting,tbl_mail_settings
else
	echo "command failed";
fi