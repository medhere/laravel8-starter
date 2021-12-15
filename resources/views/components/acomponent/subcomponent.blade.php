@aware(['prop2'])	{{-- get prop2 from parent --}}
<div {{ $attributes }}>
    {{ $slot }}	<br>
	{{ $prop2 }} <br>
	{{ $prop3 ?? 'Default No Prop 3' }} <br>
</div>
