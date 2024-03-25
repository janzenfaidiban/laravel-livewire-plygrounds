<div>
    @if($isForm)
    <livewire:shop.form :shops="$shops" :formType="$formType"/>
    @else
        <livewire:shop.shop-record/>
    @endif
</div>
