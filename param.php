<?php

// Now display the options editing screen
print '<div class="wrap">';
print '<h2>'.__('ekaPicasa Gallery Configuration', 'ekapicasa_gallery').'</h2>';

print '<h3>'.__('Usage', 'ekapicasa_gallery').'</h3>';
print '<p>'.__('Create post or a page and write <code>KPICASA_GALLERY</code> <strong>on its own line</strong>.', 'ekapicasa_gallery').'</p>';
print '<p>'.sprintf(__('Please refer to the %sWordPress plugin page%s for advanced usage.'), '<a href="http://wordpress.org/extend/plugins/kpicasa-gallery/other_notes/" target="_blank">', '</a>').'</p>';

// Form
print '<form method="post" action="options.php">';
settings_fields('ekapicasa_gallery_config');
$config = get_option('ekapicasa_gallery_config');
$config['picEngine']      = $config['picEngine'] != null ? $config['picEngine'] : '';
$config['albumPerPage']   = $config['albumPerPage'] > 0 ? $config['albumPerPage'] : '';
$config['photoPerPage']   = $config['photoPerPage'] > 0 ? $config['photoPerPage'] : '';
$config['dateFormat']     = $config['dateFormat'] != null ? $config['dateFormat'] : 'Y-m-d';
$config['albumThumbSize'] = $config['albumThumbSize'] != null ? $config['albumThumbSize'] : 160;
$config['photoThumbSize'] = $config['photoThumbSize'] != null ? $config['photoThumbSize'] : 144;
$config['photoSize']      = $config['photoSize'] != null ? $config['photoSize'] : 800;

if ( $config['picEngine'] == 'highslide' )
{
	print '<p><strong>'.__('ATTENTION: because of licencing issues, Highslide has been removed from kPicasa Gallery. Please select another engine for full-sized pictures. I apologize to everyone for the inconvenience.', 'ekapicasa_gallery').'</strong></p>';
}

// General settings
print '<h3>'.__('General settings', 'ekapicasa_gallery').'</h3>';
print '<table class="form-table">';

// Username
print '<tr valign="top">';
print '<th scope="row">'.__('Picasa Web Albums Username', 'ekapicasa_gallery').':</th>';
print '<td><input name="ekapicasa_gallery_config[username]" type="text" value="'.$config['username'].'" size="40" /></td>';
print '</tr>';

// Picture engine
print '<tr valign="top">';
print '<th scope="row">'.__('Engine for full-sized pictures', 'ekapicasa_gallery').':</th>';
$chk = $config['picEngine'] == 'shadowbox' ? ' checked="checked"' : '';
print '<td><input type="radio" name="ekapicasa_gallery_config[picEngine]" value="shadowbox"'.$chk.' /> <a href="http://www.shadowbox-js.com/" target="_blank">Shadowbox</a><br />';
$chk = $config['picEngine'] == 'fancybox' ? ' checked="checked"' : '';
print '<input type="radio" name="ekapicasa_gallery_config[picEngine]" value="fancybox"'.$chk.' /> <a href="http://fancybox.net/" target="_blank">Fancybox</a> - '.__('Buggy video playback, author working on a new version.', 'ekapicasa_gallery').'<br />';
$chk = $config['picEngine'] == 'thickbox' ? ' checked="checked"' : '';
print '<input type="radio" name="ekapicasa_gallery_config[picEngine]" value="thickbox"'.$chk.' /> <a href="http://jquery.com/demo/thickbox/" target="_blank">Thickbox</a> - '.__('Buggy video playback in IE, was not really made for this.', 'ekapicasa_gallery').'<br />';
$chk = $config['picEngine'] == 'lightbox' ? ' checked="checked"' : '';
print '<input type="radio" name="ekapicasa_gallery_config[picEngine]" value="lightbox"'.$chk.' /> <a href="http://www.huddletogether.com/projects/lightbox2/" target="_blank">Lightbox</a> - '.__('No video playback.', 'ekapicasa_gallery').'<br />';
$chk = $config['picEngine'] == 'slimbox2' ? ' checked="checked"' : '';
print '<input type="radio" name="ekapicasa_gallery_config[picEngine]" value="slimbox2"'.$chk.' /> <a href="http://www.digitalia.be/software/slimbox2" target="_blank">Slimbox 2</a> - '.__('No video playback.', 'ekapicasa_gallery').'<br />';
$chk = $config['picEngine'] == '' ? ' checked="checked"' : '';
print '<input type="radio" name="ekapicasa_gallery_config[picEngine]" value=""'.$chk.' /> '.__('None', 'ekapicasa_gallery').' ('.__('I already have some other kind of mecanism', 'ekapicasa_gallery').')</td>';
print '</tr>';

print '</table>';

// Album List
print '<h3>'.__('Album List', 'ekapicasa_gallery').'</h3>';
print '<table class="form-table">';

print '<tr valign="top">';
print '<th scope="row">'.__('Number of albums to show per page', 'ekapicasa_gallery').':</th>';
print '<td><input name="ekapicasa_gallery_config[albumPerPage]" type="text" value="'.$config['albumPerPage'].'" size="3" />';
print '<br/>'.__('Leave empty to show all albums on the same page', 'ekapicasa_gallery').'</td>';
print '</tr>';

// print '<tr valign="top">';
// print '<th scope="row">'.__('Number of albums to show per row', 'ekapicasa_gallery').':</th>';
// print '<td><input name="ekapicasa_gallery_config[albumPerRow]" type="text" value="'.$config['albumPerRow'].'" size="3" /></td>';
// print '</tr>';

print '<tr valign="top">';
print '<th scope="row">'.__('Thumbnails size', 'ekapicasa_gallery').':</th>';
print '<td><input name="ekapicasa_gallery_config[albumThumbSize]" type="text" value="'.$config['albumThumbSize'].'" size="4" /> '.__('pixels', 'ekapicasa_gallery').' '.__('(1 - 1600, default: 160)', 'ekapicasa_gallery').'</td>';
print '</tr>';

print '<tr valign="top">';
print '<th scope="row">'.__('Show extra information', 'ekapicasa_gallery').':</th>';
$chk = $config['albumSummary'] == 1 ? ' checked="checked"' : '';
print '<td><input name="ekapicasa_gallery_config[albumSummary]" value="1" type="checkbox"'.$chk.' /> '.__('Summary', 'ekapicasa_gallery').'<br />';
$chk = $config['albumLocation']  == 1 ? ' checked="checked"' : '';
print '<input name="ekapicasa_gallery_config[albumLocation]" value="1" type="checkbox"'.$chk.' /> '.__('Location', 'ekapicasa_gallery').'<br />';
$chk = $config['albumPublished']  == 1 ? ' checked="checked"' : '';
print '<input name="ekapicasa_gallery_config[albumPublished]" value="1" type="checkbox"'.$chk.' /> '.__('Published date', 'ekapicasa_gallery').' ('.__('unfortunately Picasa doesn\'t provide it in the picture list feed', 'ekapicasa_gallery').')<br />';
$chk = $config['albumNbPhoto']  == 1 ? ' checked="checked"' : '';
print '<input name="ekapicasa_gallery_config[albumNbPhoto]" value="1" type="checkbox"'.$chk.' /> '.__('Number of pictures', 'ekapicasa_gallery').'<br />';
$chk = $config['albumSlideshow']  == 1 ? ' checked="checked"' : '';
print '<input name="ekapicasa_gallery_config[albumSlideshow]" value="1" type="checkbox"'.$chk.' /> '.__('Picasa slideshow link (for best experience, select a picture engine that supports video playback)', 'ekapicasa_gallery').'<br />';
print '</tr>';

print '<tr valign="top">';
print '<th scope="row">'.__('Date format', 'ekapicasa_gallery').' (<a href="http://www.php.net/manual/en/function.date.php#function.date.parameters" target="_blank">'.__('PHP Manual', 'ekapicasa_gallery', 'ekapicasa_gallery').'</a>):</th>';
print '<td><input name="ekapicasa_gallery_config[dateFormat]" type="text" value="'.$config['dateFormat'].'" size="10" /></td>';
print '</tr>';

print '<tr valign="top">';
print '<th scope="row">'.__('Show Google+ profile and scrapbook albums', 'ekapicasa_gallery').':</th>';
$chk = $config['showGooglePlus'] == 1 ? ' checked="checked"' : '';
print '<td><input name="ekapicasa_gallery_config[showGooglePlus]" value="1" type="checkbox"'.$chk.' /> '.__('Yes').'<br />';
print '</tr>';

print '</table>';

// Picture List
print '<h3>'.__('Picture List', 'ekapicasa_gallery').'</h3>';
print '<table class="form-table">';

print '<tr valign="top">';
print '<th scope="row">'.__('Number of pictures to show per page', 'ekapicasa_gallery').':</th>';
print '<td><input name="ekapicasa_gallery_config[photoPerPage]" type="text" value="'.$config['photoPerPage'].'" size="3" />';
print '<br/>'.__('Leave empty to show all pictures on the same page', 'ekapicasa_gallery').'</td>';
print '</tr>';

print '<tr valign="top">';
print '<th scope="row">'.__('Thumbnails size', 'ekapicasa_gallery').':</th>';
print '<td><input name="ekapicasa_gallery_config[photoThumbSize]" type="text" value="'.$config['photoThumbSize'].'" size="4" /> '.__('pixels', 'ekapicasa_gallery').' '.__('(1 - 1000, default: 144)', 'ekapicasa_gallery').'</td>';
print '</tr>';

print '<tr valign="top">';
print '<th scope="row">'.__('Image size', 'ekapicasa_gallery').':</th>';
print '<td><input name="ekapicasa_gallery_config[photoSize]" type="text" value="'.$config['photoSize'].'" size="4" /> '.__('pixels', 'ekapicasa_gallery').' '.__('(1 - 1000, default: 800)', 'ekapicasa_gallery').'</td>';
print '</tr>';

print '</table>';

print '<p class="submit">';
print '<input type="submit" class="button-primary" name="Submit" value="'.__('Save Changes').'" />';
print '</p>';

print '</form>';
print '</div>';

?>
