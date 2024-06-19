<?php

if ($id_user) {
    header("Location: " . BASE_URL);
}
?>

<div class="py-52 sm:mx-auto sm:w-full sm:max-w-sm ">
    <form action="<?php echo BASE_URL . "proses_login.php"; ?>" method="POST" class="bg-white flex max-w-[720px] mx-auto justify-center items-center flex-col rounded-xl shadow-xl">
        <h1 class="text-center text-indigo-900 text-xl py-10 font-bold">Login to your account</h1>
        <div class="flex justify-center flex-col gap-6">
            <div class="flex flex-col gap-2 items-start">
                <label class="block text-indigo-900 text-sm font-bold">Email address</label>
                <input type="text" name="email_user" class="rounded ring-indigo-600 ring-1 px-4 py-1" />
            </div>

            <div class="flex flex-col gap-2 items-start">
                <label class="block text-indigo-900 text-sm font-bold">Password</label>
                <input type="password" name="password_user" class="rounded ring-indigo-600 ring-1 px-4 py-1" />
            </div>
            <button class="text-center bg-indigo-600 py-1 rounded text-white font-semibold mb-10" type="submit">Login</button>
        </div>
    </form>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('notif') && urlParams.get('notif') === 'true') {
            Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                text: 'Email or password is incorrect. Please try again.',
            });
        }
    });
</script>