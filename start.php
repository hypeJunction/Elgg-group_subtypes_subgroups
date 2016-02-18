<?php

/**
 * Subgroup Subtypes
 *
 * @author Ismayil Khayredinov <info@hypejunction.com>
 * @copyright Copyright (c) 2015, Ismayil Khayredinov
 */
require_once __DIR__ . '/autoloader.php';

elgg_register_event_handler('init', 'system', 'group_subtypes_subgroups_init');

/**
 * Initialize the plugin
 * @return void
 */
function group_subtypes_subgroups_init() {

	elgg_extend_view('forms/groups/edit', 'forms/au_subgroups/parent_guid');

	elgg_extend_view('css/elgg', 'au_subgroups/search_results.css');
}
