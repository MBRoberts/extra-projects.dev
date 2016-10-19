<?php

if(isset($_REQUEST)){
	$rank = array_values($_REQUEST);
	var_dump($rank);
}

$mentors = [
	[
		'id' => '1',
		'name' => 'Zach',
		'img' => 'http://i1.wp.com/codeup.com/wp-content/uploads/2016/05/hampton1-16_0116.jpg?zoom=2&resize=300%2C300',
		'description' => 'ZACH lorem ipsum"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."'
	],[
		'id' => '2',
		'name' => 'Ryan', 
		'img' => 'http://i2.wp.com/codeup.com/wp-content/uploads/2014/10/FW8A6296.jpg?resize=1024%2C1024',
		'description' => 'RYAN lorem ipsum"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."'
	],[
		'id' => '3',
		'name' => 'Cameron', 
		'img' => 'http://i2.wp.com/codeup.com/wp-content/uploads/2015/10/Cameron.jpg?w=500',
		'description' => 'CAMERON lorem ipsum"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."'
	],[
		'id' => '4',
		'name' => 'Fernando', 
		'img' => 'http://i1.wp.com/codeup.com/wp-content/uploads/2016/08/k-l_cohort-0088.jpg?zoom=2&resize=300%2C300',
		'description' => 'FERNANDOlorem ipsum"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."'
	],[
		'id' => '5',
		'name' => 'Luis', 
		'img' => 'http://i2.wp.com/codeup.com/wp-content/uploads/2016/03/luis-montealegre-software-development-instructor.jpg?resize=768%2C768',
		'description' => 'LUIS lorem ipsum"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."'
	],[
		'id' => '6',
		'name' => 'George', 
		'img' => 'http://i2.wp.com/codeup.com/wp-content/uploads/2015/10/george-haskell-web-development-instructor-1.jpg?resize=768%2C768',
		'description' => 'GEORGE lorem ipsum"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."'
	],[
		'id' => '7',
		'name' => 'Chris', 
		'img' => 'http://i0.wp.com/codeup.com/wp-content/uploads/2013/12/FW8A6326.jpg?resize=1024%2C1024',
		'description' => 'CHRIS lorem ipsum"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."'
	],[
		'id' => '8',
		'name' => 'Jason', 
		'img' => 'http://i0.wp.com/codeup.com/wp-content/uploads/2013/12/FW8A6317.jpg?resize=1024%2C1024',
		'description' => 'JASON lorem ipsum"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."'
	],[
		'id' => '9',
		'name' => 'Ernesto', 
		'img' => 'https://s3.amazonaws.com/alumni.codeup.com/ErnestoGarzaFinal.jpg',
		'description' => 'ERNESTO lorem ipsum"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."'
	],[
		'id' => '10',
		'name' => 'John', 
		'img' => 'https://s3.amazonaws.com/alumni.codeup.com/JohnHernandezFinal.jpg',
		'description' => 'JOHN lorem ipsum"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."'
	]
];

$jsonString = json_encode($mentors);

?>

<!DOCTYPE html>

<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta name="description" content="">
		<meta name="author" content="Ben Roberts">

		<title>Drag Interface</title>

		<!-- Bootstrap Core CSS CDN-->
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- Custom CSS -->
		<link rel="stylesheet" type="text/css" href="css/dragAndDrop.css">

	</head>
	<body>
		<script type="text/javascript">
			var $mentorArray = <?= $jsonString ?>;
		</script>

		<div class="container text-center">
			<h1 class="jumbotron text-center">Rank By Preference</h1>
			<div id="columns row text-center">
				<form id="rank-form" method="POST">
					
					<?php $rank = 1; 
					foreach($mentors as $key => $mentor) { ?>

						<div class="col-md-2 input">
							<header><h4>Rank <?= ($rank++) ?></h4></header>
							<div class="column" draggable="true">
								<header><?= $mentor['name'] ?></header>
								<img src="<?= $mentor['img'] ?>" alt="" class="img">
								<input type="hidden" name="<?= $key ?>" value="<?= $mentor['name'] ?>">
								<div class="btn btn-default modal-btn" data="<?= $key ?>" data-toggle="modal" data-target="#Modal">View Info</div>
							</div>
						</div>

					<?php } ?>
					
					<button class="btn btn-primary btn-lg submit" type="submit">Submit Preference</button>

				</form>
			</div><!-- /.columns row -->
			 <div class="modal fade" id="Modal" role="dialog">
			    <div class="modal-dialog">
					 <!-- Modal content -->
					<div class="modal-content">
				        <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Mentor's Name</h4>
				        </div>
				        <div class="modal-body">
							<p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia vitae totam voluptatem nobis veniam voluptatibus deleniti quam sapiente, ratione hic, ipsum sit. Culpa veritatis, est cumque similique accusantium aspernatur magni.</p>
				        </div>
				        <div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
					</div>
			    </div>
			</div>
		</div><!-- /.container -->


		<!-- Jquery.js CDN -->
		<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
		<!-- Bootstrap.js CDN -->
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Custom JavaScript -->
		<script type="text/javascript" src="js/dragAndDrop.js"></script>

	</body>
</html>