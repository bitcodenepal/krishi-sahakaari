<?php

namespace App\Http\Controllers;

use App\Harvester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class HarvesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $harvesters = Harvester::userId()->latest()->get();
            return Datatables::of($harvesters)
                ->addColumn('view', function ($row) {
                    $btn = '<button type="button" class="btn btn-sm btn-success view-harvester" data-id="' . $row->id . '" title="View Details" data-toggle="modal" data-target="#buynsell-food"><i class="fa fa-eye"></i> View</button>';
                    return $btn;
                })
                ->addColumn('edit', function ($row) {
                    $btn = '<a href="' . route("harvester.edit", $row->id) . '" class="btn btn-sm btn-info" title="Edit Details"><i class="fa fa-edit"></i> Edit</a>';
                    return $btn;
                })
                ->addColumn('delete', function ($row) {
                    $btn = '<button type="button" class="btn btn-sm btn-danger delete-food" data-id="' . $row->id . '" title="Delete Details"><i class="fa fa-trash"></i> Delete</button>';
                    return $btn;
                })
                ->rawColumns(['view', 'edit', 'delete'])
                ->make(true);
        }
        return view('harvester.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('harvester.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => "required",
            'address' => "required",
            'contact_no' => "required|numeric",
            'use_address' => "required",
            'use_date' => "required",
            'amount' => "required|numeric"
        ];

        $custom_messages = [
            'required' => "कृपया यो फिल्ड खाली नराख्नुहोस्",
            'numeric' => "कृपया यस फिल्डमा केवल नम्बरहरू राख्नुहोस्",
        ];

        $this->validate($request, $rules, $custom_messages);
        try {
            $form_data = array(
                'name' => $request->name,
                'user_id' => Auth::user()->id,
                'address' => $request->address,
                'contact_no' => $request->contact_no,
                'use_address' => $request->use_address,
                'use_date' => $request->use_date,
                'amount' => $request->amount,
                'description' => $request->description
            );
            DB::beginTransaction();
            Harvester::create($form_data);
            DB::commit();

            Session::flash('success', "हार्वेस्टर प्रयोगको विवरण सफलतापूर्वक थपियो");
            return redirect()->route('harvester.index');
        } catch (\Exception $error) {
            DB::rollBack();
            Session::flash('error', $error->getMessage());
            return redirect()->back()
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Harvester  $harvester
     * @return \Illuminate\Http\Response
     */
    public function show(Harvester $harvester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Harvester  $harvester
     * @return \Illuminate\Http\Response
     */
    public function edit(Harvester $harvester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Harvester  $harvester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Harvester $harvester)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Harvester  $harvester
     * @return \Illuminate\Http\Response
     */
    public function destroy(Harvester $harvester)
    {
        //
    }
}
