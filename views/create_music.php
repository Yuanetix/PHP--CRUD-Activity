<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Song</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      border: none;
      border-radius: 12px;
    }
    .form-control {
      border-radius: 8px;
    }
    .btn {
      border-radius: 8px;
    }
  </style>
</head>

<body>
  <div class="container min-vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow-sm p-4" style="width: 400px;">
      
      <h4 class="text-center mb-4">Add Song</h4>

      <?php if (isset($_GET["error"]) && $_GET["error"] === "empty_fields"): ?>
        <div class="alert alert-danger py-2 small">
          Title and Artist cannot be empty.
        </div>
      <?php endif; ?>

      <form action="../services/use-cases/CreateMusicUseCase.php" method="POST">
        
        <div class="mb-3">
          <input type="text" 
                 name="title" 
                 class="form-control" 
                 placeholder="Song title" 
                 required>
        </div>

        <div class="mb-3">
          <input type="text" 
                 name="artist" 
                 class="form-control" 
                 placeholder="Artist name" 
                 required>
        </div>

        <div class="d-flex justify-content-between">
          <a href="home.php" class="btn btn-light">
            Back
          </a>

          <button type="submit" class="btn btn-dark">
            Add
          </button>
        </div>

      </form>
    </div>
  </div>
</body>
</html>