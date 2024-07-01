<?= $this->include('template/header') ?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Edit Biodata User</h2>
        </div>
        <div class="card-body">
            <form action="<?= base_url('user/updateBiodata/'.$user['user_id']) ?>" method="post">
                <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" class="form-control" id="position" name="position" value="<?= $biodata['position'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $biodata['name'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="identity_number">Identity Number</label>
                    <input type="text" class="form-control" id="identity_number" name="identity_number" value="<?= $biodata['identity_number'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="birth_place">Birth Place</label>
                    <input type="text" class="form-control" id="birth_place" name="birth_place" value="<?= $biodata['birth_place'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="birth_date">Birth Date</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?= $biodata['birth_date'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <ul class="list-unstyled">
                        <label><input type="radio" name="gender" value="Male" <?= $biodata['gender'] == 'Male' ? 'checked' : '' ?> required> Male</label>
                        &nbsp;&nbsp;&nbsp;
                        <label><input type="radio" name="gender" value="Female" <?= $biodata['gender'] == 'Female' ? 'checked' : '' ?> required> Female</label>
                    </ul>
                </div>
                <div class="form-group">
                    <label for="religion">Religion</label>
                    <input type="text" class="form-control" id="religion" name="religion" value="<?= $biodata['religion'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="blood_type">Blood Type</label>
                    <input type="text" class="form-control" id="blood_type" name="blood_type" value="<?= $biodata['blood_type'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="marital_status">Marital Status</label>
                    <select class="form-control" id="marital_status" name="marital_status" required>
                        <option value="">Select Marital Status</option>
                        <option value="single" <?= $biodata['marital_status'] == 'single' ? 'selected' : '' ?>>Single</option>
                        <option value="married" <?= $biodata['marital_status'] == 'married' ? 'selected' : '' ?>>Married</option>
                        <option value="divorced" <?= $biodata['marital_status'] == 'divorced' ? 'selected' : '' ?>>Divorced</option>
                        <option value="widowed" <?= $biodata['marital_status'] == 'widowed' ? 'selected' : '' ?>>Widowed</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address_ktp">Address (KTP)</label>
                    <input type="text" class="form-control" id="address_ktp" name="address_ktp" value="<?= $biodata['address_ktp'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="current_address">Current Address</label>
                    <input type="text" class="form-control" id="current_address" name="current_address" value="<?= $biodata['current_address'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $biodata['email'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= $biodata['phone_number'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="emergency_contact">Emergency Contact</label>
                    <input type="text" class="form-control" id="emergency_contact" name="emergency_contact" value="<?= $biodata['emergency_contact'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="skills">Skills</label>
                    <textarea class="form-control" id="skills" name="skills" required><?= $biodata['skills'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="willing_to_relocate">Willing to Relocate</label>
                    <select class="form-control" id="willing_to_relocate" name="willing_to_relocate" required>
                        <option value="yes" <?= $biodata['willing_to_relocate'] == 'yes' ? 'selected' : '' ?>>Yes</option>
                        <option value="no" <?= $biodata['willing_to_relocate'] == 'no' ? 'selected' : '' ?>>No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="expected_salary">Expected Salary</label>
                    <input type="text" class="form-control" id="expected_salary" name="expected_salary" value="<?= $biodata['expected_salary'] ?>" required>
                </div>

                <!-- Employment Section -->
                <div class="form-group">
                    <label>Riwayat Pekerjaan</label>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Company Name</th>
                                <th>Position</th>
                                <th>Salary</th>
                                <th>Year From</th>
                                <th>Year To</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="employment-table-body">
                            <?php foreach ($employment as $index => $emp): ?>
                                <tr id="employment-row-<?= $index ?>">
                                    <td><input type="text" class="form-control" name="employment[<?= $index ?>][company_name]" value="<?= $emp['company_name'] ?>" required></td>
                                    <td><input type="text" class="form-control" name="employment[<?= $index ?>][position]" value="<?= $emp['position'] ?>" required></td>
                                    <td><input type="number" class="form-control" name="employment[<?= $index ?>][salary]" value="<?= $emp['salary'] ?>" required></td>
                                    <td><input type="number" class="form-control" name="employment[<?= $index ?>][year_from]" value="<?= $emp['year_from'] ?>" required></td>
                                    <td><input type="number" class="form-control" name="employment[<?= $index ?>][year_to]" value="<?= $emp['year_to'] ?>" required></td>
                                    <td><button type="button" class="btn btn-danger" onclick="removeRow('employment-row-<?= $index ?>')"><i class="fas fa-trash"></i></button></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary" onclick="addEmploymentRow()">Tambah Pekerjaan</button>
                </div>

                <!-- Training Section -->
                <div class="form-group">
                    <label>Riwayat Pelatihan</label>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Course Name</th>
                                <th>Certificate</th>
                                <th>Year</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="training-table-body">
                            <?php foreach ($training as $index => $train): ?>
                                <tr id="training-row-<?= $index ?>">
                                    <td><input type="text" class="form-control" name="training[<?= $index ?>][course_name]" value="<?= $train['course_name'] ?>" required></td>
                                    <td><input type="checkbox" class="form-check-input" name="training[<?= $index ?>][is_certificate]" value="1" <?= $train['is_certificate'] ? 'checked' : '' ?>></td>
                                    <td><input type="number" class="form-control" name="training[<?= $index ?>][year]" value="<?= $train['year'] ?>" required></td>
                                    <td><button type="button" class="btn btn-danger" onclick="removeRow('training-row-<?= $index ?>')"><i class="fas fa-trash"></i></button></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary" onclick="addTrainingRow()">Tambah Pelatihan</button>
                </div>

                <!-- Education Section -->
                <div class="form-group">
                    <label>Riwayat Pendidikan</label>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Education Level</th>
                                <th>Institution Name</th>
                                <th>Major</th>
                                <th>Graduation Year</th>
                                <th>GPA</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="education-table-body">
                            <?php foreach ($education as $index => $edu): ?>
                                <tr id="education-row-<?= $index ?>">
                                    <td><input type="text" class="form-control" name="education[<?= $index ?>][education_level]" value="<?= $edu['education_level'] ?>" required></td>
                                    <td><input type="text" class="form-control" name="education[<?= $index ?>][institution_name]" value="<?= $edu['institution_name'] ?>" required></td>
                                    <td><input type="text" class="form-control" name="education[<?= $index ?>][major]" value="<?= $edu['major'] ?>" required></td>
                                    <td><input type="number" class="form-control" name="education[<?= $index ?>][graduation_year]" value="<?= $edu['graduation_year'] ?>" required></td>
                                    <td><input type="number" class="form-control" name="education[<?= $index ?>][gpa]" value="<?= $edu['gpa'] ?>" required></td>
                                    <td><button type="button" class="btn btn-danger" onclick="removeRow('education-row-<?= $index ?>')"><i class="fas fa-trash"></i></button></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary" onclick="addEducationRow()">Tambah Pendidikan</button>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

<script>
    let employmentCounter = <?= count($employment) ?>;
    let trainingCounter = <?= count($training) ?>;
    let educationCounter = <?= count($education) ?>;

    function addEmploymentRow() {
        employmentCounter++;
        const row = `
            <tr id="employment-row-${employmentCounter}">
                <td><input type="text" class="form-control" name="employment[${employmentCounter}][company_name]" required></td>
                <td><input type="text" class="form-control" name="employment[${employmentCounter}][position]" required></td>
                <td><input type="number" class="form-control" name="employment[${employmentCounter}][salary]" required></td>
                <td><input type="number" class="form-control" name="employment[${employmentCounter}][year_from]" required></td>
                <td><input type="number" class="form-control" name="employment[${employmentCounter}][year_to]" required></td>
                <td><button type="button" class="btn btn-danger" onclick="removeRow('employment-row-${employmentCounter}')"><i class="fas fa-trash"></i></button></td>
            </tr>
        `;
        document.getElementById('employment-table-body').insertAdjacentHTML('beforeend', row);
    }

    function addTrainingRow() {
        trainingCounter++;
        const row = `
            <tr id="training-row-${trainingCounter}">
                <td><input type="text" class="form-control" name="training[${trainingCounter}][course_name]" required></td>
                <td><input type="checkbox" class="form-check-input" name="training[${trainingCounter}][is_certificate]" value="1"></td>
                <td><input type="number" class="form-control" name="training[${trainingCounter}][year]" required></td>
                <td><button type="button" class="btn btn-danger" onclick="removeRow('training-row-${trainingCounter}')"><i class="fas fa-trash"></i></button></td>
            </tr>
        `;
        document.getElementById('training-table-body').insertAdjacentHTML('beforeend', row);
    }

    function addEducationRow() {
        educationCounter++;
        const row = `
            <tr id="education-row-${educationCounter}">
                <td><input type="text" class="form-control" name="education[${educationCounter}][education_level]" required></td>
                <td><input type="text" class="form-control" name="education[${educationCounter}][institution_name]" required></td>
                <td><input type="text" class="form-control" name="education[${educationCounter}][major]" required></td>
                <td><input type="number" class="form-control" name="education[${educationCounter}][graduation_year]" required></td>
                <td><input type="number" class="form-control" name="education[${educationCounter}][gpa]" required></td>
                <td><button type="button" class="btn btn-danger" onclick="removeRow('education-row-${educationCounter}')"><i class="fas fa-trash"></i></button></td>
            </tr>
        `;
        document.getElementById('education-table-body').insertAdjacentHTML('beforeend', row);
    }

    function removeRow(rowId) {
        document.getElementById(rowId).remove();
    }
</script>

<?= $this->include('template/footer') ?>
