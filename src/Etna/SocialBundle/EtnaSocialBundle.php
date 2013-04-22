<?php

namespace Etna\SocialBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class EtnaSocialBundle extends Bundle
{
	public function getParent()
    {
        return 'FOSUserBundle';
    }
}
