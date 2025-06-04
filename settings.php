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
 * Settings
 *
 * @package     block_course_contacts
 * @author      Kevin Pham <kevinpham@catalyst-au.net>
 * @copyright   Catalyst IT, 2022
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    // Global setting to apply this for all relevant pages.
    $settings->add(new admin_setting_configcheckbox(
        'block_course_contacts/autocreateoninfopage',
        get_string('settings:autocreateoninfopage', 'block_course_contacts'),
        get_string('settings:autocreateoninfopage_help', 'block_course_contacts'),
        0
    ));

    // This section configures which contact methods should be displayed.
    $settings->add(new admin_setting_heading('block_course_contacts/defaultheading',
        get_string('method', 'block_course_contacts'), ''));

    $yesno = [
        0 => get_string('no'),
        1 => get_string('yes'),
    ];
    $settings->add(new admin_setting_configselect('block_course_contacts/email',
        get_string('email', 'block_course_contacts'), '', 1, $yesno));

    $settings->add(new admin_setting_configselect('block_course_contacts/message',
        get_string('message', 'block_course_contacts'), '', 1, $yesno));

    $settings->add(new admin_setting_configselect('block_course_contacts/phone',
        get_string('phone', 'block_course_contacts'), '', 0, $yesno));

    $settings->add(new admin_setting_configselect('block_course_contacts/description',
        get_string('description', 'block_course_contacts'), '', 0, $yesno));

    // This section configures which contact methods should be displayed for guest users.
    $settings->add(new admin_setting_heading('block_course_contacts/methodguest',
        get_string('methodguest', 'block_course_contacts'), ''));

    $settings->add(new admin_setting_configselect('block_course_contacts/hide_block_guest',
        get_string('hideblockforguest', 'block_course_contacts'), '', 1, $yesno));

    $settings->add(new admin_setting_configselect('block_course_contacts/email_guest',
        get_string('email', 'block_course_contacts'), '', 0, $yesno));

    $settings->add(new admin_setting_configselect('block_course_contacts/message_guest',
        get_string('message', 'block_course_contacts'), '', 0, $yesno));

    $settings->add(new admin_setting_configselect('block_course_contacts/phone_guest',
        get_string('phone', 'block_course_contacts'), '', 0, $yesno));

    $settings->add(new admin_setting_configselect('block_course_contacts/description_guest',
        get_string('description', 'block_course_contacts'), '', 0, $yesno));

    // This section configures which contact methods should be displayed for guest users.
    $settings->add(new admin_setting_heading('block_course_contacts/methodguest',
        get_string('methodguest', 'block_course_contacts'), ''));

    // This section gives options of how to display contacts.
    $settings->add(new admin_setting_heading('block_course_contacts/displayheader',
        get_string('display', 'block_course_contacts'), ''));

    $sortby = [
        0 => get_string('alphabetical', 'block_course_contacts'),
        1 => get_string('recentlyactive', 'block_course_contacts'),
        2 => get_string('dateenrolled', 'block_course_contacts'),
    ];

    $settings->add(new admin_setting_configselect('block_course_contacts/sortby',
        get_string('sortby', 'block_course_contacts'), '', 0, $sortby));

    $settings->add(new admin_setting_configselect('block_course_contacts/inherit',
        get_string('inherit', 'block_course_contacts'), '', 0, $yesno));

    $settings->add(new admin_setting_configselect('block_course_contacts/use_altname',
        get_string('use_altname', 'block_course_contacts'), '', 0, $yesno));

    $settings->add(new admin_setting_configselect('block_course_contacts/group',
        get_string('group', 'block_course_contacts'), '', 0, $yesno));

    // Toggle on/off show user picture.
    $settings->add(new admin_setting_configselect('block_course_contacts/showuserpicture',
        get_string('showuserpicture', 'block_course_contacts'), '', 1, $yesno));

    // This section builds a list of the roles available within this context for selection.
    $settings->add(new admin_setting_heading('block_course_contacts/rolesheader',
        get_string('roles', 'block_course_contacts'), ''));

    $roles = array_reverse(get_default_enrol_roles(context_system::instance()), true);
    foreach ($roles as $key => $role) {
        // Only 'Teacher' role should be on by default.
        $default = (int) ($key === 3);
        $settings->add(new admin_setting_configselect('block_course_contacts/role_' . $key,
            $role, '', $default, $yesno));
    }

}
