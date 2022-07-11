<div class="alert  ">
<button class="close" data-dismiss="alert"></button>
Question: Advanced Input Field</div>

<p>
1. Make the Description, Quantity, Unit price field as text at first. When user clicks the text, it changes to input field for use to edit. Refer to the following video.

</p>


<p>
2. When user clicks the add button at left top of table, it wil auto insert a new row into the table with empty value. Pay attention to the input field name. For example the quantity field

<?php echo htmlentities('<input name="data[1][quantity]" class="">')?> ,  you have to change the data[1][quantity] to other name such as data[2][quantity] or data["any other not used number"][quantity]

</p>



<div class="alert alert-success">
<button class="close" data-dismiss="alert"></button>
The table you start with</div>

<table class="table table-striped table-bordered table-hover">
<thead>
<th><span id="add_item_button" class="btn mini green addbutton" onclick="addToObj=false">
											<i class="icon-plus"></i></span></th>
<th>Description</th>
<th>Quantity</th>
<th>Unit Price</th>
</thead>

<tbody id='rowscontainer'>
	<tr>
	<td></td>
	<td><textarea name="data[1][description]" class="m-wrap  description required fulllen noscrollbar" rows="2" id="d1" onfocus="tfocus()" onblur="tblur()"></textarea></td>
	<td><input name="data[1][quantity]" class="fulllen bkgtrp" id="q1" onfocus="ifocus()" onblur="iblur()"></td>
	<td><input name="data[1][unit_price]"  class="fulllen bkgtrp" id="u1" onfocus="ifocus()" onblur="iblur()"></td>
	
</tr>

</tbody>

</table>

<!-- hidden element for copying original border -->
<textarea name="data[1][description]" class="m-wrap  description required hidden" rows="2" id="d0" onfocus="tfocus()" onblur="tblur()"></textarea>

<p></p>
<div class="alert alert-info ">
<button class="close" data-dismiss="alert"></button>
Video Instruction</div>

<p style="text-align:left;">
<video width="78%"   controls>
  <source src="<?php echo Router::url("/video/q3_2.mov") ?>">
Your browser does not support the video tag.
</video>
</p>

<style>
	.vertical-center {
  		margin: 0;
  		position: absolute;
  		top: 50%;
  		-ms-transform: translateY(-50%);
  		transform: translateY(-50%);
	}
	.center1{
		display: block;
  		margin: 0 auto;		
	}
	.noresizing {
		resize:none;
	}
	.hidden {
		display:none;
	}
	.fulllen {
		width: 97%;
		margin: 0;
	}
	.bkgtrp {
		background-color: transparent;
	}
	.noscrollbar {
		overflow:hidden;
	}
	.vercen{
  		vertical-align: middle;
		height: 80%;
		margin:0;
	}
	.taf {
    	border: none;
    	background-color: transparent;
    	resize: none;
    	outline: none;
	}

</style>



<?php $this->start('script_own');?>
<script>
var i=2;   // We had 1 row already
var osty=document.getElementById("d0").style.border;
var activeElement=document.getElementById("d0")

tinit_obj(document.getElementById("d1"));
iinit_obj(document.getElementById("q1"));
iinit_obj(document.getElementById("u1"));
auto_height("d1");


function ifocus(){
    $(document.activeElement).css('border', '1px');
	activeElement=$(document.activeElement).attr("id");
//console.log("input focus ae="+activeElement);
}
function iblur(){
	$('#'+activeElement).css('border', 'none');
//console.log("input blur ae="+activeElement);
}
function tfocus(){
	activeElement=$(document.activeElement).attr("id");
//	ae=$(this).attr("id");
//console.log("tfocus ae="+activeElement+", border="+document.getElementById(activeElement).style.border);
    document.getElementById(activeElement).style.border=osty;
//	document.getElementById(activeElement).rows="2";
//	removeClass(document.getElementById(activeElement), "noresizing");
	removeClass(document.getElementById(activeElement), "taf");
//console.log("text focus ae="+activeElement);
//console.log("");
}
function tblur(){
//console.log("tblur ae="+activeElement+", border="+document.getElementById(activeElement).style.border);
	document.getElementById(activeElement).style.border='none';
//console.log("text blur this="+this);
	// removeClass(document.getElementById(activeElement), "noresizing");
	// addClass(document.getElementById(activeElement), "noresizing");
	removeClass(document.getElementById(activeElement), "taf");
	addClass(document.getElementById(activeElement), "taf");		
//console.log("");
}

function iinit_obj(obj){
	obj.style.border='none';
//	console.log("input blur ae="+activeElement);
}
function tinit_obj(obj){
//	console.log("tblur obj="+obj.id+", border="+obj.style.border);
//console.log("before obj="+obj.id+", outline="+obj.style.outline);	
	obj.style.border='none';
	obj.style.outline='none';
//console.log("after obj="+obj.id+", outline="+obj.style.outline);	
	obj.rows="1";
//	console.log("text blur this="+obj);
	removeClass(obj, "taf");
	addClass(obj, "taf");

//console.log("");
}

function auto_height(id) {
  	$("#"+id).attr('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
	$("#"+id).on('input', function () {
//console.log("on input id="+id);
		this.style.height = 'auto';
		this.style.height = (this.scrollHeight-10) + 'px';
	});
}



$(document).ready(function(){

	$("#add_item_button").click(function(){
        var t_ecell=`<td></td>`;
        var t_description = `<textarea name="data[${i}][description]" class="m-wrap  description required fulllen noscrollbar" rows="2" id="d${i}" onfocus="tfocus()" onblur="tblur()"></textarea>`;
	    var t_quantity = `<input name="data[${i}][quantity]" class="fulllen bkgtrp" id="q${i}" onfocus="ifocus()" onblur="iblur()">`;
    	var t_unit_price=`<input name="data[${i}][unit_price]"  class="fulllen bkgtrp" id="u${i}" onfocus="ifocus()" onblur="iblur()">`;

// console.log('t_description='+t_description);
// console.log('t_quantity='+t_quantity);
// console.log('t_unit_price='+t_unit_price);
// console.log("");

        var container = document.getElementById('rowscontainer');
        var tr = document.createElement('tr');
        var td = document.createElement('td');
    	tr.appendChild(td);
        td=document.createElement('td');
    	td.innerHTML=t_description;
		tr.appendChild(td);

    	td=document.createElement('td');
		td.innerHTML=t_quantity;
		td.className="forcell";
		tr.appendChild(td);

    	td=document.createElement('td');
		td.innerHTML=t_unit_price;
		td.className="forcell";
		tr.appendChild(td);

    	container.appendChild(tr);
        tinit_obj(document.getElementById("d"+i));
        iinit_obj(document.getElementById("q"+i));
        iinit_obj(document.getElementById("u"+i));
		auto_height("d"+i);
//        document.getElementById("q${i}").blur();
//        document.getElementById("u${i}").blur();
    	i++;
	});


	// $("input").focus(function(){
    //     $(document.activeElement).css('border', '1px');
	// 	ae=$(document.activeElement).attr("id");
	// 	console.log("input focus ae="+ae);
  	// });
	// $("input").blur(function(){
	// 	$('#'+ae).css('border', 'none');
    //     $('#'+ae).rows="1";
	// 	console.log("input blur ae="+ae);
	// });
	// $("textarea").focus(function(){
    //     $(document.activeElement).css('border', '1px');
    //     $(document.activeElement).rows="2";
	// 	ae=$(document.activeElement).attr('id');
	// 	console.log("textarea focus ae="+ae);
  	// });
	// $("textarea").blur(function(){
	// 	$('#'+ae).css('border', 'none');
    //     $('#'+ae).rows="1";
	// 	console.log("textarea blur ae="+ae);
	// });


});


function addClass(element, classToAdd) 
{
    var currentClassValue = element.className;
          
    if (currentClassValue.indexOf(classToAdd) == -1) 
    {
        if((currentClassValue == null) || (currentClassValue === "")) 
        {
            element.className = classToAdd;
        } 
        else 
        {
            element.className += " " + classToAdd;
        }
    }
}


function removeClass(element, classToRemove) 
{
    var currentClassValue = element.className;

    if(currentClassValue == classToRemove) 
    {
        element.className = "";
        return;
    }

    var classValues = currentClassValue.split(" ");
    var filteredList = [];

    for (var i = 0 ; i < classValues.length ; i++) 
    {
        if(classToRemove != classValues[i]) 
        {
            filteredList.push(classValues[i]);
        }
    }

    element.className = filteredList.join(" ");
}
</script>
<?php $this->end();?>

