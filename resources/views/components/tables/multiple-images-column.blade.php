<!-- resources/views/components/tables/multiple-images-column.blade.php -->
<div style="display: flex; gap: 5px;">
    @foreach ($getState() as $image)
        <img src="{{ Storage::disk('public')->url($image->name) }}" alt="Attachment" style="width: 50px; height: 50px; object-fit: cover;">
    @endforeach
</div>
