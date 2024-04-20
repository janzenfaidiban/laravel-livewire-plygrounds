@props(['name' => '', 'event' => null, 'label' => ''])

<div
    x-effect="
       searchLower = search.toLowerCase()
        result = data.filter(
             item => item['name'].toLowerCase().includes(searchLower)
        )
    "
>
    <input type="hidden" x-bind:value="selectedId" name="{{$name}}" wire:model.blur="{{$name}}">
    <label>{{$label}}</label>

    <div class="border border-gray-300 min-h-10 rounded-md p-2 cursor-text items-center mt-1" @click="selectOpen = true">
        <span class="text-sm" x-show="!selectOpen" x-text=" !selectedName ? 'Select' : selectedName "></span>
        <input type="text" class="form-control block w-full py-2 ps-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="search..." x-model="search" x-show="selectOpen"/>
    </div>
    <div class="bg-white rounded-lg p-2 shadow-md space-y-2" x-show="selectOpen">
        <template x-for="item in result">
            <button
                type="button"
                x-text="item.name"
                class="block text-md w-full text-left hover:text-red-400"
                x-on:click="
                    selectedId = item.id;
                    selectedName = item.name;
                    selectOpen = false;
                    search = '';
                    if(@js($event)){
                        $wire.dispatch(@js($event), { id : item.id });
                    }
                "
            ></button>
        </template>
    </div>
</div>
