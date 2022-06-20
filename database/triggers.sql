/* TRIGGER TO BALANCE ON STOCK AND ITEM AVAILABILITY
 */
 
 DROP TRIGGER order_items_update_item_availability;
 delimiter $$
CREATE TRIGGER order_items_update_item_availability AFTER INSERT ON order_items
    FOR EACH ROW BEGIN
   
    DECLARE this_order_id integer;
    DECLARE this_transaction_type_id integer;

    SET @this_order_id := NEW.order_id;

    SET @this_transaction_type_id := (SELECT transaction_type_id FROM orders WHERE order_id = NEW.order_id);
    
    SET @this_brand_model_id := (SELECT brand_model_id FROM items WHERE item_id = NEW.item_id);

    IF this_transaction_type_id = 1 THEN
      /*if sales(cash/credit), then make the item unavailable for another sale*/
      UPDATE items SET availability = 0 WHERE item_id = NEW.item_id;
      
      /*Then update stock level*/
      UPDATE brand_models SET available_qty = available_qty - 1 WHERE brand_models.brand_model_id = this_brand_model_id;
     
     ELSEIF this_transaction_type_id = 3 THEN
     /*if sales(cash/credit), then make the item unavailable for another sale*/
      UPDATE items SET availability = 0 WHERE item_id = NEW.item_id;
      
      /*Then update stock level*/
      UPDATE brand_models SET available_qty = available_qty - 1 WHERE brand_models.brand_model_id = this_brand_model_id;
      
    END IF;
   
    END $$
delimiter ;



-- Update as 22-03-2021
  DROP TRIGGER IF EXISTS `item_bulk_import`;
    DELIMITER $$
    CREATE TRIGGER item_bulk_import AFTER INSERT ON items_two
        FOR EACH ROW BEGIN
    
        DECLARE this_brand_id integer;
        DECLARE this_color_id integer;
        DECLARE this_unit_id integer;
        DECLARE this_category_id integer;
        
        DECLARE brand_doesexist varchar(30) DEFAULT NULL;
        DECLARE color_doesexist varchar(30) DEFAULT NULL;
        DECLARE unit_doesexist varchar(30) DEFAULT NULL;
        DECLARE category_doesexist varchar(30) DEFAULT NULL;

        -- Get the ids
        SELECT brands.brand_id INTO this_brand_id FROM brands WHERE brands.brand_name = NEW.brand_id;    
        SELECT colors.color_id INTO this_color_id FROM colors WHERE colors.color_name = NEW.color;
        SELECT units.unit_id INTO this_unit_id FROM units WHERE units.unit_name = NEW.unit;
        SELECT categories.cat_id INTO this_category_id FROM categories WHERE categories.cat_name = NEW.category;

        -- Search IF the mappings exist(ids)
        SELECT ifnull((select brand_id from brands where brand_id = this_brand_id), 'Empty') INTO brand_doesexist;
        SELECT ifnull((select color_id from colors where color_id = this_color_id), 'Empty') INTO color_doesexist;
        SELECT ifnull((select unit_id from units where unit_id = this_unit_id), 'Empty') INTO unit_doesexist;
        SELECT ifnull((select cat_id from categories where cat_id = this_category_id), 'Empty') INTO category_doesexist;

        IF brand_doesexist = 'Empty' OR color_doesexist = 'Empty' OR unit_doesexist = 'Empty' OR category_doesexist = 'Empty' THEN
        -- IF cast(this_brand_id AS UNSIGNED) = 0 OR cast(this_color_id AS UNSIGNED) = 0 OR cast(this_category_id AS UNSIGNED) = 0 OR cast(this_unit_id AS UNSIGNED) = 0 THEN
        -- IDs Not Found
        -- Insert into dumped items table (items_three)
            INSERT IGNORE
                INTO items_three(
                    brand_id,
                    tax_type_id,
                    specify,
                    category,
                    unit,
                    item_name,
                    buying_price,
                    marked_price,
                    selling_price,
                    color,
                    narrative,
                    barcode,
                    reference,
                    reorder_level,
                    opening_stock
                )
                VALUES(
                    NEW.brand_id,
                    NEW.tax_type_id,
                    NEW.specify,
                    NEW.category,
                    NEW.unit,
                    NEW.item_name,
                    NEW.buying_price,
                    NEW.marked_price,
                    NEW.selling_price,
                    NEW.color,
                    NEW.narrative,
                    NEW.barcode,
                    NEW.reference,
                    NEW.reorder_level,
                    NEW.opening_stock
                );

        ELSE
        -- IDs Found
        -- Do an insert to the items table
            INSERT IGNORE
                INTO items(
                    brand_id,
                    tax_type_id,
                    category_id,
                    unit_id,
                    item_name,
                    buying_price,
                    marked_price,
                    selling_price,
                    color_id,
                    narrative,
                    barcode,
                    reference,
                    reorder_level,
                    available_qty
                )
                VALUES(
                    this_brand_id,
                    tax_type_id,
                    this_category_id,
                    this_unit_id,
                    NEW.item_name,
                    NEW.buying_price,
                    NEW.marked_price,
                    NEW.selling_price,
                    this_color_id,
                    NEW.narrative,
                    NEW.barcode,
                    NEW.reference,
                    NEW.reorder_level,
                    NEW.opening_stock
                );
            
            IF ROW_COUNT() = 0 THEN 
            -- Failed (0) due to duplicate entries 
            -- Push this data to the items_three table
            INSERT IGNORE
                INTO items_three(
                    brand_id,
                    tax_type_id,
                    specify,
                    category,
                    unit,
                    item_name,
                    buying_price,
                    marked_price,
                    selling_price,
                    color,
                    narrative,
                    barcode,
                    reference,
                    reorder_level,
                    opening_stock
                )
                VALUES(
                    NEW.brand_id,
                    NEW.tax_type_id,
                    NEW.specify,
                    NEW.category,
                    NEW.unit,
                    NEW.item_name,
                    NEW.buying_price,
                    NEW.marked_price,
                    NEW.selling_price,
                    NEW.color,
                    NEW.narrative,
                    NEW.barcode,
                    NEW.reference,
                    NEW.reorder_level,
                    NEW.opening_stock
                );
                
            END IF;

        END IF;
        
    
        END $$
    DELIMITER ;





