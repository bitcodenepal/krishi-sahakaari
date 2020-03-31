<?php

namespace App\Http\Controllers;

use App\Share;
use App\Balance;
use App\Saving;
use App\SavingBalance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class ShareController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $shares = Share::userId()->latest()->get();
            return Datatables::of($shares)
                ->addColumn('view', function ($row) {
                    $btn = '<a href="' . route("share.show", $row->id) . '" class="btn btn-sm btn-success" title="view Details"><i class="fa fa-eye"></i> View</a>';
                    return $btn;
                })
                ->addColumn('edit', function ($row) {
                    $btn = '<a href="' . route("share.edit", $row->id) . '" class="btn btn-sm btn-info" title="Edit Details"><i class="fa fa-edit"></i> Edit</a>';
                    return $btn;
                })
                ->addColumn('delete', function ($row) {
                    $btn = '<button type="button" class="btn btn-sm btn-danger delete-share" data-id="' . $row->id . '" title="Delete Details"><i class="fa fa-trash"></i> Delete</button>';
                    return $btn;
                })
                ->addColumn('image', function($row) {
                    return "<a href='".asset('sahakaari/public/img/'.$row->image)."' target='_blank'><img src='".asset('sahakaari/public/img/'.$row->image)."' class='img-thumbnail' width='75' /></a>";
                })
                ->rawColumns(['view', 'edit', 'delete', 'image'])
                ->make(true);
        }
        return view('share.index');
    }

    public function create() {
        return view('share.create');
    }

    public function store(Request $request) {
        $rules = [
            'name' => "required",
            'address' => "required",
            'no' => "required|numeric",
            'contact_no' => "required|numeric",
            'grandfather_name' => "required",
            'father_name' => "required",
            'gender' => "required|in:पुरुस,महिला",
            'marital_status' => "required|in:विवाहित,अविवाहित",
            'receipt' => "required|numeric",
            'kittaa' => "required|numeric",
            'balance' => "required|numeric",
            'image'  => 'required|image'
        ];
        $custom_messages = [
            'required' => "कृपया यो फिल्ड खाली नराख्नुहोस्",
            'numeric' => "कृपया यस फिल्डमा केवल नम्बरहरू राख्नुहोस्",
        ];
        $this->validate($request, $rules, $custom_messages);
        
        try {

            $image = $request->image;
            $new_name = Auth::user()->email.rand().".".$image->getClientOriginalExtension();
            $image->move(public_path('img'), $new_name);

            DB::beginTransaction();
            $share = new Share;
            $share->user_id = Auth::user()->id;
            $share->name = $request->name;
            $share->address = $request->address;
            $share->no = $request->no;
            $share->contact_no = $request->contact_no;
            $share->grandfather_name = $request->grandfather_name;
            $share->father_name = $request->father_name;
            $share->gender = $request->gender;
            $share->marital_status = $request->marital_status;
            $share->spouce_name = $request->spouce_name;
            $share->inheritant = $request->inheritant;
            $share->image = $new_name;
            $share->creation_date = $request->creation_date;
            $share->save();

            $balance = new Balance;
            $balance->user_id = Auth::user()->id;
            $balance->share_no = $request->no;
            $balance->receipt = $request->receipt;
            $balance->description = $request->description;
            $balance->kittaa = $request->kittaa;
            $balance->balance = $request->balance;
            $balance->withdraw = $request->withdraw;
            $balance->deposit = $request->deposit;
            $balance->remarks = $request->remarks;
            $balance->creation_date = $request->creation_date;
            $balance->save();
            DB::commit();

            Session::flash('success', "नयाँ खाता सफलतापूर्वक सिर्जना गरियो");
            return redirect()->route('share.index');
        } catch (\Exception $error) {
            DB::rollBack();
            Session::flash('error', $error->getMessage());
            return redirect()->back()
                ->withInput();
        }
    }

    public function show(Share $share)
    {
        $savings = Saving::userId()->where('share_no', $share->no)->get();
        $balances = Balance::where('share_no', $share->no)->get();
        return view('share.show')
            ->with('savings', $savings)
            ->with('share', $share)
            ->with('balances', $balances);
    }

    public function edit(Share $share) {
        return view('share.edit')
            ->with('balance', Balance::userId()->shareNo($share->no)->latest()->first())
            ->with('share', $share);
    }

    public function update(Request $request, Share $share) {
        $rules = [
            'no' => "required|numeric",
            'name' => "required",
            'address' => "required",
            'contact_no' => "required|numeric",
            'grandfather_name' => "required",
            'father_name' => "required",
            'gender' => "required|in:पुरुस,महिला",
            'marital_status' => "required|in:विवाहित,अविवाहित",
        ];

        $custom_messages = [
            'required' => "कृपया यो फिल्ड खाली नराख्नुहोस्",
            'numeric' => "कृपया यस फिल्डमा केवल नम्बरहरू राख्नुहोस्",
        ];
        try {
            $this->validate($request, $rules, $custom_messages);
            if ($request->image == null) {
                $new_name = $request->old_image;
            } else {
                $image = $request->image;
                $new_name = rand().".".$image->getClientOriginalExtension();
                $image->move(public_path('img'), $new_name);
            }
            $form_data = array(
                'no' => $request->no,
                'name' => $request->name,
                'user_id' => Auth::user()->id,
                'address' => $request->address,
                'contact_no' => $request->contact_no,
                'grandfather_name' => $request->grandfather_name,
                'father_name' => $request->father_name,
                'gender' => $request->gender,
                'marital_status' => $request->marital_status,
                'spouce_name' => $request->spouce_name,
                'inheritant' => $request->inheritant,
                'creation_date' => $request->creation_date,
                'image' => $new_name
            );
            DB::beginTransaction();

            $share->update($form_data);

            $balance = Balance::findOrFail($share->id)->latest()->first();
            $balance->receipt = $request->receipt;
            $balance->kittaa = $request->kittaa;
            $balance->balance = $request->balance;
            $balance->creation_date = $request->creation_date;
            $balance->description = $request->description;
            $balance->remarks = $request->remarks;
            $balance->save();

            DB::commit();

            Session::flash('success', "खाता सफलतापूर्वक सम्पादन गरियो");
            return redirect()->route('share.index');            
        } catch (\Exception $error) {
            DB::rollBack();
            dd($error->getMessage());
            Session::flash('error', $error->getMessage());
            return redirect()->back()
                ->withInput();
        }
    }

    public function destroy(Share $share) {
        if($share) {
            $share->delete();
            return response("{$share->name} को खाता सफलतापूर्वक हटाइएको छ");
        } else {
            return response("सेयर खाता फेला पार्न असमर्थ");
        }
    }

    public function shareBalance(Request $request, $id) {
        $balance_old = Balance::where('share_id', $id)->latest()->first();
        if ($balance_old) {
            try {
                DB::beginTransaction();
                $balance = new Balance;
                $balance->share_id = $id;
                $balance->receipt = $request->receipt;
                $balance->description = $request->description;
                if ($request->method == "deposit") {
                    $balance->kittaa = $balance_old->kittaa + $request->kittaa;
                    $balance->deposit = $request->amount;
                    $balance->withdraw = 0;
                    $balance->balance = $balance_old->balance+$request->amount;
                } else {
                    $balance->kittaa =$balance_old->kittaa - $request->kittaa;
                    $balance->deposit = 0;
                    $balance->withdraw = $request->amount;
                    $balance->balance = $balance_old->balance-$request->amount;
                }
                $balance->remarks = $request->remarks;
                $balance->save();
                DB::commit();

                Session::flash('success', "प्रक्रिया सफल भयो");
                return redirect()->route('share.show', $id);
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
