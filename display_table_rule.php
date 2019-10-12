<?php

    function get_colum_display(string $table_name)
    {
        if($table_name=="products")
		{
			return "productCode,productName,buyPrice,quantityInStock,productVendor";
		}
		else if($table_name=="customers")
		{
			return "customerNumber,customerName,phone,salesRepEmployeeNumber,creditLimit";
		}
		else if($table_name=="orders")
		{
			return "orderNumber,customerNumber,orderDate,comments,status";
		}
		else if($table_name=="employees")
		{
			return "employeeNumber,firstName,lastName,officeCode,jobTitle";
		}
		return Null;
    }	
?>