<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('login');
    }

    public function authenticate()
    {
        $username = trim((string) $this->request->getPost('username'));
        $password = trim((string) $this->request->getPost('password'));

        $validationErrors = [];
        if (empty($username)) {
            $validationErrors[] = "Username cannot be empty";
        } elseif (strlen($username) < 5) {
            $validationErrors[] = "Username must be at least 5 characters long";
        }
        if (empty($password)) {
            $validationErrors[] = "Password cannot be empty";
        }

        if (count($validationErrors) > 0) {
            session()->setFlashdata('errors', $validationErrors);
            return redirect()->back()->withInput();
        }

        $user = $this->userModel->getUserByUsername($username);

        if (!$user) {
            session()->setFlashdata('message', 'Invalid login credentials');
            return redirect()->back()->withInput();
        }

        if (password_verify($password, $user['password'])) {
            session()->set('isLoggedIn', true);
            session()->set('user_id', $user['user_id']);
            session()->set('username', $username);
            session()->set('is_admin', $user['is_admin']);
            session()->setFlashdata('success', 'Login successful');

            // var_dump($_SESSION);
            // die();

            return redirect()->to('/'); 
        } else {
            session()->setFlashdata('message', 'Invalid login credentials');
            return redirect()->back()->withInput();
        }
    }

    public function createAccount()
    {
        $username = trim((string) $this->request->getPost('signup_username'));
        $password = trim((string) $this->request->getPost('signup_password'));

        if (empty($username) || empty($password)) {
            session()->setFlashdata('message', 'Username and password cannot be empty');
            return redirect()->back()->withInput();
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'username' => $username,
            'password' => $hashedPassword
        ];

        $this->userModel->createUser($data);
        session()->setFlashdata('success', 'Account created successfully');
        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->remove('isLoggedIn');
        session()->remove('username');
        session()->setFlashdata('success', 'Logged out successfully');
        return redirect()->to('/login');
    }
}
