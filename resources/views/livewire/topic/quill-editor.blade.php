<div class="relative pb-16">
    <textarea
        class="shadow quill-editor h-64 border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight ">
                </textarea>
    <input type="hidden" id="editor-content" name="body" />

    <div id='edit-content' class="hidden">{!! $body !!}</div>

    <button x-data type="button"
        @click="$dispatch('save-draft', { body: document.getElementById('editor-content').innerHTML })"
        class="px-5 py-2 absolute bottom-0 bg-gray-500 text-white rounded hover:bg-gray-600 focus:bg-gray-700">Save
        Draft</button>

    @push('scripts')
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <script>
            var toolbarOptions = [
                [{
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],
                ['bold', 'italic', 'underline', 'strike'], // toggled buttons
                ['blockquote', 'code-block'],

                [{
                    'header': 1
                }, {
                    'header': 2
                }], // custom button values
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }],
                [{
                    'script': 'sub'
                }, {
                    'script': 'super'
                }], // superscript/subscript
                [{
                    'indent': '-1'
                }, {
                    'indent': '+1'
                }], // outdent/indent
                [{
                    'direction': 'rtl'
                }], // text direction

                //[{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                ["link", "image", "video"],

                [{
                    'color': []
                }, {
                    'background': []
                }], // dropdown with defaults from theme
                [{
                    'font': []
                }],
                [{
                    'align': []
                }],

                ['clean'] // remove formatting button
            ];


            $('.quill-editor').each(function(i, el) {
                var el = $(this),
                    id = 'quill-editor',
                    val = el.val(),
                    editor_height = 400;
                var div = $('<div/>').attr('id', id).css('height', editor_height + 'px').html(val).addClass('rounded')
                    .addClass('text-white');
                el.addClass('hidden');
                el.parent().append(div);


                var quill = new Quill('#' + id, {
                    modules: {
                        toolbar: toolbarOptions
                    },
                    theme: 'snow'
                });
                var ColorClass = Quill.import('attributors/class/color');
                var SizeStyle = Quill.import('attributors/style/size');
                Quill.register(ColorClass, true);
                Quill.register(SizeStyle, true);
                Quill.register(Quill.import('attributors/style/align'), true)
                // quill.root.innerHTML = document.getElementById('edit-content').innerHTML
                quill.pasteHTML( document.getElementById('edit-content').innerHTML);
                quill.on('text-change', function() {
                    el.html(quill.getContent)
                    $('#editor-content').html(quill.root.innerHTML);


                })
            });
        </script>
    @endpush
</div>
