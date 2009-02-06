/*
Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.plugins.add('basicstyles',{requires:['styles','button'],init:function(a,b){var c=function(f,g,h,i){var j=new CKEDITOR.style(i);a.attachStyleStateChange(j,function(k){var l=a.getCommand(h);l.state=k;l.fire('state');});a.addCommand(h,new CKEDITOR.styleCommand(j));a.ui.addButton(f,{label:g,command:h});},d=a.config,e=a.lang;c('Bold',e.bold,'bold',d.coreStyles_bold);c('Italic',e.italic,'italic',d.coreStyles_italic);c('Underline',e.underline,'underline',d.coreStyles_underline);c('Strike',e.strike,'strike',d.coreStyles_strike);c('Subscript',e.subscript,'subscript',d.coreStyles_subscript);c('Superscript',e.superscript,'superscript',d.coreStyles_superscript);}});CKEDITOR.config.coreStyles_bold={element:'strong',overrides:'b'};CKEDITOR.config.coreStyles_italic={element:'em',overrides:'i'};CKEDITOR.config.coreStyles_underline={element:'u'};CKEDITOR.config.coreStyles_strike={element:'strike'};CKEDITOR.config.coreStyles_subscript={element:'sub'};CKEDITOR.config.coreStyles_superscript={element:'sup'};
