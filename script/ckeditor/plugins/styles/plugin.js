﻿/*
Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.plugins.add('styles',{requires:['selection']});CKEDITOR.editor.prototype.attachStyleStateChange=function(a,b){var c=this._.styleStateChangeCallbacks;if(!c){c=this._.styleStateChangeCallbacks=[];this.on('selectionChange',function(d){for(var e=0;e<c.length;e++){var f=c[e],g=f.style.checkActive(d.data.path)?CKEDITOR.TRISTATE_ON:CKEDITOR.TRISTATE_OFF;if(f.state!==g){f.fn.call(this,g);f.state!==g;}}});}c.push({style:a,fn:b});};CKEDITOR.STYLE_BLOCK=1;CKEDITOR.STYLE_INLINE=2;CKEDITOR.STYLE_OBJECT=3;(function(){var a={address:1,div:1,h1:1,h2:1,h3:1,h4:1,h5:1,h6:1,p:1,pre:1},b={a:1,embed:1,hr:1,img:1,li:1,object:1,ol:1,table:1,td:1,tr:1,ul:1};CKEDITOR.style=function(k){var l=this.element=(k.element||'*').toLowerCase();this.type=l=='#'||a[l]?CKEDITOR.STYLE_BLOCK:b[l]?CKEDITOR.STYLE_OBJECT:CKEDITOR.STYLE_INLINE;this._={definition:k};};CKEDITOR.style.prototype={apply:function(k){var l=k.getSelection(),m=l.getRanges();for(var n=0;n<m.length;n++)this.applyToRange(m[n]);l.selectRanges(m);},applyToRange:function(k){var l=this;return(l.applyToRange=l.type==CKEDITOR.STYLE_INLINE?c:l.type==CKEDITOR.STYLE_BLOCK?d:null).call(l,k);},checkActive:function(k){switch(this.type){case CKEDITOR.STYLE_BLOCK:return this.checkElementRemovable(k.block||k.blockLimit,true);case CKEDITOR.STYLE_INLINE:var l=k.elements;for(var m=0,n;m<l.length;m++){n=l[m];if(n==k.block||n==k.blockLimit)continue;if(this.checkElementRemovable(n,true))return true;}}return false;},checkElementRemovable:function(k,l){if(!k||k.getName()!=this.element)return false;var m=this._.definition,n=m.attributes,o=m.styles;if(!l&&!k.hasAttributes())return true;for(var p in n)if(k.getAttribute(p)==n[p])if(!l)return true;else if(l)return false;return true;},setVariable:function(k,l){var m=this._.variables||(this._variables={});m[k]=l;}};var c=function(k){var H=this;var l=k.document;if(k.collapsed){var m=j(H,l);k.insertNode(m);k.moveToPosition(m,CKEDITOR.POSITION_BEFORE_END);return;}var n=H.element,o=H._.definition,p,q=CKEDITOR.dtd[n]||(p=true,CKEDITOR.dtd.span),r=k.createBookmark();k.enlarge(CKEDITOR.ENLARGE_ELEMENT);k.trim();var s=k.startContainer.getChild(k.startOffset)||k.startContainer.getNextSourceNode(),t=k.endContainer.getChild(k.endOffset)||(k.endOffset?k.endContainer.getNextSourceNode():k.endContainer),u=s,v,w;while(u){var x=false;if(u.equals(t)){u=null;x=true;}else{var y=u.type,z=y==CKEDITOR.NODE_ELEMENT?u.getName():null;if(z&&u.getAttribute('_fck_bookmark')){u=u.getNextSourceNode(true);continue;}if(!z||q[z]&&(u.getPosition(t)|CKEDITOR.POSITION_PRECEDING|CKEDITOR.POSITION_IDENTICAL|CKEDITOR.POSITION_IS_CONTAINED)==(CKEDITOR.POSITION_PRECEDING+CKEDITOR.POSITION_IDENTICAL+CKEDITOR.POSITION_IS_CONTAINED)){var A=u.getParent();
if(A&&((A.getDtd()||CKEDITOR.dtd.span)[n]||p)){if(!v&&(!z||!CKEDITOR.dtd.$removeEmpty[z]||(u.getPosition(t)|CKEDITOR.POSITION_PRECEDING|CKEDITOR.POSITION_IDENTICAL|CKEDITOR.POSITION_IS_CONTAINED)==(CKEDITOR.POSITION_PRECEDING+CKEDITOR.POSITION_IDENTICAL+CKEDITOR.POSITION_IS_CONTAINED))){v=new CKEDITOR.dom.range(l);v.setStartBefore(u);}if(y==CKEDITOR.NODE_TEXT||y==CKEDITOR.NODE_ELEMENT&&!u.getChildCount()&&u.$.offsetWidth){var B=u,C;while(!B.$.nextSibling&&(C=B.getParent(),q[C.getName()])&&((C.getPosition(s)|CKEDITOR.POSITION_FOLLOWING|CKEDITOR.POSITION_IDENTICAL|CKEDITOR.POSITION_IS_CONTAINED)==(CKEDITOR.POSITION_FOLLOWING+CKEDITOR.POSITION_IDENTICAL+CKEDITOR.POSITION_IS_CONTAINED)))B=C;v.setEndAfter(B);if(!B.$.nextSibling)x=true;if(!w)w=y!=CKEDITOR.NODE_TEXT||/[^\s\ufeff]/.test(u.getText());}}else x=true;}else x=true;u=u.getNextSourceNode();}if(x&&w&&v&&!v.collapsed){var D=j(H,l),E=v.getCommonAncestor();while(D&&E){if(E.getName()==n){for(var F in o.attribs)if(D.getAttribute(F)==E.getAttribute(F))D.removeAttribute(F);for(var G in o.styles)if(D.getStyle(G)==E.getStyle(G))D.removeStyle(G);if(!D.hasAttributes()){D=null;break;}}E=E.getParent();}if(D){v.extractContents().appendTo(D);e(H,D);v.insertNode(D);g(D);if(!CKEDITOR.env.ie)D.$.normalize();}v=null;}}k.moveToBookmark(r);},d=function(k){},e=function(k,l){var m=k._.definition,n=m.attributes,o=m.styles,p=l.getElementsByTag(k.element);for(var q=p.count();--q>=0;){var r=p.getItem(q);for(var s in n){if(s=='class'&&r.getAttribute('class')!=n[s])continue;r.removeAttribute(s);}for(var t in o)r.removeStyle(t);f(r);}},f=function(k){if(!k.hasAttributes()){var l=k.getFirst(),m=k.getLast();k.remove(true);if(l){g(l);if(m&&!l.equals(m))g(m);}}},g=function(k){if(!k||k.type!=CKEDITOR.NODE_ELEMENT||!CKEDITOR.dtd.$removeEmpty[k.getName()])return;h(k,k.getNext(),true);h(k,k.getPrevious());},h=function(k,l,m){if(l&&l.type==CKEDITOR.NODE_ELEMENT){var n=l.getAttribute('_fck_bookmark');if(n)l=m?l.getNext():l.getPrevious();if(l&&l.type==CKEDITOR.NODE_ELEMENT&&l.getName()==k.getName()){var o=m?k.getLast():k.getFirst();if(n)(m?l.getPrevious():l.getNext()).move(k,!m);l.moveChildren(k,!m);l.remove();if(o)g(o);}}},i=/#\(\s*("|')(.+?)\1[^\)]*\s*\)/g,j=function(k,l){var m=k._.element;if(m)return m.clone();var n=k._.definition,o=k._.variables,p=k.element,q=n.attributes,r=n.styles;if(p=='*')p='span';m=new CKEDITOR.dom.element(p,l);if(q)for(var s in q){var t=q[s];if(t&&o)t=t.replace(i,function(){return o[arguments[2]]||arguments[0];});m.setAttribute(s,t);
}if(r){for(var u in r)m.setStyle(u,r[u]);if(o){t=m.getAttribute('style').replace(i,function(){return o[arguments[2]]||arguments[0];});m.setAttribute('style',t);}}return k._.element=m;};})();CKEDITOR.styleCommand=function(a){this.style=a;};CKEDITOR.styleCommand.prototype.exec=function(a){a.focus();var b=a.document;if(b)this.style.apply(b);return!!b;};