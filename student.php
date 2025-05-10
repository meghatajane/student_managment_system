<?= view('layouts/header') ?>
<div class="container mt-4">
    <h2>Student List</h2>
    <a href="/students/create" class="btn btn-success mb-3">Add New Student</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Class</th>
                <th>Teacher</th>
                <th>Admission</th>
                <th>Fees</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $s): ?>
                <tr>
                    <td><?= esc($s['student_name']) ?></td>
                    <td><?= esc($s['class']) ?></td>
                    <td><?= esc($s['teacher_name']) ?></td>
                    <td><?= esc($s['admission_date']) ?></td>
                    <td><?= esc($s['yearly_fees']) ?></td>
                    <td>
                        <a href="/students/edit/<?= $s['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/students/delete/<?= $s['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete student?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?= view('layouts/footer') ?>
