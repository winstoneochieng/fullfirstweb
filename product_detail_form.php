<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4">
                <div class="card">
                    <img src="/static/image/<?php echo $image?>" alt="">
                </div>
            </div>
            <div class="col-md-8 col-lg-8 col-xl-8">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" value="<?php echo $title ?>" name="title">
                </div>

            <div class="form-group">
                <label for="">Description</label>
                <textarea rows="6" class="form-control">
                    <?php $desciption ?>
                </textarea>
            </div>
            <input hidden type="text" name="old_image" value="<?php echo $image ?>">
            <input type="file" name="view_image">
            <button class="btn btn-info btn-lg">Update</button>
        </div>
        </div>
    </form>
</div>
