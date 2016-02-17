<?php

$entity = elgg_extract('entity', $vars);
if ($entity && $entity->guid) {
	return;
}

$parent_guid = elgg_extract('parent_guid', $vars);
$parent = get_entity($parent_guid);
if (!$parent) {
	return;
}

if ($parent instanceof ElggGroup) {
	echo elgg_view('input/hidden', array(
		'name' => 'au_subgroups_parent_guid',
		'value' => $parent_guid,
	));
}