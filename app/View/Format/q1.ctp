
<div id="message1">


<?php echo $this->Form->create('Type',array('id'=>'form_type','action' => 'show', 'type'=>'file','class'=>'','method'=>'POST','autocomplete'=>'off','inputDefaults'=>array(
				
				'label'=>false,'div'=>false,'type'=>'text','required'=>false)))?>
	
<?php echo __("Hi, please choose a type below:")?>
<br><br>

<?php $options_new = array(
 		'Type1' => __('<span class="showDialog" id="type1" data-id="1" style="color:blue">Type1</span>'),
		'Type2' => __('<span class="showDialog" id="type2" data-id="2" style="color:blue">Type2</span>'),
		'Type3' => __('<span class="showDialog" id="type3" data-id="3" style="color:blue">Type3</span>')
		);?>

<?php echo $this->Form->input('type', array('legend'=>false, 'type' => 'radio', 'options'=>$options_new,'before'=>'<label class="radio line notcheck">','after'=>'</label>' ,'separator'=>'</label><label class="radio line notcheck">'));?>

<span id="s1"></span>


<?php echo $this->Form->end(__('Save'));?>

</div>
<div id="dialog_1" class="tooltips" title="Type 1">
 				<span style="display:inline-block"><ul><li>Description .......</li>
 				<li>Description 2</li></ul></span>
</div>

<div id="dialog_2" class="tooltips" title="Type 2">
 				<span style="display:inline-block"><ul><li>Desc 1 .....</li>
 				<li>Desc 2...</li></ul></span>
</div>
<div id="dialog_3" class="tooltips" title="Type 2">
 		<span style="display:inline-block">
			<ul>
					<li>test desc ...</li>
			</ul>
		</span>
</div>
<style>
.showDialog:hover{
	text-decoration: underline;
	position: absolute;
}

.tooltips{
	display:none;
	position: absolute;
	background-color:#ffffff;
	border:#e0e0e0 1px solid;
	z-index:99;
}

#message1 .radio{
	vertical-align: top;
	font-size: 13px;
}

.control-label{
	font-weight: bold;
}

.wrap {
	white-space: pre-wrap;
}

</style>

<?php $this->start('script_own')?>
<script>


var xpos, ypos;
$(document).mousemove(function(event){
     xpos=event.pageX;
	 ypos=event.pageY;
//	 $('#s1').text("x:"+xpos+", y:"+ypos);
	//  $("#dialog_1").css( { "left": xpos+8, "top": ypos+10 } );
	//  $("#dialog_2").css( { "left": xpos+8, "top": ypos+10 } );
});
$(document).ready(function(){
	$(".dialog").dialog({
		autoOpen: false,
		width: '500px',
		modal: true,
		dialogClass: 'ui-dialog-blue'
	});

	//$(".showDialog").tooltip("type1");  
	$(".showDialog").hover(function(){var id = "dialog_"+$(this).data('id'); $("#"+id).css( { "left": $(this).position().left+47, "top": $(this).position().top} ); $("#"+id).show(); },
	                       function(){var id = "dialog_"+$(this).data('id'); $("#"+id).hide();}
     );


//	$(".showDialog").click(function(){ var id = $(this).data('id'); $("#"+id).dialog('open'); });




});


</script>
<?php $this->end()?>