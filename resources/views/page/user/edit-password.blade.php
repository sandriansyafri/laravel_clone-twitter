<x-app-layout>
      <x-container>
            <h1 class="text-2xl font-bold mb-4">Change Password</h1>
          @if (session('status-error'))
            <div class=" grid grid-cols-2">
                  <div class="bg-red-300 rounded-xl p-8 my-4 text-sm font-semibold">
                        {{ session('status-error') }}
                  </div>
            </div>
          @endif
          @if (session('status-success'))
            <div class=" grid grid-cols-2">
                  <div class="bg-green-300 rounded-xl p-8 my-4 text-sm font-semibold">
                        {{ session('status-success') }}
                  </div>
            </div>
          @endif
            <div class="grid grid-cols-2">
               
                  <form action="{{ route('profile-password.update',$user->username) }}" method="POST">
                        @csrf
                        @method('put')
                        <x-card>
                            <div class="w-full">
                              <div class="mb-3">
                                    <x-label>Current Password</x-label>
                                    <x-input class="w-full" type="password" name="current_password" />
                                    @error('current_password') <span class="text-sm text-red-500 font-light">{{ $message }}</span> @enderror
                                    @error('test') <span class="text-sm text-red-500 font-light">{{ $message }}</span> @enderror
                              </div>
                              <div class="mb-3">
                                    <x-label>New Password</x-label>
                                    <x-input class="w-full" type="password" name="password" />
                                    @error('password') <span class="text-sm text-red-500 font-light">{{ $message }}</span> @enderror

                              </div>
                              <div class="mb-3">
                                    <x-label>Confirmation Password</x-label>
                                    <x-input class="w-full" type="password" name="password_confirmation" />
                                    @error('password_confirmation') <span class="text-sm text-red-500 font-light">{{ $message }}</span> @enderror

                              </div>
                              <x-button  >Change</x-button>
                            </div>
                        </x-card>
                  </form>
            </div>
      </x-container>
</x-app-layout>