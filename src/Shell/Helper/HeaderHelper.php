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

namespace Multidimensional\Cakephpbb\Shell\Helper;

use Cake\Console\Helper;

class HeaderHelper extends Helper
{

    /**
     * @param null $args not used
     * @return void
     */
    public function output($args = null)
    {
        $this->_io->out("\n\n");
        $this->_io->styles('header', ['text' => 'green']);
        $this->_io->out('<header>           __          ____  ____     ___         __  __   </header>');
        $this->_io->out('<header>    ____  / /_  ____  / __ )/ __ )   /   | __  __/ /_/ /_  </header>');
        $this->_io->out('<header>   / __ \/ __ \/ __ \/ __  / __  |  / /| |/ / / / __/ __ \ </header>');
        $this->_io->out('<header>  / /_/ / / / / /_/ / /_/ / /_/ /  / ___ / /_/ / /_/ / / / </header>');
        $this->_io->out('<header> / .___/_/ /_/ .___/_____/_____/  /_/  |_\__,_/\__/_/ /_/  </header>');
        $this->_io->out('<header>/_/         /_/                                            </header>');
        $this->_io->out('<header>                                                           </header>');
        $this->_io->out("\n");
        $this->_io->out('<header>               CakePHP Plugin for phpBB Auth               </header>');
        $this->_io->out('<header>               by  https://multidimension.al               </header>');
        $this->_io->out("\n\n");
    }
}
