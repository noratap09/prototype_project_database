<?php
include "display_table_rule.php";
include "mysql_control.php";

if(empty($_GET['category']))
{
	echo "Not GET Category !!!";
	exit();
}

$category = $_GET['category'];

$tablename = $category;
$display_colum = get_colum_display($tablename);

if($display_colum==null)
{
	echo "Not Found Table $tablename !!!";
	exit();
}
?>
<html>
    <head>
        <title>1</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/main.css"> <!--import css file-->
    </head>
    <body class="bg-image">
        <div class="row" style="margin:0px">
            <div class="column-left"><img src="image\logo.png" class="login-logo-image"></div>
            <div class="column-center"><h1>Company name</h1></div>
            <div class="column-right">
                Employee code<br>
                Employee name<br>
                Department of ""
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
				<table class="table table-hover" style="background-image: url('image/bg_table.png')">
            <tr>
                <?php
					$query = "SELECT $display_colum FROM $tablename WHERE";
				
					if(!empty($_GET['productvendor']))
					{
						$product_vendor = $_GET['productvendor'];
						$query .= " productVendor = '$product_vendor' ";
					}
					else if(!empty($_GET['productscale']))
					{
						$product_scale = $_GET['productscale'];
						$query .= " productScale = '$product_scale' ";
					}
					else
					{
						$query = substr($query,0,strlen($query)-5);
					}
					$result = mysqli_query($con,$query);
                    
					while($field = mysqli_fetch_field($result))
                    {
							echo "<th>";
							echo $field->name;
							echo "</th>";
                    }
                ?>
            </tr>
				<?php
					$fieldcount=mysqli_num_fields($result);
					
					while($data = mysqli_fetch_row($result))
					{
						if($tablename=="products")
						{
							echo "<tr onclick=\"window.location='2.php?productCode=$data[0]'\">";
						}
						else if($tablename=="employees")
						{
							echo "<tr onclick=\"window.location='3.php?employeenumber=$data[0]'\">";
						}
						else
						{
							echo "<tr>";
						}
						
						for($i = 0;$i < $fieldcount;$i++)
						{
							echo "<td> $data[$i] </td>";
						}
						echo "</tr>";
					}
				?>
        </table>
			</div>
		</div>
    </body>
</html>