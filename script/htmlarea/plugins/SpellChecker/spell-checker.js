// Spell Checker Plugin for HTMLArea-3.0
// Sponsored by www.americanbible.org
// Implementation by Mihai Bazon, http://dynarch.com/mishoo/
//
// (c) dynarch.com 2003.
// Distributed under the same terms as HTMLArea itself.
// This notice MUST stay intact for use (see license.txt).
//
// $Id: spell-checker.js,v 1.3 2005/10/06 13:14:26 mishoo Exp $
function SpellChecker(editor){this.editor=editor;var cfg=editor.config;var tt=SpellChecker.I18N;var bl=SpellChecker.btnList;var self=this;var toolbar=[];for(var i=0;i<bl.length;++i){var btn=bl[i];if(!btn){toolbar.push("separator");}else{var id="SC-"+btn[0];cfg.registerButton(id,tt[id],editor.imgURL(btn[0]+".gif","SpellChecker"),false,function(editor,id){self.buttonPress(editor,id);},btn[1]);toolbar.push(id);}}for(var i=0;i<toolbar.length;++i){cfg.toolbar[0].push(toolbar[i]);}};SpellChecker._pluginInfo={name:"SpellChecker",version:"1.0",developer:"Mihai Bazon",developer_url:"http://dynarch.com/mishoo/",c_owner:"Mihai Bazon",sponsor:"American Bible Society",sponsor_url:"http://www.americanbible.org",license:"htmlArea"};SpellChecker.btnList=[null,["spell-check"]];SpellChecker.prototype.buttonPress=function(editor,id){switch(id){case "SC-spell-check":SpellChecker.editor=editor;SpellChecker.init=true;var uiurl=_editor_url+"plugins/SpellChecker/spell-check-ui.html";HTMLArea.centeredWindowOpen(uiurl,{w:600,h:500},"SC_spell_checker").focus();break;}};SpellChecker.editor=null;