<?php
abstract class Model{
    private $db;
    public function __construct()
    {
     $this->db = Database::getInstance()->getConnection();
    }


    public function selectSingle($tableName, $columns = [], $where = []) {
        $sql = "SELECT ";
    
        if ($columns) {
            foreach ($columns as $column) {
                $sql .= "`" . $column . "`, ";
            }
            $sql = rtrim($sql, ", ");
        } else {
            $sql .= "*";
        }
    
        $sql .= " FROM `" . $tableName . "`";
    
        if ($where) {
            $sql .= " WHERE ";
            foreach ($where as $key => $value) {
                $sql .= "`" . $key . "` = :" . $key . " AND ";
            }
            $sql = rtrim($sql, " AND ");
        }
    
        $sql .= " LIMIT 1";
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute($where);
        return $stmt->fetch();
    }
    
    public function count($tableName, $where = []) {
        $sql = "SELECT COUNT(*) as total FROM `" . $tableName . "`";
    
        if ($where) {
            $sql .= " WHERE ";
            foreach ($where as $key => $value) {
                $sql .= "`" . $key . "` = :" . $key . " AND ";
            }
            $sql = rtrim($sql, " AND ");
        }
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute($where);
        $result = $stmt->fetch();
        return $result['total'];
    }

    
    public function insert($tableName, $data) {
        $keys = array_keys($data);
        $values = array_values($data);
        $sql = "INSERT INTO `" . $tableName . "` (`";
        $sql .= implode("`, `", $keys);
        $sql .= "`) VALUES ('";
        $sql .= implode("', '", $values);
        $sql .= "')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }
    public function dynamicInsertWithWhereArray($tableName, $data, $where = []) {
        $keys = array_keys($data);
        $values = array_values($data);
    
        $sql = "INSERT INTO `" . $tableName . "` (`";
        $sql .= implode("`, `", $keys);
        $sql .= "`) VALUES ('";
        $sql .= implode("', '", $values);
        $sql .= "')";
    
        if (!empty($where)) {
            $sql .= " WHERE ";
            foreach ($where as $key => $value) {
                $sql .= $key . " = '" . $value . "' AND ";
            }
            $sql = rtrim($sql, " AND ");
        }
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

    public function dynamicUpdate($tableName, $data, $where = null) {
        $sql = "UPDATE `" . $tableName . "` SET ";
        foreach ($data as $key => $value) {
            $sql .= "`" . $key . "` = '" . $value . "', ";
        }
        $sql = rtrim($sql, ", ");
    
        if ($where) {
            $sql .= " WHERE " . $where;
        }
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

    public function dynamicDelete($tableName, $where = null) {
        $sql = "DELETE FROM `" . $tableName . "`";
    
        if ($where) {
            $sql .= " WHERE " . $where;
        }
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

    public function dynamicDeleteWithPlaceholders($tableName, $where = []) {
        $sql = "DELETE FROM `" . $tableName . "`";
    
        if ($where) {
            $sql .= " WHERE ";
            foreach ($where as $key => $value) {
                $sql .= "`" . $key . "` = :" . $key . " AND ";
            }
            $sql = rtrim($sql, " AND ");
        }
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute($where);
    }

    public function dynamicSelect($tableName, $columns = [], $where = []) {
        $sql = "SELECT ";
    
        if ($columns) {
            foreach ($columns as $column) {
                $sql .= "`" . $column . "`, ";
            }
            $sql = rtrim($sql, ", ");
        } else {
            $sql .= "*";
        }
    
        $sql .= " FROM `" . $tableName . "`";
    
        if ($where) {
            $sql .= " WHERE ";
            foreach ($where as $key => $value) {
                $sql .= "`" . $key . "` = :" . $key . " AND ";
            }
            $sql = rtrim($sql, " AND ");
        }
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute($where);
        return $stmt->fetchAll();
    }

    public function dynamicSelectPagination($tableName, $columns = [], $where = [], $offset = 1, $perPage = 10) {

        $sql = "SELECT ";
    
        if ($columns) {
            foreach ($columns as $column) {
                $sql .= "`" . $column . "`, ";
            }
            $sql = rtrim($sql, ", ");
        } else {
            $sql .= "*";
        }
    
        $sql .= " FROM `" . $tableName . "`";
    
        if ($where) {
            $sql .= " WHERE ";
            foreach ($where as $key => $value) {
                $sql .= "`" . $key . "` = :" . $key . " AND ";
            }
            $sql = rtrim($sql, " AND ");
        }
    
        $sql .= " LIMIT " . (int)$offset . ", " . (int)$perPage;
    
        $stmt = $this->db->prepare($sql);
        
        $stmt->execute($where);
        return $stmt->fetchAll();
    }
    
    
    public function dynamicSelectSearch($tableName, $columns = [], $filters = [], $search = '', $searchColumns = [], $offset = 1, $perPage = 10)
    {
        $sql = "SELECT ";
        $sql .= $columns ? "`" . implode("`, `", $columns) . "`" : "*";
        $sql .= " FROM `" . $tableName . "`";
    
        $whereClauses = [];
        $params = [];
    
        // Add search conditions
        if (!empty($search) && !empty($searchColumns)) {
            $searchConditions = [];
            foreach ($searchColumns as $column) {
                $searchConditions[] = "`" . $column . "` LIKE :search";
            }
            $whereClauses[] = "(" . implode(" OR ", $searchConditions) . ")";
            $params['search'] = '%' . $search . '%';
        }
    
        // Add filters for category, minPrice, and maxPrice
        if (!empty($filters['subcategoryId'])) {
            $whereClauses[] = "`subcategoryId` = :subcategoryId";
            $params['subcategoryId'] = $filters['subcategoryId'];
        }
        if (!empty($filters['productPrice_min'])) {
            $whereClauses[] = "`productPrice` >= :minPrice";
            $params['minPrice'] = $filters['productPrice_min'];
        }
        if (!empty($filters['productPrice_max'])) {
            $whereClauses[] = "`productPrice` <= :maxPrice";
            $params['maxPrice'] = $filters['productPrice_max'];
        }
    
        // Combine all WHERE conditions
        if (!empty($whereClauses)) {
            $sql .= " WHERE " . implode(" AND ", $whereClauses);
        }
    
        $sql .= " LIMIT " . (int)$offset . ", " . (int)$perPage;
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
    
        return $stmt->fetchAll();
    }
    
    //

    public function dynamicSelectSearch0ld($tableName, $columns = [], $where = [], $search = '', $searchColumns = [], $offset = 1, $perPage = 10) {

        $sql = "SELECT ";
    
        if ($columns) {
            foreach ($columns as $column) {
                $sql .= "`" . $column . "`, ";
            }
            $sql = rtrim($sql, ", ");
        } else {
            $sql .= "*";
        }
    
        $sql .= " FROM `" . $tableName . "`";
    
        if ($where || $search) {
            $sql .= " WHERE ";
            if ($where) {
                foreach ($where as $key => $value) {
                    $sql .= "`" . $key . "` = :" . $key . " AND ";
                }
            }
            if ($search) {
                $sql .= " (";
                foreach ($searchColumns as $column) {
                    $sql .= "`" . $column . "` LIKE :search OR ";
                }
                $sql = rtrim($sql, " OR ");
                $sql .= ") AND ";
            }
            $sql = rtrim($sql, " AND ");
        }
    
        $sql .= " LIMIT " . (int)$offset . ", " . (int)$perPage;
    
        $stmt = $this->db->prepare($sql);
           
        $params = $where;
        if ($search) {
            $search = '%' . $search . '%';
            foreach ($searchColumns as $column) {
                $params['search'] = $search;
            }
        }
    
        $stmt->execute($params);

        return $stmt->fetchAll();
    }

    // $search = isset($_GET['search']) ? $_GET['search'] : '';
    // $searchColumns = ['first_name', 'last_name', 'email'];
    // $contacts = $contactModel->dynamicSelectSearch('contacts', [], [], $search, $searchColumns, $offset, $perPage);
    
    public function countAllSearch($tableName, $search, $searchColumns)
    {
        $query = "SELECT COUNT(*) as total FROM `" . $tableName . "` WHERE 1=1";
        $params = array();
    
        if (!empty($search) && !empty($searchColumns)) {
            $query .= " AND (";
            $first = true;
            foreach ($searchColumns as $column) {
                if ($first) {
                    $query .= "`$column` LIKE ?";
                    $first = false;
                } else {
                    $query .= " OR `$column` LIKE ?";
                }
                $params[] = "%$search%";
            }
            $query .= ")";
        }
    
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return isset($result['total']) ? $result['total'] : 0;
    }
    




    
    public function dynamicSelectJoin($tableName, $columns, $join = [], $where = []) {
        $sql = "SELECT " . implode(", ", $columns) . " FROM `" . $tableName . "`";
    
        if ($join) {
            foreach ($join as $j) {
                $sql .= " LEFT JOIN " . $j['table'] . " ON " . $j['on'];
            }
        }
    
        if ($where) {
            $sql .= " WHERE ";
            foreach ($where as $key => $value) {
                $sql .= "`" . $key . "` = :" . $key . " AND ";
            }
            $sql = rtrim($sql, " AND ");
        }
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute($where);
        return $stmt->fetchAll();
    }


    // $columns = [
    //     "collections.*",
    //     "users.username",
    // ];
    // $join = [
    //     [
    //         'table' => 'users',
    //         'on' => 'collections.collectionsCreatedBy = users.userUniqueId',
    //     ],
    // ];
    // $where = [
    //     'collections.id' => $_GET['id'],
    // ];
    // $data = $model->dynamicSelectJoin("collections", $columns, $join, $where);

        
    public function dynamicUpdateWithWhere($tableName, $data, $where = []) {
        $sql = "UPDATE `" . $tableName . "` SET ";
        $placeholders = [];
        
        foreach ($data as $key => $value) {
            $placeholders[] = "`" . $key . "` = :" . $key;
        }
        $sql .= implode(", ", $placeholders);
        
        if ($where) {
            $sql .= " WHERE ";
            $wherePlaceholders = [];
            
            foreach ($where as $key => $value) {
                $wherePlaceholders[] = "`" . $key . "` = :w_" . $key;
            }
            $sql .= implode(" AND ", $wherePlaceholders);
        }
        
        $stmt = $this->db->prepare($sql);
        
        foreach ($data as $key => $value) {
            $stmt->bindValue(":" . $key, $value);
        }
        
        foreach ($where as $key => $value) {
            $stmt->bindValue(":w_" . $key, $value);
        }
        
        $stmt->execute();
    }
    


// $data = [
//     'collectionsName' => $_POST['collectionsName'],
//     'collectionsURL' => $_POST['collectionsURL'],
//     'collectionsCategory' => $_POST['collectionsCategory'],
// ];
// $where = [
//     'collectionsIdentify' => $_GET['id'],
// ];
// $model->dynamicUpdate("collections", $data, $where);

    
}

