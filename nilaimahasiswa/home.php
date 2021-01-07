<?php
include 'config.php'; // mengkoneksikan file cofig ke database

// metode save
if (isset($_POST['Save'])){ //Save adalah name pada tag html input submit
    $nama= mysqli_real_escape_string($conn, $_POST['nama']); //variabel menempatkan value dalam database
    $nim= mysqli_real_escape_string($conn, $_POST['nim']); //variabel menempatkan value dalam database
    $department= mysqli_real_escape_string($conn, $_POST['department']); //variabel menempatkan value dalam database
    $score= mysqli_real_escape_string($conn, $_POST['score']); //variabel menempatkan value dalam database

    mysqli_query($conn, "INSERT INTO students_data VALUES ('','$nama','$nim','$department','$score') "); //query untuk memasukkan nilai yang sudah terbungkus dan terurut dalam variabel 
    echo "<script> window.alert('Data Telah Tersimpan')
    window.location='home.php';</script>"; //alert 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TITIK2V</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>

<div class="container">
    <div class="header">
        <ul>
            <li><div class="inilogo"></div></li>
            <li><h1 class="judul">TITIK2V</h1></li>
        </ul>
        <div class="calendar"></div></li>
        <!-- menampilkan format pewaktu WITA -->
        <div class="date">
            <?php 
            date_default_timezone_set('Asia/Ujung_Pandang');
            echo date('l, d-m-Y  h:i:s a');
            ?>
        </div>
    </div>

    <div class="conten">
        <h2>Student Grade</h2>

        <!-- bagian new data -->
        <div class="newdata">
            <h3>New Data</h3>
            <form action="" method="post">
             <table class="tablenewdata">
                <tr>
                    <td>NAME</td>
                    <td>  <input type="text" name="nama" placeholder="Nama Lengkap" required value="<?=(isset($_POST['nama']))?$_POST['nama']:'';?>" class="form-control"></td> 
                    <span class="text-danger"><?=(isset($err['nama']))?$err['nama']:'';?></span> 
                    <!-- memasukkan nama ke database & memberikan text_danger jika input type text tidak terisi -->
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>  <input type="number" name="nim" placeholder="NIM" required value="<?=(isset($_POST['nim']))?$_POST['nim']:'';?>" class="form-control"></td>
                    <span class="text-danger"><?=(isset($err['nim']))?$err['nim']:'';?></span>
                    <!-- memasukkan nim ke database & memberikan text_danger jika input type number tidak terisi -->
                </tr>
                <tr>
                    <td>DEPARTMENT</td>
                    <td>
                        <select type="text" name="department">
                            <option value="TEKNIK INFORMATIKA">TEKNIK INFORMATIKA</option>
                            <option value="TEKNOLOGI INDUSTRI">TEKNOLOGI INDUSTRI</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>FINAL SCORE</td>
                    <td><input type="number" name="score" placeholder="Score 0-100" required value="<?=(isset($_POST['score']))?$_POST['score']:'';?>" class="form-control"></td>
                    <span class="text-danger"><?=(isset($err['score']))?$err['score']:'';?></span>
                    <!-- memasukkan final score ke database & memberikan text_danger jika input type number tidak terisi -->
                </tr>
             </table>
             <input type="submit" name="Save" value="SAVE" class="save">
             <!-- input type submit yang nantinya akan mengarah ke kondisi isset POST 'Save' -->
            </form>
        </div>

        <!-- bagian students data -->
        <div class="studentsdata">
            <h3>Students Data</h3>
            <p>Average Score:</p>

            <!-- menghitung rata rata -->
                <?php
                    include "config.php";
                    $result= mysqli_query($conn, "SELECT AVG(score) AS average FROM students_data"); //query untuk menghitung rata rata
                    $row = mysqli_fetch_assoc($result);
                    $average = $row['average'];
                    echo ("$average");
                ?>

            <table class="tablestudentsdata">
                <!-- header tabel students data -->
                    <tr class="segmen">
                        <td>NO</td>
                        <td>NAME</td>
                        <td>NIM</td>
                        <td>DEPARTMENT</td>
                        <td>SCORE</td>
                        <td>STATUS</td>
                        <td>OPTIONS</td>
                    </tr>
                <!-- mencetak isi dalam database ke dalam tabel -->
                <?php
                    include "config.php";
                    $no=1;
                    $ambildata =mysqli_query($conn,"SELECT * FROM students_data"); // query untuk menampilkan semua isi pada tabel students_data
                    //melakukan perulangan dalam menampilkan semua data per baris dan kolom (tr-td)
                    while ($tampil = mysqli_fetch_array($ambildata)){ //Fungsi ini akan menangkap data dari hasil perintah query dan membentuknya ke dalam array asosiatif dan array numerik
                        echo "
                        <tr>
                            <td>$no</td>
                            <td>$tampil[nama]</td>
                            <td>$tampil[nim]</td>
                            <td>$tampil[department]</td>
                            <td>$tampil[score]</td>
                            <td>L/R</td>
                        ";
                ?>
                        <div class="hapus">
                <?php    
                        echo"
                            <td>        
                                <a href='?kode=$tampil[kode]'>HAPUS</a>
                            </td>
                        ";
                ?>
                        </div>
                <?php
                        echo "
                        </tr>";
                        $no++;
                    }
                ?>
            </table>
            
            <?php
                // Metode Menghapus
                if(isset($_GET['kode'])){
                    mysqli_query($conn, "DELETE FROM students_data WHERE kode='$_GET[kode]'");
                    echo "<script> window.alert('data telah Terhapus')
                    window.location='home.php';</script>";
                }

                // Status Remidal dan LULUS     score >= 75 --> lulus, score < 75 --> remidial

                // $statusdata = mysqli_query($conn, "SELECT score FROM students_data");
                // $status = mysqli_fetch_array($statusdata);
                // if()
            ?>
        </div>
        
    </div>    
    <!-- footer -->
        <div class="footer">
            <p class="copy">Copyright 2020, TITIK2V UAS</p>
        </div>
</div>
    
</body>
</html>