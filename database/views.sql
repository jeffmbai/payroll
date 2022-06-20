<<<<<<< HEAD
<<<<<<< HEAD

CREATE VIEW `vw_general_ledger` AS
SELECT
=======
DROP VIEW vw_general_ledger;
CREATE VIEW `vw_general_ledger` AS SELECT
>>>>>>> 5d6c07446f85b585aecf7ecf97aeb96e84f0f751
=======
<<<<<<< Updated upstream
DROP VIEW vw_general_ledger;
CREATE VIEW `vw_general_ledger` AS SELECT
=======

CREATE VIEW `vw_general_ledger` AS
SELECT
>>>>>>> Stashed changes
>>>>>>> 1b5e7a528c2d7d053f81f24e521a7f320fd669cf
    `a`.`voucher_id` AS `voucher_id`,
    `a`.`org_id` AS `org_id`,
    `a`.`term_id` AS `term_id`,
    `a`.`account_id` AS `account_id`,
    `a`.`account_type_id` AS `account_type_id`,
    `a`.`subaccount_type_id` AS `subaccount_type_id`,
    `a`.`fiscal_year_id` AS `fiscal_year_id`,
    `a`.`customer_supplier_id` AS `customer_supplier_id`,
    `a`.`student_id` AS `student_id`,
    `a`.`is_paid` AS `is_paid`,
    `a`.`table_id` AS `table_id`,
    `a`.`table_name` AS `table_name`,
    `a`.`account_code` AS `account_code`,
    `a`.`voucher_code` AS `voucher_code`,
    `a`.`voucher_amount` AS `voucher_amount`,
    `a`.`voucher_balance` AS `voucher_balance`,
    `a`.`voucher_type` AS `voucher_type`,
    `a`.`voucher_category` AS `voucher_category`,
    `a`.`opening_closing_balance` AS `opening_closing_balance`,
    `a`.`transaction_date` AS `transaction_date`,
    `a`.`narrative` AS `narrative`,
    `a`.`created_by` AS `created_by`,
    `a`.`approved_by` AS `approved_by`,
    `a`.`time_stamp` AS `time_stamp`,
    `b`.`subaccount_type_name` AS `subaccount_type_name`,
    `b`.`subaccount_type_code` AS `subaccount_type_code`,
    `c`.`account_type_name` AS `account_type_name`,
    `c`.`account_type_code` AS `account_type_code`,
    `d`.`account_name` AS `account_name`,
    `d`.`is_studentaccount` AS `is_studentaccount`,
    `e`.`firstname` AS `firstname`,
    `e`.`secondname` AS `secondname`,
    `e`.`lastname` AS `lastname`,
    `e`.`email` AS `email`,
    `e`.`phone` AS `phone`
FROM
    (
        (
            (
                (
                    `vouchers` `a`
                LEFT JOIN `subaccount_types` `b`
                ON
                    (
                        (
                            `a`.`subaccount_type_id` = `b`.`subaccount_type_id`
                        )
                    )
                )
            JOIN `account_types` `c`
            ON
                (
                    (
                        `a`.`account_type_id` = `c`.`account_type_id`
                    )
                )
            )
        JOIN `accounts` `d`
        ON
            ((`a`.`account_id` = `d`.`account_id`))
        )
    LEFT JOIN `entitys` `e`
    ON
        ((`a`.`created_by` = `e`.`entity_id`))
    );

<<<<<<< HEAD
<<<<<<< HEAD

=======
DROP VIEW vw_accounts;
>>>>>>> 5d6c07446f85b585aecf7ecf97aeb96e84f0f751
=======
<<<<<<< Updated upstream
DROP VIEW vw_accounts;
=======

>>>>>>> Stashed changes
>>>>>>> 1b5e7a528c2d7d053f81f24e521a7f320fd669cf
CREATE VIEW `vw_accounts` AS
SELECT
    `a`.`account_id` AS `account_id`,
    `a`.`org_id` AS `org_id`,
    `a`.`account_type_id` AS `account_type_id`,
    `a`.`subaccount_type_id` AS `subaccount_type_id`,
    `a`.`account_code` AS `account_code`,
    `a`.`account_name` AS `account_name`,
    `a`.`opening_balance` AS `opening_balance`,
    `a`.`is_votehead` AS `is_votehead`,
    `a`.`is_studentaccount` AS `is_studentaccount`,
    `a`.`is_key` AS `is_key`,
    `a`.`student_id` AS `student_id`,
    `a`.`table_id` AS `table_id`,
    `a`.`table_name` AS `table_name`,
    `a`.`active` AS `active`,
    `a`.`narrative` AS `narrative`,
    `a`.`created_by` AS `created_by`,
    `a`.`time_stamp` AS `time_stamp`,
    `b`.`subaccount_type_name` AS `subaccount_type_name`,
    `b`.`subaccount_type_code` AS `subaccount_type_code`,
    `b`.`is_paymentmode` AS `is_paymentmode`,
    `c`.`account_type_name` AS `account_type_name`,
    `c`.`account_type_code` AS `account_type_code`,
    `d`.`firstname` AS `firstname`,
    `d`.`secondname` AS `secondname`,
    `d`.`lastname` AS `lastname`,
    `d`.`email` AS `email`,
    `d`.`phone` AS `phone`
FROM
    (
        (
            (
                `accounts` `a`
            LEFT JOIN `subaccount_types` `b`
            ON
                (
                    (
                        `a`.`subaccount_type_id` = `b`.`subaccount_type_id`
                    )
                )
            )
        JOIN `account_types` `c`
        ON
            (
                (
                    `a`.`account_type_id` = `c`.`account_type_id`
                )
            )
        )
    LEFT JOIN `entitys` `d`
    ON
        ((`a`.`created_by` = `d`.`entity_id`))
    );



DROP VIEW vw_balances;
CREATE VIEW `vw_balances` AS
SELECT
    `a`.`voucher_id` AS `voucher_id`,
    `a`.`org_id` AS `org_id`,
    `a`.`account_id` AS `account_id`,
    `a`.`account_type_id` AS `account_type_id`,
    `a`.`subaccount_type_id` AS `subaccount_type_id`,
    `a`.`fiscal_year_id` AS `fiscal_year_id`,
    `a`.`term_id` AS `term_id`,
    `a`.`student_id` AS `student_id`,
    `a`.`table_id` AS `table_id`,
    `a`.`table_name` AS `table_name`,
    `a`.`account_code` AS `account_code`,
    `a`.`voucher_code` AS `voucher_code`,
    `a`.`reference` AS `reference`,
    `a`.`voucher_amount` AS `voucher_amount`,
    `a`.`voucher_type` AS `voucher_type`,
    `a`.`opening_closing_balance` AS `opening_closing_balance`,
    `a`.`transaction_date` AS `transaction_date`,
    `a`.`is_duplicate` AS `is_duplicate`,
    `a`.`is_ignore` AS `is_ignore`,
    `a`.`narrative` AS `narrative`,
    `a`.`created_by` AS `created_by`,
    `a`.`approved_by` AS `approved_by`,
    `a`.`time_stamp` AS `time_stamp`,
    `b`.`account_name` AS `account_name`,
    `b`.`subaccount_type_name` AS `subaccount_type_name`,
    `b`.`is_studentaccount` AS `is_studentaccount`
FROM
    (
        `vouchers` `a`
    JOIN `vw_accounts` `b`
    ON
        (
            (
                `a`.`account_id` = `b`.`account_id`
            )
        )
    )
WHERE
    (
        `b`.`is_studentaccount` = 1
    );



DROP VIEW vw_my_close_day;
CREATE VIEW `vw_my_close_day` AS SELECT
    `order_items`.`order_item_id` AS `order_item_id`,
    `order_items`.`order_id` AS `order_id`,
    `order_items`.`item_id` AS `item_id`,
    `order_items`.`qty` AS `qty`,
    `order_items`.`tax_id` AS `tax_id`,
    `order_items`.`rate` AS `rate`,
    `order_items`.`amount` AS `amount`,
    `items`.`item_name` AS `item_name`,
    `items`.`marked_price` AS `marked_price`,
    `items`.`imei_one` AS `imei_one`,
    `items`.`imei_two` AS `imei_two`,
    `items`.`color_id` AS `color_id`,
    `items`.`capacity` AS `capacity`,
    `items`.`brand_id` AS `brand_id`,
    `items`.`brand_model_id` AS `brand_model_id`,
    `brands`.`brand_name` AS `brand_name`,
    `colors`.`color_name` AS `color_name`,
    `brand_models`.`model_name` AS `model_name`,
    `orders`.`org_id` AS `org_id`,
    `orders`.`transaction_type_id` AS `transaction_type_id`,
    `orders`.`entity_id` AS `entity_id`,
    `orders`.`customer_supplier_id` AS `customer_supplier_id`,
    `orders`.`payment_mode_id` AS `payment_mode_id`,
    `orders`.`bill_no` AS `bill_no`,
    `orders`.`date_time` AS `date_time`,
    `orders`.`tax_charge` AS `tax_charge`,
    `orders`.`net_amount` AS `net_amount`,
    `orders`.`discount` AS `discount`,
    `orders`.`paid_status` AS `paid_status`,
    `orders`.`paying_balance` AS `paying_balance`,
    `orders`.`change_return` AS `change_return`,
    `orders`.`date_modified` AS `date_modified`,
    `orders`.`time_stamp` AS `time_stamp`,
    `transaction_types`.`transaction_type_name` AS `transaction_type_name`,
    CONCAT(
        IFNULL(`entitys`.`firstname`, ''),
        ' ',
        IFNULL(`entitys`.`secondname`, ''),
        ' ',
        IFNULL(`entitys`.`lastname`, '')
    ) AS `customer_name`,
    `payment_modes`.`payment_mode_name` AS `payment_mode_name`
FROM
    (
        (
            (
                (
                    (
                        (
                            (
                                (
                                    `order_items`
                                JOIN `items` ON
                                    (
                                        (
                                            `items`.`item_id` = `order_items`.`item_id`
                                        )
                                    )
                                )
                            LEFT JOIN `brands` ON
                                (
                                    (
                                        `brands`.`brand_id` = `items`.`brand_id`
                                    )
                                )
                            )
                        LEFT JOIN `colors` ON
                            (
                                (
                                    `colors`.`color_id` = `items`.`color_id`
                                )
                            )
                        )
                    LEFT JOIN `brand_models` ON
                        (
                            (
                                `brand_models`.`brand_model_id` = `items`.`brand_model_id`
                            )
                        )
                    )
                JOIN `orders` ON
                    (
                        (
                            `orders`.`order_id` = `order_items`.`order_id`
                        )
                    )
                )
            LEFT JOIN `transaction_types` ON
                (
                    (
                        `transaction_types`.`transaction_type_id` = `orders`.`transaction_type_id`
                    )
                )
            )
        LEFT JOIN `entitys` ON
            (
                (
                    `entitys`.`entity_id` = `orders`.`customer_supplier_id`
                )
            )
        )
    LEFT JOIN `payment_modes` ON
        (
            (
                `payment_modes`.`payment_mode_id` = `orders`.`payment_mode_id`
            )
        )
    );