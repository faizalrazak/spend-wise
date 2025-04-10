<?php

namespace App\Livewire\Expense;

use App\Models\Expense;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{

    public $expenses;
    public $search = '';
    public $perPage = 10;

    public function mount()
    {
        $this->expenses = Expense::where('user_id', Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.spending.index')->layout('layouts.app');
    }
}
