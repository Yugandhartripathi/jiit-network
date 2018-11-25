<?php
    include("header.php");  
?>
<div class="container">
    <div class="sub-1">
        <img src="" id="profileImg">
        <div class="profileForm" id="control">
                <form action=<?php echo "profile.php?username=".$username;?> method='post' enctype='multipart/form-data'>
                    <label class="upProfile">
                        Image URL : <input type="text" name="imgLink">
                    </label>
                    <button id="submit" name="updateImg" type="submit">Update Profile Picture</button>
                </form>
        </div>
    </div>
</div>
<?php
    include("footer.php");
?>