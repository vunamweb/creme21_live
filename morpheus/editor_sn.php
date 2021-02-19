<!-- include summernote css/js -->
<link href="summernote/summernote.min.css" rel="stylesheet">
<script src="summernote/summernote.min.js"></script>

<!-- https://summernote.org/deep-dive/ -->

<script>
	$(document).ready(function() {
		$('#summernote').summernote({
			height: <?php echo $editor_height; ?>,
			minHeight: null,
			maxHeight: null,
			lang: 'de-De',
	        toolbar: [
	          ['style', ['style']],
	          ['font', ['bold', 'underline', 'clear']],
	          ['color', ['color']],
	          ['para', ['ul', 'ol', 'paragraph']],
	          ['table', ['table']],
	          ['insert', ['link']],
	          ['view', ['fullscreen', 'codeview', 'help']]
	        ],
	        styleTags: [
				'p',
					{ title: 'Blockquote', tag: 'blockquote', className: 'blockquote', value: 'blockquote' },
				'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
			],
		});
	});
</script>




<?php

/*
		        toolbar: [
	          ['style', ['style']],
	          ['font', ['bold', 'underline', 'clear']],
	          ['color', ['color']],
	          ['para', ['ul', 'ol', 'paragraph']],
	          ['table', ['table']],
	          ['insert', ['link', 'picture', 'video']],
	          ['view', ['fullscreen', 'codeview', 'help']]
	        ]
*/


?>