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
 * Este archivo contiene las funciones para configurar el idioma según el usuario
 *
 * @package     local_saludos
 * @copyright   2023 Pilar Laborda <pilarlabordadaw@gmail.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_saludos', get_string('pluginname', 'local_saludos'));
    $ADMIN->add('localplugins', $settings);

    if ($ADMIN->fulltree) {
        require_once($CFG->dirroot . '/local/saludos/lib.php');

        $settings->add(new admin_setting_configtext(
                'local_saludos/coloretiquetamensaje',
                get_string('coloretiquetamensaje', 'local_saludos'),
                get_string('colorfondoetiqueta', 'local_saludos'),
                '#FFFFFF',
        ));
    }
}
