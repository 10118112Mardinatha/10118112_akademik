<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $nim = $_POST['nim'];

    $nama_mhs=$_POST['nama_mhs'];
    $jenis_kelamin=$_POST['jenis_kelamin'];
    $alamat=$_POST['alamat'];
	$program_studi=$_POST['program_studi'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE mahasiswa SET nama_mhs='$nama_mhs',jenis_kelamin='$jenis_kelamin',alamat='$alamat' WHERE nim=$nim");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$nim= $_GET['nim'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM mahasiswa WHERE nim=$nim");

while($user_data = mysqli_fetch_array($result))
{
    $nim = $user_data['nim'];
    $nama_mhs = $user_data['nama_mhs'];
    $jenis_kelamin = $user_data['jenis_kelamin'];
	$alamat = $user_data['alamat'];
    $program_studi = $user_data['program_studi'];

}
?>
<html>
<head>  
    <title>Edit User Data</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br/><br/>

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>NIM</td>
                <td><input type="text" name="nim" value=<?php echo $nim;?>></td>
            </tr>
            <tr> 
                <td>Nama Mahasiswa</td>
                <td><input type="text" name="nama_mhs" value=<?php echo $nama_mhs;?>></td>
            </tr>
            <tr> 
                <td>Jenis Kelamin</td>
                <td><input type="text" name="jenis_kelamin" value=<?php echo $jenis_kelamin;?>></td>
            </tr>
			<tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
            </tr>
            <tr> 
                <td>Program Studi</td>
                <td><input type="text" name="program_studi" value=<?php echo $program_studi;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="nim" value=<?php echo $_GET['nim'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>