<?php
require("../configration.php");

if(isset($_SESSION['login'])!='login')
{
    header('Location:../mylogin.php');
}
include('layout/header.php');
include('layout/navbar.php');

if(isset($_POST['update']))
{
$id=$_POST['id'];
$title=$_POST['title'];
$price=$_POST['price'];
$description=$_POST['description'];
$discount=$_POST['discount'];
$img=$_FILES['myimg']['name'];
$pastImg=$_POST['before'];
$categories_id=$_POST['categories_id'];
if($img=='')
{
    $fileImg=$lastImg;
}

else {
    $fileImg=$img;
}
$myQuery="UPDATE products SET title='$title', description='$description', discount=$discount , price=$price , image='$fileImg' WHERE id=$id ";
$res=mysqli_query($connectios,$myQuery);
if($res)
{
    move_uploaded_file($_FILES['myimg']['tmp_name'],"../photo/prodect/".$fileImg);
    unlink("../photo/prodect/" . $pastImg);
  $_SESSION['tm']="تم التعديل بنجاح";
    echo "<script>
    window.location.href='list.php';
    </script>";
    
}
}
?>

<!-- Main Sidebar Container -->
<?php include('layout/sidebar.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">تعديل منتج</h1>
                </div><!-- /.col -->

         <?php
         if (isset($_GET['id']))
         {
            $ID=$_GET['id'];
        $Query="SELECT * FROM products WHERE id=$ID ";
        $resualt=mysqli_query($connectios,$Query);
        if($resualt){
            $ROW=mysqli_fetch_array($resualt);
        ?>
 <form action="edit.php" method="POST" enctype="multipart/form-data">
<div class="container">
    <div class="row">

    <input type="hidden" class="form-control" name="id"  value="<?php echo $ROW['id']; ?>">
    
        <div class="col-md-6">
            <label for="title">اسم المنتج</label>
            <input type="text" class="form-control" name="title" id="title" value="<?php echo $ROW['title'];?>">
        </div>

        <div class="col-md-6">
            <label for="description">تفاصيل المنتج</label>
            <input type="text" class="form-control" name="description" id="description" value="<?php echo $ROW['description'];?>">

        </div>

        <div class="col-md-6">
            <label for="price">السعر</label>
            <input type="number" class="form-control" name="price" id="price" value="<?php echo $ROW['price']?>">
        </div>

        <div class="col-md-6">
            <label for="discount">سعر التخفيض</label>
            <input type="number" class="form-control" name="discount" id="discount" value="<?php echo $ROW['discount']?>">
        </div>

        <div class="col-md-12">
            <label for="myimg" >صوره المنتج</label>
            <input type="text" name="before" value="<?php echo $ROW['image']?>">
            <img style="width:120px;heigth:80px;" src="../photo/prodect/<?php echo $ROW['image'];?>" alt="">
            <input type="file" class="form-control" name="myimg" id="myimg" >
        </div>

    </div>

<button type="submit" class="btn btn-success mt-3" name="update">تعديل منتج</button>

</div>
</form>
<?php
}
}
?>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper --><?php
                            include('layout/footer.php');
                            ?>