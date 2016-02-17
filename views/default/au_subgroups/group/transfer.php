<?php

$entity = elgg_extract('entity', $vars);

if (!$entity instanceof ElggGroup || !$entity->guid) {
	return;
}

$subtype = $entity->getSubtype();
$conf = group_subtypes_get_config();
if ($conf[$subtype]['root']) {
	// Root level group can't have parents
	return;
}

$title = elgg_echo('au_subgroups:move:edit:title');
$form = elgg_view_form('au_subgroups/transfer', array(
	'action' => 'action/au_subgroups/move',
), $vars);
$module = elgg_view_module('info', $title, $form);

echo elgg_format_element('div', ['class' => 'au-subgroups-transfer-module'], $module);