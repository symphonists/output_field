<?php

	Class extension_output_field extends Extension {

		/**
		 * Extension information
		 */
		public function about() {
			return array(
				'name' => 'Field: Output',
				'version' => '1.2',
				'release-date' => '2011-02-01',
				'author' => array(
					'name' => 'Nils Hörrmann',
					'website' => 'http://nilshoerrmann.de',
					'email' => 'post@nilshoerrmann.de'
				),
				'description' => 'An input field with advanced data source output for mail addresses and URIs.'
			);
		}

		public function uninstall() {
		
			// Drop database table
			Symphony::Database()->query("DROP TABLE `tbl_fields_output`");
		}

		public function install() {
		
			// Create database table and fields.
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

	}