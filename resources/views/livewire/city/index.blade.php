<div>
    @if($isForm)
    <livewire:city.form :cities="$cities" :formType="$formType"/>
    @else
        <livewire:city.city-record/>
    @endif
</div>
