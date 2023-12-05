<div id="list">
    @foreach ($categories as $category)
        <div class="list-item" wire:key="{{$category->id}}">
            <div class="list-item-info">
                @if ($category->id == $editCategoryId)
                <input type="text" class="list-item-input" placeholder="Category..." wire:model="editCategoryName">
                @else
                <h3>
                    {{$category['name']}}
                </h3>
                @endif
                @if ($category->id !== $editCategoryId)
                <div>
                    <button wire:click.prevent="delete({{$category->id}})" wire:loading.remove class="delete-button"><x-iconsax-bro-trash style="width:18px" /></button>
                    <span class="loader" wire:loading wire:target="delete({{$category->id}})"></span>
                    <button wire:click="edit({{$category->id}})" class="edit-button"><x-iconsax-lin-edit style="width:18px" /></button>
                </div>
                @endif
            </div>
            @if ($category->id == $editCategoryId)
            <div style="margin-top: 12px;">
                <button class="edit-button" style="font-size:17px;" wire:click="update" wire:loading.attr="disabled">Save</button>
                <button class="delete-button" style="font-size:17px;" wire:click="cancelEdit" wire:loading.attr="disabled">Cancel</button>
            </div>
                
            @endif

        </div>
    @endforeach
</div>