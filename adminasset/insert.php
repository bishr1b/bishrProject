<?php
// session_start();
require("../configration.php");

if (isset($_SESSION['login']) != 'login') {

    header('Location:../mylogin.php');
}
include('layout/header.php');
include('layout/navbar.php');



$title = "";
$description = "";
$price = "";
$discount = "";
$image = "";

$titleErorr = "";
$descriptionErorr = "";
$priceErorr = "";
$discountErorr = "";
$imageErorr = "";
$emptyErorr = "";
$k = 1;

if (isset($_POST['insert'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    //name
    $myimage = $_FILES['myimg']['name'];
    //extension
    $extensionImage = pathinfo($myimage,PATHINFO_EXTENSION);

    $accept = array('jpg', 'png', 'gif', 'jpeg', 'mp4');

    if (empty($title) || empty($description) || empty($price) || empty($myimage)) {
        $k = 0;
    }
    if (in_array($extensionImage, $accept) == false && $k == 1) {
        $imageErorr = "هذا الامتداد غير مسموح به";
    }
    if ($price <= $discount && $k == 1) {
        $discountErorr = "الخصم لازم يكون اقل من السعر الاصلي";
    }
    if ($k == 0) {
        $emptyErorr = "رجاء ادخل كل المعلومات";
    }
    if ($titleErorr == "" && $descriptionErorr == "" && $priceErorr == "" && $discountErorr == "" && $imageErorr == "" && $emptyErorr == "") {
        $insertQuery = "INSERT INTO products(title,description,price,discount,image) VALUE('$title','$description',$price,$discount,'$myimage')";
        $res = mysqli_query($connectios, $insertQuery);
        if ($res) {
            move_uploaded_file($_FILES['myimg']['tmp_name'], "../photo/prodect/".$myimage);
            echo "<script>

     alert('تم حفظ البيانات بنجاح');
    </script>";
        }
    }
}


?>

<!-- /.navbar -->

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
                        <h1 class="m-0 text-dark">اضافة منتج</h1>
                    </div><!-- /.col -->

                    <!-- من اريد ارفع الصوره او ملف او بيديف لازم نخحط enxtype -->
                    <form action="insert.php" method="POST" enctype="multipart/form-data">

                        <div class="container">
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="title">اسم المنتج</label>
                                    <input type="text" class="form-control" name="title" id="title" value="<?php echo $title ?>">
                                    <div style="font-size:bold;color:red;"><?php echo $titleErorr; ?></div>
                                </div>

                                <div class="col-md-6">
                                    <label for="description">تفاصيل المنتج</label>
                                    <input type="text" class="form-control" name="description" id="description" value="<?php echo $description ?>">
                                    <div style="font-size:bold;color:red;"><?php echo $descriptionErorr; ?></div>

                                </div>

                                <div class="col-md-6">
                                    <label for="price">السعر</label>
                                    <input type="number" class="form-control" name="price" id="price" value="<?php echo $price ?>">
                                    <div style="font-size:bold;color:red;"><?php echo $priceErorr; ?></div>
                                </div>

                                <div class="col-md-6">
                                    <label for="discount">سعر التخفيض</label>
                                    <input type="number" class="form-control" name="discount" id="discount" value="<?php echo $discount ?>">
                                    <div style="font-size:bold;color:red;"><?php echo $discountErorr; ?></div>
                                </div>


                                <div class="col-md-12">
                                    <label for="myimg">صوره المنتج</label>
                                    <input type="file" class="form-control" name="myimg" id="myimg" value="<?php echo $image ?>">
                                    <div style="font-size:bold;color:red;"><?php echo $imageErorr; ?></div>
                                </div>

                                <div style="font-size:bold;color:red;"><?php echo $emptyErorr; ?></div>
                            </div>

                            <button type="submit" class="btn btn-success mt-3" name="insert">اضافة منتج</button>
                        </div>
                    </form>
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