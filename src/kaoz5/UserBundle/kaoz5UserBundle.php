<?php

namespace kaoz5\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class kaoz5UserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
