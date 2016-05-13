<?php

class UserController implements IController
{
    function helloAction()
    {
        $FrontController = FrontController::getInstance();
        $params = $FrontController->getParams();


        $fm = new FileModel();
        $fm->name =  $params ['name'];

        $RenderResult = $fm -> render(USER_DEFAULT_FILE);
        $FrontController ->setBody($RenderResult);
    }

    function listAction()
    {
        $FrontController = FrontController::getInstance();
        $params = $FrontController->getParams();

        $fm = new FileModel();
        $fm ->parseUserDB();



        $RenderResult = $fm->render(USER_LIST_FILE);
        $FrontController -> setBody($RenderResult);

    }

    function getAction(){
        $FrontController = FrontController::getInstance();
        $params = $FrontController->getParams();

        $fm = new FileModel();
        $fm ->findUserInDB($params['role']);

        $RenderResult = $fm->render(USER_ROLE_FILE);
        $FrontController -> setBody($RenderResult);


    }

    function addAction(){

        $FrontController = FrontController::getInstance();
        $params = $FrontController->getParams();

        $fm = new FileModel();
        $fm ->user = $params;
        $fm->addUserToDB();

        $RenderResult = $fm->render(USER_ADD_FILE);
        $FrontController -> setBody($RenderResult);

    }

}