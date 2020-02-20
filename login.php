<?php
    require 'header.php';
    require 'config.php';

    $email=$password1='';
    $email_err=$password1_err='';
//steps
//1.grab user data from form
    if (isset($_POST['btn_login'])){
    //2.clean data

    if (isset($_POST['email'])){
        $email = $_POST['email'];
    }else{
        $email_err = "Fill this field";
    }

    if (isset($_POST['password'])){
        $password = $_POST['password'];
    }else{
        $password = "Fill this field";
    }

        //5.1 hash password
        $password = md5($password);

        //5.2 add user
        //use password & email to check if user exists

        $sql = "SELECT `id`, `email`, `password`, `user_type` FROM `users` WHERE email='$email' AND password='$password'";
//        results from db
        $results = mysqli_query($conn, $sql);
        if (mysqli_num_rows($results) > 0) {
//        grab indv data about user from db
            while ($rows = mysqli_fetch_assoc($results)) {
                $id = $rows['id'];
                $email = $rows['email'];
                $user_type = $rows['user_type'];
//                creat session for user
                session_start();
                $_SESSION['Kipande'] = $id;
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;


                if($user_type == 'supplier'){
                    $_SESSION['aina_ya_mtumizi'] = true;
                }else{
                    $_SESSION['aina_ya_mtumizi'] = false;
                }
//            return to index page

                header("location:index.php?msg_login");
                exit();
            }
        } else {
//           wrong password or email
            header("location:login.php");
        }

    }


?>
<!--Reg form-->
<div class="container">
    <div class="row">
        <div class="col-md-3 col-lg-3 col-xl-3"></div>
        <div class="col-md-6 col-lg-6 col-xl-6">
            <div id="form-section">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                    <fieldset>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button class="btn btn-warning btn-block" name="btn_login">Login</button>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3"></div>
    </div>
</div>



<?php
require 'footer.php';


?>

