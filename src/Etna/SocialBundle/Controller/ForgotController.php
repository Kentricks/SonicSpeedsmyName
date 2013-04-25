<?php

    namespace Etna\SocialBundle\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Etna\SocialBundle\Entity\Membre;
    use FOS\UserBundle\Controller\ResettingController as BaseController;
    use Symfony\Component\HttpFoundation\RedirectResponse;
    use Symfony\Component\HttpFoundation\Request;
    use FOS\UserBundle\FOSUserEvents;
    use FOS\UserBundle\Event\UserEvent;
    use FOS\UserBundle\Event\FormEvent;
    use FOS\UserBundle\Event\FilterUserResponseEvent;
    use Symfony\Component\HttpFoundation\Response;
    class ForgotController extends BaseController {

        public function requestAction()
        {
            return $this->container->get('templating')->renderResponse('EtnaSocialBundle:Forms:resetpass.html.twig');
        }

        public function sendEmailAction(Request $request)
        {
            $username = $request->request->get('username');

            /** @var $user UserInterface */
            $user = $this->container->get('fos_user.user_manager')->findUserByUsernameOrEmail($username);

            if (null === $user) {
                return $this->container->get('templating')->renderResponse('EtnaSocialBundle:Forms:resetpass.html.twig', array('invalid_username' => $username));
            }

            if ($user->isPasswordRequestNonExpired($this->container->getParameter('fos_user.resetting.token_ttl'))) {
                return $this->container->get('templating')->renderResponse('EtnaSocialBundle:Info:passalready.html.twig');
            }

            if (null === $user->getConfirmationToken()) {
                /** @var $tokenGenerator \FOS\UserBundle\Util\TokenGeneratorInterface */
                $tokenGenerator = $this->container->get('fos_user.util.token_generator');
                $user->setConfirmationToken($tokenGenerator->generateToken());
            }

            $this->container->get('session')->set(static::SESSION_EMAIL, $this->getObfuscatedEmail($user));
            $this->container->get('fos_user.mailer')->sendResettingEmailMessage($user);
            $user->setPasswordRequestedAt(new \DateTime());
            $this->container->get('fos_user.user_manager')->updateUser($user);

            return new RedirectResponse($this->container->get('router')->generate('etna_social_oubli_check_email'));
        }

        /**
         * Tell the user to check his email provider
         */
        public function checkEmailAction()
        {
            $session = $this->container->get('session');
            $email = $session->get(static::SESSION_EMAIL);
            $session->remove(static::SESSION_EMAIL);

            if (empty($email)) {
                // the user does not come from the sendEmail action
                return new RedirectResponse($this->container->get('router')->generate('etna_social_oubli'));
            }

            return $this->container->get('templating')->renderResponse('EtnaSocialBundle:Info:checkemail.html.twig', array(
                'email' => $email,
            ));
        }

        /**
         * Reset user password
         */
        public function resetAction(Request $request, $token)
        {
            /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
            $formFactory = $this->container->get('fos_user.resetting.form.factory');
            /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
            $userManager = $this->container->get('fos_user.user_manager');
            /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
            $dispatcher = $this->container->get('event_dispatcher');

            $user = $userManager->findUserByConfirmationToken($token);

            if (null === $user) {
                throw new NotFoundHttpException(sprintf('The user with "confirmation token" does not exist for value "%s"', $token));
            }

            $event = new GetResponseUserEvent($user, $request);
            $dispatcher->dispatch(FOSUserEvents::RESETTING_RESET_INITIALIZE, $event);

            if (null !== $event->getResponse()) {
                return $event->getResponse();
            }

            $form = $formFactory->createForm();
            $form->setData($user);

            if ('POST' === $request->getMethod()) {
                $form->bind($request);

                if ($form->isValid()) {
                    $event = new FormEvent($form, $request);
                    $dispatcher->dispatch(FOSUserEvents::RESETTING_RESET_SUCCESS, $event);

                    $userManager->updateUser($user);

                    if (null === $response = $event->getResponse()) {
                        $url = $this->container->get('router')->generate('etna_social_home');
                        $response = new RedirectResponse($url);
                    }

                    $dispatcher->dispatch(FOSUserEvents::RESETTING_RESET_COMPLETED, new FilterUserResponseEvent($user, $request, $response));

                    return $response;
                }
            }

            return $this->container->get('templating')->renderResponse('EtnaSocialBundle:Forms:resettingpass.html.twig', array(
                'token' => $token,
                'form' => $form->createView(),
            ));
        }
    } 