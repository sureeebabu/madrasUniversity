<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
include('header.php'); ?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
<div class="main-content">
<div class="main-content-inner">
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-book"></i>&nbsp;
			<a href="#">Assignment Summary</a>
		</li>
	</ul><!-- /.breadcrumb -->

</div>

<div class="page-content">

	<div class="row">
		<div class="col-xs-12">
			<div class="row">
				<div class="col-xs-12">
					<form method="post" id="assignSummValidate" accept-charset="utf-8" action="<?php echo site_url("AssignmentSummaryController/getAssignDetails"); ?>">

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
							<select id="searchByCourse" name="searchByCourse" required="required" class="form-control">
								<option value="" >-- Select Course --</option>
								<?php foreach($courseData as $cData):?>
									<option value="<?php echo $cData->course_code; ?>"><?php echo $cData->courseName ?>
								</option>
							<?php endforeach;?>
						</select>
					</td>
					<td>&nbsp;</td>
					<td>
						<input type="submit" name="btnSearchByCourse" id="btnSearchByCourse" value="Search" class="btn btn-primary btn-xs" style="height: 33px;padding-left: 10px;" >
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
						Assignment Summary  <span id="couName"></span>
					</h5>
					
				</div>

				<div class="widget-body">
					<div class="widget-main no-padding">
						<div class="table-responsive" >
							<table  id="dynamic-table" class="table table-striped table-bordered table-hover">
								<thead class="thin-border-bottom">
									<tr>
										<th class="text-center">#</th>
										<th class="text-center">Assignment Date</th>
										<th class="text-center">Sub Code</th>
										<th class="text-center">Subject Name</th>
										<th class="text-center">Target Date</th>
										<th class="text-center">Grace  Date</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>

								<tbody>
									<?php

									if($searchMode==="search")
									{
										if(count($data)>0)
										{
											$i=1;
											foreach($data as $row)
											{
												echo "<tr>";
												echo "<td  class='text-center'>".$i++."</td>";
												echo "<td class='text-center' style='width:20%' >".date("d M Y h:m:s A", strtotime($row->dateOfAssignment))."</td>";
												echo "<td class='text-center' style='width:15%'>".$row->subCode."</td>";
												echo "<td>".$row->subjectName."</td>";
												echo "<td class='text-center'>".date("d M Y", strtotime($row->targetDate))."</td>";
												echo "<td class='text-center'>".date("d M Y", strtotime($row->graceDate))."</td>";

												echo "<td class='text-center'>
												<a title='Delete Assignment' onClick='return doconfirm();' href='".site_url('AssignmentSummaryController/deleteFn/'.$row->assignmentID)."' class='tooltip-default' data-rel='tooltip' data-placement='top'>
												<i class='fa fa-trash' ></i>
												</a>

												</td>";

												echo "</tr>";
											}
										}else
										{
											echo "<tr><td class='text-center text-danger' colspan='7'><b>No Record Found</b></td></tr>";
										}
									}else{
										echo "<tr><td class='text-center text-danger' colspan='7'><b>No Record Found</b></td></tr>";
									}
									?>					</tbody>
								</table>
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
</div>
</div>
<script type="text/javascript">
function doconfirm()
{
var isDelete=confirm("Are you sure to delete permanently?");
if(isDelete!=true)
{
	return false;
}
}
$(document).ready(function(){
$('#btnSearchByCourse').click(function(){
	var couName = " - " + $('#searchByCourse :selected').html();
	
	$.session.set("couName",couName);
});
$('#couName').html($.session.get("couName"));
$.session.set("couName"," ");
});
</script>



<?php include ('footer.php'); ?>