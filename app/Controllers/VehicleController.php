<?php

namespace App\Controllers;

use App\Models\VehicleModel;
use CodeIgniter\Controller;

class VehicleController extends Controller
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
        $vehicleModel = new VehicleModel();
        $data['vehicles'] = $vehicleModel->findAll();
        return view('admin/vehicles', $data);
    }

    public function store()
    {
        $vehicleModel = new VehicleModel();
        $fileRc = $this->request->getFile('rc_attachment');
        $fileInsurance = $this->request->getFile('insurance_attachment');
        $filePollution = $this->request->getFile('pollution_attachment');

        $rcPath = $fileRc->isValid() ? $fileRc->store('uploads/rc') : null;
        $insurancePath = $fileInsurance->isValid() ? $fileInsurance->store('uploads/insurance') : null;
        $pollutionPath = $filePollution->isValid() ? $filePollution->store('uploads/pollution') : null;

        $vehicleModel->save([
            'vehicle_name' => $this->request->getPost('vehicle_name'),
            'registration_number' => $this->request->getPost('registration_number'),
            'rc_expiry_date' => $this->request->getPost('rc_expiry_date'),
            'rc_attachment' => $rcPath,
            'insurance_expiry_date' => $this->request->getPost('insurance_expiry_date'),
            'insurance_attachment' => $insurancePath,
            'pollution_certificate_expiry_date' => $this->request->getPost('pollution_certificate_expiry_date'),
            'pollution_attachment' => $pollutionPath,
        ]);

        return redirect()->to('admin/vehicles')->with('message', 'Vehicle added successfully');
    }

    public function delete($id)
    {
        $vehicleModel = new VehicleModel();
        $vehicleModel->delete($id);
        return redirect()->to('admin/vehicles')->with('message', 'Vehicle deleted successfully');
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $vehicle = $this->vehicleModel->find($id);

        $data = [
            'vehicle_name' => $this->request->getPost('vehicle_name'),
            'rc_expiry_date' => $this->request->getPost('rc_expiry_date'),
            'insurance_expiry_date' => $this->request->getPost('insurance_expiry_date'),
            'pollution_certificate_expiry_date' => $this->request->getPost('pollution_certificate_expiry_date'),
        ];

        // Handle RC Attachment
        $fileRc = $this->request->getFile('rc_attachment');
        if ($fileRc->isValid() && !$fileRc->hasMoved()) {
            if (!empty($vehicle['rc_attachment']) && file_exists('uploads/' . $vehicle['rc_attachment'])) {
                unlink('uploads/' . $vehicle['rc_attachment']); // Delete old file
            }
            $rcNewName = str_replace(' ', '-', trim($vehicle['registration_number'])) . '-rc.' . $fileRc->getExtension();
            $fileRc->move('uploads/', $rcNewName);
            $data['rc_attachment'] = $rcNewName;
        }

        // Handle Insurance Attachment
        $fileInsurance = $this->request->getFile('insurance_attachment');
        if ($fileInsurance->isValid() && !$fileInsurance->hasMoved()) {
            if (!empty($vehicle['insurance_attachment']) && file_exists('uploads/' . $vehicle['insurance_attachment'])) {
                unlink('uploads/' . $vehicle['insurance_attachment']); // Delete old file
            }
            $insuranceNewName = str_replace(' ', '-', trim($vehicle['registration_number'])) . '-insurance.' . $fileInsurance->getExtension();
            $fileInsurance->move('uploads/', $insuranceNewName);
            $data['insurance_attachment'] = $insuranceNewName;
        }

        // Handle Pollution Certificate Attachment
        $filePollution = $this->request->getFile('pollution_attachment');
        if ($filePollution->isValid() && !$filePollution->hasMoved()) {
            if (!empty($vehicle['pollution_attachment']) && file_exists('uploads/' . $vehicle['pollution_attachment'])) {
                unlink('uploads/' . $vehicle['pollution_attachment']); // Delete old file
            }
            $pollutionNewName = str_replace(' ', '-', trim($vehicle['registration_number'])) . '-pollution.' . $filePollution->getExtension();
            $filePollution->move('uploads/', $pollutionNewName);
            $data['pollution_attachment'] = $pollutionNewName;
        }

        $this->vehicleModel->update($id, $data);
        return redirect()->to('/vehicles')->with('success', 'Vehicle updated successfully!');
    }

}
