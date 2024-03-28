<div>
    @if($formType == '')
        <livewire:country.country-record/>
    @else
        <livewire:country.form :country="$country" :formType="$formType"/>
    @endif
</div>
