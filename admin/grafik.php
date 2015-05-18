<?php require 'head.php';?>
<div class="container-fluid main-container">
  		<div class="col-md-2 sidebar">
  			<div class="row">
	<!-- uncomment code for absolute positioning tweek see top comment in css -->
	<div class="absolute-wrapper"> </div>
	<!-- Menu -->
	<div class="side-menu">
		<nav class="navbar navbar-default" role="navigation">
			<!-- Main Menu -->
			<div class="side-menu-container">
				<ul class="nav navbar-nav">
					<li><a href="admin.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>                    
					<li class="active"><a href="#" target="_self"><span class="glyphicon glyphicon-signal"></span> Grafik</a></li>

				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>

	</div>
</div>  		</div>
  		<div class="col-md-10 content">
  			  <div class="panel panel-default">
	<div class="panel-heading">
		Dashboard
	</div>
	<div class="panel-body">
        <?php require 'chart.php'; ?>
	</div>
</div>
  		</div>
<?php require'foot.php';?>