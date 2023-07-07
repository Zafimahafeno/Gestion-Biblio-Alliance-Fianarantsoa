	<?php 
        $page="book";
		 session_start();
		if (!isset($_SESSION["username"])) {
            ?>
                <script type="text/javascript">
                    window.location="login.php";
                </script>
            <?php
        }
        include 'inc/header.php';
        include 'inc/connection.php';
	 ?>
			
	<!--dashboard area-->
	<div class="dashboard-content">
		<div class="dashboard-header">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="left">
							<p><span>dashboard</span>Control panel</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="right text-right">
							<a href="dashboard.php"><i class="fas fa-home"></i>home</a>
							<span class="disabled">add book</span>
						</div>
					</div>
				</div>
				<div class="bstore">
					<form action="" method="post" enctype="multipart/form-data">
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="booksname" placeholder="Books name" required=""> 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Books image
                                    <input type="file" class="form-control" name="f1" required="">
                                </td>
                            </tr>
                
                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="bauthorname" placeholder="Books author name" required="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" name="bpurcdate" placeholder="Books purchase date" required="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" class="form-control" name="bquantity" placeholder="Books quantity" required="">
                                </td>
                            </tr>
                        </table>
                        <div class="submit mt-20">
                        	<input type="submit" name="submit" class="btn btn-info submit" value="Add Book">
                        </div>
                	</form>
				</div>				
			</div>					
		</div>
	</div>

        <?php

            if (isset($_POST["submit"])) {

                $image_name=$_FILES['f1']['name'];
                $temp = explode(".", $image_name);
                $newfilename = round(microtime(true)) . '.' . end($temp);
                $imagepath="books-image/".$newfilename;
                mysqli_query($link, "insert into add_book values('','$_POST[booksname]','$imagepath','$_POST[bauthorname]','$_POST[bpurcdate]','$_POST[bquantity]','$_POST[bquantity]','$_SESSION[username]')");
            }
        ?>
			
	<?php 
		include 'inc/footer.php';
	?>