<?php
include "display_table_rule.php";
include "mysql_control.php";

if(empty($_GET['productCode']))
{
	echo "Not GET productCode!!!";
	exit();
}

$productCode = $_GET['productCode'];

$tablename = "products";

$result = mysqli_query($con,"SELECT * FROM $tablename WHERE productCode='$productCode'");
$num_rows = mysqli_num_rows($result);
if($num_rows==0)
{
	echo "Not Found Product Code $productCode";
	exit();
}

$data = mysqli_fetch_row($result);
$product_name = $data[1];
$product_code = $data[0];
$product_buyPrice = $data[7];
$product_MSRP = $data[8];
$product_scale = $data[3];
$product_quantity = $data[6];
$product_description = $data[5];
$product_vendor = $data[4];

?>
<html>
    <head>
        <title>2</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/main.css"> <!--import css file-->
    </head>
    <body class="bg-image">
        <div class="row">
            <div class="column-left"><img src="image\logo.png" class="login-logo-image"></div>
            <div class="column-center"><h1>Company name</h1></div>
            <div class="column-right">
                Employee code<br>
                Employee name<br>
                Department of "Admin"
            </div>
        </div>
        <ul class="ul-menu-bar">
            <li class="li-menu-bar"><a href="1.php?category=products">products</a></li>
            <li class="li-menu-bar"><a href="1.php?category=orders">orders</a></li>
            <li class="li-menu-bar"><a href="1.php?category=customers">customers</a></li>
            <li class="li-menu-bar"><a href="1.php?category=employees">employees</a></li>
            <li class="li-menu-bar" style="float:right"><a class="active" href="#about">logout</a></li>
        </ul>
		<div class="row" style="margin:0px">
			<div class="column-left-body">
				<ul class="ul-menu-list">
					<li class="li-menu-list"><a class="main-catelog" href="#home">Catelog</a></li>
					<li class="li-menu-list"><a class="sub-catelog" href="#news">Product Vendor</a></li>
					<?php
						$result = mysqli_query($con,"SELECT DISTINCT productVendor FROM `products`");
						while($data = mysqli_fetch_row($result))
						{
							echo "<li class='li-menu-list'><a href='1.php?category=products&productvendor=$data[0]'>$data[0]</a></li>";
						}
					?>
					<li class="li-menu-list"><a class="sub-catelog" href="#news">Product Scale</a></li>
					<?php
						$result = mysqli_query($con,"SELECT DISTINCT productScale FROM `products`");
						while($data = mysqli_fetch_row($result))
						{
							echo "<li class='li-menu-list'><a href='1.php?category=products&productscale=$data[0]'>$data[0]</a></li>";
						}
					?>
				</ul>
			</div>
			<div class="column-center-body">
				<table class="document">
                <tr>
                    <td align="center" style="padding: 10px"><h3>Name:<?php echo $product_name ?></h3></td>
                </tr>
                <tr>
                    <td align="center" style="padding: 10px" rowspan="5"><img onerror="this.src='./image/default_image.png'" src="./image/product.jpg" ></td>
                    <td><h5>Code:<?php echo $product_code ?></h5></td>
                </tr>
                <tr>
                    <td><h5>Buyprice:<?php echo $product_buyPrice ?></h5></td>
                </tr>
                <tr>
                    <td><h5>MSRP:<?php echo $product_MSRP ?></h5></td>
                </tr>
                <tr>
                    <td><h5>scale:<?php echo $product_scale ?></h5></td>
                </tr>
                <tr>
                    <td><h5>Quantity:<?php echo $product_quantity ?></h5></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 30px"><h3>Discription:</h3><p><?php echo $product_description ?></p></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 30px"><h3>Initail Discription:</h3><p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                        Optio aspernatur dignissimos eum quasi accusantium fuga sapiente nesciunt iure. 
                        Quis eaque minus nostrum explicabo neque veritatis? Voluptatem soluta maiores deserunt iure?</p></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 30px"><h3>Vender:</h3><?php echo $product_vendor ?></td>
                </tr>
        </table>
			</div>
		</div>
    </body>
</html>