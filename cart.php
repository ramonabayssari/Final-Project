<?php 

    $active='Cart';
	include("includes/db.php");
    include("includes/header.php");

?>
  
<html>  

<header>
    <h2>Enter down bellow the categories of interest and we wil generate for you 5 gift baskets of 3 gifts each!</h2>
  </header>

<body>  
   <form action="" method="post" enctype="multipart/form-data">  
   <div style="width:200px;border-radius:6px;margin:0px auto">  
<table border="1">  
   <tr>  
      <td colspan="2">Select Product Category:</td>  
   </tr>  
   <tr>  
      <td>Clothes </td>  
      <td><input type="checkbox" name="techno[]" value="1"></td>  
   </tr>
 <tr>  
      <td>Acsessories</td>  
      <td><input type="checkbox" name="techno[]" value="2"></td>  
   </tr>   
   <tr>  
      <td>Athletic</td>  
      <td><input type="checkbox" name="techno[]" value="3"></td>  
   </tr>  
   <tr>  
      <td>Housewear</td>  
      <td><input type="checkbox" name="techno[]" value="4"></td>  
   </tr>  
   <tr>  
      <td>Gadget</td>  
      <td><input type="checkbox" name="techno[]" value="5"></td>  
   </tr>  
   <tr>  
      <td colspan="2" align="center"><input type="submit" value="submit" name="sub"></td>  
   </tr>  
</table>  
</div>  
</form>  
<?php  

if(isset($_POST['sub']))  
{ 
$checkbox1=$_POST['techno'];  
$chk="";  
foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   } 
$sql = "DROP TABLE IF EXISTS table2";
$result = $con->query($sql);

$sql = "CREATE TABLE table2(
	id int AUTO_INCREMENT PRIMARY KEY, 
	product_id int)";
if (mysqli_query($con, $sql)) {
  echo "";
} else {
  echo "Error creating table: " . mysqli_error($con);
}
   
$sql = "INSERT INTO table2 (product_id)
SELECT product_id 
FROM products  
WHERE p_cat_id IN ('$chk')";
if (mysqli_query($con, $sql)) {
  echo "";
} else {
  echo "Error creating table: " . mysqli_error($con);
}


$sql = "DROP TABLE IF EXISTS basket;";
mysqli_query($con, $sql);

$sql = "CREATE TABLE basket(id int AUTO_INCREMENT PRIMARY KEY, p_id1 int, p_id2 int, p_id3 int, total int)";
if (mysqli_query($con, $sql)) {
  echo "";
} else {
  echo "Error creating table: " . mysqli_error($con);
}

$x = 1;

while($x <= 5) {
  $sql1 ="
SELECT table2.product_id FROM table2 

ORDER BY RAND ( )  
LIMIT 1;";
//$result1=1;
//$result1=mysqli_query($con, $sql1);
if (mysqli_query($con, $sql1)) {
  echo "";
} else {
  echo "Error creating table: " . mysqli_error($con);
}
$result1 = $con->query($sql1);
foreach($result1 as $row) {
   // echo $row['product_id'];
	$result11= $row['product_id'];
}
//----------------------------------------
$sql2 ="
SELECT table2.product_id FROM table2
ORDER BY RAND ( )  
LIMIT 1;";
//$result2=1;
//$result2=mysqli_query($con, $sql1);

if (mysqli_query($con, $sql2)) {
  echo "";
  
} else {
  echo "Error creating table: " . mysqli_error($con);
}
$result2 = $con->query($sql2);
foreach($result2 as $row) {
    //echo $row['product_id'];
	$result22= $row['product_id'];
}
//--------------------------------------
$sql3 ="
SELECT table2.product_id FROM table2  

ORDER BY RAND ( )  
LIMIT 1;";
$result3=1;
$result3=mysqli_query($con, $sql1);
if (mysqli_query($con, $sql3)) {
  echo "";
  
} else {
  echo "Error creating table: " . mysqli_error($con);
}
$result3 = $con->query($sql3);
foreach($result3 as $row) {
   // echo $row['product_id'];
	$result33= $row['product_id'];
}
//---------------------------------------------

$a ="INSERT INTO basket(p_id1, p_id2, p_id3) VALUES ('$result11','$result22','$result33')";
//$a ="INSERT INTO basket(p_id1, p_id2, p_id3) VALUES (1,2,3)";
if (mysqli_query($con, $a)) {
  echo "";
  
} else {
  echo "Error creating table: " . mysqli_error($con);
}

$x++;  
}
//========================================================
$x=1;
while($x <= 5) {
  $sql1 ="
SELECT products.product_price 
FROM products, basket
WHERE products.product_id=basket.p_id1 AND basket.id='$x';";
if (mysqli_query($con, $sql1)) {
  echo "";
} else {
  echo "Error creating table: " . mysqli_error($con);
}
$result1 = $con->query($sql1);
foreach($result1 as $row) {
    //echo $row['product_price'];
	$result11= $row['product_price'];
}

//----------------------------------------
 $sql2 ="
SELECT products.product_price 
FROM products, basket
WHERE products.product_id=basket.p_id2 AND basket.id='$x';";
if (mysqli_query($con, $sql2)) {
  echo "";
} else {
  echo "Error creating table: " . mysqli_error($con);
}
$result2 = $con->query($sql2);
foreach($result2 as $row) {
    //echo $row['product_price'];
	$result22= $row['product_price'];
}

//--------------------------------------
$sql3 ="
SELECT products.product_price 
FROM products, basket
WHERE products.product_id=basket.p_id3 AND basket.id='$x';";

if (mysqli_query($con, $sql3)) {
  echo "";
} else {
  echo "Error creating table: " . mysqli_error($con);
}
$result3 = $con->query($sql3);
foreach($result3 as $row) {
    //echo $row['product_price'];
	$result33= $row['product_price'];
}


$y=$result11+$result22+$result33;
$a ="UPDATE basket
SET total=$y
WHERE basket.id=$x";
//$a ="INSERT INTO basket(p_id1, p_id2, p_id3) VALUES (1,2,3)";
if (mysqli_query($con, $a)) {
  echo "";
  
} else {
  echo "Error creating table: " . mysqli_error($con);
}

$x++; 

}


   // $sLimit = " order by 1 DESC LIMIT $start_from,$per_page";
  //  $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'').$sLimit;
    $get_products = "select * from basket ";
    $run_products = mysqli_query($db,$get_products);
    while($row_products=mysqli_fetch_array($run_products)){

        $id = $row_products['id'];
        //$pro_title = $row_products['product_title'];
        $total = $row_products['total'];
        //$pro_img1 = $row_products['product_img1'];
		//$pro_url= $row_products['product_URL'];
		

        echo "
            <div class='col-md-4 col-sm-6 center-responsive'>

                <div class='product'>


                    <div class='text'>

                        <h3> Gift Basket $id </h3>
                        <p class='price'>$ $total </p>
                        <p class='buttons'>
								 
                            <a class='btn btn-default' href='details2.php?id=$id'>View Details</a>
                           

                        </p>

                    </div>

                </div>

            </div>
        
        ";

    }
}
  
?>  
</body>  
</html>  






























