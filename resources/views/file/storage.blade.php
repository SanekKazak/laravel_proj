<div>
    @foreach($files as $file)
        <li>
            <a href="{{ Storage::disk('test')->url($file) }}" target="_blank">
                {{ basename($file) }}
            </a>
        </li>
    @endforeach
</div>
