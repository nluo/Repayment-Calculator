<?php

$amount=$_GET["amount"];
$mortgage=$_GET["mortgage"];
$interest=$_GET["interest"];
$frequency=$_GET["frequency"];
$rtype=$_GET["rtype"];

$period=0;
if ($frequency=="Weekly"){
	$period=52;
	}
else if ($frequency=="Fortnightly"){
	$period=26;
	}
else if ($frequency=="Monthly"){
	$period=12;
	}

$power=$mortgage*$period;
$term_interest=$interest/($period*100);

$payment=round($amount*$term_interest*pow((1+$term_interest),$power)/(pow((1+$term_interest),$power)-1));

/*$text = "{\n".'"amount": "'.$amount.'",'."\n".'"mortgage": "'.$mortgage.'",'."\n".'"interest": "'.$interest.'",'."\n".'"frequency": "'.$frequency.'",'."\n".'"rtype": "'.$rtype.'",'."\n".'"payment": "'.$payment.'"'."\n}";

file_put_contents('Result.json', $text);
*/



echo "Your ".strtolower($frequency)." mortgage repayment<br /><h2>$".$payment."</h2>";

?>