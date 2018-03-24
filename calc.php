
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Commission Calculator</title>
<link rel="shortcut icon" href="https://calculator.me/images/favicon.ico">
<link rel="icon" href="https://calculator.me/favicon.ico" type="image/x-icon">

<link rel='stylesheet' id='theme-style-css'  href='https://calculator.me/files/style.css?ver=3.7' type='text/css' media='all' /> <link rel='stylesheet' id='theme-font-css'  href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&#038;subset=latin,latin-ext' type='text/css' media='all' />
<script type='text/javascript' src='https://calculator.me/files/jquery.js?ver=1.10.2'></script>
<script type='text/javascript' src='https://calculator.me/files/jquery-migrate.min.js?ver=1.2.1'></script>
<!--[if lt IE 9]><script src="https://calculator.me/files/html5.js"></script><![endif]--><!--[if (gte IE 6)&(lte IE 8)]><script src="https://calculator.me/files/selectivizr-min.js"></script><![endif]-->	
<script Language='JavaScript'>

function sn(num) {

   num=num.toString();


   var len = num.length;
   var rnum = "";
   var test = "";
   var j = 0;

   var b = num.substring(0,1);
   if(b == "-") {
      rnum = "-";
   }

   for(i = 0; i <= len; i++) {

      b = num.substring(i,i+1);

      if(b == "0" || b == "1" || b == "2" || b == "3" || b == "4" || b == "5" || b == "6" || b == "7" || b == "8" || b == "9" || b == ".") {
         rnum = rnum + "" + b;

      }

   }

   if(rnum == "" || rnum == "-") {
      rnum = 0;
   }

   rnum = Number(rnum);

   return rnum;

}



function fns(num, places, comma, type, show) {

    var sym_1 = "$";
    var sym_2 = ""; 

    var isNeg=0;

    if(num < 0) {
       num=num*-1;
       isNeg=1;
    }

    var myDecFact = 1;
    var myPlaces = 0;
    var myZeros = "";
    while(myPlaces < places) {
       myDecFact = myDecFact * 10;
       myPlaces = Number(myPlaces) + Number(1);
       myZeros = myZeros + "0";
    }
    
	onum=Math.round(num*myDecFact)/myDecFact;
		
	integer=Math.floor(onum);

	if (Math.ceil(onum) == integer) {
		decimal=myZeros;
	} else{
		decimal=Math.round((onum-integer)* myDecFact)
	}
	decimal=decimal.toString();
	if (decimal.length<places) {
        fillZeroes = places - decimal.length;
	   for (z=0;z<fillZeroes;z++) {
        decimal="0"+decimal;
        }
     }

   if(places > 0) {
      decimal = "." + decimal;
   }

   if(comma == 1) {
	integer=integer.toString();
	var tmpnum="";
	var tmpinteger="";
	var y=0;

	for (x=integer.length;x>0;x--) {
		tmpnum=tmpnum+integer.charAt(x-1);
		y=y+1;
		if (y==3 & x>1) {
			tmpnum=tmpnum+",";
			y=0;
		}
	}

	for (x=tmpnum.length;x>0;x--) {
		tmpinteger=tmpinteger+tmpnum.charAt(x-1);
	}


	finNum=tmpinteger+""+decimal;
   } else {
      finNum=integer+""+decimal;
   }

    if(isNeg == 1) {
       if(type == 1 && show == 1) {
          finNum = "-" + sym_1 + "" + finNum + "" + sym_2;
       } else {
          finNum = "-" + finNum;
       }
    } else {
       if(show == 1) {
          if(type == 1) {
             finNum = sym_1 + "" + finNum + "" + sym_2;
          } else
          if(type == 2) {
             finNum = finNum + "%";
          }

       }

    }

	return finNum;
}


function computeForm(form) {

   var Vprice = sn(document.calc.price.value);

   if (Vprice == 0) {
      alert("Please enter the selling price of your property.");
      document.calc.price.focus();
   } else {

      var Vpercent = sn(document.calc.percent.value);
      if (Vpercent >= 1.0) {
         Vpercent = Vpercent / 100.0;
      }

      var Vadvert_cost = sn(document.calc.advert_cost.value);
      var Vcommission = (Vprice * Vpercent);
      document.calc.commission.value = fns(Vcommission,2,1,1,1);

      var Vtotal_cost = Number(Vadvert_cost) + Number(Vcommission);
      document.calc.total_cost.value = fns(Vtotal_cost,2,1,1,1);

   }
}

function clear_results(form) {

   document.calc.commission.value = "";
   document.calc.total_cost.value = "";

}</script>

</head>

<body class="single">

 


<!-- #primary -->
<div id="primary" class="sidebar- clearfix"> 
<div class="container">
  <!-- #content -->
  <section id="content" role="main">

<article class="post format-standard hentry clearfix">

 <p> This calculator will help you to estimate the cost of selling your home. </p>

<form name="calc" method="post" action="#">

 <table border='0' width='90%'>
 <tbody>
 <tr >
 <td >
 
 Sale price ($):
 
 </td>
 <td align="center" >
 <input type="text" name="price" size="15" onKeyUp="clear_results(this.form)" /> 
 </td>
 </tr>

 <tr >
 <td >
 
 Commission percentage (%):
 
 </td>
 <td align="center" >
 <input type="text" name="percent" size="15" onKeyUp="clear_results(this.form)" /> 2.5
 </td>
 </tr>

 <tr >
 <td >
 
 Advertising cost ($):
 
 </td>
 <td align="center" >
 <input type="text" name="advert_cost" size="15" onKeyUp="clear_results(this.form)" />
 </td>
 </tr>

 <tr>
 <td align="center"  colspan="2">
     <input type="button" value="Compute" onClick="computeForm(this.form)" />
 <input type="reset" value="Reset" />
 </td>
 </tr>

 <tr >
 <td >
 
 Commission amount:
 
 </td>
 <td align="center" >
 <input type="text" name="commission" size="15" />
 </td>
 </tr>

 <tr >
 <td >
 
 Total cost (commission plus advertising):
 
 </td>
 <td align="center" >
 <input type="text" name="total_cost" size="15" />
 </td>
 </tr>



 </tbody>
 </table>
 </form> 
          
		</body>
</html>
