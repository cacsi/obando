(function($) {
	acf.add_filter('wysiwyg_tinymce_settings', function(mceInit, id) {
		var mceInitElements = $('#' + mceInit.elements);
		var acfEditorField = mceInitElements.closest('.acf-field[data-type="wysiwyg"]');
		var fieldKey = acfEditorField.data('key');
		var fieldName = acfEditorField.data('name');
	    var flexContentName = mceInitElements.parents('[data-type="flexible_content"]').first().data('name');
		var layoutName = mceInitElements.parents('[data-layout]').first().data('layout');
		mceInit.body_class += " acf-field-key-" + fieldKey;
		mceInit.body_class += " acf-field-name-" + fieldName;
		if (flexContentName) {
			mceInit.body_class += " acf-flex-name-" + flexContentName;
		}
		if (layoutName) {
			mceInit.body_class += " acf-layout-" + layoutName;
		}
		return mceInit;
	});
})(jQuery);
