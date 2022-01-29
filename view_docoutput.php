<?php
	include 'connect.php';
	
	$sql = "SELECT * FROM employee";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
		<tr>
			<td><?=$row['emp_firstname'];?></td>
			<td><?=$row['emp_lastname'];?></td>
			<td><?=$row['emp_email'];?></td>
			<td><?=$row['emp_tel'];?></td>
            <td><?=$row['emp_address'];?></td>
            <td><?=$row['emp_username'];?></td>
			<td><?=$row['emp_id'];?></td>
            <td style="width:10%;"> <!-- Button trigger modal -->
			<button onclick="OnEdit(<?=$row['m_id'];?>)" type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">แก้ไข</button>
			<button onclick="OnDelete(<?=$row['m_id'];?>)" type="button" class="btn btn-sm btn-danger">ลบ</button>
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
  