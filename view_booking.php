<?php
	include 'connect.php';
	
    $search_date2 = $_POST["search_date2"];

	$sql_query = "SELECT  m_firstname , m_lastname , stadium_name , booking_date , time_start , time_end , all_time , total 
    FROM booking a, member b, stadium c
    WHERE a.stadium_id = c.stadium_id and b.m_id = a.m_id and a.booking_date = '$search_date2' ORDER BY `a`.`time_start` ASC";

    $result = mysqli_query($conn,$sql_query);
    $num_row = mysqli_num_rows($result);

    if ($num_row > 0) {
        while($row = $result->fetch_assoc()) {
    ?>	

        <tr>
            <td><?=$row['m_firstname'];?></td>
            <td><?=$row['m_lastname'];?></td>
            <td><?=$row['stadium_name'];?></td>
            <td><?=$row['booking_date'];?></td>
            <td><?=$row['time_start'];?></td>
            <td><?=$row['time_end'];?></td>
            <td><?=$row['all_time'];?></td>
            <td><?=$row['total'];?></td>
        </tr>

    <?php	
        }
    }
    else {
        echo "ไม่พบผลลัพธ์";
    }
	mysqli_close($conn);
?>
  