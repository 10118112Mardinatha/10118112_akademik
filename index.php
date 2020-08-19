<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM mahasiswa ORDER BY nim DESC");
?>

<html>
<head>    
    <title>Homepage</title>
</head>

<body>
<a href="add.php">Add New User</a><br/><br/>

    <table width='80%' border=1>

    <tr>
        <th>NIM</th> <th>Nama Mahasiswa</th> <th>Jenis Kelamin</th> <th>Alamat</th><th>Program Studi</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['nim']."</td>";
        echo "<td>".$user_data['nama_mhs']."</td>";
        echo "<td>".$user_data['jenis_kelamin']."</td>"; 
		echo "<td>".$user_data['alamat']."</td>";
		echo "<td>".$user_data['program_studi']."</td>";
        echo "<td><a href='edit.php?nim=$user_data[nim]'>Edit</a> | <a href='delete.php?nim=$user_data[nim]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>