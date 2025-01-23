<?php
// Accediendo a los valores directamente desde $datos
$id_mus = $datos['id_mus'];  // Aquí ya tenemos $datos
$museum_name = $datos['museum_name'];
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Edit Museum</title>
</head>
<body>
<div class="container mt-5">
    <h1>Edit Museum</h1>
    <form method="POST" action="<?php echo base_url('/update/' . $id_mus); ?>">
        <!-- Campo oculto para el id del museo -->
        <input type="hidden" id="idmus" name="idmus" value="<?php echo $id_mus; ?>">

        <div class="form-group">
            <label for="museum_name">Museum Name</label>
            <input type="text" class="form-control" name="museum_name" id="museum_name" value="<?php echo $museum_name; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
