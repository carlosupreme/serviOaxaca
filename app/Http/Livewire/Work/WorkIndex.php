<?php

namespace App\Http\Livewire\Work;

use App\Models\Work;
use Livewire\Component;
use Livewire\WithPagination;

class WorkIndex extends Component
{
    use WithPagination;

    public $search;
    public $status;

    protected $queryString = [
        'search' => ['except' => '', 'as' => 's'],
        'status' => ['except' => '']
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $works = Work::matching($this->search, 'title', 'description', 'skills')
            ->matching($this->status, 'status')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.work.work-index', compact('works'));

    }
}
