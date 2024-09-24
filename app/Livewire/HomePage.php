<?php

namespace App\Livewire;

use App\Models\JobPost;
use App\Models\JobType;
use Livewire\Component;
use PHPUnit\Util\PHP\Job;

class HomePage extends Component
{
    public $search = ''; // For job name search

    public $jobPosts;
    public $selectedPeriod = [];
    public $selectedMode = [];
    public $selectedType = [];

    public $selectedSalary = null;

    public $typeId = 0;

    public $periodList = ['Full-time', 'Part-time', 'Contract', 'Internship', 'Freelance'];
    public $modeList = ['Remote', 'On-site', 'Hybrid'];
    public $typeList;
    public $salaryList = [1000, 2000, 3000, 4000, 5000, 8000, 10000];

    public function mount()
    {
        $this->jobPosts = JobPost::all();

        $this->typeList = JobType::select('id', 'name')
            ->get()
            ->map(function ($jobType) {
                return $jobType->name;
            })
            ->toArray();


//        dd($this->typeList,$this->periodList);
    }


    public function submit()
    {

        // Query builder to search and filter
        $this->jobPosts = JobPost::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->when(!empty($this->selectedType), function ($query) {
                $query->whereIn('job_type_id', $this->selectedType);
            })
            ->when(!empty($this->selectedPeriod), function ($query) {
                $query->whereIn('period', $this->selectedPeriod);
            })
            ->when(!empty($this->selectedMode), function ($query) {
                $query->whereIn('mode', $this->selectedMode);
            })
            ->when($this->selectedSalary, function ($query) {
                $query->where(function ($query) {
                    $query->where('min_salary', '<=', $this->selectedSalary)
                          ->where('max_salary', '>=', $this->selectedSalary);
                });
            })
            ->get();


    }

    public function render()
    {
        return view('livewire.home-page');
    }
}
