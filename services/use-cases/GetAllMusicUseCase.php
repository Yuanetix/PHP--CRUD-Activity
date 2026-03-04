<?php
  include __DIR__ . "/../../repository/music/MusicRepository.php";

  $repo  = new MusicRepository();
  $songs = $repo->getAll();
?>
