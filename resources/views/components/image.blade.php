@props(['error' => null, 'multiple' => false, 'value' => null])
<div class="filepond fp-bordered" wire:ignore>
<input {{ $multiple ? 'multiple' : '' }} x-on:remove-images.window="FilePond.removeFiles();" type="file" x-init="() => { 
    $el._x_filepond = FilePond.create($el, {
        files: [ 
            @if($value)
                @if($multiple)
                    @foreach($value as $image)
                        {
                            source: '{{ $image }}',
                        },
                    @endforeach
                @else
                    {
                        source: '{{ $value }}',
                        
                    },
                @endif
            @endif
        ],
    }); 
    $el._x_filepond.setOptions({
        server: {
            process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                @this.upload('{{ $error }}', file, load, error, progress)
            },
            revert: (filename, load) => {
                @this.removeUpload('{{ $error }}', filename, load)
            },
        },
    });
    this.addEventListener('pondReset', e => {
        $el._x_filepond.removeFiles();
    });
}" />
</div>


@error($error)
    <span class="text-error">{{ $message }}</span>
@enderror