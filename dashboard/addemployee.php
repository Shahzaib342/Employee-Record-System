<?php 
	ob_start();
	include("../inc/db_connect.php");

		$employee_id = mysqli_real_escape_string($db_connect, $_POST['employee_id']);
		$firstname = mysqli_real_escape_string($db_connect, $_POST['firstname']);
		$middlename = mysqli_real_escape_string($db_connect, $_POST['middlename']);
		$lastname = mysqli_real_escape_string($db_connect, $_POST['lastname']);
        $phone = $_POST["phone"]  == "" ? 0 : mysqli_real_escape_string($db_connect, $_POST["phone"]);
		$jobtype = mysqli_real_escape_string($db_connect, $_POST['jobtype']);
		$dateemployed = mysqli_real_escape_string($db_connect, $_POST['dateemployed']);
        $department_id = mysqli_real_escape_string($db_connect, $_POST['department']);
		$resaddress = mysqli_real_escape_string($db_connect, $_POST['resaddress']);
		$reslocation = mysqli_real_escape_string($db_connect, $_POST['reslocation']);
		$resdirection = mysqli_real_escape_string($db_connect, $_POST['resdirection']);
		$passport_photo_name = mysqli_real_escape_string($db_connect, isset($_POST['passport_photo_name']) ? $_POST['passport_photo_name'] : NULL);
		$empstatus = mysqli_real_escape_string($db_connect, $_POST['empstatus']);
        $bir_number = mysqli_real_escape_string($db_connect, $_POST['bir_number']);
        $nis_number = mysqli_real_escape_string($db_connect, $_POST['nis_number']);
        $bank = mysqli_real_escape_string($db_connect, $_POST['bank']);
        $bank_account_number = mysqli_real_escape_string($db_connect, $_POST['bank_account_number']);
	
//							var_dump($phone); die();
		//Check if user already exists
		$id_check =  mysqli_query($db_connect, "SELECT employee_id FROM sharp_emp WHERE employee_id = '$employee_id' ");
								
		//Count the amount of rows where username = $username
		$check_id = mysqli_num_rows($id_check);
		ob_end_clean();	
		if ($check_id == 0) {

			$query = mysqli_query($db_connect, "INSERT INTO `sharp_emp` (`id`, `employee_id`, `first_name`, `middle_name`, `last_name`, `phone`, `employee_image`, `residence_address`, `residence_location`, `residence_direction`, `date_employed`, `department_id`, `job_type`, `status`, `bir_number`, `nis_number`, `bank`, `bank_account_number`) VALUES (NULL, '$employee_id', '$firstname', '$middlename', '$lastname', '$phone', '$passport_photo_name', '$resaddress', '$reslocation', '$resdirection', '$dateemployed', '$department_id', '$jobtype', '$empstatus', '$bir_number', '$nis_number', '$bank', '$bank_account_number')");
			$querycount = mysqli_num_rows($query);

			ob_end_clean();			
			if($query){

				echo json_encode(array("status" => "Success"));
				exit();			
			} else {
			    var_dump(mysqli_error($db_connect));
				echo json_encode(array("status" => "failed"));
				exit();
			}

		} else {
			echo json_encode(array("status" => "exists"));
			exit();
		}
?>