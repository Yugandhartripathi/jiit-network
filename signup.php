<?php 
require('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<title>SignUp</title>
		<link rel="stylesheet" href="signupp.css">
</head>
<body>
		<h1 id="title">Sign Up</h1>
		<div id="form-outer">
				<p id="description">
						Enter the relevant details below : 
				</p>
				<form id="signup-form" method="POST" action="signup.php">
						<div class="rowTab">
								<div class="labels">
										<label id="name-label" for="name">User Name:<span id="required">*</span></label>
								</div>
								<div class="rightTab">
										<input autofocus type="text" name="name" id="name" class="input-field" placeholder="Enter username" required>
								</div>
						</div>
						<div class="rowTab">
								<div class="labels">
										<label id="email-label" for="email">Email:<span id="required">*</span></label>
								</div>
								<div class="rightTab">
										<input type="email" name="email" id="email" class="input-field" required placeholder="Enter your Email">
								</div>
						</div>
						<div class="rowTab">
								<div class="labels">
										<label id="password-label" for="password">Password:<span id="required">*</span></label>
								</div>
								<div class="rightTab">
										<input type="password" name="password" id="password" class="input-field" placeholder="Enter Password">
								</div>
						</div>
                        <div class="rowTab">
								<div class="labels">
										<label id="cpassword-label" for="cpassword">Confirm Password:<span id="required">*</span></label>
								</div>
								<div class="rightTab">
										<input type="password" name="cpassword" id="cpassword" class="input-field" placeholder="Enter Password Again">
								</div>
						</div>
						<div class="rowTab">
								<div class="labels">
										<label for="currentPos">Which option best describes your current role?<span id="required">*</span></label>
								</div>
								<div class="rightTab">
										<select id="dropdownForm" name="currentPos" class="dropdown" onChange="formType()">
                                        <option disabled value>Select an option</option>
                                        <option   value="studentFields">Student</option>
                                        <option  value="teacherFields">Teacher</option>
                                        <option  value="hubFields">Hub</option>
                                        </select>
								</div>
						</div>
						<div class="rowTab studentFields">
								<div class="labels">
										<label id="enrol-label" for="enrol">Enrolment Number:<span id="required">*</span></label>
								</div>
								<div class="rightTab">
										<input autofocus type="text" name="enrol" id="enrol" class="input-field" placeholder="Enter enrolment number" required>
								</div>
						</div>
						<div class="rowTab studentFields">
								<div class="labels">
										<label id="fname-label" for="fname">First Name:<span id="required">*</span></label>
								</div>
								<div class="rightTab">
										<input autofocus type="text" name="fname" id="fname" class="input-field" placeholder="Enter First Name" required>
								</div>
						</div>
						<div class="rowTab studentFields">
								<div class="labels">
										<label id="lname-label" for="lname">Last Name:<span id="required">*</span></label>
								</div>
								<div class="rightTab">
										<input autofocus type="text" name="lname" id="lname" class="input-field" placeholder="Enter Last Name" required>
								</div>
						</div>
						<div class="rowTab studentFields">
								<div class="labels">
										<label for="gender">Gender:</label>
								</div>
								<div class="rightTab">
										<ul style="list-style: none;">
												<li class="radio"><label><input name="gender-buttons" value="Male"  type="radio" class="genRadio" > Male</label></li>
												<li class="radio"><label><input name="gender-buttons" value="Female"  type="radio" class="genRadio" > Female</label></li>
												<li class="radio"><label><input name="gender-buttons" value="Other"  type="radio" class="genRadio" > Other</label></li>
										</ul>
								</div>
						</div>
						<div class="rowTab studentFields">
								<div class="labels">
										<label id="batch-label" for="batch">Batch :</label>
								</div>
								<div class="rightTab">
										<input autofocus type="text" name="batch" id="batch" class="input-field" placeholder="Enter Batch " required>
								</div>
						</div>
						<div class="rowTab teacherFields">
								<div class="labels">
										<label id="fname-label" for="fname">First Name:<span id="required">*</span></label>
								</div>
								<div class="rightTab">
										<input autofocus type="text" name="fname" id="tfname" class="input-field" placeholder="Enter First Name" required>
								</div>
						</div>
						<div class="rowTab teacherFields">
								<div class="labels">
										<label id="lname-label" for="lname">Last Name:<span id="required">*</span></label>
								</div>
								<div class="rightTab">
										<input autofocus type="text" name="lname" id="tlname" class="input-field" placeholder="Enter Last Name" required>
								</div>
						</div>
						<div class="rowTab teacherFields">
								<div class="labels">
										<label for="gender">Gender:</label>
								</div>
								<div class="rightTab">
										<ul style="list-style: none;">
												<li class="radio"><label><input name="gender-buttons" value="Male"  type="radio" class="genRadio" > Male</label></li>
												<li class="radio"><label><input name="gender-buttons" value="Female"  type="radio" class="genRadio" > Female</label></li>
												<li class="radio"><label><input name="gender-buttons" value="Other"  type="radio" class="genRadio" > Other</label></li>
										</ul>
								</div>
						</div>
						<div class="rowTab teacherFields">
								<div class="labels">
										<label for="currentPos">Select Department:<span id="required">*</span></label>
								</div>
								<div class="rightTab">
										<select id="deptdownForm" name="currentPos" class="dropdown">
                                        <option disabled value>Select an option</option>
                                        <option  value="CSE">Computer Science</option>
                                        <option value="ECE">Electronics and Communications</option>
										<option value="MAT">Mathematics</option>
										<option value="PHY">Physics</option>
										<option value="HSS">Humanities and Social Science</option>
                                        </select>
								</div>
						</div>
						<div class="rowTab hubFields">
								<div class="labels">
										<label id="hubName-label" for="hubName">Hub Name:<span id="required">*</span></label>
								</div>
								<div class="rightTab">
										<input autofocus type="text" name="hubName" id="hubName" class="input-field" placeholder="Enter Hub Name" required>
								</div>
						</div>
						<div class="rowTab hubFields">
								<div class="labels">
										<label id="yearEst-label" for="yearEst">Founded in Year:<span id="required">*</span></label>
								</div>
								<div class="rightTab">
										<input type="number" name="yearEst" id="yearEst" min="2001" max="2018" step="1" class="input-field" placeholder="Year" style="height: 20px">
								</div>
						</div>
						<div class="rowTab">
								<div class="labels">
										<label id="pin-label" for="pin">Alternate PIN:<span id="required">*</span></label>
								</div>
								<div class="rightTab">
										<input type="password" name="pin" id="pin" class="input-field" placeholder="Enter 6 digit PIN">
								</div>
						</div>
						<button id="submit" type="submit">Submit</button>
				</form>
		</div>
		<script src="signupForm.js"></script>
</body>

</html>
<!-- id,username,password,confirmpass,email,alterPIN,fname,lname,gender|||student-intro,batch,course/teacher-dept/hub-originYear,desc -->