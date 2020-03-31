<?php

namespace App\Imports;

use App\Saving;
use Maatwebsite\Excel\Concerns\ToArray;

/**
 * Class SavingsImport
 * @package App\Imports
 * @author Shashank Jha <shashankj677@gmail.com>
 */

class SavingsImport implements ToArray
{
    public function array(array $row)
    {
        foreach ($row as $key=>$val){
            if($key != 0 && $key != 1) {
                Saving::create([
                    'acc_type' => $val[5],
                    'name' => $val[2],
                    'acc_id' => $val[1],
                    'address' => $val[4],
                    'contact_no' => $val[3],
                    'money' => $val[6],
                    'interest' => $val[7],
                    'acc_no' => $val[8]
                ]);
            }
        }
    }
}
