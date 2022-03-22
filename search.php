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
                                <form class="d-flex" action="search.php" method="GET">
                                    <input class="form-control me-2" name="Search" type="search" placeholder="Search" aria-label="Search">                                  
                                    <button class="btn btn-outline-success" name="search" type="submit">Search</button>
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
                                                <a class="nav-link active" aria-current="page" href="#">Manage song</a>
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
					</div>
            <div class="col-lg-10">
			<?php
              include('connect.php');
              $search = "";
              if( !empty($_GET['Search'])){
                $search = $_GET['Search'];
              }
              ?>
              <div class="row">
                  <?php
                  if( !empty($search)) {
                    $rs = mysqli_query( $connect ,"SELECT * FROM song WHERE song.SongName LIKE '%{$search}%'");
                    while($row = mysqli_fetch_assoc($rs)){
                    $SongID = $row['SongID'];
                    $SongName = $row['SongName'];
                    $Price = $row['Price'];
                    $SongImage = $row['SongImage'];
                    $SongAudio = $row['SongAudio'];
                    $SongLyric = $row['SongLyric'];
                    $SongDescription = $row['SongDescription']; 
                    $GenreName = $row['GenreName'];  
                    $ArtistName = $row['ArtistName'];
                  ?>
						<div class="col-lg-3">
							<a href="detailsong.php?SongID=<?php echo"$SongID" ?>">
								<div class="card">
									<center><img src="<?php echo "$SongImage" ?>" class="card-img-top"></center>
									<div class="card-body">
										<h5 class="card-title"><?php echo "$SongName" ?></h5>
										<p class="card-text">$<?php echo "$Price" ?></p>
                                        <span><a  class="cartdetail" href="add_cart.php?SongID=<?php echo"$SongID" ?>">
										<img style="width:10%; float:center; padding:0 0 5px 0" src="images/shopping-cart.png" alt="">
										</a></span>
										<audio src="<?php echo "$SongAudio" ?>" controls controlsList="nodownload" ontimeupdate="MyAudio(this)"></audio>
									</div>
								</div>   
							</a>
						</div>
            <?php } } ?>
			</div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>   
        <script src="JavaScript/script.js"></script>
     </body>
</html>
