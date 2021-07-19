<?php
	include("../inc/header.php");
    include("departments.php");
	if($usertype != "Admin"){
        header("Location: ../dashboard");
    }

    if(isset($_GET['id'])){
    	$record_id = mysqli_real_escape_string($db_connect, $_GET['id']);

    	$getinfo = mysqli_query($db_connect, "SELECT * FROM sharp_emp WHERE id = '$record_id' ");
        $getinfocount = mysqli_num_rows($getinfo);

        if($getinfocount == 1){
            if($fetch = mysqli_fetch_assoc($getinfo)){
                $employee_id = $fetch['employee_id'];
                $firstname = $fetch['first_name'];
                $middlename = $fetch['middle_name'];
                $lastname = $fetch['last_name'];
                $phone = $fetch['phone'];
                $employee_image = $fetch['employee_image'];
                $residence_address = $fetch['residence_address'];
                $residence_location = $fetch['residence_location'];
                $residence_direction = $fetch['residence_direction'];
                $relationship = $fetch['relationship'];
                $date_employed = $fetch['date_employed'];
                $department_id = $fetch["department_id"];
                $department_name = array_values(array_filter($departments, function ($department) use ($department_id) {
                    return $department["id"] == $department_id ? $department : NULL;
                }))[0]["name"];
                $job_type = $fetch['job_type'];
                $status = $fetch['status'];
                $bir_number = $fetch["bir_number"];
                $nis_number = $fetch["nis_number"];
                $bank = $fetch["bank"];
                $bank_account_number = $fetch["bank_account_number"];
            }
        }
    } else {
    	echo "Invalid Approach";
    	exit();
    }

?>
	<section class="side-menu fixed left">
		<div class="top-sec">
			<div class="dash_logo">
			</div>			
			<p>Employee Record System</p>
			</div>
		<ul class="nav">
			<li class="nav-item"><a href="../dashboard"><span class="nav-icon"><i class="fa fa-users"></i></span>All Employees</a></li>
			<li class="nav-item"><a href="../dashboard/current_employees.php"><span class="nav-icon"><i class="fa fa-check"></i></span>Current Employees</a></li>
			<li class="nav-item"><a href="../dashboard/past_employees.php"><span class="nav-icon"><i class="fa fa-times"></i></span>Past Employees</a></li>
			<?php if($usertype == "Admin"){ ?>
				<li class="nav-item current"><a href="../dashboard/add_employee.php"><span class="nav-icon"><i class="fa fa-user-plus"></i></span>Add Employee</a></li>
				<li class="nav-item"><a href="../dashboard/add_user.php"><span class="nav-icon"><i class="fa fa-user"></i></span>Add User</a></li>
			<?php		} ?>
			<li class="nav-item"><a href="../dashboard/settings.php"><span class="nav-icon"><i class="fa fa-cog"></i></span>Settings</a></li>
			<li class="nav-item"><a href="../dashboard/logout.php"><span class="nav-icon"><i class="fa fa-sign-out"></i></span>Sign out</a></li>
		</ul>
	</section>
	<section class="contentSection right clearfix">
		<div class="displaySuccess"></div>
		<div class="container">
			<div class="wrapper add_employee clearfix">
				<div class="section_title">Update Employee Records</div>
				<form id="editemployee" class="clearfix" method="" action="">
					<div class="section_subtitle">Personal Data</div>
					<input type="hidden" name="record_id" value="<?php echo $record_id ?>">
					<div class="input-box input-small left">
						<label for="employee_id">Employee ID</label><br>
						<input type="text" class="inputField emp_id" placeholder="Optional" name="employee_id" value="<?php echo $employee_id ?>">
						<div class="error empiderror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="firstname">First Name</label><br>
						<input type="text" class="inputField firstname" name="firstname" value="<?php echo $firstname ?>">
						<div class="error firstnameerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="middlename">Middle Name</label><br>
						<input type="text" class="inputField middlename" placeholder="Optional" name="middlename" value="<?php echo $middlename ?>">
						<div class="error middlenameerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="lastname">Last Name</label><br>
						<input type="text" class="inputField lastname" name="lastname" value="<?php echo $lastname ?>">
						<div class="error lastnameerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="phone">Phone number</label><br>
						<input type="text" class="inputField phone" name="phone" value="<?php echo $phone ?>">
						<div class="error phoneerror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="jobtype">Job Type</label><br>
						<input type="text" class="inputField jobtype" name="jobtype" value="<?php echo $job_type ?>">
						<div class="error jobtypeerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="dateemployed">Date employed</label><br>
						<input type="text" id="datepicker" class="inputField dateemployed" name="dateemployed" value="<?php echo $date_employed ?>">
						<div class="error dateemployederror"></div>
					</div>
                    <div class="input-box input-small right">
                        <label for="department">Department</label><br>
                        <select class="inputField department" name="department">
                            <option value="<?php echo $department_id ?>"><?php echo $department_name ?></option>
                        <?php foreach ($departments as $department) { ?>
                            <option value="<?php echo $department["id"] ?>"><?php echo $department["name"];  ?></option>
                        <?php  } ?>
                        </select>
                    </div>
					<div class="input-box input-small left">
						<label for="empstatus">Employment status</label><br>
						<select class="inputField empstatus" name="empstatus">
							<option value="<?php echo $status ?>"><?php echo $status ?></option>
							<option value="former">Former employee</option>
							<option value="employee">Employee</option>
						</select>
						<div class="error empstatuserror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="resaddress">Residential Address</label><br>
						<input type="text" class="inputField resaddress" name="resaddress" value="<?php echo $residence_address?>">
						<div class="error resaddresserror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="reslocation">Location of Residence</label><br>
						<input type="text" class="inputField reslocation" name="reslocation" value="<?php echo $residence_location ?>">
						<div class="error reslocationerror"></div>
					</div>
					<div class="input-box input-textarea left clearfix">
						<label for="resdirection">Notes</label><br>
						<textarea class="inputField resdirection" name="resdirection"><?php echo $residence_direction ?></textarea>
						<div class="error resdirectionerror"></div>
					</div>
					<div class="section_subtitle right">Upload Employee Photo</div>
					<div class="input-box input-upload-box left">
						<div class="upload-wrapper">
							<div class="upload-box">
								<input type="file" name="passport_photo" class="uploadField passport_photo">
								<div class="uploadfile passportPhoto_file">Upload Employee Photo</div>
								<div class="filebtn passport-btn">Upload</div>
								<div class="filebtn passport-disbtn">Upload</div>
							</div>
						</div>
						<div class="error photoerror"></div>
						<div class="passport_file"></div>
					</div>
                    <div class="section_subtitle left">Financial Details</div>
                    <div class="input-box input-small left">
                        <label for="bir_number">B.I.R Number</label><br>
                        <input type="text" class="inputField bir_number" name="bir_number" value="<?php echo $bir_number; ?>">
                    </div>
                    <div class="input-box input-small right">
                        <label for="nis_number">N.I.S Number</label><br>
                        <input type="text" class="inputField nis_number" name="nis_number" value="<?php echo $nis_number; ?>">
                    </div>
                    <div class="input-box input-small left">
                        <label for="bank">Bank</label><br>
                        <select class="inputField bank" name="bank">
                            <option value="<?php echo $bank; ?>"> <?php echo $bank; ?></option>
                            <option value="First Citizens of Bank">First Citizens of Bank</option>
                            <option value="Republic Bank">Republic Bank</option>
                            <option value="RBC Loyal Bank">RBC Loyal Bank</option>
                            <option value="Scotiabank">Scotiabank</option>
                        </select>
                    </div>
                    <div class="input-box input-small right">
                        <label for="bank_account_number">Bank Account Number</label><br>
                        <input type="text" class="inputField bank_account_number" name="bank_account_number" value="<?php echo $bank_account_number; ?>">
                    </div>
					<div class="input-box">
						<button type="submit" class="submitField">Update record</button>
					</div>
				</form>
			</div>
		</div>
	</section>
<script type="text/javascript" src="../js/global.js"></script>
</body>
</html>