<?php

namespace App\Http\Controllers;

use App\Loan;
use App\LoanBalance;
use App\Share;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class LoanController
 * @package App\Http\Controllers
 * @author Shashank Jha <shashankj677@gmail.com>
 */

class LoanController extends Controller
{

    public function index(Request $request) {
        if ($request->ajax()) {
            $loans = Loan::userId()->latest()->get();
            return Datatables::of($loans)
                ->addColumn('view', function ($row) {
                    $btn = '<a href="'.route("loan.show", $row->id) . '" class="btn btn-sm btn-success" title="View Details"><i class="fa fa-eye"></i> View</a>';
                    return $btn;
                })
                ->addColumn('edit', function ($row) {
                    $btn = '<a href="' . route("loan.edit", $row->id) . '" class="btn btn-sm btn-info" title="Edit Details"><i class="fa fa-edit"></i> Edit</a>';
                    return $btn;
                })
                ->addColumn('delete', function ($row) {
                    $btn = '<button type="button" class="btn btn-sm btn-danger delete-loan" data-id="' . $row->id . '" title="Delete Details"><i class="fa fa-trash"></i> Delete</button>';
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
                ->addColumn('amount', function ($row) {
                    return "Rs ".$row->amount;
                })
                ->addColumn('interest', function ($row) {
                    return $row->interest. " %";
                })
                ->addColumn('date', function($row) {
                    return ($row->creation_date) ? $row->creation_date : $row->created_date;
                })
                ->rawColumns(['view', 'edit', 'delete', 'no', 'name', 'contact_no', 'address', 'amount', 'interest', 'date'])
                ->make(true);
        }
        return view('loan.index');
    }

    public function create() {
        return view('loan.create')
            ->with('nos', Share::userId()->pluck('no'));
    }

    public function store(Request $request)
    {
        $rules = [
            'acc_type' => "required",
            'share_id' => "required|numeric",
            'loan_amount' => "numeric",
            'loan_percent' => "numeric",
        ];
        $custom_messages = [
            'required' => "कृपया यो फिल्ड खाली नराख्नुहोस्",
            'numeric' => "कृपया यस फिल्डमा केवल नम्बरहरू राख्नुहोस्",
        ];
        $this->validate($request, $rules, $custom_messages);

        try {
            DB::beginTransaction();

            $loan = new Loan;
            $loan->user_id = Auth::user()->id;
            $loan->share_no = $request->share_id;
            $loan->loan_type = $request->acc_type;
            $loan->amount = $request->loan_amount;
            $loan->interest = $request->loan_percent;
            $loan->remarks = $request->remarks;
            $loan->creation_date = $request->creation_date;
            $loan->save();

            $balance = new LoanBalance();
            $balance->user_id = Auth::user()->id;
            $balance->loan_id = $loan->id;
            $balance->amount = $request->loan_amount;
            $balance->remarks = $request->remarks;
            $balance->interest = $request->loan_percent;
            $balance->creation_date = $request->creation_date;
            $balance->save();

            DB::commit();

            Session::flash('success', "ऋणको विवरण सफलतापूर्वक थपियो");
            return redirect()->route('loan.index');
        } catch (\Exception $error) {
            DB::rollBack();
            Session::flash('error', $error->getMessage());
            return redirect()->back()
                ->withInput();
        }
    }

    public function show(Loan $loan) {

        $loanBalance = LoanBalance::where('loan_id', $loan->id)->latest()->first();
        $date = ($loan->creation_date) ? $loan->creation_at : $loan->created_at;
        $created_date = Carbon::parse($date, 'UTC');
        $now = Carbon::now();
        $diff = $created_date->diffInDays($now);

        $loan_date = ($loanBalance->creation_date) ? $loanBalance->creation_at : $loanBalance->created_at;
        $new_loan_date = Carbon::parse($loan_date, 'UTC');
        $loan_duration = $new_loan_date->diffInDays($now);

        $interest = ($loanBalance->extra_interest) ? $loanBalance->interest+$loanBalance->extra_interest : $loanBalance->interest;

        $daily_interest = ($diff *($interest/100))/365;

        $interest_amount = $loanBalance->amount*$daily_interest;

        $loan_amount = ($diff > 0) ? $loanBalance->amount+$interest_amount : $loanBalance->amount;

        return view('loan.show')
            ->with('loan', $loan)
            ->with('loan_duration', $loan_duration)
            ->with('loan_balances', LoanBalance::where('loan_id', $loan->id)->get())
            ->with('interest_amount', $interest_amount)
            ->with('loan_amount', $loan_amount);
    }

    public function edit(Loan $loan)
    {
        if($loan) {
            return view("loan.edit")
                ->with('nos', Share::userId()->pluck('no'))
                ->with('loan', $loan);
        } else {
            Session::flash('info', "ऋण डाटा फेला पार्न सकेन");
            return redirect()->back()
                ->withInput();
        }
    }

    public function update(Request $request, Loan $loan)
    {
        $rules = [
            'acc_type' => "required",
            'share_id' => "required|numeric",
            'amount' => "numeric",
            'interest' => "numeric",
        ];
        $custom_messages = [
            'required' => "कृपया यो फिल्ड खाली नराख्नुहोस्",
            'numeric' => "कृपया यस फिल्डमा केवल नम्बरहरू राख्नुहोस्",
            'share_id.unique' => "यस आईडीको बचत खाता पहिले नै अवस्थित छ"
        ];
        $this->validate($request, $rules, $custom_messages);

        try {
            $form_data = array(
                'user_id' => Auth::user()->id,
                'loan_type' => $request->acc_type,
                'share_id' => $request->share_id,
                'amount' => $request->amount,
                'interest' => $request->interest
            );
            DB::beginTransaction();
            $loan->update($form_data);
            DB::commit();
            
            Session::flash('success', "ऋणको विवरण सफलतापूर्वक अपडेट गरिएको छ");
            return redirect()->route('loan.index');
        } catch (\Exception $error) {
            DB::rollBack();
            Session::flash('error', $error->getMessage());
            return redirect()->back()
                ->withInput();
        }
    }

    public function destroy(Loan $loan)
    {
        if($loan) {
            $loan->delete();
            return response("{$loan->name} को खाता सफलतापूर्वक हटाइएको छ");
        } else {
            return response("डाटा फेला पार्न सकेन");
        }
    }

    public function loanBalance(Request $request, $id) {
        $balance_old = LoanBalance::where('loan_id', $id)->latest()->first();
        try {
            DB::beginTransaction();
            $balance = new LoanBalance;
            $balance->user_id = Auth::user()->id;
            $balance->loan_id = $id;
            $balance->payment = $request->amount;
            $balance->amount = $request->saving_amount-$request->amount;
            $balance->interest = $request->interest;
            $balance->extra_interest = $request->extra_interest;
            $balance->creation_date = $request->creation_date;
            $balance->remarks = $request->remarks;
            $balance->save();

            $balance_old->interest_amount = $request->interest_amount;
            $balance_old->loan_amount = $request->saving_amount;
            $balance_old->loan_duration = $request->loan_duration;
            $balance_old->save();

            DB::commit();

            Session::flash('success', "प्रक्रिया सफल भयो");
            return redirect()->route('loan.show', $id);
        } catch(\Exception $error) {
            DB::rollBack();
            Session::flash('error', $error->getMessage());
            return redirect()->back();
        } 
    }
}
