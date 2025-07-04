<?php include 'connect.php';
    $kategori = "";
    if(isset($_GET['kategori'])){
        $kategori = $_GET['kategori'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Ecommers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body style='background-color:#F2F2F2;'>

<nav class="navbar" style="background-color:#2C3E50">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" style="color:#ECF0F1">Nirvan Ecommers</a>
    <form class="d-flex" method='GET'>
        <select name="kategori" onchange="this.form.submit()" class="rounded-2 p-1 fw-bold me-2">
            <option value="" <?php if ($kategori == "") echo "selected"; ?>>Semua produk</option>
            <option value="elektronik" <?php if ($kategori == "elektronik") echo "selected"; ?>>Elektronik</option>
            <option value="fashion" <?php if ($kategori == "fashion") echo "selected"; ?>>Fashion</option>
            <option value="olahraga" <?php if ($kategori == "olahraga") echo "selected"; ?>>Olahraga</option>
        </select>
    </form>
  </div>
</nav>

<div class="container mt-4">
    <div class="row">
        <?php 
        if($kategori != ''){
            $sql = "SELECT * FROM product WHERE kategori = '$kategori'";
        }else{
            $sql = "SELECT * FROM product";
        }

        $result = $conn->query($sql);

        
if (!$result) {
    die("Query gagal: " . $conn->error);
}
        while ($row = $result -> fetch_assoc()){
            echo "<div class='col-md-4 mb-3'>";
            echo "  <div class='card'>";
            echo "    <div class='card-body text-center'>";
            echo "      <h5 class='card-title'>" . $row['nama'] . "</h5>";
            echo "      <p class='card-text mb-0'>Kategori: " . $row['kategori'] . "</p>";
            echo "      <p class='card-text'>Harga: Rp" . $row['harga'] . "</p>";
            echo "    </div>";
            echo "  </div>";
            echo "</div>";
        }
        ?>
    </div>
</div>


</body>
</html>