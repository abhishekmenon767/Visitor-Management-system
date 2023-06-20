<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        
        $date = $request->input('date');

        $query = Visitor::query();
        
        if ($date) {
            $query->where(function ($query) use ($date) {
                $query->whereDate('enter_time', $date)
                    ->orWhereNull('out_time');
            });
        }

        $totalVisitors = $query->count();
        $totalVisitorsIn = $query->whereNotNull('enter_time')->count();
        $totalVisitorsOut = $query->whereNotNull('out_time')->count();
        $visitors = $query->orderBy('enter_time', 'desc')->get();

        return view('admin', compact('totalVisitors', 'totalVisitorsIn', 'totalVisitorsOut', 'visitors'));
    }
}
