<?php
    include("header.php");
    if(isset($_GET['postVotedOn'])){
        $postVotedOn=$_GET['postVotedOn'];
    }
    $canBeDone=0;
?>
<div class="container">
    <div class="newPost">
        <form id="postForm" method="post" action="home.php">
            <input type="text" name="title" id="title" placeholder="Post Title" autofocus required><br>
            <textarea name="postBody" rows="5" form="postForm" placeholder="Content goes here..."></textarea><br>
            <div id="subForm">
            <button type="button" onclick="enterLink()">Attachment</button>
            <input type="text" name="link" id="link" placeholder="paste link for attachment here">
            <button type="submit" name="submit" value="POST" id="submit">POST</button>
            </div>
    </form>
    </div>
    <?php
    $sql3="select * from post order by originAt desc";
    $res=$conn->query($sql3);
    for($i=0;$i<$res->num_rows;$i++){
        $row=$res->fetch_assoc();
        $titleTempPost=$row['title'];
        $authorUserName=$row['creator'];
        $postID=$row['postID'];
        $vote=$row['upvotes']-$row['downVotes'];
        $sql9="select * from userData where username='$authorUserName'";
        $res9=$conn->query($sql9);
        $row9=$res9->fetch_assoc();
        $categoryAuthorTempPost=$row9['category'];
        if($categoryAuthorTempPost=="studentFields"){
            $shortCate="S";
        }
        else if($categoryAuthorTempPost=="teacherFields"){
            $shortCate="T";
        }
        else{
            $shortCate="H";
        }
    ?>
    <div class="savedPost">
        <?php
            echo "<form class='votes' action='home.php?postVotedOn=$postID' method='post'>
            <button type='submit' id='up' name='up'>/\</button>
            <p id='vote'>$vote</p>
            <button type='submit' id='down' name='down'>\/</button>
            </form>
            <div class='postDetail'>
            <div id='titleSpan'>
            Title:&nbsp;<a href='post.php?postID=$postID' id='titleLink'>$titleTempPost</a>
            </div>
            <div id='authorLink'>
            Author:&nbsp;<a href='profile.php?username=$authorUserName'>($shortCate)$authorUserName</a>
            </div>
            </div>";
        ?>
    </div>
    <?php
    }
    ?>
</div>
<script src="homeattachment.js"></script>
<?php
include("footer.php");
?>
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['submit'])){
            $title=$_POST['title'];
            $body=$_POST['postBody'];
            if($_POST['link']){
                $link=$_POST['link'];
                $sql2="insert into post(creator,title,body,attachment) values('$username','$title','$body','$link')";
            }
            else{
                $sql2="insert into post(creator,title,body) values('$username','$title','$body')";
            }
            if($conn->query($sql2)){
                $sql15="select numPosts from profileData where username='$username'";
                $res15=$conn->query($sql15);
                $row15=$res15->fetch_assoc();
                $newNumPosts=$row15['numPosts']+1;
                $sql3="update profileData set numPosts='$newNumPosts' where username='$username'";
                if($conn->query($sql3)){
                    header("Location: home.php");
                }
            }
        }
        if(isset($_POST['up'])){
            $sql7="select * from votedOn where username='$username' and postID='$postVotedOn'";
            $res7=$conn->query($sql7);
            if($res7->num_rows!=0){
                $row7=$res7->fetch_assoc();
                if($row7['upOrDown']=="down"){
                    $canBeDone=1;
                }
                else{
                    $canBeDone=0;
                }
            }
            if($res7->num_rows==0 || $canBeDone==1){
                if($canBeDone==0){
                    $sql8="insert into votedOn(username,postID,upOrDown) values('$username','$postVotedOn','up')";
                    $conn->query($sql8);
                }
                else{
                    $sql8="update votedOn set upOrDown='up' where username='$username' and postID='$postVotedOn'";
                    $conn->query($sql8);
                }
                $sql6="select * from post where postID='$postVotedOn'";
                $res6=$conn->query($sql6);
                if($res6->num_rows!=0){
                    $row6=$res6->fetch_assoc();
                    $newUpVote=$row6['upvotes']+1;
                    $newDownVote=$row6['downVotes'];
                    if($canBeDone==1){
                        $newDownVote=$row6['downVotes']-1;
                    }
                    $sql4="update post set upvotes='$newUpVote' where postID='$postVotedOn'";
                    $sql5="update post set downVotes='$newDownVote' where postID='$postVotedOn'";
                    $conn->query($sql4);
                    $conn->query($sql5);
                    header("Location: home.php");
                }
            }
        }
        if(isset($_POST['down'])){
            $sql7="select * from votedOn where username='$username' and postID='$postVotedOn'";
            $res7=$conn->query($sql7);
            if($res7->num_rows!=0){
                $row7=$res7->fetch_assoc();
                if($row7['upOrDown']=="up"){
                    $canBeDone=1;
                }
                else{
                    $canBeDone=0;
                }
            }
            if($res7->num_rows==0 || $canBeDone==1){
                if($canBeDone==0){
                    $sql8="insert into votedOn(username,postID,upOrDown) values('$username','$postVotedOn','down')";
                    $conn->query($sql8);
                }
                else{
                    $sql8="update votedOn set upOrDown='down' where username='$username' and postID='$postVotedOn'";
                    $conn->query($sql8);
                }
                $sql6="select * from post where postID='$postVotedOn'";
                $res6=$conn->query($sql6);
                if($res6->num_rows!=0){
                    $row6=$res6->fetch_assoc();
                    $newDownVote=$row6['downVotes']+1;
                    $newUpVote=$row6['upvotes'];
                    if($canBeDone==1){
                        $newUpVote=$row6['upvotes']-1;
                    }
                    $sql4="update post set downVotes='$newDownVote' where postID='$postVotedOn'";
                    $sql5="update post set upvotes='$newUpVote' where postID='$postVotedOn'";
                    if($conn->query($sql4) && $conn->query($sql5)){
                        header("Location: home.php");
                    }
                }
            }
        }
    }
?>