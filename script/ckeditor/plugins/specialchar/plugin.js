/*
Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.plugins.add('specialchar',{init:function(a,b){var c='specialchar';CKEDITOR.dialog.add(c,this.path+'dialogs/specialchar.js');a.addCommand(c,new CKEDITOR.dialogCommand(c));a.ui.addButton('SpecialChar',{label:a.lang.specialChar.toolbar,command:c});}});
