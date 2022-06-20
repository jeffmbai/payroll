/* GET MY CLOSE DAY REPORTS
    JOINS THE vw_my_close_day and brands table
 */
SELECT *, 
	(SELECT COUNT(brand_id)
     FROM vw_my_close_day 
     	WHERE brands.brand_id = vw_my_close_day.brand_id 
     		AND entity_id = '2' 
     		AND date_time = '2020-08-15') AS number_sold,
     (SELECT net_amount 
      FROM vw_my_close_day 
      	WHERE entity_id = '2' AND date_time = '2020-08-15' LIMIT 1) AS net_amount,
     (SELECT paying_balance 
      	FROM vw_my_close_day 
      		WHERE entity_id = '2' AND date_time = '2020-08-15' LIMIT 1)AS paying_balance
 FROM brands;


 CREATE VIEW `vw_my_close_day`  AS  
 select `order_items`.`order_item_id` AS `order_item_id`,
 	`order_items`.`order_id` AS `order_id`,
	`order_items`.`item_id` AS `item_id`,
	`order_items`.`qty` AS `qty`,
	`order_items`.`tax_id` AS `tax_id`,`order_items`.`rate` AS `rate`,`order_items`.`amount` AS `amount`,`items`.`marked_price` AS `marked_price`,`items`.`imei_one` AS `imei_one`,`items`.`imei_two` AS `imei_two`,`items`.`color` AS `color`,`items`.`capacity` AS `capacity`,`items`.`brand_id` AS `brand_id`,`items`.`brand_model_id` AS `brand_model_id`,`brands`.`brand_name` AS `brand_name`,`brand_models`.`model_name` AS `model_name`,`orders`.`org_id` AS `org_id`,`orders`.`transaction_type_id` AS `transaction_type_id`,`orders`.`entity_id` AS `entity_id`,`orders`.`customer_supplier_id` AS `customer_supplier_id`,`orders`.`payment_mode_id` AS `payment_mode_id`,`orders`.`bill_no` AS `bill_no`,`orders`.`date_time` AS `date_time`,`orders`.`tax_charge` AS `tax_charge`,`orders`.`net_amount` AS `net_amount`,`orders`.`discount` AS `discount`,`orders`.`paid_status` AS `paid_status`,`orders`.`paying_balance` AS `paying_balance`,`orders`.`change_return` AS `change_return`,`orders`.`date_modified` AS `date_modified`,`orders`.`time_stamp` AS `time_stamp`,`transaction_types`.`transaction_type_name` AS `transaction_type_name`,concat(`entitys`.`firstname`,' ',`entitys`.`secondname`,' ',`entitys`.`lastname`) AS `customer_name`,`payment_modes`.`payment_mode_name` AS `payment_mode_name` from (((((((`order_items` join `items` on((`items`.`item_id` = `order_items`.`item_id`))) left join `brands` on((`brands`.`brand_id` = `items`.`brand_id`))) left join `brand_models` on((`brand_models`.`brand_model_id` = `items`.`brand_model_id`))) join `orders` on((`orders`.`order_id` = `order_items`.`order_id`))) left join `transaction_types` on((`transaction_types`.`transaction_type_id` = `orders`.`transaction_type_id`))) left join `entitys` on((`entitys`.`entity_id` = `orders`.`customer_supplier_id`))) 
 left join `payment_modes` on((`payment_modes`.`payment_mode_id` = `orders`.`payment_mode_id`))) ;