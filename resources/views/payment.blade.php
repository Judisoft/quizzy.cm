<x-guest-layout>
    <div style="background-color:#4267B2">
        <div class="pt-4">
            <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
                <div class="w-full sm:max-w-2xl mt-6 p-6 shadow-sm overflow-hidden sm:rounded-lg prose bg-white">
                    <h2 class="text-center font-extrabold uppercase" style="color:#4267B2;">Quizzy Subscription</h2><hr>
                    <h5 class="font-bold ">You have choosen <span>{{ $plan }} </span>plan</h5>
                    <h3 class="font-extrabold" style="color:#4267B2;" class="uppercase">Amount : {{ $amount }} fcfa</h3>
                    @if(Session::has('success'))
                        <div class="rounded-lg px-3 mb-3 text-base text-white inline-flex items-center w-full" role="alert" style="background-color: #4267B2;">
                            <p class="text-white font-bold">{{ Session::get('success') }}</p>
                        </div>
                    @endif
                    @if(Session::has('error'))
                        <div class="rounded-lg px-3 mb-3 text-base text-white inline-flex items-center w-full" role="alert" style="background-color: red;">
                            <p class="text-white font-bold">{{ Session::get('error') }}</p>
                        </div>
                    @endif
                    <h3 class="font-semibold">Pay via (Choose a payment method)</strong></h3>
                    <div class="flex flex-col">
                        <label class="py-3 px-2">
                            <input type="radio" name="payment_method" value="momo" id="momo" onclick="paymentMethod(this.value)">
                            MTN Mobile Money
                        </label>
                        <label class="py-3 px-2">
                            <input type="radio" name="payment_method" value="om" id="om" onclick="paymentMethod(this.value)">
                            Orange Money
                        </label>
                        <label class="py-3 px-2">
                            <input type="radio" name="payment_method" value="quiz_pay" id="quizPay" onclick="paymentMethod(this.value)">
                            Quizzy Pay (Account Balance: <span class="font-bold">{{ $acc_balance->amount. ' '. 'FCFA' }}</span>)
                        </label>
                    </div>
                    <div class="flex flex-col mt-4 p-3">
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
                        <div id="paymentInfo"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
<script>
    // quizPay = document.createElement("quizPay")
    // momo = document.getElementsById("momo")
    // om = document.getElementsById("om")

    function paymentMethod(id)
    {
        let amount = {!! json_encode($amount) !!}
        let payment_methods = {
                            "momo": "MTN Mobile Money",
                            "om": "OrangeMoney",
                            "quiz_pay": "Quizzy Pay"
        }
        let paymentInfo = document.getElementById("paymentInfo")
        let p_method = document.getElementById(id)

        if (id === 'quiz_pay') {
            paymentInfo.style.display = 'none'
        } else {
            paymentInfo.style.display = 'block'
            paymentInfo.innerHTML = `<div class="p-3 border bg-gray-200 rounded-md">
                                    <form method="POST" action="{{ route('post.payment') }}">
                                        @csrf
                                        <div class="flex p-3">
                                            <label for="payment_method" class="px-4">Payment Method: <span class="font-bold">${payment_methods[id]}</span> </label>
                                            <input type="hidden" class="bg-transparent"  name="payment_method" value="${id}">
                                        </div>
                                        <div class="pt-4 p-3 flex">
                                            <label for="amount" class="px-4">Amount:<span class="font-bold">${amount} FCFA</span> </label>
                                            <input  type="hidden" name="amount" value="${amount}">
                                        </div>
                                        <div class="pt-4 flex flex-row p-3">
                                            <input type="text" name="telephone" placeholder="Telephone number" value="{{ old('telephone') }}">
                                            <label  class='px-4'><span class='text-red-600'>*</span>Enter the telephone number associated with your ${payment_methods[id]}</label>
                                        </div>
                                        <div class="pt-4 flex flex-row p-3">
                                            <button type="submit" class="inline-flex items-center justify-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition">Validate</button>
                                        </div>
                                    </form>
                                </div>`
        }
    }
</script>
