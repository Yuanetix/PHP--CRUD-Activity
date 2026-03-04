<?php
  include __DIR__ . "/../dto/UpdateMusicDTO.php";
  include __DIR__ . "/../../repository/music/MusicRepository.php";

  $id = isset($_POST["id"]) ? (int)$_POST["id"] : 0;

  if ($id <= 0) {
    header("Location: ../../views/home.php?error=invalid_id");
    exit;
  }

  $dto     = new UpdateMusicDTO($id);
  $repo    = new MusicRepository();
  $updated = $repo->update($dto->id);

  if (!$updated) {
    header("Location: ../../views/home.php?error=not_found");
    exit;
  }

  header("Location: ../../views/home.php?success=true");
?>
