<?php

namespace App\Exports;

use App\Models\Inlaws;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class InlawsExport implements FromView,ShouldAutoSize
{
    public function view(): View
    {
        $inlaw = Inlaws::all();
        return view('inlaws.export',['inlaw' => $inlaw]);
    }
}
