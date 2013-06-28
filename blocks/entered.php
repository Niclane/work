<?php
if (isset($_COOKIE['logged']) and $_COOKIE['logged']=="in") {
					$hello=$_COOKIE['login'];
          $role=mysql_query("SELECT role,id FROM users WHERE login='$hello'",$db);
          $rowrole=mysql_fetch_array($role);
          if ($rowrole['role']=='admin') {
            if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_logged">
							<tr>
							  <td class="td" colspan="2"><strong>Ви увійшли, '.$hello.'</strong></td>
							</tr>
              <tr>
							  <td class="td" colspan="2"><a href="see_profile.php?id='.$rowrole["id"].'">Переглянути свій профіль</a></td>
							</tr>
              <tr>
							  <td class="td" colspan="2"><a href="see_users.php">Переглянути новини користувачів</a></td>
							</tr>
                            <tr>
                              <td align="left"><a href="create_new.php"><strong>Створити новину</strong></a></td>
                              <td align="right"><a href="log_out.php">Вийти</a></td>
                            </tr>
                            <tr>
                              <td colspan="2"><a href="change_news.php"><strong>Редагувати новини</strong></a></td>
                            </tr>
                          </table>';
						  
					if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_logged">
							<tr>
							  <td class="td" colspan="2"><strong>You entered, '.$hello.'</strong></td>
							</tr>
              <tr>
							  <td class="td" colspan="2"><a href="see_profile.php?id='.$rowrole["id"].'">See my profile</a></td>
							</tr>
              <tr>
							  <td class="td" colspan="2"><a href="see_users.php">See user news</a></td>
							</tr>
                            <tr>
                              <td align="left"><a href="create_new.php"><strong>Create new</strong></a></td>
                              <td align="right"><a href="log_out.php">Log out</a></td>
                            </tr>
                            <tr>
                              <td colspan="2"><a href="change_news.php"><strong>Change news</strong></a></td>
                            </tr>
                          </table>';
						  
					if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_logged">
							<tr>
							  <td class="td" colspan="2"><strong>Вы вошли, '.$hello.'</strong></td>
							</tr>
              <tr>
							  <td class="td" colspan="2"><a href="see_profile.php?id='.$rowrole["id"].'">Посмотреть мой профиль</a></td>
							</tr>
              <tr>
							  <td class="td" colspan="2"><a href="see_users.php">Посмотреть новости пользователей</a></td>
							</tr>
                            <tr>
                              <td align="left"><a href="create_new.php"><strong>Создать новость</strong></a></td>
                              <td align="right"><a href="log_out.php">Выйти</a></td>
                            </tr>
                            <tr>
                              <td colspan="2"><a href="change_news.php"><strong>Редактировать новости</strong></a></td>
                            </tr>
                          </table>';
            
          }
          elseif ($rowrole['role']=='meneger') {
            if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_logged">
							<tr>
							  <td class="td" colspan="2"><strong>Ви увійшли, '.$hello.'</strong></td>
							</tr>
              <tr>
							  <td class="td" colspan="2"><a href="see_profile.php?id='.$rowrole["id"].'">Переглянути свій профіль</a></td>
							</tr>
                            <tr>
                              <td align="left"><a href="create_new.php"><strong>Створити новину</strong></a></td>
                              <td align="right"><a href="log_out.php">Вийти</a></td>
                            </tr>
                            <tr>
                              <td colspan="2"><a href="change_news.php"><strong>Редагувати новини</strong></a></td>
                            </tr>
                          </table>';
						  
					if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_logged">
							<tr>
							  <td class="td" colspan="2"><strong>You entered, '.$hello.'</strong></td>
							</tr>
              <tr>
							  <td class="td" colspan="2"><a href="see_profile.php?id='.$rowrole["id"].'">See my profile</a></td>
							</tr>
                            <tr>
                              <td align="left"><a href="create_new.php"><strong>Create new</strong></a></td>
                              <td align="right"><a href="log_out.php">Log out</a></td>
                            </tr>
                          </table>';
						  
					if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_logged">
							<tr>
							  <td class="td" colspan="2"><strong>Вы вошли, '.$hello.'</strong></td>
							</tr>
              <tr>
							  <td class="td" colspan="2"><a href="see_profile.php?id='.$rowrole["id"].'">Посмотреть мой профиль</a></td>
							</tr>
                            <tr>
                              <td align="left"><a href="create_new.php"><strong>Создать новость</strong></a></td>
                              <td align="right"><a href="log_out.php">Выйти</a></td>
                            </tr>
                          </table>';
            
          }
          else {
					if (!isset($_COOKIE['lan']) or $_COOKIE['lan']=="ua") echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_logged">
							<tr>
							  <td class="td" colspan="2"><strong>Ви увійшли, '.$hello.'</strong></td>
							</tr>
              <tr>
							  <td class="td" colspan="2"><a href="see_profile.php?id='.$rowrole["id"].'">Переглянути свій профіль</a></td>
							</tr>
                            <tr>
                              <td align="left"><a href="create_new.php"><strong>Створити новину</strong></a></td>
                              <td align="right"><a href="log_out.php">Вийти</a></td>
                            </tr>
                          </table>';
						  
					if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="en") echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_logged">
							<tr>
							  <td class="td" colspan="2"><strong>You entered, '.$hello.'</strong></td>
							</tr>
              <tr>
							  <td class="td" colspan="2"><a href="see_profile.php?id='.$rowrole["id"].'">See my profile</a></td>
							</tr>
                            <tr>
                              <td align="left"><a href="create_new.php"><strong>Create new</strong></a></td>
                              <td align="right"><a href="log_out.php">Log out</a></td>
                            </tr>
                          </table>';
						  
					if (isset($_COOKIE['lan']) and $_COOKIE['lan']=="ru") echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_logged">
							<tr>
							  <td class="td" colspan="2"><strong>Вы вошли, '.$hello.'</strong></td>
							</tr>
              <tr>
							  <td class="td" colspan="2"><a href="see_profile.php?id='.$rowrole["id"].'">Посмотреть мой профиль</a></td>
							</tr>
                            <tr>
                              <td align="left"><a href="create_new.php"><strong>Создать новость</strong></a></td>
                              <td align="right"><a href="log_out.php">Выйти</a></td>
                            </tr>
                          </table>';
                }
                } else require_once "blocks/register.php"; ?>