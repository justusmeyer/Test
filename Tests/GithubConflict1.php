@@ -9,22 +9,43 @@ ALTER TABLE `beatrice`.`orderitems` ADD COLUMN `item_comment` varchar(50) AFTER
 ALTER TABLE `beatrice`.`rtvitems` ADD COLUMN `item_comment` varchar(50) AFTER `rtv_id`;
 
+#--- 2013-09-17 14:49 ---/
+ALTER TABLE `master` ADD COLUMN `vendor_id` INT AFTER `orderitem_id`,
  ADD COLUMN `parent_id` INT AFTER `vendor_id`;
 
+ALTER TABLE `orderitems` ADD COLUMN `product_id` INT AFTER `received_qty`;
 
 
+#--- 2013-09-18 14:44 ---/
+ALTER TABLE `orderitems` CHANGE COLUMN `received_qty` `received_qty` INT(11) NULL DEFAULT 0  ;
 

+<<<<<<< HEAD
+#--- 2013-09-18 16:58 ---/
+ALTER TABLE `master` ADD COLUMN `photos` INT AFTER `parent_id`;

 

+#--- 2013-09-19 13:39 ---/
+CREATE  TABLE `seasons` (

   `id` INT NOT NULL AUTO_INCREMENT ,

   `name` VARCHAR(64) NULL ,

   PRIMARY KEY (`id`) );


+ALTER TABLE `seasons` CHARACTER SET = utf8 

+=======
+/--- 2013-09-18 16:58 ---/
+ALTER TABLE `beatrice`.`master` ADD COLUMN `photos` INT AFTER `parent_id`;
+
+
+/--- 2013-09-19 13:39 ---/
+CREATE  TABLE `beatrice`.`seasons` (
+
+  `id` INT NOT NULL AUTO_INCREMENT ,
+
+  `name` VARCHAR(64) NULL ,
+
+  PRIMARY KEY (`id`) );
+
+ALTER TABLE `beatrice`.`seasons` CHARACTER SET = utf8 
+
+
+# 2013-09020 17:00
+ALTER TABLE `master` ADD COLUMN `size_type` ENUM('number','text','french','italian') AFTER `photos`;
+>>>>>>> 440709332b36041f3f8179f110ae62a6f0103b34

