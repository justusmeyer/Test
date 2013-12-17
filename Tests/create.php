

<form action="/merchandise/create" method="post" <?php echo $this->form_action ?>" id="form" class="form-horizontal " >
					
<input name="item[month]" type="text" placeholder="month.." value="<?php echo isset($this->planningitems)?$this->planningitems->month:'' ?>"/>
<input name="item[year]" type="text" placeholder="year.." value="<?php echo isset($this->planningitems)?$this->planningitems->year:'' ?>"/>
<input name="item[amount]" type="text" placeholder="amount.." value="<?php echo isset($this->planningitems)?$this->planningitems->amount:'' ?>"/>
<input name="item[type]" type="text" placeholder="type.." value="<?php echo isset($this->planningitems)?$this->planningitems->type:'' ?>"/>
<input type="submit" value="Add item" />
</form>
