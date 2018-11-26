<?php
    include("header.php");
    if(isset($_GET['username'])){
        $user=$_GET['username'];
        $sql="SELECT * from userData where username='$user'";
        $result=$conn->query($sql);
        if($result->num_rows==0){
            header('Location: notFound.php');
        }
        else{
            $row=$result->fetch_assoc();
            $category=$row['category'];
            if($user==$username){
                $guest=0;
            }
            else{
                $guest=1;
            }
        }
        $sql99="select * from profileData where username='$user'";
        $result99=$conn->query($sql99);
        $row99=$result->fetch_assoc();
        $profilePic=$row99['profilePic'];
        $numPosts=$row99['numPosts'];
        $numFollower=$row99['numFollower'];
        $numFollowing=$row99['numFollowing'];
        $bio=$row99['bio'];
        if($category=="studentFields"){
            $sql1="SELECT * from signupStudent where username='$user'";
            $res=$conn->query($sql1);
            $row=$res->fetch_assoc();
            $enrol=$row['enrol'];
            $fname=$row['fname'];
            $lname=$row['lname'];
            $batch=$row['batch'];
            $course=$row['course'];
            $gender=$row['gender'];
        }
        else if($category="teacherFields"){
            $sql1="SELECT * from signupTeacher where username='$user'";
            $res=$conn->query($sql1);
            $row=$res->fetch_assoc();
            $fname=$row['fname'];
            $lname=$row['lname'];
            $gender=$row['gender'];
            $department=$row['department'];
        }
        else{
            $sql1="SELECT * from signupHub where username='$user'";
            $res=$conn->query($sql1);
            $row=$res->fetch_assoc();
            $hubName=$row['hubName'];
            $yearEst=$row['yearEst'];
        }
    }
?>
<div class="containerProfile">
    
</div>
<?php
    include("footer.php");
?>