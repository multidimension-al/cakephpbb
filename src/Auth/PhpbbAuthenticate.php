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
 * @copyright  Copyright © 2019 Multidimension.al (http://multidimension.al)
 * @link       https://github.com/multidimension-al/cakephpbb Github
 * @license    http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace Multidimensional\Cakephpbb\Auth;

use Cake\Auth\BaseAuthenticate;
use Cake\Controller\ComponentRegistry;
use Cake\Core\Configure;
use Cake\Http\Response;
use Cake\Http\ServerRequest;

class PhpbbAuthenticate extends BaseAuthenticate
{

    private $user;
    private $phpbb_root_path;
    private $phpbb_absolute_path;

    /**
     * @param registry $registry
     * @param array $config
     * @return void
     */
    public function __construct(ComponentRegistry $registry, $config)
    {
        parent::__construct($registry, $config);

        global $phpbb_container, $phpbb_root_path, $phpEx, $user, $auth, $request, $cache, $db, $config, $template, $table_prefix, $phpbb_dispatcher;

        define('IN_PHPBB', true);
        $this->phpbb_root_path = Configure::read('Multidimensional/Cakephpbb.PHPBB_ROOT_PATH');
        $this->phpbb_absolute_path = Configure::read('Multidimensional/Cakephpbb.PHPBB_ABSOLUTE_PATH');
        $phpbb_root_path = $this->phpbb_root_path;
        $phpEx = substr(strrchr(__FILE__, '.'), 1);
        include($this->phpbb_root_path . 'common.' . $phpEx);

        $user->session_begin();
        $auth->acl($user->data);
        $user->setup();
        $request->enable_super_globals();

        $this->user = $user;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return array
     */
    public function authenticate(ServerRequest $request, Response $response)
    {
        return $this->getUser($request);
    }

    /**
     * @param Request $request
     * @return array|false
     */
    public function getUser(ServerRequest $request)
    {
        if ($this->user->data['is_registered']) {
            return $this->user->data;
        } else {
            return false;
        }
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function unauthenticated(ServerRequest $request, Response $response)
    {
        return $response->header('Location', $this->phpbb_absolute_path . 'ucp.php?mode=login&redirect=' . urlencode($request->scheme() . '://' . $request->host() . $request->getRequestTarget()));
    }

    /**
     * @param Event $event
     * @param array $user
     * @return void
     */
    public function logout(Event $event, $user)
    {
        return $this->redirect($this->phpbb_absolute_path . 'ucp.php?mode=logout&sid=' . $this->user->data['session_id']);
    }
}
