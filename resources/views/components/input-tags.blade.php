@props(['tags' => [], 'event' => null, 'shopTags' => []])
<div>
    <label for="">Tags</label>
    <div
        class="w-full mb-4 mt-2"
        x-data="{
                    search: '',
                    data: @js($tags),
                    tagsAdded: @js($shopTags ?? []),
                    isTagsOpen: false,
                    searchResults(){
                        return this.data.filter(
                            i => i.startsWith(this.search)
                        )
                    },
                    addTags(item, newItem = false){
                        const index = this.tagsAdded.indexOf(item);
                        if (index < 0) {
                            this.tagsAdded.push(item);
                            if (@js($event)){
                                $wire.dispatch(@js($event), { data: this.tagsAdded });
                            }
                        }
                        if(newItem) this.data.push(item)
                        this.search = '';
                    },
                    removeTags(item){
                        const index = this.tagsAdded.indexOf(item);
                        if (index > -1) {
                          this.tagsAdded.splice(index, 1);
                          if(@js($event)){
                            $wire.dispatch(@js($event), { data: this.tagsAdded });
                          }
                        }
                    }
                }"
    >
        <div class="flex gap-2 border border-gray-400 min-h-10 rounded-md p-2 flex-wrap cursor-text items-center" @click="isTagsOpen = !isTagsOpen">
            <template x-for="item in tagsAdded">
                <div>
                    <input type="hidden" x-bind:value="item" name="tags[]">
                    <div class="text-sm p-2 px-2 items-center text-white text-left bg-[#202142] rounded-sm flex gap-2.5">
                        <span x-text="item"></span>
                        <button type="button" @click="removeTags(item)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M7 7L17 17M7 17L17 7" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </template>
            <template x-if="tagsAdded.length === 0">
                <span class="text-sm">Tags...</span>
            </template>
        </div>
        <div class="bg-white rounded-lg py-2 shadow-md space-y-2" x-show="isTagsOpen" x-cloak @click.outside="isTagsOpen = false">
            <input type="text" class="form-control block w-full py-2 px-6 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="add or search tags..." x-model="search" />
            <div class="px-4">
                <template x-if="searchResults().length === 0">
                    <button type="button" x-text="search" @click.prevent="addTags(search, true)" class="block text-md w-full text-left hover:text-red-400"></button>
                </template>
                <template x-for="item in searchResults">
                    <button type="button" x-text="item" @click.prevent="addTags(item)" class="block text-md w-full text-left hover:text-red-400"></button>
                </template>
            </div>
        </div>
    </div>
</div>
