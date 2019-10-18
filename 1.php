<?php
include "display_table_rule.php";
include "mysql_control.php";
include "login_control.php";
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

ck_login();

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
            <li class="li-menu-bar" style="float:right"><a class="active" href="logout.php">logout</a></li>
        </ul>
		<div class="row" style="margin:0px">
			<div class="column-left-body">
				<?php display_catelog(); ?>
			</div>
			<div class="column-center-body">
				<table class="table table-hover" style="background-image: url('image/bg_table.png')">
            <tr>
                <?php
					if(!empty($_GET['productvendor']))
					{
						$product_vendor = $_GET['productvendor'];
						$result = $database->select($tablename,$display_colum,["productVendor"=>$product_vendor]);	
					}
					else if(!empty($_GET['productscale']))
					{
						$product_scale = $_GET['productscale'];
						$result = $database->select($tablename,$display_colum,["productScale"=>$product_scale]);	
					}
					else
					{
						$result = $database->select($tablename,$display_colum);	
					}
					
					foreach($display_colum as $colum)
					{
							echo "<th>";
							echo $colum;
							echo "</th>";
                    }
                ?>
            </tr>
				<?php
					foreach($result as $row)
					{
						if($tablename=="products")
						{
							echo "<tr onclick=\"window.location='2.php?productCode=$row[productCode]'\">";
						}
						else if($tablename=="employees")
						{
							echo "<tr onclick=\"window.location='3.php?employeenumber=$row[employeeNumber]'\">";
						}
						else
						{
							echo "<tr>";
						}
						
						foreach($display_colum as $colum)
						{
							echo "<td> $row[$colum] </td>";
						}
						echo "</tr>";
					}
				?>
        </table>
			</div>
		</div>
    </body>
</html>