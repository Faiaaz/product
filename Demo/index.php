<?php 

include("includes/header.php");
include ("includes/classes/User.php");
include ("includes/classes/Post.php");

if (isset($_POST['post'])){
    $post = new Post($con, $userloggedIn);
    $post->submitPost($_POST['post_text'], 'none');
}


 ?>

<div class="user_details column">
    <a href="<?php echo $userloggedIn ?>"> <img src="<?php echo $user['profile_pic']; ?>" alt=""> </a>

    <div class="user_details_left_right">
    <a href="<?php echo $userloggedIn ?>">
    <?php
        echo $user['first_name'] . " " . $user['last_name'];
    ?>
    </a>
    <br>
    <?php
        echo "Posts: " . $user['num_posts']."<br/>";
        echo "Likes: " . $user['num_likes'];
    ?>
    </div>
</div>

<div class="main_column column">

    <form action="index.php" method="POST" class="post_form">
        <textarea name="post_text" id="post_text" placeholder="share your thoughts!"></textarea>
        <input type="submit" value="post" name="post" id="post_button">
        <hr>
    </form>

    <?php
        $user_obj = new User($con, $userloggedIn);
        echo $user_obj->getFirstAndLastName();

    ?>
</div>


</div>
</body>
</html>