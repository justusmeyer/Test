@@ -11,7 +11,7 @@
 			<div class="control-group span4 offset1">
 				<label class="control-label">Vendor Name</label>
 				<div class="controls">
-					<?php $vendor_name = isset($this->order) ? $this->order->vendor : (isset($this->vendor) ? $this->vendor->name : '')?>
+					<?php $vendor_name = isset($this->order) ? $this->order->vendor: (isset($this->vendor) ? $this->vendor->name:'')?>
 					<input type="hidden" name="order[vendor]" value="<?php echo $vendor_name ?>" /><?php echo $vendor_name ?>
 				</div>
 			</div>
@@ -99,6 +99,22 @@
 				</div>
 			</div>
 		</div>
+		<?php if(! isset($this->order)):?>
+		<div class="row-fluid">
+			<div class="control-group span4">
+				<label class="control-label">Size Type</label>
+				<div class="controls">
+					<select name="size_type" class="validate">
+						<option value="0">Select a Size</option>
+						<option value="number" >Number</option>
+						<option value="text" >Text</option>
+						<option value="french" >French</option>
+						<option value="italian">Italian</option>
+					</select>
+				</div>
+			</div>
+		</div>
+		<?php endif ?>
 	</fieldset>
 	<fieldset>
 		<legend>Order Items</legend>

