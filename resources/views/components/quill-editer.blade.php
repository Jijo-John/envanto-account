@props(['error' => ''])

<div x-data="{ content: @entangle($attributes->wire('model')) }" wire:ignore>
    <div class="h-48" x-data x-bind:content="content" x-init="() => {
        $el._x_quill = new Quill($el, {
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'], // toggled buttons
                    ['blockquote', 'code-block'],
                    [{ header: 1 }, { header: 2 }], // custom button values
                    [{ list: 'ordered' }, { list: 'bullet' }],
                    [{ script: 'sub' }, { script: 'super' }], // superscript/subscript
                    [{ indent: '-1' }, { indent: '+1' }], // outdent/indent
                    [{ direction: 'rtl' }], // text direction
                    [{ size: ['small', false, 'large', 'huge'] }], // custom dropdown
                    [{ header: [1, 2, 3, 4, 5, 6, false] }],
                    [{ color: [] }, { background: [] }], // dropdown with defaults from theme
                    [{ font: [] }],
                    [{ align: [] }],
                    ['clean'], // remove formatting button
                ],
            },
            placeholder: 'Enter your content...',
            theme: 'snow',
        });
    
        $el._x_quill.on('text-change', (delta, oldDelta, source) => {
            @this.set('{{ $attributes->wire('model')->value() }}', $el._x_quill.root.innerHTML);
        });
        
        Livewire.on('contentData', function(msg) {
            $el._x_quill.root.innerHTML = msg;
        });
        
    }">
    </div>

</div>


{{--  <script>
    document.addEventListener('DOMContentLoaded', function() {    
        Livewire.on('contentData', function(msg) {
           
        });
        
    });
</script>  --}}

@error($error)
    <span class="mt-1 text-error">{{ $message }}</span>
@enderror
