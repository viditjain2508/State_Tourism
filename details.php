<?php
$con=mysqli_connect('localhost','root',"") ;
mysqli_select_db($con,'state')or die("Connection Failed to select database");
if(isset($_POST['submit']))
{
    if(isset($_POST['confirmid'])&&isset($_POST['custname'])&&isset($_POST['date'])){
        $username=$_POST['custname'];
        $id=$_POST['confirmid'];
        $sql="SELECT * FROM package_details WHERE package_id='$id'";
        $result=mysqli_query($con,$sql);
        $pack=mysqli_fetch_assoc($result);
        $a=$_POST['custname'];
        $b=$pack['location'];
        $c=$_POST['date'];
        $d=$_POST['tourists'];
        $e=$_POST['travel'];
        $amount=0;
    
    echo "<script>alert('Package Booked Successfully!.')</script>"; 
    if($_POST['travel']=="bus")
        {
            $amount=($pack['basic_amount']+$pack['bus_amount'])*$d;
            
        }
    }
    if($_POST['travel']=="train")
        {
            $amount=($pack['basic_amount']+$pack['train_amount'])*$d;
            
        }
    if($_POST['travel']=="flight")
        {
            $amount=($pack['basic_amount']+$pack['flight_amount'])*$d;
        }
        
        $query="INSERT INTO booking VALUES ('$id','$a','$b','$c','$d','$e','$amount')";
        mysqli_query($con,$query);
        mysqli_close($con);
}
else if(isset($_GET['package_id'])){
        $username=mysqli_real_escape_string($con,$_GET['username']);
        $id=mysqli_real_escape_string($con,$_GET['package_id']);
        $sql="SELECT * FROM package_details WHERE package_id='$id'";
        $result=mysqli_query($con,$sql);
        $pack=mysqli_fetch_assoc($result);
        mysqli_close($con);
    }  

?>
<!DOCTYPE html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="style4.css">
 <style>
     body{
        background-image:url('https://i.redd.it/o8dlfk93azs31.jpg');
    background-position:center;
    background-size:cover;
    opacity:.9;
     }
     h1{
         color:white;
         text-align:center;
         margin-bottom:100px;
         margin-top:50px;
         font-size:60px;
     }
     .card{
         border-radius:20px;
     }
     nav ul {
  list-style: none;
  text-align: center;
}
nav ul li {
  display: inline-block;
}
nav ul li a {
  display: block;
  padding: 15px;
  text-decoration: none;
  color: #aaa;
  font-weight: 800;
  text-transform: uppercase;
  margin: 0 10px;
}
nav ul li a,
nav ul li a:after,
nav ul li a:before {
  transition: all .5s;
}
nav ul li a:hover {
  color: #555;
}


/* stroke */
nav.stroke ul li a,
nav.fill ul li a {
  position: relative;
}
nav.stroke ul li a:after,
nav.fill ul li a:after {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  width: 0%;
  content: '.';
  color: transparent;
  background: #aaa;
  height: 1px;
}
nav.stroke ul li a:hover:after {
  width: 100%;
}

nav.fill ul li a {
  transition: all 2s;
}

nav.fill ul li a:after {
  text-align: left;
  content: '.';
  margin: 0;
  opacity: 0;
}
nav.fill ul li a:hover {
  color: #fff;
  z-index: 1;
}
nav.fill ul li a:hover:after {
  z-index: -10;
  animation: fill 1s forwards;
  -webkit-animation: fill 1s forwards;
  -moz-animation: fill 1s forwards;
  opacity: 1;
}
 </style>
 <script type = "text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">State Tourism</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link" href="customerhome.php?username=<?php echo $username?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="home.html">Logout</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="booking.php?username=<?php echo $username?>">My Bookings</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div>
    <h1 style="color : white">DETAILS</h1>

    
    
    <?php
    if(isset($_POST['submit']))
    {
        if(isset($_POST['confirmid'])&&isset($_POST['custname'])&&isset($_POST['date'])){?>
        <div style="color:white;text-align:center;margin-bottom:500px;">
        <h1>Booking confirmed</h1>
    <h3>Thanks for choosing Himachal tourism</h3>
    <div style="font-size:25px;">
        <?php
          echo 'Total amount of trip:'.$amount;
        }
      }
      ?>
      </div>
      
      </div>
    <?php if(!isset($_POST['submit']))

         if($pack): ?>
         <div class="container-fluid">
        <div style="opacity:.7;"class="row">
        <div style="margin-left:180px;" class="col-lg-4 col-md-4 col-12">
        <div class="card">
        <div class="card-body">
        <h4><?php echo 'Package Id : '.htmlspecialchars($pack['package_id']);?></h4>
        <h4><?php echo 'Location : '.htmlspecialchars($pack['location']);?></h4>
        <h4><?php echo 'Description : '.htmlspecialchars($pack['description']);?></h4>
        <h4><?php echo 'Basic Amount : '.htmlspecialchars($pack['basic_amount']);?></h4>
        <h4><?php echo 'Bus Amount : '.htmlspecialchars($pack['bus_amount']);?></h4>
        <h4><?php echo 'Train Amount : '.htmlspecialchars($pack['train_amount']);?></h4>
        <h4><?php echo 'Flight Amount : '.htmlspecialchars($pack['flight_amount']);?></h4>
        </div>
                        </div>
                    </div>
         <div style="margin-left:100px;" class="col-lg-4 col-md-4 col-12">
        <div class="card">
        <div class="card-body">
        <h4>Book Now</h4>
        <form action="details.php" method="post">
            
            <h4>Date<input type="date" name="date"></h4>
            <label for="travel">Choose travel mode:</label>
           <select id="travel" name="travel">
           <option value="bus">BUS</option>
           <option value="train">TRAIN</option>
           <option value="flight">FLIGHT</option>
           </select><br><br>
            <input type="text" name="custname" placeholder="username"><br>  
            <input type="text" name="confirmid" placeholder="package id">
            <h4>Number of tourist</h4>
            <input type="number" name="tourists" placeholder="number of persons">
            <div class="card-text">
        <input type="submit" name = "submit" value="Book">
        </form>
        </div>
                        </div>
                    </div>
         </div>
         </div>
        <?php else: ?>
            <?php endif; ?>
</div>
</body>
</html>