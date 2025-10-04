-- Trigger 
CREATE TRIGGER trigger_name
{BEFORE | AFTER} {INSERT | UPDATE | DELETE}
ON table_name
FOR EACH ROW
BEGIN
    -- Trigger body (SQL statements)
END;

-- new and old
DELIMITER $$
CREATE TRIGGER After_update_cost_pack_cost
BEFORE UPDATE 
on pens
FOR EACH ROW

BEGIN
  SET NEW.pack_cost= NEW.cost * 12 ;
END $$

DELIMITER ;



DELIMITER $$
CREATE TRIGGER delete_order_details_after_delete_order
AFTER DELETE ON orders

FOR EACH ROW
BEGIN
 DELETE FROM order_details WHERE order_id= OLD.id
END $$
 
DELIMITER ;



-- store procedure 
DELIMITER $$
create procedure all_orders()
BEGIN
select * from orders;
END $$
DELIMITER ;




-- store procedure 
DELIMITER $$
create procedure orders_details_report(IN id int)
BEGIN
select o.customer_name, od.product_name, od.quantity, od.price  from order_details od join orders o ON o.id= od.order_id  WHERE order_id = id;
END $$

DELIMITER ;

call orders_details_report(1);


-- view
create view students_table_view  as 
SELECT * FROM students;