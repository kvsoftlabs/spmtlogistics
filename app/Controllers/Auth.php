<?php

namespace App\Controllers;
use App\Models\UserModel;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function login()
    {
        helper(['form', 'url']);
        return view('admin/login');
    }

    public function loginSubmit()
    {
        $session = session();
        $userModel = new UserModel();
        $request = service('request');

        // Form Validation Rules
        $rules = [
            'name'    => 'required',
            'password' => 'required|min_length[5]',
        ];

        if (!$this->validate($rules)) {
            return view('admin/login', ['validation' => $this->validator]);
        }

        // Fetch User
        $name = $request->getPost('name');
        $password = $request->getPost('password');
        $remember = $request->getPost('remember');

        $user = $userModel->getUserByUserName($name);

        if ($user && password_verify($password, $user['password'])) {
            $session->set(['user_id' => $user['id'], 'name' => $user['name'], 'isLoggedIn' => true]);
            if ($remember) {
                $cookieData = json_encode(['name' => $name, 'password' => $password]);
                setcookie("remember_me", base64_encode($cookieData), time() + (86400 * 30), "/"); // 30 Days
            }
            return redirect()->to('admin/dashboard');
        } else {
            return view('admin/login', ['error' => 'Invalid User Name or Password']);
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy(); // Destroy the session

        return $this->response->setJSON(['status' => 'success']);
    }
}


