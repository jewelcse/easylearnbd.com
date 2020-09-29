tinymce.init({
	selector: '#story-body',
    height : "400",
	theme: 'modern',
    codesample_dialog_width: '400',
    codesample_dialog_height: '400',
    image_title: true,
    automatic_uploads: true,
    images_upload_url: '/story/image/upload',
    file_picker_types: 'image',
	plugins: [
		'advlist autolink lists link image code charmap print preview hr anchor pagebreak codesample image ',
		'searchreplace wordcount visualblocks visualchars code fullscreen',
		'insertdatetime media nonbreaking save table contextmenu directionality',
		'emoticons template paste textcolor colorpicker textpattern imagetools lineheight'
	],

	toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code',
	toolbar2: 'print preview media | forecolor backcolor emoticons codesample image lineheightselect fontsizeselect',
	image_advtab: true,
    codesample_languages: [
        {text: 'HTML/XML', value: 'markup'},
        {text: 'JavaScript', value: 'javascript'},
        {text: 'CSS', value: 'css'},
        {text: 'PHP', value: 'php'},
        {text: 'Ruby', value: 'ruby'},
        {text: 'Python', value: 'python'},
        {text: 'Java', value: 'java'},
        {text: 'C', value: 'c'},
        {text: 'C#', value: 'csharp'},
        {text: 'C++', value: 'cpp'}
    ],

    file_picker_callback: function(cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.onchange = function() {
            var file = this.files[0];

            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function () {
                var id = 'blobid' + (new Date()).getTime();
                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);
                cb(blobInfo.blobUri(), { title: file.name });
            };
        };
        input.click();
    }
});

tinymce.init({
    selector: '#profile-body',
    height : "150",
    theme: 'modern',
    force_br_newlines : true,
    force_p_newlines : false,
    forced_root_block : '' ,
    plugins: [
        'advlist autolink lists link charmap   anchor',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern '
    ],

    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
    toolbar2: 'forecolor backcolor emoticons',


});
