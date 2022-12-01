<x-layout>
    <x-layout.form :action="route('layout.update',$layout->id)" :layout="$layout" :update="true" />
</x-layout>
