<button onclick="location.href='/inputBaru'">Tambah baru</button>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($keluarga as $keluarga) : ?>
            <tr>
                <td><?= $keluarga['nama']; ?></td>
                <td><?= $keluarga['jk']; ?></td>
                <td><a href="/update/<?= $keluarga['id']; ?>">Update</a>
                    <a href="/delete/<?= $keluarga['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>