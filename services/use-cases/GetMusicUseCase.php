<?php
  include __DIR__ . "/../dto/GetMusicDTO.php";
  include __DIR__ . "/../../repository/music/MusicRepository.php";

  $id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;

  if ($id <= 0) {
    http_response_code(400);
    header("Location: ../../views/home.php?error=invalid_id");
    exit;
  }

  $dto  = new GetMusicDTO($id);
  $repo = new MusicRepository();
  $song = $repo->getById($dto->id);

  if (!$song) {
    http_response_code(404);
    header("Location: ../../views/home.php?error=not_found");
    exit;
  }

  return $song;
?>
