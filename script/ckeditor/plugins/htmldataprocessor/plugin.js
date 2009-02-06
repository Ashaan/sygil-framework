/*
Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.plugins.add('htmldataprocessor',{requires:['htmlwriter'],init:function(a,b){a.dataProcessor=new CKEDITOR.htmlDataProcessor();}});CKEDITOR.htmlDataProcessor=function(){this.writer=new CKEDITOR.htmlWriter();};CKEDITOR.htmlDataProcessor.prototype={toHtml:function(a){return a;},toDataFormat:function(a){var b=this.writer,c=CKEDITOR.htmlParser.fragment.fromHtml(a.getHtml());b.reset();c.writeHtml(b);return b.getHtml(true);}};
