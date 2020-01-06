<?php // require_once('../Portfolio/admin/include/db.php');?>
<?php
	require('userip.php');
	$ip = userip::get_ip();
	$os = userip::get_os();
	$browser = userip::get_browser();
	$device = userip::get_device();
	$first_v = date("Y-m-d");
	$last_v = date("Y-m-d");

// Check for empty fields
	$visitor_query = mysqli_query($db,"SELECT * FROM visitors WHERE v_ip='$ip'");
	foreach($visitor_query as $visitor){
		if($visitor['v_ip'] != $ip){
			$data='';
		}
		else{
			$data='1';
			$s_last_v = $visitor['last_v'];
			$s_device = $visitor['device'];
		}
	} //end of foreach

	if (empty($data)) {
		$insert_query = "INSERT INTO visitors(v_ip,os,browser,device,first_v,last_v,color)VALUES('$ip','$os','$browser','$device','$first_v','$last_v','#18ba60')";	
		mysqli_query($db,$insert_query);
	}
	else{
		if($s_last_v != date("Y-m-d")){
			$s_last_v = date("Y-m-d");

			if ($device != $s_device) {
				// if (mac!=mac) {
				// 	INSERT
				// }
				// else{
				// 	UPDATE
				// }
				$insert_query = "INSERT INTO visitors(v_ip,os,browser,device,first_v,last_v,color)VALUES('$ip','$os','$browser','$device','$first_v','$last_v','#18ba60')";	
				mysqli_query($db,$insert_query);
			}
			else{
				$update_query = "UPDATE visitors SET last_v='$s_last_v' WHERE v_ip='$ip' AND device='$device'";
				mysqli_query($db,$update_query);
			}
		}
		else{
			$update_query = "UPDATE visitors SET last_v='$s_last_v' WHERE v_ip='$ip'";
			mysqli_query($db,$update_query);
		}
	}

?>



