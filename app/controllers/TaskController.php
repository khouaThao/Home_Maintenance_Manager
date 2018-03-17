<?php

/**
 * Name:
 * Date:
 */
class TaskController extends Controller {

    $taskManagement =  $this->model->getTaskManagement();
    
    public function index($applianceId = 0, $propertyNum = 0) {
        $this->notSignedIn();        
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $taskManagement->addTask();
        }
        $_SESSION['outputCotent'] = $taskManagement->getListOfTasks($applianceId); 
        $this->view("list-task-page", ["appId" => $applianceId, "proNum" => $propertyNum]);
    }

    public function add($applianceId = 0, $propertyNum = 0) {
        $this->notSignedIn();
        $this->view("add-task-page", ["appId" => $applianceId, "proNum" => $propertyNum]);
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $taskManagement->addTask();
        }
    }

    public function update($taskNum = 0) {
        $this->notSignedIn();
        $this->view("update-task-page", ["tn" => $taskNum]);

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $taskID = $_SESSION['taskid' . $taskNum];
            $taskManagement->updateTask($taskID);
        }
    }

    public function delete($taskNum = 0) {
        $this->notSignedIn();
        $this->view("delete-task-page", ["tn" => $taskNum]);
    }

    //list all task of user regardless of property
    public function listAll($userId = 0) {
        $this->notSignedIn();
        $this->view("listAll-task-page", ["tn" => $taskNum]);

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $taskID = $_SESSION['taskid' . $taskNum];
            $taskManagement->updateTask($taskID);
        }
    }
}