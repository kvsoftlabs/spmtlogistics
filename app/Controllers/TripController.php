<?php
namespace App\Controllers;

use App\Models\TripModel;
use App\Models\CustomerModel;
use App\Models\VehicleModel;
use CodeIgniter\HTTP\Request;
use CodeIgniter\Controller;

class TripController extends Controller
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
        $tripModel = new TripModel();
        $customerModel = new CustomerModel();
        $vehicleModel = new VehicleModel();

        $data = [
            'trips' => $tripModel
                ->select('trips.*, customers.name as customer_name, vehicles.registration_number as vehicle_registration_number')
                ->join('customers', 'customers.id = trips.customer_id')
                ->join('vehicles', 'vehicles.id = trips.vehicle_id')
                ->findAll(),
            'customers' => $customerModel->findAll(),
            'vehicles' => $vehicleModel->findAll()
        ];

        return view('admin/trips', $data);
    }

    public function store()
    {
        $tripModel = new TripModel();

        $data = [
            'customer_id' => $this->request->getPost('customer_id'),
            'vehicle_id' => $this->request->getPost('vehicle_id'),
            'from_city' => $this->request->getPost('from_city'),
            'to_city' => $this->request->getPost('to_city'),
            'material' => $this->request->getPost('material'),
            'weight' => $this->request->getPost('weight'),
            'requested' => false,
            'accepted' => true
        ];

        $tripModel->insert($data);
        return redirect()->to('/admin/trips')->with('success', 'Trip added successfully');
    }

    public function delete($id)
    {
        $tripModel = new TripModel();
        $tripModel->delete($id);
        return redirect()->to('/admin/trips')->with('success', 'Trip deleted successfully');
    }
}
