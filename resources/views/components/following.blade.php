@foreach ($users as $user)
                    <x-card>
                        <div class="flex-shrink-0 mr-3"><img src="{{ $user->gravatar() }}" class="w-100 h-100 rounded-full" alt="#" /></div>
                        <div>
                            <p class="font-bold">
                                <a href="{{ route('profile',$user->username) }}">{{ $user->name }}</a>
                                @if(auth()->user()->isNot($user))
                                <form action="{{ route('profile.store',$user) }}" method="post">
                                    @csrf
                                    <x-button>
                                        @if (!auth()->user()->follows()->firstWhere('following_user_id', $user->id))
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                          </svg>
                                        @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
                                          </svg>
                                        @endif
                                    </x-button>
                                    </form>
                              @endif
                            </p>
                            @if ($user->pivot)
                                <small class="text-sm text-gray-500">{{ $user->pivot->created_at->diffForHumans() }}</small>
                            @endif
                        </div>
                    </x-card>
@endforeach