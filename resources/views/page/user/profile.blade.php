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
                    <div class="text-sm text-gray-500 mb-3">
                          <p>Created {{ $user->created_at->diffForHumans() }}</p>
                    </div>
                  {{-- @if (auth()->id() != $user->id) --}}
                  @if(auth()->user()->isNot($user))
                    <form action="{{ route('profile.store',$user) }}" method="post">
                        @csrf
                        <x-button>
                            @if (!auth()->user()->follows()->firstWhere('following_user_id', $user->id))
                                Follow
                            @else
                                Un Follow
                            @endif
                        </x-button>
                        </form>
                  @endif
                </div>
            </div>
        </div>
    </x-container>
    <div class="border-t border-gray-300"></div>
    <x-container>
             <div class="flex justify-between items-center">
                   <x-statistica :user="$user"></x-statis>
                    <a href="{{ route('profile.edit',auth()->user()->username) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Edit Profile</a>
             </div>
    </x-container>
    <div class="border-t border-gray-300"></div>
    <x-container>
          <div class="grid grid-cols-2 ">
                <div class="space-y-6">
                  <x-statuses :statuses="$statuses"></x-statuses>
                </div>
          </div>
    </x-container>
</x-app-layout>
