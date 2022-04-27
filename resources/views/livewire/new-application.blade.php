<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <form wire:submit.prevent="store">
                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="grid grid-cols-6 gap-6">                                
                                <div class="col-span-6 sm:col-span-4">
                                    <label class="block font-medium text-sm text-gray-700" for="name">
                                        Date *
                                    </label>
                                    <input
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                        type="date" wire:model.defer="state.start_date" autocomplete="off">
                                    <x-jet-input-error for="state.start_date" class="mt-2" />
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label class="block font-medium text-sm text-gray-700" for="name">
                                        To *
                                    </label>
                                    <input
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                        type="date" wire:model.defer="state.end_date" autocomplete="off">
                                    <x-jet-input-error for="state.end_date" class="mt-2" />
                                </div>
                                <div class="col-span-6 sm:col-span-4"
                                    style="display: flex;flex-direction: row-reverse;justify-content: flex-end;">
                                    <label class="block font-medium text-sm text-gray-700" for="is_half_day">
                                        &nbsp; Is Half Day
                                    </label>
                                    <input
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1"
                                        id="is_half_day" type="checkbox" wire:model.defer="state.is_half_day"
                                        autocomplete="off">
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label class="block font-medium text-sm text-gray-700" for="name">
                                        Type *
                                    </label>
                                    <select
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                        wire:model.defer="state.leave_type_id" autocomplete="off">
                                        <option>Select</option>
                                        @foreach ($leaveType as $type)
                                            <option value="{{ $type->id }}">{{ $type->type }}</option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="state.leave_type_id" class="mt-2" />
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label class="block font-medium text-sm text-gray-700" for="name">
                                        information *
                                    </label>
                                    <textarea class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                        wire:model.defer="state.information" autocomplete="off"
                                        placeholder="Justify your reason"></textarea>
                                    <x-jet-input-error for="state.information" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <div
                            class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                            <div x-data="{ shown: false, timeout: null }" x-init="window.livewire.find('Gd8IfEH9hgihXe4vLI6P').on('saved', () => {
                                clearTimeout(timeout);
                                shown = true;
                                timeout = setTimeout(() => { shown = false }, 2000);
                            })"
                                x-show.transition.out.opacity.duration.1500ms="shown"
                                x-transition:leave.opacity.duration.1500ms="" style="display: none;"
                                class="text-sm text-gray-600 mr-3">
                                Saved.
                            </div>

                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                                wire:loading.attr="disabled" wire:target="photo">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
