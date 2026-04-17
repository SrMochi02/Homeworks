<?php

//prices of differents orders
const ORDERA1_RECHARGE = 0.20;
const ORDERA2_RECHARGE = 0.30;
const ORDERB1_DISCOUNT = 0.30;
const ORDERB2_DISCOUNT = 0.50;

//sizes validations of orders 
const SIZEA1_ORDER = 1;
const SIZEA2_ORDER = 2;
const SIZEB1_ORDER = 1;
const SIZEB2_ORDER = 2;


//discounts and recharge of subprice and final price of order
$price_orderA1 = 0;
$price_orderA2 = 0;
$price_orderB1 = 0;
$price_orderB2 = 0;
$sub_total_order = 0;
$total_final = 0;

if(isset($_POST["cmbType"])) {

	$type_jocote = $_POST["cmbType"];
	$size_jocote = $_POST["cmbSize"];
	$price_jocote = $_POST["price"];
	$kilos_order = $_POST["kilograms"];
}
else {
	die ("Error: failed load data");
}

if ($type_jocote == "A" && $size_jocote == SIZEA1_ORDER) {
	$price_orderA1 = $price_jocote + ORDERA1_RECHARGE;
	$sub_total_order = $price_orderA1 * $kilos_order;
} 
elseif ($type_jocote == "A" && $size_jocote == SIZEA2_ORDER) {
	$price_orderA2 = $price_jocote + ORDERA2_RECHARGE;
	$sub_total_order = $price_orderA2 * $kilos_order;
}

elseif ($type_jocote == "B" && $size_jocote == SIZEB1_ORDER) {
	$price_orderB1 = $price_jocote - ORDERB1_DISCOUNT;
	$sub_total_order = $price_orderB1 * $kilos_order;
} 
elseif ($type_jocote == "B" && $size_jocote == SIZEB2_ORDER) {
	$price_orderB2 = $price_jocote - ORDERB2_DISCOUNT;
	$sub_total_order = $price_orderB2 * $kilos_order;
}
else {
	die ("Erro: Nothing value agree ");
}

$total_final = $sub_total_order;
echo "El costo final es por kilogramo de jocote: $".number_format($total_final, 2);

?>
