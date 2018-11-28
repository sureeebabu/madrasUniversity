<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('header.php');

?>
<div class="main-content">
<div class="main-content-inner">
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-tachometer"></i>
			<a href="#">Dashboard</a> 
		</li>
	</ul><!-- /.breadcrumb -->

</div>

<div class="page-content">

	<div class="row">
		<div class="col-xs-12">
			<div class="row">
				<div class="col-xs-12">
					<!-- dashboard content goes here... -->
					<!-- <?=$_SESSION['userType'];?>
					<?=$_SESSION['studEnrollNo'];?> -->
					<div class="infobox infobox-pink">
						<div class="infobox-icon">
							<i class="ace-icon fa fa-share-alt"></i>
						</div>

						<div class="infobox-data">
							<span class="infobox-data-number">
								<?php

								if(count($publishData)>0)
								{
									$i=1;
									$pubCount = 0;
									foreach($publishData as $row)
									{
										$pubCount = $i++;
									}
								}
								else
								{
									$pubCount =0;
								}
								echo $pubCount;

								?>
							</span>
							<div class="infobox-content">
								<a href="<?php echo base_url('StudentMarksCtrl'); ?>">Published</a>
								
							</div>
						</div>
					</div>

					<div class="infobox infobox-green">
						<div class="infobox-icon">
							<i class="ace-icon fa fa-clipboard"></i>
						</div>

						<div class="infobox-data">
							<span class="infobox-data-number">
								<?php

								if(count($assignedData)>0)
								{
									$j=1;
									$assignCount = 0;
									foreach($assignedData as $row)
									{
										$assignCount = $j++;
									}
								}
								else
								{
									$assignCount =0;
								}
								echo $assignCount;

								?>
							</span>
							<div class="infobox-content">
								Assigned
							</div>
						</div>
					</div>

					<div class="infobox infobox-red">
						<div class="infobox-icon">
							<i class="ace-icon fa fa-thumbs-up"></i>
						</div>

						<div class="infobox-data">
							<span class="infobox-data-number">
								<?php

								if(count($submittedData)>0)
								{
									$k=1;
									$submitCount = 0;
									foreach($submittedData as $row)
									{
										$submitCount = $k++;
									}
								}
								else
								{
									$submitCount =0;
								}
								echo $submitCount;

								?>
							</span>
							<div class="infobox-content">
								Submited Assignment
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
</div>
</div>
</div>


<?php
include ('footer.php');
?>