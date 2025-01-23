<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>CRUD - User Management</title>
  </head>
  <body>
    <div class="container mt-5">
        <h1>User Management</h1>
        <div class="row">
            <div class="col-sm-12">
                <!-- Form to create a new user -->
                <form method="POST" action="<?php echo base_url('/create'); ?>">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" class="form-control" name="role" id="role" placeholder="Enter role" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create User</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <h3>User List</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($datos)): ?>
                            <?php foreach ($datos as $key): ?>
                                <tr>
                                    <td><?php echo $key->id_user; ?></td>
                                    <td><?php echo $key->username; ?></td>
                                    <td><?php echo $key->email; ?></td>
                                    <td><?php echo $key->role; ?></td>
                                    <td>
                                        <a href="<?php echo base_url().'/getUser/'.$key->id_user?>" class="btn btn-success btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('/delete/' . $key->id_user); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">No users registered</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
    let mensaje = '<?php echo session("message") ?>'; // Obtenemos el mensaje desde la sesión

    if (mensaje == '1') {
        swal({
            title: "Success!",
            text: "Record added successfully!",
            icon: "success",
            buttons: false,
            timer: 2000,
        });
    } else if (mensaje == '0') {
        swal({
            title: "Error!",
            text: "Record could not be added!",
            icon: "error",
            buttons: false,
            timer: 2000,
        });
    } else if (mensaje == '2') {
        swal({
            title: "Success!",
            text: "Record updated successfully!",
            icon: "success",
            buttons: false,
            timer: 2000,
        });
    } else if (mensaje == '3') {
        swal({
            title: "Error!",
            text: "Record could not be updated!",
            icon: "error",
            buttons: false,
            timer: 2000,
        });
    } else if (mensaje == '4') {
        swal({
            title: "Success!",
            text: "Record deleted successfully!", // Mensaje de éxito al eliminar
            icon: "success",
            buttons: false,
            timer: 2000,
        });
    } else if (mensaje == '5') {
        swal({
            title: "Error!",
            text: "Record could not be deleted!", // Mensaje de error al eliminar
            icon: "error",
            buttons: false,
            timer: 2000,
        });
    }
</script>



    
    

  </body>
</html>
