<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('header.php');
?>

<div class="main-content">
<div class="main-content-inner">
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
<ul class="breadcrumb">
<li>
<i class="ace-icon fa fa-users"></i>
<a href="#">Test</a>
</li>
</ul><!-- /.breadcrumb -->

</div>

<div class="page-content">

<div class="row">
<div class="col-xs-12">
<div class="row">
<div class="col-xs-12">
	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-top" for="duallist"> Dual listbox </label>

	<div class="col-sm-8">
		<select multiple="multiple" size="10" name="duallistbox_demo1[]" id="duallist">
			<option value="option1">Option 1</option>
			<option value="option2">Option 2</option>
			<option value="option3" selected="selected">Option 3</option>
			<option value="option4">Option 4</option>
			<option value="option5">Option 5</option>
			<option value="option6" selected="selected">Option 6</option>
			<option value="option7">Option 7</option>
			<option value="option8">Option 8</option>
			<option value="option9">Option 9</option>
			<option value="option0">Option 10</option>
		</select>

		<div class="hr hr-16 hr-dotted"></div>
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