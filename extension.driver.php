<?php

	/**
	 * @package output_field
	 */
	/**
	 * Output Field Extension
	 */
	Class extension_output_field extends Extension {

		/**
		 * @see http://symphony-cms.com/learn/api/2.3/toolkit/extension/#install
		 */
		public function install() {
			return Symphony::Database()->query(
				"CREATE TABLE `tbl_fields_output` (
					`id` int(11) unsigned NOT NULL auto_increment,
					`field_id` int(11) unsigned NOT NULL,
					`validator` varchar(100),
					PRIMARY KEY (`id`),
					KEY `field_id` (`field_id`)
				)"
			);
		}

		/**
		 * @see http://symphony-cms.com/learn/api/2.3/toolkit/extension/#uninstall
		 */
		public function uninstall() {
			Symphony::Database()->query("DROP TABLE `tbl_fields_output`");
		}

	}