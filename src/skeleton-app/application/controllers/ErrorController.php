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
use xen\mvc\view\Phtml;

class ErrorController extends ErrorControllerBase
{
    public function pageNotFoundAction()
    {
        $this->_layout->title           = 'Error 404 - Page Not Found';
        $this->_layout->description     = '404';

        $this->_view->url = $this->getParam('url');

        return $this->render();
    }

    function exceptionHandlerAction()
    {
        $layout = new Phtml('application/layouts/error/exception.phtml');
        $this->setLayout($layout);

        $layout->addPartial('content', $this->_view);

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

        return $this->render();
    }

    function forbiddenAction()
    {
        $this->_layout->title           = 'Error 403 - Forbidden';
        $this->_layout->description     = 'You do not have permission to access';

        $this->_view->controller = $this->getParam('controller');
        $this->_view->action = $this->getParam('action');

        $this->_response->setStatusCode(403);

        return $this->render();
    }
}