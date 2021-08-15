<?php
require_once(CONFIG);
//require_once('../Core/conf.php');
class Department{
    function create_department(){
        //
    }

    function update_department(){
        //
    }

    //fetch all departments
    function fetch_departments(){
        $fetch_departments  = "
            SELECT d.id,
                d.name,
                d.description,
                b.country AS `branch`,
                (SELECT Count(id)
                    FROM   ticket
                    WHERE  status = 'open'
                        AND `department` = d.id) AS `open`,
                (SELECT Count(id)
                    FROM   ticket
                    WHERE  status = 'active'
                        AND `department` = d.id) AS `active`,
                (SELECT Count(id)
                    FROM   ticket
                    WHERE  status = 'closed'
                        AND `department` = d.id) AS `closed`
            FROM   department d,
                branch b
            WHERE  b.id = d.branch ";
        $fetch_departments  = mysqli_query(conn(), $fetch_departments);
        $departments    = mysqli_fetch_all($fetch_departments, MYSQLI_ASSOC);

        return $departments;
    }

    //fetch relevant department for a client
    function client_department(){
        $client_department = "SELECT id, name FROM department";
        $client_department = mysqli_query(conn(), $client_department);

        while($row = mysqli_fetch_assoc($client_department)){
            $rows[$row['id']] = $row['name'];
        }

        return $rows;
    }

    //fetch all department relevant to the branch
    function branch_department(){
        //
    }

    //fetch specific department
    function specific_department($id){
        $specific_department = "SELECT name FROM department WHERE id='$id'";
        $specific_department = mysqli_query(conn(), $specific_department);
        $department = mysqli_fetch_assoc($specific_department);

        return $department['name'];
    }
}

$department = new Department;

//print_r($client_department);
//var_dump($department->client_department());
?>