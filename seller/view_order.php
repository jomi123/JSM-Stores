<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <title>View Orders</title>

    <style>
        #tab {
            position: absolute;
            margin: 20px;
            left: 50%;
            top: 10%;
            transform: translate(-50%, 0%);
        }
    </style>
</head>

<body>

<?php

include_once "../shared/connect.php";
include 'menu.php';

$sid = $_SESSION['sid'];

$sql = "
select * from orders
join products on 
products.pid=orders.pid and products.sid=$sid 
join buyer 
on 
orders.userid=buyer.userid"
;

//select count(orders.pid) from orders
    // join products on 
    // products.pid=orders.pid and products.sid=13
    // join buyer 
    // on 
    // orders.userid=buyer.userid where username='Manju' GROUP BY orders.pid;


$exec = mysqli_query($conn, $sql);

echo "<br>";

if ($exec->num_rows == 0) {
    echo "
    <h3 style='color:cadetblue;text-align:center;'>No Orders for You</h3>
    ";
} else {
    echo "<table class='table w-50' id='tab'>
        <th>
        <tr class='border'>
            <td class='border' style='color:cadetblue;font-weight:bold;'>OrderId</td>
            <td class='border' style='color:cadetblue;font-weight:bold;'>ProductId</td>
            <td class='border' style='color:cadetblue;font-weight:bold;'>Product</td>
            <td class='border' style='color:cadetblue;font-weight:bold;'>User</td>
            <td class='border' style='color:cadetblue;font-weight:bold;'>Address</td>
            
        </tr>
        </th>";

    // $sql2 = "select count(pid) from orders where orders.pid in(select orders.pid from orders join products on products.pid=orders.pid and products.sid=$sid join buyer on orders.userid=buyer.userid group by orders.pid having count(*)>1)";
    // $exec2 = mysqli_query($conn, $sql2);
    // $row2 = mysqli_fetch_assoc($exec2);

    // $count = 0;

    while ($row = mysqli_fetch_assoc($exec)) {
            $orderid = $row['orderid'];
            $pid = $row['pid'];
            $userid = $row['userid'];
            $address = $row['address'];

            $pname = $row['name'];
            $img = $row['imgpath'];

            $username = $row['username'];


            echo "<tr class='border'>
            <td class='border'>$orderid</td>
            <td class='border'>$pid</td>
            <td> 
                 <div>
                    <h4>$pname</h4>
                    <img class='w-25' src='$img'>
                </div>
            </td>
            <td class='border'>
                $userid
                <div>
                <h4>$username</h4>
                </div>
            </td>
            <td class='border'>$address</td>
            
        </tr>
        ";
    //     } else {
    //         if ($count == 0) {
    //             $count = 1;
    //             $orderid = $row['orderid'];
    //             $pid = $row['pid'];
    //             $userid = $row['userid'];
    //             $address = $row['address'];
    //             $qty = $row2['count(pid)'];

    //             $pname = $row['name'];
    //             $img = $row['imgpath'];

    //             $username = $row['username'];


    //             echo "<tr class='border'>
    //         <td class='border'>$orderid</td>
    //         <td class='border'>$pid</td>
    //         <td> 
    //              <div>
    //                 <h4>$pname</h4>
    //                 <img class='w-25' src='$img'>
    //             </div>
    //         </td>
    //         <td class='border'>
    //             $userid
    //             <div>
    //             <h4>$username</h4>
    //             </div>
    //         </td>
    //         <td class='border'>$address</td>
    //         <td class='border'>$qty</td>
    //     </tr>
    //     ";

               
    //         } else{
    //             $row2['count(pid)'] = 0;
    //             continue;
    //         }

    //     }



    }

    echo "</table>";


}


?>

</body>

</html>