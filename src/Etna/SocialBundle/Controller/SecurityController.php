<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Etna\SocialBundle\Controller;

use FOS\UserBundle\Controller\SecurityController as BaseController;

class SecurityController extends BaseController
{
	protected function renderLogin(array $data)
    {
        $template = sprintf('EtnaSocialBundle:Forms:login.html.%s', $this->container->getParameter('fos_user.template.engine'));

        return $this->container->get('templating')->renderResponse($template, $data);
    }
}