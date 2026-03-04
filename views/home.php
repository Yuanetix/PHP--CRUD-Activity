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
  <title>Music List</title>
</head>
<body>
  <?php
    include __DIR__ . "/../services/use-cases/GetAllMusicUseCase.php";
  ?>
  <main>
    <div class="container">
      <header>
        <div class="d-flex align-items-center justify-content-between mt-5">
          <h1 class="fs-3 fw-bold"><i class="fa-solid fa-music me-2"></i>My Music List</h1>
          <a href="create_music.php" class="btn btn-primary">Add Song <i class="fa-solid fa-plus"></i></a>
        </div>
      </header>

      <?php if (isset($_GET["success"])): ?>
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
          Action completed successfully!
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      <?php endif; ?>

      <?php if (isset($_GET["error"])): ?>
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
          Something went wrong. Please try again.
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      <?php endif; ?>

      <table class="table table-striped table-bordered mt-4">
        <thead>
          <tr>
            <th>Title</th>
            <th>Artist</th>
            <th>Status</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($songs)): ?>
            <tr>
              <td colspan="4" class="text-center">No songs in your list yet...</td>
            </tr>
          <?php else: ?>
            <?php foreach ($songs as $song): ?>
              <tr>
                <td class="align-middle">
                  <?= htmlspecialchars($song["title"]) ?>
                </td>
                <td class="align-middle">
                  <?= htmlspecialchars($song["artist"]) ?>
                </td>
                <td class="align-middle">
                  <?php if ($song["is_listened"]): ?>
                    <span class="badge rounded-pill text-bg-success">Listened</span>
                  <?php else: ?>
                    <span class="badge rounded-pill text-bg-warning text-dark">Not Listened</span>
                  <?php endif; ?>
                </td>
                <td class="text-center align-middle">
                  <div class="d-flex align-items-center justify-content-center gap-3">

                    <!-- Toggle listened status -->
                    <form action="../services/use-cases/UpdateMusicUseCase.php" method="POST">
                      <input type="hidden" name="id" value="<?= $song["id"] ?>">
                      <button type="submit"
                        class="btn btn-sm <?= $song["is_listened"] ? 'btn-outline-secondary' : 'btn-outline-success' ?>"
                        title="Toggle Status">
                        <i class="fa-solid <?= $song["is_listened"] ? 'fa-rotate-left' : 'fa-headphones' ?>"></i>
                      </button>
                    </form>

                    <!-- Delete -->
                    <form action="../services/use-cases/DeleteMusicUseCase.php" method="POST"
                          onsubmit="return confirm('Are you sure you want to remove this song?')">
                      <input type="hidden" name="id" value="<?= $song["id"] ?>">
                      <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                        <i class="fa-solid fa-trash"></i>
                      </button>
                    </form>

                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
