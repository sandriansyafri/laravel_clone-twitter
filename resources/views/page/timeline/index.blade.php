<x-app-layout>
    <x-container>
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-7 space-y-3">
                <x-card>
                    <div class="flex-shrink-0 mr-3"><img src="{{ auth()->user()->gravatar() }}" class="w-100 h-100 rounded-full" alt="#" /></div>
                    <form action="{{ route('timeline') }}" method="post" class="w-full">
                        @csrf
                        <p class="font-bold">
                            <a href="{{ route('profile', auth()->user()->username) }}">{{  auth()->user()->name }}</a>
                        </p>
                            <textarea name="body" placeholder="What is on your mind?" class="w-full rounded-xl p-8 form-textarea resize-none focus:ring focus:ring-gray-200 transition duration-200" ></textarea>
                            <div class="flex items-center justify-between">
                                <div class="icon flex space-x-2">
                                    <div class="icon-1 w-5 h-5 rounded-full bg-gray-700 shadow"></div>
                                    <div class="icon-1 w-5 h-5 rounded-full bg-gray-700 shadow"></div>
                                    <div class="icon-1 w-5 h-5 rounded-full bg-gray-700 shadow"></div>
                                    <div class="icon-1 w-5 h-5 rounded-full bg-gray-700 shadow"></div>
                                </div>
                                <x-button>Tweet</x-button>
                            </div>
                    </form>
                </x-card>
                <div class="border bg-white p-8 rounded-xl shadow">
                    <div class="space-y-5">
                      <x-statuses :statuses="$statuses"></x-statuses>
                    </div>
                </div>
            </div>
            @if (auth()->user()->follows()->count())
            <div class="col-span-5 ">
                <div class="border bg-white p-8 rounded-xl shadow space-y-4">
                    <div class="text-lg font-bold">Recenly Following</div>
                    <x-following :users="auth()->user()->follows()->limit(5)->get()"></x-following>
                </div>
            </div>
            @else
            <div class="col-span-5 ">
                <div class="border bg-white p-8 rounded-xl shadow space-y-4">
                    <div class="text-lg font-bold">Empty Following</div>
                </div>
            </div>
            @endif
    </x-container>
</x-app-layout>
