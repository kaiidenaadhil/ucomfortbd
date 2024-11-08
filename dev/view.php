<?php
$_ENV = parse_ini_file('./../app/local.env', false, INI_SCANNER_RAW);
define("APP_NAME",$_ENV["APP_NAME"]);
define("THEME",$_ENV["THEME"]);
define('DB_TYPE',$_ENV["DB_CONNECTION"]);
define('DB_HOST',$_ENV["DB_HOST"]);
define('DB_NAME',$_ENV["DB_DATABASE"]);
define('DB_USER',$_ENV["DB_USERNAME"]);
define('DB_PASS',$_ENV["DB_PASSWORD"]);

function createView($dirname,$tableSchema,$searchColumns){
    // create the directory if it doesn't exist
    if (!file_exists("../app/views/".THEME."/$dirname")) {
        mkdir("../app/views/".THEME."/$dirname", 0777, true);
    }else
    {
        echo "File exist";
    }

    // New View
    $file1 = fopen("../app/views/".THEME."/$dirname/$dirname"."New.php", 'w');
    $codeNew = generateForm($tableSchema, $dirname);
    fwrite($file1,$codeNew);
    fclose($file1);

    // All View
    $file2 = fopen("../app/views/".THEME."/$dirname/$dirname"."All.php", 'w');
    $codeAll = generateTableAll($searchColumns, $dirname);
    fwrite($file2,$codeAll);
    fclose($file2);

    // Single View

    $file3 = fopen("../app/views/".THEME."/$dirname/$dirname"."Single.php", 'w');
    $codeSingle = generateTable($searchColumns, $dirname);
    fwrite($file3, $codeSingle);
    fclose($file3);

    //Edit View

    $file4 = fopen("../app/views/".THEME."/$dirname/$dirname"."Edit.php", 'w');
    $codeEdit = generateEditForm($tableSchema, $dirname);
    fwrite($file4, $codeEdit);
    fclose($file4);

    echo "Files created  in views/ '$dirname'.";
}


/// Update Form.
function generateEditForm($tableSchema, $model) {
    $tableSchema = removeThree($tableSchema);
    $html = '  <div class="data-table">'."\n";

    $html .= '  <div class="table-container">'."\n";
    $html .= '  <h2> Edit  '.$model.' </h2>'."\n";
    $html .= '<?php foreach ($params["'.$model.'"] as $key => $'.$model.') : ?>'."\n";
    $html .= '  <form method="post" action="<?= ROOT ?>/admin/' . $model . '/<?= $'.$model.'[\'' . singularize($model) . 'Identify\'] ?>/modify">'."\n";


    foreach ($tableSchema as $columnName => $columnType) {
        $inputType = '';
        if (strpos($columnType, 'integer') !== false) {
            $inputType = 'number';
        } elseif (strpos($columnType, 'string') !== false) {
            $inputType = 'text';
        } elseif (strpos($columnType, 'text') !== false) {
            $inputType = 'textarea';
        } elseif (strpos($columnType, 'timestamp') !== false) {
            $inputType = 'datetime-local';
        }
        $html .= '  <div>'."\n";
        $html .= '    <label for="'.$columnName.'">'.camelCaseToSentence($columnName).'</label>'."\n";
        if ($inputType == 'textarea') {
            $html .= '    <textarea name="'.$columnName.'"><?= $model["'.$columnName.'"] ?></textarea><div>'."\n";
        } else {
            $html .= '    <input type="'.$inputType.'" name="'.$columnName.'" value="<?= $'.$model.'["'.$columnName.'"] ?>">'."\n";
            $html .= '  </div>'."\n";
        }
    }
    $html .= '  <div><aside class="row">'."\n";
    $html .= '    <input type="submit" value="Update" class="save-btn">'."\n";
    $html .=' <a href="<?= ROOT ?>/admin/'.$model.'" class="cancel-btn">back</a>' . "\n";

    $html .= '   </aside></div>'."\n";
    $html .= '  </form>'."\n";
    $html .= "<?php endforeach; ?>\n";
    $html .= '  </div>'."\n";
    $html .= '  </div>'."\n";
    return $html;
}



// Add a new record
function generateForm($tableSchema, $model){
    $tableSchema = removeThree($tableSchema);
    $html = '  <div class="data-table">'."\n";
    $html .= '    <div class="data-info">'."\n";
    $html .= '      <h3>Add a '.$model.'</h3> <a href="<?= ROOT ?>/admin/'.$model.'" class="gradient-btn">Back</a>'."\n";
    $html .= '    </div>'."\n";
    $html .= '    <div class="table-container">'."\n";
    $html .= '      <form method="post">'."\n";
    
    
    foreach ($tableSchema as $columnName => $columnType) {
        $inputType = '';
        if (strpos($columnType, 'integer') !== false) {
            $inputType = 'number';
        } elseif (strpos($columnType, 'string') !== false) {
            $inputType = 'text';
        } elseif (strpos($columnType, 'text') !== false) {
            $inputType = 'textarea';
        } elseif (strpos($columnType, 'timestamp') !== false) {
            $inputType = 'datetime-local';
        }
        
        $html .= '        <div>'."\n";
        $html .= '          <label for="'.$columnName.'">'.camelCaseToSentence($columnName).'</label>'."\n";
        
        if ($inputType == 'textarea') {
            $html .= '          <textarea name="'.$columnName.'"></textarea>'."\n";
        } else {
            $html .= '          <input type="'.$inputType.'" name="'.$columnName.'">'."\n";
        }
        
        $html .= '        </div>'."\n";
    }
    
    $html .= '        <div>'."\n";
    $html .= '          <aside class="row">'."\n";
    $html .= '            <input type="submit" value="Save" class="save-btn" style="width:100%;margin:1rem;">'."\n";
    $html .= '            <a href="<?= ROOT ?>/admin/'.$model.'/" class="cancel-btn">Cancel</a>'."\n";
    $html .= '          </aside>'."\n";
    $html .= '        </div>'."\n";
    
    $html .= '      </form>'."\n";
    $html .= '    </div>'."\n";
    $html .= '  </div>'."\n";
    
    return $html;
}


  function generateTableAll($searchColumns, $model) {
    $searchColumns = removeThree($searchColumns);

    //search button
    $table = '<div class="search-container">'."\n";
    $table .= '<form class="search-form" action="<?= ROOT ?>/admin/'.$model.'/" method="get">'."\n";
    $table .= '<input type="text" name="search" placeholder="Search">'."\n";
    $table .= '<button type="submit" class="gradient-btn">Search</button>'."\n"; // Changed type to "submit"
    $table .= '</form>'."\n";
    $table .= '</div>'."\n";   


    $table .= '<div class="data-info">'."\n";
    $table .= '<?php if (isset($_SESSION[\'success_message\'])): ?>'."\n";
    $table .= '<p><?= $_SESSION[\'success_message\'] ?></p>'."\n";
    $table .= '<?php unset($_SESSION[\'success_message\']); ?>'."\n";
    $table .= '<?php endif; ?>'."\n";
    $table .= '</div>'."\n";
    


    $table .= '<div class="data-info">'."\n";
    $table .= '<h3>'.camelCaseToSentence($model).' List</h3> <a href="<?= ROOT ?>/admin/'.$model.'/build" class="gradient-btn">add New '.$model.'</a>'."\n";
    $table .= '</div>'."\n";

    $table .= '<div class="data-table">'."\n";
    $table .= '<div class="table-container">'."\n";
    $table .= '<?php if (count($params[\''.$model.'\']) > 0): ?>' . "\n";

    $table .= '<table>' . "\n";
    $table .= '<thead>' . "\n";
    $table .= '<tr>' . "\n";
    $table .= '<th>#</th>' . "\n";

    // Generate table header and loop code for each column
    foreach ($searchColumns as $column) {
        $table .= '<th>' . camelCaseToSentence($column) . '</th>' . "\n";
    }

    $table .= '<th>Actions</th>' . "\n";
    $table .= '</tr>' . "\n";
    $table .= '</thead>' . "\n";
    $table .= '<tbody>' . "\n";
    $table .= '<?php foreach($params[\''.$model.'\'] as $key => $'.$model.'): ?>' . "\n";
    $table .= '<tr>' . "\n";
    $table .= '<td><?= $key + 1 ?></td>' . "\n";
    $table .= generateTableLoops($searchColumns,$model);
    // action
    $table .= '<td>' . "\n";
    $table .= '<a href="<?= ROOT ?>/admin/' . $model . '/<?= $'.$model.'[\'' . singularize($model) . 'Identify\'] ?>">Show</a>' . "\n";
    $table .= '<a href="<?= ROOT ?>/admin/' . $model . '/<?= $'.$model.'[\'' . singularize($model) . 'Identify\'] ?>/modify">Edit</a>' . "\n";
    $table .= '<a href="<?= ROOT ?>/admin/' . $model . '/<?= $'.$model.'[\'' . singularize($model) . 'Identify\'] ?>/destroy">Delete</a>' . "\n";
    $table .= '</td>' . "\n";
    $table .= '</tr>' . "\n";
    $table .= '<?php endforeach; ?>' . "\n";
    $table .= '</tbody>' . "\n";
    $table .= '</table>' . "\n";
    
    // Close table body and return table
    $table .= '</div>' . "\n";
    $table .= '</div>' . "\n";

    $table .= '<div class="pagination-container">' . "\n";
    $table .= '<?= $params["pagination"] ?>' . "\n";
    $table .= '</div>' . "\n";

    $table .= '<?php else: ?>' . "\n";
    $table .= '<p>No Record to Display.</p>' . "\n";
    $table .= '<a href="<?= ROOT ?>/admin/'.$model.'/build">Add a Record.</a>' . "\n";
    $table .= '<?php endif; ?>' . "\n";
    $table .= '</div>' . "\n";

    return $table;
}



  function generateTable($searchColumns, $model) {

    $table = '  <div class="data-table">'."\n";
    $table .= '  <div class="table-container">'."\n";
    $table .= '  <h2> Display '.$model.' </h2>'."\n";
   $table .= '<table>' . "\n";
    $table .= '  <thead>' . "\n";
    $table .= '    <tr>' . "\n";
    $table .= '      <th>#</th>' . "\n";
    
    // Generate table header and loop code for each column
    foreach ($searchColumns as $column) {
      $table .= '      <th>'.camelCaseToSentence($column). '</th>' . "\n";
    }
    $table .= '    </tr>' . "\n";
    $table .= '  </thead>' . "\n";
    $table .= '  <tbody>' . "\n";
    $table .= '<?php foreach($params[\''.$model.'\'] as $key => $'.$model.'): ?>' . "\n";
    $table .= '    <tr>' . "\n";
    $table .= '      <td><?= $key + 1 ?></td>' . "\n";
    $table .= generateTableLoops($searchColumns,$model);
    $table .= '    </tr>' . "\n";
    $table .= '<?php endforeach; ?>' . "\n";
    

 
 


    $table .= '  </tbody>' . "\n";
    $table .= '</table>' . "\n";
    
    // Close table body and return table
    $table .= '</tbody>'. "\n";
    $table .= '</table>'. "\n";
    $table .=' <div><aside class="row"><a href="<?= ROOT ?>/admin/'.$model.'" class="cancel-btn">back</a></aside> </div>' . "\n";
   
    
    $table .= '</div>'."\n";
    $table .= '</div>'."\n";

    return $table;
  }
  
  function generateTableLoops($columns,$model) {

    // Initialize loop string
    $loopString = '';
    
    // Generate loop code for each column
    foreach ($columns as $column) {
      $loopString .= '<td><?= $'.$model.'[\''.$column.'\'] ?></td>' . "\n";
    }
    
    // Return loop string
    return $loopString;
  }
  
  

?>
