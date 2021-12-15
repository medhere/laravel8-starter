{{-- for blade mail --}}
<div>
    <img src="{{ $message->embed('pathToImage') }}">
    Price: {{ $orderPrice }}
</div>

{{-- for markdown --}}
@component('mail::message')
# Introduction
The body of your message.

@component('mail::panel')
This is the panel content.
@endcomponent

@component('mail::button', ['url' => $url, 'color' => 'success'])	//primary, success, and error
View Order
@endcomponent

@component('mail::table')
| Laravel       | Table         | Example  |
| ------------- |:-------------:| --------:|
| Col 2 is      | Centered      | $10      |
| Col 3 is      | Right-Aligned | $20      |
@endcomponent


Thanks,<br>
{{ $name  }}
@endcomponent
