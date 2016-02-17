<?php

$subgroup_guid = elgg_extract('subgroup_guid', $vars);
if ($subgroup_guid) {
	$subgroup = get_entity($subgroup_guid);
} else {
	$subgroup = elgg_extract('entity', $vars, elgg_get_page_owner_entity());
}

if (!$subgroup instanceof ElggGroup) {
	return;
}

$subtype = $subgroup->getSubtype();
$conf = group_subtypes_get_config();
if ($conf[$subtype]['root']) {
	return;
}

elgg_require_js('au_subgroups/edit');

$dbprefix = elgg_get_config('dbprefix');

$options = array(
	'type' => 'group',
	'subtypes' => $conf[$subtype]['parents'],
	'limit' => 30,
	'pagination' => false,
	'joins' => array("JOIN {$dbprefix}groups_entity g ON e.guid = g.guid"),
	'order_by' => 'g.name ASC',
	'no_results' => elgg_echo('au_subgroups:search:noresults'),
	'item_view' => 'group/format/au_parent',
	'subgroup' => $subgroup,
);

if (!empty($vars['q'])) {
	$query = sanitize_string($vars['q']);
	$options['wheres'][] = "g.name LIKE '{$query}%'";
}

echo elgg_list_entities($options);
