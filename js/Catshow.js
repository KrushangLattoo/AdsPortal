function addcatshow()
{
	document.getElementById("form").style.display="block";
	document.getElementById("viewtable").style.display="none";
}
function viewcatshow()
{
	document.getElementById("viewtable").style.display="block";
	document.getElementById("form").style.display="none";
}
function subaddshow()
{
	document.getElementById("subform").style.display="block";
	document.getElementById("subviewtable").style.display="none";
}
function subviewshow()
{
	document.getElementById("subviewtable").style.display="block";
	document.getElementById("subform").style.display="none";
}
function addshow()
{
	document.getElementById("formad").style.display="block";
	document.getElementById("viewtablead").style.display="none";
}
function viewadshow()
{
	document.getElementById("viewtablead").style.display="block";
	document.getElementById("formad").style.display="none";
}
function addsubs()
{
	document.getElementById("subsform").style.display="block";
	document.getElementById("subviewtable").style.display="none";
}
function viewsubs()
{
	document.getElementById("subviewtable").style.display="block";
	document.getElementById("subsform").style.display="none";
}
function myfunction() 
{
	var selectBox = document.getElementById("selectBoxCat");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
   	alert(selectedValue);	
}
