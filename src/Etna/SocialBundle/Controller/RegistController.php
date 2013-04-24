<?php

    namespace Etna\SocialBundle\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Etna\SocialBundle\Entity\Membre;
    use FOS\UserBundle\Controller\RegistrationController as BaseController;

    class RegistController extends BaseController {

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

                return $this->redirect($this->generateUrl('etna_social_login'));
            }

            return $this->render('EtnaSocialBundle:Form :newcompte.html.twig', array('form' => $form->createView(),
            ));
            }
    }