function fillDateForms()
{
var temp=0;
var today= new Date();
var year= today.getFullYear();
var ny=100;

for (var i=0; i <31  ; i++)
	{
	var x= String(i+1);

	if( document.getElementById("dtRecD") != null ) 	
	document.getElementById("dtRecD").options[i] = new Option(x,x);
	if(document.getElementById("dtSucD") != null )	
	document.getElementById("dtSucD").options[i] = new Option(x,x);
	}

for (var i=0,j=year; i < ny ; i++, j++)
	{
	var y= String(j);
	if(document.getElementById("dtRecY") != null ) 	
	document.getElementById("dtRecY").options[i] = new Option(y,y);
	if(document.getElementById("dtSucY") != null )	
	document.getElementById("dtSucY").options[i] = new Option(y,y);
	}
}

function refreshDateForm(id)
{
	var nd=0,sy;
	var ny=100;
	var cfecha;
	if(id==1) cfecha='dtRec';
	else cfecha='dtSuc';

	if(document.getElementById(cfecha+'M').options[1].selected){
		for(i=0;i<ny;i++)
			if( document.getElementById(cfecha+'Y').options[i].selected == true  ){
			sy = document.getElementById(cfecha+'Y').options[i].value;	
				if ( (sy % 4 == 0) && ( ( sy % 100 != 0) || ( sy % 400 == 0) )) 
				nd=29;
				else 
				nd=28;
			}
	}
	else 
	if(document.getElementById(cfecha+'M').options[8].selected||document.getElementById(cfecha+'M').options[3].selected||document.getElementById(cfecha+'M').options[5].selected||document.getElementById(cfecha+'M').options[10].selected) nd=30;
	else
	nd=31;
	for(i=0;i<31;i++) document.getElementById(cfecha+'D').options[i]=null;
	for(var i=0; i <nd ; i++)
	{
	var x= String(i+1);
	document.getElementById(cfecha+'D').options[i] = new Option(x,x);
	}
}
