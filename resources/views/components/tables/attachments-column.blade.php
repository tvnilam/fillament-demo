<div style="display: flex; gap: 5px;">
    @if ($state = $getState())
        @if (is_array($state))
            @foreach ($state as $image)
                @php
                    $fileUrl = Storage::disk('public')->url($image);
                    $fileExtension = pathinfo($fileUrl, PATHINFO_EXTENSION);
                @endphp

                @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                    <a href="{{ $fileUrl }}" target="_blank" rel="noopener noreferrer">
                        <img src="{{ $fileUrl }}" alt="Attachment" class="w-24 h-24 object-cover"/>
                    </a>
                @elseif (in_array($fileExtension, ['mp4', 'webm', 'ogg']))
                    <video class="w-24 h-24 object-cover" controls>
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
