<?php
$randval=  mt_rand(9999999, 99999999);
str_pad($randval, 8, '0', STR_PAD_LEFT);
echo $randval;
?>

<?php
$servername = "127.0.0.1";
$username = "root";
$password = "temp123!";
$dbname = "apptasking";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
        die("Connection failed:" . $conn->connect_error);
}
$sql= "select * from apptask where id is null order by rand() limit 1";
if ($result=mysqli_query($conn,$sql))
{
	// Fetch one and one row
	while ($row=mysqli_fetch_row($result))
	{
$sql= "update apptask set id = $randval where taskid =" . $row[3];

		
	}
	// Free result set
	mysqli_free_result($result);
}


if ($conn->query($sql) === TRUE) 

?>

