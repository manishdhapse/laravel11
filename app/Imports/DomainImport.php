<?php

namespace App\Imports;

use App\Models\Domain;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class DomainImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {


        return new Domain([
            'name' => $row['domain'],
            'status' => $row['status'] ?? 0,
            'lease_to_own' => $row['lease'] ?? 0,
            'buy_now_price' => $row['buy'] ?? 0,
            'floor_price' => $row['floor_price'] ?? 0,
            'minimum_offer' => $row['minimum'] ?? 0,
            'sale_lander' => $row['sale'] ,

        ]);
    }
}
