@props(['user'])
{{-- @dd($user) --}}
<a class="cursor-pointer" href="{{ route('user.profile.view', ['user' => $user]) }}">
    {{ $slot }}
</a>
