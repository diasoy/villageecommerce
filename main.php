<?php

$queryArticle = mysqli_query($koneksi, "SELECT * FROM article ORDER BY kunjungan_article DESC LIMIT 2");

$queryMitra = mysqli_query($koneksi, "SELECT * FROM mitra ORDER BY id_mitra DESC LIMIT 4");

?>

<div class="pt-10 flex w-full justify-center items-center h-[100vh]" style="background-image: url('assets/images/main/hero.jpg')">
    <div class="mx-5">
        <div class="flex flex-col justify-center items-center gap-8">
            <h1 class="font-bold text-white text-5xl drop-shadow-lg"><span class="bg-[#4F46E5]">Welcome</span> to Village E Commerce</h1>
            <p class="text-white text-lg">The best place to find your favorite UMKM products</p>
        </div>
    </div>
</div>

<div class="lg:mx-40 lg:my-44 my-8 mx-4">
    <div class="mb-4">
        <h2 class="font-bold text-4xl text-center text-indigo-800"><span class="font-bold bg-indigo-600 text-white">Tentang</span> Kami</h2>
        <div class="flex flex-col-reverse gap-4 my-8 justify-center items-center">
            <div>
                <p class="mb-4 text-indigo-900 text-justify"><span class="font-bold bg-indigo-600 text-white">Selamat datang</span>, ini adalah sebuah platform unggulan yang didedikasikan untuk mengangkat potensi desa-desa di seluruh Indonesia. Melalui website ini, Anda dapat menjelajahi berbagai informasi tentang desa-desa, mulai dari profil dan sejarah, hingga potensi wisata dan budaya. Kami juga berkomitmen untuk mempromosikan UMKM (Usaha Mikro, Kecil, dan Menengah) yang ada di desa-desa, memberikan mereka panggung untuk tumbuh dan berkembang. Selain itu, kami menyediakan berbagai artikel inspiratif dan informatif seputar pengembangan desa dan UMKM, untuk membantu memberdayakan masyarakat dan memperkuat ekonomi lokal. Bergabunglah dengan kami dalam perjalanan ini untuk mengenal dan mendukung desa-desa kita lebih dekat.
                </p>
                <a href="<?= BASE_URL . "index.php?page=about"; ?>" class="bg-indigo-600 px-4 py-3 rounded text-white hover:bg-indigo-800 hover:duration-500 duration-500">Cari tahu lebih dalam -> </a>
            </div>
            <img src="./assets/images/main/tentang.jpg" alt="" class="w-96 rounded-xl shadow-xl">
        </div>
    </div>
</div>

<div class="lg:mx-40 lg:my-20 my-10 mx-4">
    <div class="mb-4">
        <h1 class="font-bold text-4xl text-center text-indigo-800 my-4"><span class="font-bold bg-indigo-600 text-white">Profil</span> Desa Genaharjo</h1>
        <div class="flex flex-col gap-4 justify-center items-center">
            <div class="flex flex-col gap-4">
                <img src="./assets/images/main/profil1.jpg" alt="" class="w-96 rounded-xl shadow-xl">
                <img src="./assets/images/main/profil2.jpg" alt="" class="w-96 rounded-xl shadow-xl ml-20">
            </div>
            <div class="flex flex-col">
                <h6 class="font-semibold text-xl text-indigo-700 text-center">Jelajahi Desa, Temukan Kekayaan Alam dan Manusia</h6>
                <p class="text-justify text-indigo-900">
                    Selamat datang di Genaharjo, platform digital terdepan yang berfokus pada profil desa-desa di seluruh Indonesia. Di sini, Anda dapat menemukan informasi mendalam mengenai setiap desa, termasuk sejarah, budaya, potensi wisata, serta kehidupan sehari-hari masyarakatnya. Kami juga berkomitmen untuk mempromosikan UMKM (Usaha Mikro, Kecil, dan Menengah) desa, memberikan mereka peluang untuk dikenal lebih luas dan berkembang. Selain itu, kami menyediakan berbagai artikel inspiratif dan edukatif yang dirancang khusus untuk mendukung pengembangan UMKM dan kemajuan desa. Jelajahi dan temukan kekayaan desa-desa kita di Genaharjo, dan mari bersama-sama membangun masa depan yang lebih cerah untuk seluruh masyarakat desa.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="lg:mx-40 my-4 mx-4">
    <h1 class="font-bold text-4xl text-center text-indigo-800 my-4""><span class="font-bold bg-indigo-600 text-white">Berita</span> Desa</h1>
    <p class="text-justify text-indigo-900 mb-4">Menyediakan Berita tentang Desa maupun UMKM</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <?php while ($row = mysqli_fetch_assoc($queryArticle)) : ?>
            <div class="bg-white rounded-lg shadow hover:shadow-lg hover:duration-500 overflow-hidden flex flex-col md:flex-row">
                <div class="overflow-hidden md:w-1/3">
                    <img src="<?= IMAGE_ARTICLES . $row['gambar_article'] ?>" alt="<?= $row['judul_article'] ?>" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                </div>
                <div class="p-4 flex-1">
                    <h3 class="font-bold text-lg text-indigo-600"><?= $row['judul_article'] ?></h3>
                    <p class="text-gray-700 mt-2"><?= substr($row['deskripsi_article'], 0, 200) ?>...</p>
                    <a href="<?= BASE_URL . "index.php?page=detail_article&id_article=" . $row['id_article'] ?>" class="text-indigo-600 mt-4 inline-block">Baca Selengkapnya...</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

    <div class="lg:mx-72 mx-4 my-4">
        <h1 class="font-bold text-4xl text-center text-indigo-800"><span class="font-bold bg-indigo-600 text-white">Mitra</span> Desa</h1>
        <p class="text-justify text-indigo-900 mb-4">Menyediakan Mitra Desa yang telah bekerja sama dengan kami</p>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <?php while ($row = mysqli_fetch_assoc($queryMitra)) : ?>
                <div class="bg-white h-72 rounded-lg shadow hover:shadow-lg hover:duration-500 overflow-hidden flex flex-col md:flex-row">
                    <div class="overflow-hidden md:w-1/3">
                        <img src="<?= IMAGE_MITRA . $row['gambar_mitra'] ?>" alt="<?= $row['nama_mitra'] ?>" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                    </div>
                    <div class="p-4 flex-1">
                        <h3 class="font-bold text-lg text-indigo-600"><?= $row['nama_mitra'] ?></h3>
                        <p class="text-gray-700 mt-2"><?= substr($row['deskripsi_mitra'], 0, 200) ?>...</p>
                        <a href="<?= BASE_URL . "index.php?page=detail_mitra&id_mitra=" . $row['id_mitra'] ?>" class="text-indigo-600 mt-4 inline-block">Lihat Detail...</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <div class="mx-16 my-20 flex flex-col">
        <h1 class="font-bold text-lg">Beritahukan kami sebuah saran atau kritik untuk terus membangun dan memperbaiki Desa.</h1>
        <form action="" class="flex flex-col gap-2">
            <div><label for="nama">Nama</label>
                <input type="text" placeholder="Nama" id="nama" class="w-full border rounded px-2 py-1">
            </div>
            <div><label for="email">Email</label>
                <input type="text" placeholder="Email" id="email" class="w-full border rounded px-2 py-1">
            </div>
            <div><label for="masukan" class="">Isi Pesan dan Saran</label>
                <textarea name="" id="masukan" placeholder="Pesan dan saran anda.." class="w-full border rounded px-2 py-1"></textarea>
            </div>
            <input type="submit" value="Kirim Masukan" class="bg-green-600 rounded py-2 text-white">
        </form>
    </div>