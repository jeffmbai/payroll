-- 10.04.2022
ALTER TABLE `orgs` ADD `default_sp` VARCHAR(10) NULL DEFAULT 'no' AFTER `pos_mode`; 

-- 11.04.2022
ALTER TABLE `orgs` ADD `box_number` VARCHAR(150) NULL DEFAULT NULL AFTER `address`; 

-- 13.04.2022
ALTER TABLE `items` ADD `recipe_code` VARCHAR(50) NULL DEFAULT 'NA' AFTER `color_id`; 

CREATE TABLE `item_recipe_items` (
  `id` int NOT NULL,
  `item_id` int NOT NULL,
  `recipe_code` varchar(20) NOT NULL,
  `measurement` varchar(50) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `narrative` varchar(50) DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

ALTER TABLE `item_recipe_items`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `item_recipe_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

-- 14.04.2022
ALTER TABLE `orgs` ADD `mpesa_details` VARCHAR(100) NULL DEFAULT NULL AFTER `default_sp`;

-- 18.04.2022
ALTER TABLE `order_items` ADD `is_editted` BOOLEAN NOT NULL DEFAULT FALSE AFTER `amount`; 
ALTER TABLE `order_items` ADD `print_session` VARCHAR(60) NULL DEFAULT NULL AFTER `is_editted`; 
ALTER TABLE `order_items` ADD `entity_id` INT NULL DEFAULT NULL AFTER `print_session`; 
ALTER TABLE `item_returned`   
    ADD `return_status` INT NOT NULL AFTER `item_status_id`, 
    ADD `order_item_id` INT NOT NULL AFTER `return_status`, 
    ADD `order_id` INT NOT NULL AFTER `order_item_id`, 
    ADD `return_condition` ENUM('Good','Spoilt') NOT NULL DEFAULT 'Good' AFTER `order_id`, ADD `created_by` INT NOT NULL AFTER `return_condition`; 
ALTER TABLE `item_returned` DROP `return_status`; 
ALTER TABLE `item_returned` ADD `return_date` DATE NOT NULL AFTER `created_by`; 
ALTER TABLE `item_returned` ADD `store_id` INT NOT NULL AFTER `item_return_id`; 
DELETE FROM `item_status` WHERE `item_status`.`item_status_id` = 1;
DELETE FROM `item_status` WHERE `item_status`.`item_status_id` = 3;
UPDATE `item_status` 
        SET `item_status_id` = '1' 
          WHERE `item_status`.`item_status_id` = 2; 
UPDATE `item_status` 
        SET `item_status_id` = '2' 
          WHERE `item_status`.`item_status_id` = 4; 

ALTER TABLE `item_returned` ADD `qty` INT NOT NULL AFTER `return_condition`; 
DROP TRIGGER IF EXISTS `item_returned_update_model_count`;

ALTER TABLE `order_items` ADD `qty_returned` INT NULL DEFAULT '0' AFTER `qty`; 
ALTER TABLE `item_returned` ADD `reference` VARCHAR(20) NOT NULL AFTER `item_return_id`; 

-- 21.04.2022
ALTER TABLE
    `orgs` ADD `organization_type` ENUM('Retail', 'Restaurant', 'Other') NOT NULL DEFAULT 'Other' AFTER `mpesa_details`,
    ADD `kra_pin` VARCHAR(20) NULL DEFAULT NULL AFTER `organization_type`,
    ADD `vat_no` VARCHAR(20) NULL DEFAULT NULL AFTER `kra_pin`;


    
