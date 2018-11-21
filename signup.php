<?php
ob_start();
require('connect.php');
$username='';
$email='';
$password='';
$cpassword='';
$category='';
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
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
										<label id="username-label" for="username">User Name:<span id="required">*</span></label>
								</div>
								<div class="rightTab">
										<input autofocus type="text" name="username" id="name" class="input-field" placeholder="Enter username" required>
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
										<select id="dropdownForm" name="category" class="dropdown" onChange="formType()">
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
										<input autofocus type="text" name="enrol" id="enrol" class="input-field" placeholder="Enter enrolment number">
								</div>
						</div>
						<div class="rowTab studentFields">
								<div class="labels">
										<label id="fname-label" for="fname">First Name:<span id="required">*</span></label>
								</div>
								<div class="rightTab">
										<input autofocus type="text" name="fname" id="fname" class="input-field" placeholder="Enter First Name">
								</div>
						</div>
						<div class="rowTab studentFields">
								<div class="labels">
										<label id="lname-label" for="lname">Last Name:<span id="required">*</span></label>
								</div>
								<div class="rightTab">
										<input autofocus type="text" name="lname" id="lname" class="input-field" placeholder="Enter Last Name">
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
										<input autofocus type="text" name="batch" id="batch" class="input-field" placeholder="Enter Batch ">
								</div>
						</div>
						<div class="rowTab teacherFields">
								<div class="labels">
										<label id="tfname-label" for="tfname">First Name:<span id="required">*</span></label>
								</div>
								<div class="rightTab">
										<input autofocus type="text" name="tfname" id="tfname" class="input-field" placeholder="Enter First Name">
								</div>
						</div>
						<div class="rowTab teacherFields">
								<div class="labels">
										<label id="tlname-label" for="tlname">Last Name:<span id="required">*</span></label>
								</div>
								<div class="rightTab">
										<input autofocus type="text" name="tlname" id="tlname" class="input-field" placeholder="Enter Last Name">
								</div>
						</div>
						<div class="rowTab teacherFields">
								<div class="labels">
										<label for="tgender">Gender:</label>
								</div>
								<div class="rightTab">
										<ul style="list-style: none;">
												<li class="radio"><label><input name="tgender" value="Male"  type="radio" class="genRadio" > Male</label></li>
												<li class="radio"><label><input name="tgender" value="Female"  type="radio" class="genRadio" > Female</label></li>
												<li class="radio"><label><input name="tgender" value="Other"  type="radio" class="genRadio" > Other</label></li>
										</ul>
								</div>
						</div>
						<div class="rowTab teacherFields">
								<div class="labels">
										<label for="dept">Select Department:<span id="required">*</span></label>
								</div>
								<div class="rightTab">
										<select id="deptdownForm" name="dept" class="dropdown">
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
										<input autofocus type="text" name="hubName" id="hubName" class="input-field" placeholder="Enter Hub Name">
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
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$category=$_POST['category'];
	$alterPin=$_POST['pin'];
	if($username && $email && $password && $cpassword && $category && $alterPin){
		if($password==$cpassword){
			$pass_md5=md5($password);
			if($category=="studentFields"){
				$fname=$_POST['fname'];
				$lname=$_POST['lname'];
				$enrol=$_POST['enrol'];
				$gender=$_POST['gender-buttons'];
				$batch=$_POST['batch'];
				if($batch[0]=='A'){
					$course="ECE";
				}
				else if($batch[0]=='B'){
					$course="CSE";
				}
				else{
					$course="IT";
				}
				if($fname && $lname && $enrol){
					$sql="insert into userData(username,password,email,category,alterPIN) values('$username','$pass_md5','$email','$category','$alterPin')";
					if($conn->query($sql)){
						$sql1="insert into signupStudent(username,enrol,fname,lname,batch,course,gender) values('$username','$enrol','$fname','$lname','$batch','$course','$gender')";
						$conn->query($sql1);
						header('Location: index.php');
					}
				}
			}
			else if($category=="teacherFields"){
				$tfname=$_POST['tfname'];
				$tlname=$_POST['tlname'];
				$tgender=$_POST['tgender'];
				$dept=$_POST['dept'];
				if($tfname && $tlname && $tgender && $dept){
					$sql="insert into userData(username,password,email,category,alterPIN) values('$username','$pass_md5','$email','$category','$alterPin')";
					if($conn->query($sql)){
						$sql1="insert into signupTeacher(username,fname,lname,gender,department) values('$username','$tfname','$tlname','$tgender','$dept')";
						$conn->query($sql1);
						header('Location: index.php');
					}
				}
			}
			else{
				$hubName=$_POST['hubName'];
				$yearEST=$_POST['yearEst'];
				if($hubName && $yearEST){
					$sql="insert into userData(username,password,email,category,alterPIN) values('$username','$pass_md5','$email','$category','$alterPin')";
					if($conn->query($sql)){
						$sql1="insert into signupHub(username,hubName,memberCount,yearEst,description,numPost) values('$username','$hubName',0,'$yearEST',NULL,0)";
						$conn->query($sql1);
						header('Location: index.php');
					}
				}
			}
		}
		else{
			echo"passwords don't match";
		}
	}
	else{
			echo"please fill in all required fields";
	}
}
ob_end_flush();
?>