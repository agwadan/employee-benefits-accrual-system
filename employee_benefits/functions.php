<?php

function calcDate($date1, $date2, $pts, $mul){


	$ts1 = strtotime($date1);
	$ts2 = strtotime($date2);

	$year1 = date('Y', $ts1);
	$year2 = date('Y', $ts2);

	$month1 = date('m', $ts1);
	$month2 = date('m', $ts2);

	$year_diff = $year2 - $year1;

	$diff = (($year_diff) * 12) + ($month2 - $month1);
	$frst_pts = $diff * $pts;
	$ttl_pts = $frst_pts *$mul;
	return $ttl_pts;

}

function calcMultiplier($date1, $date2)
{
	$ts1 = strtotime($date1);
	$ts2 = strtotime($date2);

	$year1 = date('Y', $ts1);
	$year2 = date('Y', $ts2);

	$year_diff = $year2 - $year1;

	if ($year_diff <= 2) {
		$mult = 2.00;
	} 
	elseif ($year_diff <= 4) {
		$mult = 2.25;
	}
	elseif ($year_diff > 4) {
		$mult = 2.50;
	}

	return $mult;

}

	
?>

