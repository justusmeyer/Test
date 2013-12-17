<fieldset>
		<legend>Order Items</legend>
		<select id="product_id">
			<option value="0">Create a new product</option>
			<?php if(isset($this->order)){$this->vendor = $this->order->Vendor; } ?>
			<?php foreach($this->vendor->getProducts() as $product): ?>
				<option value="<?php echo $product->id ?>"><?php echo $product->id." - ".$product->item_name ?></option>
			<?php endforeach ?>
		</select>
		<a href="javascript:Order.addRow()">Add a row</a>	
		<table class="form_orderitems" border="1">
<thead>