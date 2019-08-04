<?php

namespace App\Exports;

use App\Models\Report;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportExport implements FromCollection, WithHeadings
{
    public $year;
    public $month;

    public function __construct($year, $month)
    {
      $this->year = $year;
      $this->month = $month;
    }

    public function collection()
    {
      if ($this->year == 'all' && $this->month == 'all') {
        $data = DB::table('reports')
                ->join('users', 'reports.nik', '=', 'users.nik')
                ->join('sections', 'users.section_id', '=', 'sections.id')
                ->select('users.name', 'users.position','users.brl', 'sections.name as section', 'reports.*')
                ->get();
        return $data;
    }elseif ($this->year == 'all') {
        $data = DB::table('reports')
                ->join('users', 'reports.nik', '=', 'users.nik')
                ->join('sections', 'users.section_id', '=', 'sections.id')
                ->whereMonth('reports.date', '=', $this->month)
                ->select('users.name', 'users.position','users.brl', 'sections.name as section', 'reports.*')
                ->get();
        return $data;
      }elseif ($this->month == 'all') {
        $data = DB::table('reports')
                ->join('users', 'reports.nik', '=', 'users.nik')
                ->join('sections', 'users.section_id', '=', 'sections.id')
                ->whereYear('reports.date', '=', $this->year)
                ->select('users.name', 'users.position','users.brl', 'sections.name as section', 'reports.*')
                ->get();
        return $data;
      }else{
        $data = DB::table('reports')
                ->join('users', 'reports.nik', '=', 'users.nik')
                ->join('sections', 'users.section_id', '=', 'sections.id')
                ->whereMonth('reports.date', '=', $this->month)
                ->whereYear('reports.date', '=', $this->year)
                ->select('users.name', 'users.position','users.brl', 'sections.name as section', 'reports.*')
                ->get();
        return $data;
      }
    }

    public function headings(): array
    {
        return [
            'Name',
            'Position',
            'BRL/LEVEL',
            'Section',
            'ID_Report',
            'NIK',
            'Date',
            'Time',
            'Location',
            'Detail Location',
            'Danger Category',
            'Danger Code',
            'Description',
            'Risk',
            'Action',
            'Status',
            'Created at',
            'Updated at'
        ];
    }
}
