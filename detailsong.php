<?php 
session_start();
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
            <link rel="stylesheet" href="CSS/style.css">
            <title>Trang Index</title>
        </head>
        <body>
            <div class="container-fluid">
                <div class="header">
                    <div class="row">
                        <div class="col-lg-2">
                            <h2><span style="color: #1DB954;">TuneSoure</span></h2>
                        </div>
                        <div class="col-lg-5">
                            <nav class="navbar navbar-light bg-light">
                                <div class="container-fluid">
                                <form class="d-flex">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                                </div>
                            </nav>
                        </div>
                        <div class="col-lg-5">
                            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                <div class="container-fluid">
                                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                        <ul class="navbar-nav">
                                            <li class="nav-item">
                                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" aria-current="page" href="#">Playlist</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" aria-current="page" href="cart.php">My Cart</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" aria-current="page" href="manage.php">Manage song</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" aria-current="page" href="#">About us</a>
                                            </li>
                                            <li class="nav-item dropdown">                                          
                                                <a class="nav-link dropdown-toggle information" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="Images/profile.jpg">
                                                <?php
										            include('connect.php');
										            if(isset($_SESSION['UserName'])){
											        $h = $_SESSION['UserName'];
                                                    echo $h;
									            ?>
                                                <?php } ?>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                                <li><a class="dropdown-item" href="#">Setting</a></li>
                                                <li><a class="dropdown-item" href="#">Upgrade to Premium</a></li>
                                                <hr style="color: aquamarine;">
                                                <li><a class="dropdown-item" href="Login.php">Log Out</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="menu">
                    <div class="row">
                        <div class="col-lg-2">
                            <ul>
                                <h4>Genre</h4>
                                <a href="#"><li>Top V-POP</li></a>
                                <a href="#"><li>Top K-POP</li></a>
                                <a href="#"><li>Top US-UK</li></a>
                                <a href="#"><li>Top RAP</li></a>                               
                                <a href="#"><li>Top R&B</li></a>
                                <a href="#"><li>Top Jazz</li></a>
                                <a href="#"><li>Top Dance</li></a>
                                <a href="#"><li>Top EDM</li></a>
                            </ul>
                            <hr style="color: aquamarine; width: 100%">
                            <ul>
                                <h4>Top Artist</h4>
                                <li>VPOP</li>
                                <li>KPOP</li>
                                <li>US-UK</li>
                            </ul>
                        </div>
                        <div class="col-lg-10">
									<?php
										include('connect.php');
                                        $SongID = $_GET["SongID"];
										$sql1 = "SELECT * FROM song where SongID = '$SongID'";
										$result = mysqli_query($connect, $sql1);
										if($row =mysqli_fetch_assoc($result)) 
										{
											$SongID = $row['SongID'];
											$SongName = $row['SongName'];
											$Price = $row['Price'];
											$SongImage = $row['SongImage'];
											$SongAudio = $row['SongAudio'];
											$SongLyric = $row['SongLyric'];
											$SongDescription = $row['SongDescription']; 
											$GenreName = $row['GenreName'];
                                            $ArtistName =$row['ArtistName'];  
										
									?>
									<?php
										include('connect.php');
										$sql2 = "SELECT * FROM artist where ArtistName = '$ArtistName'";
										$result = mysqli_query($connect, $sql2);
										if($row =mysqli_fetch_assoc($result)) 
										{											
											$ArtistName = $row['ArtistName'];
											$ArtistDoB = $row['ArtistDoB'];
											$ArtistDescription = $row['ArtistDescription']; 
									?>
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-4">
										<div class="card" style="width: 100%;">
											<img src="<?php echo "$SongImage" ?>" class="card-img-top" alt="...">
											<div class="card-body">
												<audio src="<?php echo "$SongAudio" ?>" controls controlsList="nodownload" ontimeupdate="MyAudio(this)"></audio>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div style="color: white" class="namesong"><?php echo "$SongName" ?></div>
										<div style="color: white" class="pricesong">Price: $<?php echo "$Price" ?></div>
										<div style="color: white" class="nameartist">Artist: <?php echo "$ArtistName" ?></div>
									</div>
                                    <div class="col-lg-1">
												<!-- Button trigger modal -->
												<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
												Update song
												</button>

												<!-- Modal -->
												<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																	<form action="" method="POST">
																		<div class="form-group">
																			<label for="exampleInputPassword1">Song name</label>
																			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Song Name" name="SongName">
																		</div>
																		<div class="form-group">
																			<label for="exampleInputPassword1">Price</label>
																			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Price" name="Price">
																		</div>
																		<div class="form-group">
																			<label for="exampleInputPassword1">Song image</label>
																			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Song Image" name="SongImage">
																		<div class="form-group">
																			<label for="exampleInputPassword1">Song audio</label>
																			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Song Audio" name="SongAudio">
																		<div class="form-group">
																			<label for="exampleInputPassword1">Song lyric</label>
																			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Song Lyric" name="SongLyric">
																		<div class="form-group">
																			<label for="exampleInputPassword1">Song description</label>
																			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Song Description" name="SongDescription">
																		<div class="form-group">
																			<label for="exampleInputPassword1">Genre name</label>
																			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Genre Name" name="GenreName">
																		</div>
																		<div class="form-group">
																			<label for="exampleInputPassword1">Artist</label>
																			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Artist" name="ArtistName">
																		</div>
																		<div class="form-group form-check">
																			<input type="checkbox" class="form-check-input" id="exampleCheck1">
																			<label class="form-check-label" for="exampleCheck1">You agree to <span style="color:green"><u>add a new song</u></span>.</label>
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																			<button type="submit" class="btn btn-primary" name="update">Add</button>
																		</div>
																	</form>
																	<?php
																		include 'connect.php';
																		if(isset($_POST['update']))
																		{
																			$SongID = $_GET["SongID"];
																			$SongName1 = $_POST['SongName'];
																			$Price1 = $_POST['Price'];
																			$SongImage1 = $_POST['SongImage'];
																			$SongAudio1 = $_POST['SongAudio'];
																			$SongLyric1 = $_POST['SongLyric'];
																			$SongDescription1 = $_POST['SongDescription'];
																			$GenreName1 = $_POST['GenreName'];
																			$ArtistName1 = $_POST['ArtistName'];
																			$sql = "UPDATE song SET `SongName`='$SongName1',`Price`='$Price1',`SongImage`='$SongImage1',`SongAudio`='$SongAudio1',`SongLyric`='$SongLyric1',`SongDescription`='$SongDescription1',`GenreName`='$GenreName1',`ArtistName`='$ArtistName1' WHERE `SongID` ='$SongID'";
																			$add = mysqli_query($connect,$sql);
																			if($add){
																					echo " Update Successfully
																					<script>alert('Update successfully');
																					window.open('detailsong.php?SongID=$SongID', '_self');</script>";
																			}
																			else{
																					echo "Error!";
																			}
																		}
																	?>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
									</div>
									<div class="col-lg-1">
									<form method="POST">
									<button type="submit" class="btn btn-primary" name="delete" >
										Delete song
									</button>
									</form>
									<span><a  class="cartdetail" href="add_cart.php?SongID=<?php echo"$SongID" ?>">
										<img style="width:50%; float:center; padding:5px 0 5px 0" src="images/shopping-cart.png" alt="">
										</a></span>
									<?php
                                    include ('connect.php');
                                    if(isset($_POST['delete']))
                                    {
                                        $SongID = $_GET["SongID"];
										$SongName1 = $_POST['SongName'];
										$Price1 = $_POST['Price'];
										$SongImage1 = $_POST['SongImage'];
										$SongAudio1 = $_POST['SongAudio'];
										$SongLyric1 = $_POST['SongLyric'];
										$SongDescription1 = $_POST['SongDescription'];
										$GenreName1 = $_POST['GenreName'];
										$ArtistName1 = $_POST['ArtistName'];
                                        $sql = "DELETE FROM song WHERE `SongID`= '$SongID'";
                                        $delete = mysqli_query($connect,$sql);
                                        if($delete){
											echo "delete Successfully
											<script>alert('delete successfully');
											window.open('manage.php', '_self');</script>";
                                        }
                                        else{
                                                echo "Error!";
                                        }
                                    }
                					?>
									</div>
								</div>
								</div>
								<div class="row">
									<div class="accordion" id="accordionExample">
										<div class="accordion-item">
											<h2 class="accordion-header" id="headingOne">
												<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
													Lyric
												</button>
											</h2>
											<div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
												<div class="accordion-body">
													<div class="lyric"><?php echo "$SongLyric" ?></div>
												</div>
											</div>
										</div>
									</div>
									
								</div>
							</div>
						<?php } ?><?php } ?>
                        </div>
                    </div>
                </div>
            </div>  
        <script src="JavaScript/script.js"></script>
    </body>
</html>