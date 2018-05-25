/**
 * @license Rangy Inputs, a jQuery plug-in for selection and caret manipulation within textareas and text inputs.
 *
 * https://github.com/timdown/rangyinputs
 *
 * For range and selection features for contenteditable, see Rangy.

 * http://code.google.com/p/rangy/
 *
 * Depends on jQuery 1.0 or later.
 *
 * Copyright 2013, Tim Down
 * Licensed under the MIT license.
 * Version: 1.1.2
 * Build date: 6 September 2013
 */
!function(a){function l(a,b){var c=typeof a[b];return"function"===c||!("object"!=c||!a[b])||"unknown"==c}function m(a,c){return typeof a[c]!=b}function n(a,b){return!("object"!=typeof a[b]||!a[b])}function o(a){window.console&&window.console.log&&window.console.log("RangyInputs not supported in your browser. Reason: "+a)}function p(a,c,d){return 0>c&&(c+=a.value.length),typeof d==b&&(d=c),0>d&&(d+=a.value.length),{start:c,end:d}}function q(a,b,c){return{start:b,end:c,length:c-b,text:a.value.slice(b,c)}}function r(){return n(document,"body")?document.body:document.getElementsByTagName("body")[0]}var c,d,e,f,g,h,i,j,k,b="undefined";a(document).ready(function(){function v(a,b){return function(){var c=this.jquery?this[0]:this,d=c.nodeName.toLowerCase();if(1==c.nodeType&&("textarea"==d||"input"==d&&"text"==c.type)){var e=[c].concat(Array.prototype.slice.call(arguments)),f=a.apply(this,e);if(!b)return f}return b?this:void 0}}var s=document.createElement("textarea");if(r().appendChild(s),m(s,"selectionStart")&&m(s,"selectionEnd"))c=function(a){var b=a.selectionStart,c=a.selectionEnd;return q(a,b,c)},d=function(a,b,c){var d=p(a,b,c);a.selectionStart=d.start,a.selectionEnd=d.end},k=function(a,b){b?a.selectionEnd=a.selectionStart:a.selectionStart=a.selectionEnd};else{if(!(l(s,"createTextRange")&&n(document,"selection")&&l(document.selection,"createRange")))return r().removeChild(s),o("No means of finding text input caret position"),void 0;c=function(a){var d,e,f,g,b=0,c=0,h=document.selection.createRange();return h&&h.parentElement()==a&&(f=a.value.length,d=a.value.replace(/\r\n/g,"\n"),e=a.createTextRange(),e.moveToBookmark(h.getBookmark()),g=a.createTextRange(),g.collapse(!1),e.compareEndPoints("StartToEnd",g)>-1?b=c=f:(b=-e.moveStart("character",-f),b+=d.slice(0,b).split("\n").length-1,e.compareEndPoints("EndToEnd",g)>-1?c=f:(c=-e.moveEnd("character",-f),c+=d.slice(0,c).split("\n").length-1))),q(a,b,c)};var t=function(a,b){return b-(a.value.slice(0,b).split("\r\n").length-1)};d=function(a,b,c){var d=p(a,b,c),e=a.createTextRange(),f=t(a,d.start);e.collapse(!0),d.start==d.end?e.move("character",f):(e.moveEnd("character",t(a,d.end)),e.moveStart("character",f)),e.select()},k=function(a,b){var c=document.selection.createRange();c.collapse(b),c.select()}}r().removeChild(s),f=function(a,b,c,e){var f;b!=c&&(f=a.value,a.value=f.slice(0,b)+f.slice(c)),e&&d(a,b,b)},e=function(a){var b=c(a);f(a,b.start,b.end,!0)},j=function(a){var e,b=c(a);return b.start!=b.end&&(e=a.value,a.value=e.slice(0,b.start)+e.slice(b.end)),d(a,b.start,b.start),b.text};var u=function(a,b,c,e){var f=b+c.length;if(e="string"==typeof e?e.toLowerCase():"",("collapsetoend"==e||"select"==e)&&/[\r\n]/.test(c)){var g=c.replace(/\r\n/g,"\n").replace(/\r/g,"\n");f=b+g.length;var h=b+g.indexOf("\n");"\r\n"==a.value.slice(h,h+2)&&(f+=g.match(/\n/g).length)}switch(e){case"collapsetostart":d(a,b,b);break;case"collapsetoend":d(a,f,f);break;case"select":d(a,b,f)}};g=function(a,b,c,d){var e=a.value;a.value=e.slice(0,c)+b+e.slice(c),"boolean"==typeof d&&(d=d?"collapseToEnd":""),u(a,c,b,d)},h=function(a,b,d){var e=c(a),f=a.value;a.value=f.slice(0,e.start)+b+f.slice(e.end),u(a,e.start,b,d||"collapseToEnd")},i=function(a,d,e,f){typeof e==b&&(e=d);var g=c(a),h=a.value;a.value=h.slice(0,g.start)+d+g.text+e+h.slice(g.end);var i=g.start+d.length;u(a,i,g.text,f||"select")},a.fn.extend({getSelection:v(c,!1),setSelection:v(d,!0),collapseSelection:v(k,!0),deleteSelectedText:v(e,!0),deleteText:v(f,!0),extractSelectedText:v(j,!1),insertText:v(g,!0),replaceSelectedText:v(h,!0),surroundSelectedText:v(i,!0)})})}(jQuery);