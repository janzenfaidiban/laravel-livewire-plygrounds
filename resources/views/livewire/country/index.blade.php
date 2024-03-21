<div>
    @if($isForm)
        <livewire:country.form :countries="$countries" :formType="$formType"/>
    @else
        <livewire:country.country-record/>
    @endif
</div>
