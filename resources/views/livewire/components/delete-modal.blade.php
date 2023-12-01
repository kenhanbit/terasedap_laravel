<div 
x-data="{ show: false, orderId: '{{$orderId}}' }"
x-show="show"
x-on:open-delete-modal.window="show = ($event.detail.orderId === orderId)"
x-on:close-delete-modal.window="show = false"
style="z-index: -50; display:none;"
x-transition
>
    <div class="order-modal-background" x-on:click="show = false"></div>
    <form action="" wire:submit="deleteOrder({{$orderId}})">
        <div class="order-modal">
            <div class="modal-header">
                <div class="modal-title">
                    Cancel Order
                </div>
                <div>
                    <button style="background: none; border:none;" x-on:click="show = false">
                        <x-maki-cross style="height:20px;" />
                    </button>
                </div>
            </div>

            <div class="modal-body">
                <h4>Why do you want to cancel this order?</h4>
                <textarea class="delete-modal-textarea" name="cancel_reason" id="cancel_reason" wire:model="cancel_reason" cols="30" rows="10"></textarea>
                <p>max char: 200</p>
            </div>
            <div class="modal-footer" style="width: 100%; display:flex; justify-content:flex-end;">
                <button class="modal-button cancel" type="submit">Cancel Order</button>
                <button class="modal-button close" x-on:click="show = false">Close</button>
            </div>
        </div>
    </form>
</div>
