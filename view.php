<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <title>Simple Eats</title>
        <link rel="stylesheet" href="styles/home.css?<?php echo time(); ?>">
        <link rel="icon" type="image/png" href="img/favicon.png">
</head>
<body>
    <h1>View</h1>
    <form action="includes/logout.inc.php" method="post">
        <button type="submit" name="logout_submit">Logout</button>
    </form>
    <?php 
    //get all customers
    require "includes/dbh.inc.php";
    $sql = "SELECT DISTINCT customerName, customerPhone FROM Orders WHERE orderDate=?";
    $stmt = mysqli_stmt_init( $conn );
    if( !mysqli_stmt_prepare( $stmt, $sql ) ){
        header("Location: ../view.php?error=sqlerror");
        exit();
    }else{
        mysqli_stmt_bind_param( $stmt, "s", date("Y-m-d") );
        mysqli_stmt_execute( $stmt );
        $result = mysqli_stmt_get_result( $stmt );
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM))
        {
            echo "<form action='includes/delete.inc.php' method='post'>";
            echo "<p><b>" . $row[ 0 ] . " " . $row[ 1 ] . "</b></p>";
            echo "<input type='hidden' name='cname' value='" . $row[ 0 ] . "'>";
            echo "<input type='hidden' name='cphone' value='" . $row[ 1 ] . "'>";
            echo "<button type='submit' name='delete_order'>Delete</button>";

            $sql2 = "SELECT f.foodName, o.orderQuantity, o.foodId FROM Orders AS o INNER JOIN Food AS f ON o.foodId=f.foodId WHERE o.customerName=? AND o.customerPhone=?";
            $stmt2 = mysqli_stmt_init( $conn );
            if( !mysqli_stmt_prepare($stmt2, $sql2 ) ){
                header("Location: ../view.php?error=sqlerror" );
                exit();
            }else{
                mysqli_stmt_bind_param( $stmt2, "ss", $row[ 0 ], $row[ 1 ] );
                mysqli_stmt_execute( $stmt2 );
                $result2 = mysqli_stmt_get_result( $stmt2 );
                $total = 0;
                while( $row2 = mysqli_fetch_array( $result2, MYSQLI_NUM ) ){
                    if( $row2[ 2 ] == 1 ){
                        $quant = $row2[ 1 ] * 1.59;
                        $total += $quant;
                    } else if( $row2[ 2 ] == 2 ){
                        $quant = $row2[ 1 ] * 1.29;
                        $total += $quant;
                    } else if( $row2 [ 2 ] == 3 ){
                        $quant = $row2[ 1 ] * 1;
                        $total += $quant;
                    }
                    echo "<p class='tab'>Item: " . $row2[ 0 ] . " Quantity: " . $row2[ 1 ] . "</p>";
                }
                echo "<p class='tab'><i>Total: $" . $total . "</i></p>";

            }
            echo "</form>";
            mysqli_stmt_close($stmt2);

        }
    }
    mysqli_stmt_close( $stmt );
    mysqli_close( $conn );

    ?>

</body>

<?php
    require "footer.php";
?>