<div>
<meta name="csrf-token" content="{{ csrf_token() }}">


    <div>@foreach ($messages as $item)
{{$item}}
    @endforeach</div>

    @push('scripts')
     

    @endpush

    <script type="text/javascript">
        // Bind a function to a Event (the full Laravel class)
    </script>
</div>
