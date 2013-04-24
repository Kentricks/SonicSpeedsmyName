<?php

    namespace Etna\SocialBundle\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Etna\SocialBundle\Entity\Membre;
    use FOS\UserBundle\Controller\RegistrationController as BaseController;
    use Symfony\Component\HttpFoundation\RedirectResponse;
    use Symfony\Component\HttpFoundation\Request;
    use FOS\UserBundle\FOSUserEvents;
    use FOS\UserBundle\Event\UserEvent;
    use FOS\UserBundle\Event\FormEvent;
    use FOS\UserBundle\Event\FilterUserResponseEvent;
    use Symfony\Component\HttpFoundation\Response;
    class RegistController extends BaseController {

        public function registerAction(Request $request)
        {
            /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface   */
            $formFactory = $this->container->get('fos_user.registration.form.factory');
            /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface        */
            $userManager = $this->container->get('fos_user.user_manager');
            /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
            $dispatcher = $this->container->get('event_dispatcher');

            $user = $userManager->createUser();
            $user->setEnabled(true);

            $dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, new UserEvent($user, $request));

            $form = $formFactory->createForm();
            $form->setData($user);

            if ('POST' === $request->getMethod()) {
                $form->bind($request);

                if ($form->isValid()) {
                    $event = new FormEvent($form, $request);
                    $dispatcher->dispatch(FOSUserEvents::REGISTRATION_SUCCESS, $event);

                    $userManager->updateUser($user);




                    if (null === $response = $event->getResponse()) {
                        $url = $this->container->get('router')->generate('fos_user_registration_confirmed');
                        $response = new RedirectResponse($this->generateUrl('etna_social_login'));
                    }

                    $dispatcher->dispatch(FOSUserEvents::REGISTRATION_COMPLETED, new FilterUserResponseEvent($user, $request, $response));

                    return $response;
                }
            }

            return $this->container->get('templating')->renderResponse('EtnaSocialBundle:Forms:newcompte.html.twig', array(
                'form' => $form->createView(),
            ));
        }

         /*
        public function registerAction()
        {
            $form = $this->container->get('fos_user.registration.form');
            $formHandler = $this->container->get('fos_user.registration.form.handler');
            $confirmationEnabled = $this->container->getParameter('fos_user.registration.confirmation.enabled');

            $process = $formHandler->process($confirmationEnabled);
            if ($process) {
                $user = $form->getData();
                $this->container->get('logger')->info(
                    sprintf('New user registration: %s', $user)
                );

                if ($confirmationEnabled) {
                    $this->container->get('session')->set('fos_user_send_confirmation_email/email', $user->getEmail());
                    $route = 'fos_user_registration_check_email';
                } else {
                    $this->authenticateUser($user);
                    $route = 'fos_user_registration_confirmed';
                }

                $this->setFlash('fos_user_success', 'registration.flash.user_created');
                $url = $this->container->get('router')->generate($route);

                return new RedirectResponse($this->generateUrl('etna_social_login'));
            }

            return $this->container->get('templating')->renderResponse('EtnaSocialBundle:Form :newcompte.html.twig', array('form' => $form->createView(),
            ));
        }
          */
    }