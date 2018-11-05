<?php 
	include "koneksi.php";
 ?>

		<?php 
			$sukses = true;
			$pesan = '';
			$KODE = '';

				$qry = mysqli_query($koneksi,"SELECT * FROM users");
				if(mysqli_num_rows($qry)>0){
					$sukses = true;
					$pesan = "GOODD!!!!!!!";
					$KODE = 200;
				}
				else{
					$sukses = false;
					$pesan = "ERROR!!!!!!!";
					$KODE = 204;
				}
				$respon = array();
				$respon["suskses"] = $sukses;
				$respon["data"] = array();
				$respon["pesan("] = $pesan;
				$respon["kode"] = $KODE; 
			while($row = mysqli_fetch_assoc($qry)){
				$data['id'] = $row["id"];
				$data['username'] = $row["username"];
				$data['password'] = $row["password"];
				$data['level'] = $row["level"];
				$data['fullname'] = $row["fullname"];
				array_push($respon["data"],$data);
			}
			echo json_encode($respon);
		?>