<?php
class InstallController extends Controller{

    public function index(Request $request){
        if($request->isPost()){
                //Connection details
                  $host = trim($_POST['host']);
                  $user = trim($_POST['user']);
                  $password = trim($_POST['pass']);
                  $dbName = trim($_POST['db']);

                    //write dot env file
                    $myfile = fopen("../app/.env", "w") or die("Unable to open file!");
                    $txt = "APP_NAME=Rapidrevert"."\n";
                    $txt .= "DB_CONNECTION=mysql"."\n";
                    $txt .= "DB_HOST=".$host."\n";
                    $txt .= "DB_DATABASE=".$dbName."\n";
                    $txt .= "DB_USERNAME=".$user."\n";
                    $txt .= "DB_PASSWORD=".$password."\n";
                    fwrite($myfile,$txt);
                    fclose($myfile);


                    $pdo = new PDO('mysql:host='.$host, $user, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $sql = "CREATE DATABASE ".$dbName;
                    $pdo->exec($sql);
                    echo "Database created successfully";

                    $pdo = new PDO('mysql:host='.$host.';dbname='.$dbName, $user, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    
                // Get submitted SQL file
                $sqlFile = $_FILES['sqlfile']['name'];

                // Read in the sql file
                if(!empty($sqlFile)){
                    $query = file_get_contents($_FILES['sqlfile']['tmp_name']);
                }else{
                    $query = file_get_contents('../app/database.sql');
                }
                
                // Execute the query product
                try
                {
                    $pdo->exec($query);
                    echo 'SQL file successfully installed';
                }
                catch (PDOException $e) 
                {
                    echo "Installation failed: " . $e->getMessage();
                }
            
        }
        else{
            $params = [
                'name' => "Install App with Database"
            ];
            $this->view('install' , $params);
        }

    }
    public function export(){
        $pdo = Database::getInstance()->getConnection();
        //p($pdo);
        $result = $pdo->query('SHOW TABLES');
        $tables = $result->fetchAll(PDO::FETCH_COLUMN);
        $sql_dump = '';
        foreach($tables as $table) {
            $sql_dump .= "--\n";
            $sql_dump .= "-- Table structure for table `$table`\n";
            $sql_dump .= "--\n\n";

            // Generate the DROP TABLE statement
            $sql_dump .= "DROP TABLE IF EXISTS `$table`;\n";

            // Generate the CREATE TABLE statement
            $create_stmt = $pdo->query("SHOW CREATE TABLE `$table`");
            $create = $create_stmt->fetch(PDO::FETCH_NUM);

            $sql_dump .= $create[1] . ";\n\n";

            // Generate the data to be inserted
            $sql_dump .= "--\n";
            $sql_dump .= "-- Dumping data for table `$table`\n";
            $sql_dump .= "--\n\n";

            $result = $pdo->query("SELECT * FROM `$table`");

            $rows = $result->fetchAll(PDO::FETCH_NUM);

            foreach($rows as $row) {
                $sql_dump .= "INSERT INTO `$table` VALUES (";

                $num_values = count($row);
                $i = 1;

                foreach($row as $value) {
                    $sql_dump .= '"' . addslashes($value) . '"';

                    if ($i < $num_values) {
                        $sql_dump .= ', ';
                    }
                    $i++;
                }

                $sql_dump .= ");\n";
            }

            $sql_dump .= "\n";
        }


        if(file_put_contents('../app/database_dump.sql', $sql_dump)){
            echo "You have successfully exported dump_database in your directory ! ";
        }
    }
}