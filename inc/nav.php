<section>
	<div class="container">
		<nav>
			<ul>
				<li>
					<a href="?section=index">Home</a>
					<?php if ($_GET["section"] == "")
						echo '<div><span class="caret"></span></div>';
					?>
				</li>
				
				<li class="<?php if ($_GET["section"] == "modeler")echo "selected"; ?>">
					<a href="?section=modeler">Modeler</a>
					<?php if ($_GET["section"] == "results")
						echo '<div><span class="caret"></span></div>';
					?>			
				</li>
			</ul>
		</nav>
	</div><!--./container-->
</section>

