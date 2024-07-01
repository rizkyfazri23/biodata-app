<?php

use CodeIgniter\Session\Session;

$session = \Config\Services::session();

// Mengecek apakah user sudah login
if (!$session->get('isLoggedIn')) {
    // Jika user belum login, redirect ke halaman login
    header('Location: /login');
    exit;
}



?>

<?= $this->include('template/header') ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="my-4 text-center">Form Input Data User</h2>
                    <form action="<?= base_url('/user/saveBiodata') ?>" method="post">
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" class="form-control" id="position" name="position" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="identity_number">Identity Number</label>
                            <input type="text" class="form-control" id="identity_number" name="identity_number" required>
                        </div>
                        <div class="form-group">
                            <label for="birth_place">Birth Place</label>
                            <input type="text" class="form-control" id="birth_place" name="birth_place" required>
                        </div>
                        <div class="form-group">
                            <label for="birth_date">Birth Date</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" required>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <ul class="list-unstyled">
                                    <label><input type="radio" name="gender" value="Male" required> Male</label>
                                    
                                    &nbsp;&nbsp;&nbsp;
                                    
                                    <label><input type="radio" name="gender" value="Female" required> Female</label>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label for="religion">Religion</label>
                            <input type="text" class="form-control" id="religion" name="religion" required>
                        </div>
                        <div class="form-group">
                            <label for="blood_type">Blood Type</label>
                            <input type="text" class="form-control" id="blood_type" name="blood_type" required>
                        </div>
                        <div class="form-group">
                            <label for="marital_status">Marital Status</label>
                            <select class="form-control" id="marital_status" name="marital_status" required>
                                <option value="">Select Marital Status</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="divorced">Divorced</option>
                                <option value="widowed">Widowed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address_ktp">Address (KTP)</label>
                            <input type="text" class="form-control" id="address_ktp" name="address_ktp" required>
                        </div>
                        <div class="form-group">
                            <label for="current_address">Current Address</label>
                            <input type="text" class="form-control" id="current_address" name="current_address" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                        </div>
                        <div class="form-group">
                            <label for="emergency_contact">Emergency Contact</label>
                            <input type="text" class="form-control" id="emergency_contact" name="emergency_contact" required>
                        </div>
                        <div class="form-group">
                            <label for="skills">Skills</label>
                            <input type="text" class="form-control" id="skills" name="skills" required>
                        </div>
                        <div class="form-group">
                            <label>Willing to Relocate</label>
                            <ul class="list-unstyled">
                                    <label><input type="radio" name="willing_to_relocate" value="1" required> Yes</label>
                                    
                                    &nbsp;&nbsp;&nbsp;
                                    
                                    <label><input type="radio" name="willing_to_relocate" value="0" required> No</label>
                            </ul>
                        </div>
                        <div class="form-group">
                            <label for="expected_salary">Expected Salary</label>
                            <input type="number" class="form-control" id="expected_salary" name="expected_salary" required>
                        </div>
                        

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
                                    <!-- Dynamic rows for employment history -->
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-primary" onclick="addEmploymentRow()">Tambah Pekerjaan</button>
                        </div>
                        <!-- Data riwayat pelatihan -->
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
                                    <!-- Dynamic rows for training history -->
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-primary" onclick="addTrainingRow()">Tambah Pelatihan</button>
                        </div>
                        <!-- Data riwayat pendidikan -->
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
                                    <!-- Dynamic rows for education history -->
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-primary" onclick="addEducationRow()">Tambah Pendidikan</button>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Counter variables for dynamic rows
    let employmentCounter = 0;
    let trainingCounter = 0;
    let educationCounter = 0;

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
        const row = document.getElementById(rowId);
        if (row) {
            row.remove();
        }
    }
</script>

