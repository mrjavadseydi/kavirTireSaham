<?php

namespace App\Http\Livewire\Admin;


use Livewire\Component;
use Livewire\WithPagination;

class SelfReport extends Component
{
    protected $paginationTheme = 'simple-tailwind';
    use WithPagination;

    public function getReports(){
        $report = new \App\Models\SelfReport();
        $report = $this->filter($report);
        return $report->with('account')->paginate(10);
    }
    public function filter($report){
        return $report;
    }
    public function render()
    {
        return view('livewire.admin.self-report',[
            'payments'=>$this->getReports()
        ])->layout('layouts.admin');
    }
}
