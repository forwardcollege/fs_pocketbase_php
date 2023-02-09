<?php

    if ( $_SERVER["REQUEST_METHOD"] === 'POST' ) {

        header('Location: /');
        exit;
    }

    require dirname(__DIR__) . '/parts/header.php';
?>
<div class="container mx-auto my-5" style="max-width: 600px;">
    <h1 class="h1 mb-4 text-center">Add New Claim</h1>
    
    <div class="card shadow-sm">
        <div class="card-body">
        <?php require dirname(__DIR__) .  '/parts/error_box.php'; ?>
            <form 
                action="<?php echo $_SERVER["REQUEST_URI"]; ?>" 
                method="POST"
                enctype="multipart/form-data"
                >
                <div class="mb-3">
                    <label for="receipt_date" class="form-label">Receipt Date</label>
                    <input type="date" class="form-control" name="receipt_date" id="receipt_date">
                </div>
                <div class="mb-3">
                    <label for="total_amount" class="form-label">Total Amount</label>
                    <input type="number" class="form-control" name="total_amount" id="total_amount">
                </div>
                <div class="mb-3">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea class="form-control" name="notes" id="notes" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="receipt" class="form-label">Upload Receipt</label>
                    <input class="form-control" type="file" name="receipt" id="receipt">
                </div>
                <div class="d-flex justify-content-end gap-3">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-center gap-3">
        <a href="/" class="btn btn-link btn-sm">Back to Dashboard</a>
    </div>
    
</div>
<?php

    require dirname(__DIR__) . '/parts/footer.php';