
@props(['prop' => 'propdefault','prop2'])
<div {{ $attributes }}>
    {{ $slot }}	<br>				
    {{ $prop }} <br>
    {{ $slot2 }}
</div>
