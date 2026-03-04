<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <title>Add Song</title>
</head>
<body>
  <main>
    <div class="container min-vh-100 d-flex flex-column align-items-center justify-content-center">
      <h1 class="text-center mb-4"><i class="fa-solid fa-music me-2"></i>Add Song</h1>

      <?php if (isset($_GET["error"]) && $_GET["error"] === "empty_fields"): ?>
        <div class="alert alert-danger w-50" role="alert">
          Title and Artist cannot be empty. Please fill in all fields.
        </div>
      <?php endif; ?>

      <form action="../services/use-cases/CreateMusicUseCase.php" method="POST" class="w-50">
        <div class="mb-3">
          <label for="title" class="form-label">Song Title</label>
          <input type="text" name="title" id="title" class="form-control" placeholder="Enter song title..." required>
        </div>
        <div class="mb-3">
          <label for="artist" class="form-label">Artist</label>
          <input type="text" name="artist" id="artist" class="form-control" placeholder="Enter artist name..." required>
        </div>
        <div class="d-flex align-items-center justify-content-end gap-3">
          <a class="btn btn-outline-secondary" href="home.php">
            <i class="fa-solid fa-arrow-left"></i> Back
          </a>
          <button type="submit" class="btn btn-primary">
            Add Song <i class="fa-solid fa-plus"></i>
          </button>
        </div>
      </form>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
