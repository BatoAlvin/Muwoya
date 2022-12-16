<?php

namespace App\Exports;

use App\Models\Studentsgiftexchange;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class StudentsExport implements FromView,ShouldAutoSize
{
    public function view(): View
    {
        $studentgiftexchange = Studentsgiftexchange::all();
        return view('studentsgiftexchange.export',['studentgiftexchange' => $studentgiftexchange]);
    }
}
