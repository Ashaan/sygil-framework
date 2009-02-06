
function newsEdit(id) {
    var temp = null;
    try {
        eval('temp = textarea_' + id + ';');
    } catch(error) {
        temp = null;
    }

	if (temp) {
        eval('textarea_' + id + '.destroy();');
        eval('textarea_' + id + ' = null;');
        data = base64_encode(document.getElementById('news_text_' + id));
        // Sauvegarde A faire ici
        //ajax.load('save_news');
    } else {
  	    eval('textarea_' + id + ' = CKEDITOR.replace(\'news_text_' + id + '\');');
    }
}

function newsSave(id) {
  alert('save ' + id + ' a faire');

  content = document.getElementById('news_text_' + id);

  content.innerHTML = tinyMCE.get(newsGet('textarea_' + id)).getContent();

}
