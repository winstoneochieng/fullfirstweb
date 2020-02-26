<?php
    require 'config.php';
    require 'header.php';

    $title = $price = $desciption = $time = $image ='';


    if (isset($_GET['id'])){
        $id = $_GET['id'];
//        use id to pull data from database
    $sql = "SELECT `id`, `supplier_id`, `title`, `price`, `desciption`, `image`, `time_posted` FROM `products` WHERE id ='$id'";
    $product = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($product)){
        echo "<tr>";
        $id = $row['id'];
        $title = $row['title'];
        $price = $row['price'];
        $desciption = $row['desciption'];
        $time = $row['time_posted'];
        $image = $row['image'];

        require 'product_detail_form.php';

    }
    }







    require 'footer.php';
?>