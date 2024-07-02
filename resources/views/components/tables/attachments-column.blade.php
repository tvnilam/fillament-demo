<div style="display: flex; gap: 5px;">
    @if ($state = $getState())
        @if (is_array($state))
            @foreach ($state as $image)
                @php
                    $fileUrl = Storage::disk('public')->url($image);
                    $fileExtension = pathinfo($fileUrl, PATHINFO_EXTENSION);
                @endphp

                @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                 
                    <img src="{{ $fileUrl }}" alt="Attachment"  style="width: 6rem;height: 6rem;object-fit: cover;object-position: center; border-radius: 10px; min-width: 6rem; min-height: 6rem;" />
                   
                @elseif (in_array($fileExtension, ['mp4', 'webm', 'ogg']))
                    <video controls style="width: 6rem;height: 6rem;object-fit: cover; object-position: center; border-radius: 10px;     min-width: 6rem; min-height: 6rem;">
                        <source src="{{ $fileUrl }}" type="video/{{ $fileExtension }}">
                        Your browser does not support the video tag.
                    </video>
                @else
                    <a href="{{ $fileUrl }}" target="_blank" rel="noopener noreferrer" class="text-blue-500 underline">
                        {{ basename($fileUrl) }}
                    </a>
                @endif
            @endforeach
        @else
            <p>State is not an array.</p>
        @endif
    @else
        <p>No attachments found.</p>
    @endif
</div>
