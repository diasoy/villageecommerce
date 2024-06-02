<?php
$queryArticle = mysqli_query($koneksi, "SELECT * FROM article ORDER BY kunjungan_article DESC LIMIT 4");
$queryMitra = mysqli_query($koneksi, "SELECT * FROM mitra ORDER BY id_mitra DESC LIMIT 4");
$status = isset($_GET['status']) ? $_GET['status'] : '';
?>

<!-- Hero -->
<div class="pt-10 flex w-full justify-center items-center h-[100vh]" style="background-image: url('assets/images/main/hero.jpg')">
    <div class="mx-5">
        <div class="flex flex-col justify-center items-center gap-8">
            <h1 class="font-bold text-center text-white text-5xl drop-shadow-lg"><span class="bg-[#4F46E5]">Welcome</span> to Village E Commerce</h1>
            <p class="text-lg font-semibold text-white drop-shadow-2xl text-center md:mx-12 lg:mx-20 xl:mx-44">Platform unggulan yang didedikasikan untuk mengangkat potensi desa-desa di seluruh Indonesia. Melalui website ini, Anda dapat menjelajahi berbagai informasi tentang desa-desa, mulai dari profil dan sejarah, hingga potensi wisata dan budaya. Kami juga berkomitmen untuk mempromosikan UMKM (Usaha Mikro, Kecil, dan Menengah) yang ada di desa-desa, memberikan mereka panggung untuk tumbuh dan berkembang. Selain itu, kami menyediakan berbagai artikel inspiratif dan informatif seputar pengembangan desa dan UMKM, untuk membantu memberdayakan masyarakat dan memperkuat ekonomi lokal. Bergabunglah dengan kami dalam perjalanan ini untuk mengenal dan mendukung desa-desa kita lebih dekat.</p>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Tentang Kami -->
<div class="lg:mx-20 xl:mx-40 md:mx-12 lg:my-40 my-8 mx-4">
    <div class="mb-4">
        <h2 class="font-bold text-4xl text-center text-indigo-800"><span class="font-bold bg-indigo-600 text-white">Tentang</span> Kami</h2>
        <div class="flex lg:flex-row flex-col-reverse gap-4 my-8 justify-center items-center lg:gap-20">
            <p class="mb-4 text-indigo-900 text-justify lg:text-lg"><span class="font-bold bg-indigo-600 text-white">Selamat datang</span>, ini adalah sebuah platform unggulan yang didedikasikan untuk mengangkat potensi desa-desa di seluruh Indonesia. Melalui website ini, Anda dapat menjelajahi berbagai informasi tentang desa-desa, mulai dari profil dan sejarah, hingga potensi wisata dan budaya. Kami juga berkomitmen untuk mempromosikan UMKM (Usaha Mikro, Kecil, dan Menengah) yang ada di desa-desa, memberikan mereka panggung untuk tumbuh dan berkembang. Selain itu, kami menyediakan berbagai artikel inspiratif dan informatif seputar pengembangan desa dan UMKM, untuk membantu memberdayakan masyarakat dan memperkuat ekonomi lokal. Bergabunglah dengan kami dalam perjalanan ini untuk mengenal dan mendukung desa-desa kita lebih dekat.
            </p>
            <img src="./assets/images/main/tentang.jpg" alt="" class="w-96 rounded-xl shadow-xl">
        </div>
    </div>
</div>
<!-- Tentang Kami End -->

<!-- Profil Desa -->
<div class="2xl:mx-32 lg:mx-20 lg:my-40 my-8 mx-4">
    <div class="mb-4">
        <h1 class="font-bold text-4xl text-center text-indigo-800 my-10"><span class="font-bold bg-indigo-600 text-white">Profil</span> Desa Genaharjo</h1>
        <div class="flex xl:flex-row flex-col gap-4 justify-center items-center">
            <div class="flex flex-col xl:w-1/2 gap-4">
                <img src="./assets/images/main/profil1.jpg" alt="" class="w-96 rounded-xl shadow-xl">
                <img src="./assets/images/main/profil2.jpg" alt="" class="w-96 rounded-xl shadow-xl ml-10 lg:ml-20">
            </div>
            <div class="flex flex-col xl:w-1/2 lg:gap-10">
                <h6 class="font-semibold text-xl text-indigo-700 text-center">Jelajahi Desa, Temukan Kekayaan Alam dan Manusia</h6>
                <p class="text-justify text-indigo-900 lg:text-lg">
                    Selamat datang di Genaharjo, platform digital terdepan yang berfokus pada profil desa-desa di seluruh Indonesia. Di sini, Anda dapat menemukan informasi mendalam mengenai setiap desa, termasuk sejarah, budaya, potensi wisata, serta kehidupan sehari-hari masyarakatnya. Kami juga berkomitmen untuk mempromosikan UMKM (Usaha Mikro, Kecil, dan Menengah) desa, memberikan mereka peluang untuk dikenal lebih luas dan berkembang. Selain itu, kami menyediakan berbagai artikel inspiratif dan edukatif yang dirancang khusus untuk mendukung pengembangan UMKM dan kemajuan desa. Jelajahi dan temukan kekayaan desa-desa kita di Genaharjo, dan mari bersama-sama membangun masa depan yang lebih cerah untuk seluruh masyarakat desa.
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Profil Desa -->

<!-- Berita Desa -->
<div class="lg:mx-40 my-10 lg:my-20 mx-4">
    <h1 class="font-bold text-4xl text-center text-indigo-800 my-4"><span class="font-bold bg-indigo-600 text-white">Berita</span> Desa</h1>
    <p class="text-center text-indigo-700 mb-4">Menyediakan Berita tentang Desa maupun UMKM yang paling populer...</p>
    <div class="grid gap-4 mx-8 md:mx-12 lg:mx-28 xl:mx-52 2xl:mx-60">
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
</div>
<!-- Berita Desa End -->

<!-- Mitra Desa -->
<div class="lg:mx-40 my-10 lg:my-20 mx-4">
    <h1 class="font-bold text-4xl text-center text-indigo-800"><span class="font-bold bg-indigo-600 text-white">Mitra</span> Desa</h1>
    <p class="text-center text-indigo-900 mb-4">Menyediakan Mitra Desa yang telah bekerja sama dengan kami...</p>
    <div class="grid gap-4 mx-8 md:mx-12 lg:mx-28 xl:mx-52 2xl:mx-60">
        <?php while ($row = mysqli_fetch_assoc($queryMitra)) : ?>
            <div class="max-h-96 md:max-h-52 bg-white rounded-lg shadow hover:shadow-lg hover:duration-500 overflow-hidden flex flex-col md:flex-row">
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
<!-- Mitra Desa End -->

<div class="mx-16 md:mx-32 lg:mx-52 xl:mx-72 2xl:mx-96 my-20 flex flex-col pb-52">
    <h1 class="font-bold text-2xl text-center text-indigo-800">Beritahukan kami sebuah saran atau kritik untuk terus membangun dan memperbaiki Desa.</h1>
    <form action="<?= BASE_URL . "proses_masukan.php" ?>" method="POST" class="flex flex-col gap-2">
        <div>
            <label for="nama">Nama</label>
            <input type="text" placeholder="Nama" id="nama" name="nama_masukan" class="w-full border rounded px-2 py-1">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" placeholder="Email" id="email" name="email_masukan" class="w-full border rounded px-2 py-1">
        </div>
        <div>
            <label for="jenis_masukan">Jenis Keperluan</label>
            <select name="jenis_masukan" id="jenis_masukan" class="w-full border rounded px-2 py-1">
                <option value="Kritik / Saran">Kritik / Saran</option>
                <option value="Konsultasi">Konsultasi</option>
                <option value="Pertanyaan">Pertanyaan</option>
            </select>
        </div>
        <div>
            <label for="masukan" class="">Isi Pesan dan Saran</label>
            <textarea name="pesan_masukan" id="masukan" cols="30" rows="10" class="w-full border rounded px-2 py-1"></textarea>
        </div>
        <button type="submit" class="bg-indigo-600 text-white py-2 rounded">Kirim</button>
    </form>
</div>


<script>
    <?php if ($status === 'success') : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Masukan Anda telah berhasil dikirim!',
            confirmButtonColor: '#4F46E5'
        }).then(() => {
            window.history.replaceState(null, null, window.location.pathname);
        });
    <?php elseif ($status === 'error') : ?>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Terjadi kesalahan saat mengirim masukan. Silakan coba lagi.',
            confirmButtonColor: '#4F46E5'
        }).then(() => {
            window.history.replaceState(null, null, window.location.pathname);
        });
    <?php endif; ?>
</script>