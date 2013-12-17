<form action="/merchandise/update" method="post" <?php echo $this->action ?> id="form" class="form-horizontal " >


<table class="table table-striped">
	<tr>
		<td>sales plan</td>
	</tr>

<?php foreach($this->net_sales as $item ):?>
	<tr>	
		<td>
		<input type="hidden" name="net_sales[<?php echo $item->id ?>][id]"  value="<?php echo $item->id ?>" />
		<input type="hidden" name="net_sales[<?php echo $item->id ?>][month]" placeholder="Month.." value="<?php echo $item->month ?>" />
		<input type="hidden" name="net_sales[<?php echo $item->id ?>][year]" placeholder="Year.." value="<?php echo $item->year ?>" />
		<input type="text" name="net_sales[<?php echo $item->id ?>][amount]" placeholder="Amount.." value="<?php echo $item->amount ?>" />
		<input type="hidden" name="net_sales[<?php echo $item->id ?>][type]" placeholder="Type.." value="<?php echo $item->type ?>" />
		</td>
		
	</tr>
<?php endforeach ?>

</table>


<input type="submit" value="Save & Continue" name="submit_and_continue" class="btn btn-primary" />
</form>


