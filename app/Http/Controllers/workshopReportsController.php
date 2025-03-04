<?php

namespace App\Http\Controllers;

use App\Models\workshopReports;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class workshopReportsController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [new Middleware('auth:sanctum', except: ['index', 'show'])];
    }

    public function index(Request $request)
    {
        $query = workshopReports::query();
    
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->get('search');
            $query->where(function ($query) use ($searchTerm) {
                $query->where('workshop_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('total_transactions', 'like', '%' . $searchTerm . '%')
                    ->orWhere('total_revenue', 'like', '%' . $searchTerm . '%')
                    ->orWhere('total_spare_parts_sold', 'like', '%' . $searchTerm . '%')
                    ->orWhere('total_services_completed', 'like', '%' . $searchTerm . '%')
                    ->orWhere('report_period', 'like', '%' . $searchTerm . '%');
            });
        }
    
        $workshopreports = $query->get();
    
        $totals = $query->selectRaw('
                SUM(total_transactions) as total_transactions,
                SUM(total_revenue) as total_revenue,
                SUM(total_spare_parts_sold) as total_spare_parts_sold,
                SUM(total_services_completed) as total_services_completed
            ')->first(); 
    
        return response()->json([
            'workshopReports' => $workshopreports,
            'totals' => $totals
        ]);
    }
    

    public function store(Request $request)
    {
        $fields = $request->validate([
            'workshop_id' => 'required',
            'total_transactions' => 'required',
            'total_revenue' => 'required',
            'total_spare_parts_sold' => 'required',
            'total_services_completed' => 'required',
            'report_period' => 'required',
        ]);

        $workshopreport = workshopReports::create($fields);

        return $workshopreport;
    }

    public function show($id)
    {
        $workshopreport = workshopReports::find($id);

        if (!$workshopreport) {
            return response()->json(['message' => 'Workshop report not found'], 404);
        }

        return response()->json($workshopreport);
    }

    public function update(Request $request, workshopReports $workshopreport)
    {
        $fields = $request->validate([
            'workshop_id' => 'required',
            'total_transactions' => 'required',
            'total_revenue' => 'required',
            'total_spare_parts_sold' => 'required',
            'total_services_completed' => 'required',
            'report_period' => 'required',
        ]);

        $workshopreport->update($fields);

        return $workshopreport;
    }

    public function destroy(workshopReports $workshopreport)
    {
        $workshopreport->delete();

        return response()->json(['message' => 'Workshop report deleted']);
    }
}
