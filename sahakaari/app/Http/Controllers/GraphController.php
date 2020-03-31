<?php

namespace App\Http\Controllers;

use App\Balance;
use App\Loan;
use App\Saving;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class GraphController
 * @package App\Http\Controllers
 * @author Shashank Jha <shashankj677@gmail.com>
 */

class GraphController extends Controller{

    public function savings(Request $request) {
        if ($request->ajax()) {
            $saving_amount_array = array();
            $share_amount_array = array();
            $loan_amount_array = array();
            $date_array = array();

            $start_date = Carbon::parse($request['start_date'], 'UTC');
            $end_date = Carbon::parse($request['end_date'], 'UTC');

            while ($start_date->lte($end_date)) {
                array_push($date_array, $start_date->format("d-M-Y"));

                $shares = Balance::userId()->whereDate('updated_at', $start_date)->get();
                $savings =  Saving::userId()->whereDate('updated_at', $start_date)->get();
                $loans = Loan::userId()->whereDate('updated_at', $start_date)->get();

                $start_date = $start_date->addDay();

                $saving_amount = 0;
                $share_amount = 0;
                $loan_amount = 0;

                foreach ($savings as $saving) {
                    $saving_amount += $saving->money;
                }
                array_push($saving_amount_array, $saving_amount);

                foreach ($shares as $share) {
                    $share_amount += $share->balance;
                }
                array_push($share_amount_array, $share_amount);

                foreach ($loans as $loan) {
                    $loan_amount += $loan->amount;
                }
                array_push($loan_amount_array, $loan_amount);
            }

            $response = array(
                'dates' => $date_array,
                'share_amount' => $share_amount_array,
                'saving_amount' => $saving_amount_array,
                'loan_amount' => $loan_amount_array
            );

            return response($response);
        }
    }
}
