<style>
    .bg-primary{
        background-color: #4267B2;
    }
</style>

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center bg-primary px-4 py-2 border border-transparent rounded-md font-bold text-sm text-white uppercase  hover:bg-primary active:bg-primary focus:outline-none  disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
