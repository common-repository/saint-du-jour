<?php
/*
 Plugin Name: Saint du jour
 Plugin URI: http://sitesweb.sursum-corda.fr/telechargements.html
 Description: This widget displays the saint of the day, according to the timetable of the ordinary and/or the extraordinary form of Roman Catholic rite. Affiche le saint du jour, en accord avec la liturgie catholique romaine dans sa forme ordinaire et/ou extraordinaire.
 Version: 1.1
 Author: Nicolas Fischmeister
 Author URI: http://sitesweb.sursum-corda.fr/
 */
load_plugin_textdomain('saintdujour', 'wp-content/plugins/' . dirname(plugin_basename(__FILE__)) . '/language');
function reglages_widget_saintdujour()
{
	$options = get_option('widget_saintdujour');
	if (!is_array($options))
	{
		$options = array(
			'titre' => 'Saint du jour', 
			'aff_forme_1' => '1', 
			'aff_lang_1' => '0', 
			'aff_label_1' => '1', 
			'aff_label_ordi' => 'Forme ordinaire :', 
			'aff_sep_1' => '1', 
			'aff_lien_1' => '1', 
			'aff_forme_2' => '1', 
			'aff_lang_2' => '0', 
			'aff_label_2' => '1', 
			'aff_label_extra' => 'Forme extraordinaire :', 
			'aff_sep_2' => '1', 
			'aff_lien_2' => '1'
		);
	}
	if ($_POST['saintdujour-modifier'])
	{
		$options['titre'] = strip_tags(stripslashes($_POST['titre']));
		$options['aff_forme_1'] = $_POST['aff_forme_1'];
		$options['aff_lang_1'] = $_POST['aff_lang_1'];
		$options['aff_label_1'] = $_POST['aff_label_1'];
		$options['aff_label_ordi'] = strip_tags(stripslashes($_POST['aff_label_ordi']));
		$options['aff_sep_1'] = $_POST['aff_sep_1'];
		$options['aff_lien_1'] = $_POST['aff_lien_1'];
		$options['aff_forme_2'] = $_POST['aff_forme_2'];
		$options['aff_lang_2'] = $_POST['aff_lang_2'];
		$options['aff_label_2'] = $_POST['aff_label_2'];
		$options['aff_label_extra'] = strip_tags(stripslashes($_POST['aff_label_extra']));
		$options['aff_sep_2'] = $_POST['aff_sep_2'];
		$options['aff_lien_2'] = $_POST['aff_lien_2'];
		update_option('widget_saintdujour', $options);
	}
	$titre = htmlspecialchars($options['titre'], ENT_QUOTES);
	$aff_forme_1 = $options['aff_forme_1'];
	$aff_lang_1 = $options['aff_lang_1'];
	$aff_label_1 = $options['aff_label_1'];
	$aff_label_ordi = htmlspecialchars($options['aff_label_ordi'], ENT_QUOTES);
	$aff_sep_1 = $options['aff_sep_1'];
	$aff_lien_1 = $options['aff_lien_1'];
	$aff_forme_2 = $options['aff_forme_2'];
	$aff_lang_2 = $options['aff_lang_2'];
	$aff_label_2 = $options['aff_label_2'];
	$aff_label_extra = htmlspecialchars($options['aff_label_extra'], ENT_QUOTES);
	$aff_sep_2 = $options['aff_sep_2'];
	$aff_lien_2 = $options['aff_lien_2'];
	echo '
	<h3>' . __('TITRE DU WIDGET') . '</h3>
	<div style="background-color:#FAFAFA; padding:5px; font-size:9px; text-align:right;">
	<input style="width: 200px; height:15px; font-size:9px; padding:0;" id="titre" name="titre" type="text" value="' . $titre . '" />
	</div>
	<hr />
	<h3>' . __('FORME ORDINAIRE') . '</h3>
	<div style="background-color:#FAFAFA; padding:5px; font-size:9px; text-align:right;">
	<label for="aff_forme_1">' . __('Afficher forme ordinaire') . '</label>
	<input name="aff_forme_1" id="aff_forme_1" value="1"'; if ($aff_forme_1 == 1) echo ' checked="checked"'; echo ' type="radio">
	<label for="aff_forme_1">' . __('Non') . '</label>
	<input name="aff_forme_1" id="aff_forme_1" value="0"'; if ($aff_forme_1 == 0) echo ' checked="checked"'; echo ' type="radio">
	<label for="aff_lang_1">' . __('Langue') . '&nbsp;
		<select style="width: 160px; height:15px; font-size:9px; padding:0;" id="aff_lang_1" name="aff_lang_1">
			<option value="0" selected="selected">Fran&ccedil;ais / French</option>
			<option value="1">Anglais / English</option>
			<option value="2">Allemand / German</option>
			<option value="3">Espagnol / Spanish</option>
			<option value="4">Portugais / Portuguese</option>
			<option value="5">N&eacute;erlandais / Dutch</option>
			<option value="6">Italien / Italian</option>
			<option value="7">Arabe maronite / Arab maronite</option>
		</select>
	</label>
	</div>
	<div style="background-color:#EFEFEF; padding:5px; font-size:9px; text-align:right;">
	<label for="aff_label_1">' . __('Afficher le label') . '</label>
	<input name="aff_label_1" id="aff_label_1" value="1"'; if ($aff_label_1 == 1) echo ' checked="checked"'; echo ' type="radio">
	<label for="aff_label_1">' . __('Non') . '</label>
	<input name="aff_label_1" id="aff_label_1" value="0"'; if ($aff_label_1 == 0) echo ' checked="checked"'; echo ' type="radio"><br />
	<label for="aff_label_ordi">' . __('Label') . '&nbsp;<input style="width: 160px; height:15px; font-size:9px; padding:0;" id="aff_label_ordi" name="aff_label_ordi" type="text" value="' . $aff_label_ordi . '" /></label><br />
	<label for="aff_sep_1">' . __('Saut de ligne apr&egrave;s label') . '</label>
	<input name="aff_sep_1" id="aff_sep_1" value="1"'; if ($aff_sep_1 == 1) echo ' checked="checked"'; echo ' type="radio">
	<label for="aff_sep_1">' . __('Non') . '</label>
	<input name="aff_sep_1" id="aff_sep_1" value="0"'; if ($aff_sep_1 == 0) echo ' checked="checked"'; echo ' type="radio">
	</div>
	<div style="background-color:#FAFAFA; padding:5px; font-size:9px; text-align:right;">
	<label for="aff_lien_1">' . __('Afficher le lien') . '</label>
	<input name="aff_lien_1" id="aff_lien_1" value="1"'; if ($aff_lien_1 == 1) echo ' checked="checked"'; echo ' type="radio">
	<label for="aff_lien_1">' . __('Non') . '</label>
	<input name="aff_lien_1" id="aff_lien_1" value="0"'; if ($aff_lien_1 == 0) echo ' checked="checked"'; echo ' type="radio">
	</div>
	<hr />
	<h3>' . __('FORME ORDINAIRE') . '</h3>
	<div style="background-color:#FAFAFA; padding:5px; font-size:9px; text-align:right;">
	<label for="aff_forme_2">' . __('Afficher forme ordinaire') . '</label>
	<input name="aff_forme_2" id="aff_forme_2" value="1"'; if ($aff_forme_2 == 1) echo ' checked="checked"'; echo ' type="radio">
	<label for="aff_forme_2">' . __('Non') . '</label>
	<input name="aff_forme_2" id="aff_forme_2" value="0"'; if ($aff_forme_2 == 0) echo ' checked="checked"'; echo ' type="radio">
	<label for="aff_lang_2">' . __('Langue') . '&nbsp;
		<select style="width: 160px; height:15px; font-size:9px; padding:0;" id="aff_lang_2" name="aff_lang_2">
			<option value="0" selected="selected">Fran&ccedil;ais / French</option>
			<option value="1">Anglais / English</option>
			<option value="2">Allemand / German</option>
			<option value="3">Espagnol / Spanish</option>
			<option value="4">Portugais / Portuguese</option>
			<option value="5">N&eacute;erlandais / Dutch</option>
			<option value="6">Italien / Italian</option>
			<option value="7">Arabe maronite / Arab maronite</option>
		</select>
	</label>
	</div>
	<div style="background-color:#EFEFEF; padding:5px; font-size:9px; text-align:right;">
	<label for="aff_label_2">' . __('Afficher le label') . '</label>
	<input name="aff_label_2" id="aff_label_2" value="1"'; if ($aff_label_2 == 1) echo ' checked="checked"'; echo ' type="radio">
	<label for="aff_label_2">' . __('Non') . '</label>
	<input name="aff_label_2" id="aff_label_2" value="0"'; if ($aff_label_2 == 0) echo ' checked="checked"'; echo ' type="radio"><br />
	<label for="aff_label_extra">' . __('Label') . '&nbsp;<input style="width: 160px; height:15px; font-size:9px; padding:0;" id="aff_label_extra" name="aff_label_extra" type="text" value="' . $aff_label_extra . '" /></label><br />
	<label for="aff_sep_2">' . __('Saut de ligne apr&egrave;s label') . '</label>
	<input name="aff_sep_2" id="aff_sep_2" value="1"'; if ($aff_sep_2 == 1) echo ' checked="checked"'; echo ' type="radio">
	<label for="aff_sep_2">' . __('Non') . '</label>
	<input name="aff_sep_2" id="aff_sep_2" value="0"'; if ($aff_sep_2 == 0) echo ' checked="checked"'; echo ' type="radio">
	</div>
	<div style="background-color:#FAFAFA; padding:5px; font-size:9px; text-align:right;">
	<label for="aff_lien_2">' . __('Afficher le lien') . '</label>
	<input name="aff_lien_2" id="aff_lien_2" value="1"'; if ($aff_lien_2 == 1) echo ' checked="checked"'; echo ' type="radio">
	<label for="aff_lien_2">' . __('Non') . '</label>
	<input name="aff_lien_2" id="aff_lien_2" value="0"'; if ($aff_lien_2 == 0) echo ' checked="checked"'; echo ' type="radio">
	</div>

	<input type="hidden" id="saintdujour-modifier" name="saintdujour-modifier" value="1" />
	<div style="font-size:8px; color:#999999; padding:10px;">
	' . __('Saut de ligne si d&eacute;coch&eacute; = <strong>&amp;nbsp;</strong><br />Saut de ligne si coch&eacute; = <strong>&lt;br /&gt;</strong><br/>Classe du label : <strong>.saintdujour_forme</strong><br />Classe du saint : <strong>.saintdujour_saint</strong>') . '
	</div>
	';
}
function widget_saintdujour($args)
{
	extract($args);
	$options = get_option('widget_saintdujour');
	$titre = $options['titre'];
	$aff_forme_1 = $options['aff_forme_1'];
	$aff_lang_1 = $options['aff_lang_1'];
	$aff_label_1 = $options['aff_label_1'];
	$aff_sep_1 = $options['aff_sep_1'];
	$aff_label_ordi = $options['aff_label_ordi'];
	$aff_lien_1 = $options['aff_lien_1'];
	$aff_forme_2 = $options['aff_forme_2'];
	$aff_lang_2 = $options['aff_lang_2'];
	$aff_label_2 = $options['aff_label_2'];
	$aff_sep_2 = $options['aff_sep_2'];
	$aff_label_extra = $options['aff_label_extra'];
	$aff_lien_2 = $options['aff_lien_2'];
	switch ($aff_lang_1)
	{
		case 0 : $aff_lang_1 = "FR"; break;
		case 1 : $aff_lang_1 = "AM"; break;
		case 2 : $aff_lang_1 = "DE"; break;
		case 3 : $aff_lang_1 = "SP"; break;
		case 4 : $aff_lang_1 = "PT"; break;
		case 5 : $aff_lang_1 = "NL"; break;
		case 6 : $aff_lang_1 = "IT"; break;
		case 7 : $aff_lang_1 = "MAA"; break;
	}
	switch ($aff_lang_2)
	{
		case 0 : $aff_lang_2 = "TRF"; break;
		case 1 : $aff_lang_2 = "TRA"; break;
	}
	// --------------------------------------------------------------------------------------------
	// --- Définition du Saint du jour - Forme ordinaire ------------------------------------------
	// --------------------------------------------------------------------------------------------
	$url = "http://feed.evangelizo.org/reader.php?date=$today&type=saint&lang=$aff_lang_1";
	$h = fopen($url,"r");
	if ($h) :
		while (!feof($h)) { $a .= fgets($h); }
		$a = utf8_encode($a);
		$a = str_replace ("( ", "(&#8224;", $a);
		$a = str_replace (",&nbsp;&nbsp;", "&nbsp;&#149;&nbsp;", $a);
		$a = str_replace ("(+ ", "(&#8224;", $a);
	endif;
	// On affiche la fête s'il n'y a pas de saint du jour
	if (!$a) {
		$aa=fopen("http://feed.evangelizo.org/reader.php?date=$today&type=liturgic_t&lang=$aff_lang_1", "r");
		if ($aa) $a=fgets($aa);
	}
	// On retire les liens du code si on n'en a pas besoin
	if ($aff_lien_1 == "0") {
		$a = ereg_replace("<a[^>]*>", "", $a);
		$a = ereg_replace("</a[^>]*>", "", $a);
	}
	// --------------------------------------------------------------------------------------------
	// --- Définition du Saint du jour - Forme extraordinaire -------------------------------------
	// --------------------------------------------------------------------------------------------
	$url = "http://feed.evangelizo.org/reader.php?date=$today&type=saint&lang=$aff_lang_2";
	$h = fopen($url,"r");
	if ($h) :
		while (!feof($h)) { $b .= fgets($h); }
		$b = utf8_encode($b);
		$b = str_replace ("( ", "(&#8224;", $b);
		$b = str_replace (",&nbsp;&nbsp;", "&nbsp;&#149;&nbsp;", $b);
		$b = str_replace ("(+ ", "(&#8224;", $b);
	endif;
	// On affiche la fête s'il n'y a ps de saint du jour
	if (!$b) {
		$bb=fopen("http://feed.evangelizo.org/reader.php?date=$today&type=liturgic_t&lang=$aff_lang_2", "r");
		if ($bb) $b=fgets($bb);
	}
	// On retire les liens du code si on n'en a pas besoin
	if ($aff_lien_2 == "0") {
		$b = ereg_replace("<a[^>]*>", "", $b);
		$b = ereg_replace("</a[^>]*>", "", $b);
	}
	echo $before_widget;
	echo $before_title . $titre . $after_title;
	if ($aff_forme_1 == "1")
	{
		if ($aff_label_1 == "1")
		{
			echo "<span class='saintdujour_forme'>" . $aff_label_ordi . "</span>";
			if ($aff_sep_1 == "1") echo "<br />"; else echo "&nbsp;";
		}
		echo "<span class='saintdujour_saint'>".$a."</span>";
	}
	if ($aff_forme_1 == "1" && $aff_forme_2 == "1")
	{
		echo "<br />";
	}
	if ($aff_forme_2 == "1")
	{
		if ($aff_label_2 == "1")
		{
			echo "<span class='saintdujour_forme'>" . $aff_label_extra . "</span>";
			if ($aff_sep_2 == "1") echo "<br />"; else echo "&nbsp;";
		}
		echo "<span class='saintdujour_saint'>".$b."</span>";
	}
	// merci de laisser ce lien invisible en guise de contribution au développement du wiget.
	echo "<div style='display:none;'><a href='http://sitesweb.sursum-corda.fr' title='Creation de site internet catholique low-cost'>Sursum Corda</a></div>";
	echo $after_widget;
}
function affichage_widget_saintdujour($args)
{
	if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') ) return;
	register_sidebar_widget('Saint du jour', 'widget_saintdujour');    
	register_widget_control('Saint du jour', 'reglages_widget_saintdujour');
}
add_action('plugins_loaded', 'affichage_widget_saintdujour');
?>
