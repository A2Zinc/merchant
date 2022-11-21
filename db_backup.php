<?php

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    //ENTER THE RELEVANT INFO BELOW
    $mysqlUserName      = "root";
    $mysqlPassword      = "lwt@123#";
    $mysqlHostName      = "localhost";
    $DbName             = "lwtPOS";
    $backup_name        = 'db-backup-'.date("Y-m-d H-i-s").'.sql';
    $tables             = "*";
    exit;
    Export_Database($mysqlHostName,$mysqlUserName,$mysqlPassword,$DbName,  $tables=false, $backup_name);

    function Export_Database($host,$user,$pass,$name,  $tables=false, $backup_name=false )
    {
        $mysqli = new mysqli($host,$user,$pass,$name); 
        $mysqli->select_db($name); 
        $mysqli->query("SET NAMES 'utf8'");

        $queryTables    = $mysqli->query('SHOW TABLES');

        // check first if there's an error in your query
        if ($mysqli->error) {
            die($mysqli->error);
        }

        while($row = $queryTables->fetch_row()) 
        { 
            $target_tables[] = $row[0]; 
        }

        if($tables !== false) 
        { 
            $target_tables = array_intersect( $target_tables, $tables); 
        }

        foreach($target_tables as $table)
        {
            $result         =   $mysqli->query('SELECT * FROM `'.$table.'`');

            if (!$result) {
                die($mysqli->error);
            }

            $fields_amount  =   $result->field_count;  
            $rows_num=$mysqli->affected_rows;     
            $res            =   $mysqli->query('SHOW CREATE TABLE `'.$table.'`');
            $TableMLine     =   $res->fetch_row();

            $content        = (!isset($content) ?  '' : $content) . "\n\n".$TableMLine[1].";\n\n";

            for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0) 
            {
                while($row = $result->fetch_row())  
                { //when started (and every after 100 command cycle):
                    if ($st_counter%100 == 0 || $st_counter == 0 )  
                    {
                            $content .= "\nINSERT INTO `".$table."` VALUES";
                    }
                    $content .= "\n(";
                    for($j=0; $j<$fields_amount; $j++)  
                    { 
                        $row[$j] = str_replace("\n","\\n", addslashes($row[$j]) ); 
                        if (isset($row[$j]))
                        {
                            $content .= '"'.$row[$j].'"' ; 
                        }
                        else 
                        {   
                            $content .= '""';
                        }     
                        if ($j<($fields_amount-1))
                        {
                                $content.= ',';
                        }      
                    }
                    $content .=")";
                    //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                    if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num) 
                    {   
                        $content .= ";";
                    } 
                    else 
                    {
                        $content .= ",";
                    } 
                    $st_counter=$st_counter+1;
                }
            } $content .="\n\n\n";
        }

        $backup_name = $backup_name ? $backup_name : $name.".sql";

        $handle = fopen("db_backup/".$backup_name,'w+');
        fwrite($handle,$content);
        if(fclose($handle)) {
            echo "Done, the file name is: db_backup/".$backup_name;
            exit; 
        }
    }
?>