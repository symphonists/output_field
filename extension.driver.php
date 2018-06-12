<?php

class extension_output_field extends Extension
{
    /**
     * set the name of the extension field table
     *
     * @var string
     * @since version 2.1.0
     */

    const FIELD_TBL_NAME = 'tbl_fields_output';

    /**
     * INSTALL
     *
     * http://www.getsymphony.com/learn/api/2.4/toolkit/extension/#install
     *
     * @since version 1.0.0
     */

    public function install()
    {
        return self::createFieldTable();
    }

    /**
     * CREATE FIELD TABLE
     *
     * @since version 2.1.0
     */

    public static function createFieldTable()
    {
        $tbl = self::FIELD_TBL_NAME;

        return Symphony::Database()->query("
            CREATE TABLE IF NOT EXISTS `$tbl` (
                `id`            int(11) unsigned NOT NULL auto_increment,
                `field_id`      int(11) unsigned NOT NULL,
                `validator`     varchar(100),
                PRIMARY KEY (`id`),
                UNIQUE KEY `field_id` (`field_id`)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        ");
    }

    /**
     * UNINSTALL
     *
	 * http://www.getsymphony.com/learn/api/2.4/toolkit/extension/#uninstall
	 *
     * @since version 1.0.0
     */

    public function uninstall()
    {
        return self::deleteFieldTable();
    }

    /**
     * DELETE FIELD TABLE
     *
     * @since version 2.1.0
     */

    public static function deleteFieldTable()
    {
        $tbl = self::FIELD_TBL_NAME;

        return Symphony::Database()->query("
            DROP TABLE IF EXISTS `$tbl`
        ");
    }

}
