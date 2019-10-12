<?php
include "display_table_rule.php";
include "mysql_control.php";

$category = $_GET['category'];

$tablename = $category;
$display_colum = get_colum_display($tablename);

if($display_colum==null)
{
	echo "Not Found Table $tablename !!!";
	exit();
}

$result = mysqli_query($con,"SELECT $display_colum FROM $tablename");

?>
<html>
    <head>
        <title>1</title>
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
                Department of ""
            </div>
        </div>
        <ul>
            <li><a href="1.php?category=products">products</a></li>
            <li><a href="1.php?category=orders">orders</a></li>
            <li><a href="1.php?category=customers">customers</a></li>
            <li><a href="1.php?category=employees">employees</a></li>
            <li style="float:right"><a class="active" href="#about">logout</a></li>
        </ul>

        <table class="table table-hover" style="background-image: url('image/bg_table.png')">
            <tr>
                <?php
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
						echo "<tr>";
						for($i = 0;$i < $fieldcount;$i++)
						{
							echo "<td> $data[$i] </td>";
						}
						echo "</tr>";
					}
				?>
        </table>

    </body>
</html>