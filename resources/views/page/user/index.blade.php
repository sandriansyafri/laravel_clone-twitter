<x-app-layout>
      <x-container>
            <h1 class="text-2xl font-semibold mb-6">Users</h1>
            <div class="grid grid-cols-3 gap-6">
                  <x-following :users="$users"></x-following>
            </div>
            <div class="flex items-center justify-center my-6">
                  {{ $users->links() }}
            </div>
      </x-container>
</x-app-layout>