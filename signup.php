<?php
    require 'header.php';
    require 'config.php';
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
                             <label for="">Username</label>
                             <input type="text" name="username" class="form-control" required>
                         </div>
                         <div class="form-group">
                             <label for="">Email</label>
                             <input type="email" name="email" class="form-control" required>
                         </div>
                         <div class="form-group">
                             <label for="">Password</label>
                             <input type="password" name="password1" class="form-control" required>
                         </div>
                         <div class="form-group">
                             <label for="">Confirm Password</label>
                             <input type="password" name="password2" class="form-control" required>
                         </div>
                         <div class="input-group">
                             <span>
                                 Supplier <input type="radio" name="user-type" value="supplier">
                             </span>
                             <span>
                                 Customer <input type="radio" name="user-type" value="customer">
                             </span>
                         </div>
                         <button class="btn btn-warning btn-block">CREATE ACCOUNT</button>
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
