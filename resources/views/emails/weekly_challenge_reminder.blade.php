@component('mail::message')

# Dear {{ $user_email }},

I hope you are well.

Just a reminder about this week's upcoming Weekly challenge tomorrow.
As a reminder, this competition will be available tomorrow starting 00:00
and ends at 11:59 pm. Feel free to take take it at anytime at your convenience.
 <br>


Best regards,<br>
Kum Jude <br>
{{ config('app.name') }}
@endcomponent
