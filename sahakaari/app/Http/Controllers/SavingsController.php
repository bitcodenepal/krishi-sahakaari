<?php

namespace App\Http\Controllers;

use App\Balance;
use App\SavingBalance;
use App\Saving;
use App\Share;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class SavingsController
 * @package App\Http\Controllers
 * @author Shashank Jha <shashankj677@gmail.com>
 */

class SavingsController extends Controller
{

    public function index(Request $request) {
        if ($request->ajax()) {
            $savings = Saving::userId()->latest()->get();
            return Datatables::of($savings)
                ->addColumn('view', function ($row) {
                    $btn = '<a href="' . route("savings.show", $row->id) . '" class="btn btn-sm btn-success" title="view Details"><i class="fa fa-eye"></i> View</a>';
                    return $btn;
                })
                ->addColumn('edit', function ($row) {
                    $btn = '<a href="' . route("savings.edit", $row->id) . '" class="btn btn-sm btn-info" title="Edit Details"><i class="fa fa-edit"></i> Edit</a>';
                    return $btn;
                })
                ->addColumn('delete', function ($row) {
                    $btn = '<button type="button" class="btn btn-sm btn-danger delete-savings" data-id="' . $row->id . '" title="Delete Details"><i class="fa fa-trash"></i> Delete</button>';
                    return $btn;
                })
                ->addColumn('no', function ($row) {
                    return $row->share_no;
                })
                ->addColumn('name', function ($row) {
                    return $row->share->name;
                })
                ->addColumn('contact_no', function ($row) {
                    return $row->share->contact_no;
                })
                ->addColumn('address', function ($row) {
                    return $row->share->address;
                })
                ->rawColumns(['view', 'edit', 'delete', 'no', 'name', 'contact_no', 'address'])
                ->make(true);
        }
        return view('savings.index');
    }

    public function create() {
        return view('savings.create')
            ->with('nos', Share::userId()->pluck('no'));
    }

    public function store(Request $request) {
        $rules = [
            'acc_type' => "required",
            'share_id' => "required|numeric",
            'money' => "numeric",
            'interest' => "numeric",
        ];
        $custom_messages = [
            'required' => "कृपया यो फिल्ड खाली नराख्नुहोस्",
            'numeric' => "कृपया यस फिल्डमा केवल नम्बरहरू राख्नुहोस्",
            'share_id' => "यस आईडीको बचत खाता पहिले नै अवस्थित छ"
        ];
        $this->validate($request, $rules, $custom_messages);

        try {
            DB::beginTransaction();
            $saving = new Saving;
            $saving->user_id = Auth::user()->id;
            $saving->acc_type = $request->acc_type;
            $saving->share_no = $request->share_id;
            $saving->money = $request->money;
            $saving->interest = $request->interest;
            $saving->acc_no = $request->acc_no;
            $saving->creation_date = $request->creation_date;
            $saving->save();

            $balance = new SavingBalance;
            $balance->user_id = Auth::user()->id;
            $balance->saving_id = $saving->id;
            $balance->description = $request->description;
            $balance->balance = $request->money;
            $balance->withdraw = $request->withdraw;
            $balance->deposit = $request->deposit;
            $balance->remarks = $request->remarks;
            $balance->interest = $request->interest;
            $balance->creation_date = $request->creation_date;
            $balance->save();
            DB::commit();

            Session::flash('success', "नयाँ खाता सफलतापूर्वक सिर्जना गरियो");
            return redirect()->route('savings.index');
        } catch (\Exception $error) {
            DB::rollBack();
            Session::flash('error', $error->getMessage());
            return redirect()->back()
                ->withInput();
        }
    }

    public function show(Saving $saving)
    {
        $saving_balance = SavingBalance::where('saving_id', $saving->id)->latest()->first();
        $date = ($saving_balance->creation_date) ? $saving_balance->creation_at : $saving_balance->created_at;
        $created_date = Carbon::parse($date, 'UTC');
        $now = Carbon::now();
        $diff = $created_date->diffInDays($now);

        $daily_interest = ($diff *($saving_balance->interest/100))/365;

        $saving_amount = ($diff > 0) ? $saving_balance->balance+$saving_balance->balance*$daily_interest : $saving_balance->balance;

        return view('savings.show')
            ->with('saving', $saving)
            ->with('daily_interest', $daily_interest)
            ->with('saving_amount', $saving_amount);
    }

    public function edit(Saving $saving) {
        if($saving) {
            return view("savings.edit")
                ->with('nos', Share::pluck('no'))
                ->with('saving', $saving);
        } else {
            Session::flash('info', "बचत डाटा फेला पार्न सकेन");
            return redirect()->back()
                ->withInput();
        }
    }

    public function update(Request $request, Saving $saving) {
        $rules = [
            'acc_type' => "required",
            'share_id' => "required|numeric",
            'money' => "numeric",
            'interest' => "numeric",
        ];
        $custom_messages = [
            'required' => "कृपया यो फिल्ड खाली नराख्नुहोस्",
            'numeric' => "कृपया यस फिल्डमा केवल नम्बरहरू राख्नुहोस्",
            'share_id.unique' => "यस आईडीको बचत खाता पहिले नै अवस्थित छ"
        ];
        $this->validate($request, $rules, $custom_messages);

        try {
            DB::beginTransaction();
            $saving->user_id = Auth::user()->id;
            $saving->acc_type = $request->acc_type;
            $saving->share_no = $request->share_id;
            $saving->money = $request->money;
            $saving->interest = $request->interest;
            $saving->acc_no = $request->acc_no;
            $saving->creation_date = $request->creation_date;
            $saving->save();

            $balance = SavingBalance::where('saving_id', $saving->id)->latest()->first();
            ($request->description) ? $balance->description = $request->description : "";
            $balance->balance = $request->money;
            $balance->withdraw = 0;
            $balance->deposit = 0;
            ($request->remarks) ? $balance->remarks = $request->remarks : "";
            $balance->creation_date = $request->creation_date;
            $balance->save();
            DB::commit();

            Session::flash('success', "खाता सफलतापूर्वक अपडेट गरिएको छ");
            return redirect()->route('savings.index');
        } catch (\Exception $error) {
            DB::rollBack();
            Session::flash('error', $error->getMessage());
            return redirect()->back()
                ->withInput();
        }
    }

    public function destroy(Saving $saving) {
        if($saving) {
            $saving->delete();
            return response("{$saving->name} को बचत खाता सफलतापूर्वक हटाइएको छ");
        } else {
            return response("बचत डाटा फेला पार्न सकेन");
        }
    }

    public function getShareDetails(Request $request)  {
        $share = Share::userId()->No($request->accId)->get();
        $balance = Balance::userId()->ShareNo($request->accId)->latest()->first()->balance;
        $response = array(
            'share' => $share,
            'balance' => $balance
        );
        return response()->json($response);
    }

    public function savingBalance(Request $request, $id) {
        $balance_old = SavingBalance::where('saving_id', $id)->latest()->first();
        if ($balance_old) {
            try {
                DB::beginTransaction();
                $balance = new SavingBalance;
                $balance->user_id = Auth::user()->id;
                $balance->saving_id = $id;
                $balance->description = $request->description;
                if ($request->method == "deposit") {
                    $balance->deposit = $request->amount;
                    $balance->withdraw = 0;
                    $balance->balance = $balance_old->balance+$request->amount;
                } else {
                    $balance->deposit = 0;
                    $balance->withdraw = $request->amount;
                    $balance->balance = $balance_old->balance-$request->amount;
                }
                $balance->interest = $request->interest;
                $balance->remarks = $request->remarks;
                $balance->creation_date = $request->creation_date;
                $balance->save();
                DB::commit();

                Session::flash('success', "प्रक्रिया सफल भयो");
                return redirect()->route('savings.show', $id);
            } catch(\Exception $error) {
                DB::rollBack();
                Session::flash('error', $error->getMessage());
                return redirect()->back();
            }  
        } else {
            Session::flash('info', "सेयर खाता फेला पार्न असमर्थ");
            return redirect()->back();
        }
    }
}
