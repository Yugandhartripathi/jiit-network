<?php
    include("header.php");
?>
<div class="container">
    <div class="newPost">
        <form id="postForm" method="post" action=<?php echo "home.php?username=".$username;?>>
            <input type="text" name="title" id="title" placeholder="Post Title" autofocus required><br>
            <textarea name="postBody" rows="5" form="postForm" placeholder="Content goes here..."></textarea><br>
            <div id="subForm">
            <button onClick="enterLink()">Attachment</button>
            <input type="text" name="link" id="link" placeholder="paste link for attachment here">
            <button type="submit" name="submit" value="POST" id="submit">POST</button>
            </div>
    </div>
</div>
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
            echo "<br><br>Success";
        }
    }
?>