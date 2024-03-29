<?php
echo "<!-- Data Mahasiswa -->\n";
echo "<!-- Inisialisasi variabel agregat -->\n";
?>

<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    text-align: center;
  }
  table {
    width: 90%;
    border-collapse: collapse;
    margin: 20px auto;
    background-color: #fff;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  }
  th, td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    text-align: left;
  }
  th {
    background-color: #4CAF50;
    color: white;
  }
  tr:nth-child(even) {
    background-color: #f2f2f2;
  }
  tfoot {
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
  }
  tfoot tr:nth-child(even) {
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
  }
  h1 {
    margin-top: 50px;
  }
</style>

<h1>Daftar Nilai Mahasiswa</h1>

<table>
<thead>
<tr>
<th>No</th>
<th>Nama Mahasiswa</th>
<th>NIM</th>
<th>Nilai</th>
<th>Keterangan</th>
<th>Grade</th>
<th>Predikat</th>
</tr>
</thead>
<tbody>
<?php
// Data Mahasiswa
$data_mahasiswa = array(
    array(1, 'Andi Santono', '0111111', 95),
    array(2, 'Budi Kurniawan', '0111112', 80),
    array(3, 'Candi Badur', '0111113', 78),
    array(4, 'Denis Caputra', '0111114', 76),
    array(5, 'Erik Manahel', '0111115', 86),
    array(6, 'Fatril Nusonto', '0111116', 50),
    array(7, 'Gayama Harustia', '0111117', 20),
    array(8, 'Isma Latono', '0111118', 30),
    array(9, 'Jami Sayir', '0111119', 70),
    array(10, 'Karni Buato', '01111110', 65)
);

// Inisialisasi variabel agregat
$nilai_tertinggi = 0;
$nilai_terendah = 100;
$jumlah_nilai = 0;

foreach ($data_mahasiswa as $mahasiswa) {
    // Mendapatkan data mahasiswa
    $no = $mahasiswa[0];
    $nama = $mahasiswa[1];
    $nim = $mahasiswa[2];
    $nilai = $mahasiswa[3];

    // Menghitung agregat nilai
    $jumlah_nilai += $nilai;
    if ($nilai > $nilai_tertinggi) {
        $nilai_tertinggi = $nilai;
    }
    if ($nilai < $nilai_terendah) {
        $nilai_terendah = $nilai;
    }

    // Menentukan keterangan
    $keterangan = ($nilai >= 65) ? 'Lulus' : 'Gagal';

    // Menentukan grade
    if ($nilai >= 85) {
        $grade = 'A';
    } elseif ($nilai >= 75) {
        $grade = 'B';
    } elseif ($nilai >= 65) {
        $grade = 'C';
    } elseif ($nilai >= 50) {
        $grade = 'D';
    } else {
        $grade = 'E';
    }

    // Menentukan predikat
    switch ($grade) {
        case 'A':
            $predikat = 'Memuaskan';
            break;
        case 'B':
            $predikat = 'Bagus';
            break;
        case 'C':
            $predikat = 'Cukup';
            break;
        case 'D':
            $predikat = 'Kurang';
            break;
        case 'E':
            $predikat = 'Buruk';
            break;
        default:
            $predikat = 'Tidak Ada';
    }

    // Menampilkan data mahasiswa dalam baris tabel
    
    echo '<tr>';
    echo '<td>' . $no . '</td>';
    echo '<td>' . $nama . '</td>';
    echo '<td>' . $nim . '</td>';
    echo '<td>' . $nilai . '</td>';
    echo '<td>' . $keterangan . '</td>';
    echo '<td>' . $grade . '</td>';
    echo '<td>' . $predikat . '</td>';
    echo '</tr>';
    // copyright by Rifqi Zaidan Abiyan 

}
?>

</tbody>
<tfoot>
<tr>
<td colspan="3">Nilai Tertinggi:</td>
<td colspan="4"><?php echo $nilai_tertinggi; ?></td>
</tr>
<tr>
<td colspan="3">Nilai Terendah:</td>
<td colspan="4"><?php echo $nilai_terendah; ?></td>
</tr>
<tr>
<td colspan="3">Nilai Rata-rata:</td>
<td colspan="4"><?php echo number_format($jumlah_nilai / count($data_mahasiswa), 2); ?></td>
</tr>
<tr>
<td colspan="3">Jumlah Mahasiswa:</td>
<td colspan="4"><?php echo count($data_mahasiswa); ?></td>
</tr>
<tr>
<td colspan="3">Jumlah Keseluruhan Nilai:</td>
<td colspan="4"><?php echo $jumlah_nilai; ?></td>
</tr>
</tfoot>
</table>
