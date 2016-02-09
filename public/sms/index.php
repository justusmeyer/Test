<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php require "Twilio.php" ?>

</pre>
<form id="frm" name="frm"><input type="hidden" name="ajax" value="1" />
<h4>Text your phone a download link for our iPhone and Android apps</h4>
 <input type="phone" name="phone" placeholder="Enter Your Mobile Number" />
 <button type="submit">Get Link</button>
<div style="display: none;" class="error"></div>
</form>
<pre>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">// <![CDATA[

///////////Javascript
$(function(){
 $("#frm").submit(function(e){
 e.preventDefault();
 $.post("sendnotifications.php", $("#frm").serialize(),
 function(data){
 if(data.sms_sent == 'OK'){
 alert("Message Sent");
 } else {
 alert("Message Not Sent");
 }
 }, "json");
 });
 
});
 
// ]]></script>


</body>
</html>