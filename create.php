<?= view('layouts/header') ?>
<div class="container mt-4">
    <h2>Add New Student</h2>
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <p><?= esc($error) ?></p>
            <?php endforeach ?>
        </div>
    <?php endif; ?>
    <form action="/students/store" method="post">
        <div class="mb-3">
            <label for="student_name" class="form-label">Student Name</label>
            <input type="text" name="student_name" class="form-control" id="student_name" value="<?= old('student_name') ?>">
        </div>
        <div class="mb-3">
            <label for="class_teacher_id" class="form-label">Class Teacher</label>
            <select name="class_teacher_id" class="form-select" id="class_teacher_id">
                <?php foreach ($teachers as $teacher): ?>
                    <option value="<?= $teacher['id'] ?>"><?= esc($teacher['teacher_name']) ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="class" class="form-label">Class</label>
            <input type="text" name="class" class="form-control" id="class" value="<?= old('class') ?>">
        </div>
        <div class="mb-3">
            <label for="admission_date" class="form-label">Admission Date</label>
            <input type="date" name="admission_date" class="form-control" id="admission_date" value="<?= old('admission_date') ?>">
        </div>
        <div class="mb-3">
            <label for="yearly_fees" class="form-label">Yearly Fees</label>
            <input type="number" step="0.01" name="yearly_fees" class="form-control" id="yearly_fees" value="<?= old('yearly_fees') ?>">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
<?= view('layouts/footer') ?>
