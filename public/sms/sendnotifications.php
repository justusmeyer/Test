<?php
require('../Twilio.php'); 
 
$account_sid = 'ACc0aa91d3d94c22972517f18d1921eafb'; 
$auth_token = '[AuthToken]'; 
$client = new Services_Twilio($account_sid, $auth_token); 
 
$client->account->messages->create(array(  
	'From' => "+16178700193",    
));
?>