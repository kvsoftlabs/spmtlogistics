<?php
namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\TripModel;
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

    public function submit()
    {
        $customerModel = new CustomerModel();
        $tripModel = new TripModel();

        $data = $this->request->getPost();
        $isAdmin = session()->get('is_admin');  // Assume you store whether the user is an admin in the session


        // Insert Customer
        $customerData = [
            'name' => $data['contact_name'],
            'number' => $data['contact_number']
        ];

        $customerId = $customerModel->insert($customerData);

        // Insert Trip
        $tripData = [
            'customer_id' => $customerId,
            'from_city' => $data['from'],
            'to_city' => $data['to'],
            'material' => $data['material'],
            'weight' => $data['weight'],
            'requested' => true,
            'accepted' => false
        ];

        // Customer submission: Set driver ID to null and requested to true, accepted to false
        $tripData['driver_id'] = null;
        $tripData['requested'] = true;
        $tripData['accepted'] = false;

        $tripModel->insert($tripData);

        // Send Email
        $this->sendEmail($data);

        return redirect()->to('/')->with('success', 'Trip Request Submitted Successfully!');
    }

    public function accept($id)
    {
        $tripModel = new TripModel();

        // Update accepted to true for the given trip ID
        if ($tripModel->updateAcceptedStatus($id)) {
            return redirect()->to('/admin/dashboard')->with('success', 'Trip Accepted Successfully');
        } else {
            return redirect()->to('/admin/dashboard')->with('error', 'Failed to accept trip');
        }
    }

    // Delete the trip by ID
    public function delete($id)
    {
        $tripModel = new TripModel();

        // Delete the trip with the given ID
        if ($tripModel->deleteTrip($id)) {
            return redirect()->to('/admin/dashboard')->with('success', 'Trip Deleted Successfully');
        } else {
            return redirect()->to('/admin/dashboard')->with('error', 'Failed to delete trip');
        }
    }
}
