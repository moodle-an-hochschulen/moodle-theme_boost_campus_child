<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Theme Boost Campus Med - Library
 *
 * @package    theme_boost_campus_child
 * @copyright  2017 Kathrin Osswald, Ulm University <kathrin.osswald@uni-ulm.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Inject additional SCSS.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_boost_campus_child_get_extra_scss($theme) {
    // MODIFICATION START: Add the variables from the theme Boost Campus settings.
    // We need to work with stdclass here because the function expects the parameter to have a certain data structure.
    // We rebuild this data structure here.
    $boostcampusconfig = new stdclass();
    // Get the config.
    $boostcampusconfig->settings = get_config('theme_boost_campus');
    // Get the pre scss from the parent theme Boost Campus.
    $boostcampusrawscss = theme_boost_get_extra_scss($boostcampusconfig);
    if (!empty($theme->settings->scss) || !empty($boostcampusrawscss)) {
        // Return the Raw SCSS from Boost Campus and Boost Campus Child.
        return $boostcampusrawscss . $theme->settings->scss;
    } else {
        return '';
    }
    // MODIFICATION END.
    /* ORIGINAL START.
    return !empty($theme->settings->scss) ? $theme->settings->scss : '';
    ORIGINAL END. */
}

/**
 * Returns the main SCSS content.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_boost_campus_child_get_main_scss_content($theme) {
    global $CFG;

    $scss = '';
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;
    $fs = get_file_storage();

    $context = context_system::instance();
    if ($filename == 'default.scss') {
        // We still load the default preset files directly from the boost theme. No sense in duplicating them.
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    } else if ($filename == 'plain.scss') {
        // We still load the default preset files directly from the boost theme. No sense in duplicating them.
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/plain.scss');

    } else if ($filename && ($presetfile = $fs->get_file($context->id, 'theme_boost_campus_child', 'preset', 0, '/', $filename))) {
        // This preset file was fetched from the file area for theme_boost_campus_child and not theme_boost (see the line above).
        $scss .= $presetfile->get_content();
    } else {
        // Safety fallback - maybe new installs etc.
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    }

    // Pre CSS - this is loaded AFTER any prescss from the setting but before the main scss.
    $pre = file_get_contents($CFG->dirroot . '/theme/boost_campus_child/scss/pre.scss');
    // MODIFICATION START: Add the PRE SCSS from the parent theme Boost Campus.
    $preboostcampus = file_get_contents($CFG->dirroot . '/theme/boost_campus/scss/pre.scss');
    // MODIFICATION END.
    // Post CSS - this is loaded AFTER the main scss but before the extra scss from the setting.
    $post = file_get_contents($CFG->dirroot . '/theme/boost_campus_child/scss/post.scss');
    // MODIFICATION START: Add the POST SCSS from the parent theme Boost Campus.
    $postboostcampus = file_get_contents($CFG->dirroot . '/theme/boost_campus/scss/post.scss');
    // MODIFICATION END.

    // Combine them together.
    // MODIFICATION START: Add all SCSS content together.
    return $preboostcampus . "\n" . $pre . "\n" . $scss . "\n" . $postboostcampus ."\n" . $post;
    // MODIFICATION END.
    /* OROGINAL START
    return $pre . "\n" . $scss . "\n" . $post;
    ORIGINAL END */
}

/**
 * Override to add CSS values from settings to pre scss file.
 *
 * Get SCSS to prepend.
 *
 * @param theme_config $theme The theme config object.
 * @return array
 */
function theme_boost_campus_child_get_pre_scss($theme) {
    // MODIFICATION START: Add the variables from the theme Boost Campus settings.
    // We need to work with stdclass here because the function expects the parameter to have a certain data structure.
    // We rebuild this data structure here.
    $boostcampusconfig = new stdclass();
    // Get the config.
    $boostcampusconfig->settings = get_config('theme_boost_campus');
    // Get the pre scss from the parent theme Boost Campus.
    $boostcampusprescss = theme_boost_campus_get_pre_scss($boostcampusconfig);
    // MODIFICATION END.

    $scss = '';
    $configurable = [
        // Config key => [variableName, ...].
        'brandcolor' => ['brand-primary'],
        // MODIFICATION START: Add own variables.
        'brandsuccesscolor' => ['brand-success'],
        'brandinfocolor' => ['brand-info'],
        'brandwarningcolor' => ['brand-warning'],
        'branddangercolor' => ['brand-danger'],
        // MODIFICATION END.
    ];

    // Prepend variables first.
    foreach ($configurable as $configkey => $targets) {
        $value = isset($theme->settings->{$configkey}) ? $theme->settings->{$configkey} : null;
        if (empty($value)) {
            continue;
        }
        array_map(function($target) use (&$scss, $value) {
            $scss = '$' . $target . ': ' . $value . ";\n";
        }, (array) $targets);
    }

    // Prepend pre-scss.
    if (!empty($theme->settings->scsspre)) {
        $scss .= $theme->settings->scsspre;
    }

    // MODIFICATION START: Return the target value entries for the Boost Campus settings, too.
    return $boostcampusprescss . $scss;
    // MODIFICATION END.
    /* ORIGINAL START.
        return $scss;
    ORIGINAL END. */
}
