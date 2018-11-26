<?php
    include("header.php");
    if(isset($_GET['username'])){
        $alreadyFollow=0;
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
                $sql10="select * from follow where follower='$username' and following='$user'";
                $res=$conn->query($sql10);
                if($res->num_rows!=0){
                    $alreadyFollow=1;
                }
            }
        }
        $sql99="select * from profileData where username='$user'";
        $result99=$conn->query($sql99);
        $row99=$result99->fetch_assoc();
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
        else if($category=="teacherFields"){
            $sql1="SELECT * from signupTeacher where username='$user'";
            $res=$conn->query($sql1);
            $row=$res->fetch_assoc();
            $tfname=$row['fname'];
            $tlname=$row['lname'];
            $tgender=$row['gender'];
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
    <div class="profilePicPart">
        <img src="<?php echo $profilePic;?>">
        <?php
        if($guest==0){
        ?>
        <form action=<?php echo "profile.php?username=$username";?> method="post" id="profilePicLinkForm">
            <button type="button" id='changePicTrigger' onclick="imgUpdateReveal()">change profile pic</button>
            <input type="text" name="profilePicLink" id="profilePicLink" placeholder="paste link for new pic here">
            <button type="submit" name="submitPic" value="UpdatePic" id="submitPic">Update Pic</button>
        </form>
        <?php
        }else if($alreadyFollow==0){
        ?>
        <form action=<?php echo "profile.php?username=$user";?> method="post" id="followForm">
            <button type="submit" name="submitFollow" value="follow" id="submit">Follow</button>
        </form>
        <?php
        }else if($alreadyFollow==1){
        ?>
        <form action=<?php echo "profile.php?username=$user";?> method="post" id="followForm">
            <button type="submit" name="submitUnFollow" value="follow" id="submit">UnFollow</button>
        </form>
        <?php
        }
        ?>
        <div class="categoryText">
        <?php
        if($category=="studentFields"){
            echo "Student";
            $namae=$fname.' '.$lname;
        }
        else if($category=="teacherFields"){
            echo "Teacher";
            $namae=$tfname.' '.$tlname;
        }
        else{
            echo "HUB";
            $namae=$hubName;
        }
        ?>
        </div>
        <div class="fullName">
            <?php
                echo $namae;
            ?>
        </div>
        <div class="follow-ing">
            <span id="follower">Followers:<span id="followerCount"><?php echo $numFollower;?></span></span>
            <span id="following">Following:<span id="followingCount"><?php echo $numFollowing;?></span></span>
        </div>
        <div class="numberPosts">
            <span id="numPostText">No. of Posts:<span id="postCount"><?php echo $numPosts;?></span></span>
        </div>
    </div>
    <div class="rightSideArea">
        <?php
        if($bio){
        echo "<p id='bioFilled'>''$bio''</p>";
        if($guest==0){
        ?>
        <form action=<?php echo "profile.php?username=$username";?> method='post' id='bioForm'>
            <button type='button' id='changePicTrigger' onclick='bioUpdateReveal()'>Edit Bio</button>
            <textarea name='bioContent' id='bioContHide' placeholder='Add a short bio to tell people more about yourself.'></textarea>
            <button type='submit' name='submitBio' value='UpdateBio' id='submitBioHide'>Update Bio</button>
        </form>
        <?php
        }
        }
        else if($guest==0){
        ?>
        <form action=<?php echo "profile.php?username=$username";?> method="post" id="bioForm">
            <textarea name="bioContent" id="bioCont" placeholder="Add a short bio to tell people more about yourself." autofocus></textarea>
            <button type="submit" name="submitBio" value="UpdateBio" id="submitBio">Update Bio</button>
        </form>
        <?php  
        }
        ?>
    </div>
</div>
<script src="profileChangedp.js"></script>
<?php
    include("footer.php");
?>
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['submitPic'])){
            $imgURL=$_POST['profilePicLink'];
            $sql3="update profileData set profilePic='$imgURL' where username='$username'";
            if($conn->query($sql3)){
                header("Location: profile.php?username=$username");
            }
        }
        if(isset($_POST['submitFollow'])){
            $newFollowing=$numFollowing+1;
            $newFollower=$numFollower+1;
            $sql6="insert into follow(follower,following) values('$username','$user')";
            if($conn->query($sql6)){
                $sql4="update profileData set numFollower='$newFollower' where username='$user'";
                $conn->query($sql4);
                $sql5="update profileData set numFollowing='$newFollowing' where username='$username'";
                $conn->query($sql5);
                header("Location: profile.php?username=$user");
            }
        }
        if(isset($_POST['submitUnFollow'])){
            $newFollowing=$numFollowing-1;
            $newFollower=$numFollower-1;
            $sql6="delete from follow where follower='$username' and following='$user'";
            if($conn->query($sql6)){
                $sql4="update profileData set numFollower='$newFollower' where username='$user'";
                $conn->query($sql4);
                $sql5="update profileData set numFollowing='$newFollowing' where username='$username'";
                $conn->query($sql5);
                header("Location: profile.php?username=$user");
            }
        }
        if(isset($_POST['submitBio'])){
            $newBio=$_POST['bioContent'];
            $sql7="update profileData set bio='$newBio' where username='$username'";
            if($conn->query($sql7)){
                header("Location: profile.php?username=$username");
            }
        }
    }
?>