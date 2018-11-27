<?php
include("header.php");
if(isset($_GET['postID'])){
    $postID=$_GET['postID'];
}
else{
    header("Location: home.php");
}
$sql="select * from post where postID=$postID";
$res=$conn->query($sql);
if($res->num_rows!=0){
    $row=$res->fetch_assoc();
    $creator=$row['creator'];
    $title=$row['title'];
    $body=$row['body'];
    $upvotes=$row['upvotes'];
    $downVotes=$row['downVotes'];
    $vote=$upvotes-$downVotes;
    $attachment=$row['attachment'];
    $originAt=$row['originAt'];
}
else{
    header("Location: home.php");
}
?>
<div class="containerPost">
    <div class="title-bar">
        <?php echo $title;?>
    </div>
    <div class="timestamp">
        Author&nbsp;:&nbsp;<?php echo $creator;?>
    </div><br>
    <div class="timestamp">
        created&nbsp;:&nbsp;<?php echo $originAt;?>
    </div>
    <p><?php echo $body;?></p>
    <img src="<?php echo $attachment;?>"> 
    <button id="csec" onclick="revealHideComments()">Comment Section</button>
    <form id="commentForm" action="<?php echo "post.php?postID=$postID";?>" method="post">
        <input type="text" name="comment" placeholder="comment">
        <button type="submit" name="submitComment" value="submitComment">Comment</button>
    </form>
    <?php
    $sql3="select * from comments where postID='$postID' order by originAt desc";
    $res3=$conn->query($sql3);
    for($i=0;$i<$res3->num_rows;$i++){
        $row3=$res3->fetch_assoc();
        $commentBy=$row3['commentBy'];
        $commentBody=$row3['body'];
        $commentOrigin=$row3['originAt'];
        $sql4="select * from profileData where username='$commentBy'";
        $res4=$conn->query($sql4);
        $row4=$res4->fetch_assoc();
        $profilePic=$row4['profilePic'];
    ?>
    <div id="toHide" name="toHide">
        <span id="authorArea">
            <img src="<?php echo $profilePic;?>">
            <a href="profile.php?username=<?php echo $commentBy;?>"><?php echo $commentBy;?></a>
        </span>
        <p id="commentBody">
            <?php echo $commentBody;?>
        </p>
        <p id="commentTimeStamp">
            <?php echo $commentOrigin;?>
        </p>
    </div> 
    <?php
    }
    ?>
</div>
<script src="postControl.js?ver=<?php echo rand(100,999);?>"></script>
<?php
include("footer.php");
?>
<?php
    if(isset($_POST['submitComment'])){
        $bodyC=$_POST['comment'];
        $sql1="insert into comments(commentBy,postID,body) values('$username','$postID','$bodyC')";
        if($conn->query($sql1)){
            header("Location: post.php?postID=$postID");
        }
    }
?>