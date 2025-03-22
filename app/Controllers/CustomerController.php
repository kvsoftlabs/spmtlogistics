<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Controller;

class CustomerController extends Controller
{
    public function __construct()
    {
        // Check if the user is logged in before allowing access to any method in this controller
        if (!session()->get('isLoggedIn')) {
            // If not logged in, redirect to the login page
            return redirect()->to('/auth/login');
        }
    }

    public function index()
    {
        $customerModel = new CustomerModel();
        $data['customers'] = $customerModel->findAll();

        return view('admin/customers', $data);
    }

    public function create()
    {
        return view('admin/customers/create');
    }

    public function store()
    {
        $customerModel = new CustomerModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'number' => $this->request->getPost('number'),
            'gst_number' => $this->request->getPost('gst_number'),
            'company_name' => $this->request->getPost('company_name'),
            'address' => $this->request->getPost('address'),
            'approved' => true
        ];

        if ($customerModel->insert($data)) {
            return redirect()->to('/admin/customers')->with('success', 'Customer added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add customer.');
        }
    }

    public function delete($id)
    {
        $customerModel = new CustomerModel();
        $customerModel->delete($id);

        return redirect()->to('/admin/customers')->with('success', 'Customer deleted successfully!');
    }
}
