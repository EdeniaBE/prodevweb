<!DOCTYPE html>
<html><head>
  <title>Projet développement WEB Patrice VERSTICHEL</title>

  
</head><body>
<p>Login</p>


<form name="FormulaireUtilisateur" method="post" action="">
	<div class="message"><?php if($message!="") { echo $message; } ?></div>
		<table border="0" cellpadding="10" cellspacing="1" width="500" align="center" class="tblLogin">
			<tr class="tableheader">
			<td align="center" colspan="2">Entrez vos détails de compte</td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="text" name="userName" placeholder="Login" class="login-input"></td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="password" name="password" placeholder="Mot de passe" class="login-input"></td>
			</tr>
			<tr class="tableheader">
			<td align="center" colspan="2"><input type="submit" name="Envoi" value="Submit" class="btnSubmit"></td>
			</tr>
		</table>
</form>


</body></html>