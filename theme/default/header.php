<?php if(!$GLOBALS['domain']) exit;?>


<header role="banner">

	<?php if(count($GLOBALS['nav_multi']) > 1) {?>
		<div id="list-multilingue">
			<ul>
				<?php
				foreach($GLOBALS['nav_multi'] as $cle => $val)
				{
					$active = ($_SESSION['langage'] == $val['value'] || $_SESSION['langage'] == "" && $val['value'] == $lang) ? 'active' : '';
					echo"<li class='lang_".$val['value']."'><form method='post' action='api/ajax.php?mode=onChangeLang'><input class='".$active."' type='submit' value='".$val['value']."' name='lang' /></form></li>";
				}
				?>
			</ul>
		</div>
	<?php } ?>
	<section class="mw960p mod center relative">

		<div>
			<nav role="navigation" aria-label="<?php _e("Quick access")?>" class="inline"><a href="#main" class="acces-rapide"><?php _e("Skip to content")?></a></nav>
			|
			<input type="checkbox" name="high-contrast" id="high-contrast"<?=(@$_COOKIE['high-contrast']?'checked="checked"':'')?>> <label for="high-contrast"><?php _e("Enhanced contrast")?></label>
		</div>

		<div class="center ptm tc"><a href="<?=$GLOBALS['home']?>"><?php media('logo', '320')?></a></div>


		<nav role="navigation" class="mtm mbm tc" aria-label="<?php _e("Browsing menu")?>">

			<button type="button" class="burger" aria-expanded="false" aria-controls="header-menu">
				<span class="open">Menu</span>
				<span class="close none"><?php _e("Close")?></span>
			</button>
			
			<ul id="header-menu" class="grid up">
				<?php
				// Extraction du menu
				foreach($GLOBALS['nav'] as $cle => $val)
				{
					// Menu sélectionné si page en cours ou article (actu)
					if(get_url() == $val['href'] or (@$res['type'] == "article" and $val['href'] == "actualites"))
						$selected = " selected";
					else
						$selected = "";

					echo"<li><a href=\"".make_url($val['href'], array("domaine" => true))."\"".($val['id']?" id='".$val['id']."'":"")."".($val['target']?" target='".$val['target']."'":"")." class='".$selected."'".($selected?' title="'.$val['text'].' - '.__("current page").'"':'').">".$val['text']."</a></li>";
				}
				?>
			</ul>

		</nav>


	</section>

</header>
