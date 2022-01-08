<x-app-layout>
      <x-container>
          <div class="-my-6 p-6 w-full ">
              <div class="flex space-x-6   py-10 -my-6">
                  <div class="flex-shrink-0">
                      <img
                          class="rounded-full  p-1 border-2 border-gray-00"
                          src="{{ $user->gravatar() }}"
                          alt="{{ $user->name }}"
                      />
                  </div>
                  <div>
                      <div>{{ $user->name }}</div>
                      <div class="text-sm text-gray-500 mb-4">
                            <p>Created {{ $user->created_at->diffForHumans() }}</p>
                      </div>
                     
                  </div>
              </div>
          </div>
      </x-container>
      <div class="border-t border-gray-300"></div>
      <x-container>
               <div class="flex justify-between items-center">
                     <x-statistica :user="$user"></x-statis>
               </div>
      </x-container>
      <div class="border-t border-gray-300"></div>
      <x-container>
            <div class="grid grid-cols-4 gap-6">
                    <x-following :users="$follows"></x-following>
            </div>
      </x-container>

  </x-app-layout>
  