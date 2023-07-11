<x-app-layout>
    <div class="pt-4">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">

            <div class="w-full sm:max-w-2xl mt-6 p-6 shadow-sm overflow-hidden sm:rounded-lg prose">
                <h2 class="text-center font-bold uppercase" style="color:#008dcd;">Upgrade Account - Validate Payment</h2><hr>
                @if(Session::has('success'))
                    <div class="rounded-lg px-3 mb-3 text-base text-white inline-flex items-center w-full" role="alert" style="background-color: #008dcd;">
                        <p class="text-white font-bold">{{ Session::get('success') }}</p>
                    </div>
                @endif
                @if(Session::has('error'))
                    <div class="rounded-lg px-3 mb-3 text-base text-white inline-flex items-center w-full" role="alert" style="background-color: red;">
                        <p class="text-white font-bold">{{ Session::get('error') }}</p>
                    </div>
                @endif
                <h3 class="font-semibold text-center">Enter Transaction Id to activate your upgrade</strong></h3>                
                <div class="flex flex-col p-3">
                    @if ($errors->any())
                        <div>
                            <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>
                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="p-3 bor">
                    <form method="POST" action="{{ route('post.validate.payment', $id) }}">
                        @csrf
                        <div class="flex flex-col p-3  justify-center">
                            <div class="p-2">
                                <input type="text" name="transaction_id" placeholder="Transaction ID" style="width:100%;">
                            </div>
                            <div class="p-2 flex flex-row justify-center">
                                <button type="submit" class="inline-flex items-center justify-center px-4 mt-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition">Validate</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

