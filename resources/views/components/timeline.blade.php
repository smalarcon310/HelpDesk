<div class="border-start ps-3">
    @forelse($items as $item)
        <div class="mb-3">
            <div class="small text-muted">{{ $item->created_at->format('Y-m-d H:i') }}</div>
            <div><strong>{{ $item->user->name }}</strong> cambió <em>{{ $item->field_changed }}</em></div>
            <div>De "{{ $item->old_value }}" a "{{ $item->new_value }}"</div>
        </div>
    @empty
        <div class="text-muted">Sin historial</div>
    @endforelse
</div>
