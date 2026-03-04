<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Music List</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
    }

    .card {
      border: none;
      border-radius: 12px;
    }

    .table th {
      font-weight: 500;
      font-size: 14px;
      color: #6c757d;
      border-bottom: 1px solid #e9ecef;
    }

    .table td {
      vertical-align: middle;
      border-color: #f1f3f5;
    }

    .btn-minimal {
      border: 1px solid #dee2e6;
      background: white;
      font-size: 13px;
      padding: 4px 10px;
      border-radius: 6px;
    }

    .btn-minimal:hover {
      background: #f1f3f5;
    }
  </style>
</head>

<body>

<?php include __DIR__ . "/../services/use-cases/GetAllMusicUseCase.php"; ?>

<div class="container py-5">
  <div class="card shadow-sm p-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h4 class="mb-0">My Music List</h4>
      <a href="create_music.php" class="btn btn-dark btn-sm">
        Add Song
      </a>
    </div>

    <!-- Alerts -->
    <?php if (isset($_GET["success"])): ?>
      <div class="alert alert-light border small">
        Action completed successfully.
      </div>
    <?php endif; ?>

    <?php if (isset($_GET["error"])): ?>
      <div class="alert alert-light border small text-danger">
        Something went wrong.
      </div>
    <?php endif; ?>

    <!-- Table -->
    <div class="table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th>Title</th>
            <th>Artist</th>
            <th>Status</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>

        <tbody>
          <?php if (empty($songs)): ?>
            <tr>
              <td colspan="4" class="text-center text-muted py-4">
                No songs yet.
              </td>
            </tr>
          <?php else: ?>
            <?php foreach ($songs as $song): ?>
              <tr>
                <td><?= htmlspecialchars($song["title"]) ?></td>
                <td><?= htmlspecialchars($song["artist"]) ?></td>

                <td>
                  <?php if ($song["is_listened"]): ?>
                    <span class="text-success small">Listened</span>
                  <?php else: ?>
                    <span class="text-muted small">Not listened</span>
                  <?php endif; ?>
                </td>

                <td class="text-end">
                  <div class="d-inline-flex gap-2">

                    <!-- Toggle -->
                    <form action="../services/use-cases/UpdateMusicUseCase.php" method="POST">
                      <input type="hidden" name="id" value="<?= $song["id"] ?>">
                      <button type="submit" class="btn-minimal">
                        <?= $song["is_listened"] ? "Mark Unlistened" : "Mark Listened" ?>
                      </button>
                    </form>

                    <!-- Delete -->
                    <form action="../services/use-cases/DeleteMusicUseCase.php" method="POST"
                          onsubmit="return confirm('Remove this song?')">
                      <input type="hidden" name="id" value="<?= $song["id"] ?>">
                      <button type="submit" class="btn-minimal text-danger">
                        Delete
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

  </div>
</div>

</body>
</html>