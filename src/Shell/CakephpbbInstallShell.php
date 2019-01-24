<?php
/**
 *       __  ___      ____  _     ___                           _                    __
 *      /  |/  /_  __/ / /_(_)___/ (_)___ ___  ___  ____  _____(_)___  ____   ____ _/ /
 *     / /|_/ / / / / / __/ / __  / / __ `__ \/ _ \/ __ \/ ___/ / __ \/ __ \ / __ `/ /
 *    / /  / / /_/ / / /_/ / /_/ / / / / / / /  __/ / / (__  ) / /_/ / / / // /_/ / /
 *   /_/  /_/\__,_/_/\__/_/\__,_/_/_/ /_/ /_/\___/_/ /_/____/_/\____/_/ /_(_)__,_/_/
 *
 *  CakePHP Plugin : CakePHP Authentication Plugin for phpBB
 *  Copyright (c) Multidimension.al (http://multidimension.al)
 *  Github : https://github.com/multidimension-al/cakephpbb
 *
 *  Licensed under The MIT License
 *  For full copyright and license information, please see the LICENSE file
 *  Redistributions of files must retain the above copyright notice.
 *
 *  @copyright  Copyright © 2019 Multidimension.al (http://multidimension.al)
 *  @link       https://github.com/multidimension-al/cakephpbb Github
 *  @license    http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace Multidimensional\Cakephpbb\Shell;

use Cake\Console\Shell;
use Cake\Core\Configure;

class CakephpbbInstallShell extends Shell
{

    /**
     * @return void
     */
    public function main()
    {
        $this->clear();

        $this->_io->styles('error', ['text' => 'red']);
        $this->helper('Multidimensional/Cakephpbb.Header')->output();

        $firstRun = ((Configure::check('Multidimensional/Cakephpbb')) ? false : true);

        //Activate Plugin
        if ((($firstRun) ? (strtolower($this->in('Install Cakephpbb Plugin?', ['y', 'n'])) == 'y') : (strtolower($this->in('Update Configuration?', ['y', 'n'])) == 'y'))
        ) {
            $this->out();
            $this->out('Please enter the path to your phpBB installation from your root directory.');
            $this->out('Ex: /home/username/www/phpBB/ (include end slash)', 2);

            if (Configure::check('Multidimensional/Cakephpbb.PHPBB_ROOT_PATH')) {
                $this->out('Current setting: ' . Configure::read('Multidimensional/Cakephpbb.PHPBB_ROOT_PATH'), 2);
            }

            Configure::write('Multidimensional/Cakephpbb.PHPBB_ROOT_PATH', $this->in('phpBB Path:'));
            $this->out();
            $this->out('Please enter the URL to your phpBB installation.');
            $this->out('Ex: //www.domain.com/phpBB/ (include end slash)', 2);

            if (Configure::check('Multidimensional/Cakephpbb.PHPBB_ABSOLUTE_PATH')) {
                $this->out('Current setting: ' . Configure::read('Multidimensional/Cakephpbb.PHPBB_ABSOLUTE_PATH'), 2);
            }

            Configure::write('Multidimensional/Cakephpbb.PHPBB_ABSOLUTE_PATH', $this->in('phpBB URL:'));
            Configure::dump('phpbb', 'default', ['Multidimensional/Cakephpbb']);
            $this->out('');
            $this->out('Configuration saved.');
        }

        $this->out('');
    }
}
