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
 
namespace Multidimensional\Cakephpbb\Auth;

use Cake\Auth\BaseAuthenticate;
use Cake\Controller\ComponentRegistry;
use Cake\Core\Configure;
use Cake\Http\Exception\UnauthorizedException;
use Cake\Http\Response;
use Cake\Http\ServerRequest;

/*
* Standard phpBB Session Includes
*
* define('IN_PHPBB', true);
* $phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
* $phpEx = substr(strrchr(__FILE__, '.'), 1);
* include($phpbb_root_path . 'common.' . $phpEx);
* 
* // Start session management
* $user->session_begin();
* $auth->acl($user->data);
* $user->setup();
* 
* Logged In? $user->data['is_registered']
* Username: $user->data['username']
* Email: $user->data['user_email']
*
* phpBB Tutorials:
* https://www.phpbb.com/support/docs/en/3.0/kb/article/phpbb3-sessions-integration/
* https://www.phpbb.com/support/docs/en/3.0/kb/article/phpbb3-cross-site-sessions-integration/
*/

class PhpbbAuthenticate extends BaseAuthenticate
{

    public function __construct(ComponentRegistry $registry, $config)
    {
        parent::__construct($registry, $config);
    }
 
    public function authenticate(ServerRequest $request, Response $response)
    {
        return $this->getUser($request);
    }
 
    public function getUser(ServerRequest $request)
    {
      
        return $user;
    }
 
}
