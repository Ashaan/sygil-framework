/*
Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.plugins.add('newpage',{init:function(a,b){a.addCommand('newpage',{exec:function(c){c.setData(c.config.newpage_html);}});a.ui.addButton('NewPage',{label:a.lang.newpage,command:'newpage'});}});CKEDITOR.config.newpage_html='';
