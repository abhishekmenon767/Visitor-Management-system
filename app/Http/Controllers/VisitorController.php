<?php
namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Http\Requests\VisitorRequest;

class VisitorController extends Controller
{
    public function index()
    {
        $visitors = Visitor::latest()->paginate(5);
    
        return view('visitor', compact('visitors'));
    }
    
    
public function checkout($id, Request $request)
{
    $visitor = Visitor::findOrFail($id);
    $visitor->out_time = $request->input('out_time');
    $visitor->save();

    return redirect('visitor')->with('success', 'Visitor checked out successfully.');
}

   

public function store(VisitorRequest $request)
{
    $validatedData = $request->validate([
        'name' => 'string',
        'email' => 'email',
        'mobile_no' => 'numeric|min:10',
        'address' => 'string',
        'meet_person_name' => 'string',
        'department' => 'string',
        'reason_to_meet' => 'string',
        'enter_time' => 'date',
        'out_time' => 'date'
        // other validation rules
    ]);

    $visitor = Visitor::create($validatedData);
    Alert::success('Success', 'Visitor added successfully.')->autoclose(3000);

    return redirect('visitor');
}

    public function view(Request $request)
    {
        $visitors = Visitor::latest()->get();

        return view('allvisitors')->with('visitors', $visitors);
    }

    public function build()
    {
        try {
            // dd('sada');
            $visitors = Visitor::all();
            return view('visitors.build', ['visitors' => $visitors]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        
        
    }
    public function search(Request $request)
{
    $keyword = $request->input('keyword');
    $visitors = Visitor::where('name', 'LIKE', "%$keyword%")
                        ->orWhere('department', 'LIKE', "%$keyword%")
                        ->orWhere('reason_to_meet', 'LIKE', "%$keyword%")
                        ->latest()
                        ->paginate(5);

    return view('allvisitors', compact('visitors'));
}
   
    
    
    
    
}
