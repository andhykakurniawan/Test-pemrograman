<!DOCTYPE html>
<html>
<head>
    <title>Edit Kategori</title>

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

        <h2>✏️ Edit Kategori</h2>

        <form method="post" action="<?= site_url('kategori/update/' . $kategori->id_kategori) ?>">

            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" 
            value="<?= $kategori->nama_kategori ?>" required>

            <button type="submit" class="btn update">Update</button>
            <a href="<?= site_url('kategori/index') ?>" class="kembali">Kembali</a>
        </form>
    </div>
</body>
</html>
