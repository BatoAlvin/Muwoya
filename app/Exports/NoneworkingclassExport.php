<?php

namespace App\Exports;

use App\Models\NoneWorkingclassgiftexchange;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class NoneworkingclassExport implements FromView,ShouldAutoSize
{
    public function view(): View
    {
        $noneworkingclassgiftexchange = NoneWorkingclassgiftexchange::all();
        return view('noneworkingclassgiftexchange.export',['noneworkingclassgiftexchange' => $noneworkingclassgiftexchange]);
    }
}
