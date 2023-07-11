@if ($errors->any())
<div class="p-3 rounded-md" style="border:1px solid rgb(248 113 113);background-color:rgb(254 226 226);">
    <div {{ $attributes }}>
        <div class="font-bold text-red-600">{{ __('Whoops! Something went wrong.') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
