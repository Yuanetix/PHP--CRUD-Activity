<?php
  include __DIR__ . "/../dto/DeleteMusicDTO.php";
  include __DIR__ . "/../../repository/music/MusicRepository.php";

  $id = isset($_POST["id"]) ? (int)$_POST["id"] : 0;

  if ($id <= 0) {
    header("Location: ../../views/home.php?error=invalid_id");
    exit;
  }

  $dto  = new DeleteMusicDTO($id);
  $repo = new MusicRepository();
  $repo->delete($dto->id);

  header("Location: ../../views/home.php?success=true");
?>
