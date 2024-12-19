<?php

require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

//tombol cari di klik
if (isset($_POST["btnSearch"])) {
    $mahasiswa = search($_POST["keyword"]);
}


$i = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <footer class="w-full top-0 left-0 py-4 z-10 sticky border-b bg-slate-100">
        <div class="container mx-auto">
            <div class="flex items-center">
                <h1 class="text-2xl font-bold">Belajar<span class="text-green-500">CRUD</span></h1>
                <nav class="font-medium ml-12">
                    <ul class="flex gap-10">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="crud.php">CRUD</a></li>
                        <!-- <li><a href="tambah.php">Tambah</a></li> -->
                    </ul>
                </nav>
            </div>
        </div>
    </footer>
    <section class="pt-20">
        <div class="container">
            <div class="flex gap-2 justify-between">
                <a href="create.php" class="px-6 py-2 text-white bg-hijau font-medium rounded-lg shadow-lg bg-green-500 hover:bg-green-600">
                    <i class="fa-solid fa-plus"></i>
                    <span class="ml-21">Tambah Data</span>
                </a>
                <form action="" method="post">
                    <div class="flex gap-2 items-center">
                        <div class="relative">
                            <input type="text" name="keyword" class="px-6 py-2 border-2 border-blue-200 pl-9 rounded-lg font-medium focus:outline-none focus:border-blue-500" placeholder="Search . ." autocomplete="off">
                            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-300"></i>
                        </div>
                        <button type="submit" name="btnSearch" class="py-2 px-3 bg-blue-500 text-white inline rounded-lg hover:bg-blue-800">Cari</button>
                    </div>
                </form>
            </div>

            <div class="pt-6">
                <table class="w-full border-2 ">
                    <thead>
                        <tr class="border-b bg-slate-200">
                            <th class="border-l p-3 text-sm font-semibold tracking-wider text-left">No</th>
                            <th class="border-l p-3 text-sm font-semibold tracking-wider text-left">NRP</th>
                            <th class="border-l p-3 text-sm font-semibold tracking-wider text-left">Nama</th>
                            <th class="border-l p-3 text-sm font-semibold tracking-wider text-left">Email</th>
                            <th class="border-l p-3 text-sm font-semibold tracking-wider text-left">Jurusan</th>
                            <th class="border-l p-3 text-sm font-semibold tracking-wider text-left">Gambar</th>
                            <th class="border-l p-3 text-sm font-semibold tracking-wider text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mahasiswa as $mhs) : ?>
                            <tr class="border-b odd:bg-white even:bg-slate-50">
                                <td class=" border-l p-2 text-left"><?= $i++; ?></td>
                                <td class=" border-l p-2 text-left"><?= $mhs["nrp"]; ?></td>
                                <td class=" border-l p-2 text-left"><?= $mhs["nama"]; ?></td>
                                <td class=" border-l p-2 text-left"><?= $mhs["email"]; ?></td>
                                <td td class=" border-l p-2 text-left"><?= $mhs["jurusan"]; ?></td>
                                <td class=" border-l p-2 text-left"><img src="img/<?= $mhs["gambar"]; ?>" width="50px"></td>
                                <td class=" border-l">
                                    <div class="flex justify-center gap-2">
                                        <!-- hapus -->
                                        <a href="delete.php?id=<?= $mhs["id"]; ?>" class="p-2 rounded-md bg-red-500 hover:bg-red-600 shadow-lg flex items-center justify-center ">
                                            <i class="fa-solid fa-trash-can text-white"></i>
                                        </a>
                                        <!-- update -->
                                        <a href="update.php?id=<?= $mhs["id"]; ?>" class="p-2 rounded-md bg-green-500 hover:bg-green-600 shadow-lg flex items-center justify-center">
                                            <i class="fa-solid fa-pen-to-square text-white"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</body>

</html>