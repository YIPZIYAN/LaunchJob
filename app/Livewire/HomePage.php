<?php

namespace App\Livewire;

use App\Models\JobPost;
use Livewire\Component;
use PHPUnit\Util\PHP\Job;

class HomePage extends Component
{
    public $search = ''; // For job name search

    public $jobPosts;
    public $selectedJobType = [];
    public $selectedWorkplace = [];
    public $selectedSalary = null;

    // Define job types, workplaces, and salary ranges for filtering
//    public $jobTypes = ['Full-time', 'Part-time', 'Contract', 'Internship', 'Freelance'];
//    public $workplaces = ['Remote', 'On-site', 'Hybrid'];
//    public $salaryRanges = [1000, 2000, 3000, 4000, 5000, 8000, 10000];

    public function mount()
    {
        $this->jobPosts = JobPost::all();
    }

    public function submit()
    {

        // Query builder to search and filter
        $this->jobPosts = JobPost::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
//            ->when(!empty($this->selectedJobType), function ($query) {
//                $query->whereIn('job_type', $this->selectedJobType);
//            })
//            ->when(!empty($this->selectedWorkplace), function ($query) {
//                $query->whereIn('mode', $this->selectedWorkplace);
//            })
//            ->when($this->selectedSalary, function ($query) {
//                $query->where('min_salary', '>=', $this->selectedSalary);
//            })
            ->get();


        return view('livewire.home-page');
    }

    public function render()
    {
        return view('livewire.home-page');
    }
}
