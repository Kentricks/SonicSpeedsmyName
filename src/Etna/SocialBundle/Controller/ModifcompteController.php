<?php

    namespace Etna\SocialBundle\Controller;

	use FOS\UserBundle\FOSUserEvents;
	use FOS\UserBundle\Event\FormEvent;
	use FOS\UserBundle\Event\FilterUserResponseEvent;
	use FOS\UserBundle\Event\GetResponseUserEvent;
	use FOS\UserBundle\Model\UserInterface;
	use Symfony\Component\DependencyInjection\ContainerAware;
	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\HttpFoundation\RedirectResponse;
	use Symfony\Component\Security\Core\Exception\AccessDeniedException;
    use FOS\UserBundle\Controller\ProfileController as BaseController;

	class ModifcompteController extends BaseController {
		public function editAction(Request $request)
		{

		}
	}