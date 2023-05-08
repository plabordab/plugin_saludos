<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Este archivo contiene la pagina principal
 *
 * @package     local_saludos
 * @copyright   2023 Pilar Laborda <pilarlabordadaw@gmail.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../config.php');
require_once($CFG->dirroot. '/local/saludos/lib.php');

$context = context_system::instance();
$PAGE->set_context($context);

$PAGE->set_url(new moodle_url('/local/saludos/index.php'));

$PAGE->set_pagelayout('standard');

$PAGE->set_title($SITE->fullname);

$PAGE->set_heading(get_string('pluginname', 'local_saludos'));

echo $OUTPUT->header();

if (isloggedin()) {

    // echo '<h3>Greetings, ' . fullname($USER) . '</h3>';
    // echo get_string('greetingloggedinuser', 'local_saludos', fullname($USER));

    echo local_greetings_get_greeting($USER);

} else {

    // echo '<h3>Saludos, usuario</h3>';

    echo get_string('greetinguser', 'local_saludos');

}


echo $OUTPUT->footer();


