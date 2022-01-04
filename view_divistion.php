<?php
	include 'connect.php';
	
	$sql_query = "SELECT  stadium_id , stadium_name , divistion_number
    FROM stadium";

    $result = mysqli_query($conn,$sql_query);
    $num_row = mysqli_num_rows($result);

    if ($num_row > 0) {
        while($row = $result->fetch_assoc()) {
    ?>	

        <tr>
            <td><?=$row['stadium_name'];?></td>
            <td><?=$row['divistion_number'];?></td>
            <td style="width:10%;">
			<button onclick="OnEdit2(<?=$row['stadium_id'];?>)" type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal4">แก้ไข</button>
			<button onclick="OnDelete2(<?=$row['stadium_id'];?>)" type="button" class="btn btn-sm btn-danger">ลบ</button>
			</td>
        </tr>

    <?php	
        }
    }
    else {
        echo "ไม่พบผลลัพธ์";
    }
	mysqli_close($conn);
?>
  