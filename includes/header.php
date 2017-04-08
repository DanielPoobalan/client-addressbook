
<!DOCTYPE html>

<html>

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Client Address Book</title>

        <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body style="padding-top: 60px;">            
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">

        <div class="container-fluid">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="clients.php">CLIENT<strong>MANAGER</strong></a>
            </div>

           <div class="collapse navbar-collapse" id="navbar-collapse">
                
                <?php
                if(isset ($_SESSION['loggedInUser'] )) { // if user is logged in
                ?>
				
                <ul class="nav navbar-nav">
                    <li><a href="clients.php">My Clients</a></li>
                    <li><a href="add.php">Add Client</a></li>
                </ul>
				<form class="navbar-form navbar-left" action="./search.php" method="get">
                <div class="input-group">
                   <input type="text" class="form-control" placeholder="Search" name="client">
                   <div class="input-group-btn">
                            <button class="btn btn-default" type="submit" value="submit">
                           <i class="glyphicon glyphicon-search"></i>
                         </button>
                    </div>
                  </div>
                </form>
                
				
				
                <ul class="nav navbar-nav navbar-right">
                    <p class="navbar-text">Welcome, <?php echo $_SESSION['loggedInUser'];?> </p>
                    <p class="navbar-text">Today is <?php echo date("l, jS \ F Y") ;?></p>
                    <li><a href="logout.php">Log out</a></li>
                </ul>
                <?php
                } else {
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Log in</a></li>
                </ul>
                <?php
                }
                ?>

            </div>


        </div>

    </nav>
        
    <div class="container">