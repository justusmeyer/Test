
<div class="body-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
			
				<?php $handle = opendir($_SERVER['DOCUMENT_ROOT'].'/images/fourteen/spring'); ?>
				
				<div class="portfolio-items">
				
				<?php while($file = readdir($handle)){ ?>
			
				<div class="thumb-label-item ">
                <div class="img-overlay ">
				 
				 <?php  if($file !== '.' && $file !== '..' && $file !== '.DS_Store'){ ?>
				 <a href="../images/fourteen/spring/<?php echo $file ?>" data-rel="prettyPhoto[portfolio]">
				
				
				<?php echo '<img src="../images/fourteen/spring/'.$file.'" height="250" width="250" vspace="10" hspace="10"/>'; } ?>
				
				</a>
				</div>
				</div>
				
				<?php } ?>
				
	
				</div>
			</div>
		</div>		
	</div>
</div>
