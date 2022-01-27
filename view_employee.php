<?php
	include 'connect.php';
	
	$sql = "SELECT a.emp_id,a.emp_cardid,a.emp_firstname,a.divistion_id,d.divistion_name,a.emp_lastname,a.emp_email,a.emp_tel,a.emp_password,a.emp_id,a.Position_id,a.gender_id,a.divistion_id,b.Position_name,g.gender_name FROM employee a
	JOIN position b ON a.Position_id = b.Position_id
    JOIN gender g ON a.gender_id = g.gender_id
    JOIN divistion d ON a.divistion_id = d.divistion_id;";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
		<tr>
		
			<td><?=$row['emp_firstname'];?></td>
			<td><?=$row['emp_lastname'];?></td>
			<td><?=$row['emp_cardid'];?></td>
			<td><?=$row['gender_name'];?></td>
			<td><?=$row['Position_name'];?></td>
			<td><?=$row['divistion_name'];?></td>
			<td><?=$row['emp_email'];?></td>
			<td><?=$row['emp_tel'];?></td>
            <td style="width:10%;"> <!-- Button trigger modal -->
			<button onclick="OnEdit(<?=$row['emp_id'];?>)" type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">แก้ไข</button>
			<button onclick="OnDelete(<?=$row['emp_id'];?>)" type="button" class="btn btn-sm btn-danger">ลบ</button>
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
  