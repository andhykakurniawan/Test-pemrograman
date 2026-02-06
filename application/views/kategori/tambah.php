<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori</title>

<style>
body{
    font-family:'Segoe UI',sans-serif;
    background:#f4f6f9;
    padding:40px;
}

.container{
    max-width:600px;
    margin:auto;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
}

h2{
    margin-bottom:20px;
}

label{
    font-weight:600;
    display:block;
    margin-top:15px;
}

input, select{
    width:100%;
    padding:10px;
    margin-top:5px;
    border-radius:6px;
    border:1px solid #ccc;
}

.btn{
    margin-top:25px;
    padding:10px 18px;
    border:none;
    border-radius:6px;
    cursor:pointer;
}

.simpan{
    background:#1cc88a;
    color:white;
}

.kembali{
    background:#6c757d;
    color:white;
    text-decoration:none;
    padding:10px 18px;
    border-radius:6px;
}
.error{
    color:red;
    margin-bottom:10px;
}
</style>
</head>

<body>

<div class="container">

    <h2>➕ Tambah Kategori</h2>

    <?= validation_errors('<div class="error">','</div>'); ?>

    <form method="post" action="<?= site_url('kategori/simpan') ?>">

        <label>ID Kategori</label>
        <input type="number" name="id_kategori" required>

        <label>Nama Kategori</label>
        <input type="text" name="nama_kategori" required>

        <button type="submit" class="btn simpan">Simpan</button>
        <a href="<?= site_url('kategori') ?>" class="kembali">Kembali</a>

    </form>

</div>

</body>
</html>
