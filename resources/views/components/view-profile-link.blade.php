@props(['user'])
{{-- @dd($user) --}}
<a wire:navigate class="cursor-pointer" href="{{ route('user.profile.view', ['user' => $user]) }}">
    {{ $slot }}
</a>
