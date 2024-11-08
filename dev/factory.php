<?php

function parseJsonToDataAndFields(string $json): array {
    $schema = json_decode($json, true);
    $rules = [];
    $searchColumns = [];

    foreach ($schema as $field => $ruleString) {
        $fieldData = null;
        $fieldRules = [];

        if (isset($_POST[$field])) {
            $fieldData = $_POST[$field];
        }

        $rulesArray = explode("|", $ruleString);

        foreach ($rulesArray as $rule) {
            $ruleParts = explode(":", $rule);
            $ruleName = $ruleParts[0];
            $ruleValue = null;

            if (count($ruleParts) > 1) {
                $ruleValue = $ruleParts[1];
            }

            if ($ruleName == "integer" || $ruleName == "string") {
                $fieldRules[] = "required";
            }

            if ($ruleName == "max" && $ruleValue !== null) {
                $fieldRules[] = "max:" . $ruleValue;
            }

            if ($ruleName == "min" && $ruleValue !== null) {
                $fieldRules[] = "min:" . $ruleValue;
            }
        }

        $rules[$field] = implode("|", $fieldRules);
        $searchColumns[] = $field;
    }

    return [$rules, $searchColumns];
}

function createController($subscriber,$printRules,$printColumns) {
    $smodel = singularize($subscriber);
    $code = "<?php\n";
    $code .= "class {$subscriber}Controller extends Controller\n";
    $code .= "{\n";
    $code .= "    public function {$subscriber}Index()\n";
    $code .= "    {\n";
    $code .= "        \$search = isset(\$_GET['search']) ? \$_GET['search'] : '';\n";
    $code .= "        \${$subscriber}Model = \$this->model('{$subscriber}Model');\n";
    $code .= "        \t\$searchColumns = {$printColumns};\n";
    $code .= "        \$totalRecords = \${$subscriber}Model->countAll(\$search, \$searchColumns);\n";
    $code .= "        \$page = isset(\$_GET['page']) ? (int)\$_GET['page'] : 1;\n";
    $code .= "        \$pagination = new Pagination(\$totalRecords, \$page, 10);\n";
    $code .= "        \$data = \${$subscriber}Model->displayAllSearch(\$search, \$searchColumns, \$pagination->getOffset(), \$pagination->getLimit());\n";
    $code .= "        \$params['{$subscriber}'] = \$data;\n";
    $code .= "        if (\$totalRecords > \$pagination->getLimit()) {\n";
    $code .= "            \$params['pagination'] =  \$pagination->render();\n";
    $code .= "        } else {\n";
    $code .= "            \$params['pagination'] = '';\n";
    $code .= "        }\n";
    $code .= "        \$this->adminView('{$subscriber}/{$subscriber}All', \$params);\n";
    $code .= "    }\n\n";
    //Display All
    $code .= "    public function {$subscriber}Display(Request \$request, \${$subscriber}Identify)\n";
    $code .= "    {\n";
    $code .= "        \${$subscriber}Model = \$this->model('{$subscriber}Model');\n";
    $code .= "        \$params['{$subscriber}'] =  \${$subscriber}Model->displaySingle(\${$subscriber}Identify);\n";
    $code .= "        \$this->adminView('{$subscriber}/{$subscriber}Single', \$params);\n";
    $code .= "    }\n\n";

    // Destroy Record
    // $code .= "    public function {$subscriber}Destroy(Request \$request, \${$subscriber}Identify)\n";
    // $code .= "    {\n";
    // $code .= "        \${$subscriber}Model = \$this->model('{$subscriber}Model');\n";
    // $code .= "        \${$subscriber}Model->erase(\${$subscriber}Identify);\n";
    // $code .= "        echo \"success\";\n";
    // $code .= "    }\n\n";
// Destroy Record
$code .= "    public function {$subscriber}Destroy(Request \$request, \${$subscriber}Identify)\n";
$code .= "    {\n";
$code .= "        \${$subscriber}Model = \$this->model('{$subscriber}Model');\n";
$code .= "        \${$subscriber}Model->erase(\${$subscriber}Identify);\n";
$code .= "            // success delete and redirect\n";
$code .= "            header(\"Location: /admin/{$subscriber}/\");\n";
$code .= "            \$_SESSION['success_message'] = \"Delete successful!\";\n";
$code .= "            exit;\n";

$code .= "    }\n\n";

    // build or Add a Record
    $code .= "    public function {$subscriber}build()\n";
    $code .= "    {\n";
    $code .= "        \$this->adminView('{$subscriber}/{$subscriber}New');\n";
    $code .= "    }\n\n";

// Process a adding record
    $code .= "    public function {$subscriber}Record(Request \$request)\n";
    $code .= "    {\n";
    $code .= "        \${$subscriber}Model = \$this->model('{$subscriber}Model');\n";
    $code .= "        \$data = \$request->getBody();\n";

    $code .= "        \$data['{$smodel}Updated'] = date('Y-m-d H:i:s');\n";
    $code .= "        \$data['{$smodel}Identify'] = generateUniqueId(16);\n";

     $code .= "        \t\$rules = {$printRules};\n";
    $code .= "        \$validator = new Validator();\n";
    $code .= "        \$validator->validate(\$rules);\n";
    $code .= "        if (\$validator->fails()) {\n";
    $code .= "            \$errors = \$validator->errors();\n";
    $code .= "            foreach (\$errors as \$error) {\n";
    $code .= "                echo \$error . \"</br>\";\n";
    $code .= "            }\n";
    $code .= "        } else {\n";
    $code .= "            \${$subscriber}Model->record(\$data);\n";
    $code .= "            // success adding and redirect\n";
    $code .= "            header(\"Location: /admin/{$subscriber}/\");\n";
    $code .= "            \$_SESSION['success_message'] = \"Added successful!\";\n";
    $code .= "            exit;\n";

    $code .= "        }\n";
    $code .= "    }\n\n";

// Updating Record
    $code .= "    public function {$subscriber}Modify(Request \$request,\${$subscriber}Identify)\n";
    $code .= "    {\n";
    $code .= "        \${$subscriber}Model = \$this->model('{$subscriber}Model');\n";
    $code .= "        \$params['{$smodel}Identify'] = \${$subscriber}Identify;\n";
    $code .= "        \$params['{$subscriber}'] =  \${$subscriber}Model->displaySingle(\${$subscriber}Identify);\n";
    $code .= "        \$this->adminView('{$subscriber}/{$subscriber}Edit', \$params);\n";
    $code .= "    }\n\n";

    // Edit Record.
    $code .= "    public function {$subscriber}Edit(Request \$request, \${$subscriber}Identify)\n";
    $code .= "    {\n";
    $code .= "        \${$subscriber}Model = \$this->model('{$subscriber}Model');\n";
    $code .= "        \$data = \$request->getBody();\n";
    $code .= "        \t\$rules = {$printRules};\n";
    $code .= "        \$validator = new Validator();\n\n";
    $code .= "        if (\$validator->fails(\$rules)) {\n";
    $code .= "            \$errors = \$validator->errors();\n";
    $code .= "            foreach (\$errors as \$error) {\n";
    $code .= "                echo \$error . \"</br>\";\n";
    $code .= "            }\n";
    $code .= "        } else {\n";
    $code .= "            \${$subscriber}Model->update(\$data, \${$subscriber}Identify);\n";
    $code .= "            // success updated and redirect\n";
    $code .= "            header(\"Location: /admin/{$subscriber}/\");\n";
    $code .= "            \$_SESSION['success_message'] = \"Update successful!\";\n";
    $code .= "            exit;\n";
    $code .= "        }\n";
    $code .= "    }\n";
    $code .= "}\n";

    file_put_contents("./../app/controllers/".ucfirst($subscriber).'Controller.php', $code);
    
    }




     function createModel($model,$printColumns)
    {
        $smodel = singularize($model);

        $code = "<?php\n";
        $code .= "class {$model}Model extends Model\n";
        $code .= "{\n\n";

        $code .= "\tpublic function record(\$data = [])\n";
        $code .= "\t{\n";
        $code .= "\t\t\$this->insert(\"{$model}\", \$data);\n";
        $code .= "\t}\n\n";

        $code .= "\tpublic function countAll(\$search, \$searchColumns)\n";
        $code .= "\t{\n";


        $code .= "\t\treturn \$this->countAllSearch(\"{$model}\", \$search, \$searchColumns);\n";
        $code .= "\t}\n\n";


        $code .= "\tpublic function displayAll(\$offset = null, \$limit = null)\n";
        $code .= "\t{\n";
        $code .= "           \t\t\$columns = {$printColumns};\n";
        $code .= "\t\treturn \$this->dynamicSelectPagination(\"{$model}\", \$columns, [], \$offset, \$limit);\n";
        $code .= "\t}\n\n";


        $code .= "\tpublic function displayAllSearch(\$search, \$searchColumns, \$offset = null, \$limit = null)\n";
        $code .= "\t{\n";
        $code .= "\t\$columns = {$printColumns};\n";
        $code .= "\t\treturn \$this->dynamicSelectSearch(\"{$model}\", \$columns, [], \$search, \$searchColumns, \$offset, \$limit);\n";
        $code .= "\t}\n\n";


        $code .= "\tpublic function displaySingle(\$id)\n";
        $code .= "\t{\n";
        $code .= "\t\t\$columns = {$printColumns};\n";
        $code .= "\t\treturn \$this->dynamicSelect(\"{$model}\", \$columns, [\"{$smodel}Identify\" => \$id]);\n";
        $code .= "\t}\n\n";


        $code .= "\tpublic function update(\$data, \$id)\n";
        $code .= "\t{\n";
        $code .= "\t\treturn \$this->dynamicUpdateWithWhere(\"{$model}\", \$data, [\"{$smodel}Identify\" => \$id]);\n";
        $code .= "\t}\n\n";


        $code .= "\tpublic function erase(\$id)\n";
        $code .= "\t{\n";
        $code .= "\t\treturn \$this->dynamicDeleteWithPlaceholders(\"{$model}\", [\"{$smodel}Identify\" => \$id]);\n";
        $code .= "\t}\n";
        $code .= "}\n";
        
        file_put_contents("./../app/models/" . $model . 'Model.php', $code);
    }



    

    
