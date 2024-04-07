<div>
    @if($formType == '')
    <livewire:shop.shop-record/>
    @else
    <livewire:shop.form :shops="$shops" :formType="$formType"/>
    @endif
</div>
