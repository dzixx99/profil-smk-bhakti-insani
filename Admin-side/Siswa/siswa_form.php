<?php
include("../../koneksi.php");
if (isset($_GET['kd_siswa'])) {
    $title = "Edit";
    $url ='editsiswa.php';
    $id = mysqli_real_escape_string($conn, $_GET['kd_siswa']); // Escape string
    $sql = "SELECT * FROM siswa WHERE kd_siswa = '$id'"; // Tambah tanda kutip
    $query = mysqli_query($conn, $sql);
    if (!$query) {
        die("Query gagal: " . mysqli_error($conn));
    }
    $siswa = mysqli_fetch_assoc($query);
    if (mysqli_num_rows($query) < 1) {
        die("data tidak ditemukan ....");
    }
} else {
    $title = "Tambah Data";
    $url = 'add_siswa.php';
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include "../../php/head.php"; ?>
<style>
    /* Reset basic styles */
    * { 
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f4f9;
        padding: 20px;
        color: #333;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    /* Header Styles */
    header {
        text-align: center;
        margin-bottom: 20px;
    }

    header h3 {
        font-size: 28px;
        color: #007BFF;
        text-align: center;
        margin-bottom: 10px;
    }

    /* Form Styles */
    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        width: 100%;
    }

    fieldset {
        border: none;
    }

    legend h2 {
        font-size: 22px;
        color: #007BFF;
        margin-bottom: 10px;
        text-align: center;
        /* Center the form title */
    }

    div {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        color: #555;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
        background-color: #f9f9f9;
        transition: border-color 0.3s ease-in-out;
    }

    input[type="text"]:focus,
    textarea:focus {
        border-color: #007BFF;
        outline: none;
    }

    textarea {
        resize: vertical;
    }

    input[type="radio"] {
        margin-right: 5px;
    }

    input[type="submit"] {
        background-color: #007BFF;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease-in-out;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    hr {
        margin: 20px 0;
        border: 0;
        border-top: 1px solid #ddd;
    }

    @media screen and (max-width: 600px) {
        form {
            padding: 15px;
        }

        input[type="text"],
        textarea {
            font-size: 12px;
        }

        input[type="submit"] {
            font-size: 14px;
        }
    }
</style>

<body>
    <form action="<?= $url ?>" method="POST">
        <fieldset>
            <legend>
                <h2><?= $title ?> Siswa</h2>
            </legend>
            <div>
                <label for="kd_siswa">Kode siswa :</label>
                <input type="text" name="kd_siswa" value="<?php if (isset($_GET['kd_siswa'])) {
                                                            echo $siswa['kd_siswa'];
                                                        } ?>" required />
            </div>

            <div>
                <label for="nis">NIS :</label>
                <input type="text" name="nis" value="<?php if (isset($_GET['kd_siswa'])) {
                                                            echo $siswa['NIS'];
                                                        } ?>" />
            </div>
            <div>
                <label for="nama_siswa">Nama Lengkap :</label>
                <input type="text" name="nama_siswa" cols="30" rows="4" value="<?php if (isset($_GET['kd_siswa'])) {
                                                                        echo $siswa['nama_siswa'];
                                                                    } ?>" />
            </div>
            <div>
                <label for="sw_tmp_lahir">Tempat lahir :</label>
                <input type="text" name="sw_tmp_lahir" value="<?php if (isset($_GET['kd_siswa'])) {
                                                                echo $siswa['sw_tmp_lahir'];
                                                            } ?>"  />
            </div>
            <div>
                <label for="sw_tgl_lahir">Tanggal lahir :</label>
                <input for="sw_tgl_lahir" type="date" name="sw_tgl_lahir" value="<?php if (isset($_GET['kd_siswa'])) {
                                                                                        echo $siswa['sw_tgl_lahir'];
                                                                                    } ?>"  />
            </div>
            <div>
                <label for="jenis_kelamin">Jenkel :</label>
                <?php if (isset($_GET['kd_siswa'])) {
                    $jk = $siswa['jenkel'];
                } ?>
                <input name="jenis_kelamin" type="radio" value="laki-laki" <?php if (isset($jk) && $jk == 'laki-laki') {
                                                                                echo 'checked';
                                                                            } ?> > Laki-laki
                <input name="jenis_kelamin" type="radio" value="Perempuan" <?php if (isset($jk) && $jk == 'Perempuan') {
                                                                                echo 'checked';
                                                                            } ?> > Perempuan
            </div>
            <div>
                <label for="alamat">Alamat :</label>
                <input type="text" name="alamat" value="<?php if (isset($_GET['kd_siswa'])) {
                                                            echo $siswa['sw_alamat'];
                                                        } ?>"  />
            </div>
            <div>
                <label for="foto">Foto : </label>
                <input type="file" name="foto" accept="image/png, image/jpeg, image/jpg">
                <button type="submit" name="submit">Upload</button>
            </div>
            <hr>
            <div>
                <input type="submit" name="simpan" value="Simpan" />
            </div>
        </fieldset>
    </form>
</body>

</html>