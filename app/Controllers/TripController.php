<?php
namespace App\Controllers;

use App\Models\TripModel;
use App\Models\CustomerModel;
use App\Models\VehicleModel;
use App\Models\DriverModel;
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
        $driverModel = new DriverModel();

        $data = [
            'trips' => $tripModel
                ->select('trips.*, customers.name as customer_name, vehicles.registration_number as vehicle_registration_number, drivers.name as driver_name, IFNULL(trip_advances.amount, 0) as advance_amount, IFNULL(trip_expenses.id, 0) as expense_id')
                ->join('customers', 'customers.id = trips.customer_id')
                ->join('vehicles', 'vehicles.id = trips.vehicle_id')
                ->join('drivers', 'drivers.id = trips.driver_id')
                ->join('trip_advances', 'trip_advances.trip_id = trips.id', 'left')
                ->join('trip_expenses', 'trip_expenses.trip_id = trips.id', 'left')
                ->findAll(),
            'customers' => $customerModel->findAll(),
            'drivers' => $driverModel->findAll(),
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
            'driver_id' => $this->request->getPost('driver_id'),
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
