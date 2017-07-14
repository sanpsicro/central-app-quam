		<?php 
   ob_start ("ob_gzhandler");
   header ("content-type: text/css; charset: UTF-8");
   //header ("cache-control: must-revalidate");
   $offset = 60 * 60;
   $expire = "expires: " . gmdate ("D, d M Y H:i:s", time() + $offset) . " GMT";
   header ($expire);
?>
body,td,th {
	color: #000000;
	font-family: arial, helvetica, sans serif;
}
body {
	background-color: #ffffff;
	margin: 0;
	padding: 0;
	scrollbar-face-color: #163058;
	font-size: 11px;
	background: #ffffff;
	scrollbar-highlight-color: #ffffff;
	scrollbar-shadow-color: #6c7884;
	color: #333333;
	scrollbar-3dlight-color: #124369;
	scrollbar-arrow-color: #ffffff;
	scrollbar-track-color: #6b7d89;
	scrollbar-darkshadow-color: #124369;
}
/*********************************
Estilos Nok
**********************************/
.mainTable th{
	font-size: 12px;
	background: #bbb;
	font-weight: bold;
}

.mainTable td{
	text-align: center;
}
.even{background: #DCDCDC;}
.odd{background: #ccc;}

.filtros{background: #bbb; padding: 5px;}
.filtro{display: inline; margin:0; padding:0;}

.expediente{
	display: block;
	color: black;
	background-color: white;
	border: 1px solid black;
	text-decoration: none;
	padding: 5px;
}
.expediente:hover{
	text-decoration: underline;
}
.control_pagos{margin: 10px; margin-top: 25px;}
.control_pagos a{
	display: block;
	color: black;
	background-color: white;
	border: 1px solid black;
	text-decoration: none;
	padding: 5px;
	float: left;
}
.control_pagos a:hover{text-decoration: underline;}
.control_pagos small a{
	display: block;
	color: black;
	background-color: white;
	border: 1px solid black;
	text-decoration: none;
	padding: 2px;
	float: right;
}
.control_pagos small a:hover{text-decoration: underline;}

.bienvenida{
	display: inline;
	color: black;
	font-weight: bold;
	font-size: 11px;
    line-height: 25px;
    display: table-cell;
    float: left;
    
}

.centerb {
text-align: center;
padding-left: 10px;
padding-top: 10px;

}

.logico {
display: inline;
background-image: url(ico.jpg);
background-repeat: no-repeat;
background-position: 2px 2px; 
line-height: 25px;    
width: 25px;
float: left;
}

ul.mainMenu{	
	list-style-type: none;
	margin: 0;
	padding: 0;
	margin-left: 18px;
}
	ul.mainMenu li{
		display: block;
		padding: 1px;
		background: #fff url('img/hline1.gif') bottom left no-repeat;
	}
	ul.mainMenu li:last-child{
		background-image: none;
	}
	ul.mainMenu li a{
		color: #0a357a;
		text-transform: capitalize;
		font-weight: bold;
		text-decoration: none;
		font-size: 11px;
		display: block;
		padding: 5px;
	}
	ul.mainMenu li a:hover{
		text-decoration: underline;
		background-color: #eee;
	}
	
#alertas{
	margin: 15px;
}

.alertasTitulo{
	cellpadding: 5px;
	text-align: center;
	color: white;
	background: red;
	font-weight: bold;
}
ul.alertas{
	list-style-type: none;
	margin: 0;
	padding: 0;
}
	ul.alertas li{
		display: block;
		border-bottom: 1px solid black;
	}
	ul.alertas li:last-child{
		border: none;
	}
	ul.alertas li a{
		color: #0a357a;
		text-decoration: none;
		display: block;
		background-color: #EAD904;
		text-align: center;
		padding: 10px;
		font-weight: bold;
		font-size: 11px;
	}
	ul.alertas li a:hover{
		background-color: #F8E810;
		text-decoration: underline;
	}
/**********************************/
.style2 {
	color: #005e99;
	font-weight: bold;
	font-size: 12px;

}

.menu1 {
 font-size: 18px;
 text-transform: capitalize;
 color: #ffffff;
 text-indent: 12px;
}
.menu2 {
	font-weight: bold;
 font-size: 12px;
 text-transform: capitalize;
 color: #000000;
 text-indent: 12px;
}
.menu3 {
	font-weight: bold;
 font-size: 13px;
 text-transform: capitalize;
 color: #ffffff;
 text-indent: 5px;
}
.tablesubmenu {
	font-weight: bold;
 font-size: 11px;
 margin: 10px;
 text-transform: capitalize;
 color: #ffffff;
 line-height: 24px;
 text-align: left;
 text-decoration: none;
}
.maintitle {
	font-weight: normal;
 font-size: 30px;
 text-transform: capitalize;
 color: #00266d;
 padding: 10px;
 text-indent: 21px;
 text-decoration: none
}
.actiontitle {
 font-size: 19px;
 text-transform: capitalize;
 color: #ffffff;
 text-indent: 21px;
 text-decoration: none
}
.xplik {
	font-weight: bold;
 font-size: 15px;
 text-transform: capitalize;
 color: #333333;
 text-indent: 21px;
 text-decoration: none
}
.contentarea1 {
	font-size: 12px;
 border-collapse: collapse
}
.menutitle {
 padding: 0;
 font-weight: bold;
 font-size: 13px;
 margin-bottom: 0px;
 cursor: pointer;
 color: #ffffff;
 text-indent: 5px;
 text-align: left
}
.submenu {
	margin-top: 10px;
 font-weight: bold;
 font-size: 11px;
 margin-bottom: 15px;
 text-transform: capitalize;
 color: #ffffff;
 line-height: 24px;
 text-align: left;
 text-decoration: none;
}
.linksmenu {
	margin-top: 10px;
 font-weight: bold;
 font-size: 11px;
 margin-bottom: 15px;
 text-transform: capitalize;
 color: #0a357a;
 line-height: 24px;
 text-align: left;
 text-decoration: none;
}
.linksmenu:hover {
	margin-top: 10px;
 font-weight: bold;
 font-size: 11px;
 margin-bottom: 15px;
 text-transform: capitalize;

 line-height: 24px;
 text-align: left;
 text-decoration: underline;

}
.linksmenu:active {
 text-decoration: underline
}
.bienvenidayfecha {
	font-weight: bold;
 font-size: 10px;
 margin-left: 10px;
 color: #ffffff;
 line-height: 20px;
}
.bartitle {
	font-weight: bold;
 font-size: 12px;
 text-transform: capitalize;
 color: #000000;
}
.copyrightnotice {
	font-size: 11px;
 color: #000000;
}
.copyrightnoticealter {
	font-size: 12px;
 color: #000000;
 font-family: fantasy
}
td {
	font-size: 12px;
 font-family: arial;
 border-collapse: collapse
}
.dataclass {
	 font-size: 12px;
}
.dataclassmini {
	padding-right: 3px;
 padding-left: 3px;
 font-size: 11px;
 padding-bottom: 3px;
 padding-top: 3px;
}
.dataclass2 {
	padding: 0;
 font-size: 12px;
}
input ,textarea,select{
 border: #7f8996 1px solid;
 font-size: 8pt;
 background: #ffffff;
 color: #000000;
 font-family: arial;
}

.questtitle {
	font-weight: bold;
 font-size: 13px;
 text-transform: capitalize;
 color: #000000;
 text-indent: 21px;
 line-height: normal;
 font-style: normal;
 font-family: geneva, arial, helvetica, sans-serif;
 letter-spacing: normal;
 text-decoration: none
}
.dateschedule {
	font-weight: normal;
 font-size: 20px;
 text-transform: capitalize;
 color: #ffffff;
 text-indent: 21px;
 line-height: normal;
 font-style: normal;
 font-family: arial, helvetica, sans-serif;
 letter-spacing: normal;
 text-decoration: none
}
.tableonetitle {
	font-weight: bold;
 font-size: 12px;
 text-transform: capitalize;
 color: #ffffff;
 text-indent: 21px;
 line-height: normal;
 font-style: normal;
 font-family: geneva, arial, helvetica, sans-serif;
 letter-spacing: normal;
 text-decoration: none
}
.dataclass a:link {
	color: #000000;
 text-decoration: underline
}
.dataclass a:visited {
	color: #000000;
 text-decoration: underline
}
.dataclass a:hover {
	color: #666666;
 text-decoration: underline
}
.dataclass a:active {
	color: #000000;
 text-decoration: underline
}
.blacklinks {
	font-weight: bold;
 font-size: 11px;
 color: #000000;
 font-family: arial, helvetica, sans-serif
}
.blacklinks a:link {
	color: #000000;
 text-decoration: underline
}
.blacklinks a:hover {
	color: #000000;
 text-decoration: none
}
.blacklinks a:visited {
	color: #000000;
 text-decoration: underline
}
.blacklinks a:active {
	color: #000000;
 text-decoration: underline
}
.cruxlinks {
	font-weight: bold;
 font-size: 11px;
 color: #000000;
 font-family: arial, helvetica, sans-serif
}
.cruxlinks a:link {
	color: #000000;
 text-decoration: underline
}
.cruxlinks a:hover {
	color: #000000;
 text-decoration: none
}
.cruxlinks a:visited {
	color: #000000;
 text-decoration: underline
}
.cruxlinks a:active {
	color: #000000;
 text-decoration: underline
}
.calnum {
	padding-right: 3px;
 padding-left: 3px;
 font-weight: bold;
 font-size: 14px;
 padding-bottom: 3px;
 color: #ffffff;
 padding-top: 3px;
 font-family: arial, helvetica, sans-serif
}
.calnum a:link {
	padding-right: 3px;
 padding-left: 3px;
 font-weight: bold;
 font-size: 14px;
 padding-bottom: 3px;
 color: #ffffff;
 padding-top: 3px;
 font-family: arial, helvetica, sans-serif;
 text-decoration: underline
}
.calnum a:hover {
	padding-right: 3px;
 padding-left: 3px;
 font-weight: bold;
 font-size: 14px;
 padding-bottom: 3px;
 padding-top: 3px;
 font-family: arial, helvetica, sans-serif;
 text-decoration: underline
}
.calnum a:visited {
	padding-right: 3px;
 padding-left: 3px;
 font-weight: bold;
 font-size: 14px;
 padding-bottom: 3px;
 color: #ffffff;
 padding-top: 3px;
 font-family: arial, helvetica, sans-serif;
 text-decoration: underline
}
.calnum a:active {
	padding-right: 3px;
 padding-left: 3px;
 font-weight: bold;
 font-size: 14px;
 padding-bottom: 3px;
 color: #ffffff;
 padding-top: 3px;
 font-family: arial, helvetica, sans-serif;
 text-decoration: underline
}
.dataclassmini a:link {
	padding-right: 3px;
 padding-left: 3px;
 font-size: 11px;
 padding-bottom: 3px;
 color: #000000;
 padding-top: 3px;
 font-family: arial, helvetica, sans-serif;
 text-decoration: underline
}
.dataclassmini a:hover {
	padding-right: 3px;
 padding-left: 3px;
 font-size: 11px;
 padding-bottom: 3px;
 color: #000000;
 padding-top: 3px;
 font-family: arial, helvetica, sans-serif;
 text-decoration: underline
}
.dataclassmini a:visited {
	padding-right: 3px;
 padding-left: 3px;
 font-size: 11px;
 padding-bottom: 3px;
 color: #000000;
 padding-top: 3px;
 font-family: arial, helvetica, sans-serif;
 text-decoration: underline
}
.dataclassmini a:active {
	padding-right: 3px;
 padding-left: 3px;
 font-size: 11px;
 padding-bottom: 3px;
 color: #000000;
 padding-top: 3px;
 font-family: arial, helvetica, sans-serif;
 text-decoration: underline
}
.hour {
	padding-right: 3px;
 padding-left: 3px;
 font-weight: bold;
 font-size: 18px;
 padding-bottom: 3px;
 padding-top: 3px;
 font-family: arial, helvetica, sans-serif
}
.minihour {
	padding-right: 3px;
 padding-left: 3px;
 font-weight: bold;
 font-size: 12px;
 padding-bottom: 3px;
 padding-top: 3px;
 font-family: arial, helvetica, sans-serif
}
.minimalist a:link {
	padding-right: 2px;
 padding-left: 2px;
 font-size: 9px;
 padding-bottom: 2px;
 color: #000000;
 padding-top: 2px;
 font-family: arial, helvetica, sans-serif;
 text-decoration: underline
}
.minimalist a:hover {
	padding-right: 2px;
 padding-left: 2px;
 font-size: 9px;
 padding-bottom: 2px;
 color: #000000;
 padding-top: 2px;
 font-family: arial, helvetica, sans-serif;
 text-decoration: underline
}
.minimalist a:visited {
	padding-right: 2px;
 padding-left: 2px;
 font-size: 9px;
 padding-bottom: 2px;
 color: #000000;
 padding-top: 2px;
 font-family: arial, helvetica, sans-serif;
 text-decoration: underline
}
.minimalist a:active {
	padding-right: 2px;
 padding-left: 2px;
 font-size: 9px;
 padding-bottom: 2px;
 color: #000000;
 padding-top: 2px;
 font-family: arial, helvetica, sans-serif;
 text-decoration: underline
}
.botonsend {
	border-right: #7f8996 1px solid;
 border-top: #7f8996 1px solid;
 background: #ffffff;
 font: bold 10pt arial;
 border-left: #7f8996 1px solid;
 color: #000000;
 border-bottom: #7f8996 1px solid
}
form {
	margin: 0px
}

.MensajeIntermedio {
	background-color: #DDFF60 ;
 
        border: #DDFF20 3px solid;

	PADDING: 2px;

	width: 150px;

}
.MensajeUrgente{
	background-color: #CC3322;
 
        border: #FF2020 3px solid;

	PADDING: 2px;

	width: 150px;

        height:35px;

}
.MensajeSimple{
	background-color: #20FF22;
 
        border: #00FF20 3px solid;

	width: 250px;

	width: 150px;

}



















/* The main calendar widget.  DIV containing a table. */

div.calendar { position: relative;
 }

.calendar, .calendar table {
  border: 1px solid #000000;

  font-size: 11px;

  color: #000;

  cursor: default;

  background: #eeeeee;

  font-family: tahoma,verdana,sans-serif;

}

/* Header part -- contains navigation buttons and day names. */

.calendar .button { /* "<<", "<", ">", ">>" buttons have this class */
  text-align: center;
    /* They are the navigation buttons */
  padding: 2px;
          /* Make the buttons seem like they're pressing */
}

.calendar .nav {
  background: #cccccc url(menuarrow2.gif) no-repeat 100% 100%;

}

.calendar thead .title { /* This holds the current "month, year" */
  font-weight: bold;
      /* Pressing it will take you to the current date */
  text-align: center;

  background: #000;

  color: #fff;

  padding: 2px;

}

.calendar thead tr { /* Row <TR> containing navigation buttons */
  background: #cccccc;

  color: #fff;

}

.calendar thead .daynames { /* Row <TR> containing the day names */
  background: #bbbbbb;

}

.calendar thead .name { /* Cells <TD> containing the day names */
  border-bottom: 1px solid #bbbbbb;

  padding: 2px;

  text-align: center;

  color: #000;

}

.calendar thead .weekend { /* How a weekend day name shows in header */
  color: #000033;

}

.calendar thead .hilite { /* How do the buttons in header appear when hover */
  background-color: #bbbbbb;

  color: #000;

  border: 1px solid #000000;

  padding: 1px;

}

.calendar thead .active { /* Active (pressed) buttons in header */
  background-color: #cccccc;

  border: 1px solid #000000;

  padding: 2px 0px 0px 2px;

}

/* The body part -- contains all the days in month. */

.calendar tbody .day { /* Cells <TD> containing month days dates */
  width: 2em;

  color: #456;

  text-align: right;

  padding: 2px 4px 2px 2px;

}
.calendar tbody .day.othermonth {
  font-size: 80%;

  color: #bbb;

}
.calendar tbody .day.othermonth.oweekend {
  color: #003;

}

.calendar table .wn {
  padding: 2px 3px 2px 2px;

  border-right: 1px solid #000;

  background: #bbbbbb;

}

.calendar tbody .rowhilite td {
  background: #def;

}

.calendar tbody .rowhilite td.wn {
  background: #F1F8FC;

}

.calendar tbody td.hilite { /* Hovered cells <TD> */
  background: #def;

  padding: 1px 3px 1px 1px;

  border: 1px solid #8FC4E8;

}

.calendar tbody td.active { /* Active (pressed) cells <TD> */
  background: #cde;

  padding: 2px 2px 0px 2px;

}

.calendar tbody td.selected { /* Cell showing today date */
  font-weight: bold;

  border: 1px solid #000;

  padding: 1px 3px 1px 1px;

  background: #fff;

  color: #000;

}

.calendar tbody td.weekend { /* Cells showing weekend days */
  color: #a66;

}

.calendar tbody td.today { /* Cell showing selected date */
  font-weight: bold;

  color: #D50000;

}

.calendar tbody .disabled { color: #999;
 }

.calendar tbody .emptycell { /* Empty cells (the best is to hide them) */
  visibility: hidden;

}

.calendar tbody .emptyrow { /* Empty row (some months need less than 6 rows) */
  display: none;

}

/* The footer part -- status bar and "Close" button */

.calendar tfoot .footrow { /* The <TR> in footer (only one right now) */
  text-align: center;

  background: #206A9B;

  color: #fff;

}

.calendar tfoot .ttip { /* Tooltip (status bar) cell <TD> */
  background: #000;

  color: #fff;

  border-top: 1px solid #206A9B;

  padding: 1px;

}

.calendar tfoot .hilite { /* Hover style for buttons in footer */
  background: #B8DAF0;

  border: 1px solid #178AEB;

  color: #000;

  padding: 1px;

}

.calendar tfoot .active { /* Active (pressed) style for buttons in footer */
  background: #006AA9;

  padding: 2px 0px 0px 2px;

}

/* Combo boxes (menus that display months/years for direct selection) */

.calendar .combo {
  position: absolute;

  display: none;

  top: 0px;

  left: 0px;

  width: 4em;

  cursor: default;

  border: 1px solid #655;

  background: #def;

  color: #000;

  font-size: 90%;

  z-index: 100;

}

.calendar .combo .label,
.calendar .combo .label-IEfix {
  text-align: center;

  padding: 1px;

}

.calendar .combo .label-IEfix {
  width: 4em;

}

.calendar .combo .hilite {
  background: #34ABFA;

  border-top: 1px solid #46a;

  border-bottom: 1px solid #46a;

  font-weight: bold;

}

.calendar .combo .active {
  border-top: 1px solid #46a;

  border-bottom: 1px solid #46a;

  background: #F1F8FC;

  font-weight: bold;

}

.calendar td.time {
  border-top: 1px solid #000;

  padding: 1px 0px;

  text-align: center;

  background-color: #E3F0F9;

}

.calendar td.time .hour,
.calendar td.time .minute,
.calendar td.time .ampm {
  padding: 0px 3px 0px 4px;

  border: 1px solid #889;

  font-weight: bold;

  background-color: #F1F8FC;

}

.calendar td.time .ampm {
  text-align: center;

}

.calendar td.time .colon {
  padding: 0px 2px 0px 3px;

  font-weight: bold;

}

.calendar td.time span.hilite {
  border-color: #000;

  background-color: #267DB7;

  color: #fff;

}

.calendar td.time span.active {
  border-color: red;

  background-color: #000;

  color: #A5FF00;

}

#message {
font-weight: bold;

text-align: center;

margin-left: 10px;

margin-bottom: 10px;

margin-top: 10px
}

#scroll
{
position: relative;

margin: 0 auto;

visibility: hidden;

background-color: white;

z-index: 1;

width: 300px;

height: 180px;

border-top-style: solid;

border-right-style: solid;

border-left-style: solid;

border-collapse: collapse;

border-bottom-style: solid;

border-color: #000000;

border-width: 1px;

overflow: auto
}
#scroll div
{
margin: 0 auto;

text-align:left
}
#suggest table
{
width: 270px;

font-size: 11px;

font-weight: normal;

color: #676767;

text-decoration: none;

border: 0px;

padding: 0px;

text-align:left;

margin: 0px
}
.highlightrow
{
background-color: #999999;

cursor: pointer
}
div.autosuggest
{
	position: absolute;

	background-image: url(img_inquisitor/as_pointer.gif);

	background-position: top;

	background-repeat: no-repeat;

	padding: 10px 0 0 0;

}
