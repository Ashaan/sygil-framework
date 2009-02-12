<form id="register">
  <table>
  <tr>
    <td class="param"> Pseudo :                     </td>
    <td class="input"> <input type="text" name="pseudo"/>    </td>
  </tr>
    <tr>
    <td class="param"> Nom :                     </td>
    <td class="input"> <input type="text" name="username"/>    </td>
    <td class="param"> Prenom :					 </td>
    <td class="input"> <input type="text" name="userfirstname"/> </td>
  </tr>
 
  <tr>
    <td class="param"> Mot de Passe :                         </td>
    <td class="input"> <input type="password" name="password"/> </td>   
	<td class="param"> Confirmation :              </td>
	<td class="input"> <input type="password" name="confirmpass"/> </td>
  </tr>
 
  <tr>
    <td class="param"> Adresse Mail :	               </td>
    <td class="input"> <input type="text" name="mail"/> </td>   
	<td class="param"> Confirmation :              </td>
	<td class="input"> <input type="text" name="confirmail"/> </td>
  </tr>
 
  </table>
*merci de remplir tout les champs
 
  <div class="button"">
    <input type="button" onclick="session.connect();" value="Envoyer"/>
	<input type="button" onclick="reset" value="Vider formulaire"/>
    <input type="button" onclick="session.wclose();" value="Fermer"/>

  </div>
</form>

