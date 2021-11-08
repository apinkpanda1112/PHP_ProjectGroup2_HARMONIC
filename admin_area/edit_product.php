<?php 
include ('includes/db.php');
if(!isset($_SESSION['admin_email']))
{
    echo"<script> window.open('login.php','_self') </script>";
}else{

?>

<?php 
    if(isset($_GET['edit_product'])){
    $edit_id= $_GET['edit_product'];
    $get_p ="select * from products where product_id='$edit_id'";
    $run_edit=mysqli_query($con,$get_p);
    $row_edit=mysqli_fetch_array($run_edit);
    $p_id=$row_edit['product_id'];
    $p_title=$row_edit['product_title'];
    $p_cat=$row_edit['p_cat_id'];
    $cat=$row_edit['cat_id'];
    $p_image1=$row_edit['product_img1'];
    $p_image2=$row_edit['product_img2'];
    $p_image3=$row_edit['product_img3'];
    
    $p_keywords=$row_edit['product_keywords'];
    $p_price=$row_edit['product_price'];
    $p_desc=$row_edit['product_desc'];
    $p_desc1=$row_edit['product_desc1'];
   
    }
    $get_p_cat="select * from product_category where p_cat_id='$p_cat'";
    $run_p_cat=mysqli_query($con,$get_p_cat);
    $row_p_cat=mysqli_fetch_array($run_p_cat);
    $p_cat_title =$row_p_cat['p_cat_title'];

    $get_cat="select * from categories where cat_id='$cat'";
    $run_cat=mysqli_query($con,$get_cat);
    $row_cat=mysqli_fetch_array($run_cat);
    $cat_title=$row_cat['cat_title'];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
    <title>EDIT-Product</title>
   
   
    
</head>
<body>
<div class="row"> <!--breadcrumb row start -->
    <div class="col-lg-12">
        <div class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i>
                Dashboard / Edit Product
            </li>
        </div>
    </div>
</div> <!--breadcrumb row end -->

<div class="row"> 
    
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"><!-- panel heading start -->
                <h3 style="color:black;" class="panel-title"> <i class="fa fa-money fa-w"></i> Edit Product </h3>
            </div><!-- panel heading end -->
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Title</label>
                        <div class="col-md-6">
                        <input type="text" name="product_title" class="form-control" required  pattern="^^[A-Za-z].*" title="Begin with a words" value="<?php echo $p_title?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Category</label>
                        <div class="col-md-6">
                        <select name="product_cat" class="form-control" required>
                            <option value="<?php echo $p_cat ?>"> <?php echo $p_cat_title ?> </option>
                            <?php 
                                $get_p_cats ="select * from product_category";
                                $run_p_cats = mysqli_query($con, $get_p_cats);
                                while($row = mysqli_fetch_array($run_p_cats)){
                                        $p_cat_id=$row['p_cat_id'];
                                        $p_cat_title=$row['p_cat_title'];
                                        echo "<option value='$p_cat_id'> $p_cat_title </option>";
                                }
                            ?>
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Categories</label>
                        <div class="col-md-6">
                        <select name="cat" class="form-control" required>
                            <option value="<?php echo $cat ?>"> <?php echo $cat_title ?> </option>
                            <?php 
                                $get_cat ="select * from categories";
                                $run_cat = mysqli_query($con, $get_cat);
                                while($row = mysqli_fetch_array($run_cat)){ 
                                        $cat_id=$row['cat_id'];
                                        $cat_title=$row['cat_title'];
                                        echo "<option value='$cat_id'> $cat_title </option>";
                                }
                            ?>
                        </select>
                    </div>
                    </div>
                  
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Image 1</label>
                        <div class="col-md-6">
                        <input type="file" name="product_img1" class="form-control">
                        <br>
                        <img width="100" height="100" src="product_images/<?php echo $p_image1 ?>"  alt="<?php echo $p_image1 ?>">
                        

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Image 2</label>
                        <div class="col-md-6">
                        <input type="file" name="product_img2" class="form-control"  >
                        <br>
                        <img width="100" height="100" src="product_images/<?php echo $p_image2 ?>"  alt="<?php echo $p_image2 ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Image 3</label>
                        <div class="col-md-6">
                        <input type="file" name="product_img3" class="form-control"   >
                        <br>
                        <img width="100" height="100" src="product_images/<?php echo $p_image3 ?>" alt="<?php echo $p_image3 ?>">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Price</label>
                        <div class="col-md-6">
                        <input type="text" name="product_price" class="form-control" required value="<?php echo $p_price; ?>"  pattern="^^[0-9].*" title="Begin with a number">
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Keywords</label>
                        <div class="col-md-6">
                        <input type="text" name="product_keywords" class="form-control" required value="<?php echo $p_keywords ?>" pattern="^^[A-Za-z].*" title="Begin with a words">
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Description </label>
                        <div class="col-md-6">
                        <textarea id="mytextarea" name="product_desc" class="form-control" rows="6" cols="10"  required>
                        <?php echo $p_desc ?>
                        </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Description 1</label>
                        <div class="col-md-6">
                        <textarea id="mytextarea1" name="product_desc1" class="form-control" rows="6" cols="10"  required>
                            <?php echo $p_desc1 ?>
                        </textarea>
                    </div>
                    </div>
                   
                    </div>

                    <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                        <input type="submit" name="update" value="Update Product" class="btn btn-primary form-control" required>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>





  <!-- Latest compiled JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

<?php
if(isset($_POST['update'])){
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_desc1 = $_POST['product_desc1'];
    $product_keywords = $_POST['product_keywords'];

   /*  $product_img1 =$_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];
    
    $temp_name1 =$_FILES['product_img1']['tmp_name'];
    $temp_name2 =$_FILES['product_img2']['tmp_name'];
    $temp_name3 =$_FILES['product_img3']['tmp_name'];
    
    move_uploaded_file($temp_name1, "product_images/$product_img1");
    move_uploaded_file($temp_name2, "product_images/$product_img2");
    move_uploaded_file($temp_name3, "product_images/$product_img3");  */ 

  

    if($_FILES['product_img1']['name']=='' ){
        $image1 =  $row_edit['product_img1'];
    }else {
        //cho phep thay doi hinh anh
         $image1 =  $_FILES['product_img1']['name'];
        $image_tmp1 = $_FILES['product_img1']['tmp_name'];
        move_uploaded_file($image_tmp1, "product_images/$product_img1"); 
    }
    if($_FILES['product_img2']['name']=='' ){
        $image2 =  $row_edit['product_img2'];
    }else {
        //cho phep thay doi hinh anh
         $image2 =  $_FILES['product_img2']['name'];
        $image_tmp2 = $_FILES['product_img2']['tmp_name'];
        move_uploaded_file($image_tmp2, "product_images/$product_img2"); 
    }
    if($_FILES['product_img3']['name']=='' ){
        $image3 =  $row_edit['product_img3'];
    }else {
        //cho phep thay doi hinh anh
         $image3 =  $_FILES['product_img3']['name'];
        $image_tmp3 = $_FILES['product_img3']['tmp_name'];
        move_uploaded_file($image_tmp3, "product_images/$product_img3"); 
    }
    

    

    

    $update_product= "update products set p_cat_id='$product_cat',cat_id='$cat',date=NOW(),product_title='$product_title',product_img1='$image1',product_img2='$image2',product_img3='$image3',product_price='$product_price',product_keywords='$product_keywords',product_desc='$product_desc',product_desc1='$product_desc1' where product_id='$p_id'";
    $run_product=mysqli_query($con,$update_product);

    if($run_product){
        echo "<script>alert('Your product has been updated successfully');</script>";
        echo "<script>window.open('index.php?view_product','_self')</script>";
    }
  


   


}

?>
<?php } ?>