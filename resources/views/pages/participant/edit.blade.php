<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="px-6 pt-6 text-xl font-bold text-gray-500">
                    {{ __('Edit Data Participant') }}
                </div>
                <div class="w-full">
                    <form class="mx-auto max-w-full p-5">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-3">
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                    for="ktp_id">Ktp ID</label>
                                <input
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    id="ktp_id" type="number" value="{{ $participant->ktp_id }}" required />
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                    for="ktp_id">Ktp ID</label>
                                <input
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    id="ktp_id" type="number" required />
                            </div>
                        </div>
                        <button
                            class="rounded-lg bg-orange-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-orange-600 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto"
                            type="submit">Submit</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
