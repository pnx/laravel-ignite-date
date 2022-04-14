<div wire:ignore>
    <x-ignite-input
        x-data='{}'
        x-init="flatpickr($refs.this, {{ $jsonOptions() }})"
        x-ref='this'
        :id="$id"
        :name="$name"
        type="text"
        {{ $attributes }}
    />
</div>
