/**
 * @author Rizart Dokollari
 * @since 1/3/2016
 */
/**
 * Credits due: http://stackoverflow.com/a/22255132
 * @param src
 */
var styleSheetUrls = document.getElementsByName('styleSheetUrls[]');

for (var index = 0; index < styleSheetUrls.length; index++) {
	new loadStyleSheet(styleSheetUrls[index].value);
}

function loadStyleSheet(src) {
	if (document.createStyleSheet) document.createStyleSheet(src);
	else {
		var stylesheet = document.createElement('link');
		stylesheet.href = src;
		stylesheet.rel = 'stylesheet';
		stylesheet.type = 'text/css';
		document.getElementsByTagName('head')[0].appendChild(stylesheet);
	}
}

