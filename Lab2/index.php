
<?php
require_once "vendor/autoload.php";
$user_name = isset($_POST["name"])?$_POST["name"]:"";
$user_email = isset($_POST["email"])?$_POST["email"]:"";
$user_message = isset($_POST["message"])?$_POST["message"]:"";
$submit_message = "";
$desired_view = isset($_GET["view"]) ? $_GET["view"]: Default_VIEW;

if($desired_view == "display"){
    display_all_submits();
    echo "<p>To add a new submit <a href='index.php'>click here</a></p>";
    exit();
}

if(empty($user_name) || strlen($user_name)>= MAX_NAME_LENGTH){
  $submit_message = "**Name couldn't be empty and shouldn't exceed 100 characters";
} else if (empty($user_email) || !filter_var($user_email, FILTER_VALIDATE_EMAIL)){
    $submit_message = "**Email is not valid";
} else if (empty($user_message) || strlen($user_message) >= MAX_MESSAGE_LENGTH){
    $submit_message = "**Message couldn't be empty and couldn't exceed 255 characters";
}else{
    store_submits_to_file($user_name, $user_email);
    exit("<p> <b> ".THANKS_MESSAGE." </b> </p>
    <p> <b> Name: </b> $user_name</p> 
    <p> <b> Email: </b> $user_email</p> 
    <p> <b> Message: </b> $user_message</p> 
    <br>
    <p>To visit all submits <a href='index.php?view=display'>click here</a></p>
    ");
}
?>

<html>
    <head>
        <title> contact form </title>
    </head>

    <body>
        <h3> Contact Form </h3>
        <div id="after_submit">
            <b>
            <?php 
               echo $submit_message;
            ?>
            </b>
        </div>
        <form id="contact_form" action="#" method="POST" enctype="multipart/form-data">

            <div class="row">
                <label class="required" for="name">Your name:</label><br />
                <input id="name" class="input" name="name" type="text" value="<?php echo $user_name; ?>" size="30" /><br />

            </div>
            <div class="row">
                <label class="required" for="email">Your email:</label><br />
                <input id="email" class="input" name="email" type="text" value="<?php echo $user_email; ?>" size="30" /><br />

            </div>
            <div class="row">
                <label class="required" for="message">Your message:</label><br />
                <textarea id="message" class="input" name="message" rows="7" cols="30"></textarea><br />

            </div>

            <input id="submit" name="submit" type="submit" value="Send email" />
            <input id="clear" name="clear" type="reset" value="clear form" />

        </form>
    </body>

</html>