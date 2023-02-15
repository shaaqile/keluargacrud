<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=p, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <p class="mx-3">input</p>
    <?php if (isset($keluarga)) { ?>
        <form action="/updatekeluarga/<?= $keluarga[0]['id']; ?>" class="mx-3 formkeluarga" method="POST">
            <div class="row mb-3">
                <div class="col-8">
                    <label for="nama" class="form-label">Nama</label>
                    <input name="nama" type="text" class="form-control <?= ($validation->hasError('nama') ? 'is-invalid' : ''); ?>" id="nama" value="<?= $keluarga[0]['keluarga_name']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama') ?> </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <label for="jk" class="form-label ">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-select <?= ($validation->hasError('jk') ? 'is-invalid' : ''); ?>">
                        <option value="<?= $keluarga[0]['jk']; ?>" selected></option>
                        <option value="P">Perempuan</option>
                        <option value="L">Laki-laki</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('jk') ?> </div>
                </div>
                <div class="col-4">
                    <label for="anak" class="form-label">Anak dari</label>
                    <select name="anak" id="anak" class="form-select <?= ($validation->hasError('anak') ? 'is-invalid' : ''); ?>">
                        <option value="<?= $anak[0]['id']; ?>" selected><?= $anak[0]['nama']; ?></option>
                        <?php foreach ($keluarga as $keluarga) : ?>
                            <option value="<?= $keluarga['id']; ?>"><?= $keluarga['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('anak') ?> </div>
                </div>
            </div>
            <button class="btn btn-success" type="submit" name="update">Update</button>
        </form>
    <?php } else { ?>
        <form action="/inputKeluarga" class="mx-3 formkeluarga" method="POST">
            <div class="row mb-3">
                <div class="col-8">
                    <label for="nama" class="form-label">Nama</label>
                    <input name="nama" type="text" class="form-control <?= ($validation->hasError('nama') ? 'is-invalid' : ''); ?>" id="nama">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama') ?> </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <label for="jk" class="form-label ">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-select <?= ($validation->hasError('jk') ? 'is-invalid' : ''); ?>">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="P">Perempuan</option>
                        <option value="L">Laki-laki</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('jk') ?> </div>
                </div>
                <div class="col-4">
                    <label for="anak" class="form-label">Anak dari</label>
                    <select name="anak" id="anak" class="form-select <?= ($validation->hasError('anak') ? 'is-invalid' : ''); ?>">
                        <option selected>Anak dari</option>
                        <?php foreach ($anak as $anak) : ?>
                            <option value="<?= $anak['id']; ?>"><?= $anak['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('anak') ?> </div>
                </div>
            </div>
            <button class="btn btn-success" type="submit" name="input">Tambah</button>
        </form>
    <?php } ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>