<?php

class DashboardseasonController extends ApplicationController{
	var $access = "private";

	function index(){
	if(!isset($_POST['q'])){
			$this->fullsales_report($q='F12',$r='R13',$s='S13',$t='P13',$u='F13');}
			else{ $this->fullsales_report($_POST['q'],$_POST['r'],$_POST['s'],$_POST['t'],$_POST['u']);
			}
	}
	
	public function getMethodsName(){
		$array = array();
		foreach(get_class_methods('DashboardseasonController') as $method){
			if($pos = strrpos($method,"_dashboardseason"))
				$array[] = substr($method,0,$pos);
		}
		return $array;
	}
	
/* This is the sell through analysis query - all beatrice queries are created using separate functions at the bottom of this page.*/		
	private function fullsales_report($q,$r,$s,$t,$u){
		$mo = new Magentoobject();
		$result = $mo::$link->query("Select fin.SEASON as RETAILSEASON, ori.season,ori.inventory_retail as CURRENTSTOCKRETAIL, 
ori.inventory_current as CURRENTSTOCKCURRENT, ori.inventory_cost as CURRENTSTOCKCOST, 
ori.current_units as CURRENTSTOCKQTY,  fin.NETQTY as NETQTYSOLD, fin.GROSSSALES as SEASONGROSSSALES, 
fin.NETSALES as SEASONNETSALES, fin.NETCOGS as SEASONNETCOGS
from
(SELECT mid(SKU, locate('-', SKU)+1,3) as Season,  
sum(cost.value*istock.qty) as inventory_cost, sum(price.value*istock.qty) as inventory_retail, 
sum(ifnull(ifnull(specialprice.s_price , s_price.value), price.value)*istock.qty) as inventory_current,
sum(istock.qty) as current_units
FROM catalog_product_entity c
left join catalog_product_entity_varchar cpev on cpev.entity_id = c.entity_id and cpev.attribute_id=71 
left join catalog_product_entity_decimal cost on c.entity_id=cost.entity_id and cost.attribute_id=79
left join catalog_product_entity_decimal price on c.entity_id=price.entity_id and price.attribute_id=75
left join catalog_product_entity_decimal s_price on c.entity_id=s_price.entity_id and s_price.attribute_id=76
left join cataloginventory_stock_item istock on c.entity_id=istock.product_id
left join ( SELECT c.entity_id, c.sku as skup,  s_price.value as s_price
FROM catalog_product_entity c
left join catalog_product_entity_decimal s_price on c.entity_id=s_price.entity_id and s_price.attribute_id=76
where c.type_id='configurable'
group by entity_id) as specialprice on  substring_index(c.sku,'-',4) = specialprice.skup
where c.type_id='simple'
group by season) as ori
left join
(SELECT sal.SEASON as SEASON, sum(sal.DISCOUNT) as DISCOUNTS, sum(sal.COST*sal.QTYORDERED)-sum(sal.COST*sal.QTYRETURNED) as COGS, 
sum(sal.QTYORDERED) as QTYORD, sum(sal.QTYRETURNED) as QTYRET, 
sum(sal.QTYORDERED)-if(sal.SEASON='F12',sum(sal.QTYRETURNED)-110,sum(sal.QTYRETURNED)) as NETQTY, sum(sal.PRICE*sal.QTYORDERED) as GROSSSALES, 
sum(sal.PRICE*sal.QTYORDERED)-sum(sal.DISCOUNT)-IF(sal.SEASON='F12',(sum(sal.PRICE*sal.QTYRETURNED)-sum(sal.DISCOUNT*sal.QTYRETURNED))-33141,(sum(sal.PRICE*sal.QTYRETURNED)-sum(sal.DISCOUNT*sal.QTYRETURNED))) as NETSALES,
sum(sal.COST*sal.QTYORDERED)-if(sal.SEASON='F12',sum(sal.COST*sal.QTYRETURNED)-11283,sum(sal.COST*sal.QTYRETURNED)) as NETCOGS
from
(SELECT sa.increment_id as 'Increment ID', s.order_id as 'Order ID', s.product_id as 'Product ID', 
s.child_id, mid(SKU, locate('-', SKU)+1,3) as SEASON, 
s.price as PRICE, scost.value as COST, s.qty_ordered as QTYORDERED, qty_refunded as QTYRETURNED,  
s.discount_amount as DISCOUNT, cped.value as 'Special Price' 
 FROM sales_flat_order sa 
left join  (SELECT se.order_id, se.created_at, se.sku, se.name, 
IF(se.parent_item_id,a.product_id,se.product_id) as product_id,
IF(se.parent_item_id,se.product_id,a.product_id) as child_id,
IF(se.parent_item_id,a.price,se.price) as price, 
IF(se.parent_item_id,a.qty_canceled, se.qty_canceled) as qty_canceled,
IF(se.parent_item_id,a.qty_invoiced, se.qty_invoiced) as qty_invoiced,
IF(se.parent_item_id,a.qty_ordered, se.qty_ordered) as qty_ordered,
IF(se.parent_item_id,a.qty_refunded, se.qty_refunded) as qty_refunded,
IF(se.parent_item_id,a.discount_percent, se.discount_percent) as discount_percent, 
IF(se.parent_item_id,a.discount_amount, se.discount_amount) as discount_amount FROM sales_flat_order_item se left join sales_flat_order_item a on
se.parent_item_id=a.item_id where se.product_type='simple') as s on  s.order_id=sa.entity_id
left join catalog_product_entity_decimal scost on s.product_id=scost.entity_id and scost.attribute_id=79
left join catalog_product_entity_int cpei on s.product_id=cpei.entity_id and cpei.attribute_id=140
left join eav_attribute_option_value eaov on cpei.value= eaov.option_id and eaov.store_id=1
left join catalog_product_entity_decimal as cped on (cped.entity_id=s.product_id and cped.attribute_id=76)) as sal
group by sal.SEASON) as fin on ori.season=fin.SEASON
where ori.season <> 999 and ori.season = '$q' or ori.season = '$r' or ori.season = '$s' or ori.season = '$t' or ori.season = '$u'
				order by Field(ori.season, '$q','$r','$s','$t','$u')");
		$this->sellthrough = array();
		$this->sellthrough[] = array('RETAILSEASON'=>'','Current'=>'Current Inventory ($)','CURRENTSTOCKRETAIL'=>'Current Stock at Full Retail Value', 'CURRENTSTOCKCURRENT'=>'Current Stock at Current Value',
				'CURRENTSTOCKCOST'=>'Current Stock at Cost Value','Sales'=>'Season Sales ($)','SEASONGROSSSALES'=>'Gross Sales For Season','SEASONNETSALES'=>'Net Sales For Season','SEASONNETCOGS'=>'Net Cost of Season Sales',
				'Marginrate'=>'% Gross Margin','returnrate'=>'% Return Rate', 'Units'=>'Sell Through by Units','CURRENTSTOCKQTY'=>'Current Inventory Units','NETQTYSOLD'=>'Net Inventory Units Sold');
		
		$this->ui = array(
					'titles'=>array('Value','Current','Sales','Units'),
					'highlight'=>array('Marginrate','returnrate')
				);

		/* $totalarrivalcost = $this->getTotalArrivalCost(); */

		while($row = $result->fetch_assoc()){
			$temp = array();
			$temp['RETAILSEASON'] = $row['RETAILSEASON'];
			$temp['Current'] = '';
			$temp['Sales'] = '';
			$temp['Units'] = '';
			$temp['Value'] = '';
			$temp['CURRENTSTOCKRETAIL'] = "$".number_format($row['CURRENTSTOCKRETAIL'],0,'.',',');
			$temp['CURRENTSTOCKCURRENT'] = "$".number_format($row['CURRENTSTOCKCURRENT'],0,'.',',');
			$temp['CURRENTSTOCKCOST'] = "$".number_format($row['CURRENTSTOCKCOST'],0,'.',',');
			$temp['CURRENTSTOCKQTY'] = number_format($row['CURRENTSTOCKQTY'],0,'.',',');
			$temp['NETQTYSOLD'] = number_format($row['NETQTYSOLD'],0,'.',',');
			$temp['SEASONGROSSSALES'] = "$".number_format($row['SEASONGROSSSALES'],0,'.',',');
			$temp['SEASONNETSALES'] = "$".number_format($row['SEASONNETSALES'],0,'.',',');
			$temp['SEASONNETCOGS'] = "$".number_format($row['SEASONNETCOGS'],0,'.',',');
			$temp['Marginrate'] = (($row['SEASONNETSALES'])? number_format(($row['SEASONNETSALES'] - $row['SEASONNETCOGS'])*100/($row['SEASONNETSALES']),0,'.',','):'0')."%";
			$temp['returnrate'] = (($row['SEASONGROSSSALES'])? number_format(($row['SEASONGROSSSALES']-$row['SEASONNETSALES'])*100/($row['SEASONGROSSSALES']),0,'.',','):'0')."%";			
			
			$this->sellthrough[] = $temp;
		}

		return true;
	}

	
/* This is the Beatrice query for sell through analysis*/
	/* function getTotalArrivalCost(){
		$query = "SELECT sum(quantity_arrived*unit_cost + reorder_arrival*unit_cost),season FROM `master` m group by season";
		$result = mysql_query($query);
		$array = array();
		while($row = mysql_fetch_row($result)){
			if($row[1])
				$array[$row[1]] = $row[0];
		}
		foreach ($array as $key => $val) {
			$array[$key] = $val;
		}
	
		return $array;
	} */
	

	/**
	 * @param Array $haystack of names
	 * @param unknown_type $needle
	 * @return string
	 */
	function getUiClass($haystack, $needle){
		if(array_search($needle, $haystack['titles'])!==false)
			return 'title';
		if(array_search($needle, $haystack['highlight'])!==false)
			return 'highlight';
	}
}



