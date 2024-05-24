<?php
ob_start();
session_start();
include_once("function/database.php");
include_once('function/helper.php');

$page = isset($_GET['page']) ? $_GET['page'] : false;

$id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
$nama = isset($_SESSION['nama_user']) ? $_SESSION['nama_user'] : false;
$level = isset($_SESSION['level_user']) ? $_SESSION['level_user'] : false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vicom</title>
    <link rel="icon" href="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/output.css">
    <style>
        * {

            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                font-family: 'Montserrat', sans-serif;
            }

            p,
            span,
            div {
                font-family: 'Inter', sans-serif;
            }
        }
    </style>

</head>

<body>
    <nav class="fixed w-full z-50 bg-white shadow">
        <div class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="<?php echo BASE_URL . "index.php?page=main"; ?>" class="-m-1.5 p-1.5 flex items-center gap-x-4">
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Logo">
                    <span class="font-bold">Village E Commerce</span>
                </a>
            </div>
            <div class="flex lg:hidden">
                <button id="open-menu-button" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <svg class="lg:hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-6">
                <a href="<?php echo BASE_URL . "index.php?page=main"; ?>" class="text-sm font-semibold leading-6 text-gray-900 px-3 py-1 hover:bg-[#4F46E5] hover:text-white hover:rounded hover:duration-500">Home</a>
                <a href="<?php echo BASE_URL . "index.php?page=article"; ?>" class="text-sm font-semibold leading-6 text-gray-900 px-3 py-1 hover:bg-[#4F46E5] hover:text-white hover:rounded hover:duration-500">Article</a>
                <a href="<?php echo BASE_URL . "index.php?page=documentation"; ?>" class="text-sm font-semibold leading-6 text-gray-900 px-3 py-1 hover:bg-[#4F46E5] hover:text-white hover:rounded hover:duration-500">Documentation</a>
                <a href="<?php echo BASE_URL . "index.php?page=directory"; ?>" class="text-sm font-semibold leading-6 text-gray-900 px-3 py-1 hover:bg-[#4F46E5] hover:text-white hover:rounded hover:duration-500">Directory UMKM</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 items-start lg:justify-end">
                <?php if ($id_user) { ?>
                    <div class="flex gap-x-4">
                        <p class="text-sm font-semibold leading-6 text-gray-900">Selamat datang, <b><?php echo $nama; ?></b></p>
                        <a href="<?php echo BASE_URL . "index.php?page=my_profile&module=mitra&action=list"; ?>" class="text-sm font-semibold leading-6 text-gray-900">Kontrol</a>
                    </div>
                <?php } else { ?>
                    <div class="flex gap-4 justify-center items-center">
                        <a href="<?php echo BASE_URL . "index.php?page=register"; ?>" class="text-sm font-semibold leading-6 text-gray-900">Register</a>
                        <a href="<?php echo BASE_URL . "index.php?page=login"; ?>" class="text-sm font-semibold leading-6 bg-[#4F46E5] text-white px-4 py-1 rounded ">Login</a>
                    </div>
                <?php } ?>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu open state. -->
        <div id="mobile-menu" class="hidden lg:hidden" role="dialog" aria-modal="true">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0 z-10"></div>
            <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    <a href="<?php echo BASE_URL . "index.php?page=main"; ?>" class="-m-1.5 p-1.5 flex items-center gap-x-4">
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Logo">
                        <span class="font-bold">Village E Commerce</span>
                    </a>
                    <button id="close-menu-button" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <a href="<?php echo BASE_URL . "index.php?page=main"; ?>" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Home</a>
                            <a href="<?php echo BASE_URL . "index.php?page=article"; ?>" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Article</a>
                            <a href="<?php echo BASE_URL . "index.php?page=documentation"; ?>" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Documentation</a>
                            <a href="<?php echo BASE_URL . "index.php?page=directory"; ?>" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Directory UMKM</a>
                        </div>
                        <div class="py-6">
                            <?php if ($id_user) { ?>
                                <div class="space-y-2 py-6">
                                    <p class="text-base font-semibold leading-7 text-gray-900">Selamat datang, <b><?php echo $nama; ?></b></p>
                                    <a href="<?php echo BASE_URL . "index.php?page=my_profile&module=mitra&action=list"; ?>" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Kontrol</a>
                                </div>
                            <?php } else { ?>
                                <a href="<?php echo BASE_URL . "index.php?page=login"; ?>" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log in</a>
                                <a href="<?php echo BASE_URL . "index.php?page=register"; ?>" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Register</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div id="content">
        <?php
        $filename = "$page.php";
        if (file_exists($filename)) {
            include_once($filename);
        } else {
            include_once("main.php");
        }
        ?>
    </div>

    <script>
        document.getElementById('open-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.remove('hidden');
        });

        document.getElementById('close-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.add('hidden');
        });
    </script>
</body>

</html>
<?php
