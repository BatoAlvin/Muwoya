<?php

namespace App\Exports;

use App\Models\Workingclassgiftexchange;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class WorkingclassExport implements FromView,ShouldAutoSize
{
    public function view(): View
    {
        $workingclassgiftexchange = Workingclassgiftexchange::all();
        return view('workingclassgiftexchange.export',['workingclassgiftexchange' => $workingclassgiftexchange]);
    }
}
