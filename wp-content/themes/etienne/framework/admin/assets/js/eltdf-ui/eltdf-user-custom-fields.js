jQuery(document).ready(function ($) {
    "use strict";
	
	function eltdf_user_media_upload(button_class) {
		var _custom_media = true;
		
		if (typeof wp !== 'object') {
			return false;
		}
		
		var	_orig_send_attachment = wp.media.editor.send.attachment;
		
		$('body').on('click', button_class, function (e) {
			var $this = $(this),
				parent = $this.closest('.eltdf-user-image-field');
			
			_custom_media = true;
			
			wp.media.editor.send.attachment = function (props, attachment) {
				if (_custom_media) {
					var attachment_url = attachment.sizes.thumbnail !== undefined ? attachment.sizes.thumbnail.url : attachment.sizes.full.url;
					
					parent.find('.eltdf-user-custom-media-url').val(attachment.id);
					parent.find('.eltdf-user-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
					parent.find('.eltdf-user-image-wrapper .custom_media_image').attr('src', attachment_url).css('display', 'block');
				} else {
					return _orig_send_attachment.apply(button_class, [props, attachment]);
				}
			};

			wp.media.editor.open(button_class);

			return false;
		});
	}
	
	function eltdf_user_media_remove(button_class) {
		$('body').on('click', button_class, function () {
			var $this = $(this),
				parent = $this.closest('.eltdf-user-image-field'),
				image = parent.find('.eltdf-user-custom-media-url');

			/** Make sure the user didn't hit the button by accident and they really mean to delete the image **/
			if (image.val() !== '' && confirm('Are you sure you want to remove this file?')) {
				var result = $.ajax({
					url: '/wp-admin/admin-ajax.php',
					type: 'GET',
					data: {
						action: 'etienne_elated_user_del_image',
						user_id: $this.data('userid'),
						field_name: image.attr('name')
					},
					dataType: 'text'
				});

				result.success(function (data) {
					$('#eltdf-uploaded-image').remove();
				});

				result.fail(function (jqXHR, textStatus) {
					console.log("Request failed: " + textStatus);
				});

				image.val('');
				parent.find('.eltdf-user-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
			}
		});
	}
	
	eltdf_user_media_upload('.eltdf-user-media-add.button');
	eltdf_user_media_remove('.eltdf-user-media-remove.button');
});