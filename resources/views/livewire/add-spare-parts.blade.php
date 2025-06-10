<!-- Card Section -->
<div class="max-w-2xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Card -->
    <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7 dark:bg-neutral-900">
      <div class="text-center mb-8">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-neutral-200">
          Spare Parts
        </h2>
        <p class="text-sm text-gray-600 dark:text-neutral-400">
          Add
        </p>
      </div>

      <form wire:submit="save">
        <!-- Section -->
        <div class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
          <label for="af-payment-billing-contact" class="inline-block text-sm font-medium dark:text-white">
            Workshop Id
          </label>

          <div class="sm:col-span-9">
            <select wire:model="workshop_id"
                class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                <option selected="">Select Workshop</option>
                @foreach ($all_workshops as $workshop)
                    <option value="{{ $workshop->id }}" wire:key="{{ $workshop->id }}">{{ $workshop->name }}
                    </option>
                @endforeach

            </select>
            @error('workshop_id')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
    </div>
        <!-- End Section -->
        <!-- Section -->
        <div class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
            <label for="af-payment-billing-contact" class="inline-block text-sm font-medium dark:text-white">
              Name
            </label>

            <div class="mt-2 space-y-3">
                <input id="af-payment-billing-contact" wire:model="spareparts_name" type="text"
                    class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                    placeholder="Name">
                @error('spareparts_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
          </div>
          <!-- End Section -->
          <!-- Section -->
        <div class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
            <label for="af-payment-billing-contact" class="inline-block text-sm font-medium dark:text-white">
              Description
            </label>

            <div class="mt-2 space-y-3">
                <input id="af-payment-billing-contact" wire:model="spareparts_description" type="text"
                    class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                    placeholder="Description">
                @error('spareparts_description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
          </div>
          <!-- End Section -->
          <!-- Section -->
        <div class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
            <label for="af-payment-billing-contact" class="inline-block text-sm font-medium dark:text-white">
              Price
            </label>

            <div class="mt-2 space-y-3">
                <input id="af-payment-billing-contact" wire:model="spareparts_price" type="text"
                    inputmode="decimal" oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                    class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                    placeholder="Price">

                @error('spareparts_price')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
          </div>
          <!-- End Section -->
          <!-- Section -->
        <div class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
            <label for="af-payment-billing-contact" class="inline-block text-sm font-medium dark:text-white">
              Stock
            </label>

            <div class="mt-2 space-y-3">
                <input id="af-payment-billing-contact" wire:model="spareparts_stock" type="text"
                    inputmode="decimal" oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                    class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                    placeholder="Duration">
                @error('spareparts_stock')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
          </div>
          <!-- End Section -->
          <div class="mt-5 flex justify-end gap-x-2">
            <button type="submit"
                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                <div wire:loading
                    class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white-600 rounded-full dark:text-blue-500"
                    role="status" aria-label="loading">
                    <span class="sr-only">Loading...</span>
                </div>
                Submit and Save
            </button>
        </div>

      </form>


    </div>
    <!-- End Card -->
  </div>
  <!-- End Card Section -->
