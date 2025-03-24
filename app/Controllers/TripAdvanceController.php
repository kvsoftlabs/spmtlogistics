<?php
namespace App\Controllers;
use App\Models\TripAdvanceModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class TripAdvanceController extends BaseController {
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
    
        // Check if the user is logged in before allowing access to any method in this controller
        if (!session()->get('isLoggedIn')) {
            // If not logged in, redirect to the login page
            header("Location: " . site_url('/admin'));
            exit;
        }
    }
    public function store()
    {
        $tripId = $this->request->getPost('trip_id');
        $driverId = $this->request->getPost('driver_id');
        $amount = $this->request->getPost('amount');

        $tripAdvanceModel = new TripAdvanceModel();

        $existingAdvance = $tripAdvanceModel->where('trip_id', $tripId)->first();

        if ($existingAdvance) {
            // Update existing advance
            $tripAdvanceModel->update($existingAdvance['id'], ['amount' => $amount]);
        } else {
            // Create new advance record
            $tripAdvanceModel->insert([
                'trip_id' => $tripId,
                'driver_id' => $driverId,
                'amount' => $amount
            ]);
        }

        return $this->response->setJSON(['status' => 'success']);
    }

}
