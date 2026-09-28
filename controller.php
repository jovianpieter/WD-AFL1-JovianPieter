<?php
session_start();
require_once 'model.php';
$model = new Model(); 
$action = isset($_GET['action']) ? $_GET['action'] : '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['save_employee'])) {
        $model->createEmployee($_POST['nama'], $_POST['jabatan'], $_POST['umur']);
        header("Location: controller.php?action=office"); exit;
    }
    if (isset($_POST['save_office'])) {
        $model->createOffice($_POST['office_name']);
        header("Location: controller.php?action=office"); exit;
    }
    if (isset($_POST['save_relation'])) {
        $model->assignOrUpdateRelation($_POST['employee_id'], $_POST['office_id']);
        header("Location: controller.php?action=relation"); exit;
    }
}


if ($action == 'delete_emp' && isset($_GET['id'])) {
    $model->deleteEmployee($_GET['id']);
    header("Location: controller.php"); exit;
} elseif ($action == 'delete_off' && isset($_GET['id'])) {
    $model->deleteOffice($_GET['id']);
    header("Location: controller.php?action=office"); exit;
}


if ($action == '') {
    $employees = $model->getAllEmployees(); 
    require_once 'view_employee.php'; 
} elseif ($action == 'office') {
    $offices = $model->getAllOffices();           
    require_once 'view_office.php';
} elseif ($action == 'relation') {
    $employees = $model->getAllEmployees();       
    $offices = $model->getAllOffices();           
    $relations = $model->getOfficeEmployees();    
    require_once 'view_relation.php';
}
?>