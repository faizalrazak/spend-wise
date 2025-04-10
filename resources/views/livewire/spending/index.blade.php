<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <div class="flex flex-col p-5">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <div class="flex justify-between items-center mt-4">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">
                        {{ __('My Expenses') }}
                    </h2>
                </div>
                <div>
                    <a href="{{ route('expense.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                        {{ __('Add Expense') }}
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table id="expensesTable" class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Date') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Description') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Amount') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
                        @foreach($expenses as $expense)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">{{ $expense->date }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $expense->description }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $expense->amount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @push('scripts')
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        $('#expensesTable').DataTable({
                            responsive: true,
                            autoWidth: false,
                            language: {
                                search: "{{ __('Search:') }}",
                                lengthMenu: "{{ __('Show _MENU_ entries') }}",
                                info: "{{ __('Showing _START_ to _END_ of _TOTAL_ entries') }}",
                                paginate: {
                                    first: "{{ __('First') }}",
                                    last: "{{ __('Last') }}",
                                    next: "{{ __('Next') }}",
                                    previous: "{{ __('Previous') }}"
                                }
                            }
                        });
                    });
                </script>
                @endpush
            </div>

        </div>
    </div>
</div>
