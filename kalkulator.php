<!DOCTYPE html>
<html>
<head>
  <title>Kalkulator PHP Soft</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: #ececec;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .calculator {
      background: #ffffff;
      padding: 35px 30px;
      border-radius: 15px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      width: 340px;
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    input[type="number"], select, button {
      width: 100%;
      padding: 10px 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 15px;
    }

    input:focus, select:focus {
      border-color: #555;
      outline: none;
    }

    button {
      background-color: #444;
      color: white;
      font-weight: bold;
      border: none;
      cursor: pointer;
      transition: 0.2s ease-in-out;
    }

    button:hover {
      background-color: #222;
    }

    .hasil {
      margin-top: 20px;
      background-color: #f5f5f5;
      border-left: 5px solid #444;
      padding: 12px;
      border-radius: 8px;
      font-size: 17px;
      color: #222;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="calculator">
    <h2>Kalkulator PHP</h2>
    <form method="POST">
      <input type="number" name="angka1" placeholder="Angka pertama" required>
      <input type="number" name="angka2" placeholder="Angka kedua" required>
      <select name="operator" required>
        <option value="" disabled selected>Pilih operator</option>
        <option value="tambah">+</option>
        <option value="kurang">-</option>
        <option value="kali">*</option>
        <option value="bagi">/</option>
      </select>
      <button type="submit">Hitung</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $angka1 = $_POST['angka1'];
        $angka2 = $_POST['angka2'];
        $operator = $_POST['operator'];
        $hasil = 0;
        $simbol = "";

        if ($operator == "tambah") {
            $hasil = $angka1 + $angka2;
            $simbol = "+";
        } elseif ($operator == "kurang") {
            $hasil = $angka1 - $angka2;
            $simbol = "-";
        } elseif ($operator == "kali") {
            $hasil = $angka1 * $angka2;
            $simbol = "*";
        } elseif ($operator == "bagi") {
            if ($angka2 != 0) {
                $hasil = $angka1 / $angka2;
                $simbol = "/";
            } else {
                $hasil = "Tidak bisa dibagi dengan 0";
                $simbol = "/";
            }
        } else {
            $hasil = "Operator tidak valid";
            $simbol = "?";
        }

        echo "<div class='hasil'>$angka1 $simbol $angka2 = $hasil</div>";
    }
    ?>
  </div>
</body>
</html>
