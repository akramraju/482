<?php
$db_host = "localhost:3307"; /* Server Name*/
$db_user = 'root'; /* Username*/
$db_pass = ''; /* Password*/
$db_name = 'groceryshop'; /* Database Name*/

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) 
{
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}
session_start();
if ( isset( $_SESSION['USER_VALUE'] ) ) 
{
    //echo("USER_ID present\n");
	$user_id = $_SESSION['USER_VALUE'];
	//echo $USER_ID;
}

$sql = "(SELECT A.ID, A.USERTYPE, A.FIRSTNAME, A.LASTNAME, A.USERNAME, A.EMAIL, A.GENDER, A.CONTACT , A.LOCATION, A.GROCERYNAME , A.NIDNUMBER, A.TIME_FOR_GIVING_ORDER, A.TIME_OF_REG 
		FROM ADMINVIEW AS A )";
	
$query = mysqli_query($conn, $sql);


if (!$query) 
{
	die ('SQL Error: ' . mysqli_error($conn));
}

?>


<html>
<head>
	<title>DISPLAYING PROVIDER INFORMATION</title>
	<link rel = "stylesheet" type="text/css" href = "styleTable.css">
	
</head>

<body bgcolor = "#E9F3F8">
<h1>Table 1</h1>
	<table class = "data-table">
		<caption class = "title">MY INFO </caption
		<thead>
			<tr>
			    <th>No</th>
				<th>ID</th>
				<th>USERTYPE</th>
				<th>First name</th>
				<th>Last name</th>
				<th>User name</th>
				<th>Gender</th>
				<th>Email</th>
				<th>NID</th>
				<th>Contact</th>
				<th>Location</th>
				<th>Grocery Name</th>
				<th>Appointment time</th>
				<th>REGISTRATION REQ TIME</th>
				
				
				
			</tr>
		</thead>
		<tbody>
		<?php
		$no = 1;
		$total = 0;
		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['ID'].'</td>
					<td>'.$row['USERTYPE'].'</td>
					<td>'.$row['FIRSTNAME'].'</td>
					<td>'.$row['LASTNAME'].'</td>
					<td>'.$row['USERNAME'].'</td>
					<td>'.$row['GENDER'].'</td>
					<td>'.$row['EMAIL'].'</td>
					<td>'.$row['NIDNUMBER'].'</td>
					<td>'.$row['CONTACT'].'</td>
					<td>'.$row['LOCATION'].'</td>
					<td>'.$row['GROCERYNAME'].'</td>
					<td>'.$row['TIME_FOR_GIVING_ORDER'].'</td>
					<td>'.$row['TIME_OF_REG'].'</td>
					
					
					
				</tr>';
			$no++;
		}
		?>
		</tbody>
	</table>
		
</body>
</html>