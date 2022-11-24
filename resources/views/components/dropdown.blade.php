@props(['trigger'])
{{--Trigger--}}
<div x-data="{show: false}" @click.away="show=false" class="relative">
    <div @click="show = !show" class="flex">
        {{$trigger}}
    </div>

    {{--Links--}}
    <div x-show="show" class="py-2 absolute rounded-2xl bg-gray-100 text-black mt-2 w-full rounded z-50 overflow-auto max-h-52"  style="display: none">
        {{$slot}}
    </div>
</div>
