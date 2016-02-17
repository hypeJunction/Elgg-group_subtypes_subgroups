<?php

$group = elgg_extract('entity', $vars);
$subgroup = elgg_extract('subgroup', $vars);

if (!$group instanceof ElggGroup || !$subgroup instanceof ElggGroup) {
	return;
}

elgg_push_context('widgets'); // use widgets context so no entity menu is used

if (\AU\SubGroups\can_move_subgroup($subgroup, $group)) {
	$class = 'au-subgroups-parentable';
} else {
	$class = 'au-subgroups-non-parentable';
}


$action_url = elgg_normalize_url("action/au_subgroups/move?parent_guid=$group->guid");
$action_url = elgg_add_action_tokens_to_url($action_url);

$view = elgg_view_entity($group, array('full_view' => false));

echo elgg_format_element('div', [
	'class' => \AU\SubGroups\can_move_subgroup($subgroup, $group) ? 'au-subgroups-parentable' : 'au-subgroups-non-parentable',
	'data-action' => $action_url,
		], $view);

elgg_pop_context();
