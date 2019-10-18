<?php

    function get_colum_display(string $table_name)
    {
        if($table_name=="products")
		{
			return ["productCode","productName","buyPrice","quantityInStock","productVendor"];
		}
		else if($table_name=="customers")
		{
			return ["customerNumber","customerName","phone","salesRepEmployeeNumber","creditLimit"];
		}
		else if($table_name=="orders")
		{
			return ["orderNumber","customerNumber","orderDate","comments","status"];
		}
		else if($table_name=="employees")
		{
			return ["employeeNumber","firstName","lastName","officeCode","jobTitle"];
		}
		return Null;
    }

	function display_catelog()
	{
		include "mysql_control.php";
		
		echo 	"<ul class=\"ul-menu-list\">
				<li class=\"li-menu-list\"><a class=\"main-catelog\" href=\"#home\">Catelog</a></li>
				<li class=\"li-menu-list\"><a class=\"sub-catelog\" href=\"#news\">Product Vendor</a></li>";

		$result = array_unique($database->select("products", "productVendor"));
		foreach($result as $data)
		{
			echo "<li class='li-menu-list'><a href='1.php?category=products&productvendor=$data'>$data</a></li>";
		}
		
		echo "<li class=\"li-menu-list\"><a class=\"sub-catelog\" href=\"#news\">Product Scale</a></li>";

		$result = array_unique($database->select("products", "productScale"));
		foreach($result as $data)
		{
			echo "<li class='li-menu-list'><a href='1.php?category=products&pro::ductscale=$data'>$data</a></li>";
		}
				
		echo "</ul>";
	}
?>