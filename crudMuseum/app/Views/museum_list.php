<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museum List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Museum List</h1>

        <!-- Display the success/error messages using SweetAlert -->
        <script type="text/javascript">
            let message = '<?= session("message") ?>'; // Get message from session

            if (message == '1') {
                swal({
                    title: "Success!",
                    text: "Museum added successfully!",
                    icon: "success",
                    buttons: false,
                    timer: 2000,
                });
            } else if (message == '0') {
                swal({
                    title: "Error!",
                    text: "Failed to add museum!",
                    icon: "error",
                    buttons: false,
                    timer: 2000,
                });
            } else if (message == '2') {
                swal({
                    title: "Success!",
                    text: "Museum updated successfully!",
                    icon: "success",
                    buttons: false,
                    timer: 2000,
                });
            } else if (message == '3') {
                swal({
                    title: "Error!",
                    text: "Failed to update museum!",
                    icon: "error",
                    buttons: false,
                    timer: 2000,
                });
            } else if (message == '4') {
                swal({
                    title: "Success!",
                    text: "Museum deleted successfully!",
                    icon: "success",
                    buttons: false,
                    timer: 2000,
                });
            } else if (message == '5') {
                swal({
                    title: "Error!",
                    text: "Failed to delete museum!",
                    icon: "error",
                    buttons: false,
                    timer: 2000,
                });
            }
        </script>

        <!-- Museum list table -->
        <table class="table table-bordered table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Museum Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($datos)): ?>
                    <?php foreach ($datos as $key): ?>
                        <tr>
                            <td><?= $key->id_mus ?></td> <!-- Object syntax -->
                            <td><?= $key->museum_name ?></td> <!-- Object syntax -->
                            <td>
                                <!-- Edit button -->
                                <a href="<?php echo base_url().'/getMuseum/'.$key->id_mus ?>" class="btn btn-success btn-sm">Edit</a>
                                <!-- Delete button -->
                                <form action="<?= base_url('/delete/' . $key->id_mus) ?>" method="post" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this museum?');">
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center">No museums registered.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Button to open the create museum form -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createMuseumModal">Add New Museum</button>

        <!-- Create Museum Modal -->
        <div class="modal fade" id="createMuseumModal" tabindex="-1" aria-labelledby="createMuseumModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createMuseumModalLabel">Create New Museum</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('/museums/create') ?>" method="POST">
                            <div class="mb-3">
                                <label for="museum_name" class="form-label">Museum Name</label>
                                <input type="text" class="form-control" id="museum_name" name="museum_name" required>
                            </div>
                            <button type="submit" class="btn btn-success">Create Museum</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
