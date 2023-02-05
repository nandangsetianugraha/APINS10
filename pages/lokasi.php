<?php 
function distance($lat1, $lon1, $lat2, $lon2, $unit) {
 
  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);
 
  if ($unit == "K") {
      return ($miles * 1.609344*1000);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
  } else {
      return $miles;
  }
}
	$latitude 	= $_POST['latitude'];
	$longitude	= $_POST['longitude'];

	if (!empty($latitude) && !empty($longitude)) {

		echo distance($latitude, $longitude,-6.416582810496453, 108.08050120919054, "K");
	}
 ?>