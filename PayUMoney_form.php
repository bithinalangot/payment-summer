<?php
$posted = array();
if(!empty($_POST)) {
	//print_r($_POST);
	foreach($_POST as $key => $value) {
		$posted[$key] = $value;
	}
}

$number_of_tickets = $posted['tickets'];
$programs = array(
	"Early Bird Academic ₹10,000" => 10000,
	"Early Bird Professionals ₹15,000" => 15000,
	"Early Bird Startups ₹8,500" => 8500

);

$cost = 15000;

foreach ( $programs as $key => $value ) {
	if ( $posted['program'] == $key ) {
		$cost = $value* $posted['tickets'];
		if ( $posted['tickets'] > 0 and $posted['tickets'] > 3) {
			$cost = $cost - $cost * 0.20;
		}
	}
}

$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

// Merchant key here as provided by Payu
$MERCHANT_KEY = "HLsaVbv7";

// Merchant Salt as provided by Payu
$SALT = "FB7qaCPsiX";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://secure.payu.in";
$surl = "https://payment.inctf.in/success.php";
$furl = "https://payment.inctf.in/failure.php";

$formError = 0;

$hash = '';

// Hash Sequence

$hashSequence = "program|firstname|email|address|phone|tickets|program|udf1";
if( empty($posted['firstname'])
	|| empty($posted['email'])
	|| empty($posted['address'])
	|| empty($posted['phone'])
	|| empty($posted['tickets'])
	|| empty($posted['program']) )
{
	echo "bad post";

} else {

	//$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
	$hash_string = '';
	$hash_string .= $MERCHANT_KEY . "|";
	$hash_string .= $txnid . "|";
	$hash_string .= $cost. "|";

	foreach($hashVarsSeq as $hash_var) {
		$hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
		$hash_string .= '|';
	}

	$hash_string .= $SALT;

	$hash = strtolower(hash('sha512', $hash_string));
	$action = $PAYU_BASE_URL . '/_payment';
}
echo "
<html>
<head>
<script src='js/jquery-1.12.4.min.js'> </script>
<script src='js/jquery.redirect.js'> </script>
	<script type='text/javascript'>
	$.redirect( 'https://secure.payu.in/_payment',
	{
		key: '"; echo $MERCHANT_KEY; echo "',
		txnid: '"; echo $txnid; echo "',
		amount: '"; echo $cost; echo "',
		productinfo : '"; echo $posted['program']; echo "',
		firstname : '"; echo $posted['firstname']; echo "',
		lastname : '"; echo $posted['lastname']; echo "',
		email : '"; echo $posted['email']; echo "',
		phone : '"; echo $posted['phone']; echo "',
		surl: '" ; echo $surl; echo "',
		furl: '"; echo $furl; echo "',
		hash: '"; echo $hash; echo "',
		service_provider :'payu_paisa',
	});
	</script>
</head>
</html>
"; ?>