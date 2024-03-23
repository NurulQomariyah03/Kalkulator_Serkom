<?php
class Calculator {
    private $db;

    // Konstruktor untuk inisialisasi koneksi database
    public function __construct() {
        $this->db = new mysqli('localhost', 'root', '', 'kalkulator_serkom');
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    // Fungsi untuk melakukan perhitungan matematika dari ekspresi yang diberikan
    public function calculate($expression) {
      $result = null;
      try {
          $result = eval('return ' . $expression . ';');
      } catch (Throwable $e) {
          echo 'Error: ' . $e->getMessage();
      }
      return $result;
    }
  
    // Fungsi untuk menyimpan ekspresi dan hasil perhitungan ke dalam database
    public function saveHistory($expression, $result) {
        $sql = "INSERT INTO calculations (expression, result) VALUES ('$expression', '$result')";
        $this->db->query($sql);
    }

    // Fungsi untuk mendapatkan riwayat perhitungan dari database
    public function getHistory() {
        $history = array();
        $sql = "SELECT * FROM calculations";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $history[] = $row;
            }
        }
        return $history;
    }

    // Fungsi untuk menghapus perhitungan berdasarkan ID dari database
    public function deleteCalculation($id) {
      $sql = "DELETE FROM calculations WHERE id = $id";
      $this->db->query($sql);
    }

    // Fungsi untuk mendapatkan perhitungan berdasarkan ID dari database
    public function getCalculationById($id) {
        $sql = "SELECT * FROM calculations WHERE id = $id";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    // Fungsi untuk memperbarui perhitungan berdasarkan ID di database
    public function updateCalculation($id, $expression, $result) {
        $sql = "UPDATE calculations SET expression='$expression', result='$result' WHERE id = $id";
        $this->db->query($sql);
    }
}
?>
