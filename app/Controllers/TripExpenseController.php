<?php

namespace App\Controllers;

use App\Models\TripExpenseModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class TripExpenseController extends Controller
{
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
        $tripExpenseModel = new TripExpenseModel();

        $tripId = $this->request->getPost('trip_id');
        $driverId = $this->request->getPost('driver_id');
        $bata = $this->request->getPost('bata') ?? 0;
        $vehicleMaintenance = $this->request->getPost('vehicle_maintenance') ?? 0;
        $policeFine = $this->request->getPost('police_fine') ?? 0;
        $otherExpense = $this->request->getPost('other_expense') ?? 0;
        $advance = $this->request->getPost('advance_amount') ?? 0;
        $totalExpense = ($bata + $vehicleMaintenance + $policeFine + $otherExpense) - $advance;

        $data = [
            'trip_id' => $tripId,
            'driver_id' => $driverId,
            'bata' => $bata,
            'vehicle_maintenance' => $vehicleMaintenance,
            'police_fine' => $policeFine,
            'other_expense' => $otherExpense,
            'advance' => $advance,
            'total' => max(0, $totalExpense),
        ];

        if ($tripExpenseModel->insert($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Expense added successfully']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to save expense']);
        }
    }

    public function getExpense($tripId)
    {
        $tripExpenseModel = new TripExpenseModel();
    
        $expense = $tripExpenseModel
            ->select('trip_expenses.*, drivers.name as driver_name')
            ->join('drivers', 'drivers.id = trip_expenses.driver_id', 'left')
            ->where('trip_expenses.trip_id', $tripId)
            ->first();
    
        if ($expense) {
            return $this->response->setJSON(['status' => 'success', 'data' => $expense]);
        }
    
        return $this->response->setJSON(['status' => 'error', 'message' => 'No expense found']);
    }

    public function updateExpense($tripId)
    {
        $expenseModel = new TripExpenseModel();
        $data = $this->request->getPost();
        
        if ($expenseModel->where('trip_id', $tripId)->set($data)->update()) {
            return $this->response->setJSON(['status' => 'success']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update']);
    }

}
