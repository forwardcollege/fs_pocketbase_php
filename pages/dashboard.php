<?php

    require dirname(__DIR__) . '/parts/header.php';
?>
<div class="container mx-auto my-5" style="max-width: 900px;">
    <h1 class="h1 mb-4 text-center">My Claims</h1>
    
    <?php if ( isset( $_SESSION["user"] ) ) : ?>
        <?php require dirname(__DIR__) . '/parts/claims.php'; ?>
    <?php else : ?>
    <div class="card shadow-sm">
        <div class="container">
            <div class="row g-2">
                <div class="col">
                    <div class="text-center py-5">
                        <h4 class="h4">Login to view your claims</h4>
                        <a href="/login" class="btn btn-primary btn-sm">Login</a>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center py-5">
                        <h4 class="h4 text-center">Sign up to create a new account</h4>
                        <a href="/signup" class="btn btn-primary btn-sm">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php

    require dirname(__DIR__) . '/parts/footer.php';