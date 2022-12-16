<?php

namespace App\Exports;

use App\Models\Eldersgiftexchange;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class EldersExport implements FromView,ShouldAutoSize
{
    public function view(): View
    {
        $eldergiftexchange = Eldersgiftexchange::all();
        return view('eldersgiftexchange.export',['eldergiftexchange' => $eldergiftexchange]);
    }
}
