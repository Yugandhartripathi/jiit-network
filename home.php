<?php
    include("header.php");
?>
<div class="container">
    <div class="newPost">
        <form id="postForm" method="post" action=<?php echo "home.php?username=".$username;?>>
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
        $authorTempPost=$row['creator'];
        $postID=$row['postID'];
        $vote=$row['upvotes'];
    ?>
    <div class="savedPost">
        <?php
            echo "<div class='votes'>
            <button id='up' name='up'>UP</button>
            <p id='vote'>$vote</p>
            <button id='down' name='down'>Down</button>
            </div>
            <div class='postDetail'>
            <div id='titleSpan'>
            Title:&nbsp;<a href='post.php?postID=$postID' id='titleLink'>$titleTempPost</a>
            </div>
            <div id='authorLink'>
            Author:&nbsp;<a href='profile.php?username=$authorTempPost'>$authorTempPost</a>
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
    if(isset($_POST['submit'])){
        $title=$_POST['title'];
        $body=$_POST['postBody'];
        if($_POST['link']){
            $link=$_POST['link'];
            $sql2="insert into post(creator,title,body,upvotes,attachment) values('$username','$title','$body',0,'$link')";
        }
        else{
            $sql2="insert into post(creator,title,body,upvotes) values('$username','$title','$body',0)";
        }
        if($conn->query($sql2)){
            header("Location: home.php?username=$username");
        }
    }
?>