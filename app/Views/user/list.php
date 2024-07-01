<?= $this->include('template/header') ?>

<br>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>List User</h2>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Tempat & Tanggal Lahir</th>
                        <th>Posisi</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user['user_id'] ?></td>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['birth_place'] ?>, <?= date('d-m-Y', strtotime($user['birth_date'])) ?></td>
                            <td><?= $user['position'] ?></td>
                            <td>
                                <a href="<?= base_url('user/editBiodata/'.$user['user_id']) ?>" class="btn btn-primary">Edit Biodata</a>
                                <a href="<?= base_url('user/delete/'.$user['user_id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->include('template/footer') ?>
