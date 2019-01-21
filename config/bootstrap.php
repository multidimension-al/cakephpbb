<?php
/**
 *      __  ___      ____  _     ___                           _                    __
 *     /  |/  /_  __/ / /_(_)___/ (_)___ ___  ___  ____  _____(_)___  ____   ____ _/ /
 *    / /|_/ / / / / / __/ / __  / / __ `__ \/ _ \/ __ \/ ___/ / __ \/ __ \ / __ `/ /
 *   / /  / / /_/ / / /_/ / /_/ / / / / / / /  __/ / / (__  ) / /_/ / / / // /_/ / /
 *  /_/  /_/\__,_/_/\__/_/\__,_/_/_/ /_/ /_/\___/_/ /_/____/_/\____/_/ /_(_)__,_/_/
 *
 * CakePHP Plugin : CakePHP Authentication Plugin for phpBB
 * Copyright (c) Multidimension.al (http://multidimension.al)
 * Github : https://github.com/multidimension-al/cakephpbb
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE file
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright  Copyright © 2019 Multidimension.al (http://multidimension.al)
 * @link       https://github.com/multidimension-al/cakephpbb Github
 * @license    http://www.opensource.org/licenses/mit-license.php MIT License
 */
 
use Cake\Core\Configure;
use Cake\Core\Plugin;

if (file_exists(CONFIG . 'phpbb.php')) {
    Configure::load('phpbb');
} else {
    Configure::write('Multidimensional/Cakephpbb', NULL);
}
