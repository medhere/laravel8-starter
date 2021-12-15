<x-layout>

<p>This is a component view</p>

<p>Single Component</p>
<hr>
<x-mycomponent type='new type' message='new message' id='newid' class='classname' />
======================= <br>
<x-mycomponent message='new message' id='newid' class='classname'>
    <x-slot name="anotherslot">I used the 2nd slot</x-slot>
    <h6>{{ $name }}, this is default slot</h6>			
</x-mycomponent>

<p>Folder Component</p>
<hr>
<x-acomponent prop="prop1 in the middle" prop2="sub prop2 on child">
    <x-acomponent.subcomponent prop3="prop 3 changed">
        this is a sub component
    </x-acomponent.subcomponent>
    ======================= <br>
    <x-acomponent.subcomponent/>
    <br>
    <x-slot name="slot2">This is 2nd parent slot, though on top, will appear below</x-slot>
    Parent Slot Deafult, though under, appears on top
</x-acomponent>

</x-layout>