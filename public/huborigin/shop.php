<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/skdslider.css" rel="stylesheet">
<script src="/javascripts/jquery-1.10.2.js"></script>
<script src="/javascripts/skdslider.js"></script>
<script type="text/javascript">
                jQuery(document).ready(function(){
                        jQuery('#demo').skdslider({'delay':5000, 'fadeSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoStart':true});
                });
</script>
<style type="text/css">
.demo-code{ background-color:#ffffff; border:1px solid #333333; display:block; padding:10px;}
</style>
</head>

<body>
<div id="container">
<?php include('outline/header.php'); ?>

<div id="demo" class="skdslider">
	<ul>
		<li><img src="images/shop/shop1.jpg"></li>
		<li><img src="images/shop/shop2.jpg"/></li>
		<li><img src="images/shop/shop3.jpg"></li>
	</ul>
</div>

	<div id="content">
		<p>We pride ourselves on offering the highest quality bicycle service in the Tetons. Every bike brought in the shop is attended to by a mechanic with many years of wrenching experience. We understand your bike means a lot to you and treat it as if it was our own.</p>
		<p>Your bike will be tended to by either a European Mechanic with over 20 years of experience or the owner with over 15 years of experience.</p>
		<p>If you&#39;d like work on your bike please call us to make an appointment. Once you make an appointment, you drop the bike off that morning (or the previous evening) and it&#39;ll be ready that evening.</p>
		<p>First time customer? Come on in to schedule an appointment so we can get to know the bike.</p>
	</div>

<?php include('outline/footer.php'); ?>
</div>
