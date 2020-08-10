<?php
session_start();
if( isset( $_POST[ 'order_submit' ] ) ){
    require "dbh.inc.php";

    //get user info
    $customer_name = $_POST[ 'cname' ];
    $customer_phone = $_POST[ 'cphone' ];
    $current_date = date("Y-m-d");
    $cheese_id = 0;
    $cheeseq = 0;
    $ham_id = 0;
    $hamq = 0;
    $veggie_id = 0;
    $veggieq = 0;
    
    //check if checkboxes were selected and get quantity
    if( isset( $_POST[ 'cheese' ] ) ){
        $cheese_id = 1;
        $cheeseq = $_POST[ 'cquantity' ];
    }  
    if( isset( $_POST[ 'ham' ] ) ){
        $ham_id = 2;
        $hamq = $_POST[ 'hquantity' ];
    }  
    if( isset( $_POST[ 'veggie' ] ) ){
        $veggie_id = 3;
        $veggieq = $_POST[ 'vquantity' ];
    } 
    if( $cheese_id == 0 && $ham_id == 0 && $veggie_id == 0 ){
       header( "Location: ../order.php?error=emptychoices" );
       exit();
    }

    //check if user info is blank
    if( empty( $customer_name ) || empty( $customer_phone ) ){
        header( "Location: ../order.php?error=emptyfields" );
        exit();
    } else{
        
        $sql = "INSERT INTO Orders VALUES( ?, ?, ?, ?, ? )";
        $stmt = mysqli_stmt_init( $conn );
        if( !mysqli_stmt_prepare( $stmt, $sql ) ){
            header( "Location: ../order.php?error=sqlerror" );
            exit();
        } else{
            $total = 0;
            if( $cheese_id != 0 ){
                mysqli_stmt_bind_param( $stmt, "ssisi", $customer_name, $customer_phone, $cheese_id, $current_date, $cheeseq );
                mysqli_stmt_execute( $stmt );

                if( $ham_id != 0 ){
                    mysqli_stmt_bind_param( $stmt, "ssisi", $customer_name, $customer_phone, $ham_id, $current_date, $hamq );
                    mysqli_stmt_execute( $stmt );

                    if( $veggie_id != 0 ){
                        mysqli_stmt_bind_param( $stmt, "ssisi", $customer_name, $customer_phone, $veggie_id, $current_date, $veggieq );
                        mysqli_stmt_execute( $stmt ); 
                        $total += ( $veggieq * 1 );
                    }

                    $total += ( $hamq * 1.29 );
                } else if( $veggie_id != 0 ){
                        mysqli_stmt_bind_param( $stmt, "ssisi", $customer_name, $customer_phone, $veggie_id, $current_date, $veggieq );
                        mysqli_stmt_execute( $stmt ); 
                        $total += ( $veggieq * 1 );
                }

                $total += ( $cheeseq * 1.59 );
            } else if( $ham_id != 0 ){
                mysqli_stmt_bind_param( $stmt, "ssisi", $customer_name, $customer_phone, $ham_id, $current_date, $hamq );
                mysqli_stmt_execute( $stmt );

                if( $veggie_id != 0 ){
                    mysqli_stmt_bind_param( $stmt, "ssisi", $customer_name, $customer_phone, $veggie_id, $current_date, $veggieq );
                    mysqli_stmt_execute( $stmt ); 
                    $total += ( $veggieq * 1 );
                }

                $total += ( $hamq * 1.29 );
            } else if( $veggie_id != 0 ){
                mysqli_stmt_bind_param( $stmt, "ssisi", $customer_name, $customer_phone, $veggie_id, $current_date, $veggieq );
                mysqli_stmt_execute( $stmt ); 
                $total += ( $veggieq * 1 );
            }

            header("Location: ../order.php?order=success&total=" . $total);
            exit();
        }
        mysqli_stmt_close( $stmt );
        mysqli_close( $conn );
    }
}else{
    header("Location: ../order.php?error:tryagain" );
    exit();
}