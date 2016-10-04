<?php
$srchsql= $_POST["searchval"];

$servername = "127.0.0.1";
$username = "root";
$password = "temp123!";
$dbname = "apptasking";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
        die("Connection failed:" . $conn->connect_error);}
$sql= "select apptask.description, images.file from apptask join images on apptask.taskid=images.taskid where id=" . $_POST["searchval"];

if ($result=mysqli_query($conn,$sql))
{

while ($row = $result->fetch_row()) {
      echo '<A HREF="uploads/' . $row[1] . '">upload</A><br />';
echo $row[0];

$udesc= $row[0];
    }
$sql= "select taskid from apptask where id= $srchsql";
$imgupdate= $row[0];
echo $row[0];
    $result->close();
    }


  ?>

<form action="update.php" method="post" enctype="multipart/form-data" >
<input type="text" name="descupdate" value="<?php echo($udesc); ?>" />
<tr><td> <input type="hidden" name="type" value="<?= $srchsql ?>" ></td></tr>
<tr><td> <input type="hidden" name="taskid" value="<?= $$imgupdate ?>" ></td></tr>

<input type="file" name="fileToUpload" id="fileToUpload">
<input type="submit">
</form>

                       
<input type="button" value="Home" class="homebutton" id="btnHome" 
onClick="document.location.href='rvhome.php'" /> 

