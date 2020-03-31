<?php

namespace App\Http\Controllers;

use App\Balance;
use App\Loan;
use App\Saving;
use App\Share;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home')
            ->with('shares_count', Share::userId()->count())
            ->with('shares_amount', Balance::userId()->sum('balance'))
            ->with('savings_count', Saving::userId()->count())
            ->with('total_savings_amount', Saving::userId()->sum('money'))
            ->with('normal_saving_money', Saving::userId()->accType("नियमित")->sum('money'))
            ->with('khutrukke_saving_money', Saving::userId()->accType("खुत्रुके")->sum('money'))
            ->with('self_saving_money', Saving::userId()->accType("ऐच्छिक")->sum('money'))
            ->with('loan_count', Loan::userId()->count())
            ->with('total_loan_amount', Loan::userId()->sum('amount'))
            ->with('ordinary_loan_amount', Loan::userId()->loanType("साधारण")->sum('amount'))
            ->with('mortgage_loan_amount', Loan::userId()->loanType("धितो")->sum('amount'))
            ->with('od_loan_amount', Loan::userId()->loanType("ओभरड्राफ्ट")->sum('amount'));
    }
}
