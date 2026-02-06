<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>

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

    .update{
        background:#f6c23e;
        color:white;
    }

    .kembali{
        background:#6c757d;
        color:white;
        text-decoration:none;
        padding:10px 18px;
        border-radius:6px;
    }
</style>
</head>

<body>

    <div class="container">

        <h2>✏️ Edit Produk</h2>

        <form method="post" action="<?= site_url('produk/update/' . $produk->id_produk) ?>">


            <label>Nama Produk</label>
            <input type="text" name="nama_produk" 
            value="<?= $produk->nama_produk ?>" required>

            <label>Harga</label>
            <input type="number" name="harga" 
            value="<?= $produk->harga ?>" required>

            <label>Kategori</label>
            <select name="kategori_id" required>
                <option value="">-- Pilih Kategori --</option>
                <?php foreach($kategori as $k): ?>
                <option value="<?= $k->id_kategori ?>">
                    <?= $k->nama_kategori ?>
                </option>
                <?php endforeach ?>
            </select>

            <label>Status</label>
            <select name="status_id" required>
                <option value="">-- Pilih Status --</option>
                <?php foreach($status as $s): ?>
                <option value="<?= $s->id_status ?>">
                    <?= $s->nama_status ?>
                </option>
                <?php endforeach ?>
            </select>

            <button type="submit" class="btn update">Update</button>
            <a href="<?= site_url('produk/index') ?>" class="kembali">Kembali</a>
        </form>
    </div>
</body>
</html>
