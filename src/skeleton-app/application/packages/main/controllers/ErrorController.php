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

namespace main\controllers;

use xen\mvc\ErrorControllerBase;

class ErrorController extends ErrorControllerBase
{
    public function pageNotFoundAction()
    {
        $this->_layout->title           = 'Error 404 - Page Not Found';
        $this->_layout->description     = '404';

        $this->_view->url = $this->getParam('url');

        $this->render();
    }

    function exceptionHandlerAction()
    {
        $e = $this->getParam('e');

        $this->_layout->title           = 'Error - Exception Raised';
        $this->_layout->description     = 'Error - ' . $e->getMessage();

        $exceptionValues = array();

        $exceptionValues['Message']     = $e->getMessage();
        $exceptionValues['Code']        = $e->getCode();
        $exceptionValues['File']        = $e->getFile();
        $exceptionValues['Line']        = $e->getLine();
        $exceptionValues['Trace']       = preg_replace("/\n/", '<br>', $e->getTraceAsString());

        $this->_view->msgs = $exceptionValues;

        $this->render();
    }

    function forbiddenAction()
    {
        $this->_layout->title           = 'Error 403 - Forbidden';
        $this->_layout->description     = 'You do not have permission to access';

        $this->_view->route = $this->getParam('route');

        $this->render();
    }
}