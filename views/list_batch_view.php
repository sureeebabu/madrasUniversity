<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('header.php');
?>

<div class="main-content">
<div class="main-content-inner">
<div class="page-content">

<div class="row">
<div class="col-xs-12">
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

<div class="widget-container-col" id="widget-container-col-2">
	<div class="widget-box widget-color-blue" id="widget-box-2">
		<div class="widget-header">
			<h5 class="widget-title bigger lighter">
				<i class="ace-icon fa fa-desktop"></i>
				List of Batch
			</h5>

<a class="btn btn-white btn-info btn-bold pull-right" href="<?php echo base_url('BatchController/addEditBatch'); ?>"><i class="ace-icon fa fa-plus bigger-120 blue"></i> Add New Batch</a>
			
		</div>

		<div class="widget-body">
			<div class="widget-main no-padding">
				<table  id="dynamic-table" class="table table-striped table-bordered table-hover">
					<thead class="thin-border-bottom">
						<tr>
				<th class="text-center">#</th>
				<th class="text-center">Batch Name</th>
				<th class="text-center">Batch Year</th>
				<th class="text-center">Action</th>
						</tr>
					</thead>

					<tbody>
						<?php
			if(count($data)>0)
			{
				$i=1;
				foreach($data as $row)
				{
					echo "<tr>";
					 echo "<td  class='text-center'>".$i++."</td>";
					echo "<td>".$row->batchName."</td>";
					echo "<td class='text-center'>".$row->batchYear."</td>";

					echo "<td class='text-center'>
						  	<a title='Edit Batch' href='".site_url('BatchController/edit/'.$row->batchID)."/$row->batchTypeID'
						  	class='tooltip-default' data-rel='tooltip' data-placement='top' >
							<i class='fa fa-edit' ></i>
							</a> &nbsp; | &nbsp;

							<a title='Delete Batch' onClick='return doconfirm();' href='".site_url('BatchController/deleteFn/'.$row->batchID)."'
							class='tooltip-default' data-rel='tooltip' data-placement='top'>
							<i class='fa fa-trash' ></i>
							</a>

							</td>";

				echo "</tr>";
				}
			}else
			{
				echo "<tr><td class='text-center text-danger' colspan='6'><b>No Record Found</b></td></tr>";
			}
			?>	
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div><!-- /.span -->
</div><!-- /.row -->



	</div>
</div>

</div>
</div>
</div>
</div>


<script type="text/javascript">
	$('[data-rel=tooltip]').tooltip();
	function doconfirm()
{
	 var job=confirm("Are you sure to delete permanently?");
    if(job!=true)
    {
        return false;
    }
}
</script>
<?php
include ('footer.php');
?>