<?php
require '../lib/export.php';

class MerchandiseController extends ApplicationController{
	var $access = "private";

	function index(){
		$this->fullsales_report();

	}

	public function getMethodsName(){
		$array = array();
		foreach(get_class_methods('MerchandiseController') as $method){
			if($pos = strrpos($method,"_report"))
				$array[] = substr($method,0,$pos);
		}
		return $array;
	}

	private function fullsales_report(){
		$mo = new Magentoobject();
		$result = $mo::$link->query("select ori.gross, ori.discounts, ori.returns, fin.fullprice, fin.Cost, fin.week, fin.year from 
	(SELECT sum(base_subtotal) as gross, sum(base_discount_amount) as discounts, sum(subtotal_refunded) as returns, month(created_at) as week, YEAR(created_at) as year, 
sum(base_total_refunded) FROM sales_flat_order s group by week, year) as ori
left join
(SELECT SUM(s.qty_ordered*c.value) as fullprice, sum(scost.value*s.qty_ordered)-sum(scost.value*qty_refunded) as Cost, month(s.created_at) as week, YEAR(s.created_at) as year 
	FROM sales_flat_order_item s 
left join catalog_product_entity_decimal c on s.product_id = c.entity_id and attribute_id=75
left join catalog_product_entity_decimal scost on s.product_id=scost.entity_id and scost.attribute_id=79
where parent_item_id IS NULL 
group by week, year) as fin on ori.week = fin.week and ori.year=fin.year
				where ori.year=".date("Y")." and ori.week > 1 order by ori.week ASC limit 7");
		
		$this->ui = array(
				'titles'=>array('Sales'),
				'subcatplan'=>array('SalesLAST','SalesPLAN','SalesACTUAL')
		);
		
		$netsalesforecast = $this->getnetsalesforecast();
		
		$this->netsales = array();
		$this->netsales[] = array('month'=>'($ in 000s)','SalesACTUAL'=>'Actual',);
		
		
		while($row = $result->fetch_assoc()){
			$temp = array();
			$temp['month'] = date("F", mktime(0, 0, 0, $row['week'], 10));
			$temp['SalesACTUAL'] = "$".number_format(($row['gross'] + $row['discounts'] - $row['returns'])/1000,0,'.',',');
			$this->netsales[] = $temp;

		}	

		$this->netsalestotals = array();
		
	$result = $mo::$link->query("select sum(ori.gross) as GrossSales, sum(ori.discounts) as DiscountsSales, sum(ori.returns) as ReturnsSales, sum(fin.fullprice) as fullpriceSales, fin.Cost, fin.week, fin.year from 
	(SELECT sum(base_subtotal) as gross, sum(base_discount_amount) as discounts, sum(subtotal_refunded) as returns, month(created_at) as week, YEAR(created_at) as year, 
sum(base_total_refunded) FROM sales_flat_order s group by week, year) as ori
left join
(SELECT SUM(s.qty_ordered*c.value) as fullprice, sum(scost.value*s.qty_ordered)-sum(scost.value*qty_refunded) as Cost, month(s.created_at) as week, YEAR(s.created_at) as year 
	FROM sales_flat_order_item s 
left join catalog_product_entity_decimal c on s.product_id = c.entity_id and attribute_id=75
left join catalog_product_entity_decimal scost on s.product_id=scost.entity_id and scost.attribute_id=79
where parent_item_id IS NULL 
group by week, year) as fin on ori.week = fin.week and ori.year=fin.year
				where ori.year=".date("Y")." and ori.week > 1 order by ori.week ASC limit 7");
		
	$this->ui = array(
				'titles'=>array('Sales'),
				'subcatplan'=>array('SalesLAST','SalesPLAN','SalesACTUAL')
		);
		
		
		$this->netsalestotals = array();
		$this->netsalestotals[] = array('month'=>'',
				'Sales'=>'', 'SalesLAST'=>'','SalesPLAN'=>'','SalesACTUAL'=>'',);
		
		while($row = $result->fetch_assoc()){
			$temp = array();
			$temp['month'] = "Total";
			$temp['Sales'] = '';
			$temp['SalesLAST'] = '';
			$temp['SalesPLAN'] = '';
			$temp['SalesACTUAL'] = "$".number_format(($row['GrossSales'] + $row['DiscountsSales'] - $row['ReturnsSales'])/1000,0,'.',',');;
			$this->netsalestotals[] = $temp;

		}	
		
		
		$planning_items = new Planningitem();
		$this->net_sales = $planning_items->find("type='net_sales'");
		
		return true;
	}
	
	function getUiClass($haystack, $needle){
		if(array_search($needle, $haystack['titles'])!==false)
			return 'title';
		if(array_search($needle, $haystack['subcatplan'])!==false)
			return 'subcatplan';
	}

	function create(){
		if(isset($_POST['item'])){
			$item = new Planningitem($_POST['item']);
			$item->save();
			
			$this->redirect_to('/merchandise');
		}
	}
	
	function getnetsalesforecast(){
		$query = "SELECT amount, month FROM beatrice.planningitems where type like 'net_sales' order by month";
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
	}
	
}
