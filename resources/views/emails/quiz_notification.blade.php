@component('mail::message')

# Dear ,

<br>
@foreach ($quiz as $q)
    <p class="py-3">{{ $quiz->title }} (created by: {{ $quiz->user->name }})</p>
    @component('mail::button', ['url' => route('display.quiz', $quiz->id)])
    {{ __('View Quiz') }}
    @endcomponent
@endforeach

Best regards,<br>
Quizzy Team <br>
{{ config('app.name') }}
@endcomponent