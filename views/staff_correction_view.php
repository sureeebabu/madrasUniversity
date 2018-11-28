<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('header.php');

?>


<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-check"></i>
					<a href="#">Assignment Correction</a> 
				</li>
			</ul><!-- /.breadcrumb -->

		</div>

		<div class="page-content">

			<div class="row">
				<div class="col-xs-12">

<form method="post" id="assignCorrectionValidation" accept-charset="utf-8" action="<?php echo site_url("StaffCorrectionCtrl/getAssignBySubjectID/"); ?>">

	<table>
		<tr>
			<td>
				<select id="searchByBatchType" name="searchByBatchType" class="form-control" required="required" >
					<option value="" >-- Select Batch --</option>
					<?php foreach($batchTypeData as $btData):?>
						<option value="<?php echo $btData->batchName; ?>"><?php echo $btData->batchName ?>
					</option>
				<?php endforeach;?>
			</select>			
		</td>
		<td>&nbsp;</td>

		<td>
			<select id="searchByBatchYear" name="searchByBatchYear" required="required" class="form-control">
				<option value="" >-- Select Year --</option>
				<?php foreach($batchYearData as $byData):?>
					<option value="<?php echo $byData->batchYear; ?>"><?php echo $byData->batchYear ?>
				</option>
			<?php endforeach;?>
		</select>		
	</td>
	<td>&nbsp;</td>
	<td>
		<select id="searchBySubject" name="searchBySubject" required="required" class="form-control">
			<option value="" >-- Select Subject --</option>
			<?php foreach($subjectData as $sData):?>
				<option value="<?php echo $sData->subjectID; ?>"><?php echo $sData->subjectName ?>
			</option>
		<?php endforeach;?>
	</select>		
</td>
<td>&nbsp;</td>
<td>
	<input type="submit"  name="btnSearch" id="btnSearch" value="Search" class="btn btn-primary btn-xs pull-left" >	
</td>

</tr>
</table>
</form>
<br/>

<div class="widget-container-col" id="widget-container-col-2">
	<div class="widget-box widget-color-blue" id="widget-box-2">
		<div class="widget-header">
			<h5 class="widget-title bigger lighter">
				<i class="ace-icon fa fa-check"></i>
				Assignment Correction  <span id="subName"></span>
			</h5>
			
		</div>

		<div class="widget-body">
			<div class="widget-main no-padding">
				<div class="table-responsive" >
				<table  id="dynamic-table" class="table table-striped table-bordered table-hover">
					<thead class="thin-border-bottom">
						<tr>
							<th class="text-center">#</th>
				<th class="text-center">Student Name</th>
				<th class="text-center">Enrollment No</th>
				<th class="text-center">No of Ques Attended</th>
				<th class="text-center">Total Pages</th>
				<th class="text-center">Status</th>
				<th class="text-center">File</th>
				<th class="text-center">Add Marks</th>
						</tr>
					</thead>

					<tbody>
<?php
	if($searchMode==="search")
	{
	if(count($assignData)>0)
	{
    	$i=1;
		foreach($assignData as $row)
			{
				//$i++;
			echo "<tr>";
			echo "<td  class='text-center'>".$i++."</td>";
			echo "<td>".$row->name."</td>";
			echo "<td class='text-center'>".$row->enroll_no."</td>";
			echo "<td class='text-center'>".$row->noOfQuesAttended ."</td>";
			echo "<td class='text-center'>".$row->noOfPages ."</td>";

			if($row->status ==="Published")
			{
			echo "<td class='text-center'>
					<span class='label label-success arrowed-right arrowed-in'>".$row->status."</span>
				</td>";
			}elseif($row->status === "Submitted")
			{
				echo "<td class='text-center'>
					<span class='label label-danger arrowed-in arrowed-in-right'>".$row->status."</span>
				</td>";
			}elseif($row->status === "Assigned")
			{
				echo "<td class='text-center'>
					<span class='label label-primary arrowed arrowed-right'>".$row->status."</span>
				</td>";
			}

				//if(!empty($row->filename) or !isset($row->filename) or is_null($row->filename))
			if($row->status === "Submitted" or $row->status === "Published")
			{
			echo "<td class='text-center' >"					
			."<a href='../../uploads/$row->filename' class='tooltip-default' download title='Download File' data-rel='tooltip' data-placement='top'  > <i class='fa fa-cloud-download fa-lg text-success' </i></a>".	
				"</td>";

			echo "<td class='text-center'>
				<a href='".site_url('MarksCtrl/index/'.$row->enroll_no)."/$subjectID'
				title='Marks' class='tooltip-default' data-rel='tooltip' data-placement='top'
				>
				<i class='fa fa-check-square-o fa-lg'></i> </a>						
				</td>";
			}
			else
			{
				echo "<td class='text-center text-danger'><b>Not Submitted</b></td>";
				echo "<td class='text-center text-danger'><b>N/A</b></td>";
			}
				echo "</tr>";
				}
			}else
			{
				echo "<tr><td class='text-center text-danger' colspan='8'><b>No Record Found</b></td></tr>";
			}
			}
			else
			{
			echo "<tr><td class='text-center text-danger' colspan='8'><b>No Record Found</b></td></tr>";	
			}
			?>
					</tbody>
				</table>
			</div>
			</div>
		</div>
	</div>
</div><!-- /.span -->

			</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('[data-rel=tooltip]').tooltip();
	 $(document).ready(function(){
		$('#btnSearch').click(function(){
		var subName = " - " + $('#searchBySubject :selected').html();
		$.session.set("subName",subName);
		});
		$('#subName').html($.session.get("subName"));
		$.session.set("subName"," ");
	});
</script>
<?php
include ('footer.php');
?>