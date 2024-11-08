<?php

class BaseModel
{
    private $pdo;
    public function __construct()
    {
     $this->pdo = Database::getInstance()->getConnection();
    }

    /*
    List of Method and call:
    getAll() - Retrieve all records from a table.

    Creative idea: fetchAllRecords()
    getById() - Retrieve a record by its ID.

    Creative idea: findRecordById()
    create() - Insert a new record into a table.

    Creative idea: insertNewRecord()
    update() - Update an existing record.

    Creative idea: updateRecord()
    delete() - Delete a record by its ID.

    Creative idea: deleteRecordById()
    joinTables() - Perform a join operation between multiple tables.

    Creative idea: performTableJoin()
    executeQuery() - Execute a custom SQL query.

    Creative idea: runCustomQuery()
    countRecords() - Get the total count of records in a table.

    Creative idea: getRecordCount()
    paginate() - Retrieve paginated records.

    Creative idea: getPaginatedRecords()
    search() - Search for records based on specific criteria.

    Creative idea: findRecordsByCriteria()

    */

    public function joinTables($tables, $columns = [], $joins = [], $where = [])
    {
        $query = "SELECT " . (!empty($columns) ? implode(", ", $columns) : "*")
               . " FROM " . implode(", ", $tables);

        foreach ($joins as $join) {
            $query .= " " . $join;
        }

        if (!empty($where)) {
            $query .= " WHERE " . implode(" AND ", $where);
        }

        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }
}


// Define the tables to join
$tables = [
    "posts",
    "videos",
    "tags",
    "taggables"
];

// Define the columns to select
$columns = [
    "posts.id AS post_id",
    "posts.name AS post_name",
    "videos.id AS video_id",
    "videos.name AS video_name",
    "tags.id AS tag_id",
    "tags.name AS tag_name"
];

// Define the join clauses
$joins = [
    "JOIN taggables ON posts.id = taggables.taggable_id AND taggables.taggable_type = 'Post'",
    "JOIN videos ON videos.id = taggables.taggable_id AND taggables.taggable_type = 'Video'",
    "JOIN tags ON tags.id = taggables.tag_id",
];

// Define the conditions for the WHERE clause
$where = [
    "posts.published = 1",
    "videos.active = 1"
];

// Call the joinTables() method
$results = $model->joinTables($tables, $columns, $joins, $where);

// Process and display the result
foreach ($results as $row) {
    echo "Post ID: " . $row['post_id'] . ", Name: " . $row['post_name'] . "\n";
    echo "Video ID: " . $row['video_id'] . ", Name: " . $row['video_name'] . "\n";
    echo "Tag ID: " . $row['tag_id'] . ", Name: " . $row['tag_name'] . "\n";
    echo "----------------------\n";
}

// getById: Retrieves a record from a table based on its ID.
// getAll: Retrieves all records from a table.
// insert: Inserts a new record into a table.
// update: Updates an existing record in a table.
// delete: Deletes a record from a table.
// count: Retrieves the total count of records in a table.
// orderBy: Orders the retrieved records based on a column.
// limit: Limits the number of records returned.
// search: Performs a search operation based on given search criteria.
// join: Performs various types of joins between tables.
// paginate: Retrieves a specific number of records per page with pagination support.
// transaction: Performs a transaction for multiple database operations.
// validate: Validates the data before performing database operations.

// executeQuery: Executes a custom SQL query.
// insert: Inserts a new record into a table.
// update: Updates an existing record in a table.
// delete: Deletes a record from a table.
// getById: Retrieves a record from a table based on its ID.
// getAll: Retrieves all records from a table.
// count: Retrieves the total count of records in a table.
// findByColumn: Retrieves records from a table based on a specific column value.
// orderBy: Orders the retrieved records based on a column.
// limit: Limits the number of records returned.
// paginate: Retrieves a specific number of records per page with pagination support.
// search: Performs a search operation based on given search criteria.
// join: Performs various types of joins between tables.
// oneToOne: Retrieves related records using a one-to-one relationship.
// oneToMany: Retrieves related records using a one-to-many relationship.
// manyToMany: Retrieves related records using a many-to-many relationship.
// transaction: Performs a transaction for multiple database operations.
// validate: Validates the data before performing database operations.
// softDelete: Marks a record as deleted instead of actually deleting it from the table.
// restoreSoftDeleted: Restores a soft-deleted record.



// executeQuery: Executes a custom SQL query.
// insert: Inserts a new record into a table.
// update: Updates an existing record in a table.
// delete: Deletes a record from a table.
// getById: Retrieves a record from a table based on its ID.
// getAll: Retrieves all records from a table.
// count: Retrieves the total count of records in a table.
// findByColumn: Retrieves records from a table based on a specific column value.
// orderBy: Orders the retrieved records based on a column.
// limit: Limits the number of records returned.
// paginate: Retrieves a specific number of records per page with pagination support.
// search: Performs a search operation based on given search criteria.
// join: Performs various types of joins between tables.
// oneToOne: Retrieves related records using a one-to-one relationship.
// oneToMany: Retrieves related records using a one-to-many relationship.
// manyToMany: Retrieves related records using a many-to-many relationship.
// transaction: Performs a transaction for multiple database operations.
// validate: Validates the data before performing database operations.
// softDelete: Marks a record as deleted instead of actually deleting it from the table.
// restoreSoftDeleted: Restores a soft-deleted record.
// createTable: Creates a new table in the database.
// dropTable: Drops an existing table from the database.
// addColumn: Adds a new column to an existing table.
// modifyColumn: Modifies the structure of an existing column in a table.
// dropColumn: Drops a column from an existing table.
// addIndex: Adds an index to a table for better query performance.
// dropIndex: Drops an index from a table.
// addForeignKey: Adds a foreign key constraint to a table.
// dropForeignKey: Drops a foreign key constraint from a table.
// rawQuery: Executes a raw SQL query with parameter binding.
