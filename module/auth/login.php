<?php
require_once __DIR__ . '/../../class/db.php';
if (isset($_SESSION['login'])) {
    header("Location: " . BASE_URL . "artikel/home");
    exit;
}
require_once __DIR__ . '/../../class/form.php';

$pengguna = [
    "rina@gmail.com" => ["nama" => "Rina Wulandari", "password" => "rina567", "role" => "User"],
    "agus@gmail.com" => ["nama" => "Agus Pranoto",   "password" => "agus567", "role" => "User"],
    "cell@gmail.com" => ["nama" => "Celine Marlina", "password" => "cell567", "role" => "Admin"]
];

$error = "";
if ($_POST) {
    $email = $_POST['username'] ?? '';
    $pass  = $_POST['password'] ?? '';

    if (isset($pengguna[$email]) && $pengguna[$email]['password'] === $pass) {
        $_SESSION['login'] = true;
        $_SESSION['nama']  = $pengguna[$email]['nama'];
        $_SESSION['role']  = $pengguna[$email]['role'];
        header("Location: " . BASE_URL . "artikel/home");
        exit;
    } else {
        $error = "Email atau password salah!";
    }
}
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-body p-5">
                    <h2 class="text-center mb-4">Login Inventori Gajah</h2>
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>

                    <?php
                    $form = new Form("", "Login Sekarang");
                    $form->addField("username", "Email", "email");
                    $form->addField("password", "Password", "password");
                    $form->displayForm();
                    ?>

                    <div class="mt-3 p-3 bg-light rounded small">
                        <strong>Demo:</strong><br>
                        agus@gmail.com / agus567<br>
                        cell@gmail.com / cell567 (Admin)
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>