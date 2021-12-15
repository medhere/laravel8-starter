
@props(['type'=>'default','message'])
{{-- @props(['type' => 'information', 'message'])	//type default to info			 --}}
<div {{ $attributes }} id={$id}>
    {{ $slot }}					
    {{ $type }} : {{ $message }} <br>
    {{ $anotherslot ?? 'You did not use 2nd slot'}}
</div>