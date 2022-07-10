Upgrading this plugin
=====================

This is an internal documentation for plugin developers with some notes what has to be considered when updating this plugin to a new Moodle major version.

General
-------

* Generally, this is a quite simple theme with just one purpose.
* It does not change larger parts of theme_boost_campus and should remain quite stable between Moodle major versions.
* Thus, the upgrading effort is low.


Upstream changes
----------------

* This theme is built on top of theme_boost_campus. It inherits the codebase from theme_boost and extends exactly one behaviour. However, code duplication with theme_boost_campus is low.


Automated tests
---------------

* The theme does not have any automated tests.


Manual tests
------------

* When upgrading this theme, you should manually test
  a) all settings are inherited correctly from theme_boost,
  b) that the configured brand color is applied correctly
  c) and that the configured SCSS code is applied correctly.


Visual checks
-------------

* There aren't any additional visual checks in the Moodle GUI needed to upgrade this theme.
