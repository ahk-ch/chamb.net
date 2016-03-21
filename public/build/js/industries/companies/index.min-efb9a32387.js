/* ------------------------------------------------------------ *\
|* ------------------------------------------------------------ *|
|* classie.js
|* https://github.com/desandro/classie/blob/master/classie.js
|* ------------------------------------------------------------ *|
\* ------------------------------------------------------------ */
( function( window ) {

'use strict';

// class helper functions from bonzo https://github.com/ded/bonzo

function classReg( className ) {
  return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
}

// classList support for class management
// altho to be fair, the api sucks because it won't accept multiple classes at once
var hasClass, addClass, removeClass;

if ( 'classList' in document.documentElement ) {
  hasClass = function( elem, c ) {
    return elem.classList.contains( c );
  };
  addClass = function( elem, c ) {
    elem.classList.add( c );
  };
  removeClass = function( elem, c ) {
    elem.classList.remove( c );
  };
}
else {
  hasClass = function( elem, c ) {
    return classReg( c ).test( elem.className );
  };
  addClass = function( elem, c ) {
    if ( !hasClass( elem, c ) ) {
      elem.className = elem.className + ' ' + c;
    }
  };
  removeClass = function( elem, c ) {
    elem.className = elem.className.replace( classReg( c ), ' ' );
  };
}

function toggleClass( elem, c ) {
  var fn = hasClass( elem, c ) ? removeClass : addClass;
  fn( elem, c );
}

var classie = {
  // full names
  hasClass: hasClass,
  addClass: addClass,
  removeClass: removeClass,
  toggleClass: toggleClass,
  // short names
  has: hasClass,
  add: addClass,
  remove: removeClass,
  toggle: toggleClass
};

// transport
if ( typeof define === 'function' && define.amd ) {
  // AMD
  define( classie );
} else {
  // browser global
  window.classie = classie;
}

})( window );




/* ------------------------------------------------------------ *\
|* ------------------------------------------------------------ *|
|* Functionality for adding/removing classes
|* ------------------------------------------------------------ *|
\* ------------------------------------------------------------ */
(function(window){

	// check for touch
	if (Modernizr.touch) {

		// run the forEach on each figure element
		[].slice.call(document.querySelectorAll("figure")).forEach(function(el,i){

			// get close-caption button in variable
			var closeCaption = el.querySelector(".close-caption");

			// show the close-caption button
			classie.remove(closeCaption,"hidden");

			// check if the user moves a finger
			var fingerMove = false;
			el.addEventListener("touchmove",function(e){
				e.stopPropagation();
				fingerMove = true;
			});

			// always reset fingerMove to false on touch start
			el.addEventListener("touchstart",function(e){
				e.stopPropagation();
				fingerMove = false;
			});

			// add hover class if figure touchend and fingerMove is false
			el.addEventListener("touchend",function(e){
				e.stopPropagation();
				if (fingerMove == false) {
					classie.add(el,"hover");
				}
			});

			// if close-caption button clicked, remove hover class
			closeCaption.addEventListener("touchend",function(e){
				e.preventDefault();
				e.stopPropagation();
				if (fingerMove == false) {
					if (classie.has(el,"hover")) {
						classie.remove(el,"hover");
					}
				}
			});

		});

	}

})(window);
/*!
 * @preserve
 *
 * Readmore.js jQuery plugin
 * Author: @jed_foster
 * Project home: http://jedfoster.github.io/Readmore.js
 * Licensed under the MIT license
 *
 * Debounce function from http://davidwalsh.name/javascript-debounce-function
 */
!function(t){"function"==typeof define&&define.amd?define(["jquery"],t):"object"==typeof exports?module.exports=t(require("jquery")):t(jQuery)}(function(t){"use strict";function e(t,e,i){var a;return function(){var n=this,o=arguments,r=function(){a=null,i||t.apply(n,o)},s=i&&!a;clearTimeout(a),a=setTimeout(r,e),s&&t.apply(n,o)}}function i(t){var e=++h;return String(null==t?"rmjs-":t)+e}function a(t){var e=t.clone().css({height:"auto",width:t.width(),maxHeight:"none",overflow:"hidden"}).insertAfter(t),i=e.outerHeight(),a=parseInt(e.css({maxHeight:""}).css("max-height").replace(/[^-\d\.]/g,""),10),n=t.data("defaultHeight");e.remove();var o=a||t.data("collapsedHeight")||n;t.data({expandedHeight:i,maxHeight:a,collapsedHeight:o}).css({maxHeight:"none"})}function n(t){if(!d[t.selector]){var e=" ";t.embedCSS&&""!==t.blockCSS&&(e+=t.selector+" + [data-readmore-toggle], "+t.selector+"[data-readmore]{"+t.blockCSS+"}"),e+=t.selector+"[data-readmore]{transition: height "+t.speed+"ms;overflow: hidden;}",function(t,e){var i=t.createElement("style");i.type="text/css",i.styleSheet?i.styleSheet.cssText=e:i.appendChild(t.createTextNode(e)),t.getElementsByTagName("head")[0].appendChild(i)}(document,e),d[t.selector]=!0}}function o(e,i){this.element=e,this.options=t.extend({},s,i),n(this.options),this._defaults=s,this._name=r,this.init(),window.addEventListener?(window.addEventListener("load",l),window.addEventListener("resize",l)):(window.attachEvent("load",l),window.attachEvent("resize",l))}var r="readmore",s={speed:100,collapsedHeight:200,heightMargin:16,moreLink:'<a href="#">Read More</a>',lessLink:'<a href="#">Close</a>',embedCSS:!0,blockCSS:"display: block; width: 100%;",startOpen:!1,beforeToggle:function(){},afterToggle:function(){}},d={},h=0,l=e(function(){t("[data-readmore]").each(function(){var e=t(this),i="true"===e.attr("aria-expanded");a(e),e.css({height:e.data(i?"expandedHeight":"collapsedHeight")})})},100);o.prototype={init:function(){var e=t(this.element);e.data({defaultHeight:this.options.collapsedHeight,heightMargin:this.options.heightMargin}),a(e);var n=e.data("collapsedHeight"),o=e.data("heightMargin");if(e.outerHeight(!0)<=n+o)return!0;var r=e.attr("id")||i(),s=this.options.startOpen?this.options.lessLink:this.options.moreLink;e.attr({"data-readmore":"","aria-expanded":this.options.startOpen,id:r}),e.after(t(s).on("click",function(t){return function(i){t.toggle(this,e[0],i)}}(this)).attr({"data-readmore-toggle":"","aria-controls":r})),this.options.startOpen||e.css({height:n})},toggle:function(e,i,a){a&&a.preventDefault(),e||(e=t('[aria-controls="'+_this.element.id+'"]')[0]),i||(i=_this.element);var n=t(i),o="",r="",s=!1,d=n.data("collapsedHeight");n.height()<=d?(o=n.data("expandedHeight")+"px",r="lessLink",s=!0):(o=d,r="moreLink"),this.options.beforeToggle(e,n,!s),n.css({height:o}),n.on("transitionend",function(i){return function(){i.options.afterToggle(e,n,s),t(this).attr({"aria-expanded":s}).off("transitionend")}}(this)),t(e).replaceWith(t(this.options[r]).on("click",function(t){return function(e){t.toggle(this,i,e)}}(this)).attr({"data-readmore-toggle":"","aria-controls":n.attr("id")}))},destroy:function(){t(this.element).each(function(){var e=t(this);e.attr({"data-readmore":null,"aria-expanded":null}).css({maxHeight:"",height:""}).next("[data-readmore-toggle]").remove(),e.removeData()})}},t.fn.readmore=function(e){var i=arguments,a=this.selector;return e=e||{},"object"==typeof e?this.each(function(){if(t.data(this,"plugin_"+r)){var i=t.data(this,"plugin_"+r);i.destroy.apply(i)}e.selector=a,t.data(this,"plugin_"+r,new o(this,e))}):"string"==typeof e&&"_"!==e[0]&&"init"!==e?this.each(function(){var a=t.data(this,"plugin_"+r);a instanceof o&&"function"==typeof a[e]&&a[e].apply(a,Array.prototype.slice.call(i,1))}):void 0}});
/**
 * @author Rizart Dokollari
 * @since 20/12/2015
 */
jQuery(document).ready(function () {
	App.initParallaxBg();
});
