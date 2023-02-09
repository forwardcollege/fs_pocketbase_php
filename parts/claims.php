<?php

    $claims = [];

?>
<div class="text-end pb-2">
    <a href="/addnew" class="btn btn-primary btn-sm">
        <i class="bi bi-plus"></i>
        Add New
    </a>
</div>
<div class="card shadow-sm">
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th scope="col">Submission Date</th>
                <th scope="col">Status</th>
                <th scope="col">Receipt Date</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Notes</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ( count( $claims ) === 0 ) : ?>
                <tr>
                    <td colspan="6" class="text-center">No claims found.</td>
                </tr>
            <?php endif; ?>
            <?php foreach ( $claims as $claim ) : ?>
                <tr>
                    <td><?php echo $claim["created"]; ?></td>
                    <td><?php echo ( $claim["approved"] ? '<span class="badge bg-success">Approved</span>' : '<span class="badge bg-warning">Pending</span>' ); ?></td>
                    <td><?php echo $claim["receipt_date"]; ?></td>
                    <td>MYR <?php echo $claim["total_amount"]; ?></td>
                    <td><?php echo $claim["notes"]; ?></td>
                    <td>
                        <a href="<?php echo POCKETBASE_URL . 'api/files/'.$claim['collectionId'].'/'.$claim['id'].'/'.$claim['receipt']; ?>" target="_blank" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></a>
                        <button href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-claim-<?php echo $claim['id']; ?>"><i class="bi bi-trash"></i></button>
                        <div class="modal fade" id="delete-claim-<?php echo $claim['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Claim</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-start">
                                        Are you sure you want to delete this claim (ID: <?php echo $claim['id']; ?>)?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                                            <input type="hidden" name="claim_id" value="<?php echo $claim['id']; ?>">
                                            <input type="hidden" name="action" value="delete">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="mt-4 d-flex justify-content-center gap-3">
    <a href="/logout" class="btn btn-link btn-sm">Logout</a>
</div>