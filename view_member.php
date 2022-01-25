<?php
	include 'connect.php';
	
	$sql = "SELECT a.m_id,a.m_firstname,a.m_lastname,a.m_email,a.m_tel,a.m_address,a.m_password,a.emp_id,a.Position_id,b.Position_name FROM member a
	JOIN position b ON a.Position_id = b.Position_id;";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
		<tr>
			<td><?=$row['m_firstname'];?></td>
			<td><?=$row['m_lastname'];?></td>
			<td><?=$row['m_email'];?></td>
			<td><?=$row['m_tel'];?></td>
			<td><?=$row['m_address'];?></td>
			<td><?=$row['emp_id'];?></td>
			<td><?=$row['Position_name'];?></td>
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
  