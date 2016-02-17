<?php

$entity = elgg_extract('entity', $vars);

echo elgg_format_element('p', ['class' => 'elgg-text-help'], elgg_echo('au_subgroups:transfer:help'));

$input = elgg_view('input/text', array(
	'name' => 'au-subgroups-search',
	'value' => '',
	'placeholder' => elgg_echo('au_subgroups:search:text'),
	'class' => 'au-subgroups-search'
));
echo elgg_format_element('div', [], $input);

echo elgg_view('input/hidden', array(
	'name' => 'subgroup_guid',
	'value' => $entity->guid,
));

$results =  elgg_view('au_subgroups/search_results');
echo elgg_format_element('div', ['class' => 'au-subgroups-search-results clearfix'], $results);
