<?php

namespace App\Controllers;

use App\Models\UserBiodataModel;
use App\Models\UserModel;
use App\Models\UserEmploymentModel;
use App\Models\UserTrainingModel;
use App\Models\UserEducationModel;

class UserController extends BaseController
{

    protected $userModel;
    protected $biodataModel;
    protected $employmentModel;
    protected $trainingModel;
    protected $educationModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->biodataModel = new UserBiodataModel();
        $this->employmentModel = new UserEmploymentModel();
        $this->trainingModel = new UserTrainingModel();
        $this->educationModel = new UserEducationModel();
    }

    public function list()
    {
        $model = new UserBiodataModel();
        $users = $model->select('user_id, name, birth_place, birth_date, position')->findAll();

        return view('user/list', ['users' => $users]);
    }


    public function editBiodata($id)
    {
        $data['user'] = $this->userModel->find($id);
        $data['biodata'] = $this->biodataModel->where('user_id', $id)->first();
        $data['employment'] = $this->employmentModel->where('user_id', $id)->findAll();
        $data['training'] = $this->trainingModel->where('user_id', $id)->findAll();
        $data['education'] = $this->educationModel->where('user_id', $id)->findAll();
        return view('user/edit_biodata', $data);
    }

    public function updateBiodata($user_id)
    {
        // Mengambil biodata_id berdasarkan user_id
        $biodata = $this->biodataModel->where('user_id', $user_id)->first();
        
        if (!$biodata) {
            return redirect()->to('/user/list')->with('error', 'Biodata not found.');
        }

        $biodata_id = $biodata['id'];

        $biodataData = [
            'position' => $this->request->getPost('position'),
            'name' => $this->request->getPost('name'),
            'identity_number' => $this->request->getPost('identity_number'),
            'birth_place' => $this->request->getPost('birth_place'),
            'birth_date' => $this->request->getPost('birth_date'),
            'gender' => $this->request->getPost('gender'),
            'religion' => $this->request->getPost('religion'),
            'blood_type' => $this->request->getPost('blood_type'),
            'marital_status' => $this->request->getPost('marital_status'),
            'address_ktp' => $this->request->getPost('address_ktp'),
            'current_address' => $this->request->getPost('current_address'),
            'email' => $this->request->getPost('email'),
            'phone_number' => $this->request->getPost('phone_number'),
            'emergency_contact' => $this->request->getPost('emergency_contact'),
            'skills' => $this->request->getPost('skills'),
            'willing_to_relocate' => $this->request->getPost('willing_to_relocate'),
            'expected_salary' => $this->request->getPost('expected_salary')
        ];

        $employmentData = $this->request->getPost('employment');
        $trainingData = $this->request->getPost('training');
        $educationData = $this->request->getPost('education');

        // Update biodata
        $this->biodataModel->update($biodata_id, $biodataData);

        // Update employment
        foreach ($employmentData as $id => $emp) {
            $this->employmentModel->update($id, $emp);
        }

        // Update training
        foreach ($trainingData as $id => $train) {
            $this->trainingModel->update($id, $train);
        }

        // Update education
        foreach ($educationData as $id => $edu) {
            $this->educationModel->update($id, $edu);
        }

        return redirect()->to('/user/list')->with('success', 'Biodata updated successfully.');
    }



    public function delete($id)
    {
        $this->userModel->delete($id);
        return redirect()->to('/user/list');
    }

    public function saveBiodata()
    {

        $session = \Config\Services::session();


        $userModel = new UserBiodataModel();
        $employmentModel = new UserEmploymentModel();
        $trainingModel = new UserTrainingModel();
        $educationModel = new UserEducationModel();
        $userId = $session->get('user_id');



        $db = \Config\Database::connect();
        $db->transStart();

        $userData = [
            'user_id' => $userId,
            'position' => $this->request->getPost('position'),
            'name' => $this->request->getPost('name'),
            'identity_number' => $this->request->getPost('identity_number'),
            'birth_place' => $this->request->getPost('birth_place'),
            'birth_date' => $this->request->getPost('birth_date'),
            'gender' => $this->request->getPost('gender'),
            'religion' => $this->request->getPost('religion'),
            'blood_type' => $this->request->getPost('blood_type'),
            'marital_status' => $this->request->getPost('marital_status'),
            'address_ktp' => $this->request->getPost('address_ktp'),
            'current_address' => $this->request->getPost('current_address'),
            'email' => $this->request->getPost('email'),
            'phone_number' => $this->request->getPost('phone_number'),
            'emergency_contact' => $this->request->getPost('emergency_contact'),
            'skills' => $this->request->getPost('skills'),
            'willing_to_relocate' => $this->request->getPost('willing_to_relocate'),
            'expected_salary' => $this->request->getPost('expected_salary'),
        ];

        $userModel->insert($userData);

        $employmentData = $this->request->getPost('employment');
        if ($employmentData) {
            foreach ($employmentData as $employment) {
                $employment['user_id'] = $userId;
                $employmentModel->insert($employment);
            }
        }

        $trainingData = $this->request->getPost('training');
        if ($trainingData) {
            foreach ($trainingData as $training) {
                $training['user_id'] = $userId;
                $trainingModel->insert($training);
            }
        }

        $educationData = $this->request->getPost('education');
        if ($educationData) {
            foreach ($educationData as $education) {
                $education['user_id'] = $userId;
                $educationModel->insert($education);
            }
        }

        $db->transComplete();

        if ($db->transStatus() === FALSE) {
            return redirect()->back()->with('error', 'Failed to save data.');
        }

        return redirect()->back()->with('success', 'Data saved successfully.');
        
    }

}
