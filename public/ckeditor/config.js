/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';
	config.contentsCss = '/css/fonts.css';
	//the next line add the new font to the combobox in CKEditor
	config.font_names = config.font_names +';Cairo;29ltbukrabold;29ltbukrabolditalic;29ltbukralight;29ltbukraregular;' +
	'Al-Jazeera-Arabic-Regular;Amiri-Bold;Amiri-BoldSlanted;Amiri-Regular;Amiri-Slanted;'+
	'AmiriQuran;AmiriQuranColored;Droid;Jozoor-Font;Hacen-Algeria-Bd' ;
};

CKEDITOR.on("instanceReady", function(event) {
    event.editor.on("beforeCommandExec", function(event) {
        // Show the paste dialog for the paste buttons and right-click paste
        if (event.data.name == "paste") {
            event.editor._.forcePasteDialog = true;
        }
        // Don't show the paste dialog for Ctrl+Shift+V
        if (event.data.name == "pastetext" && event.data.commandData.from == "keystrokeHandler") {
            event.cancel();
        }
    })
});

CKEDITOR.on('instanceReady', function(ev) {
    ev.editor.on('paste', function(evt) {
        var data = evt.data;
        var html = data.dataValue;

        // Remove nested spans and merge styles into parent p elements
        html = removeNestedSpans(html);

        // Set the modified HTML as the pasted content
        data.dataValue = html;
    });
});

function removeNestedSpans(html) {
    // Regular expression to match nested spans
    const nestedSpanRegex = "/";

    // Replace nested spans with their content and merged styles
    return html.replace(nestedSpanRegex, function(match, pStyles, spanContent) {
        // Extract styles from the parent p element
        const pStyleObj = parseStyles(pStyles);

        // Extract styles from the nested spans
        const spanStyleObj = parseStyles(match.match(/style="([^"]+)"/)[1]);

        // Merge styles, giving priority to span styles
        const mergedStyles = Object.assign({}, pStyleObj, spanStyleObj);

        // Convert merged styles back to a string
        const mergedStyleStr = Object.entries(mergedStyles)
            .map(([key, value]) => `${key}: ${value}`)
            .join('; ');

        // Return the modified p element with merged styles and span content
        return `<p style="${mergedStyleStr}">${spanContent}</p>`;
    });
}

function parseStyles(styleStr) {
    // Split style string into key-value pairs
    const stylePairs = styleStr.split(';').map(pair => pair.trim());

    // Create an object to store styles
    const styleObj = {};

    // Iterate over style pairs and add them to the object
    stylePairs.forEach(pair => {
        if (pair) {
            const [key, value] = pair.split(':').map(item => item.trim());
            styleObj[key] = value;
        }
    });

    return styleObj;
}
