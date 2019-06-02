<?php

function calcDate($date1, $date2, $pts){

	
	//$endDate = $row3['emp_startDate'];

	$ts1 = strtotime($date1);
	$ts2 = strtotime($date2);

	$year1 = date('Y', $ts1);
	$year2 = date('Y', $ts2);

	$month1 = date('m', $ts1);
	$month2 = date('m', $ts2);

	$year_diff = $year2 - $year1;
	$diff = ($year_diff * 12) + ($month2 - $month1);
	
	$ttl_pts = $diff * $pts;

	return $ttl_pts;



}

function addTenure($date1, $date2){
	$ts1 = strtotime($date1);
	$ts2 = strtotime($date2);

	$year1 = date('Y', $ts1);
	$year2 = date('Y', $ts2);

	$year_diff = $year2 - $year1;

	return $year_diff;

}
	
?>

