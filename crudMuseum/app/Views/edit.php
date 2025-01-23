<?php
  // Accediendo a los valores directamente desde $datos sin necesidad de [0]
  $iduser = $datos['id_user']; // $datos ya contiene el primer usuario
  $username = $datos['username'];
  $email = $datos['email'];
  $password = $datos['password'];
  $role = $datos['role']; // Agregando el campo role
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Edit User</title>
  </head>
  <body>
    <div class="container mt-5">
        <h1>Edit User</h1>
          <form method="POST" action="<?php echo base_url('/update/' . $iduser); ?>">
            <!-- Campo oculto para el id del usuario -->
            <input type="hidden" id="iduser" name="iduser" value="<?php echo $iduser; ?>">

            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="username" id="username" value="<?php echo $username; ?>" required>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>" required>
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Enter new password if you want to change it">
            </div>

            <div class="form-group">
              <label for="role">Role</label>
              <input type="text" class="form-control" name="role" id="role" value="<?php echo $role; ?>" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Update User</button>
            <a href="<?php echo base_url('/'); ?>" class="btn btn-secondary">Cancel</a>
          </form>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7Yd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
