<?php
require("../configration.php");

if (isset($_SESSION['login']) != 'login') {
    header('Location:../mylogin.php');
}
include('layout/header.php');
include('layout/navbar.php');

if ($connectios == true) {

    if (isset($_POST['btn_search'])) {
        $Name = $_POST['sreachName'];
        $query = "SELECT * FROM products WHERE title='$Name'";
        $res = mysqli_query($connectios, $query);
        $_SESSION['tm'] = "تمت البحث بنجاح";
    } else if (isset($_GET['filterP'])) {
        $minprice = $_GET['minPrice'];
        $maxprice = $_GET['maxPrice'];
        $querybetween = "SELECT * FROM products WHERE price BETWEEN $minprice AND $maxprice;";
        $res = mysqli_query($connectios, $querybetween);
        $_SESSION['tm'] = "تمت الفلتره بنجاح";
    } else {
        $myQuery = "SELECT * FROM products";
        $res = mysqli_query($connectios, $myQuery);
    }
}


?>


<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include('layout/sidebar.php'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">صفحة المنتجات</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">


                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <?php
            if (isset($_SESSION['tm'])) {
            ?>
                <div style="width:100%;" class="btn btn-success">
                    <?php
                    echo $_SESSION['tm'];
                    unset($_SESSION['tm']);
                    ?>
                </div>

            <?php
            }
            ?>


            <!-- Small boxes (Stat box) -->
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title"> </h3>
                </div>
                <!-- /.card-header -->


                <div class="card-body">

                    <?php


                    ?>
                    <form action="list.php" method="GET">
                        <input type="number" name="minPrice" placeholder="ادخل اصغر سعر">
                        <input type="number" name="maxPrice" placeholder="ادخل اكبر سعر">
                        <input type="submit" name="filterP" class="btn btn-primary" value="فلتره">
                    </form>

                    <table class="table table-bordered">



                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم المنتج</th>
                                <th>السعر</th>
                                <th>الوصف</th>
                                <th>الخصم</th>
                                <th>الصورة</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if ($res == true && mysqli_num_rows($res) > 0) {
                                for ($i = 0; $i < mysqli_num_rows($res); $i++) {
                                    $row = mysqli_fetch_array($res);
                            ?>

                                    <tr>

                                        <td style="width:5px;"><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo $row['price']; ?></td>
                                        <td><?php echo $row['description']; ?></td>
                                        <td><?php echo $row['discount']; ?></td>
                                        <td>
                                            <img style="width:120px; heigth:40px;" src="../photo/prodect/<?php echo $row['image']; ?>" alt="">
                                        </td>

                                        <td>
                                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">تعديل</a>
                                        </td>

                                        <td>
                                            <form action="delete.php" method="post">

                                                <input type="submit" class="btn btn-danger" value="حذف" name="del">
                                                <input type="hidden" value="<?php echo $row['id'] ?>" name="myid">
                                                <input type="hidden" name="myimg" value="<?php echo $row['image'] ?>">

                                            </form>
                                        </td>

                                    </tr>




                            <?php
                                }
                            }
                            ?>

                            ?>

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class=" card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php
include('layout/footer.php');
