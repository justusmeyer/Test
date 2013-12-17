<table class="table table-striped">

<?php foreach($this->net_sales as $item ):?>
	<tr>
		<td><input type="text" name="net_sales[month]" placeholder="Amount.." value="<?php echo $item->month; ?>" /></td>
		<td><input type="text" name="net_sales[year]" placeholder="Year.." value="<?php echo $item->year; ?>" /></td>
		<td><input type="text" name="net_sales[amount]" placeholder="Amount.." value="<?php echo $item->amount; ?>" /></td>
		<td><input type="text" name="net_sales[type]" placeholder="Type.." value="<?php echo $item->type; ?>" /></td>
		<td><a href="/merchandise/<?php echo $item->id ?>">Edit</a></td>
	</tr>
<?php endforeach ?>
</table>
<input type="submit" value="Edit" class="btn" />

<form action="/merchandise" method="post" <?php echo $this->action ?> id="form" class="form-horizontal " >

<?php foreach($this->net_sales as $item ):?>
<input name="item[month]" type="text" placeholder="month.." value="<?php echo isset($this->planningitems)?$this->planningitems->month:'' ?>"/>
<input name="item[year]" type="text" placeholder="year.." value="<?php echo isset($this->planningitems)?$this->planningitems->year:'' ?>"/>
<input name="item[amount]" type="text" placeholder="amount.." value="<?php echo isset($this->planningitems)?$this->planningitems->amount:'' ?>"/>
<input name="item[type]" type="text" placeholder="type.." value="<?php echo isset($this->planningitems)?$this->planningitems->type:'' ?>"/>
<?php endforeach ?>
<input type="submit" value="Add item" />
</form>


