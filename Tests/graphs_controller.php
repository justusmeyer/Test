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
		$p1->SetColor("red");
		$p1->SetLegend('Line 1');
		
		$graph->legend->SetFrameWeight(1);
		
		// Output line
		$graph->Stroke();			
	}
}