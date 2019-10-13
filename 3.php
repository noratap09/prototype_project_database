<?php
include "display_table_rule.php";
include "mysql_control.php";

if(empty($_GET['employeenumber']))
{
	echo "Not GET employeenumber!!!";
	exit();
}

$employeenumber = $_GET['employeenumber'];

$tablename = "employees AS E,offices AS O";

$sql_query = "SELECT E.employeeNumber,E.firstName,E.lastName,E.extension,E.email,E.jobTitle,E.officeCode,O.	addressLine1,O.	addressLine2,O.state,O.city,O.country,O.postalCode,O.phone,O.territory 
			  FROM $tablename 
			  WHERE E.employeeNumber='$employeenumber' AND E.officeCode = O.officeCode";

$result = mysqli_query($con,$sql_query);
$num_rows = mysqli_num_rows($result);
if($num_rows==0)
{
	echo "Not Found Employee Number $employeenumber";
	exit();
}

$data = mysqli_fetch_row($result);
$employee_number = $data[0];
$employee_fname = $data[1];
$employee_lname = $data[2];
$employee_extension = $data[3];
$employee_email = $data[4];
$employee_jobtitle = $data[5];
$employee_office_code = $data[6];
$employee_add1 = $data[7];
$employee_add2 = $data[8];
$employee_state = $data[9];
$employee_city = $data[10];
$employee_country = $data[11];
$employee_postal_code = $data[12];
$employee_phone = $data[13];
$employee_territory = $data[14];

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
				<table class="document" cellpadding="10">
			<tr>
				<td width="50%" align="right"><b>Employee ID:</b></td>
				<td width="50%" align="left"><?php echo $employee_number ?></td>
			</tr>
			<tr>
				<td width="50%" align="right"><b>First Name:</b></td>
				<td width="50%" align="left"><?php echo $employee_fname ?></td>
			</tr>
			<tr>
				<td width="50%" align="right"><b>Last Name:</b></td>
				<td width="50%" align="left"><?php echo $employee_lname ?></td>
			</tr>
			<tr>
				<td width="50%" align="right"><b>Extension:</b></td>
				<td width="50%" align="left"><?php echo $employee_extension ?></td>
			</tr>
			<tr>
				<td width="50%" align="right"><b>Email:</b></td>
				<td width="50%" align="left"><?php echo $employee_email ?></td>
			</tr>
			<tr>
				<td width="50%" align="right"><b>JobTitle:</b></td>
				<td width="50%" align="left"><?php echo $employee_jobtitle ?></td>
			</tr>
			<tr>
				<td width="50%" align="right"><b>Office Code:</b></td>
				<td width="50%" align="left"><?php echo $employee_office_code ?></td>
			</tr>
			<tr>
				<td width="50%" align="right"><b>Address1:</b></td>
				<td width="50%" align="left"><?php echo $employee_add1?></td>
			</tr>
			<tr>
				<td width="50%" align="right"><b>Address2:</b></td>
				<td width="50%" align="left"><?php echo $employee_add2 ?></td>
			</tr>
			<tr>
				<td width="50%" align="right"><b>State:</b></td>
				<td width="50%" align="left"><?php echo $employee_state ?></td>
			</tr>
			<tr>
				<td width="50%" align="right"><b>City:</b></td>
				<td width="50%" align="left"><?php echo $employee_city ?></td>
			</tr>
			<tr>
				<td width="50%" align="right"><b>Country:</b></td>
				<td width="50%" align="left"><?php echo $employee_country ?></td>
			</tr>
			<tr>
				<td width="50%" align="right"><b>Postal Code:</b></td>
				<td width="50%" align="left"><?php echo $employee_postal_code ?></td>
			</tr>
			<tr>
				<td width="50%" align="right"><b>Phone No:</b></td>
				<td width="50%" align="left"><?php echo $employee_phone ?></td>
			</tr>
			<tr>
				<td width="50%" align="right"><b>Territory:</b></td>
				<td width="50%" align="left"><?php echo $employee_territory ?></td>
			</tr>
        </table>
			</div>
		</div>
    </body>
</html>
