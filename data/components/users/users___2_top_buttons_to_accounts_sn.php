<?php
/////////////////////////////////////показать статус запроса в соцсеть, если он не равен 0	

			if ($row['site_update_from_sn_nothanks']!=1){//если мы не отказывались от показа подобных сообщений
				if ($row['site_my_sn']==""){//если мы не привязаны к соцсети vk
				?>
				
					
						<table cellpadding="0" cellspacing="0" width="100%">
						<tr>
						<td align="center" valign="middle">
							<a href="<?php echo(GeneralGlobalVars::url_fasten_account_to_vk."&response_type=code&v=5.0");?>">Привязать свой аккаунт к VK.COM</a>
						</td>
						</tr>
						</table>
					
				
				<?php
				}
				else {//если привязаны
				?>
				
					
						<table cellpadding="0" cellspacing="0" width="100%">
						<tr>
						<td align="center" valign="middle">
							<a href="<?php echo(GeneralGlobalVars::url_import_main_data_across_vk."&response_type=code&v=5.0");?>">Загрузить свою страницу из VK.COM</a>
						</td>
						</tr>
						</table>
					
						
			<?php } ?>
			<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
			<td align="center">
				<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
					<input type="hidden" name="submit" value="usersupdatefromsnnothanks">
					<input type="submit" class="btn btn-link btn-small" value="нет, спасибо">
				</form>
				<?php GeneralImagesPreload::input("images/_general/general___nothanks_submit_text_11_hover.png"); ?>
			</td>
			</tr>
			</table>
			<div class="v_i_b"></div>
			<?php }
			?>