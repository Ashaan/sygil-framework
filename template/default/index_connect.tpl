<form id="connect">
  <table>
  <tr>
    <td class="param"> Pseudo :                     </td>
    <td class="input"> <input type="text" name="username"/>    </td>
  </tr>
  <tr>
    <td class="param"> Mot de Passe :                         </td>
    <td class="input"> <input type="password" name="password"/> </td>   
  </tr>
  </table>
  <div class="button">
    <input type="button" onclick="session.connect();" value="Valider"/>
    <input type="button" onclick="session.wclose();" value="Fermer"/>
  </div>
</form>

