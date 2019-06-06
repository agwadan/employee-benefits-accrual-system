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
<<<<<<< HEAD
	$diff = (($year_diff) * 12) + ($month2 - $month1);
	$frst_pts = $diff * $pts;
	
	if ($year_diff <= 2) {
		$ttl_pts = $frst_pts * 2.00;
	} 
	elseif ($year_diff <= 4) {
		$ttl_pts = $frst_pts * 2.25;
	}
	elseif ($year_diff > 4) {
		$ttl_pts = $frst_pts * 2.50;
	}
	
=======
	$diff = ($year_diff * 12) + ($month2 - $month1);
	
	$ttl_pts = $diff * $pts;
>>>>>>> 09f5affc492a748d2227fc5f6f21af258598df21

	return $ttl_pts;



<<<<<<< HEAD

=======
}

function addTenure($date1, $date2){
	$ts1 = strtotime($date1);
	$ts2 = strtotime($date2);

	$year1 = date('Y', $ts1);
	$year2 = date('Y', $ts2);

	$year_diff = $year2 - $year1;

	return $year_diff;
>>>>>>> 09f5affc492a748d2227fc5f6f21af258598df21

}
	
?>

