@props(['$trigger'])

<div x-data="{show: false}" @click.away="show = false">
{{--    Button Trigger--}}
    <div @click = "show = ! show">
        {{ $trigger }}
    </div>
 {{--drop down links--}}
    <div class=" py-2 absolute bg-white mt-2 rounded-xl overflow-auto max-h-40 " x-show="show" style="display: none">
      {{$slot}}
    </div>
</div>
