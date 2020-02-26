<?php
require 'config.php';
require 'header.php';
$title=$price=$desciption=$uploadFile=$supplier_id= '';
$title_err=$price_err=$desciption_err=$uploadFile_err = '';

//grab supplier id
if(isset($_SESSION['kipande'])){
    $supplier_id =$_SESSION['kipande'];
}

if(isset($_POST['btn_addProduct']) and isset($_FILES['uploadFile'])){
//    grab form data
    $title= $_POST['title'];
    $price= $_POST['price'];
    $description= $_POST['description'];
//   validate data
    if(!isset($title)){
        $title_err = "Please fill this field";
    }
    if(!isset( $price)){
        $price_err = "Please fill this field";
    }
    if(!isset($description)){
        $description_err = "Please fill this field";
    }
//    process file data
    $fileTmpPath = $_FILES['uploadFile']['tmp_name'];
    $image = $_FILES['uploadFile']['name'];// name of the image
    $fileSize = $_FILES['uploadFile']['size'];// size of the image
    $fileType = $_FILES['uploadFile']['type'];
    $fileNameCmps = explode(".",$image);
    $fileExtension = strtolower(end($fileNameCmps));//extension of the img

//    allowed extensions for file upload
    $extension = array("jpeg","jpg","png");
    if(in_array($fileExtension, $extension)==false){
//        if user uploads an image with a diff extension
        $error[]="Extension not allowed, please choose JPG, JPEG, PNG file";

    }
    if(empty($error)){
//        upload an image to the images folder
        move_uploaded_file($fileTmpPath,"static/images/".$image);
    }else{
        print($error);
    }
//    if successful add text data into the db
    $sql = "INSERT INTO `products`(`id`, `supplier_id`, `title`, `price`, `desciption`, `image` ) VALUES (NULL,'$supplier_id','$title','$price','$description','$image')";
    if(mysqli_query($conn, $sql)){
        header("location:dashboard.php");
    }else{
        echo "ERROR: ".mysqli_error($conn);
    }
}




?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8 col-xl-8">
                <!----------------------------------------table------------------------------------->
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Desciption</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "SELECT `id`, `supplier_id`, `title`, `price`, `desciption`, `image`, `time_posted` FROM `products` WHERE supplier_id='$supplier_id'";
                    $products = mysqli_query($conn, $sql);
                    while($row=  mysqli_fetch_assoc($products)){
                        echo "<tr>";
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $desciption = $row['desciption'];
                        $time = $row['time_posted'];

                        echo "<td>$id</td>";
                        echo "<td>$title</td>";
                        echo "<td>$price</td>";
                        echo "<td>$desciption</td>";
                        echo "<td>$time</td>";
                        echo "<td>";
                        echo "<a href='product_detail.php?id=$id' class='btn btn-info'>View</a>";
                        echo "<a href='product_delete.php?id=$id' class='btn btn-danger'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
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
                            <textarea name="description" class="forn-control" cols="30" rows="10"></textarea>
                        </div>
                        <input type="file" name="uploadFile">
                        <button class="btn btn-warning btn-block" name="btn_addProduct">Add Product</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>





<?php
require 'footer.php';
?>