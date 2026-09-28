<?php
class Model {
    public function __construct() {
        if (!isset($_SESSION['employees'])) { $_SESSION['employees'] = []; }
        if (!isset($_SESSION['relations'])) { $_SESSION['relations'] = []; }
        
        if (!isset($_SESSION['ai_emp'])) { $_SESSION['ai_emp'] = 1; }
        if (!isset($_SESSION['ai_off'])) { $_SESSION['ai_off'] = 3; }

        if (!isset($_SESSION['offices'])) { 
            $_SESSION['offices'] = [
                ['id' => 1, 'office_name' => 'UC Surabaya'],
                ['id' => 2, 'office_name' => 'UC Makassar']
            ];
        }
    }

    public function getAllEmployees() {
        return $_SESSION['employees'];
    }
    public function createEmployee($nama, $jabatan, $umur) {
        $id = $_SESSION['ai_emp']++;
        $_SESSION['employees'][] = ['id' => $id, 'nama' => $nama, 'jabatan' => $jabatan, 'umur' => $umur];
    }
    public function deleteEmployee($id) {
        foreach ($_SESSION['employees'] as $k => $v) {
            if ($v['id'] == $id) { unset($_SESSION['employees'][$k]); }
        }
        $_SESSION['employees'] = array_values($_SESSION['employees']);
        
        foreach ($_SESSION['relations'] as $k => $v) {
            if ($v['employee_id'] == $id) { unset($_SESSION['relations'][$k]); }
        }
        $_SESSION['relations'] = array_values($_SESSION['relations']);
    }
    public function getAllOffices() {
        return $_SESSION['offices'];
    }
    public function createOffice($office_name) {
        $id = $_SESSION['ai_off']++;
        $_SESSION['offices'][] = ['id' => $id, 'office_name' => $office_name];
    }
    public function deleteOffice($id) {
        foreach ($_SESSION['offices'] as $k => $v) {
            if ($v['id'] == $id) { unset($_SESSION['offices'][$k]); }
        }
        $_SESSION['offices'] = array_values($_SESSION['offices']);

        foreach ($_SESSION['relations'] as $k => $v) {
            if ($v['office_id'] == $id) { unset($_SESSION['relations'][$k]); }
        }
        $_SESSION['relations'] = array_values($_SESSION['relations']);
    }
    public function getOfficeEmployees() {
        $result = [];
        foreach ($_SESSION['relations'] as $rel) {
            $emp_name = ''; $off_name = '';
            foreach ($_SESSION['employees'] as $emp) { if ($emp['id'] == $rel['employee_id']) $emp_name = $emp['nama']; }
            foreach ($_SESSION['offices'] as $off) { if ($off['id'] == $rel['office_id']) $off_name = $off['office_name']; }
            
            if ($emp_name != '' && $off_name != '') {
                $result[] = ['employee_name' => $emp_name, 'office_name' => $off_name];
            }
        }
        return $result;
    }
    
    public function assignOrUpdateRelation($emp_id, $off_id) {
        $found = false;
        foreach ($_SESSION['relations'] as $k => $v) {
            if ($v['employee_id'] == $emp_id) {
                $_SESSION['relations'][$k]['office_id'] = $off_id;
                $found = true;
                break;
            }
        }
        if (!$found) {
            $_SESSION['relations'][] = ['employee_id' => $emp_id, 'office_id' => $off_id];
        }
    }
}
?>