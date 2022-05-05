<?php
//include("includes/header.php");
include ("cart.php");

    //$sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'').$sLimit;
	if(isset($_GET['id'])){
	$ID = $_GET['id'];
	
	
	  $sql1 ="
SELECT products.product_id
FROM products, basket
WHERE products.product_id=basket.p_id1 AND basket.id='$ID';";
if (mysqli_query($con, $sql1)) {
  echo "";
} else {
  echo "Error creating table: " . mysqli_error($con);
}
$result1 = $con->query($sql1);
foreach($result1 as $row) {
    //echo $row['product_price'];
	$result11= $row['product_id'];
}

//----------------------------------------
 $sql2 ="
SELECT products.product_id
FROM products, basket
WHERE products.product_id=basket.p_id2 AND basket.id='$ID';";
if (mysqli_query($con, $sql2)) {
  echo "";
} else {
  echo "Error creating table: " . mysqli_error($con);
}
$result2 = $con->query($sql2);
foreach($result2 as $row) {
    //echo $row['product_price'];
	$result22= $row['product_id'];
}

//--------------------------------------
$sql3 ="
SELECT products.product_id
FROM products, basket
WHERE products.product_id=basket.p_id3 AND basket.id='$ID';";

if (mysqli_query($con, $sql3)) {
  echo "";
} else {
  echo "Error creating table: " . mysqli_error($con);
}
$result3 = $con->query($sql3);
foreach($result3 as $row) {
    //echo $row['product_price'];
	$result33= $row['product_id'];
}

	
    $get_products = "SELECT * from products WHERE product_id='$result11'";
    $run_products = mysqli_query($db,$get_products);
    while($row_products=mysqli_fetch_array($run_products)){

        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $pro_img1 = $row_products['product_img1'];
		$pro_url= $row_products['product_URL'];
		

        echo "
        
            <div class='col-md-4 col-sm-6 center-responsive'>

                <div class='product'>

                    <a href='details.php?pro_id=$pro_id'>
                        <img class='img-responsive' src='admin_area/product_images/$pro_img1'>

                    </a>

                    <div class='text'>

                        <h3> $pro_title </h3>
						<h6> URL:$pro_url </h6>
                        <p class='price'>$ $pro_price </p>
                        <p class='buttons'>

                            <a class='btn btn-default' href='details.php?pro_id=$pro_id'>View Details</a>
                           

                        </p>

                    </div>

                </div>

            </div>
        
        ";

    }
	 $get_products = "SELECT * from products WHERE product_id='$result22'";
    $run_products = mysqli_query($db,$get_products);
    while($row_products=mysqli_fetch_array($run_products)){

        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $pro_img1 = $row_products['product_img1'];
		$pro_url= $row_products['product_URL'];
		

        echo "
        
            <div class='col-md-4 col-sm-6 center-responsive'>

                <div class='product'>

                    <a href='details.php?pro_id=$pro_id'>
                        <img class='img-responsive' src='admin_area/product_images/$pro_img1'>

                    </a>

                    <div class='text'>

                        <h3> $pro_title </h3>
						<h6> URL:$pro_url </h6>
                        <p class='price'>$ $pro_price </p>
                        <p class='buttons'>

                            <a class='btn btn-default' href='details.php?pro_id=$pro_id'>View Details</a>
                           

                        </p>

                    </div>

                </div>

            </div>
        
        ";

    }
	
	 $get_products = "SELECT * from products WHERE product_id='$result33'";
    $run_products = mysqli_query($db,$get_products);
    while($row_products=mysqli_fetch_array($run_products)){

        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $pro_img1 = $row_products['product_img1'];
		$pro_url= $row_products['product_URL'];
		

        echo "
        
            <div class='col-md-4 col-sm-6 center-responsive'>

                <div class='product'>

                    <a href='details.php?pro_id=$pro_id'>
                        <img class='img-responsive' src='admin_area/product_images/$pro_img1'>

                    </a>

                    <div class='text'>

                        <h3> $pro_title </h3>
						<h6> URL:$pro_url </h6>
                        <p class='price'>$ $pro_price </p>
                        <p class='buttons'>

                            <a class='btn btn-default' href='details.php?pro_id=$pro_id'>View Details</a>
                           

                        </p>

                    </div>

                </div>

            </div>
        
        ";

    }
	
	}
	?>