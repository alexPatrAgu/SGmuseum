<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <title>Welcome</title>
</head>
<body>
  <div class="container mt-5">
    <h1>Welcome to the Admin Panel</h1>
    <p class="lead">Choose a section to manage:</p>
    <div class="mt-4">
     <a href="<?= site_url('/users') ?>" class="btn btn-primary">Users</a>

     <a href="<?= site_url(relativePath: '/museums') ?>" class="btn btn-secondary">Museums</a>
     </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
