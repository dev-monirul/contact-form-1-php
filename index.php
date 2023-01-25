<?php
    if(isset($_POST['submit'])){
     $name = error($_POST['name']);
     $email = error($_POST['email']);
     $business = error($_POST['business']);
     $message = error($_POST['message']);

    // error checking
    $error = [];

    if(empty($name)){
        $error['name'] = "Please, Insert your name.";
    }
    if(empty($email)){
        $error['email'] = "Please, Insert your email.";
    }
    if(empty($business)){
        $error['business'] = "Please, Insert your asunto.";
    }
    if(empty($message)){
        $error['message'] = "Please, Insert your message.";
    }
    if(empty($_POST['permision'])){
        $error['permision'] = "Please, Check the Privacy Policy.";
    }

    // Mail
    $to = 'hello@servicehtml.com';
    $from = 'From ' . $email;
    
    $body = '<html><body>';
    $body = '<table rules="all" style="border-color:#333" cellpadding="10px">';
    $body .= '<tr><td>Name</td><td>'.$name.'</td></tr>';
    $body .= '<tr><td>Email</td><td>'.$email.'</td></tr>';
    $body .= '<tr><td>Business</td><td>'.$business.'</td></tr>';
    $body .= '<tr><td>Message</td><td>'.$message.'</td></tr>';
    $body .= '</table>';
    $body .= '</body><html>';

    $headers = "From: " . $email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $check = mail($to, $from, $body, $headers);
    
    if($check == true) {
        $success = '<span class="feedback">Message Send Successfully</span>';
    }

    }

    function error($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="project description here">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon/favicon.ico">
    <title>Form</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    
    
    
    <!-- contact-area-start-here -->
    <section class="contact-area" id="contacto">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="contact-form">
                        <form action="" method="POST">
                            <div class="single-form-group">
                                <input name="name" type="name" placeholder="Name" value="<?php if(isset($name)) {echo $name;}?>">
                                <span>
                                    <?php
                                        if(isset($error['name'])){
                                            echo $error['name'];
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="single-form-group">
                                <input name="email" type="email" placeholder="Email" value="<?php if(isset($email)) {echo $email;}?>">
                                <span>
                                    <?php
                                        if(isset($error['email'])){
                                            echo $error['email'];
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="single-form-group">
                                <input name="business" type="business" placeholder="Business" value="<?php if(isset($business)) {echo $business;}?>">
                                <span>
                                    <?php
                                        if(isset($error['business'])){
                                            echo $error['business'];
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="single-form-group single-form-group-message">
                            <textarea name="message" placeholder="Message"><?php if(isset($message)) {echo $message;} ?></textarea>
                                <span>
                                    <?php
                                        if(isset($error['message'])) {
                                            echo $error['message'];
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="single-form-group single-form-group-check">
                                <label class="terms-check">Agree with Terms & Conditions
                                    <input type="checkbox" name="permision" <?php if(isset($_POST['permision']) && $_POST['permision'] == 'Yes') {echo 'checked';}?> value="Yes">
                                    <span class="checkmark"></span>
                                </label>
                                <span>
                                    <?php
                                        if(isset($error['permision'])) {
                                            echo $error['permision'];
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="single-form-group single-form-group-btn">
                                <input name="submit" type="submit" value="Enviar">
                                <?php if(isset($success)) {echo $success;} ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>