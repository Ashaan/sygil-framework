﻿/*
Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.dialog.add('specialchar',function(a){return{title:a.lang.specialChar.title,minWidth:450,minHeight:350,buttons:[CKEDITOR.dialog.cancelButton],charColumns:17,chars:['!','&quot;','#','$','%','&amp;',"'",'(',')','*','+','-','.','/','0','1','2','3','4','5','6','7','8','9',':',';','&lt;','=','&gt;','?','@','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','[',']','^','_','`','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','{','|','}','~','&euro;','&lsquo;','&rsquo;','&rsquo;','&ldquo;','&rdquo;','&ndash;','&mdash;','&iexcl;','&cent;','&pound;','&curren;','&yen;','&brvbar;','&sect;','&uml;','&copy;','&ordf;','&laquo;','&not;','&reg;','&macr;','&deg;','&plusmn;','&sup2;','&sup3;','&acute;','&micro;','&para;','&middot;','&cedil;','&sup1;','&ordm;','&raquo;','&frac14;','&frac12;','&frac34;','&iquest;','&Agrave;','&Aacute;','&Acirc;','&Atilde;','&Auml;','&Aring;','&AElig;','&Ccedil;','&Egrave;','&Eacute;','&Ecirc;','&Euml;','&Igrave;','&Iacute;','&Icirc;','&Iuml;','&ETH;','&Ntilde;','&Ograve;','&Oacute;','&Ocirc;','&Otilde;','&Ouml;','&times;','&Oslash;','&Ugrave;','&Uacute;','&Ucirc;','&Uuml;','&Yacute;','&THORN;','&szlig;','&agrave;','&aacute;','&acirc;','&atilde;','&auml;','&aring;','&aelig;','&ccedil;','&egrave;','&eacute;','&ecirc;','&euml;','&igrave;','&iacute;','&icirc;','&iuml;','&eth;','&ntilde;','&ograve;','&oacute;','&ocirc;','&otilde;','&ouml;','&divide;','&oslash;','&ugrave;','&uacute;','&ucirc;','&uuml;','&uuml;','&yacute;','&thorn;','&yuml;','&OElig;','&oelig;','&#372;','&#374','&#373','&#375;','&sbquo;','&#8219;','&bdquo;','&hellip;','&trade;','&#9658;','&bull;','&rarr;','&rArr;','&hArr;','&diams;','&asymp;'],onLoad:function(){var b=this.definition.charColumns,c=this.definition.chars,d=['<table style="width: 320px; height: 100%; border-collapse: separate;" align="center" cellspacing="2" cellpadding="2" border="0">'],e=0;while(e<c.length){d.push('<tr>');for(var f=0;f<b;f++,e++){if(c[e]){d.push('<td width="1%" title="',c[e].replace(/&/g,'&amp;'),'" value="',c[e].replace(/&/g,'&amp;'),'" class="DarkBackground Hand">');d.push(c[e]);}else d.push('<td class="DarkBackground">&nbsp;');d.push('</td>');}d.push('</tr>');}d.push('</tbody></table>');this.getContentElement('info','charContainer').getElement().setHtml(d.join(''));},contents:[{id:'info',label:a.lang.common.generalTab,title:a.lang.common.generalTab,elements:[{type:'hbox',align:'top',widths:['300px','90px'],children:[{type:'hbox',align:'top',padding:0,widths:['350px'],children:[{type:'html',id:'charContainer',html:'',onMouseover:function(b){var c=b.data.getTarget(),d=c.getName(),e;
if(d=='td'&&(e=c.getAttribute('value'))){var f=this.getDialog(),g=f.getContentElement('info','charPreview').getElement(),h=f.getContentElement('info','htmlPreview').getElement();g.setHtml(e);h.setHtml(CKEDITOR.tools.htmlEncode(e));c.addClass('LightBackground');}},onMouseout:function(b){var c=this.getDialog(),d=c.getContentElement('info','charPreview').getElement(),e=c.getContentElement('info','htmlPreview').getElement(),f=b.data.getTarget(),g=f.getName();d.setHtml('&nbsp;');e.setHtml('&nbsp;');if(g=='td')f.removeClass('LightBackground');},onClick:function(b){var c=b.data.getTarget(),d=c.getName(),e=this.getDialog().getParentEditor(),f;if(d=='td'){c=c.$;if(f=c.getAttribute('value')){this.getDialog().restoreSelection();e.insertHtml(f);this.getDialog().hide();}}}}]},{type:'vbox',align:'top',children:[{type:'html',html:'<div></div>'},{type:'html',id:'charPreview',style:"border:1px solid #eeeeee;background-color:#EAEAD1;font-size:28px;height:40px;padding-top:9px;font-family:'Microsoft Sans Serif',Arial,Helvetica,Verdana;text-align:center;",html:'<div>&nbsp;</div>'},{type:'html',id:'htmlPreview',style:"border:1px solid #eeeeee;background-color:#EAEAD1;font-size:14px;height:20px;padding-top:2px;font-family:'Microsoft Sans Serif',Arial,Helvetica,Verdana;text-align:center;",html:'<div>&nbsp;</div>'}]}]}]}]};});