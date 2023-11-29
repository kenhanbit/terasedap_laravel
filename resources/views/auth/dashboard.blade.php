@extends('auth.layouts')

@section('content')

<div id="main">
    <div>
        <h2>Orders</h2>
    </div>
    <div id="orders">
        {{-- @foreach ($orders as $order) --}}
            <livewire:Components.AdminOrders />
            <livewire:Components.AdminOrders />
            <livewire:Components.AdminOrders />
            <livewire:Components.AdminOrders />
            <livewire:Components.AdminOrders />
            <livewire:Components.AdminOrders />
            <livewire:Components.AdminOrders />
            <livewire:Components.AdminOrders />
            <livewire:Components.AdminOrders />
        {{-- @endforeach --}}
        
    </div>
</div>
@endsection