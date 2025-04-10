<div class="container mx-auto mt-8">
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Create Spending</h3>
        </div>
        <div class="p-6">
            <form wire:submit.prevent="save">
                <div class="mb-4">
                    <label for="expense_category_id" class="block text-sm font-medium text-gray-700">Expense Category</label>
                    <select id="expense_category_id" wire:model="expense.expense_category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Select Category</option>
                        @foreach($expenseCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('expense.expense_category_id') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                    <input type="number" id="amount" wire:model="expense.amount" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('expense.amount') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" wire:model="expense.description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                    @error('expense.description') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                    <input type="date" id="date" wire:model="expense.date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('expense.date') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="payment_method" class="block text-sm font-medium text-gray-700">Payment Method</label>
                    <select id="payment_method" wire:model="expense.payment_method" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Select Payment Method</option>
                        <option value="cash">Cash</option>
                        <option value="credit_card">Credit Card</option>
                        <option value="bank_transfer">Bank Transfer</option>
                    </select>
                    @error('expense.payment_method') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
