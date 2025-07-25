jQuery(document).ready(function ($) {
    "use strict";
	
	function eltdf_tax_media_upload(button_class) {
		var _custom_media = true;
		
		if (typeof wp !== 'object') {
			return false;
		}
		
		var	_orig_send_attachment = wp.media.editor.send.attachment;
		
		$('body').on('click', button_class, function (e) {
			var $this = $(this),
				parent = $this.closest('.form-field');
			
			_custom_media = true;
			
			wp.media.editor.send.attachment = function (props, attachment) {
				if (_custom_media) {
					var attachment_url = attachment.sizes.thumbnail !== undefined ? attachment.sizes.thumbnail.url : attachment.sizes.full.url;
					
					parent.find('.eltdf-tax-custom-media-url').val(attachment.id);
					parent.find('.eltdf-tax-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
					parent.find('.eltdf-tax-image-wrapper .custom_media_image').attr('src', attachment_url).css('display', 'block');
				} else {
					return _orig_send_attachment.apply(button_class, [props, attachment]);
				}
			};
			
			wp.media.editor.open(button_class);
			
			return false;
		});
	}
	
	function eltdf_tax_media_remove(button_class) {
		$('body').on('click', button_class, function () {
			var $this = $(this),
				parent = $this.closest('.form-field'),
				image = parent.find('.eltdf-tax-custom-media-url');
			
			/** Make sure the user didn't hit the button by accident and they really mean to delete the image **/
			if (image.val() !== '' && confirm('Are you sure you want to delete this file?')) {
				var result = $.ajax({
					url: '/wp-admin/admin-ajax.php',
					type: 'GET',
					data: {
						action: 'etienne_elated_tax_del_image',
						term_id: $this.data('termid'),
						taxonomy: $this.data('taxonomy'),
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
				parent.find('.eltdf-tax-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
			}
		});
	}
	
	function eltdfInitTaxColorpicker() {
		var taxColor = $('.eltdf-taxonomy-color-field');
		
		if (taxColor.length) {
			taxColor.wpColorPicker({
				change: function (event, ui) {
					$('.eltdf-input-change').addClass('yes');
				}
			});
		}
	}
	
	eltdf_tax_media_upload('.eltdf-tax-media-add.button');
	eltdf_tax_media_remove('.eltdf-tax-media-remove.button');
	eltdfInitTaxColorpicker();
	
	// Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
	//remove all thumbs after edit/save taxonomy
	$(document).ajaxComplete(function (event, xhr, settings) {
		
		if (settings.data) {
			var queryStringArr = settings.data.split('&');
			
			if ($.inArray('action=add-tag', queryStringArr) !== -1) {
				var xml = xhr.responseXML,
					$response = $(xml).find('term_id').text();
				
				if ($response !== "") {
					// Clear the thumb image
					$('.eltdf-tax-image-wrapper').html('');
					$('.eltdf-taxonomy-color-field').val('');
					$('.eltdf-taxonomy-color-field').parents('.wp-picker-container').find('.wp-color-result').removeAttr('style');
				}
			}
		}
	});
	
	eltdfInitTermIconSelectChange();
	
	function eltdfInitTermIconSelectChange() {
		$(document).on('change', 'select.dependence', function (e) {
			var valueSelected = this.value.replace(/ /g, '');
			
			$('.form-field.eltd-icon-collection-holder').fadeOut();
			$('.form-field[data-icon-collection="' + valueSelected + '"]').fadeIn();
		});
	}

    eltdfInitSelectChange();

    function eltdfInitSelectChange() {
        var selectBox = $('select.dependence');
        
        selectBox.each(function() {
            initialHide($(this), this);
        });
        
        selectBox.on('change', function (e) {
            initialHide($(this), this);
        });

        function initialHide(selectField, selectObject) {
            var valueSelected = selectObject.value.replace(/ /g, '');
            $(selectField.data('hide-'+valueSelected)).closest('.form-field').fadeOut();
            $(selectField.data('show-'+valueSelected)).closest('.form-field').fadeIn();
        }
    }

    eltdfSelect2();

    function eltdfSelect2() {
    	var holder = $('select.eltdf-select2');
    	
        if (holder.length) {
	        holder.select2({
                allowClear: true
            });
        }
    }
});