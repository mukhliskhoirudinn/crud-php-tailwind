<?php

require 'functions.php';

//ambil id di url untuk ubah
$id = $_GET["id"];
//query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id=$id ")[0];


// cek apakah tombol submit sudah di tekan apa belom
if (isset($_POST["submit"])) {
    //kasih pemberitahuan saat data masuk atau tidak, biar tau apapun
    if (update($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diubah');
                document.location.href = 'crud.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah');
                document.location.href = 'crud.php';
            </script>
        ";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="css/output.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <footer class="w-full top-0 left-0 py-4 z-10 sticky  bg-slate-100 border-b">
        <div class="container">
            <div class="flex items-center">
                <h1 class="text-2xl font-bold">Belajar<span class="text-green-500">CRUD</span></h1>
                <nav class="font-medium ml-12">
                    <ul class="flex gap-10">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="crud.php">CRUD</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </footer>

    <section class="pt-6">
        <div class="container">
            <div class="w-full md:w-1/2 mx-auto">
                <form action="" method="post" class="px-6 py-4 bg-white border rounded-lg shadow-lg">
                    <div>
                        <h1 class="text-3xl text-center font-semibold">Ubah Data Mahasiswa</h1>
                    </div>
                    <div>
                        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
                    </div>
                    <div class="mt-2">
                        <label for="nrp" class="font-semibold">NRP</label>
                        <input type="number" name="nrp" id="nrp" value="<?= $mhs["nrp"]; ?>" class="w-full rounded-md p-2 focus:outline-none border border-slate-300 mt-1" required>
                    </div>
                    <div class="mt-2">
                        <label for="nama" class="font-semibold">Nama</label>
                        <input type="text" name="nama" id="nama" value="<?= $mhs["nama"]; ?>" class="w-full rounded-md p-2 focus:outline-none border border-slate-300 mt-1" required>
                    </div>
                    <div class="mt-2">
                        <label for="email" class="font-semibold">Email</label>
                        <input type="email" name="email" id="email" value="<?= $mhs["email"]; ?>" class="w-full rounded-md p-2 focus:outline-none border border-slate-300 mt-1" required>
                    </div>
                    <div class="mt-2">
                        <label for="jurusan" class="font-semibold">Jurusan</label>
                        <input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"]; ?>" class="w-full rounded-md p-2 focus:outline-none border border-slate-300 mt-1" required>
                    </div>
                    <div class="mt-2">
                        <label for="gambar" class="font-semibold">Gambar</label>
                        <input type="file" name="gambar" id="gambar" value="<?= $mhs["gambar"]; ?>" accept="image/*" class="block w-full rounded-md p-3 focus:outline-none border border-slate-300 mt-1 file:border-none file:rounded-xl file:mr-4 file:py-2 file:px-4
                        file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" required>
                    </div>
                    <div class="mt-4">
                        <button type="submit" name="submit" class="w-full px-6 bg-blue-500 text-white rounded-md py-3 font-semibold hover:bg-blue-600 focus:outline-none" required>Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>