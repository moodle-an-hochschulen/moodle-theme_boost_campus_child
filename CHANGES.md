moodle-theme_boost_campus_child
===============================

Changes
-------

### Unreleased

* 2021-01-14 - Bugfix: Fixed a regression after fixing the missing favicon which resulted in missing notes and hints in the course header.

### v3.10-r1

* 2021-01-09 - Prepare compatibility for Moodle 3.10.
* 2021-01-06 - Change in Moodle release support:
               For the time being, this plugin is maintained for the most recent LTS release of Moodle as well as the most recent major release of Moodle.
               Bugfixes are backported to the LTS release. However, new features and improvements are not necessarily backported to the LTS release.
* 2021-01-06 - Improvement: Declare which major stable version of Moodle this plugin supports (see MDL-59562 for details).

### v3.9-r1

* 2020-10-06 - Prepare compatibility for Moodle 3.9.

### v3.8-r2

* 2020-10-05 - Fixed bug that setting addablockposition was not applied to Boost Campus Child.
* 2020-09-24 - Fixed bug that theme Boost Campus Child did not show the favicon set in parent theme Boost Campus.
* 2020-06-09 - Improved SCSS settings to be used with admin_setting_scsscode that validates the code before saving.

### v3.8-r1

* 2020-03-25 - Prepare compatibility for Moodle 3.8.

### v3.7-r1

* 2019-09-27 - Check compatibility for Moodle 3.7, no functionality change.

### v3.6-r1

* 2019-01-31 - Check compatibility for Moodle 3.6, no functionality change.
* 2018-12-05 - Changed travis.yml due to upstream changes.

### v3.5-r2

* 2018-10-04 - Fixed brand colors due to Bootstrap changes in Boost.
* 2018-06-07 - Added missing strings from a Boost Campus setting.

### v3.5-r1

* 2018-05-24 - Check compatibility for Moodle 3.5, no functionality change.

### v3.4-r4

* 2018-05-16 - Implement Privacy API.

### v3.4-r3

* 2018-04-16 - Fixed bug in function that writes settings to pre scss.

### v3.4-r2

* 2018-03-02 - Improved get_extra_scss callback due to doubled CSS code.

### v3.4-r1

* 2018-02-20 - Changed the get_extra_scss functionality due to parent theme changes.
* 2018-02-19 - Check compatibility for Moodle 3.4, no functionality change.

### v3.3-r1

* 2018-01-16 - Check compatibility for Moodle 3.3, no functionality change.

### v3.2-r1

* 2017-12-05 - Added Workaround to travis.yml for fixing Behat tests with TravisCI.
* 2017-11-15 - Initial creation of a Boost Campus child theme
