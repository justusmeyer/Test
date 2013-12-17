
select fin.week as MWEEK, fin.Color as COLOR, SUM(fin.Price*fin.QTYORDERED)-sum(fin.DISCOUNT) as GROSS
from (SELECT month(s.created_at) as week, year (s.created_at) as year, eaov_color.value as Color,
s.price as PRICE , s.qty_ordered as QTYORDERED, s.discount_amount as DISCOUNT, s.order_id as 'Order ID',
s.product_id as 'Product ID', s.child_id
FROM sales_flat_order sa
left join  (SELECT se.order_id, se.created_at,
IF(se.parent_item_id,a.product_id,se.product_id) as product_id,
IF(se.parent_item_id,se.product_id,a.product_id) as child_id,
IF(se.parent_item_id,a.price,se.price) as price,
IF(se.parent_item_id,a.qty_ordered, se.qty_ordered) as qty_ordered,
IF(se.parent_item_id,a.discount_percent, se.discount_percent) as discount_percent,
IF(se.parent_item_id,a.discount_amount, se.discount_amount) as discount_amount FROM sales_flat_order_item se left join sales_flat_order_item a on
se.parent_item_id=a.item_id where se.product_type='simple') as s on  s.order_id=sa.entity_id
left join catalog_product_entity_int cpei_color on s.product_id=cpei_color.entity_id and cpei_color.attribute_id=92
left join eav_attribute_option_value eaov_color on cpei_color.value= eaov_color.option_id and eaov_color.store_id=1
left join catalog_product_entity_decimal as cped on (cped.entity_id=s.product_id and cped.attribute_id=76)
where eaov_color.value is not null and year(s.created_at) = '2013') as fin group by MWEEK, COLOR