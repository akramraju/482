<?php

/**
 * @param int $ordernumber
 * @param int $user_id
 * 
 * @return [type]
 */
function IMMEDONE(int $ordernumber, int $user_id)
{
    $db_host = "localhost:3307"; /* Server Name*/
    $db_user = 'root'; /* Username*/
    $db_pass = ''; /* Password*/
    $db_name = 'groceryshop'; /* Database Name*/

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn)
{
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}
$tow = "INSERT INTO DONEORDER( DONE_ORDER_NUMBER, PROVIDER_USER_ID, CUSTOMER_USER_ID ,PRODUCT, GIVEN_ORDER_DATE)
SELECT ID, PROVIDER_USER_ID, CUSTOMER_USER_ID ,PRODUCT, NOW()
FROM ORDERLIST  WHERE ORDERLIST.ID= '".$ordernumber."' AND ORDERLIST.PROVIDER_USER_ID = '".$user_id."'";


$tr = "DELETE FROM ORDERLIST WHERE ORDERLIST.ID='".$ordernumber."' AND ORDERLIST.PROVIDER_USER_ID='".$user_id."'";


if (($conn->query($tow) === TRUE) && ($conn->query($tr) === TRUE))
{
    return true;
} else 
{
    return false;
}
}
?>