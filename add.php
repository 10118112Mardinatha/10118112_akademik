<html>
<head>
    <title>Add Users</title>
</head>

<body>
    <a href="index.php">Go to Home</a>
    <br/><br/>

    <form action="add.php" method="post" name="form1">
        <table width="30%" border="0">
            <tr> 
                <td>NIM</td>
                <td><input type="text" name="nim"></td>
            </tr>
			 <tr> 
                <td>Nama Mahasiswa</td>
                <td><input type="text" name="nama_mhs"></td>
            </tr>
            <tr> 
                <td>Jenis Kelamin</td>
                <td><input type="text" name="jenis_kelamin"></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
			<tr> 
                <td>Program Studi</td>
                <td><input type="text" name="program_studi"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nim = $_POST['nim'];
        $nama_mhs = $_POST['nama_mhs'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
		$alamat = $_POST['alamat'];
        $program_studi = $_POST['program_studi'];


        // include database connection file
        include_once("config.php");

        // Insert user data into table
       
		$result = mysqli_query($mysqli, "INSERT INTO mahasiswa(nim,nama_mhs,jenis_kelamin,alamat,program_studi) VALUES('$nim','$nama_mhs','$jenis_kelamin','$alamat','$program_studi')");
 
		
        // Show message when user added
        echo "User added successfully. <a href='index.php'>View Users</a>";
    }
    ?>
</body>
</html>