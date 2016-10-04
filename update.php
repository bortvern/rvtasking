<?php
$target_dir = "/var/www/html/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
   if($check !== false) {
       echo "File is an image - " . $check["mime"] . ".";
       $uploadOk = 1;
   } else {
       echo "File is not an image.";
       $uploadOk = 0;
   }
}
// Check if file already exists
if (file_exists($target_file)) {
   echo "Sorry, file already exists.";
   $uploadOk = 0;
}
// Check file size

if ($_FILES["fileToUpload"]["size"] > 50000000) {
   echo "Sorry, your file is too large.";
   $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
   $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
   echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
   } else {
       echo "Sorry, there was an error uploading your file.";
   }
}
?>
<?php
// define variables and set to empty values
$desc = "";



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
$updated= $_POST["descupdate"];
$updateid= $_POST["type"];
$taskid= $_POST["taskid"];
echo $updateid;
echo $updated;
$servername = "127.0.0.1";
$username = "root";
$password = "temp123!";
$dbname = "apptasking";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
        die("Connection failed:" . $conn->connect_error);}

$sql= "update apptask set description ='$updated' where id =$updateid";
if ($result=mysqli_query($conn,$sql))
{ echo $updated;}
$sql = "insert into images (taskid, file) values ('$taskid','" . $_FILES["fileToUpload"]["name"] . "')";

if ($conn->query($sql) === TRUE)
 echo "update successful";


?>
<input type="button" value="Home" class="homebutton" id="btnHome"
onClick="document.location.href='rvhome.php'" />

