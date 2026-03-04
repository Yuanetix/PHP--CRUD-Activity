<?php
  include __DIR__ . "/../dto/CreateMusicDTO.php";
  include __DIR__ . "/../../repository/music/MusicRepository.php";

  $title  = $_POST["title"]  ?? "";
  $artist = $_POST["artist"] ?? "";

  if (empty(trim($title)) || empty(trim($artist))) {
    header("Location: ../../views/create_music.php?error=empty_fields");
    exit;
  }

  $dto  = new CreateMusicDTO($title, $artist);
  $repo = new MusicRepository();
  $repo->store($dto->title, $dto->artist);

  header("Location: ../../views/home.php?success=true");
?>
