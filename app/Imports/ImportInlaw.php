<?php

namespace App\Imports;

use App\Models\Inlaws;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportInlaw implements ToModel
{
    public function model(array $row)
   {
       return new Inlaws([
           'inlaw_name' => $row[0],
           'inlaw_names' => $row[1],
       ]);
   }
}
