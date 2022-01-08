<div class="flex space-x-6">
      <a href="{{ route('profile',$user->username) }}">
            <x-card>
                  <div class="text-center">
                        <p class="text-xs">Status</p>
                        <p class="text-xl font-semibold">
                              {{ $user->statuses->count() }}
                        </p>
                  </div>
            </x-card>
      </a>
      <a href="{{ route('profile.following',[$user->username,'following']) }}">
            <x-card>
                  <div class="text-center">
                        <p class="text-xs">Following</p>
                        <p class="text-xl font-semibold">
                              {{ $user->follows()->count() }}
                        </p>
                  </div>
            </x-card>
      </a>
      <a href="{{ route('profile.following',[$user->username,'followers']) }}">
            <x-card>
                  <div class="text-center">
                        <p class="text-xs">Followers</p>
                        <p class="text-xl font-semibold">
                              {{ $user->followers->count() }}
                        </p>
                  </div>
            </x-card>
      </a>
 </div>