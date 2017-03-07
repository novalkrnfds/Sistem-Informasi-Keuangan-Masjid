<?php
    include "../../config/koneksi.php";
	
	$id_admin=$_GET['id_admin'];
	$data=mysql_query("SELECT * FROM tbadmin WHERE id_admin='$id_admin'");
	while($r=mysql_fetch_array($data)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Admin</h4>
        </div>

        <div class="modal-body">
        	<form action="dir/admin/edit_admin.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Nama">Nama</label>
                    <input type="hidden" name="id_admin"  class="form-control" value="<?php echo $r['id_admin']; ?>" />
     				<input type="text" name="nama"  class="form-control" value="<?php echo $r['nama']; ?>"/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Username">Username</label>
     				<input type="text" name="username" class="form-control" value="<?php echo $r['username']; ?>"/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Password">Password</label>
					<?php $dec = $r['password'];
						$decrypt = base64_decode($dec);?>
     				<input type="password" name="password"  class="form-control" value="<?php echo $decrypt; ?>"/>
                </div>

	            <div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" name="update" >Save changes</button>
				</div>

            	</form>
				<?php } ?>
            </div>

           
        </div>
    </div>
	
	<?php
	if(isset($_POST['update'])){		
		$id_admin=$_POST['id_admin'];
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$password = base64_encode($_POST['password']);
		$sql=mysql_query("UPDATE tbadmin SET nama = '$nama', username = '$username', password = '$password' WHERE id_admin = '$id_admin'");
		if($sql){
			header('location:../../home.php?page=admin&status=0');
		} else {
			header('location:../../home.php?page=admin&status=1');
		}
	} 
?>