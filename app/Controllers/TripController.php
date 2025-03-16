<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CustomerModel;
use App\Models\TripModel;

class TripController extends Controller
{
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

        if ($isAdmin) {
            // Admin submission: Add driver ID and set accepted to true, requested to false
            $tripData['driver_id'] = $data['driver_id']; // Assuming the driver ID is sent in the request
            $tripData['requested'] = false;
            $tripData['accepted'] = true;
        } else {
            // Customer submission: Set driver ID to null and requested to true, accepted to false
            $tripData['driver_id'] = null;
            $tripData['requested'] = true;
            $tripData['accepted'] = false;
        }

        $tripModel->insert($tripData);

        // Send Email
        $this->sendEmail($data);

        return redirect()->to('/')->with('success', 'Trip Request Submitted Successfully!');
    }

    private function sendEmail($data)
    {
        $email = \Config\Services::email();
    
        // Set email configurations (can be customized for different email services)
        $emailConfig = [
            'protocol'  => 'smtp',
            'SMTPHost'  => 'smtp.gmail.com',
            'SMTPPort'  => 587,
            'SMTPUser'  => 'kvsoftlabs@gmail.com', // Replace with your email
            'SMTPPass'  => 'npxj bjxg elyx eetn', // Replace with your password
            'SMTPCrypto' => 'tls', // TLS encryption
            'mailType' => 'text',
            'charset' => 'utf-8'
        ];
        $email->initialize($emailConfig);
        $email->setTo('viewvivek93@gmail.com');
        $email->setSubject('New Trip Request');
        $email->setMessage("From: {$data['from']}\nTo: {$data['to']}\nContact Name: {$data['contact_name']}\nContact Number: {$data['contact_number']}");

            // Attempt to send email and check for errors
        if ($email->send()) {
            return true;
        } else {
            // If email sending fails, log the error message
            log_message('error', 'Email sending failed: ' . $email->printDebugger());
            return false;
        }
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
