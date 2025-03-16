<?php

namespace App\Controllers;

use App\Models\DriverModel;

class DriverController extends BaseController
{
    public function __construct()
    {
        // Check if the user is logged in before allowing access to any method in this controller
        if (!session()->get('isLoggedIn')) {
            // If not logged in, redirect to the login page
            return redirect()->to('/auth/login');
        }
    }
    // Display the drivers' list page
    public function index()
    {
        $driverModel = new DriverModel();
        $data['drivers'] = $driverModel->findAll();
        return view('admin/drivers', $data);  // Adjust the view name as needed
    }

    // Handle the driver creation form submission
    public function store()
    {
        $driverModel = new DriverModel();

        // Get POST data
        $data = [
            'name' => $this->request->getPost('name'),
            'number' => $this->request->getPost('number'),
            'address' => $this->request->getPost('address')
        ];

        // Validate and insert the driver
        if ($driverModel->insert($data)) {
            return redirect()->to('admin/drivers')->with('success', 'Driver created successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to create driver!');
        }
    }

    public function delete($id)
    {
        // Initialize the Driver model
        $driverModel = new DriverModel();
        
        // Delete the driver by ID
        $driverModel->delete($id);

        // Redirect back to the drivers page
        return redirect()->to('/admin/drivers');
    }

}
