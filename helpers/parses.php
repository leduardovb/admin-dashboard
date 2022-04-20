<?php
    function parseProperties($type ,$properties) {
        $list = [];
        if (strlen($properties)) {
            $firstSplit = explode("&", $properties);
            if (sizeof($firstSplit) === 1) $firstSplit = [$properties];
            foreach ($firstSplit as $property) {
                $filter = explode($type."=", $property);
                $list[] = $filter[1];
            }
        }
        return $list;
    }

    function parseWhere($filters) {
        $where = null;
        if (sizeof($filters) > 0) {
            $where .= "WHERE ";
            foreach ($filters as $filter) {
                $splitFilter = explode(":", $filter);
                $tableWithColumn = $splitFilter[0];
                $value = $splitFilter[1];
                $splitTableWithColumn = explode(".", $tableWithColumn);
                $table = strtoupper($splitTableWithColumn[0]);
                $column = strtoupper($splitTableWithColumn[1]);
                $where .= "$table.$column = '$value'";
                if (array_search($filter, $filters) != sizeof($filters) - 1) $where .= " AND ";
            }
        }
        return $where;
    }

    function parseJoin($tables) {
        $innerJoin = null;
        if (sizeof($tables) > 0) foreach ($tables as $table) {
            $joinTable = strtoupper($table);
            $innerJoin .= "INNER JOIN $joinTable ON $joinTable.id = $table"."_id";
        }
        return $innerJoin;
    }