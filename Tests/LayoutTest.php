<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Beatrice</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
<link href="/stylesheets/bootstrap.css" rel="stylesheet" media="screen"> 
<link href="/stylesheets/style.css" rel="stylesheet" media="screen">  
  
</head>

<body>
<div class="container-fluid">
  <div class="row-fluid" style="padding-top: 20px">
    <div class="span2" id="side-menu" >
      <ul class="nav nav-list affix" >
		  <li class="nav-header">Menu</li>
		  <li class="<?php echo ($this->controller == "customers")?'active':''?>"><a href="/customers">Customers</a></li>
		  <li class="<?php echo ($this->controller == "master")?'active':''?>"><a href="/master">Master</a></li>
		  <li class="<?php echo ($this->controller == "orders")?'active':''?>"><a href="/orders">Orders</a></li>
		  <li class="<?php echo ($this->controller == "rtvs")?'active':''?>"><a href="/rtvs">Returns</a></li>
		  <li class="<?php echo ($this->controller == "payments")?'active':'' ?>"><a href="/payments">Payments</a></li>
		  <li><a href="#" data-toggle="collapse" data-target="#PerformanceMenu">
		  	Performance Reporting <i class="icon-angle-down"></i></a>
			<ul style="list-style: none;" class="collapse in" id="PerformanceMenu">
    			<li class="<?php echo ($this->controller == "reports")?'active':''?>"><a href="/reports">Dashboard</a></li>
    			<li class="<?php echo ($this->controller == "downloads")?'active':''?>"><a href="/downloads">Downloads</a></li>
	  		</ul>
	  	  </li>
		  <li><a href="#" data-toggle="collapse" data-target="#PlanningMenu">
		  	Buying Team <i class="icon-angle-down"></i></a>
			<ul style="list-style: none;" class="collapse in" id="PlanningMenu">
    			<li class="<?php echo ($this->controller == "merchandise")?'active':''?>"><a href="/merchandise">Merchandise Planning</a></li>
	  		</ul>
	  	  </li>
		  
	  </ul>
	
    </div>
    <div class="span10" style="overflow: auto;">
    	<?php if(Flash::has()): ?>
		<div class="errorswrp">
			<div class="errors">
				<?php Flash::draw() ?>
			</div>
		</div>
		<?php endif ?>
      	<?php
			$this->yield();
		?>
    </div>
  </div>
</div>


	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="/javascripts/bootstrap.min.js"></script>
	<script src="/javascripts/javascript.js"></script>   
	<script type="text/javascript"> $('.collapse').collapse()</script> 
</body>
</html>






