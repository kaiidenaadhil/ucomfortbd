<?php

class SchemaBuilder
{
    protected $table;
    protected $columns;

    public function createTable($tableName, $columns)
    {
        $this->table = $tableName;
        $this->columns = $columns;

        $sql = "CREATE TABLE $tableName (";

        foreach ($columns as $name => $rules) {
            $dataType = $this->getDataTypeFromRules($rules);
            $sql .= "`$name` $dataType";

            $additionalRules = $this->getAdditionalRules($rules, $name);
            $sql .= " $additionalRules";

            // check for foreign key
            if (strpos($rules, 'foreign') !== false) {
                $foreignKey = $this->getForeignKeyFromRules($rules, $name);
                $sql .= ", $foreignKey";
            }

            $sql .= ", ";
        }

        $sql = rtrim($sql, ', ');
        $sql .= ")";

        return $sql;
    }

    protected function getDataTypeFromRules($rules)
    {
        if (strpos($rules, 'integer') !== false) {
            return 'INT';
        } elseif (strpos($rules, 'string') !== false) {
            return 'VARCHAR(255)';
        } elseif (strpos($rules, 'text') !== false) {
            return 'TEXT';
        } elseif (strpos($rules, 'timestamp') !== false) {
            return 'TIMESTAMP';
        }
    }

    protected function getAdditionalRules($rules, $name)
    {
        $additionalRules = '';

        if (strpos($rules, 'primary_key') !== false) {
            $additionalRules .= 'PRIMARY KEY';
        }

        if (strpos($rules, 'unique') !== false) {
            $additionalRules .= ' UNIQUE';
        }

        if (strpos($rules, 'nullable') !== false) {
            $additionalRules .= ' NULL';
        } else {
            $additionalRules .= ' NOT NULL';
        }

        if (strpos($rules, 'auto_increment') !== false) {
            $additionalRules .= ' AUTO_INCREMENT';
        }

        // check for max length
        if (preg_match('/\bmax:([0-9]+)\b/', $rules, $matches)) {
            $additionalRules .= " CHECK (LENGTH($name) <= {$matches[1]})";
        }

        return $additionalRules;
    }

    protected function getForeignKeyFromRules($rules, $name)
    {
        if (preg_match('/\bforeign:([a-z_]+)\b/', $rules, $matches)) {
            $relatedTable = $matches[1];
            return "FOREIGN KEY ($name) REFERENCES $relatedTable($name)";
        }
    }
}
