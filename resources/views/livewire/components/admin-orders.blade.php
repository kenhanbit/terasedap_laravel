<div class="table-order {{ $detail->status }}" wire:key="{{$detail->id}}" x-on:click="$dispatch('open-modal', { name : '{{$detail->order_code}}'})">
    <div style="text-align: center">
        <div>
            <h3>
                Table: {{ $detail->table_number }}
            </h3>
        </div>
        <div>
            {{ $detail->order_code }}
        </div>
    </div>
</div>