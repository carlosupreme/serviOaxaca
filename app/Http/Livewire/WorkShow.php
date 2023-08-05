<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class WorkShow extends Component
{
    public $work;
    public $clientRate;
    public $fechaSolicitada;

    public function mount($work)
    {
        $this->clientRate = 4.9;
        $this->work = $work;
        $deadline = Carbon::createFromTimeString($work->deadline . '00:00:00');
        $this->fechaSolicitada = ucfirst($deadline->getTranslatedDayName()). ' ' . $deadline->day . ' de ' . ucfirst($deadline->getTranslatedMonthName()) . ' del ' . $deadline->year;
    }

    public function render()
    {
        return view('livewire.work-show');
    }
}