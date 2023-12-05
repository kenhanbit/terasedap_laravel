@push('styles')
    <link rel="stylesheet" href="{{ asset('css/livewire.css')}}">
@endpush
<main>
    <style>
        #list {
            display: flex;
            flex-direction: column;
            justify-self: center;
        }
        .list-item {
            width: 88%;
            background: #4F4A45;
            padding: 0.75rem;
            margin-bottom: 4px;
        }
    </style>
    <div class="container admin">
        <div style="display: flex; justify-content: space-between">
            <h2>
                Category
            </h2>
        </div>
        <div class="input-category" style="margin-top: 12px;">
            <form action="" wire:submit="addCategory">
                <div>

                    <input wire:model="newCategory" class="input-field" type="text" name="newCategory" placeholder="New Category" autocomplete="off">
                </div>
                <button type="submit" class="sign-button" wire:loading.attr="disabled">
                    Create
                </button>
                <span class="loader" wire:target="addCategory" wire:loading></span>

            </form>
        </div>
        <livewire:components.category-list />
    </div>
</main>
