<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Public Q&A') }}
            </h2>
            <a href="{{ route('create.user.question') }}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition">Ask a question</a>
        </div>
    </x-slot>
    <div class="min-h-screen flex flex-col bg-gray-100 items-center md:mx-32 sm:mx-32">
        <h1 class="uppercase font-bold p-3 text-2xl">Edit Answer</h1>
        <div class="w-full bg-white  sm:max-w-2xl mt-6 p-5  shadow-md overflow-hidden sm:rounded-lg prose">
            <h3 class="bg-gray-100 p-3 font-bold ">{!! $answer->answer !!} </h3>
            @if ($errors->any())
                <div><hr>
                    <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>
                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('success'))
            <div class="bg-gray-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full" role="alert">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
                </svg>
                 {{ Session::get('success') }}
              </div>
            @endif

            <form method="POST" action="{{ route('edit.answer', $answer->id) }}">
                @method('PUT')
                @csrf
                <div class="px-4 py-5 sm:p-6 mx-auto">
                    <div class="col-span-4 sm:col-span-4">
                        <label for="answer" class="mb-3 text-l font-bold">Edit asnwer</label>
                        <textarea id="editor" name="answer"  rows="4" class="mt-1 block w-full" placeholder="Type answer here ..." autofocus>{!! $answer->answer !!}</textarea>
                    </div>
                </div>
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        {{ __('Update Answer') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
    </script>
</x-app-layout>