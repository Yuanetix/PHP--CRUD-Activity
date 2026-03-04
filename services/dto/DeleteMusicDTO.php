<?php
  class DeleteMusicDTO {
    public int $id;

    public function __construct(int $id) {
      $this->id = $id;
    }
  }
?>
