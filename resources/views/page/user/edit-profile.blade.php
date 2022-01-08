<x-app-layout>
      <x-container>
            <h1 class="text-2xl font-bold mb-4">Edit Profile</h1>
            <div class="grid grid-cols-2">
                  <form action="{{ route('profile.update',$user->username) }}" method="POST">
                        @csrf
                        @method('put')
                        <x-card>
                            <div class="w-full">
                              <div class="mb-3">
                                    <x-label>Name</x-label>
                                    <x-input class="w-full" type="text" name="name" value="{{ old('name',$user->name) }}"/>
                              </div>
                              <div class="mb-3">
                                    <x-label>Username</x-label>
                                    <x-input class="w-full" type="text" name="username" value="{{ old('username',$user->username) }}"/>
                              </div>
                              <div class="mb-3">
                                    <x-label>Email</x-label>
                                    <x-input class="w-full" type="text" name="email" value="{{ old('email',$user->email) }}"/>
                              </div>
                              <x-button  onclick="return confirm('update profile?')">Update</x-button>
                            </div>
                        </x-card>
                  </form>
            </div>
      </x-container>
</x-app-layout>