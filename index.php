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

$mensajeform = new \local_saludos\form\mensaje_form();
echo $OUTPUT->header();

if (isloggedin()) {

    echo local_greetings_get_greeting($USER);

} else {

    echo get_string('greetinguser', 'local_saludos');

}

$mensajeform->display();

$mensajes = $DB->get_records('local_saludos_mensajes');

echo $OUTPUT->box_start('card-columns');

foreach ($mensajes as $m) {
    echo html_writer::start_tag('div', array('class' => 'card'));
    echo html_writer::start_tag('div', array('class' => 'card-body'));
    echo html_writer::tag('p', $m->mensaje, array('class' => 'card-text'));
    echo html_writer::start_tag('p', array('class' => 'card-text'));
    echo html_writer::tag('small', userdate($m->timecreated), array('class' => 'text-muted'));
    echo html_writer::end_tag('p');
    echo html_writer::end_tag('div');
    echo html_writer::end_tag('div');
}

echo $OUTPUT->box_end();


if ($data = $mensajeform->get_data()) {
    $mensaje = required_param('message', PARAM_TEXT);

    if (!empty($mensaje)) {
        $registro = new stdClass;
        $registro->mensaje = $mensaje;
        $registro->timecreated = time();

        $DB->insert_record('local_saludos_mensajes', $registro);
    }
}


echo $OUTPUT->footer();


