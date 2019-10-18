<?php
include "display_table_rule.php";
include "mysql_control.php";
include "login_control.php";

if(empty($_GET['employeenumber']))
{
	echo "Not GET employeenumber!!!";
	exit();
}

$employeenumber = $_GET['employeenumber'];

$result = $database->select("employees",
							["[><]offices"=>["officeCode"=>"officeCode"]],
								["employees.employeeNumber",
								 "employees.firstName",
								 "employees.lastName",
								 "employees.extension",
								 "employees.email",
								 "employees.jobTitle",
								 "employees.officeCode",
								 "offices.addressLine1",
								 "offices.addressLine2",
								 "offices.state",
								 "offices.city",
								 "offices.country",
								 "offices.postalCode",
								 "offices.phone",
								 "offices.territory"]
							,["employees.employeeNumber"=>$employeenumber]);	

if(empty($result))
{
	echo "Not Found Employee Number $employeenumber";
	exit();
}

$employee_number = $result[0]["employeeNumber"];
$employee_fname = $result[0]["firstName"];
$employee_lname = $result[0]["lastName"];
$employee_extension = $result[0]["extension"];
$employee_email = $result[0]["email"];
$employee_jobtitle = $result[0]["jobTitle"];
$employee_office_code = $result[0]["officeCode"];
$employee_add1 = $result[0]["addressLine1"];
$employee_add2 = $result[0]["addressLine2"];
$employee_state = $result[0]["state"];
$employee_city = $result[0]["city"];
$employee_country = $result[0]["country"];
$employee_postal_code = $result[0]["postalCode"];
$employee_phone = $result[0]["phone"];
$employee_territory = $result[0]["territory"];

ck_login();

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
            <li class="li-menu-bar" style="float:right"><a class="active" href="logout.php">logout</a></li>
        </ul>
		<div class="row" style="margin:0px">
			<div class="column-left-body">
				<?php display_catelog(); ?>
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