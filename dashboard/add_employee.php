<?php
	include("../inc/header.php");
    include("departments.php");

    if($usertype != "Admin"){
        header("Location: ../dashboard");
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
				<div class="section_title">Add Employee</div>
				<form id="addemployee" class="clearfix" method="" action="">
					<div class="section_subtitle">Personal Data</div>
					<div class="input-box input-small left">
						<label for="employee_id">Employee ID</label><br>
						<input type="text" class="inputField emp_id" name="employee_id">
						<div class="error empiderror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="firstname">First Name</label><br>
						<input type="text" class="inputField firstname" name="firstname">
						<div class="error firstnameerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="middlename">Middle Name</label><br>
						<input type="text" class="inputField middlename" placeholder="Optional" name="middlename">
					</div>
					<div class="input-box input-small right">
						<label for="lastname">Last Name</label><br>
						<input type="text" class="inputField lastname" name="lastname">
						<div class="error lastnameerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="phone">Phone number</label><br>
						<input type="text" class="inputField phone" name="phone">
					</div>
					<div class="input-box input-small right">
						<label for="jobtype">Job Type</label><br>
						<input type="text" class="inputField jobtype" name="jobtype">
					</div>
                    <div class="input-box input-small left">
                        <label for="dateemployed">Date employed</label><br>
                        <input type="text" id="datepicker" class="inputField dateemployed" name="dateemployed">
                        <div class="error dateemployederror"></div>
                    </div>
					<div class="input-box input-small right">
						<label for="dateemployed">Department</label><br>
                        <select class="inputField department" name="department">
                            <option value="">-- Select Department --</option>
                            <?php foreach ($departments as $department) { ?>
                            <option value="<?php echo $department["id"] ?>"><?php echo $department["name"];  ?></option>
                            <?php  } ?>
                        </select>
					</div>
					<div class="input-box input-small left">
						<label for="empstatus">Employment status</label><br>
						<select class="inputField empstatus" name="empstatus">
							<option value="">-- Select status --</option>
							<option value="former">Former employee</option>
							<option value="employee">Employee</option>
						</select>
						<div class="error empstatuserror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="resaddress">Residential Address</label><br>
						<input type="text" class="inputField resaddress" name="resaddress">
					</div>
					<div class="input-box input-small left">
						<label for="reslocation">Location of Residence</label><br>
						<input type="text" class="inputField reslocation" name="reslocation">
					</div>
					<div class="input-box input-textarea left clearfix">
						<label for="resdirection">Notes</label><br>
						<textarea class="inputField resdirection" name="resdirection"></textarea>
					</div>
					<div class="section_subtitle right">Upload Employee Photo</div>
					<div class="input-box input-upload-box right">
						<div class="upload-wrapper">
							<div class="upload-box">
								<input type="file" name="passport_photo" class="uploadField passport_photo">
								<div class="uploadfile passportPhoto_file">Upload Employee Photo</div>
								<div class="filebtn passport-btn">Upload</div>
								<div class="filebtn passport-disbtn">Upload</div>
							</div>
						</div>
						<div class="passport_file"></div>
					</div>
                    <div class="section_subtitle left">Financial Details</div>
                    <div class="input-box input-small left">
                        <label for="bir_number">B.I.R Number</label><br>
                        <input type="text" class="inputField bir_number" name="bir_number">
                    </div>
                    <div class="input-box input-small right">
                        <label for="nis_number">N.I.S Number</label><br>
                        <input type="text" class="inputField nis_number" name="nis_number">
                    </div>
                    <div class="input-box input-small left">
                        <label for="bank">Bank</label><br>
                        <select class="inputField bank" name="bank">
                            <option value="">-- Select Bank --</option>
                            <option value="First Citizens of Bank">First Citizens of Bank</option>
                            <option value="Republic Bank">Republic Bank</option>
                            <option value="RBC Loyal Bank">RBC Loyal Bank</option>
                            <option value="Scotiabank">Scotiabank</option>
                        </select>
                    </div>
                    <div class="input-box input-small right">
                        <label for="bank_account_number">Bank Account Number</label><br>
                        <input type="text" class="inputField bank_account_number" name="bank_account_number">
                    </div>
					<div class="input-box">
						<button type="submit" class="submitField">Add record</button>
					</div>
				</form>
			</div>
		</div>
	</section>
<script type="text/javascript" src="../js/global.js"></script>
</body>
</html>