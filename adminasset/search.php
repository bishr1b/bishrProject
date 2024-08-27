<?php
require("../configration.php");
if(isset($_POST['btn_search']))
{
$Name=$_POST['sreachName'];
$query="SELECT * FROM products WHERE title=$title";
$resalut=mysqli_query($connectios,$query);
$myarray=mysqli_fetch_array($resalut);

}
?>