<?php
  include __DIR__ . "/MusicRepositoryInterface.php";

  class MusicRepository implements MusicRepositoryInterface {
    private mysqli $conn;

    public function __construct() {
      include __DIR__ . "/../../config/database.php";
      $this->conn = $conn;
    }

    public function store(string $title, string $artist): void {
      $stmt = $this->conn->prepare("INSERT INTO songs (title, artist) VALUES (?, ?)");
      $stmt->bind_param("ss", $title, $artist);
      $stmt->execute();
      $stmt->close();
    }

    public function getAll(): array {
      $res = $this->conn->query("SELECT * FROM songs ORDER BY created_at DESC");
      return $res->fetch_all(MYSQLI_ASSOC);
    }

    public function getById(int $id): array {
      $stmt = $this->conn->prepare("SELECT * FROM songs WHERE id = ?");
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result = $stmt->get_result()->fetch_assoc();
      $stmt->close();
      return $result;
    }

    public function update(int $id): array {
      // Get current listened status
      $stmt = $this->conn->prepare("SELECT is_listened FROM songs WHERE id = ?");
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result = $stmt->get_result()->fetch_assoc();
      $stmt->close();

      $currentStatus = (int)$result["is_listened"];
      $newStatus = $currentStatus === 1 ? 0 : 1;

      $stmt = $this->conn->prepare("UPDATE songs SET is_listened = ? WHERE id = ?");
      $stmt->bind_param("ii", $newStatus, $id);
      $stmt->execute();
      $stmt->close();

      return $this->getById($id);
    }

    public function delete(int $id): void {
      $stmt = $this->conn->prepare("DELETE FROM songs WHERE id = ?");
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $stmt->close();
    }
  }
?>
