<!-- include summernote css/js -->
<link href="summernote/summernote.min.css" rel="stylesheet">
<script src="summernote/summernote.min.js"></script>
<script src="summernote/summernote-cleaner.js"></script>


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
	          ['view', ['fullscreen', 'codeview', 'help']],
	          ['cleaner',['cleaner']],
	        ],
	        styleTags: [
				'p',
//					{ title: 'Blockquote', tag: 'blockquote', className: 'blockquote', value: 'blockquote' },
				{ title: 'Headline', className: '', value: 'h6' },
//				 'h6',
			],

		    cleaner:{
		          action: 'both', // both|button|paste 'button' only cleans via toolbar button, 'paste' only clean when pasting content, both does both options.
		          newline: '<br>', // Summernote's default is to use '<p><br></p>'
		          notStyle: 'position:absolute;top:0;left:0;right:0', // Position of Notification
		          icon: '<i class="note-icon">delete</i>',
		          keepHtml: false, // Remove all Html formats
		          keepOnlyTags: ['<p>', '<br>', '<ul>', '<li>', '<b>', '<strong>','<i>', '<a>'], // If keepHtml is true, remove all tags except these
		          keepClasses: false, // Remove Classes
		          badTags: ['style', 'script', 'applet', 'embed', 'noframes', 'noscript', 'html'], // Remove full tags with contents
		          badAttributes: ['style', 'start'], // Remove attributes from remaining tags
		          limitChars: false, // 0/false|# 0/false disables option
		          limitDisplay: 'both', // text|html|both
		          limitStop: false // true/false
		    }
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


