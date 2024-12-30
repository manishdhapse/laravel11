<?php

namespace App\Http\Controllers;
use App\Models\Domain;
use Illuminate\Http\Request;
use App\Imports\DomainImport;
use App\Exports\DomainExport;
use Maatwebsite\Excel\Facades\Excel;



class DomainController extends Controller
{
    public function index(Request $request)
    {

    $sortBy = $request->input('sortBy', 'id'); // Default column to sort by
    $sortOrder = $request->input('sortOrder', 'desc'); // Default sort order

    // Get search query
    $search = $request->input('search');

    // Query domains with sorting, search, and pagination
    $domains = Domain::when($search, function ($query, $search) {
        return $query->where('name', 'like', "%{$search}%");
    })
    ->orderBy($sortBy, $sortOrder)
    ->paginate(10)
    ->appends([
        'search' => $search,
        'sortBy' => $sortBy,
        'sortOrder' => $sortOrder,
    ]);

    $listedcount = Domain::where('status', 'Listed')->count();
    $holdcount = Domain::where('status', 'On Hold')->count();


        // Pass search term and paginated data to the view
        return view('template.member.domains.list', compact('domains', 'search', 'sortBy', 'sortOrder','listedcount','holdcount'));
    }

    public function create()
    {
        return view('template.member.domains.create');
    }

    public function store(Request $request)
    {
       // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|unique:domains',
        'status' => 'required',
        'buy_now_price' => 'required|numeric',    // Assuming it's a number
        'floor_price' => 'required|numeric',      // Assuming it's a number
        'minimum_offer' => 'required|numeric',    // Assuming it's a number
        'sale_lander' => 'required',
    ]);

        Domain::create([
            'name' => $request->name,
            'status' => $request->status,
            'buy_now_price' => $request->buy_now_price,
            'floor_price' => $request->floor_price,
            'minimum_offer' => $request->minimum_offer,
            'sale_lander' => $request->sale_lander,
            'views' => $request->views ?? 0,
        ]);

        return redirect('/domains')->with('success', 'Domain created successfully!');
    }

    public function edit($id)
    {
        $domain = Domain::findOrFail($id);
        return view('template.member.domains.edit', compact('domain'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:domains,name,' . $id,
            'status' => 'required',
            'buy_now_price' => 'required',
            'floor_price' => 'required',
            'minimum_offer' => 'required',
            'sale_lander' => 'required',
        ]);

        $domain = Domain::findOrFail($id);
        $domain->update([
            'name' => $request->name,
            'status' => $request->status,
            'buy_now_price' => $request->buy_now_price,
            'floor_price' => $request->floor_price,
            'minimum_offer' => $request->minimum_offer,
            'sale_lander' => $request->sale_lander,
            'views' => $request->views ?? 0,
        ]);

        return redirect('/domains')->with('success', 'Domain updated successfully!');
    }

    public function destroy($id)
    {
        $domain = Domain::findOrFail($id);
        $domain->delete();

        return redirect('/domains')->with('success', 'Domain deleted successfully!');
    }
    public function export()
    {
        return Excel::download(new DomainExport, 'Domain.xlsx');
    }
    public function import(Request $request)
    {
        $request->validate(['file' => 'required|mimes:xlsx,csv']);
        Excel::import(new DomainImport, $request->file('file'));
        return back()->with('success', 'Domain imported successfully!');
    }
}
