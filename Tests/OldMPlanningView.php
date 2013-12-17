<link rel="stylesheet" type="text/css" media="print" href="/stylesheets/print.css">
    <a href="/merchandise/create"  class="btn" >Edit Plan Targets</a>

<h3>Halsbrook Merchandise Plan: Spring / Summer 2013</h3>

<?php foreach($this->net_sales as $item):?>
<?php echo $item->amount; ?><br />
<?php endforeach; ?>


<table class="tableplan">
<?php 
$width = count($this->netsales);
$height = count($this->netsales[0]);
$keys = array_keys($this->netsales[0]);
?>
	<?php for($i = 0; $i < $height; $i++): ?>
	<tr class="<?php echo $this->getUiClass($this->ui,$keys[$i]) ?>" >
		<?php for($a = 0; $a < $width ; $a++): ?>
			<td><input type="text" value="<?php echo $this->netsales[$a][$keys[$i]] ?>" name="net_sales[2013][03]" /></td>
		<?php endfor ?>
	</tr>
	<?php endfor ?>
	
	
</table>

<table class="tableplanside">
<?php 
$width = count($this->netsalestotals);
$height = count($this->netsalestotals[0]);
$keys = array_keys($this->netsalestotals[0]);

?>
	<?php for($i = 0; $i < $height; $i++): ?>
	<tr class="<?php echo $this->getUiClass($this->ui,$keys[$i]) ?>" >
		<?php for($a = 0; $a < $width ; $a++): ?>
			<td><?php echo $this->netsalestotals[$a][$keys[$i]] ?></td>
		<?php endfor ?>
	</tr>
	<?php endfor ?>
</table>

