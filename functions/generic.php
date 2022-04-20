<?php
    function actionTableHead($columns) {
        $tableHeads = "";
        if (sizeof($columns) > 0) {
            foreach ($columns as $column) {
                $tableHeads .= "<th scope='col'>$column</th>";
            }
            $tableHeads .= "<th>Ações</th>";
        }
        return $tableHeads;
    }

    function actionTableBody($scope, $data) {
        $tableBody = "";
        if (sizeof($data) > 0) {
            $keys = array_keys(get_object_vars($data[0]));
            foreach ($data as $item) {
                $dataHref = "/admin-dashboard/$scope/$item->id";
                $deleteHref = "/admin-dashboard/$scope/delete/$item->id";
                $editButton = actionButton(EDIT_ICON, $dataHref);
                $deleteButton = actionButton(DELETE_ICON, $deleteHref);
                $objectVars = get_object_vars($item);
                $tableBody .= "<tr>";
                foreach ($keys as $key) {
                    $tableBody .= "<td>$objectVars[$key]</td>";
                }
                $tableBody .= "<td><div class='d-flex flex-row'>$editButton $deleteButton</div></td>";
                $tableBody .= "</tr>";
            }
        }
        return $tableBody;
    }

    function actionTable($scope, $columns, $data) {
        $head = actionTableHead($columns);
        $body = actionTableBody($scope, $data);
        return
        ("
            <table class='table'>
                <thead>
                    <tr>
                        $head
                    </tr>
                </thead>
                <tbody>
                    $body
                </tbody>
            </table>   
        ");
    }

    function generatePasswordHash($password) { return password_hash($password, PASSWORD_DEFAULT); }