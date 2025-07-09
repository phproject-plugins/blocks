<?php

/**
 * @package  Blocks
 * @author   Alan Hardman <alan@phpizza.com>
 * @version  0.1.1
 */

namespace Plugin\Blocks;

class Base extends \Plugin
{
    /**
     * Initialize the plugin, adding hooks dynamically
     */
    public function _load()
    {
        $block = new Block();
        $blocks = $block->find();
        \Base::instance()->set("site.plugins.blocks.blocks", $blocks);
        foreach ($blocks as $block) {
            $this->_hook($block->hook, function ($data) use ($block) {
                echo $block->content;
                return $data;
            });
        }
    }

    /**
     * Handle admin page for plugin
     */
    public function _admin()
    {
        echo \Helper\View::instance()->render("blocks/blocks-plugin-admin.html");
    }

    /**
     * Install plugin (add database table)
     */
    public function _install()
    {
        $db = \Base::instance()->get("db.instance");
        $install_db = file_get_contents(__DIR__ . "/db.sql");
        $db->exec(explode(";", $install_db));
    }

    /**
     * Check if plugin is installed
     * @return bool
     */
    public function _installed()
    {
        $db = \Base::instance()->get("db.instance");
        $db->exec("SHOW TABLES LIKE 'block'");
        return (bool) $db->count();
    }
}
