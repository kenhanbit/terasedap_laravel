<div
    x-data="{show: false, itemId: '{{ $itemId }}'}"
    x-show="show"
    x-on:open-notes.window="console.log($event.detail); show = ($event.detail.itemId === {{ $itemId }})"
    x-on:close-notes.window="show = false"
    style="z-index: -50; display:none;"
    x-transition
    >
    <div class="order-modal-background" x-on:click="show = false"></div>
    <div class="order-modal">
        <form action="" style="display: inline;" wire:submit="addNotes({{$itemId}})">
            <div class="modal-header">
                <div class="modal-title">
                    Notes
                </div>
                <div>
                    <button style="background: none; border:none;" x-on:click="show = false">
                        <x-maki-cross style="height:20px;" />
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <textarea name="itemnotes" style="background-color: #e9e9e9; border-radius: 16px; color: #232323; font-weight: 600;" id="itemnotes" cols="40" rows="5" wire:model="notes"></textarea>
            </div>
            <div class="modal-footer">
                <button class="modal-button" type="submit" style="background-color:#677cf3; color:#242424;">Add Notes</button>
                <button class="modal-button close" x-on:click="show = false">Close</button>
            </div>
        </form>
    </div>
</div>
