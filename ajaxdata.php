<?php 
include_once 'config.php';

if (isset($_POST['country_id'])) {
	$query = "SELECT * FROM state where c_id=".$_POST['country_id'];
	$result = $db->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Select State</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['id'].'>'.$row['state_name'].'</option>';
		 }
	}else{

		echo '<option>No State Found!</option>';
	}

}elseif (isset($_POST['state_id'])) {
	 

	$query = "SELECT * FROM city where s_id=".$_POST['state_id'];
	$result = $db->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Select City</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['id'].'>'.$row['city_name'].'</option>';
		 }
	}else{

		echo '<option>No City Found!</option>';
	}

}


?>