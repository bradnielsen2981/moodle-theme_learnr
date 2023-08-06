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
 * Theme curvedlearning - Settings file
 *
 * @package    theme_curvedlearning
 * @copyright  2022 Dearborn Public Schools, Chris Kenniburg
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    $settings = new theme_boost_admin_settingspage_tabs('themesettingcurvedlearning', get_string('configtitle', 'theme_curvedlearning'));
    $page = new admin_settingpage('theme_curvedlearning_general', get_string('generalsettings', 'theme_boost'));

    // Unaddable blocks.
    // Blocks to be excluded when this theme is enabled in the "Add a block" list: Administration, Navigation, Courses and
    // Section links.
    $default = 'navigation,settings,course_list,section_links';
    $setting = new admin_setting_configtext('theme_curvedlearning/unaddableblocks',
            get_string('unaddableblocks', 'theme_boost'), get_string('unaddableblocks_desc', 'theme_boost'), $default, PARAM_TEXT);
    $page->add($setting);

    // Preset.
    $name = 'theme_curvedlearning/preset';
    $title = get_string('preset', 'theme_boost');
    $description = get_string('preset_desc', 'theme_boost');
    $default = 'default.scss';

    $context = context_system::instance();
    $fs = get_file_storage();
    $files = $fs->get_area_files($context->id, 'theme_curvedlearning', 'preset', 0, 'itemid, filepath, filename', false);

    $choices = [];
    foreach ($files as $file) {
        $choices[$file->get_filename()] = $file->get_filename();
    }
    // These are the built in presets.
    $choices['default.scss'] = 'default.scss';

    $setting = new admin_setting_configthemepreset($name, $title, $description, $default, $choices, 'curvedlearning');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Preset files setting.
    $name = 'theme_curvedlearning/presetfiles';
    $title = get_string('presetfiles', 'theme_boost');
    $description = get_string('presetfiles_desc', 'theme_boost');

    $setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0,
            array('maxfiles' => 20, 'accepted_types' => array('.scss')));
    $page->add($setting);

    // Course Tile Display Styles
    $name = 'theme_curvedlearning/coursetilestyle';
    $title = get_string('coursetilestyle' , 'theme_curvedlearning');
    $description = get_string('coursetilestyle_desc', 'theme_curvedlearning');
    $coursestyle1 = get_string('coursestyle1', 'theme_curvedlearning');
    $coursestyle2 = get_string('coursestyle2', 'theme_curvedlearning');
    $coursestyle3 = get_string('coursestyle3', 'theme_curvedlearning');
    $coursestyle4 = get_string('coursestyle4', 'theme_curvedlearning');
    $coursestyle5 = get_string('coursestyle5', 'theme_curvedlearning');
    $coursestyle6 = get_string('coursestyle6', 'theme_curvedlearning');
    $coursestyle7 = get_string('coursestyle7', 'theme_curvedlearning');
    $coursestyle8 = get_string('coursestyle8', 'theme_curvedlearning');
    $coursestyle9 = get_string('coursestyle9', 'theme_curvedlearning');
    $coursestyle10 = get_string('coursestyle10', 'theme_curvedlearning');
    $default = '10';
    $choices = array('1'=>$coursestyle1, '2'=>$coursestyle2, '3'=>$coursestyle3, '4'=>$coursestyle4, '5'=>$coursestyle5, '6'=>$coursestyle6, '7'=>$coursestyle7, '8'=>$coursestyle8, '9'=>$coursestyle9, '10'=>$coursestyle10);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // trim title setting.
    $name = 'theme_curvedlearning/trimtitle';
    $title = get_string('trimtitle', 'theme_curvedlearning');
    $description = get_string('trimtitle_desc', 'theme_curvedlearning');
    $default = '256';
    $choices = array(
            '15' => '15',
            '20' => '20',
            '30' => '30',
            '40' => '40',
            '50' => '50',
            '60' => '60',
            '70' => '70',
            '80' => '80',
            '90' => '90',
            '100' => '100',
            '110' => '110',
            '120' => '120',
            '130' => '130',
            '140' => '140',
            '150' => '150',
            '175' => '175',
            '200' => '200',
            '256' => '256',
        );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // trim title setting.
    $name = 'theme_curvedlearning/trimsummary';
    $title = get_string('trimsummary', 'theme_curvedlearning');
    $description = get_string('trimsummary_desc', 'theme_curvedlearning');
    $default = '300';
    $choices = array(
            '30' => '30',
            '60' => '60',
            '90' => '90',
            '100' => '100',
            '150' => '150',
            '200' => '200',
            '250' => '250',
            '300' => '300',
            '350' => '350',
            '400' => '400',
            '450' => '450',
            '500' => '500',
            '600' => '600',
            '800' => '800',
        );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Courses height
    $name = 'theme_curvedlearning/courseboxheight';
    $title = get_string('courseboxheight', 'theme_curvedlearning');
    $description = get_string('courseboxheight_desc', 'theme_curvedlearning');;
    $default = '250px';
    $choices = array(
            '200px' => '200px',
            '225px' => '225px',
            '250px' => '250px',
            '275px' => '275px',
            '300px' => '300px',
            '325px' => '325px',
            '350px' => '350px',
            '375px' => '375px',
            '400px' => '400px',
        );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    // Sections Display Options.
    $name = 'theme_curvedlearning/sectionstyle';
    $title = get_string('sectionstyle' , 'theme_curvedlearning');
    $description = get_string('sectionstyle_desc', 'theme_curvedlearning');
    $option1 = get_string('sections-curvedlearning', 'theme_curvedlearning');
    $option2 = get_string('sections-boxed', 'theme_curvedlearning');
    $option3 = get_string('sections-boost', 'theme_curvedlearning');
    $option4 = get_string('sections-bars', 'theme_curvedlearning');
    $default = '1';
    $choices = array('1'=>$option1, '2'=>$option2, '3'=>$option3, '4'=>$option4);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/fullwidthpage';
    $title = get_string('fullwidthpage', 'theme_curvedlearning');
    $description = get_string('fullwidthpage_desc', 'theme_curvedlearning');
    $default = '1';
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Show/hide course index navigation.
    $name = 'theme_curvedlearning/showcourseindexnav';
    $title = get_string('showcourseindexnav', 'theme_curvedlearning');
    $description = get_string('showcourseindexnav_desc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Show/hide course index navigation.
    $name = 'theme_curvedlearning/showblockdrawer';
    $title = get_string('showblockdrawer', 'theme_curvedlearning');
    $description = get_string('showblockdrawer_desc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Show/hide Latest Courses.
    $name = 'theme_curvedlearning/showlatestcourses';
    $title = get_string('showlatestcourses', 'theme_curvedlearning');
    $description = get_string('showlatestcourses_desc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Show/hide course progressbar.
    $name = 'theme_curvedlearning/showprogressbar';
    $title = get_string('showprogressbar', 'theme_curvedlearning');
    $description = get_string('showprogressbar_desc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Block Display Options.
    $name = 'theme_curvedlearning/activitynavdisplay';
    $title = get_string('activitynavdisplay' , 'theme_curvedlearning');
    $description = get_string('activitynavdisplay_desc', 'theme_curvedlearning');
    //$option1 = get_string('blockdisplay_on', 'theme_curvedlearning');
    $option1 = get_string('actnav_top_on', 'theme_curvedlearning');
    $option2 = get_string('actnav_bottom_on', 'theme_curvedlearning');
    $option3 = get_string('actnav_all_on', 'theme_curvedlearning');
    $option4 = get_string('actnav_all_off', 'theme_curvedlearning');
    $default = '2';
    $choices = array('1'=>$option1, '2'=>$option2, '3'=>$option3, '4'=>$option4);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    //Activity icon size for course page.
    $name = 'theme_curvedlearning/courseiconsize';
    $title = get_string('courseiconsize', 'theme_curvedlearning');
    $description = get_string('courseiconsize_desc', 'theme_curvedlearning');;
    $default = '50px';
    $choices = array(
            '26px' => '26px',
            '28px' => '28px',
            '30px' => '30px',
            '32px' => '32px',
            '34px' => '34px',
            '36px' => '36px',
            '38px' => '38px',
            '40px' => '40px',
            '42px' => '42px',
            '44px' => '44px',
            '46px' => '46px',
            '48px' => '48px',
            '50px' => '50px',
            '52px' => '52px',
            '54px' => '54px',
            '56px' => '56px',
            '58px' => '58px',
            '60px' => '60px',
        );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Show/hide course index navigation.
    $name = 'theme_curvedlearning/showheaderblockpanel';
    $title = get_string('showheaderblockpanel', 'theme_curvedlearning');
    $description = get_string('showheaderblockpanel_desc', 'theme_curvedlearning');
    $default = '1';
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Show/hide page image.
    $name = 'theme_curvedlearning/showpageimage';
    $title = get_string('showpageimage', 'theme_curvedlearning');
    $description = get_string('showpageimage_desc', 'theme_curvedlearning');
    $default = '1';
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/showheaderblocks';
    $title = get_string('showheaderblocks', 'theme_curvedlearning');
    $description = get_string('showheaderblocks_desc', 'theme_curvedlearning');
    $default = '1';
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Show sitewide image.
    $name = 'theme_curvedlearning/sitewideimage';
    $title = get_string('sitewideimage', 'theme_curvedlearning');
    $description = get_string('sitewideimage_desc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/showfooterblocks';
    $title = get_string('showfooterblocks', 'theme_curvedlearning');
    $description = get_string('showfooterblocks_desc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Background image setting.
    $name = 'theme_curvedlearning/pagebackgroundimage';
    $title = get_string('backgroundimage', 'theme_curvedlearning');
    $description = get_string('backgroundimage_desc', 'theme_curvedlearning');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pagebackgroundimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Login Background image setting.
    $name = 'theme_curvedlearning/loginbackgroundimage';
    $title = get_string('loginbackgroundimage', 'theme_boost');
    $description = get_string('loginbackgroundimage_desc', 'theme_boost');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'loginbackgroundimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Must add the page after definiting all the settings!
    $settings->add($page);

    // Advanced settings.
    $page = new admin_settingpage('theme_curvedlearning_colors', get_string('colorsettings', 'theme_curvedlearning'));

    // Variable $body-color.
    // We use an empty default value because the default colour should come from the preset .
    $name = 'theme_curvedlearning/navbarbg';
    $title = get_string('navbarbg', 'theme_curvedlearning');
    $description = get_string('navbarbg_desc', 'theme_curvedlearning');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/primarynavbarlink';
    $title = get_string('primarynavbarlink', 'theme_curvedlearning');
    $description = get_string('navbarlink_desc', 'theme_curvedlearning');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/secondarynavbarlink';
    $title = get_string('secondarynavbarlink', 'theme_curvedlearning');
    $description = get_string('navbarlink_desc', 'theme_curvedlearning');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/drawerbg';
    $title = get_string('drawerbg', 'theme_curvedlearning');
    $description = get_string('drawerbg_desc', 'theme_curvedlearning');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/bodybg';
    $title = get_string('bodybg', 'theme_curvedlearning');
    $description = get_string('bodybg_desc', 'theme_curvedlearning');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    $name = 'theme_curvedlearning/brandcolor';
    $title = get_string('brandcolor', 'theme_boost');
    $description = get_string('brandcolor_desc', 'theme_boost');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/successcolor';
    $title = get_string('successcolor', 'theme_curvedlearning');
    $description = get_string('rootcolor_desc', 'theme_curvedlearning');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/infocolor';
    $title = get_string('infocolor', 'theme_curvedlearning');
    $description = get_string('rootcolor_desc', 'theme_curvedlearning');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/warningcolor';
    $title = get_string('warningcolor', 'theme_curvedlearning');
    $description = get_string('rootcolor_desc', 'theme_curvedlearning');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/dangercolor';
    $title = get_string('dangercolor', 'theme_curvedlearning');
    $description = get_string('rootcolor_desc', 'theme_curvedlearning');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/secondarycolor';
    $title = get_string('secondarycolor', 'theme_curvedlearning');
    $description = get_string('rootcolor_desc', 'theme_curvedlearning');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/iconadministrationcolor';
    $title = get_string('iconadministrationcolor', 'theme_curvedlearning');
    $description = get_string('iconrootcolor_desc', 'theme_curvedlearning');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/iconassessmentcolor';
    $title = get_string('iconassessmentcolor', 'theme_curvedlearning');
    $description = get_string('iconrootcolor_desc', 'theme_curvedlearning');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/iconcollaborationcolor';
    $title = get_string('iconcollaborationcolor', 'theme_curvedlearning');
    $description = get_string('iconrootcolor_desc', 'theme_curvedlearning');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/iconcommunicationcolor';
    $title = get_string('iconcommunicationcolor', 'theme_curvedlearning');
    $description = get_string('iconrootcolor_desc', 'theme_curvedlearning');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/iconcontentcolor';
    $title = get_string('iconcontentcolor', 'theme_curvedlearning');
    $description = get_string('iconrootcolor_desc', 'theme_curvedlearning');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/iconinterfacecolor';
    $title = get_string('iconinterfacecolor', 'theme_curvedlearning');
    $description = get_string('iconrootcolor_desc', 'theme_curvedlearning');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);


    // Advanced settings.
    $page = new admin_settingpage('theme_curvedlearning_advanced', get_string('advancedsettings', 'theme_boost'));
    // Raw SCSS to include before the content.
    $setting = new admin_setting_scsscode('theme_curvedlearning/scsspre',
            get_string('rawscsspre', 'theme_boost'), get_string('rawscsspre_desc', 'theme_boost'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Raw SCSS to include after the content.
    $setting = new admin_setting_scsscode('theme_curvedlearning/scss', get_string('rawscss', 'theme_boost'),
            get_string('rawscss_desc', 'theme_boost'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    // Advanced settings.
    $page = new admin_settingpage('theme_curvedlearning_content', get_string('contentsettings', 'theme_curvedlearning'));

    // Alert setting.
    $name = 'theme_curvedlearning/alertbox';
    $title = get_string('alert', 'theme_curvedlearning');
    $description = get_string('alert_desc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    
    $page->add($setting);

    // Frontpage Textbox.
    $name = 'theme_curvedlearning/fptextbox';
    $title = get_string('fptextbox', 'theme_curvedlearning');
    $description = get_string('fptextbox_desc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    
    $page->add($setting);

    $settings->add($page);


    // Advanced settings.
    $page = new admin_settingpage('theme_curvedlearning_marketing', get_string('marketing', 'theme_curvedlearning'));

    // This is the descriptor for Marketing Spot One
    $name = 'theme_curvedlearning/marketing1info';
    $heading = get_string('marketing1', 'theme_curvedlearning');
    $information = get_string('marketinginfodesc', 'theme_curvedlearning');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // Marketing Spot One
    $name = 'theme_curvedlearning/marketing1';
    $title = get_string('marketingtitle', 'theme_curvedlearning');
    $description = get_string('marketingtitledesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Background image setting.
    $name = 'theme_curvedlearning/marketing1image';
    $title = get_string('marketingimage', 'theme_curvedlearning');
    $description = get_string('marketingimage_desc', 'theme_curvedlearning');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing1image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/marketing1content';
    $title = get_string('marketingcontent', 'theme_curvedlearning');
    $description = get_string('marketingcontentdesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/marketing1buttontext';
    $title = get_string('marketingbuttontext', 'theme_curvedlearning');
    $description = get_string('marketingbuttontextdesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/marketing1buttonurl';
    $title = get_string('marketingbuttonurl', 'theme_curvedlearning');
    $description = get_string('marketingbuttonurldesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/marketing1target';
    $title = get_string('marketingurltarget' , 'theme_curvedlearning');
    $description = get_string('marketingurltargetdesc', 'theme_curvedlearning');
    $target1 = get_string('marketingurltargetself', 'theme_curvedlearning');
    $target2 = get_string('marketingurltargetnew', 'theme_curvedlearning');
    $target3 = get_string('marketingurltargetparent', 'theme_curvedlearning');
    $default = 'target1';
    $choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/marketing1icon';
    $title = get_string('marketicon','theme_curvedlearning');
    $description = get_string('marketicon_desc', 'theme_curvedlearning');
    $default = 'folder';
    $choices = array(
        'clone' => 'Clone',
        'bookmark' => 'Bookmark',
        'book' => 'Book',
        'certificate' => 'Certificate',
        'desktop' => 'Desktop',
        'graduation-cap' => 'Graduation Cap',
        'users' => 'Users',
        'bars' => 'Bars',
        'paper-plane' => 'Paper Plane',
        'plus-circle' => 'Plus Circle',
        'Sitemap' => 'Sitemap',
        'puzzle-piece' => 'Puzzle Piece',
        'spinner' => 'Spinner',
        'circle-o-notch' => 'Circle O Notch',
        'check-square-o' => 'Check Square O',
        'plus-square-o' => 'Plus Square O',
        'chevron-circle-right' => 'Chevron Circle Right',
        'arrow-circle-right' => 'Arrow Circle Right',
        'carrot-down' => 'Caret Down',
        'forward' => 'Forward',
        'file-text' => 'File Text',
        'align-right' => 'Align Right',
        'angle-double-right' => 'Angle Double Right',
        'folder-open' => 'Folder Open',
        'folder' => 'Folder',
        'folder-open-o' => 'Folder Open O',
        'chevron-right' => 'Chevron Right',
        'star' => 'Star',
        'user-circle' => 'User Circle',
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // This is the descriptor for Marketing Spot Two
    $name = 'theme_curvedlearning/marketing2info';
    $heading = get_string('marketing2', 'theme_curvedlearning');
    $information = get_string('marketinginfodesc', 'theme_curvedlearning');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // Marketing Spot Two.
    $name = 'theme_curvedlearning/marketing2';
    $title = get_string('marketingtitle', 'theme_curvedlearning');
    $description = get_string('marketingtitledesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Background image setting.
    $name = 'theme_curvedlearning/marketing2image';
    $title = get_string('marketingimage', 'theme_curvedlearning');
    $description = get_string('marketingimage_desc', 'theme_curvedlearning');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing2image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/marketing2content';
    $title = get_string('marketingcontent', 'theme_curvedlearning');
    $description = get_string('marketingcontentdesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/marketing2buttontext';
    $title = get_string('marketingbuttontext', 'theme_curvedlearning');
    $description = get_string('marketingbuttontextdesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/marketing2buttonurl';
    $title = get_string('marketingbuttonurl', 'theme_curvedlearning');
    $description = get_string('marketingbuttonurldesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/marketing2target';
    $title = get_string('marketingurltarget' , 'theme_curvedlearning');
    $description = get_string('marketingurltargetdesc', 'theme_curvedlearning');
    $target1 = get_string('marketingurltargetself', 'theme_curvedlearning');
    $target2 = get_string('marketingurltargetnew', 'theme_curvedlearning');
    $target3 = get_string('marketingurltargetparent', 'theme_curvedlearning');
    $default = 'target1';
    $choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/marketing2icon';
    $title = get_string('marketicon','theme_curvedlearning');
    $description = get_string('marketicon_desc', 'theme_curvedlearning');
    $default = 'folder';
    $choices = array(
        'clone' => 'Clone',
        'bookmark' => 'Bookmark',
        'book' => 'Book',
        'certificate' => 'Certificate',
        'desktop' => 'Desktop',
        'graduation-cap' => 'Graduation Cap',
        'users' => 'Users',
        'bars' => 'Bars',
        'paper-plane' => 'Paper Plane',
        'plus-circle' => 'Plus Circle',
        'Sitemap' => 'Sitemap',
        'puzzle-piece' => 'Puzzle Piece',
        'spinner' => 'Spinner',
        'circle-o-notch' => 'Circle O Notch',
        'check-square-o' => 'Check Square O',
        'plus-square-o' => 'Plus Square O',
        'chevron-circle-right' => 'Chevron Circle Right',
        'arrow-circle-right' => 'Arrow Circle Right',
        'carrot-down' => 'Caret Down',
        'forward' => 'Forward',
        'file-text' => 'File Text',
        'align-right' => 'Align Right',
        'angle-double-right' => 'Angle Double Right',
        'folder-open' => 'Folder Open',
        'folder' => 'Folder',
        'folder-open-o' => 'Folder Open O',
        'chevron-right' => 'Chevron Right',
        'star' => 'Star',
        'user-circle' => 'User Circle',
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // This is the descriptor for Marketing Spot Three
    $name = 'theme_curvedlearning/marketing3info';
    $heading = get_string('marketing3', 'theme_curvedlearning');
    $information = get_string('marketinginfodesc', 'theme_curvedlearning');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // Marketing Spot Three.
    $name = 'theme_curvedlearning/marketing3';
    $title = get_string('marketingtitle', 'theme_curvedlearning');
    $description = get_string('marketingtitledesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Background image setting.
    $name = 'theme_curvedlearning/marketing3image';
    $title = get_string('marketingimage', 'theme_curvedlearning');
    $description = get_string('marketingimage_desc', 'theme_curvedlearning');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing3image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/marketing3content';
    $title = get_string('marketingcontent', 'theme_curvedlearning');
    $description = get_string('marketingcontentdesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/marketing3buttontext';
    $title = get_string('marketingbuttontext', 'theme_curvedlearning');
    $description = get_string('marketingbuttontextdesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/marketing3buttonurl';
    $title = get_string('marketingbuttonurl', 'theme_curvedlearning');
    $description = get_string('marketingbuttonurldesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/marketing3target';
    $title = get_string('marketingurltarget' , 'theme_curvedlearning');
    $description = get_string('marketingurltargetdesc', 'theme_curvedlearning');
    $target1 = get_string('marketingurltargetself', 'theme_curvedlearning');
    $target2 = get_string('marketingurltargetnew', 'theme_curvedlearning');
    $target3 = get_string('marketingurltargetparent', 'theme_curvedlearning');
    $default = 'target1';
    $choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/marketing3icon';
    $title = get_string('marketicon','theme_curvedlearning');
    $description = get_string('marketicon_desc', 'theme_curvedlearning');
    $default = 'folder';
    $choices = array(
        'clone' => 'Clone',
        'bookmark' => 'Bookmark',
        'book' => 'Book',
        'certificate' => 'Certificate',
        'desktop' => 'Desktop',
        'graduation-cap' => 'Graduation Cap',
        'users' => 'Users',
        'bars' => 'Bars',
        'paper-plane' => 'Paper Plane',
        'plus-circle' => 'Plus Circle',
        'Sitemap' => 'Sitemap',
        'puzzle-piece' => 'Puzzle Piece',
        'spinner' => 'Spinner',
        'circle-o-notch' => 'Circle O Notch',
        'check-square-o' => 'Check Square O',
        'plus-square-o' => 'Plus Square O',
        'chevron-circle-right' => 'Chevron Circle Right',
        'arrow-circle-right' => 'Arrow Circle Right',
        'carrot-down' => 'Caret Down',
        'forward' => 'Forward',
        'file-text' => 'File Text',
        'align-right' => 'Align Right',
        'angle-double-right' => 'Angle Double Right',
        'folder-open' => 'Folder Open',
        'folder' => 'Folder',
        'folder-open-o' => 'Folder Open O',
        'chevron-right' => 'Chevron Right',
        'star' => 'Star',
        'user-circle' => 'User Circle',
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);


    // Icon Navigation);
    $page = new admin_settingpage('theme_curvedlearning_iconnavheading', get_string('iconnavheading', 'theme_curvedlearning'));

    // This is the descriptor for the page.
    $name = 'theme_curvedlearning/iconnavinfo';
    $heading = get_string('iconnavinfo', 'theme_curvedlearning');
    $information = get_string('iconnavinfo_desc', 'theme_curvedlearning');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // This is the descriptor for icon One
    $name = 'theme_curvedlearning/iconwidthinfo';
    $heading = get_string('iconwidthinfo', 'theme_curvedlearning');
    $information = get_string('iconwidthinfodesc', 'theme_curvedlearning');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // Icon width setting.
    $name = 'theme_curvedlearning/iconwidth';
    $title = get_string('iconwidth', 'theme_curvedlearning');
    $description = get_string('iconwidth_desc', 'theme_curvedlearning');;
    $default = '100px';
    $choices = array(
        '75px' => '75px',
        '85px' => '85px',
        '95px' => '95px',
        '100px' => '100px',
        '105px' => '105px',
        '110px' => '110px',
        '115px' => '115px',
        '120px' => '120px',
        '125px' => '125px',
        '130px' => '130px',
        '135px' => '135px',
        '140px' => '140px',
        '145px' => '145px',
        '150px' => '150px',
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    // This is the descriptor for teacher create a course
    $name = 'theme_curvedlearning/sliderinfo';
    $heading = get_string('sliderinfo', 'theme_curvedlearning');
    $information = get_string('sliderinfodesc', 'theme_curvedlearning');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // Creator Icon
    $name = 'theme_curvedlearning/slideicon';
    $title = get_string('navicon', 'theme_curvedlearning');
    $description = get_string('naviconslidedesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/slideiconbuttontext';
    $title = get_string('naviconbuttontext', 'theme_curvedlearning');
    $description = get_string('naviconbuttontextdesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Slide Textbox.
    $name = 'theme_curvedlearning/slidetextbox';
    $title = get_string('slidetextbox', 'theme_curvedlearning');
    $description = get_string('slidetextbox_desc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // This is the descriptor for icon One
    $name = 'theme_curvedlearning/navicon1info';
    $heading = get_string('navicon1', 'theme_curvedlearning');
    $information = get_string('navicondesc', 'theme_curvedlearning');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // icon One
    $name = 'theme_curvedlearning/nav1icon';
    $title = get_string('navicon', 'theme_curvedlearning');
    $description = get_string('navicondesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/nav1buttontext';
    $title = get_string('naviconbuttontext', 'theme_curvedlearning');
    $description = get_string('naviconbuttontextdesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/nav1buttonurl';
    $title = get_string('naviconbuttonurl', 'theme_curvedlearning');
    $description = get_string('naviconbuttonurldesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/nav1target';
    $title = get_string('marketingurltarget' , 'theme_curvedlearning');
    $description = get_string('marketingurltargetdesc', 'theme_curvedlearning');
    $target1 = get_string('marketingurltargetself', 'theme_curvedlearning');
    $target2 = get_string('marketingurltargetnew', 'theme_curvedlearning');
    $target3 = get_string('marketingurltargetparent', 'theme_curvedlearning');
    $default = 'target1';
    $choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // This is the descriptor for icon One
    $name = 'theme_curvedlearning/navicon2info';
    $heading = get_string('navicon2', 'theme_curvedlearning');
    $information = get_string('navicondesc', 'theme_curvedlearning');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    $name = 'theme_curvedlearning/nav2icon';
    $title = get_string('navicon', 'theme_curvedlearning');
    $description = get_string('navicondesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/nav2buttontext';
    $title = get_string('naviconbuttontext', 'theme_curvedlearning');
    $description = get_string('naviconbuttontextdesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/nav2buttonurl';
    $title = get_string('naviconbuttonurl', 'theme_curvedlearning');
    $description = get_string('naviconbuttonurldesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/nav2target';
    $title = get_string('marketingurltarget' , 'theme_curvedlearning');
    $description = get_string('marketingurltargetdesc', 'theme_curvedlearning');
    $target1 = get_string('marketingurltargetself', 'theme_curvedlearning');
    $target2 = get_string('marketingurltargetnew', 'theme_curvedlearning');
    $target3 = get_string('marketingurltargetparent', 'theme_curvedlearning');
    $default = 'target1';
    $choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // This is the descriptor for icon three
    $name = 'theme_curvedlearning/navicon3info';
    $heading = get_string('navicon3', 'theme_curvedlearning');
    $information = get_string('navicondesc', 'theme_curvedlearning');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    $name = 'theme_curvedlearning/nav3icon';
    $title = get_string('navicon', 'theme_curvedlearning');
    $description = get_string('navicondesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/nav3buttontext';
    $title = get_string('naviconbuttontext', 'theme_curvedlearning');
    $description = get_string('naviconbuttontextdesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/nav3buttonurl';
    $title = get_string('naviconbuttonurl', 'theme_curvedlearning');
    $description = get_string('naviconbuttonurldesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/nav3target';
    $title = get_string('marketingurltarget' , 'theme_curvedlearning');
    $description = get_string('marketingurltargetdesc', 'theme_curvedlearning');
    $target1 = get_string('marketingurltargetself', 'theme_curvedlearning');
    $target2 = get_string('marketingurltargetnew', 'theme_curvedlearning');
    $target3 = get_string('marketingurltargetparent', 'theme_curvedlearning');
    $default = 'target1';
    $choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // This is the descriptor for icon four
    $name = 'theme_curvedlearning/navicon4info';
    $heading = get_string('navicon4', 'theme_curvedlearning');
    $information = get_string('navicondesc', 'theme_curvedlearning');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    $name = 'theme_curvedlearning/nav4icon';
    $title = get_string('navicon', 'theme_curvedlearning');
    $description = get_string('navicondesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/nav4buttontext';
    $title = get_string('naviconbuttontext', 'theme_curvedlearning');
    $description = get_string('naviconbuttontextdesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/nav4buttonurl';
    $title = get_string('naviconbuttonurl', 'theme_curvedlearning');
    $description = get_string('naviconbuttonurldesc', 'theme_curvedlearning');
    $default =  $CFG->wwwroot.'/course/';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/nav4target';
    $title = get_string('marketingurltarget' , 'theme_curvedlearning');
    $description = get_string('marketingurltargetdesc', 'theme_curvedlearning');
    $target1 = get_string('marketingurltargetself', 'theme_curvedlearning');
    $target2 = get_string('marketingurltargetnew', 'theme_curvedlearning');
    $target3 = get_string('marketingurltargetparent', 'theme_curvedlearning');
    $default = 'target1';
    $choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // This is the descriptor for icon four
    $name = 'theme_curvedlearning/navicon5info';
    $heading = get_string('navicon5', 'theme_curvedlearning');
    $information = get_string('navicondesc', 'theme_curvedlearning');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    $name = 'theme_curvedlearning/nav5icon';
    $title = get_string('navicon', 'theme_curvedlearning');
    $description = get_string('navicondesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/nav5buttontext';
    $title = get_string('naviconbuttontext', 'theme_curvedlearning');
    $description = get_string('naviconbuttontextdesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/nav5buttonurl';
    $title = get_string('naviconbuttonurl', 'theme_curvedlearning');
    $description = get_string('naviconbuttonurldesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/nav5target';
    $title = get_string('marketingurltarget' , 'theme_curvedlearning');
    $description = get_string('marketingurltargetdesc', 'theme_curvedlearning');
    $target1 = get_string('marketingurltargetself', 'theme_curvedlearning');
    $target2 = get_string('marketingurltargetnew', 'theme_curvedlearning');
    $target3 = get_string('marketingurltargetparent', 'theme_curvedlearning');
    $default = 'target1';
    $choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // This is the descriptor for icon six
    $name = 'theme_curvedlearning/navicon6info';
    $heading = get_string('navicon6', 'theme_curvedlearning');
    $information = get_string('navicondesc', 'theme_curvedlearning');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    $name = 'theme_curvedlearning/nav6icon';
    $title = get_string('navicon', 'theme_curvedlearning');
    $description = get_string('navicondesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/nav6buttontext';
    $title = get_string('naviconbuttontext', 'theme_curvedlearning');
    $description = get_string('naviconbuttontextdesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/nav6buttonurl';
    $title = get_string('naviconbuttonurl', 'theme_curvedlearning');
    $description = get_string('naviconbuttonurldesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/nav6target';
    $title = get_string('marketingurltarget' , 'theme_curvedlearning');
    $description = get_string('marketingurltargetdesc', 'theme_curvedlearning');
    $target1 = get_string('marketingurltargetself', 'theme_curvedlearning');
    $target2 = get_string('marketingurltargetnew', 'theme_curvedlearning');
    $target3 = get_string('marketingurltargetparent', 'theme_curvedlearning');
    $default = 'target1';
    $choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // This is the descriptor for icon seven
    $name = 'theme_curvedlearning/navicon7info';
    $heading = get_string('navicon7', 'theme_curvedlearning');
    $information = get_string('navicondesc', 'theme_curvedlearning');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    $name = 'theme_curvedlearning/nav7icon';
    $title = get_string('navicon', 'theme_curvedlearning');
    $description = get_string('navicondesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/nav7buttontext';
    $title = get_string('naviconbuttontext', 'theme_curvedlearning');
    $description = get_string('naviconbuttontextdesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/nav7buttonurl';
    $title = get_string('naviconbuttonurl', 'theme_curvedlearning');
    $description = get_string('naviconbuttonurldesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/nav7target';
    $title = get_string('marketingurltarget' , 'theme_curvedlearning');
    $description = get_string('marketingurltargetdesc', 'theme_curvedlearning');
    $target1 = get_string('marketingurltargetself', 'theme_curvedlearning');
    $target2 = get_string('marketingurltargetnew', 'theme_curvedlearning');
    $target3 = get_string('marketingurltargetparent', 'theme_curvedlearning');
    $default = 'target1';
    $choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // This is the descriptor for icon eight
    $name = 'theme_curvedlearning/navicon8info';
    $heading = get_string('navicon8', 'theme_curvedlearning');
    $information = get_string('navicondesc', 'theme_curvedlearning');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    $name = 'theme_curvedlearning/nav8icon';
    $title = get_string('navicon', 'theme_curvedlearning');
    $description = get_string('navicondesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/nav8buttontext';
    $title = get_string('naviconbuttontext', 'theme_curvedlearning');
    $description = get_string('naviconbuttontextdesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/nav8buttonurl';
    $title = get_string('naviconbuttonurl', 'theme_curvedlearning');
    $description = get_string('naviconbuttonurldesc', 'theme_curvedlearning');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_curvedlearning/nav8target';
    $title = get_string('marketingurltarget' , 'theme_curvedlearning');
    $description = get_string('marketingurltargetdesc', 'theme_curvedlearning');
    $target1 = get_string('marketingurltargetself', 'theme_curvedlearning');
    $target2 = get_string('marketingurltargetnew', 'theme_curvedlearning');
    $target3 = get_string('marketingurltargetparent', 'theme_curvedlearning');
    $default = 'target1';
    $choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Must add the page after definiting all the settings!
    $settings->add($page);

        /* Slideshow Settings Start */
        $temp = new admin_settingpage('theme_curvedlearning_slideshow', get_string('slideshowheading', 'theme_curvedlearning'));
        $temp->add(new admin_setting_heading('theme_curvedlearning_slideshow', get_string('slideshowheadingsub', 'theme_curvedlearning'),
        format_text(get_string('slideshowdesc', 'theme_curvedlearning'), FORMAT_MARKDOWN)));
    
        // Display Slideshow.
        $name = 'theme_curvedlearning/toggleslideshow';
        $title = get_string('toggleslideshow', 'theme_curvedlearning');
        $description = get_string('toggleslideshowdesc', 'theme_curvedlearning');
        $yes = get_string('yes');
        $no = get_string('no');
        $default = 1;
        $choices = array(1 => $yes , 0 => $no);
        $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
        $temp->add($setting);
    
        // Number of slides.
        $name = 'theme_curvedlearning/numberofslides';
        $title = get_string('numberofslides', 'theme_curvedlearning');
        $description = get_string('numberofslides_desc', 'theme_curvedlearning');
        $default = 3;
        $choices = array(
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
            6 => '6',
            7 => '7',
            8 => '8',
            9 => '9',
            10 => '10',
            11 => '11',
            12 => '12',
        );
        $temp->add(new admin_setting_configselect($name, $title, $description, $default, $choices));
    
        // Slideshow settings.
        $numberofslides = get_config('theme_curvedlearning', 'numberofslides');
        for ($i = 1; $i <= $numberofslides; $i++) {
    
            // This is the descriptor for Slide One.
            $name = 'theme_curvedlearning/slide' . $i . 'info';
            $heading = get_string('slideno', 'theme_curvedlearning', array('slide' => $i));
            $information = get_string('slidenodesc', 'theme_curvedlearning', array('slide' => $i));
            $setting = new admin_setting_heading($name, $heading, $information);
            $temp->add($setting);
    
            // Slide Image.
            $name = 'theme_curvedlearning/slide' . $i . 'image';
            $title = get_string('slideimage', 'theme_curvedlearning');
            $description = get_string('slideimagedesc', 'theme_curvedlearning');
            $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide' . $i . 'image');
            $setting->set_updatedcallback('theme_reset_all_caches');
            $temp->add($setting);
    
            // Slide Caption.
            $name = 'theme_curvedlearning/slide' . $i . 'caption';
            $title = get_string('slidecaption', 'theme_curvedlearning');
            $description = get_string('slidecaptiondesc', 'theme_curvedlearning');
            $default = get_string('slidecaptiondefault', 'theme_curvedlearning', array('slideno' => sprintf('%02d', $i) ));
            $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
            $temp->add($setting);
    
            // Slide Description Text.
            $name = 'theme_curvedlearning/slide' . $i . 'desc';
            $title = get_string('slidedesc', 'theme_curvedlearning');
            $description = get_string('slidedesctext', 'theme_curvedlearning');
            $default = get_string('slidedescdefault', 'theme_curvedlearning');
            $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
            $temp->add($setting);
        }

        $settings->add($temp);
    
        /* Slideshow Settings End*/

}
