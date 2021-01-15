=== ACF WYSIWYG Styling  ===
Contributors: delwinv
Tags: acf, wysiwyg, style, styles, styling
Stable tag: 1.0
Requires at least: 3.5.0
Tested up to: 4.3
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Provides the necessary CSS classes in ACF WYSYWIG editor to allow for complete styling of the admin interface.

== Description ==

A very tiny plugin that adds the ACF field key, field name, Flexible Content field name and Flexible Content layout name to the WYSIWYG
editor body tag, allowing you to target these classes, along with the existing post-type-* classes added by default by WordPress, in
your editor-style.css for a better admin/editor experience.

This works for both ACF and ACF Pro, version 5.

== Installation ==

1. Install the plugin through the Install Plugins interface or by uploading the `acf-plugin-wysiwyg-styling` folder to your `/wp-content/plugins/` directory.
2. Activate the ACF WYSIWYG Styling plugin from the Admin > Plugins menu.

== Usage ==

1. Install the plugin through the Install Plugins interface or by uploading the `acf-plugin-wysiwyg-styling` folder to your `/wp-content/plugins/` directory.
2. Activate the ACF WYSIWYG Styling plugin from the Admin > Plugins menu.
3. Create or edit your editor-style.css in your theme directory and use the newly added classes to style your WYSIWYG editors.

For example:

 - The ACF WYSIWYG field with key field_9999ffff11112222 can be targeted with the following CSS:
<code>
body.acf-field-key-field_9999ffff11112222 {
  background-color: red;
}
</code>

 - The ACF WYSIWYG field with key field_9999ffff11112222 in the "room" post type can be targeted with the following CSS:
<code>
body.post-type-room.acf-field-key-field_9999ffff11112222 {
  background-color: blue;
}
</code>

 - All ACF WYSIWYG fields named "my_wysiwyg" can be targetted with the following CSS:
<code>
body.acf-field-name-my_wysiwyg {
  background-color: yellow;
}
</code>

 - All ACF WYSIWYG fields in the Flexible Content field named "page_content" can be targetted with the following CSS:
<code>
body.acf-flex-name-page_content {
  color: green;
}
</code>

 - All ACF WYSIWYG fields in the Flexible Content layout field named "test_layout" can be targetted with the following CSS:
<code>
body.acf-layout-test_layout {
  font-family: "Computer Modern Serif";
}
</code>

 - The ACF WYSIWYG field named "my_wysiwyg" in the Flexible Content layout field named "test_layout" can be targetted with the following CSS:
<code>
body.acf-layout-test_layout.acf-field-name-my_wysiwyg {
  border: 4px solid red;
  height: 100%;
  margin: 0 auto;
  max-width: 100px;
}
</code>

N.B. I target using the body tag so that a user cannot accidentally target the admin CSS in their edit of the field (regardless of how unlikely
that would be).

== Frequently Asked Questions  ==

= Do I need to install a plugin to do this? =

Not at all. For the time being ACF doesn't add these classes to the editor, but you can do it either by installing this plugin or by placing the
following code in your functions.php file:

<code>
function acf_plugin_wysiwyg_styling() { ?&gt;
	&lt;script&gt;
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
	&lt;/script&gt;
&lt;?php
}
add_action('acf/input/admin_footer', 'acf_plugin_wysiwyg_styling');
</code>


= Can I change the prefix of the classes added to the editor? =

Not with this plugin. The prefixes are hard-coded to acf-field-key-, acf-field-name-, acf-flex-name- and acf-layout-. If you wish to change
these prefixes, I would suggest not using this plugin and using the code shown above in your functions.php, changing the desired prefixes
in the code.

= Will you be adding any features? =

I doubt it. Hopefully the developers of ACF provide this functionality in an upcoming version themselves, since it is quite simple and really should
be part of the core function. At that time, this plugin will become redundant. I look forward to that date :-)

= There is a feature that i want it implemented, can you do something about it? =

Again, this is a plugin to provide very basic functionality that allows for complete targetting of WYSIWYG editors within the ACF framework. I don't
plan on adding any functionality to the plugin. But the code is released under GPLv2, so go at it yourself if you so desire!

== Change Log ==

= 1.0 =
 - Initial Release
 
 == Upgrade Notice ==

The latest release is version 1.0

