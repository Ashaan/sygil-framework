function verifForm(register) {

if (document.formulaire.password.value == document.formulaire.confirmpass.value) && (document.formulaire.mail.value == document.formulaire.confirmmail.value)
	{
		if ((document.formulaire.pseudo.value == "") || (document.formulaire.username.value == "") || (document.formulaire.userfirstname.value == "") || (document.formulaire.mail.value == "") || (document.formulaire.confirmail.value == "") || (document.formulaire.password.value == "") || (document.formulaire.confirmpass.value == ""))
	{alert('Veuillez remplir tout les champs! Merci.');}
		else {	adresse = formulaire.mail.value;
		var place = adresse.indexOf("@",1);
		var point = adresse.indexOf(".",place+1);
		if ((place > -1)&&(adresse.length >2)&&(point > 1))
		{
		formulaire.submit();
		return(true);
		}
	else
		{
		alert('Entrez une adresse e-mail valide! Merci.');
		return(false);
		}
	}}
else
	{alert('Veuillez re-saisir votre mot de passe ! Merci.');}}
