<?php
if( isset( $_POST[ 'delete_order' ] ) ){
    require "dbh.inc.php";
    
    //get customer name and phone number
    $cname = $_POST[ 'cname' ];
    $cphone = $_POST[ 'cphone' ];

    $sql = "DELETE FROM Orders WHERE customerName=? AND customerPhone=?";
    $stmt = mysqli_stmt_init( $conn );
    if( !mysqli_stmt_prepare( $stmt, $sql ) ){
        header("Location: ../view.php?error=sqlerror" );
        exit();
    }else{
        mysqli_stmt_bind_param( $stmt, "ss", $cname, $cphone );
        mysqli_stmt_execute( $stmt );
        header("Location: ../view.php?delete=success" );
        exit();
    }
} else{
    header("Location: ../view.php" );
    exit();
}

