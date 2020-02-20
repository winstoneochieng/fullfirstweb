<?php
    require 'config.php';
    require 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-lg-8 col-xl-8">
<!--            table-->
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4">
<!--            product form-->
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data">
                <fieldset>

                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" name="price" class="form-control">
                    </div>

                    <div class="form-group">
                        <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                    </div>

                    <input type="file" name="productimg">
                    <button class="btn btn-warning btn-block">Add Product</button>

                </fieldset>
            </form>
        </div>
    </div>
</div>



<?php
require 'footer.php';
?>
