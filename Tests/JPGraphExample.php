<?php
require '../lib/export.php';
require '../lib/jpgraph/jpgraph.php';
require '../lib/jpgraph/jpgraph_line.php';

class AnalyticsController extends ApplicationController{
	var $access = "private";

	function index(){
		$this->new_graph();
	}

	private function new_graph(){
		$mo = new Magentoobject();
		return true;
		}
		
	function jpgraph(){
		$this->render = false;
		
		$datay1 = array(12,9,42,8,0);
		$datay2 = array(12,9,42,8,0);
		$datay3 = array(5,17,32,24,25);
		
		// Setup the graph
		$graph = new Graph(1200,400);
		$graph->SetScale("textlin");
		
		$theme_class=new UniversalTheme;
		
		$graph->SetTheme($theme_class);
		$graph->img->SetAntiAliasing(false);
		$graph->title->Set('Return Rate');
		$graph->SetBox(false);
		
		$graph->img->SetAntiAliasing();
		
		$graph->yaxis->HideZeroLabel();
		$graph->yaxis->HideLine(false);
		$graph->yaxis->HideTicks(true,false);
		
		$graph->xgrid->Show();
		$graph->xgrid->SetLineStyle("solid");
		$graph->xaxis->SetTickLabels(array('A','B','C','D','E'));
		$graph->xgrid->SetColor('#E3E3E3');
		
		// Create the first line
		$p1 = new LinePlot($datay1);
		$graph->Add($p1);
		$p1->SetColor("#6495ED");
		$p1->SetLegend('Line 1');
		
		// Create the second line
		$p2 = new LinePlot($datay2);
		$graph->Add($p2);
		$p2->SetColor("#B22222");
		$p2->SetLegend('Line 2');
		
		// Create the third line
		$p3 = new LinePlot($datay3);
		$graph->Add($p3);
		$p3->SetColor("#FF1493");
		$p3->SetLegend('Line 3');
		
		$graph->legend->SetFrameWeight(1);
		
		// Output line
		$graph->Stroke();			
	}

	function getReturnRate(){
		$query = "select ori.returns/(ori.gross + ori.discounts) as Return_Rate from 
	(SELECT sum(base_subtotal) as gross, sum(base_discount_amount) as discounts, sum(subtotal_refunded) as returns, month(created_at) as week, YEAR(created_at) as year, 
sum(base_total_refunded) FROM sales_flat_order s group by week, year) as ori
where ori.year=".date("Y")." order by ori.week ASC";
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