<div>
    @if($formType == '')
    <livewire:city.city-record/>
    @else
    <livewire:city.form :cities="$cities" :formType="$formType"/>
    @endif
</div>
