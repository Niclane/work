<?php 
if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo '<form action="log_in.php" method="post">
              <table width="250" cellpadding="0" cellspacing="0"  class="left">
                <tr>
                  <td><strong>Ћог≥н</strong>:</td>
                  <td align="right"><input type="text" name="login" size="17" maxlength="20" /></td>
                </tr>
                <tr>
                  <td><strong>ѕароль</strong>:</td>
                  <td align="right"><input type="password" name="pass" size="17" maxlength="20" /></td>
                </tr>
                <tr>
                  <td><a href="registration.php"><strong>–еЇстрац≥€</strong></a></td>
                  <td align="right"><input type="submit" value="¬х≥д" /></td>
                </tr>
              </table>
</form>';
if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo '<form action="log_in.php" method="post">
              <table width="250" cellpadding="0" cellspacing="0"  class="left">
                <tr>
                  <td><strong>Login</strong>:</td>
                  <td align="right"><input type="text" name="login" size="17" maxlength="20" /></td>
                </tr>
                <tr>
                  <td><strong>Password</strong>:</td>
                  <td align="right"><input type="password" name="pass" size="17" maxlength="20" /></td>
                </tr>
                <tr>
                  <td><a href="registration.php"><strong>Registration</strong></a></td>
                  <td align="right"><input type="submit" value="In" /></td>
                </tr>
              </table>
</form>';

if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo '<form action="log_in.php" method="post">
              <table width="250" cellpadding="0" cellspacing="0"  class="left">
                <tr>
                  <td><strong>Ћогин</strong>:</td>
                  <td align="right"><input type="text" name="login" size="17" maxlength="20" /></td>
                </tr>
                <tr>
                  <td><strong>ѕароль</strong>:</td>
                  <td align="right"><input type="password" name="pass" size="17" maxlength="20" /></td>
                </tr>
                <tr>
                  <td><a href="registration.php"><strong>–егистраци€</strong></a></td>
                  <td align="right"><input type="submit" value="¬ход" /></td>
                </tr>
              </table>
</form>';

?>