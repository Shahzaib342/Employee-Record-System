<?php 
	ob_start();
	include("../inc/db_connect.php");

	
		$record_id = mysqli_real_escape_string($db_connect, $_POST['record_id']);
		$employee_id = mysqli_real_escape_string($db_connect, $_POST['employee_id']);
		$firstname = mysqli_real_escape_string($db_connect, $_POST['firstname']);
		$middlename = mysqli_real_escape_string($db_connect, $_POST['middlename']);
		$lastname = mysqli_real_escape_string($db_connect, $_POST['lastname']);
		$phone = mysqli_real_escape_string($db_connect, $_POST['phone']);
		$jobtype = mysqli_real_escape_string($db_connect, $_POST['jobtype']);
		$dateemployed = mysqli_real_escape_string($db_connect, $_POST['dateemployed']);
        $department_id = mysqli_real_escape_string($db_connect, $_POST['department']);
		$resaddress = mysqli_real_escape_string($db_connect, $_POST['resaddress']);
		$reslocation = mysqli_real_escape_string($db_connect, $_POST['reslocation']);
		$resdirection = mysqli_real_escape_string($db_connect, $_POST['resdirection']);
		$passport_photo_name = mysqli_real_escape_string($db_connect, $_POST['passport_photo_name']);
		$fullname = mysqli_real_escape_string($db_connect, $_POST['fullname']);
		$empstatus = mysqli_real_escape_string($db_connect, $_POST['empstatus']);
        $bir_number = mysqli_real_escape_string($db_connect, $_POST['bir_number']);
        $nis_number = mysqli_real_escape_string($db_connect, $_POST['nis_number']);
        $bank = mysqli_real_escape_string($db_connect, $_POST['bank']);
        $bank_account_number = mysqli_real_escape_string($db_connect, $_POST['bank_account_number']);
	

		if($passport_photo_name != ""){
			$query = "UPDATE sharp_emp SET employee_image = '$passport_photo_name' WHERE id = '$record_id' ; ";
		}

		$query .= "UPDATE sharp_emp SET employee_id = '$employee_id', first_name = '$firstname', middle_name = '$middlename', last_name = '$lastname', phone = '$phone', residence_address = '$resaddress', residence_location = '$reslocation', residence_direction = '$resdirection', date_employed = '$dateemployed', department_id = '$department_id', job_type = '$jobtype', status = '$empstatus', bir_number = '$bir_number', nis_number = '$nis_number', bank = '$bank', bank_account_number = '$bank_account_number' WHERE id = '$record_id' ; ";

		ob_end_clean();			
		if(mysqli_multi_query($db_connect, $query)){

			echo json_encode(array("status" => "Success"));
			exit();			
		} else {
			echo json_encode(array("status" => "failed"));
			exit();
		}

?>