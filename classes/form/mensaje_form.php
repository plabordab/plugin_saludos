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

namespace local_saludos\form;
defined('MOODLE_INTERNAL') || die();
require_once($CFG->libdir . '/formslib.php');

/**
 * Clase que extiende de moodleform para añadir un formulario
 *
 * @package     local_saludos
 */
class mensaje_form extends \moodleform {

    /**
     * Define the form.
     */
    public function definition() {
        $mform = $this->_form;

        $mform->addElement('textarea', 'message', get_string('tumensaje', 'local_saludos'));
        $mform->setType('message', PARAM_TEXT);

        $submitlabel = get_string('submit');
        $mform->addElement('submit', 'submitmessage', $submitlabel);

    }
}

