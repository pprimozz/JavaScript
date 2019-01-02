<html>
<?php
header("Content-type: text/html; charset=UTF-8");

?>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/prototype/1.7.2.0/prototype.js"></script>
</head>
<body>
<style>
#tabela{
 height: 200px; 
font-size:12pt;
} 
#btn_post{margin-left:50px;}
#btn_izp{margin-left:50px;}
#btn_izr{margin-left:120px;}
</style>

<table id="tabela" style="width:100%" border="1">
<tr>
<th colspan="2">Parametri obračuna plač</th>
</tr>
  <tr>
    <td> <select id="select_menu">
  <option value="Bruto">Bruto znesek</option>
  <option value="Neto">Neto znesek</option>
</select> </td>
    <td><input type="text" id="znesek" value="0"></td>		
  </tr>
  <tr>
    <td>Dodatek na delovno dobo v %:</td>
    <td><input type="text" id="dodatek" value="0"></td>		
  </tr>
 <tr>
    <td>Bonitete:</td>
    <td><input type="text" id="bonitete" value="0"></td>		
  </tr>
 <tr>
    <td>Število otrok:</td>
    <td><input type="text" id="otroci" value="0"></td>		
  </tr>
 <tr>
    <td>Število otrok s posebnimi potrebami:</td>
    <td><input type="text" id="otroci_pos" value="0"></td>		
  </tr>
 <tr>
    <td> Davčne olajšave (brez SDO in DO na št. otrok):</td>
    <td><input type="text" id="davcne_olaj" value="0"></td>		
  </tr>
 <tr>
    <td>Materialni stroški, povračila (prevoz, prehrana):</td>
    <td><input type="text" id="materialni_str" value="0"></td>		
  </tr>
 <tr>
    <td>Mesec obračuna:</td>
    <td><select>
  <option value="januar">januar</option>
  <option value="februar">februar</option>
<option value="marec">marec</option>
<option value="april">april</option>
<option value="maj">maj</option>
<option value="junij">junij</option>
<option value="julij">julij</option>
<option value="avgust">avgust</option>
<option value="september">september</option>
<option value="oktober">oktober</option>
<option value="november">november</option>
<option value="december">december</option>
</select></td>		
  </tr>
</table></br> </br>
 <button type="button" id="btn_izr" onCLick="btn_izra();">Izračunaj</button>  <button type="button" id="btn_post" onCLick="btn_post();">
 Postavi na 0</button> 
</br></br>
<table id='tabela_izpiski' border="1" >
	<col width='10%'>
	<col width='15%'>
	<col width='25%'>
	<col width='25%'>
	<col width='25%'>

	<tr>
		<th align='left' colspan='5'><b>I. OSNOVNI PODATKI</b></th>
	</tr>

	<tr align='left'>
		<td colspan='4'>Splošna davčna olajšava:</td>
		<td><input type='text'  id='mSplosnaDavcnaOlajsava'></td>
	</tr>

	<tr align='left'>
		<td colspan='4'>Olajšave - ostalo:</td>
		<td><input type='text'  id='mDOlajsaveOstalo'></td>
	</tr>

	<tr align='left'>
		<td colspan='4'>Bruto osnova za obračun prispevkov:</td>
		<td><input type='text'  id='mDBrutoOsnova'></td>
	</tr>
	<tr align='left'>
		<td colspan='5' width='100%'><b>II. PRISPEVKI OD BRUTO PLAČ DELAVCEV</b></td>
	</tr>

	<tr align='left'>
		<td colspan='4'>&nbsp;1. Prispevki za socialno varnost (skupaj):</td>
		<td><input type='text'  id='mDPrispevki'></td>
	</tr>

	<tr align='left'>
		<td colspan='4'>&nbsp;&nbsp;<i>1.1. Prispevek za pokojninsko in invalidsko zavarovanje:</i></td>
		<td><input type='text'  id='mDPrispevkiZpiz'></td>
	</tr>

	<tr align='left'>
		<td colspan='4'>&nbsp;&nbsp;<i>1.2. Prispevek za zdravstveno zavarovanje:</i></td>
		<td><input type='text' id='mDPrispevkiZavarovanje'></td>
	</tr>

	<tr align='left'>
		<td colspan='4'>&nbsp;&nbsp;<i>1.3. Prispevek za zaposlovanje:</i></td>
		<td><input type='text' id='mDPrispevkiZaposlovanje'></td>
	</tr>

	<tr align='left'>
		<td colspan='4'>&nbsp;&nbsp;<i>1.4. Prispevek za starševsko varstvo:</i></td>
		<td><input type='text'  id='mDPrispevkiVarstvo'></td>
	</tr>

	<tr align='left'>
		<td colspan='4'>&nbsp;2. AKONTACIJA DOHODNINE:</td>
		<td><input type='text'id='mDDohodnina'></td>
	</tr>

	<tr align='left'>
		<td colspan='4'><i>&nbsp;&nbsp;2.1. Osnova:</i></td>
		<td><input type='text' id='mDDohodninaOsnova'></td>
	</tr>

	<tr align='left'>
		<td colspan='5'><i>&nbsp;&nbsp;2.2 RAZRED V LESTVICI OBRAČUNSKIH STOPENJ</i></td>
	</tr>

	<tr align='left'>
		<td><i>Razred</i></td>
		<td><i>Odstotek</i></td>
		<td><i>Znesek</i></td>
		<td><i>Osnova NAD</i></td>
		<td><i>Osnova DO</i></td>
	</tr>

	<tr align='left'>
		<td><input type='text'  id='mDDohodninaRazred'></td>
		<td><input type='text' id='mDDohodninaProcent'></td>
		<td><input type='text' id='mDDohodninaZnesek'></td>
		<td><input type='text'  id='mDDohodninaOsnovaNAD'></td>
		<td><input type='text' id='mDDohodninaOsnovaDO'></td>
	</tr>

	<tr align='left'>
		<td colspan='3'>&nbsp;3. Neto plača:</td>
		<td><input type='text'  id='mDNetoSIT'></td>
		<td><input type='text'  id='mDNeto'></td>
	</tr>

	<tr align='left'>
		<td colspan='4'>&nbsp;4. Materialni stroški:</td>
		<td><input type='text'  id='mDMaterialniStroski'></td>
	</tr>

	<tr align='left'>
		<td colspan='4'><b>IZPLAČILO</b></td>
		<td><input type='text' id='mDIzplacilo'></td>
	</tr>

	<tr align='left'>
		<td colspan='4'><b>Bruto osnovna plača:</b></td>
		<td><input type='text'  id='mDBrutoPlaca'></td>
	</tr>

	<tr align='left'>
		<td colspan='5' width='100%'><b>III. PRISPEVKI NA BRUTO PLAČO</b></td>
	</tr>

	<tr align='left'>
		<td colspan='4'>&nbsp;5. Prispevki za socialno varnost (skupaj):</td>
		<td><input type='text' id='mDDPrispevki'></td>
	</tr>

	<tr align='left'>
		<td colspan='4'>&nbsp;&nbsp;<i>5.1. Prispevek za pokojninsko in invalidsko zavarovanje:</i></td>
		<td><input type='text'  id='mDDPrispevkiZpiz'></td>
	</tr>

	<tr align='left'>
		<td colspan='4'>&nbsp;&nbsp;<i>5.2. Prispevek za zdravstveno zavarovanje:</i></td>
		<td><input type='text'  id='mDDPrispevkiZavarovanje'></td>
	</tr>

	<tr align='left'>
		<td colspan='4'>&nbsp;&nbsp;<i>5.3. Prispevek za zaposlovanje:</i></td>
		<td><input type='text'  id='mDDPrispevkiZaposlovanje'></td>
	</tr>

	<tr align='left'>
		<td colspan='4'>&nbsp;&nbsp;<i>5.4. Prispevek za poškodbe pri delu:</i></td>
		<td><input type='text' id='mDDPrispevkiPpd'></td>
	</tr>

	<tr align='left'>
		<td colspan='4'>&nbsp;&nbsp;<i>5.5. Prispevek za starševsko varstvo:</i></td>
		<td><input type='text'  id='mDDPrispevkiVarstvo'></td>
	</tr>
<!--
	<tr align='left'>
		<td colspan='4'>&nbsp;6. Davek na izplaďż˝ne plaďż˝:</td>
		<td><input type='text' ' id='mDDDavek'></td>
	</tr>

	<tr align='left'>
		<td colspan='5' width='100%'>&nbsp;&nbsp;6.1 RAZRED DAVKA NA IZPLAďż˝NE PLAďż˝</td>
	</tr>

	<tr align='left'>
		<td colspan='2'><i>Razred</i></td>
		<td><i>Osnova NAD</i></td>
		<td><i>Osnova DO</i></td>
		<td><i>Odstotek</i></td>
	</tr>

	<tr align='left'>
		<td colspan='2'><input type='text' id='mDDDavekRazred'></td>
		<td><input type='text' id='mDDDavekOsnovaNAD'></td>
		<td><input type='text' id='mDDDavekOsnovaDO'></td>
		<td><input type='text' ' id='mDDDavekProcent'></td>
	</tr>
-->
	<tr align='left'>
		<td colspan='4'><b>SKUPNI STROŠEK DELODAJALCA</b></td>
		<td><input type='text'' id='mDDIzplacilo'></td>
	</tr>

</table>

<script>


function btn_izra(){

 var selects = $("select_menu");
 var b_n = selects.options[selects.selectedIndex].value
 
	if (b_n=="Bruto"){			//Če je podan bruto znesek
 
	var bruto= parseFloat($('znesek').value);		// podatek 'BRUTO znesek'
	var dodatek = $('dodatek').value;	//podatek 'Dodatek na delovno dobo'
	var bonitete = $('bonitete').value; //podatek 'bonitete'
	var st_otrok = $('otroci').value; //podatek 'stevilo otrok'
	var st_otrok_pos = $('otroci_pos').value; //podatek 'stevilo otrok s posebnimi potrebami'
	var davc_ola= $('davcne_olaj').value; // podatek 'davčne olajšave'
	var mater_str= $('materialni_str').value; //podatek 'materialni stroški'
		
	if (bruto == parseFloat(0)){
	btn_post();
	}	else {
		/*
		if(bruto < parseFloat(905.53)){
			var spl_olajsava=parseFloat(543.32);
			} else if(bruto >parseFloat(905.53) && bruto<parseFloat(1047.55)) {
				var spl_olajsava=368.22;
				} else if(bruto>parseFloat(1047.54)){
					var spl_olajsava=parseFloat(275.22);	
					}		
	*/
	var spl_olajsava=parseFloat(275.22);
	var bruto_osnova=bruto;

	if(parseFloat(dodatek) > parseFloat(0)){		//če je podan dodatek na delovno dobo
	$('mDBrutoOsnova').value= (bruto * (parseFloat(1) + parseFloat(dodatek) / 100)).toFixed(2);  					// izračun 'Bruto osnova za obračun prispevkov'
	bruto_osnova = bruto * (parseFloat(1) + parseFloat(dodatek) / 100);
	} else {
		$('mDBrutoOsnova').value= (bruto).toFixed(2);
		bruto_osnova= bruto;
	}
		if (parseFloat(bonitete)>0){		//če so bonitete
		
			$('mDBrutoOsnova').value= (bruto_osnova + parseFloat(bonitete)).toFixed(2);
			bruto_osnova = bruto_osnova + parseFloat(bonitete);
			} else {	$('mDBrutoOsnova').value=(bruto_osnova).toFixed(2);	
		}
		
		
				if(parseFloat(st_otrok) == 0){		//če so otroci
						var st_otr = parseFloat(0);			    
				}
				else if(parseFloat(st_otrok) == 1){
						var st_otr= parseFloat(203.08);   
				}
				else if(parseFloat(st_otrok) == 2){
						var st_otr= parseFloat(423.85);    
				}
			
				else if(parseFloat(st_otrok) == 3){
						var st_otr= parseFloat(792.06);    
				}
			
				else if(parseFloat(st_otrok) == 4){
						var st_otr= parseFloat(1307.71);  
				}
			
				else if(parseFloat(st_otrok) == 5){
						var st_otr= parseFloat(1970.81);    
				}
				else if(parseFloat(st_otrok) == 6){
						var st_otr= parseFloat(2781.35);    
				}
				else if(parseFloat(st_otrok) == 7){
						var st_otr= parseFloat(3739.33);    
				}
				else if(parseFloat(st_otrok) == 8){
						var st_otr= parseFloat(4844.75);    
				}
				else if(parseFloat(st_otrok) == 9){
						var st_otr= parseFloat(6097.61);    
				}
				else if(parseFloat(st_otrok) == 10){
						var st_otr= parseFloat(7497.91);    
				}
				
				
				if (parseFloat(st_otrok_pos) ==0){		//če so otroci s posebnimi otroci 
				
					var st_otr_pos = parseFloat(0);
				}
				if (parseFloat(st_otrok_pos) ==1){
					var st_otr_pos = parseFloat(735.83);
				}
				else if (parseFloat(st_otrok_pos) ==2){
					var st_otr_pos = parseFloat(1489.35);
				}
				else if (parseFloat(st_otrok_pos) ==3){
					var st_otr_pos = parseFloat(2390.31);
				}
				else if (parseFloat(st_otrok_pos) == 4){
					var st_otr_pos = parseFloat(3438.71)
				}
				
					
					
			var ostale_olajsave1 =st_otr+st_otr_pos+parseFloat(davc_ola);
			$('mDOlajsaveOstalo').value= (st_otr+st_otr_pos+ parseFloat(davc_ola)).toFixed(2);		 //izračun 'Olajšave-ostalo'
	
	if (ostale_olajsave1 > 0 ){
			var ostale_olajsave = ostale_olajsave1;
	} else {
	$('mDOlajsaveOstalo').value=(parseFloat(davc_ola)).toFixed(2);		 //izračun 'Olajšave-ostalo'
	var ostale_olajsave=0;}
	
	$('mSplosnaDavcnaOlajsava').value= spl_olajsava;       // izračun 'Splošna davčna olajšava'
	$('mDPrispevki').value= 0;		 					//izračun 'prispevki za socialno varnost'
	$('mDPrispevkiZpiz').value= (bruto_osnova * parseFloat(0.155)).toFixed(2);  		// izračun 'Prispevek za pokojninsko in invalidsko zavarovanje'
	$('mDPrispevkiZavarovanje').value= (bruto_osnova*parseFloat(0.0636)).toFixed(2);		 	//izračun 'Prispevek za zdravstveno zavarovanje'
	$('mDPrispevkiZaposlovanje').value= (bruto_osnova*parseFloat(0.0014)).toFixed(2);  		// izračun 'Prispevek za zaposlovanje'
	$('mDPrispevkiVarstvo').value= (bruto_osnova*parseFloat(0.001)).toFixed(2);		 		//izračun 'Prispevek za starševsko varstvo'
	$('mDMaterialniStroski').value= mater_str;		 	//izračun 'Materialni stroški'
	$('mDBrutoPlaca').value= bruto;		 			//izračun 'bruto osnovna plača'
	$('mDDPrispevkiZpiz').value= (bruto_osnova*parseFloat(0.0885)).toFixed(2);  		// izračun 'Prispevek za ZPIS_2'
	$('mDDPrispevkiZavarovanje').value= (bruto_osnova*parseFloat(0.0656)).toFixed(2);		 //izračun 'Prispevek za zdravstveno zavarovanje_2'
	$('mDDPrispevkiZaposlovanje').value= (bruto_osnova*parseFloat(0.0006)).toFixed(2);  			// izračun 'Prispevek za zaposlovanje_2'
	$('mDDPrispevkiPpd').value= (bruto_osnova*parseFloat(0.0053)).toFixed(2);		 		//izračun 'Prispevek za poškodbe pri delu_2'
	$('mDDPrispevkiVarstvo').value= (bruto_osnova*parseFloat(0.001)).toFixed(2);  	// izračun 'Prispevek za starševsko varstvo_2'
	
	var prisp_zpis1 =parseFloat($('mDPrispevkiZpiz').value);
	var prisp_zdr_zav1 =parseFloat($('mDPrispevkiZavarovanje').value);
	var prisp_pos_delo1 =parseFloat($('mDPrispevkiZaposlovanje').value);
	var prisp_star_var1 =parseFloat($('mDPrispevkiVarstvo').value);
	var SUM2= parseFloat(prisp_zpis1+prisp_zdr_zav1+prisp_pos_delo1+prisp_star_var1);
	
	var prisp_zpis =parseFloat($('mDDPrispevkiZpiz').value);
	var prisp_zdr_zav =parseFloat($('mDDPrispevkiZavarovanje').value);
	var prisp_za_zap = parseFloat($('mDDPrispevkiZaposlovanje').value);
	var prisp_pos_delo =parseFloat($('mDDPrispevkiPpd').value);
	var prisp_star_var =parseFloat($('mDDPrispevkiVarstvo').value);
	var SUM1= parseFloat(prisp_zpis+prisp_zdr_zav+prisp_za_zap+prisp_pos_delo+prisp_star_var);
	

	
	$('mDPrispevki').value= SUM2.toFixed(2);		 					//izračun 'prispevki za socialno varnost'
	$('mDDPrispevki').value= SUM1.toFixed(2);		 				//izračun 'prispevki za socialno varnost (skupaj)_2'
	
	$('mDDIzplacilo').value= bruto_osnova + SUM1+ parseFloat(mater_str)-parseFloat(bonitete); 			 // izračun 'SKUPNI STROŠEK DELODAJALCA'
	
	
	
	var SUM_prispevkiZap =SUM2 + parseFloat(0.01);
	if (ostale_olajsave>0){
	var dohodnina = bruto_osnova - spl_olajsava - SUM_prispevkiZap- ostale_olajsave;
		if (dohodnina<0){
			dohodnina = parseFloat(0);
		}
		
	if (parseFloat(dohodnina) < parseFloat(668.44)){
		var dohodnina_osnova =parseFloat(668.44);
		var dohodnina_znesek = parseFloat(dohodnina) * parseFloat(0.16);
		$('mDDohodninaRazred').value= 1;  		// izračun 'Razred'
		$('mDDohodninaProcent').value= 16;		 		//izračun 'Odstotek'
		$('mDDohodninaZnesek').value= parseFloat(0);  		// izračun 'Znesek'
		$('mDDohodninaOsnovaNAD').value= 0;		 	//izračun 'OSnova NAD'
		
	}  else if (parseFloat(dohodnina) > parseFloat(668.44) && (parseFloat(dohodnina) < parseFloat(1580.02)) ){
		var dohodnina_znesek1 = parseFloat(dohodnina)-parseFloat(668.45);
		var dohodnina_znesek2 = dohodnina_znesek1 * parseFloat(0.27);
		var dohodnina_znesek =  dohodnina_znesek2 + parseFloat(106.95);
		$('mDDohodninaRazred').value= 2;  		// izračun 'Razred'
		$('mDDohodninaProcent').value= 27;		 		//izračun 'Odstotek'
			$('mDDohodninaZnesek').value= parseFloat(106.95);  		// izračun 'Znesek'
		$('mDDohodninaOsnovaNAD').value= parseFloat(668.44);		 	//izračun 'OSnova NAD'
		var dohodnina_osnova =parseFloat(1580.02);
		
	}  else if(parseFloat(dohodnina) > parseFloat(1580.02) && (parseFloat(dohodnina) < parseFloat(5908.93))){
		var dohodnina_znesek1 = parseFloat(dohodnina)-parseFloat(1580.02);
		var dohodnina_znesek2 = dohodnina_znesek1 * parseFloat(0.41);
		var dohodnina_znesek =  dohodnina_znesek2 + parseFloat(353.08);				//izračun akontacija
		$('mDDohodninaRazred').value= 3;  		// izračun 'Razred'
		$('mDDohodninaProcent').value= 41;		 		//izračun 'Odstotek'
		$('mDDohodninaZnesek').value= parseFloat(353.08);  		// izračun 'Znesek'
		$('mDDohodninaOsnovaNAD').value= parseFloat(1580.02);		 	//izračun 'OSnova NAD'
		var dohodnina_osnova =parseFloat(5908.93);
		
	}  else if (parseFloat(dohodnina) > parseFloat(5908.93)){
		var dohodnina_znesek1 = parseFloat(dohodnina)-parseFloat(5908.93);
		var dohodnina_znesek2 = dohodnina_znesek1 * parseFloat(0.50);
		var dohodnina_znesek =  dohodnina_znesek2 + parseFloat(2127.93);
		$('mDDohodninaOsnovaNAD').value= parseFloat(5908.93);		 	//izračun 'OSnova NAD'
		$('mDDohodninaRazred').value= 4;  		// izračun 'Razred'
		$('mDDohodninaProcent').value= 50;		 		//izračun 'Odstotek'
		$('mDDohodninaZnesek').value= parseFloat(2127.93);  		// izračun 'Znesek'
		var dohodnina_osnova =parseFloat(5908.93);
	} 
	}else{
	var dohodnina = bruto_osnova - spl_olajsava - SUM_prispevkiZap;			//osnova
	if (dohodnina<0){
			dohodnina = parseFloat(0);
		}
				if (parseFloat(dohodnina) < parseFloat(668.44)){
		var dohodnina_osnova =parseFloat(668.44);
		var dohodnina_znesek = parseFloat(dohodnina) * parseFloat(0.16);
		$('mDDohodninaRazred').value= 1;  		// izračun 'Razred'
		$('mDDohodninaProcent').value= 16;		 		//izračun 'Odstotek'
		$('mDDohodninaZnesek').value= parseFloat(0);  		// izračun 'Znesek'
		$('mDDohodninaOsnovaNAD').value= 0;		 	//izračun 'Osnova NAD'
		
	}  else if (parseFloat(dohodnina) > parseFloat(668.44) && (parseFloat(dohodnina) < parseFloat(1580.02)) ){
		var dohodnina_znesek1 = parseFloat(dohodnina)-parseFloat(668.45);
		var dohodnina_znesek2 = dohodnina_znesek1 * parseFloat(0.27);
		var dohodnina_znesek =  dohodnina_znesek2 + parseFloat(106.95);
		$('mDDohodninaRazred').value= 2;  		// izračun 'Razred'
		$('mDDohodninaProcent').value= 27;		 		//izračun 'Odstotek'
			$('mDDohodninaZnesek').value= parseFloat(106.95);  		// izračun 'Znesek'
		$('mDDohodninaOsnovaNAD').value= parseFloat(668.44);		 	//izračun 'OSnova NAD'
		var dohodnina_osnova =parseFloat(1580.02);
		
	}  else if(parseFloat(dohodnina) > parseFloat(1580.02) && (parseFloat(dohodnina) < parseFloat(5908.93))){
		var dohodnina_znesek1 = parseFloat(dohodnina)-parseFloat(1580.02);
		var dohodnina_znesek2 = dohodnina_znesek1 * parseFloat(0.41);
		var dohodnina_znesek =  dohodnina_znesek2 + parseFloat(353.08);				//izračun akontacija
		$('mDDohodninaRazred').value= 3;  		// izračun 'Razred'
		$('mDDohodninaProcent').value= 41;		 		//izračun 'Odstotek'
		$('mDDohodninaZnesek').value= parseFloat(353.08);  		// izračun 'Znesek'
		$('mDDohodninaOsnovaNAD').value= parseFloat(1580.02);		 	//izračun 'Osnova NAD'
		var dohodnina_osnova =parseFloat(5908.93);
		
	}  else if (parseFloat(dohodnina) > parseFloat(5908.93)){
		var dohodnina_znesek1 = parseFloat(dohodnina)-parseFloat(5908.93);
		var dohodnina_znesek2 = dohodnina_znesek1 * parseFloat(0.50);
		var dohodnina_znesek =  dohodnina_znesek2 + parseFloat(2127.93);
		$('mDDohodninaOsnovaNAD').value= parseFloat(5908.93);		 	//izračun 'Osnova NAD'
		$('mDDohodninaRazred').value= 4;  		// izračun 'Razred'
		$('mDDohodninaProcent').value= 50;		 		//izračun 'Odstotek'
		$('mDDohodninaZnesek').value= parseFloat(2127.93);  		// izračun 'Znesek'
		var dohodnina_osnova =parseFloat(5908.93);
	}

	}
	var neto_znesek = bruto_osnova-SUM_prispevkiZap-dohodnina_znesek;
	
	
		$('mDDohodnina').value= dohodnina_znesek.toFixed(2);  			// izračun 'AKONTACIJA DOHODNINE'
		$('mDDohodninaOsnova').value= dohodnina.toFixed(2) ;			//izračun 'Osnova'
		$('mDDohodninaOsnovaDO').value= dohodnina_osnova.toFixed(2);  	// izračun 'Osnova DO'
	
		var nnetoP = neto_znesek-parseFloat(bonitete)
		$('mDNeto').value= nnetoP.toFixed(2);  				// izračun 'Neto plača'
		var nnIZPL = neto_znesek + parseFloat(mater_str)-parseFloat(bonitete)
		$('mDIzplacilo').value= nnIZPL.toFixed(2);			// izračun 'IZPLAČILO'
		$('mDNetoSIT').value= (nnetoP * 239.640).toFixed(2) + " SIT";		 				//izračun 'Neto plača SIT'
} 
	}
	
	else if (b_n =="Neto"){						//če je podan NETO znesek
 
	var neto= parseFloat($('znesek').value);	// podatek 'NETO znesek'
	var dodatek = parseFloat($('dodatek').value);			//podatek 'Dodatek na delovno dobo'
	var bonitete = parseFloat($('bonitete').value); 		//podatek 'bonitete'
	var st_otrok = parseFloat($('otroci').value); 			//podatek 'stevilo otrok'
	var st_otrok_pos = parseFloat($('otroci_pos').value); 	//podatek 'stevilo otrok s posebnimi potrebami'
	var davc_ola= parseFloat($('davcne_olaj').value); 		// podatek 'davčne olajšave'
	var mater_str= parseFloat($('materialni_str').value); 	//podatek 'materialni stroški'	

	
	//izračun neto iz Tbruto
		
		 var max = neto * 2.2;
		 var x = max;
	
//začetek
		
	var bruto = x;
	
	if (bruto == parseFloat(0)){
	
	}	else {
		
	var spl_olajsava=parseFloat(275.22);
	var bruto_osnova=bruto;

	if(parseFloat(dodatek) > parseFloat(0)){		//če je podan dodatek na delovno dobo
	  					// izračun 'Bruto osnova za obračun prispevkov'
	bruto_osnova = bruto * (parseFloat(1) + parseFloat(dodatek) / 100);
	} else {
		
		bruto_osnova= bruto;
	}
		if (parseFloat(bonitete)>0){		//če so bonitete
		
			
			bruto_osnova = bruto_osnova + parseFloat(bonitete);
			} else {	
		}
		
		
				if(parseFloat(st_otrok) == 0){		//če so otroci
						var st_otr = parseFloat(0);			    
				}
				else if(parseFloat(st_otrok) == 1){
						var st_otr= parseFloat(203.08);   
				}
				else if(parseFloat(st_otrok) == 2){
						var st_otr= parseFloat(423.85);    
				}
			
				else if(parseFloat(st_otrok) == 3){
						var st_otr= parseFloat(792.06);    
				}
			
				else if(parseFloat(st_otrok) == 4){
						var st_otr= parseFloat(1307.71);  
				}
			
				else if(parseFloat(st_otrok) == 5){
						var st_otr= parseFloat(1970.81);    
				}
				else if(parseFloat(st_otrok) == 6){
						var st_otr= parseFloat(2781.35);    
				}
				else if(parseFloat(st_otrok) == 7){
						var st_otr= parseFloat(3739.33);    
				}
				else if(parseFloat(st_otrok) == 8){
						var st_otr= parseFloat(4844.75);    
				}
				else if(parseFloat(st_otrok) == 9){
						var st_otr= parseFloat(6097.61);    
				}
				else if(parseFloat(st_otrok) == 10){
						var st_otr= parseFloat(7497.91);    
				}
				
				
				if (parseFloat(st_otrok_pos) ==0){		//če so otroci s posebnimi otroci 
				
					var st_otr_pos = parseFloat(0);
				}
				if (parseFloat(st_otrok_pos) ==1){
					var st_otr_pos = parseFloat(735.83);
				}
				else if (parseFloat(st_otrok_pos) ==2){
					var st_otr_pos = parseFloat(1489.35);
				}
				else if (parseFloat(st_otrok_pos) ==3){
					var st_otr_pos = parseFloat(2390.31);
				}
				else if (parseFloat(st_otrok_pos) == 4){
					var st_otr_pos = parseFloat(3438.71)
				}
				
					
					
			var ostale_olajsave1 =st_otr+st_otr_pos+parseFloat(davc_ola);	 //izračun 'Olajšave-ostalo'
			
	
	if (ostale_olajsave1 > 0 ){
			var ostale_olajsave = ostale_olajsave1;
	} else {
			 //izračun 'Olajšave-ostalo'
	var ostale_olajsave=0;}
	
	
	var prisp_zpis1= bruto_osnova * parseFloat(0.155);  		// izračun 'Prispevek za pokojninsko in invalidsko zavarovanje'
	var prisp_zdr_zav1= bruto_osnova*parseFloat(0.0636);		 	//izračun 'Prispevek za zdravstveno zavarovanje'
	var prisp_pos_delo1 = bruto_osnova*parseFloat(0.0014);  		// izračun 'Prispevek za zaposlovanje'
	var prisp_star_var1= bruto_osnova*parseFloat(0.001);		 		//izračun 'Prispevek za starševsko varstvo'
	var prisp_zpis= bruto_osnova*parseFloat(0.0885);  		// izračun 'Prispevek za ZPIS_2'
	var prisp_zdr_zav =bruto_osnova*parseFloat(0.0656);		 //izračun 'Prispevek za zdravstveno zavarovanje_2'
	var prisp_za_zap = bruto_osnova*parseFloat(0.0006);  			// izračun 'Prispevek za zaposlovanje_2'
	var prisp_pos_delo= bruto_osnova*parseFloat(0.0053);		 		//izračun 'Prispevek za poškodbe pri delu_2'
	var prisp_star_var = bruto_osnova*parseFloat(0.001);  	// izračun 'Prispevek za starševsko varstvo_2'
	

	var SUM2= parseFloat(prisp_zpis1+prisp_zdr_zav1+prisp_pos_delo1+prisp_star_var1);	//izračun 'prispevki za socialno varnost'
	var SUM1= parseFloat(prisp_zpis+prisp_zdr_zav+prisp_za_zap+prisp_pos_delo+prisp_star_var); //izračun 'prispevki za socialno varnost (skupaj)_2'
	
	 				
	
	var sk_str_del = bruto_osnova + SUM1+ parseFloat(mater_str)-parseFloat(bonitete); 			 // izračun 'SKUPNI STROŠEK DELODAJALCA'
	
	
	
	var SUM_prispevkiZap =SUM2 + parseFloat(0.01);
	if (ostale_olajsave>0){
	var dohodnina = bruto_osnova - spl_olajsava - SUM_prispevkiZap- ostale_olajsave;
		if (dohodnina<0){
			dohodnina = parseFloat(0);
		}
		
	if (parseFloat(dohodnina) < parseFloat(668.44)){
		var dohodnina_osnova =parseFloat(668.44);
		var dohodnina_znesek = parseFloat(dohodnina) * parseFloat(0.16);
		var razreed= 1;  		// izračun 'Razred'
		var odstootek= 16;		 		//izračun 'Odstotek'
		var zneesek= parseFloat(0);  		// izračun 'Znesek'
		var OsnoovaNAD = 0;		 	//izračun 'OSnova NAD'
		
	}  else if (parseFloat(dohodnina) > parseFloat(668.44) && (parseFloat(dohodnina) < parseFloat(1580.02)) ){
		var dohodnina_znesek1 = parseFloat(dohodnina)-parseFloat(668.45);
		var dohodnina_znesek2 = dohodnina_znesek1 * parseFloat(0.27);
		var dohodnina_znesek =  dohodnina_znesek2 + parseFloat(106.95);
		var razreed= 2;  		// izračun 'Razred'
		var odstootek= 27;		 		//izračun 'Odstotek'
			var zneesek= parseFloat(106.95);  		// izračun 'Znesek'
		var OsnoovaNAD= parseFloat(668.44);		 	//izračun 'OSnova NAD'
		var dohodnina_osnova =parseFloat(1580.02);
		
	}  else if(parseFloat(dohodnina) > parseFloat(1580.02) && (parseFloat(dohodnina) < parseFloat(5908.93))){
		var dohodnina_znesek1 = parseFloat(dohodnina)-parseFloat(1580.02);
		var dohodnina_znesek2 = dohodnina_znesek1 * parseFloat(0.41);
		var dohodnina_znesek =  dohodnina_znesek2 + parseFloat(353.08);				//izračun akontacija
		var razreed= 3;  		// izračun 'Razred'
		var odstootek = 41;		 		//izračun 'Odstotek'
		var zneesek= parseFloat(353.08);  		// izračun 'Znesek'
		var OsnoovaNAD= parseFloat(1580.02);		 	//izračun 'OSnova NAD'
		var dohodnina_osnova =parseFloat(5908.93);
		
	}  else if (parseFloat(dohodnina) > parseFloat(5908.93)){
		var dohodnina_znesek1 = parseFloat(dohodnina)-parseFloat(5908.93);
		var dohodnina_znesek2 = dohodnina_znesek1 * parseFloat(0.50);
		var dohodnina_znesek =  dohodnina_znesek2 + parseFloat(2127.93);
		var OsnoovaNAD= parseFloat(5908.93);		 	//izračun 'OSnova NAD'
		var razreed= 4;  		// izračun 'Razred'
		var odstootek= 50;		 		//izračun 'Odstotek'
		var zneesek= parseFloat(2127.93);  		// izračun 'Znesek'
		var dohodnina_osnova =parseFloat(5908.93);
	} 
	}else{
	var dohodnina = bruto_osnova - spl_olajsava - SUM_prispevkiZap;			//osnova
	if (dohodnina<0){
			dohodnina = parseFloat(0);
		}
				if (parseFloat(dohodnina) < parseFloat(668.44)){
		var dohodnina_osnova =parseFloat(668.44);
		var dohodnina_znesek = parseFloat(dohodnina) * parseFloat(0.16);
		var razreed= 1;  		// izračun 'Razred'
		var odstootek= 16;		 		//izračun 'Odstotek'
		var zneesek= parseFloat(0);  		// izračun 'Znesek'
		var OsnoovaNAD= 0;		 	//izračun 'Osnova NAD'
		
	}  else if (parseFloat(dohodnina) > parseFloat(668.44) && (parseFloat(dohodnina) < parseFloat(1580.02)) ){
		var dohodnina_znesek1 = parseFloat(dohodnina)-parseFloat(668.45);
		var dohodnina_znesek2 = dohodnina_znesek1 * parseFloat(0.27);
		var dohodnina_znesek =  dohodnina_znesek2 + parseFloat(106.95);
		var razreed= 2;  		// izračun 'Razred'
		var odstootek= 27;		 		//izračun 'Odstotek'
		var zneesek = parseFloat(106.95);  		// izračun 'Znesek'
		var OsnoovaNAD= parseFloat(668.44);		 	//izračun 'OSnova NAD'
		var dohodnina_osnova =parseFloat(1580.02);
		
	}  else if(parseFloat(dohodnina) > parseFloat(1580.02) && (parseFloat(dohodnina) < parseFloat(5908.93))){
		var dohodnina_znesek1 = parseFloat(dohodnina)-parseFloat(1580.02);
		var dohodnina_znesek2 = dohodnina_znesek1 * parseFloat(0.41);
		var dohodnina_znesek =  dohodnina_znesek2 + parseFloat(353.08);				//izračun akontacija
		var razreed= 3;  		// izračun 'Razred'
		var odstootek= 41;		 		//izračun 'Odstotek'
		var zneesek= parseFloat(353.08);  		// izračun 'Znesek'
		var OsnoovaNAD= parseFloat(1580.02);		 	//izračun 'Osnova NAD'
		var dohodnina_osnova =parseFloat(5908.93);
		
	}  else if (parseFloat(dohodnina) > parseFloat(5908.93)){
		var dohodnina_znesek1 = parseFloat(dohodnina)-parseFloat(5908.93);
		var dohodnina_znesek2 = dohodnina_znesek1 * parseFloat(0.50);
		var dohodnina_znesek =  dohodnina_znesek2 + parseFloat(2127.93);
		var OsnoovaNAD= parseFloat(5908.93);		 	//izračun 'Osnova NAD'
		var razreed= 4;  		// izračun 'Razred'
		var odstootek= 50;		 		//izračun 'Odstotek'
		var zneesek = parseFloat(2127.93);  		// izračun 'Znesek'
		var dohodnina_osnova =parseFloat(5908.93);
	}

	}
	var neto_znesek = bruto_osnova-SUM_prispevkiZap-dohodnina_znesek;

		var neto_placa= neto_znesek-parseFloat(bonitete);  				// izračun 'Neto plača'
		var neto_izplacilo= neto_znesek + parseFloat(mater_str)-parseFloat(bonitete);			// izračun 'IZPLAČILO'
		
		
} 
	
	//konec	
		var result = {
			spl_olaj : spl_olajsava,
			olaj_ostal:        ostale_olajsave,
			bruto_osno:			bruto_osnova,
			prispevki_SUM: SUM2,
			prispZPIS:		prisp_zpis1,
			prispZDR:	prisp_zdr_zav1,
			prispZAPS:	prisp_pos_delo1,
			prispSTAR:	prisp_star_var1,
			akontacija:	dohodnina_znesek,
			osnova:		dohodnina,
			razred:		razreed,
			odstotek:	odstootek,
			znesek:		zneesek,
			osnovaNAD:	OsnoovaNAD,
			OsnovaDo:	dohodnina_osnova,
			NETOPlaca: 	neto_placa,
			materStr:	mater_str,
			izplacilo:	neto_izplacilo,
			bruto:		bruto_osnova,
			prispevki2_SUM: SUM1,
			prispZPIS2:		prisp_zpis,
			prispZDR2:	prisp_zdr_zav,
			prispZAPS2:	prisp_za_zap,
			prispSTAR2:	prisp_star_var,
			skupniStr:	sk_str_del
			};
				
				var stevec=0;
 				while (neto != Math.round(result["NETOPlaca"])){				
 					if (neto < Math.round(result["NETOPlaca"])){
					stevec=stevec+1;
							x = x - (x/2);

	var dodatek = $('dodatek').value;	//podatek 'Dodatek na delovno dobo'
	var bonitete = $('bonitete').value; //podatek 'bonitete'
	var st_otrok = $('otroci').value; //podatek 'stevilo otrok'
	var st_otrok_pos = $('otroci_pos').value; //podatek 'stevilo otrok s posebnimi potrebami'
	var davc_ola= $('davcne_olaj').value; // podatek 'davčne olajšave'
	var mater_str= $('materialni_str').value; //podatek 'materialni stroški'						
							//začetek
								var bruto = x;
	
	if (bruto == parseFloat(0)){
	
	}	else {
		
	var spl_olajsava=parseFloat(275.22);
	var bruto_osnova=bruto;

	if(parseFloat(dodatek) > parseFloat(0)){		//če je podan dodatek na delovno dobo
	  					
	bruto_osnova = bruto * (parseFloat(1) + parseFloat(dodatek) / 100);
	var kkk = bruto * (parseFloat(0) + parseFloat(dodatek) / 100);
	
	} else {
	var kkk=0;
		
		bruto_osnova= bruto;
	}
		if (parseFloat(bonitete)>0){		//če so bonitete
		
			
			bruto_osnova = bruto_osnova + parseFloat(bonitete);
			
			} else {	
		}
		
		
				if(parseFloat(st_otrok) == 0){		//če so otroci
						var st_otr = parseFloat(0);			    
				}
				else if(parseFloat(st_otrok) == 1){
						var st_otr= parseFloat(203.08);   
				}
				else if(parseFloat(st_otrok) == 2){
						var st_otr= parseFloat(423.85);    
				}
			
				else if(parseFloat(st_otrok) == 3){
						var st_otr= parseFloat(792.06);    
				}
			
				else if(parseFloat(st_otrok) == 4){
						var st_otr= parseFloat(1307.71);  
				}
			
				else if(parseFloat(st_otrok) == 5){
						var st_otr= parseFloat(1970.81);    
				}
				else if(parseFloat(st_otrok) == 6){
						var st_otr= parseFloat(2781.35);    
				}
				else if(parseFloat(st_otrok) == 7){
						var st_otr= parseFloat(3739.33);    
				}
				else if(parseFloat(st_otrok) == 8){
						var st_otr= parseFloat(4844.75);    
				}
				else if(parseFloat(st_otrok) == 9){
						var st_otr= parseFloat(6097.61);    
				}
				else if(parseFloat(st_otrok) == 10){
						var st_otr= parseFloat(7497.91);    
				}
				
				
				if (parseFloat(st_otrok_pos) ==0){		//če so otroci s posebnimi otroci 
				
					var st_otr_pos = parseFloat(0);
				}
				if (parseFloat(st_otrok_pos) ==1){
					var st_otr_pos = parseFloat(735.83);
				}
				else if (parseFloat(st_otrok_pos) ==2){
					var st_otr_pos = parseFloat(1489.35);
				}
				else if (parseFloat(st_otrok_pos) ==3){
					var st_otr_pos = parseFloat(2390.31);
				}
				else if (parseFloat(st_otrok_pos) == 4){
					var st_otr_pos = parseFloat(3438.71)
				}
				
					
					
			var ostale_olajsave1 =st_otr+st_otr_pos+parseFloat(davc_ola);	 //izračun 'Olajšave-ostalo'
			
	
	if (ostale_olajsave1 > 0 ){
			var ostale_olajsave = ostale_olajsave1;
	} else {
			 //izračun 'Olajšave-ostalo'
	var ostale_olajsave=0;}
	
	
	var prisp_zpis1= bruto_osnova * parseFloat(0.155);  		// izračun 'Prispevek za pokojninsko in invalidsko zavarovanje'
	var prisp_zdr_zav1= bruto_osnova*parseFloat(0.0636);		 	//izračun 'Prispevek za zdravstveno zavarovanje'
	var prisp_pos_delo1 = bruto_osnova*parseFloat(0.0014);  		// izračun 'Prispevek za zaposlovanje'
	var prisp_star_var1= bruto_osnova*parseFloat(0.001);		 		//izračun 'Prispevek za starševsko varstvo'
	var prisp_zpis= bruto_osnova*parseFloat(0.0885);  		// izračun 'Prispevek za ZPIS_2'
	var prisp_zdr_zav =bruto_osnova*parseFloat(0.0656);		 //izračun 'Prispevek za zdravstveno zavarovanje_2'
	var prisp_za_zap = bruto_osnova*parseFloat(0.0006);  			// izračun 'Prispevek za zaposlovanje_2'
	var prisp_pos_delo= bruto_osnova*parseFloat(0.0053);		 		//izračun 'Prispevek za poškodbe pri delu_2'
	var prisp_star_var = bruto_osnova*parseFloat(0.001);  	// izračun 'Prispevek za starševsko varstvo_2'

	var SUM2= parseFloat(prisp_zpis1+prisp_zdr_zav1+prisp_pos_delo1+prisp_star_var1);	//izračun 'prispevki za socialno varnost'
	var SUM1= parseFloat(prisp_zpis+prisp_zdr_zav+prisp_za_zap+prisp_pos_delo+prisp_star_var); //izračun 'prispevki za socialno varnost (skupaj)_2'
					
	var sk_str_del = bruto_osnova + SUM1+ parseFloat(mater_str)-parseFloat(bonitete); 			 // izračun 'SKUPNI STROŠEK DELODAJALCA'
	
	
	
	var SUM_prispevkiZap =SUM2 + parseFloat(0.01);
	if (ostale_olajsave>0){
	var dohodnina = bruto_osnova - spl_olajsava - SUM_prispevkiZap- ostale_olajsave;
		if (dohodnina<0){
			dohodnina = parseFloat(0);
		}
		
	if (parseFloat(dohodnina) < parseFloat(668.44)){
		var dohodnina_osnova =parseFloat(668.44);
		var dohodnina_znesek = parseFloat(dohodnina) * parseFloat(0.16);
		var razreed= 1;  		// izračun 'Razred'
		var odstootek= 16;		 		//izračun 'Odstotek'
		var zneesek= parseFloat(0);  		// izračun 'Znesek'
		var OsnoovaNAD = 0;		 	//izračun 'OSnova NAD'
		
	}  else if (parseFloat(dohodnina) > parseFloat(668.44) && (parseFloat(dohodnina) < parseFloat(1580.02)) ){
		var dohodnina_znesek1 = parseFloat(dohodnina)-parseFloat(668.45);
		var dohodnina_znesek2 = dohodnina_znesek1 * parseFloat(0.27);
		var dohodnina_znesek =  dohodnina_znesek2 + parseFloat(106.95);
		var razreed= 2;  		// izračun 'Razred'
		var odstootek= 27;		 		//izračun 'Odstotek'
			var zneesek= parseFloat(106.95);  		// izračun 'Znesek'
		var OsnoovaNAD= parseFloat(668.44);		 	//izračun 'OSnova NAD'
		var dohodnina_osnova =parseFloat(1580.02);
		
	}  else if(parseFloat(dohodnina) > parseFloat(1580.02) && (parseFloat(dohodnina) < parseFloat(5908.93))){
		var dohodnina_znesek1 = parseFloat(dohodnina)-parseFloat(1580.02);
		var dohodnina_znesek2 = dohodnina_znesek1 * parseFloat(0.41);
		var dohodnina_znesek =  dohodnina_znesek2 + parseFloat(353.08);				//izračun akontacija
		var razreed= 3;  		// izračun 'Razred'
		var odstootek = 41;		 		//izračun 'Odstotek'
		var zneesek= parseFloat(353.08);  		// izračun 'Znesek'
		var OsnoovaNAD= parseFloat(1580.02);		 	//izračun 'OSnova NAD'
		var dohodnina_osnova =parseFloat(5908.93);
		
	}  else if (parseFloat(dohodnina) > parseFloat(5908.93)){
		var dohodnina_znesek1 = parseFloat(dohodnina)-parseFloat(5908.93);
		var dohodnina_znesek2 = dohodnina_znesek1 * parseFloat(0.50);
		var dohodnina_znesek =  dohodnina_znesek2 + parseFloat(2127.93);
		var OsnoovaNAD= parseFloat(5908.93);		 	//izračun 'OSnova NAD'
		var razreed= 4;  		// izračun 'Razred'
		var odstootek= 50;		 		//izračun 'Odstotek'
		var zneesek= parseFloat(2127.93);  		// izračun 'Znesek'
		var dohodnina_osnova =parseFloat(5908.93);
	} 
	}else{
	var dohodnina = bruto_osnova - spl_olajsava - SUM_prispevkiZap;			//osnova
	if (dohodnina<0){
			dohodnina = parseFloat(0);
		}
				if (parseFloat(dohodnina) < parseFloat(668.44)){
		var dohodnina_osnova =parseFloat(668.44);
		var dohodnina_znesek = parseFloat(dohodnina) * parseFloat(0.16);
		var razreed= 1;  		// izračun 'Razred'
		var odstootek= 16;		 		//izračun 'Odstotek'
		var zneesek= parseFloat(0);  		// izračun 'Znesek'
		var OsnoovaNAD= 0;		 	//izračun 'Osnova NAD'
		
	}  else if (parseFloat(dohodnina) > parseFloat(668.44) && (parseFloat(dohodnina) < parseFloat(1580.02)) ){
		var dohodnina_znesek1 = parseFloat(dohodnina)-parseFloat(668.45);
		var dohodnina_znesek2 = dohodnina_znesek1 * parseFloat(0.27);
		var dohodnina_znesek =  dohodnina_znesek2 + parseFloat(106.95);
		var razreed= 2;  		// izračun 'Razred'
		var odstootek= 27;		 		//izračun 'Odstotek'
		var zneesek = parseFloat(106.95);  		// izračun 'Znesek'
		var OsnoovaNAD= parseFloat(668.44);		 	//izračun 'OSnova NAD'
		var dohodnina_osnova =parseFloat(1580.02);
		
	}  else if(parseFloat(dohodnina) > parseFloat(1580.02) && (parseFloat(dohodnina) < parseFloat(5908.93))){
		var dohodnina_znesek1 = parseFloat(dohodnina)-parseFloat(1580.02);
		var dohodnina_znesek2 = dohodnina_znesek1 * parseFloat(0.41);
		var dohodnina_znesek =  dohodnina_znesek2 + parseFloat(353.08);				//izračun akontacija
		var razreed= 3;  		// izračun 'Razred'
		var odstootek= 41;		 		//izračun 'Odstotek'
		var zneesek= parseFloat(353.08);  		// izračun 'Znesek'
		var OsnoovaNAD= parseFloat(1580.02);		 	//izračun 'Osnova NAD'
		var dohodnina_osnova =parseFloat(5908.93);
		
	}  else if (parseFloat(dohodnina) > parseFloat(5908.93)){
		var dohodnina_znesek1 = parseFloat(dohodnina)-parseFloat(5908.93);
		var dohodnina_znesek2 = dohodnina_znesek1 * parseFloat(0.50);
		var dohodnina_znesek =  dohodnina_znesek2 + parseFloat(2127.93);
		var OsnoovaNAD= parseFloat(5908.93);		 	//izračun 'Osnova NAD'
		var razreed= 4;  		// izračun 'Razred'
		var odstootek= 50;		 		//izračun 'Odstotek'
		var zneesek = parseFloat(2127.93);  		// izračun 'Znesek'
		var dohodnina_osnova =parseFloat(5908.93);
	}

	}
	var neto_znesek = bruto_osnova-SUM_prispevkiZap-dohodnina_znesek;

		var neto_placa= neto_znesek-parseFloat(bonitete);  				// izračun 'Neto plača'
		var neto_izplacilo= neto_znesek + parseFloat(mater_str)-parseFloat(bonitete);			// izračun 'IZPLAČILO'
		var neto_placaSIT = neto_placa*239.640;
		
} 
	
	//konec	
		var result = {
			spl_olaj : spl_olajsava,
			olaj_ostal:        ostale_olajsave,
			bruto_osno:			bruto_osnova,
			prispevki_SUM: SUM2,
			prispZPIS:		prisp_zpis1,
			prispZDR:	prisp_zdr_zav1,
			prispZAPS:	prisp_pos_delo1,
			prispSTAR:	prisp_star_var1,
			akontacija:	dohodnina_znesek,
			osnova:		dohodnina,
			razred:		razreed,
			odstotek:	odstootek,
			znesek:		zneesek,
			osnovaNAD:	OsnoovaNAD,
			OsnovaDo:	dohodnina_osnova,
			NETOPlaca: 	neto_placa,
			NETOPlacaSIT: neto_placaSIT,
			materStr:	mater_str,
			izplacilo:	neto_izplacilo,
			bruto:		bruto,
			prispevki2_SUM: SUM1,
			prispZPIS2:		prisp_zpis,
			prispZDR2:	prisp_zdr_zav,
			prispZAPS2:	prisp_za_zap,
			prispSTAR2:	prisp_star_var,
			skupniStr:	sk_str_del
			};
							
							//konec
								
							
					} else if (neto > Math.round(result["NETOPlaca"])){
					stevec+=1;
							x = x + (x/2);
							
							//začetek
	
	
	var dodatek = $('dodatek').value;	//podatek 'Dodatek na delovno dobo'
	var bonitete = $('bonitete').value; //podatek 'bonitete'
	var st_otrok = $('otroci').value; //podatek 'stevilo otrok'
	var st_otrok_pos = $('otroci_pos').value; //podatek 'stevilo otrok s posebnimi potrebami'
	var davc_ola= $('davcne_olaj').value; // podatek 'davčne olajšave'
	var mater_str= $('materialni_str').value; //podatek 'materialni stroški'	
							var bruto = x;
	
	if (bruto == parseFloat(0)){
	
	}	else {
		
	var spl_olajsava=parseFloat(275.22);
	var bruto_osnova=bruto;

	if(parseFloat(dodatek) > parseFloat(0)){		//če je podan dodatek na delovno dobo
	  					// izračun 'Bruto osnova za obračun prispevkov'
	bruto_osnova = bruto * (parseFloat(1) + parseFloat(dodatek) / 100);
	var kkk = bruto * (parseFloat(0) + parseFloat(dodatek) / 100);
	} else {
		var kkk=0;
		bruto_osnova= bruto;
	}
		if (parseFloat(bonitete)>0){		//če so bonitete
		
			
			bruto_osnova = bruto_osnova + parseFloat(bonitete);
			} else {	
		}		
				if(parseFloat(st_otrok) == 0){		//če so otroci
						var st_otr = parseFloat(0);			    
				}
				else if(parseFloat(st_otrok) == 1){
						var st_otr= parseFloat(203.08);   
				}
				else if(parseFloat(st_otrok) == 2){
						var st_otr= parseFloat(423.85);    
				}
			
				else if(parseFloat(st_otrok) == 3){
						var st_otr= parseFloat(792.06);    
				}
			
				else if(parseFloat(st_otrok) == 4){
						var st_otr= parseFloat(1307.71);  
				}
			
				else if(parseFloat(st_otrok) == 5){
						var st_otr= parseFloat(1970.81);    
				}
				else if(parseFloat(st_otrok) == 6){
						var st_otr= parseFloat(2781.35);    
				}
				else if(parseFloat(st_otrok) == 7){
						var st_otr= parseFloat(3739.33);    
				}
				else if(parseFloat(st_otrok) == 8){
						var st_otr= parseFloat(4844.75);    
				}
				else if(parseFloat(st_otrok) == 9){
						var st_otr= parseFloat(6097.61);    
				}
				else if(parseFloat(st_otrok) == 10){
						var st_otr= parseFloat(7497.91);    
				}
				
				
				if (parseFloat(st_otrok_pos) ==0){		//če so otroci s posebnimi otroci 
				
					var st_otr_pos = parseFloat(0);
				}
				if (parseFloat(st_otrok_pos) ==1){
					var st_otr_pos = parseFloat(735.83);
				}
				else if (parseFloat(st_otrok_pos) ==2){
					var st_otr_pos = parseFloat(1489.35);
				}
				else if (parseFloat(st_otrok_pos) ==3){
					var st_otr_pos = parseFloat(2390.31);
				}
				else if (parseFloat(st_otrok_pos) == 4){
					var st_otr_pos = parseFloat(3438.71)
				}
												
			var ostale_olajsave1 =st_otr+st_otr_pos+parseFloat(davc_ola);	 //izračun 'Olajšave-ostalo'
			
	
	if (ostale_olajsave1 > 0 ){
			var ostale_olajsave = ostale_olajsave1;
	} else {
			 //izračun 'Olajšave-ostalo'
	var ostale_olajsave=0;}
	
	
	var prisp_zpis1= bruto_osnova * parseFloat(0.155);  		// izračun 'Prispevek za pokojninsko in invalidsko zavarovanje'
	var prisp_zdr_zav1= bruto_osnova*parseFloat(0.0636);		 	//izračun 'Prispevek za zdravstveno zavarovanje'
	var prisp_pos_delo1 = bruto_osnova*parseFloat(0.0014);  		// izračun 'Prispevek za zaposlovanje'
	var prisp_star_var1= bruto_osnova*parseFloat(0.001);		 		//izračun 'Prispevek za starševsko varstvo'
	var prisp_zpis= bruto_osnova*parseFloat(0.0885);  		// izračun 'Prispevek za ZPIS_2'
	var prisp_zdr_zav =bruto_osnova*parseFloat(0.0656);		 //izračun 'Prispevek za zdravstveno zavarovanje_2'
	var prisp_za_zap = bruto_osnova*parseFloat(0.0006);  			// izračun 'Prispevek za zaposlovanje_2'
	var prisp_pos_delo= bruto_osnova*parseFloat(0.0053);		 		//izračun 'Prispevek za poškodbe pri delu_2'
	var prisp_star_var = bruto_osnova*parseFloat(0.001);  	// izračun 'Prispevek za starševsko varstvo_2'
	var SUM2= parseFloat(prisp_zpis1+prisp_zdr_zav1+prisp_pos_delo1+prisp_star_var1);	//izračun 'prispevki za socialno varnost'
	var SUM1= parseFloat(prisp_zpis+prisp_zdr_zav+prisp_za_zap+prisp_pos_delo+prisp_star_var); //izračun 'prispevki za socialno varnost (skupaj)_2'
	 				
	var sk_str_del = bruto_osnova + SUM1+ parseFloat(mater_str)-parseFloat(bonitete); 			 // izračun 'SKUPNI STROŠEK DELODAJALCA'
	
	
	
	var SUM_prispevkiZap =SUM2 + parseFloat(0.01);
	if (ostale_olajsave>0){
	var dohodnina = bruto_osnova - spl_olajsava - SUM_prispevkiZap- ostale_olajsave;		//osnova
		if (dohodnina<0){
			dohodnina = parseFloat(0);
		}
		
	if (parseFloat(dohodnina) < parseFloat(668.44)){
		var dohodnina_osnova =parseFloat(668.44);
		var dohodnina_znesek = parseFloat(dohodnina) * parseFloat(0.16);
		var razreed= 1;  		// izračun 'Razred'
		var odstootek= 16;		 		//izračun 'Odstotek'
		var zneesek= parseFloat(0);  		// izračun 'Znesek'
		var OsnoovaNAD = 0;		 	//izračun 'OSnova NAD'
		
	}  else if (parseFloat(dohodnina) > parseFloat(668.44) && (parseFloat(dohodnina) < parseFloat(1580.02)) ){
		var dohodnina_znesek1 = parseFloat(dohodnina)-parseFloat(668.45);
		var dohodnina_znesek2 = dohodnina_znesek1 * parseFloat(0.27);
		var dohodnina_znesek =  dohodnina_znesek2 + parseFloat(106.95);
		var razreed= 2;  		// izračun 'Razred'
		var odstootek= 27;		 		//izračun 'Odstotek'
			var zneesek= parseFloat(106.95);  		// izračun 'Znesek'
		var OsnoovaNAD= parseFloat(668.44);		 	//izračun 'OSnova NAD'
		var dohodnina_osnova =parseFloat(1580.02);
		
	}  else if(parseFloat(dohodnina) > parseFloat(1580.02) && (parseFloat(dohodnina) < parseFloat(5908.93))){
		var dohodnina_znesek1 = parseFloat(dohodnina)-parseFloat(1580.02);
		var dohodnina_znesek2 = dohodnina_znesek1 * parseFloat(0.41);
		var dohodnina_znesek =  dohodnina_znesek2 + parseFloat(353.08);				//izračun akontacija
		var razreed= 3;  		// izračun 'Razred'
		var odstootek = 41;		 		//izračun 'Odstotek'
		var zneesek= parseFloat(353.08);  		// izračun 'Znesek'
		var OsnoovaNAD= parseFloat(1580.02);		 	//izračun 'OSnova NAD'
		var dohodnina_osnova =parseFloat(5908.93);
		
	}  else if (parseFloat(dohodnina) > parseFloat(5908.93)){
		var dohodnina_znesek1 = parseFloat(dohodnina)-parseFloat(5908.93);
		var dohodnina_znesek2 = dohodnina_znesek1 * parseFloat(0.50);
		var dohodnina_znesek =  dohodnina_znesek2 + parseFloat(2127.93);
		var OsnoovaNAD= parseFloat(5908.93);		 	//izračun 'OSnova NAD'
		var razreed= 4;  		// izračun 'Razred'
		var odstootek= 50;		 		//izračun 'Odstotek'
		var zneesek= parseFloat(2127.93);  		// izračun 'Znesek'
		var dohodnina_osnova =parseFloat(5908.93);
	} 
	}else{
	var dohodnina = bruto_osnova - spl_olajsava - SUM_prispevkiZap;			//osnova
	if (dohodnina<0){
			dohodnina = parseFloat(0);
		}
				if (parseFloat(dohodnina) < parseFloat(668.44)){
		var dohodnina_osnova =parseFloat(668.44);
		var dohodnina_znesek = parseFloat(dohodnina) * parseFloat(0.16);
		var razreed= 1;  		// izračun 'Razred'
		var odstootek= 16;		 		//izračun 'Odstotek'
		var zneesek= parseFloat(0);  		// izračun 'Znesek'
		var OsnoovaNAD= 0;		 	//izračun 'Osnova NAD'
		
	}  else if (parseFloat(dohodnina) > parseFloat(668.44) && (parseFloat(dohodnina) < parseFloat(1580.02)) ){
		var dohodnina_znesek1 = parseFloat(dohodnina)-parseFloat(668.45);
		var dohodnina_znesek2 = dohodnina_znesek1 * parseFloat(0.27);
		var dohodnina_znesek =  dohodnina_znesek2 + parseFloat(106.95);
		var razreed= 2;  		// izračun 'Razred'
		var odstootek= 27;		 		//izračun 'Odstotek'
		var zneesek = parseFloat(106.95);  		// izračun 'Znesek'
		var OsnoovaNAD= parseFloat(668.44);		 	//izračun 'OSnova NAD'
		var dohodnina_osnova =parseFloat(1580.02);
		
	}  else if(parseFloat(dohodnina) > parseFloat(1580.02) && (parseFloat(dohodnina) < parseFloat(5908.93))){
		var dohodnina_znesek1 = parseFloat(dohodnina)-parseFloat(1580.02);
		var dohodnina_znesek2 = dohodnina_znesek1 * parseFloat(0.41);
		var dohodnina_znesek =  dohodnina_znesek2 + parseFloat(353.08);				//izračun akontacija
		var razreed= 3;  		// izračun 'Razred'
		var odstootek= 41;		 		//izračun 'Odstotek'
		var zneesek= parseFloat(353.08);  		// izračun 'Znesek'
		var OsnoovaNAD= parseFloat(1580.02);		 	//izračun 'Osnova NAD'
		var dohodnina_osnova =parseFloat(5908.93);
		
	}  else if (parseFloat(dohodnina) > parseFloat(5908.93)){
		var dohodnina_znesek1 = parseFloat(dohodnina)-parseFloat(5908.93);
		var dohodnina_znesek2 = dohodnina_znesek1 * parseFloat(0.50);
		var dohodnina_znesek =  dohodnina_znesek2 + parseFloat(2127.93);
		var OsnoovaNAD= parseFloat(5908.93);		 	//izračun 'Osnova NAD'
		var razreed= 4;  		// izračun 'Razred'
		var odstootek= 50;		 		//izračun 'Odstotek'
		var zneesek = parseFloat(2127.93);  		// izračun 'Znesek'
		var dohodnina_osnova =parseFloat(5908.93);
	}

	}
		var neto_znesek = bruto_osnova-SUM_prispevkiZap-dohodnina_znesek;

		var neto_placa= neto_znesek-parseFloat(bonitete);  				// izračun 'Neto plača'
		var neto_izplacilo= neto_znesek + parseFloat(mater_str)-parseFloat(bonitete);			// izračun 'IZPLAČILO'
		var neto_placaSIT = neto_placa * 239.640;
} 
	
	//konec	
		var result = {
			spl_olaj : spl_olajsava,
			olaj_ostal:        ostale_olajsave,
			bruto_osno:			bruto_osnova,
			prispevki_SUM: SUM2,
			prispZPIS:		prisp_zpis1,
			prispZDR:	prisp_zdr_zav1,
			prispZAPS:	prisp_pos_delo1,
			prispSTAR:	prisp_star_var1,
			akontacija:	dohodnina_znesek,
			osnova:		dohodnina,
			razred:		razreed,
			odstotek:	odstootek,
			znesek:		zneesek,
			osnovaNAD:	OsnoovaNAD,
			OsnovaDo:	dohodnina_osnova,
			NETOPlaca: 	neto_placa,
			NETOPlacaSIT: neto_placaSIT,
			materStr:	mater_str,
			izplacilo:	neto_izplacilo,
			bruto:		bruto,
			prispevki2_SUM: SUM1,
			prispZPIS2:		prisp_zpis,
			prispZDR2:	prisp_zdr_zav,
			prispZAPS2:	prisp_za_zap,
			prispPPD:	prisp_pos_delo,
			prispSTAR2:	prisp_star_var,
			skupniStr:	sk_str_del
			};								
							//konec				
 					}				
 				}	
 				alert(stevec);
 	 $('mSplosnaDavcnaOlajsava').value= result["spl_olaj"];  
	 $('mDOlajsaveOstalo').value= result["olaj_ostal"];
	 $('mDBrutoOsnova').value= result["bruto_osno"].toFixed(2); 
	 $('mDPrispevki').value= result["prispevki_SUM"].toFixed(2);
	 $('mDPrispevkiZpiz').value= result["prispZPIS"].toFixed(2); 
	 $('mDPrispevkiZavarovanje').value=result["prispZDR"].toFixed(2);
	 $('mDPrispevkiZaposlovanje').value=result["prispZAPS"].toFixed(2); 
	 $('mDPrispevkiVarstvo').value= result["prispSTAR"].toFixed(2);
	 $('mDDohodnina').value= result["akontacija"].toFixed(2); 
	 $('mDDohodninaOsnova').value= result["osnova"].toFixed(2);
	 $('mDDohodninaRazred').value= result["razred"];
	 $('mDDohodninaProcent').value= result["odstotek"].toFixed(2);
	 $('mDDohodninaZnesek').value= result["znesek"].toFixed(2); 
	 $('mDDohodninaOsnovaNAD').value= result["osnovaNAD"].toFixed(2);
	 $('mDDohodninaOsnovaDO').value= result["OsnovaDo"].toFixed(2);
	 $('mDNetoSIT').value= result["NETOPlacaSIT"].toFixed(2) + " SIT";
	 $('mDNeto').value= result["NETOPlaca"].toFixed(2);
	 $('mDMaterialniStroski').value = Math.round(result["materStr"]);
	 $('mDIzplacilo').value=result["izplacilo"].toFixed(2); 
	 $('mDBrutoPlaca').value= result["bruto"].toFixed(2);
	 $('mDDPrispevki').value= result["prispevki2_SUM"].toFixed(2);
	 $('mDDPrispevkiZpiz').value= result["prispZPIS2"].toFixed(2);
	 $('mDDPrispevkiZavarovanje').value=result["prispZDR2"].toFixed(2);
	 $('mDDPrispevkiZaposlovanje').value=result["prispZAPS2"].toFixed(2);
	 $('mDDPrispevkiPpd').value=result["prispPPD"].toFixed(2);
	 $('mDDPrispevkiVarstvo').value= result["prispSTAR2"].toFixed(2);
	 $('mDDIzplacilo').value= result["skupniStr"].toFixed(2); 												
	 }  
}

	 
function btn_post(){		//Postavi vse vrednosti na 0
	
	 $('znesek').value= 0 ;
	 $('dodatek').value= 0;
	 $('bonitete').value= 0; 
	 $('otroci').value= 0; 
	 $('otroci_pos').value= 0; 
	 $('davcne_olaj').value= 0; 
	 $('materialni_str').value=0;
	 $('mSplosnaDavcnaOlajsava').value= 0;  
	 $('mDOlajsaveOstalo').value= 0;
	 $('mDBrutoOsnova').value= 0; 
	 $('mDPrispevki').value= 0;
	 $('mDPrispevkiZpiz').value= 0; 
	 $('mDPrispevkiZavarovanje').value=0;
	 $('mDPrispevkiZaposlovanje').value=0; 
	 $('mDPrispevkiVarstvo').value= 0;
	 $('mDDohodnina').value= 0; 
	 $('mDDohodninaOsnova').value= 0;
	 $('mDDohodninaRazred').value= 0;
	 $('mDDohodninaProcent').value= 0;
	 $('mDDohodninaZnesek').value= 0; 
	 $('mDDohodninaOsnovaNAD').value= 0;
	 $('mDDohodninaOsnovaDO').value= 0;
	 $('mDNetoSIT').value= 0;
	 $('mDNeto').value= 0;
	 $('mDMaterialniStroski').value;
	 $('mDIzplacilo').value=0; 
	 $('mDBrutoPlaca').value= 0;
	 $('mDDPrispevki').value= 0;
	 $('mDDPrispevkiZpiz').value= 0;
	 $('mDDPrispevkiZavarovanje').value=0;
	 $('mDDPrispevkiZaposlovanje').value=0;
	 $('mDDPrispevkiPpd').value=0;
	 $('mDDPrispevkiVarstvo').value= 0;
	 $('mDDIzplacilo').value= 0; 			
}



</script>
</body>
</html>