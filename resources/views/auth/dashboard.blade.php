@extends('auth.layouts')

@section('content')

<div id="main">
    <div>
        <h2>Orders</h2>
    </div>
    <div id="orders">
        @foreach ($orders as $order)
            <livewire:Components.AdminOrders :order="$order" wire:key="{{$order->id}}" />
        @endforeach
    </div>
    @foreach ($orders as $order)
    <livewire:Components.OrdersModal name="{{$order->order_code}}" :detail="$order" wire:key="{{$order->id}}" />
    @endforeach
    @foreach ($orders as $order)
        <livewire:Components.DeleteModal orderId="{{$order->id}}" wire:key="{{$order->id}}" @deleteOrder="$refresh" />
    @endforeach
</div>
@endsection