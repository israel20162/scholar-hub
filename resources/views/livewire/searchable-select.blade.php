<div x-data="{ open: false, search: '' }" @click.away="open = false">
    <div>
        {{-- <input 
            wire:model.live="search"
            @click="open = !open"
            placeholder="Search..."
            x-bind:value="search"
        /> --}}
        <select  wire:model.live='category_id' class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline"" name="" id="">
            @forelse ($this->categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @empty
                 <p>No results found!</p>
            @endforelse
        </select>
        <div>
           
        </div>
    </div>

    <div x-show="open" @click="open = false">
        @forelse($results as $result)
            <p @click="search = '{{ $result }}'; open = false">{{ $result }}</p>
        @empty
           
        @endforelse
    </div>
</div>
