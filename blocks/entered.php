<?php if (isset($_COOKIE['logged']) and $_COOKIE['logged']=="in") {
					$hello=$_COOKIE['login'];
					if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_logged">
							<tr>
							  <td class="td" colspan="2"><strong>�� ������, '.$hello.'</strong></td>
							</tr>
                            <tr>
                              <td align="left"><a href="create_new.php"><strong>�������� ������</strong></a></td>
                              <td align="right"><a href="log_out.php">�����</a></td>
                            </tr>
                          </table>';
						  
					if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_logged">
							<tr>
							  <td class="td" colspan="2"><strong>You entered, '.$hello.'</strong></td>
							</tr>
                            <tr>
                              <td align="left"><a href="create_new.php"><strong>Create new</strong></a></td>
                              <td align="right"><a href="log_out.php">Log out</a></td>
                            </tr>
                          </table>';
						  
					if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_logged">
							<tr>
							  <td class="td" colspan="2"><strong>�� �����, '.$hello.'</strong></td>
							</tr>
                            <tr>
                              <td align="left"><a href="create_new.php"><strong>������� �������</strong></a></td>
                              <td align="right"><a href="log_out.php">�����</a></td>
                            </tr>
                          </table>';
					} else require_once "blocks/register.php"; ?>