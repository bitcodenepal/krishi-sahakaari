<?php

namespace App\Http\Controllers;

use App\BuyNSell;
use App\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class FoodController
 * @package App\Http\Controllers
 * @author Shashank Jha <shashankj677@gmail.com>
 */

class FoodController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $foods = Food::userId()->latest()->get();
            return Datatables::of($foods)
                ->addColumn('view', function ($row) {
                    $btn = '<button type="button" class="btn btn-sm btn-success buy-sell" data-id="' . $row->id . '" title="View Details" data-toggle="modal" data-target="#buynsell-food"><i class="fa fa-shopping-basket"></i> Buy/Sell</button>';
                    return $btn;
                })
                ->addColumn('edit', function ($row) {
                    $btn = '<a href="' . route("food.edit", $row->id) . '" class="btn btn-sm btn-info" title="Edit Details"><i class="fa fa-edit"></i> Edit</a>';
                    return $btn;
                })
                ->addColumn('delete', function ($row) {
                    $btn = '<button type="button" class="btn btn-sm btn-danger delete-food" data-id="' . $row->id . '" title="Delete Details"><i class="fa fa-trash"></i> Delete</button>';
                    return $btn;
                })
                ->rawColumns(['view', 'edit', 'delete'])
                ->make(true);
        }
        return view('food.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('food.create');
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
            'variety' => "required",
            'species' => "required",
            'weight' => "required",
            'amount' => "required|numeric"
        ];

        $custom_messages = [
            'required' => "कृपया यो फिल्ड खाली नराख्नुहोस्",
            'numeric' => "कृपया यस फिल्डमा केवल नम्बरहरू राख्नुहोस्",
        ];

        $this->validate($request, $rules, $custom_messages);
        try {
            $form_data = array(
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'address' => $request->address,
                'contact_no' => $request->contact_no,
                'variety' => $request->variety,
                'species' => $request->species,
                'weight' => $request->weight,
                'amount' => $request->amount
            );
            DB::beginTransaction();
            Food::create($form_data);
            DB::commit();;

            Session::flash('success', "अन्नको विवरण सफलतापूर्वक थपियो");
            return redirect()->route('food.index');
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
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        return view('food.partial.buynsell')
            ->with('food', $food);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        //
    }

    public function buyAndSell() {
        return view('food.buyNSell')
            ->with('buyNSells', BuyNSell::all());
    }

    public function updateBuyAndSell(Request $request) {
        $food = Food::findOrFail($request->id);

        $previous_weight = (int) substr($food->weight, 0, -1);
        $prevoius_storage_amount = (int) $food->amount;
        $amount_of_1_unit_food = $prevoius_storage_amount/$previous_weight;

        $weight = (int) substr($request->weight, 0, -1);
        $new_quantity = $previous_weight - $weight;
        $new_storage_price = $new_quantity * $amount_of_1_unit_food;
        $new_quantity = strval($new_quantity)."kg";

        try {
            $form_data = array(
                'food_id' => $request->id,
                'type' => $request->type,
                'weight' => $request->weight,
                'amount' => $request->amount
            );
            DB::beginTransaction();
            BuyNSell::create($form_data);

            $food->weight = $new_quantity;
            $food->amount = $new_storage_price;
            $food->save();
            DB::commit();

            Session::flash('success', "अन्नको {$request->type} सफलतापूर्वक भयो");
            return redirect()->route('food.index');

        } catch (\Exception $error) {
            DB::rollBack();
            Session::flash('error', $error->getMessage());
            return redirect()->back()
                ->withInput();
        }
    }
}
