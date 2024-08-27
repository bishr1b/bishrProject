<?php
require("../configration.php");

if(isset($_SESSION['login'])!='login')
{
    header('Location:../mylogin.php');
}
if(isset($_POST['del']))
{
$myid=$_POST['myid'];
$img=$_POST['myimg'];
$Query="DELETE FROM products WHERE id=$myid";
mysqli_query($connectios,$Query);
unlink("../photo/prodect/".$img);
$_SESSION['tm']="تم الحذف بنجاح";
echo "<script>
window.location.href='list.php';
</script>";
}
?>
