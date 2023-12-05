@push('styles')
    <link rel="stylesheet" href="{{ asset('css/livewire.css') }}">
@endpush

<main>
    <div class="container admin">
        <p id="page-title">
            Menu Management
        </p>
        <livewire:components.menu-management />
    </div>
</main>
