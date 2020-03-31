<?php

namespace App\Http\Controllers;

use App\Imports\SavingsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class ImportController
 * @package App\Http\Controllers
 * @author Shashank Jha <shashankj677@gmail.com>
 */

class ImportController extends Controller
{
    public function index() {
        return view('import');
    }

    public function savingsImport(Request $request) {

        $rule = [
            'select_file'  => 'required|mimes:xls,xlsx'
        ];
        $custom_message = [
            'required' => "कृपया यो फिल्ड खाली नराख्नुहोस्",
            'select_file.mimes' => "कृपया एक्सेल फाइल मात्र चयन गर्नुहोस्"
        ];
        $this->validate($request, $rule, $custom_message);
        try {
            DB::beginTransaction();
            Excel::import(new SavingsImport(),$request->file('select_file'));
            DB::commit();

            Session::flash('success', "डाटा सफलतापूर्वक आयात गरियो");
            return redirect()->back();
        }catch (\Exception $error) {
            DB::rollBack();
            Session::flash('error', $error->getMessage());
            return redirect()->back();
        }
    }
}
