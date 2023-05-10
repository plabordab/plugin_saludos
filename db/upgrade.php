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
 * Plugin strings are defined here.
 *
 * @package     local_saludos
 * @category    string
 * @copyright   2023 Pilar Laborda <pilarlabordadaw@gmail.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Definir los pasos de actualización que se realizarán para actualizar el complemento de la versión anterior a la actual.
 *
 * @param int $oldversion Número de versión desde el que se está actualizando el complemento.
 */
function xmldb_local_saludos_upgrade($oldversion) {
    global $DB;
    $dbman = $DB->get_manager();
    if ($oldversion < 2023051000) {

        // Definir campo ID de usuario que se agregará a local_saludos_mensajes.
        $table = new xmldb_table('local_saludos_mensajes');
        $field = new xmldb_field('userid', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '1', 'timecreated');

        // Agregar identificador de usuario de campo.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Definir clave saludos-user-foreign-key (foreign) que se agregará a local_saludos_mensajes.
        $table = new xmldb_table('local_saludos_mensajes');
        $key = new xmldb_key('saludos-user-foreign-key', XMLDB_KEY_FOREIGN, ['userid'], 'user', ['id']);

        // Agregar clave saludos-user-foreign-key.
        $dbman->add_key($table, $key);

        // Punto de guardado alcanzado.
        upgrade_plugin_savepoint(true, 2023051000, 'local', 'saludos');
    }

    return true;
}
