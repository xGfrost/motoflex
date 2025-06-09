<div
    class="flex flex-col grow lg:rounded-l-xl bg-[--tw-content-bg] dark:bg-[--tw-content-bg-dark] border border-gray-300 dark:border-gray-200 lg:ms-[--tw-sidebar-width]">
    <a href="{{ route('services') }}"
       class="inline-block px-4 py-2 mb-4 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
       <-
    </a>
    <div class="flow-root">
        <dl class="-my-3 divide-y divide-gray-200 text-sm dark:divide-gray-700">
            <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900 dark:text-white">Name</dt>

                <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ $service->name }}</dd>
            </div>

            <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900 dark:text-white">Workshop</dt>

                <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ $service->workshop->name ?? '-' }}</dd>
            </div>

            <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900 dark:text-white">Price</dt>

                <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">
                    Rp{{ number_format($service->price, 0, ',', '.') }}</dd>
            </div>

            <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900 dark:text-white">Description</dt>

                <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">
                    {{ $service->description }}
                </dd>
            </div>
        </dl>

    </div>
</div>
