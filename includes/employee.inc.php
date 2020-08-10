<?php

if( isset( $_POST['employee_submit'])){
    require "dbh.inc.php";

    //get employee info
    $name = $_POST[ 'name' ];
    $password = $_POST[ 'password' ];

    //check empty fields
    if( empty( $name ) || empty( $password ) ){
        header("Location: ../employee.php?error=emptyfields" );
        exit();
    }else{
        $sql = "SELECT employeeId FROM Employee WHERE firstName=? AND phoneNumber=?";
        $stmt = mysqli_stmt_init( $conn );
        if( !mysqli_stmt_prepare( $stmt, $sql ) ){
            header("Location: ../employee.php?error=sqlerror"); 
            exit();
        }else{
            mysqli_stmt_bind_param( $stmt, "ss", $name, $password );
            mysqli_stmt_execute( $stmt );
            mysqli_stmt_store_result( $stmt ); //gets result from database
            //how many results in stmt
            $resultCheck = mysqli_stmt_num_rows( $stmt );
            if( $resultCheck == 0 ){
                //wrong name or phone number
                header("Location: ../employee.php?error=invalidinputs" ); 
                exit();
            }else{
                header("Location: ../view.php" );
                exit();
            }
        }
    }

}else{
    header("Location: ../employee.php" );
    exit();
}