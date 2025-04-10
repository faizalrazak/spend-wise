<?php

namespace App\Livewire\Expense;

use App\Models\Expense;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{

    public $expenseCategories = [];

    public $expense = [
        'user_id' => null,
        'expense_category_id' => null,
        'amount' => null,
        'description' => null,
        'date' => null,
        'payment_method' => null,
    ];

    public function mount()
    {
        $this->expenseCategories = \App\Models\ExpenseCategory::all();
    }

    public function render()
    {
        return view('livewire.spending.create')->layout('layouts.app');
    }

    public function save()
    {
        $this->validate([
            'expense.expense_category_id' => 'required|exists:expense_categories,id',
            'expense.amount' => 'required|numeric|min:0',
            'expense.description' => 'nullable|string|max:255',
            'expense.date' => 'required|date',
            'expense.payment_method' => 'nullable|string|max:255',
        ], [
            'expense.expense_category_id.required' => 'The expense category is required.',
            'expense.expense_category_id.exists' => 'The selected expense category is invalid.',
            'expense.amount.required' => 'The amount is required.',
            'expense.amount.numeric' => 'The amount must be a number.',
            'expense.amount.min' => 'The amount must be at least 0.',
            'expense.description.string' => 'The description must be a string.',
            'expense.description.max' => 'The description may not be greater than 255 characters.',
            'expense.date.required' => 'The date is required.',
            'expense.date.date' => 'The date is not a valid date.',
            'expense.payment_method.string' => 'The payment method must be a string.',
            'expense.payment_method.max' => 'The payment method may not be greater than 255 characters.',
        ]);

        $this->expense['user_id'] = Auth::id();
        Expense::create($this->expense);

        session()->flash('message', 'Expense created successfully.');

        return redirect()->route('expenses.index');
    }
}
