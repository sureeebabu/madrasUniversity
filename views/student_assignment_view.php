<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
include('header.php'); ?>

<div class="main-content">
<div class="main-content-inner">
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
<ul class="breadcrumb">
<li>
 <i class="menu-icon fa fa-edit"></i>
<a href="#">List of Assignment</a>
</li>
</ul><!-- /.breadcrumb -->

</div>

<div class="page-content">

<div class="row">
<div class="col-xs-12">
	<?php 
	if(isset($_SESSION['msg']))
	{
		echo '
			<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>
				<i class="ace-icon fa fa-check green"></i>
				<strong class="green">
					'.$_SESSION['msg'].'	
				</strong>
			</div>
		';
		$_SESSION['msg'] = null;
	}
	?>
<div class="row">
	<div class="col-xs-3">
	<table id="dynamic-table" class="table table-striped table-bordered table-hover">
			<tr class="info">
				<th class="text-center">Subject Name</th>
				<th class="text-center">View</th>
			</tr>
			<?php
			if(count($data)>0)
			{
				foreach($data as $row)
				{
					echo "<tr>";
					echo "<td>".$row->subCode. "&nbsp - &nbsp;" . $row->subjectName."</td>";
					echo "<td class='text-center'>
<a title='View Assignment' href='".site_url('StudAssignController/dispAssign/'.$row->subjectID)."/$row->assignmentID'>
<i class='fa fa-eye' ></i>
</a>
							</td>";
				echo "</tr>";
				}
			}else
			{
			echo "<tr><td class='text-center text-danger' colspan='6'><b>Not Alloted Yet</b></td></tr>";
			}
			?>
		</table>
	</div>

<?php if ($qData == 1) : ?>
<div class="col-xs-9" >
<table  class="table table-striped table-bordered table-hover">
	<tr class="info">
		<th class="text-center">#</th>
		<th class="text-center">Questions</th>
		<th class="text-center">Target Date</th>
		<th class="text-center">Grace Date</th>
	</tr>
	<?php
	if(count($questionData)>0)
	{
		$disableUploadBtn="";
		$graceDate;
		$targetDate;
		foreach ($chkGraceData as $row) {
			$graceDate = $row->graceDate;
			$targetDate = $row->targetDate;
		}

		$i=1;
		foreach($questionData as $row)
		{
			if($row->assignSubmitDate<date("Y-m-d H:i:s"))
			{
				$disableUploadBtn="disabled";
			}
			else{
				$disableUploadBtn="";
			}
			echo "<tr>";
			echo "<td class='text-center' style='width:10%' >". $i++."</td>";
			echo "<td>". $row->question. "</td>";
			if($i==2)
			{
			echo "<td class='text-center' rowspan='4'>".date("d M Y", strtotime($targetDate))."</td>";
			echo "<td class='text-center' rowspan='4'>".date("d M Y", strtotime($graceDate))."</td>";	
			}
			echo "</tr>";
		}

		echo "<tr>";
		if($disableUploadBtn !="disabled")
		{
			if($graceDate >= date("Y-m-d"))
			{
				echo "<td class='text-center' colspan='5' >
				<a title='Upload Assignment'  class='btn btn-info btn-xs pull-right' href='".site_url('UploadAssignCtrl/index/'.$row->subjectID)."'>Upload</a></td>"; 
			}
			else
			{
				echo "<td class='text-center' colspan='5'>
					<b class='text-danger' >Assignment Submission Date Over</b>
				</td>";
			}
		}
		else
		{
			echo "<td class='text-center' colspan='5' >
			<span class='text-danger'>Your are not eligible to upload assignment</span>
				<a title='Upload Assignment' disabled  class='btn btn-info btn-xs pull-right' href='#'>Upload</a></td>"; 
		}
		echo "</tr>";
	}else
	{
		echo "<tr><td class='text-center text-danger' colspan='6'><b>No Record Found</b></td></tr>";
	}
	?>
</table>
	</div>
<?php  endif; ?>



</div>

</div>
</div>
</div>
<!-- </form> -->
</div>
</div>


<?php include ('footer.php'); ?>