<?php
/**
 * xenFramework (http://xenframework.com/)
 *
 * This file is part of the xenframework package.
 *
 * (c) Ismael Trascastro <itrascastro@xenframework.com>
 *
 * @link        http://github.com/xenframework for the canonical source repository
 * @copyright   Copyright (c) xenFramework. (http://xenframework.com)
 * @license     MIT License - http://en.wikipedia.org/wiki/MIT_License
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace controllers;

use xen\mvc\ErrorControllerBase;

class ErrorController extends ErrorControllerBase
{
    public function pageNotFoundAction()
    {
        return $this->render();
    }

    function exceptionHandlerAction()
    {
        return $this->render();
    }

    function forbiddenAction()
    {
        return $this->render();
    }
}