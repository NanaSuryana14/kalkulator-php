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
// Mengecek apakah form dikirim menggunakan metode POST (artinya user sudah menekan tombol Hitung)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // VARIABEL:
    // $angka1 dan $angka2 menyimpan nilai input dari pengguna.
    // Nilai ini akan digunakan sebagai angka pertama dan kedua dalam perhitungan.
    $angka1 = $_POST['angka1'];
    $angka2 = $_POST['angka2'];

    // $operator menyimpan jenis operasi yang dipilih user dari dropdown (tambah, kurang, kali, bagi).
    $operator = $_POST['operator'];

    // $hasil untuk menyimpan hasil perhitungan.
    // $simbol untuk menyimpan simbol operator (+, -, *, /) agar bisa ditampilkan bersama hasilnya.
    $hasil = 0;
    $simbol = "";

    // LOGIKA IF-ELSE:
    // Mengecek nilai $operator untuk menentukan jenis perhitungan.
    if ($operator == "tambah") {
        // OPERATOR: +
        // Melakukan penjumlahan antara $angka1 dan $angka2
        $hasil = $angka1 + $angka2;
        $simbol = "+";

    } elseif ($operator == "kurang") {
        // OPERATOR: -
        // Melakukan pengurangan angka1 dikurang angka2
        $hasil = $angka1 - $angka2;
        $simbol = "-";

    } elseif ($operator == "kali") {
        // OPERATOR: *
        // Melakukan perkalian antara angka1 dan angka2
        $hasil = $angka1 * $angka2;
        $simbol = "*";

    } elseif ($operator == "bagi") {
        // OPERATOR: /
        // Melakukan pembagian jika angka2 bukan nol, karena membagi dengan 0 tidak valid
        if ($angka2 != 0) {
            $hasil = $angka1 / $angka2;
            $simbol = "/";
        } else {
            $hasil = "Tidak bisa dibagi dengan 0";
            $simbol = "/";
        }

    } else {
        // Jika operator tidak dikenali, tampilkan pesan error
        $hasil = "Operator tidak valid";
        $simbol = "?";
    }

    // Menampilkan hasil akhir ke layar dalam bentuk angka1 operator angka2 = hasil
    echo "<div class='hasil'>$angka1 $simbol $angka2 = $hasil</div>";
}
    ?>
  </div>
</body>
</html>
