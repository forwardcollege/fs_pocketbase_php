<?php

    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
        // redirect to dashboard
        header('Location: /');
        exit;
    }

    require dirname(__DIR__) .  '/parts/header.php';
?>
<!-- login form -->
<div class="card rounded shadow-sm mx-auto mt-5" style="max-width: 500px;">
    <div class="card-body">
        <h5 class="card-title text-center mb-3 py-3 border-bottom">Login To Your Account</h5>
        <?php require dirname(__DIR__) .  '/parts/error_box.php'; ?>
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-fu">Login</button>
            </div>
        </form>
    </div>
</div>

<!-- Go back link -->
<div class="d-flex justify-content-between align-items-center gap-3 mx-auto pt-3" style="max-width: 500px;">
    <a href="/" class="text-decoration-none small"><i class="bi bi-arrow-left-circle"></i> Go back</a>
    <a href="/signup" class="text-decoration-none small">Don't have an account? Sign up here <i class="bi bi-arrow-right-circle"></i></a>
</div>
<?php

    require dirname(__DIR__) .  '/parts/footer.php';