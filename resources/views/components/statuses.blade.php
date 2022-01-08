@foreach ($statuses as $status)
<x-card>
    <div class="flex-shrink-0 mr-3"><img src="{{ $status->user->gravatar() }}" class="w-100 h-100 rounded-full" alt="#" /></div>
    <div>
        <p class="font-bold">
            <a href="{{ route('profile',$status->user->username) }}">{{ $status->user->name }}</a>
        </p>
        <p class="leading-relaxed">{{ $status->body }}</p>
        <small class="text-sm text-gray-500">{{ $status->created_at->diffForHumans() }}</small>
    </div>
</x-card>
@endforeach