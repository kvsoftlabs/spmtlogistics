<?php
namespace App\Controllers;
use App\Models\TripAdvanceModel;

class TripAdvanceController extends BaseController {
    public function store() {
        $tripAdvanceModel = new TripAdvanceModel();

        $data = [
            'trip_id' => $this->request->getPost('trip_id'),
            'driver_id' => $this->request->getPost('driver_id'),
            'amount' => $this->request->getPost('amount')
        ];

        $tripAdvanceModel->insert($data);
        return redirect()->to('/admin/trips')->with('success', 'Advance recorded successfully!');
    }
}
