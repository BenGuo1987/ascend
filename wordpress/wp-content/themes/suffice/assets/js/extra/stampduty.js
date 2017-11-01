// EDITABLE VARIABLES

// NSW NSW NSW NSW NSW

var NSW_registration_fee = 75; var NSW_transfer_title_fee = 75;
var NSW_propertyduty_tier1 = 14000; var NSW_propertyduty_tier1_rate = 1.25;
var NSW_propertyduty_tier2 = 30000; var NSW_propertyduty_tier2_rate = 1.50;
var NSW_propertyduty_tier3 = 80000; var NSW_propertyduty_tier3_rate = 1.75;
var NSW_propertyduty_tier4 = 300000; var NSW_propertyduty_tier4_rate = 3.50;
var NSW_propertyduty_tier5 = 1000000; var NSW_propertyduty_tier5_rate = 4.50;
var NSW_propertyduty_tier6 = 3000000; var NSW_propertyduty_tier6_rate = 5.50;
var NSW_propertyduty_above_tier6_rate = 7.00;
var NSW_mortgage_duty_cutoff = 16000; var NSW_mortgage_duty_amount_under_cutoff = 5;
var NSW_mortgage_duty_rate = 4; // Please note; enter the mortgage duty rate as percent rate x 1000. i.e. "0.4%" should be entered as "4".

// VIC VIC VIC VIC VIC
var VIC_registration_fee = 59;
var VIC_transfer_fee_tier1 = 500000; var VIC_transfer_fee_tier1_rate = 2.46;
var VIC_transfer_fee_above_tier1_amount = 1320;
var VIC_propertyduty_tier1 = 20000; var VIC_propertyduty_tier1_rate = 1.40;
var VIC_propertyduty_tier2 = 115000; var VIC_propertyduty_tier2_rate = 2.40;
var VIC_propertyduty_tier3 = 870000; var VIC_propertyduty_tier3_rate = 6.00;
var VIC_propertyduty_above_tier3_rate = 5.50;
var VIC_mortgage_duty_cutoff = 10000; var VIC_mortgage_duty_amount_under_cutoff = 0;
var VIC_mortgage_duty_rate = 0; // Note: enter this figure as the percent rate.

// ACT ACT ACT ACT ACT

var ACT_registration_fee = 82; var ACT_transfer_title_fee = 160; var ACT_mortgage_duty = 0;
var ACT_propertyduty_tier1 = 14000; var ACT_propertyduty_tier1_rate = 1.25;
var ACT_propertyduty_tier2 = 30000; var ACT_propertyduty_tier2_rate = 1.50;
var ACT_propertyduty_tier3 = 60000; var ACT_propertyduty_tier3_rate = 2.00;
var ACT_propertyduty_tier4 = 100000; var ACT_propertyduty_tier4_rate = 2.50;
var ACT_propertyduty_tier5 = 300000; var ACT_propertyduty_tier5_rate = 3.50;
var ACT_propertyduty_tier6 = 1000000; var ACT_propertyduty_tier6_rate = 4.50;
var ACT_propertyduty_above_tier6_rate = 5.50;

// QLD QLD QLD QLD QLD

var QLD_registration_fee = 102.5; var QLD_transfer_title_fee_base = 102.5;
var QLD_transfer_special_fee = 22;
var QLD_mortgage_duty_cutoff_ownocc = 70000; var QLD_mortgage_duty_amount_under_cutoff = 0;
var QLD_mortgage_duty_rate = 0.004; // Note: enter this figure as a decimal. i.e "0.4%" should be entered as "0.004".
var QLD_propertyduty_invest_tier1 = 20000; var QLD_propertyduty_invest_tier1_rate = 1.50;
var QLD_propertyduty_invest_tier2 = 50000; var QLD_propertyduty_invest_tier2_rate = 2.25;
var QLD_propertyduty_invest_tier3 = 100000; var QLD_propertyduty_invest_tier3_rate = 2.75;
var QLD_propertyduty_invest_tier4 = 250000; var QLD_propertyduty_invest_tier4_rate = 3.25;
var QLD_propertyduty_invest_tier5 = 500000; var QLD_propertyduty_invest_tier5_rate = 3.50;
var QLD_propertyduty_invest_above_tier5_rate = 3.75;
var QLD_propertyduty_owner_tier1 = 250000; var QLD_propertyduty_owner_tier1_rate = 1.00;
var QLD_propertyduty_owner_tier2 = 500000; var QLD_propertyduty_owner_tier2_rate = 3.50;
var QLD_propertyduty_owner_above_tier2_rate = 3.75;

// SA SA SA SA SA

var SA_registration_fee = 98; 
var SA_transfer_title_tier1_amount = 5000; var SA_transfer_title_tier1_fee = 98;
var SA_transfer_title_tier2_amount = 20000; var SA_transfer_title_tier2_fee = 109;
var SA_transfer_title_tier3_amount = 40000; var SA_transfer_title_tier3_fee = 121;
var SA_transfer_title_tier4_amount = 50000; var SA_transfer_title_tier4_fee = 174;
var SA_transfer_title_above_tier4_rate = 54; // Note: this figure is entered as a whole number. Multiply the percentage rate by 10,000.
var SA_propertyduty_tier1 = 12000; var SA_propertyduty_tier1_rate = 1.00;
var SA_propertyduty_tier2 = 30000; var SA_propertyduty_tier2_rate = 2.00;
var SA_propertyduty_tier3 = 50000; var SA_propertyduty_tier3_rate = 3.00;
var SA_propertyduty_tier4 = 100000; var SA_propertyduty_tier4_rate = 3.50;
var SA_propertyduty_tier5 = 1000000; var SA_propertyduty_tier5_rate = 4.00;
var SA_propertyduty_above_tier5_rate = 4.50;
var SA_mortgageduty_tier1 = 400; var SA_mortgageduty_tier1_amount = 0;
var SA_mortgageduty_tier2 = 6000; var SA_mortgageduty_tier2_amount = 10;
var SA_mortgageduty_tier3 = 10000; var SA_mortgageduty_tier3_rate = 0.35;
var SA_mortgageduty_above_tier3_rate = 0.35;

// TAS TAS TAS TAS TAS

var TAS_registration_fee = 86; var TAS_transfer_title_fee = 130;
var TAS_propertyduty_tier1 = 1300; var TAS_propertyduty_tier1_amount = 20; // Note: this is a dollar amount
var TAS_propertyduty_tier2 = 10000; var TAS_propertyduty_tier2_rate = 1.50; // Note: This and below are percentage rates
var TAS_propertyduty_tier3 = 30000; var TAS_propertyduty_tier3_rate = 2.00;
var TAS_propertyduty_tier4 = 75000; var TAS_propertyduty_tier4_rate = 2.50;
var TAS_propertyduty_tier5 = 150000; var TAS_propertyduty_tier5_rate = 3.00;
var TAS_propertyduty_tier6 = 225000; var TAS_propertyduty_tier6_rate = 3.50;
var TAS_propertyduty_above_tier6_rate = 4.00;
var TAS_mortgageduty_tier1 = 8000; var TAS_mortgageduty_tier1_amount = 20; // Note: This is a dollar amount
var TAS_mortgageduty_tier2 = 10000; var TAS_mortgageduty_tier2_rate = 0.25;
var TAS_mortgageduty_above_tier2_rate = 0.35;

// WA WA WA WA WA

var WA_registration_fee = 77;
var WA_transfer_fee_tier1 = 85000; var WA_transfer_fee_tier1_amount = 77; // Note: These are dollar amounts
var WA_transfer_fee_tier2 = 120000; var WA_transfer_fee_tier2_amount = 87;
var WA_transfer_fee_tier3 = 200000; var WA_transfer_fee_tier3_amount = 107;
var WA_transfer_fee_above_tier3_rate = 0.02; // Note: this is a percentage rate
var WA_propertyduty_tier1 = 80000; var WA_propertyduty_tier1_rate = 2.20;
var WA_propertyduty_owner_tier1 = 100000; var WA_propertyduty_owner_tier1_rate = 1.50;
var WA_propertyduty_tier2 = 100000; var WA_propertyduty_tier2_rate = 3.30;
var WA_propertyduty_tier3 = 250000; var WA_propertyduty_tier3_rate = 4.50;
var WA_propertyduty_tier4 = 500000; var WA_propertyduty_tier4_rate = 5.60;
var WA_propertyduty_above_tier4_rate = 6.00;
var WA_mortgageduty_tier1 = 35000; var WA_mortgageduty_tier1_rate = 0.0025; // Note: this is a percentage rate shown as decimal
// i.e. "0.25%" should be written as "0.0025"
var WA_mortgageduty_above_tier1_rate = 0.0040;

// NT NT NT NT NT

var NT_registration_fee = 90; var NT_transfer_title_fee = 90;
var NT_mortgageduty = 0;
var NT_propertyduty_tier1 = 500000; //Note: calculation for tier 1 rate is not possible to move
var NT_propertyduty_above_tier1_rate = 5.40;

// DO NOT EDIT BELOW THIS POINT

NSWtier1duty = (NSW_propertyduty_tier1*NSW_propertyduty_tier1_rate)/100;
NSWtier2duty = (((NSW_propertyduty_tier2 - NSW_propertyduty_tier1)*NSW_propertyduty_tier2_rate)/100)+NSWtier1duty;
NSWtier3duty = (((NSW_propertyduty_tier3 - NSW_propertyduty_tier2)*NSW_propertyduty_tier3_rate)/100)+NSWtier2duty;
NSWtier4duty = (((NSW_propertyduty_tier4 - NSW_propertyduty_tier3)*NSW_propertyduty_tier4_rate)/100)+NSWtier3duty;
NSWtier5duty = (((NSW_propertyduty_tier5 - NSW_propertyduty_tier4)*NSW_propertyduty_tier5_rate)/100)+NSWtier4duty;
NSWtier6duty = (((NSW_propertyduty_tier6 - NSW_propertyduty_tier5)*NSW_propertyduty_tier6_rate)/100)+NSWtier5duty;

VICtier1duty = (VIC_propertyduty_tier1*VIC_propertyduty_tier1_rate)/100;
VICtier2duty = (((VIC_propertyduty_tier2 - VIC_propertyduty_tier1)*VIC_propertyduty_tier2_rate)/100)+VICtier1duty;

ACTtier1duty = (ACT_propertyduty_tier1*ACT_propertyduty_tier1_rate)/100;
ACTtier2duty = (((ACT_propertyduty_tier2 - ACT_propertyduty_tier1)*ACT_propertyduty_tier2_rate)/100)+ACTtier1duty;
ACTtier3duty = (((ACT_propertyduty_tier3 - ACT_propertyduty_tier2)*ACT_propertyduty_tier3_rate)/100)+ACTtier2duty;
ACTtier4duty = (((ACT_propertyduty_tier4 - ACT_propertyduty_tier3)*ACT_propertyduty_tier4_rate)/100)+ACTtier3duty;
ACTtier5duty = (((ACT_propertyduty_tier5 - ACT_propertyduty_tier4)*ACT_propertyduty_tier5_rate)/100)+ACTtier4duty;
ACTtier6duty = (((ACT_propertyduty_tier6 - ACT_propertyduty_tier5)*ACT_propertyduty_tier6_rate)/100)+ACTtier5duty;

QLDtier1dutyi = (QLD_propertyduty_invest_tier1*QLD_propertyduty_invest_tier1_rate)/100;
QLDtier2dutyi = (((QLD_propertyduty_invest_tier2 - QLD_propertyduty_invest_tier1)*QLD_propertyduty_invest_tier2_rate)/100)+QLDtier1dutyi;
QLDtier3dutyi = (((QLD_propertyduty_invest_tier3 - QLD_propertyduty_invest_tier2)*QLD_propertyduty_invest_tier3_rate)/100)+QLDtier2dutyi;
QLDtier4dutyi = (((QLD_propertyduty_invest_tier4 - QLD_propertyduty_invest_tier3)*QLD_propertyduty_invest_tier4_rate)/100)+QLDtier3dutyi;
QLDtier5dutyi = (((QLD_propertyduty_invest_tier5 - QLD_propertyduty_invest_tier4)*QLD_propertyduty_invest_tier5_rate)/100)+QLDtier4dutyi;
QLDtier1dutyo = (QLD_propertyduty_owner_tier1*QLD_propertyduty_owner_tier1_rate)/100;
QLDtier2dutyo = (((QLD_propertyduty_owner_tier2 - QLD_propertyduty_owner_tier1)*QLD_propertyduty_owner_tier2_rate)/100)+QLDtier1dutyo;

SAtier1duty = (SA_propertyduty_tier1*SA_propertyduty_tier1_rate)/100;
SAtier2duty = (((SA_propertyduty_tier2 - SA_propertyduty_tier1)*SA_propertyduty_tier2_rate)/100)+SAtier1duty;
SAtier3duty = (((SA_propertyduty_tier3 - SA_propertyduty_tier2)*SA_propertyduty_tier3_rate)/100)+SAtier2duty;
SAtier4duty = (((SA_propertyduty_tier4 - SA_propertyduty_tier3)*SA_propertyduty_tier4_rate)/100)+SAtier3duty;
SAtier5duty = (((SA_propertyduty_tier5 - SA_propertyduty_tier4)*SA_propertyduty_tier5_rate)/100)+SAtier4duty;
SAtier3mortduty = (((SA_mortgageduty_tier3 - SA_mortgageduty_tier2)*SA_mortgageduty_tier3_rate)/100)+SA_mortgageduty_tier2_amount;

TAStier2duty = (((TAS_propertyduty_tier2 - TAS_propertyduty_tier1)*TAS_propertyduty_tier2_rate)/100);
TAStier3duty = (((TAS_propertyduty_tier3 - TAS_propertyduty_tier2)*TAS_propertyduty_tier3_rate)/100)+TAStier2duty;
TAStier4duty = (((TAS_propertyduty_tier4 - TAS_propertyduty_tier3)*TAS_propertyduty_tier4_rate)/100)+TAStier3duty;
TAStier5duty = (((TAS_propertyduty_tier5 - TAS_propertyduty_tier4)*TAS_propertyduty_tier5_rate)/100)+TAStier4duty;
TAStier6duty = (((TAS_propertyduty_tier6 - TAS_propertyduty_tier5)*TAS_propertyduty_tier6_rate)/100)+TAStier5duty;
TAStier2mortduty = (((TAS_mortgageduty_tier2 - TAS_mortgageduty_tier1)*TAS_mortgageduty_tier2_rate)/100)+TAS_mortgageduty_tier1_amount;

WAtier1duty = (WA_propertyduty_tier1*WA_propertyduty_tier1_rate)/100;
WAtier2duty = (((WA_propertyduty_tier2 - WA_propertyduty_tier1)*WA_propertyduty_tier2_rate)/100)+WAtier1duty;
WAtier3duty = (((WA_propertyduty_tier3 - WA_propertyduty_tier2)*WA_propertyduty_tier3_rate)/100)+WAtier2duty;
WAtier4duty = (((WA_propertyduty_tier4 - WA_propertyduty_tier3)*WA_propertyduty_tier4_rate)/100)+WAtier3duty;
WAmortdutytier1 = WA_mortgageduty_tier1*WA_mortgageduty_tier1_rate;
WAmortdutytier1 = Math.round(WAmortdutytier1);




function input_money(value){
	while ((i=value.indexOf(",")) >= 0) {
		value = value.substring(0,i) + value.substring(i+1,value.length);
	}
	i=parseInt(value);
	return i;
}

function format_money(value) {

	var result = "";
	value += ""; 

	if (value.length > 6)
		result = (value.substring(0, (value.length - 6))) + "," + 
				(value.substring((value.length - 6), (value.length - 3))) + "," + 
				(value.substring((value.length - 3), value.length));
	else{

		if (value.length > 3)
			result = (value.substring(0, (value.length - 3))) + "," + 
					(value.substring((value.length - 3), value.length));

		else 
			result = value;
	}
	return result;
}
	
function stampduty(dutycalc) {
var prop_value = dutycalc.prop_value.value;
prop_value = input_money(prop_value);
var loan_amt = dutycalc.loan_amt.value;
loan_amt = input_money(loan_amt);
var state = dutycalc.state.options[dutycalc.state.selectedIndex].value;
var loan_purpose = dutycalc.purpose.options[dutycalc.purpose.selectedIndex].value;
var fhb = dutycalc.fhb.options[dutycalc.fhb.selectedIndex].value;
var rego_fee;
var transfer_fee;
var prop_duty;
var mort_duty;

if ((isNaN(prop_value)) || (isNaN(loan_amt))) {
	window.alert("请输贷款金额和财产价值！");
}
else {

if (state == "VIC") {
	rego_fee = VIC_registration_fee;

	if (prop_value <= VIC_transfer_fee_tier1){
		transfer_fee = (((prop_value / 1000) * VIC_transfer_fee_tier1_rate) + 90);
	}
	else {
		transfer_fee = VIC_transfer_fee_above_tier1_amount;
	}
	if (prop_value <= VIC_propertyduty_tier1) {
		prop_duty = (((prop_value)/100)*VIC_propertyduty_tier1_rate);

	}
	else if ((prop_value > VIC_propertyduty_tier1) && (prop_value <= VIC_propertyduty_tier2)) {
		prop_duty = ((((prop_value - VIC_propertyduty_tier1)/100)*VIC_propertyduty_tier2_rate) + VICtier1duty);
	}

	else if ((prop_value > VIC_propertyduty_tier2) && (prop_value <= VIC_propertyduty_tier3)) {
		prop_duty = ((((prop_value - VIC_propertyduty_tier2)/100)*VIC_propertyduty_tier3_rate) + VICtier2duty);
	}
	
	else {
		prop_duty = (((prop_value)/100)*VIC_propertyduty_above_tier3_rate) ;
	}

	if (loan_amt <= VIC_mortgage_duty_cutoff) {
		mort_duty = VIC_mortgage_duty_amount_under_cutoff;
	}
	else {
		mort_duty = ((((loan_amt - VIC_mortgage_duty_cutoff)/200)*VIC_mortgage_duty_rate) + VIC_mortgage_duty_amount_under_cutoff);
	}
}

else if (state == "NSW") {
	transfer_fee = NSW_transfer_title_fee;
	rego_fee = NSW_registration_fee;

	if (prop_value <= NSW_propertyduty_tier1) {
		prop_duty = ((prop_value/100)*NSW_propertyduty_tier1_rate);
	}

	else if ((prop_value > NSW_propertyduty_tier1) && (prop_value <= NSW_propertyduty_tier2)) {
		prop_duty = ((((prop_value - NSW_propertyduty_tier1)/100)*NSW_propertyduty_tier2_rate) + NSWtier1duty);
	}

	else if ((prop_value > NSW_propertyduty_tier2) && (prop_value <= NSW_propertyduty_tier3)) {
		prop_duty = ((((prop_value - NSW_propertyduty_tier2)/100)*NSW_propertyduty_tier3_rate) + NSWtier2duty);
	}

	else if ((prop_value > NSW_propertyduty_tier3) && (prop_value <= NSW_propertyduty_tier4)) {
		prop_duty = ((((prop_value - NSW_propertyduty_tier3)/100)*NSW_propertyduty_tier4_rate) + NSWtier3duty);
	}

	else if ((prop_value > NSW_propertyduty_tier4) && (prop_value <= NSW_propertyduty_tier5)) {
		prop_duty = ((((prop_value - NSW_propertyduty_tier4)/100)*NSW_propertyduty_tier5_rate) + NSWtier4duty);
	}
	
	else if ((prop_value > NSW_propertyduty_tier5) && (prop_value <= NSW_propertyduty_tier6)) {
		prop_duty = ((((prop_value - NSW_propertyduty_tier5)/100)*NSW_propertyduty_tier6_rate) + NSWtier5duty);
	}
	
	else {
		prop_duty = ((((prop_value - NSW_propertyduty_tier6)/100)*NSW_propertyduty_above_tier6_rate) + NSWtier6duty);
	}
	
	if (loan_amt <= NSW_mortgage_duty_cutoff) {
		mort_duty = NSW_mortgage_duty_amount_under_cutoff;
	}
	else {
		mort_duty = ((((loan_amt - NSW_mortgage_duty_cutoff)/1000)*NSW_mortgage_duty_rate) + NSW_mortgage_duty_amount_under_cutoff);
	}
	
	if ((fhb=="YES")&&(prop_value<600000)&&(loan_purpose=="owner")){
		if(prop_value <= 500000){
			prop_duty = 0;
			mort_duty = 0;
		}
		else if ((prop_value > 500000)&&(prop_value < 600000)){
			prop_duty = ((prop_value*0.2249)-112450);
		}
		if ((prop_value > 500000)&&(prop_value <535000)){
			mort_duty = mort_duty*0.25;
		}
		else if ((prop_value >=535000)&&(prop_value < 565000)){
			mort_duty = mort_duty*0.5;
		}
		else {
			mort_duty = mort_duty*0.75;
		}
	}
}

else if (state == "ACT") {
	transfer_fee = ACT_transfer_title_fee;
	mort_duty = ACT_mortgage_duty;
	rego_fee = ACT_registration_fee;

	if (prop_value <= ACT_propertyduty_tier1) {
		prop_duty = ((prop_value/100)*ACT_propertyduty_tier1_rate);
	}

	else if ((prop_value > ACT_propertyduty_tier1) && (prop_value <= ACT_propertyduty_tier2)) {
		prop_duty = ((((prop_value - ACT_propertyduty_tier1)/100)*ACT_propertyduty_tier2_rate) + ACTtier1duty);
	}

	else if ((prop_value > ACT_propertyduty_tier2) && (prop_value <= ACT_propertyduty_tier3)) {
		prop_duty = ((((prop_value - ACT_propertyduty_tier2)/100)*ACT_propertyduty_tier3_rate) + ACTtier2duty);
	}

	else if ((prop_value > ACT_propertyduty_tier3) && (prop_value <= ACT_propertyduty_tier4)) {
		prop_duty = ((((prop_value - ACT_propertyduty_tier3)/100)*ACT_propertyduty_tier4_rate) + ACTtier3duty);
	}
	else if ((prop_value > ACT_propertyduty_tier4) && (prop_value <= ACT_propertyduty_tier5)) {
		prop_duty = ((((prop_value - ACT_propertyduty_tier4)/100)*ACT_propertyduty_tier5_rate) + ACTtier4duty);
	}

	else if ((prop_value > ACT_propertyduty_tier5) && (prop_value <= ACT_propertyduty_tier6)) {
		prop_duty = ((((prop_value - ACT_propertyduty_tier5)/100)*ACT_propertyduty_tier6_rate) + ACTtier5duty);
	}
	
	else {
		prop_duty = ((((prop_value - ACT_propertyduty_tier6)/100)*ACT_propertyduty_above_tier6_rate) + ACTtier6duty);
	}
}

else if (state == "QLD") {
	rego_fee = QLD_registration_fee;
	if (prop_value <=180000) {
		transfer_fee = QLD_transfer_title_fee_base;
	}
	else {
		transfer_fee = ((((prop_value - 180000)/10000)*QLD_transfer_special_fee)+QLD_transfer_title_fee_base);
	}
	if ((loan_amt <=QLD_mortgage_duty_cutoff_ownocc) && (loan_purpose == "owner")){
		mort_duty = QLD_mortgage_duty_amount_under_cutoff;
	}
	else if (loan_purpose == "owner") {
		mort_duty = ((loan_amt - QLD_mortgage_duty_cutoff_ownocc)*QLD_mortgage_duty_rate);
	}
	else {
		mort_duty = (loan_amt * QLD_mortgage_duty_rate);	
	}
	if (loan_purpose == "invest"){
		if (prop_value <=QLD_propertyduty_invest_tier1){
			prop_duty = ((prop_value/100)*QLD_propertyduty_invest_tier1_rate);
		}
		else if ((prop_value > QLD_propertyduty_invest_tier1) && (prop_value <=QLD_propertyduty_invest_tier2)){
			prop_duty = ((((prop_value - QLD_propertyduty_invest_tier1)/100)*QLD_propertyduty_invest_tier2_rate) + QLDtier1dutyi);
		}
		else if ((prop_value > QLD_propertyduty_invest_tier2) && (prop_value <=QLD_propertyduty_invest_tier3)){
			prop_duty = ((((prop_value - QLD_propertyduty_invest_tier2)/100)*QLD_propertyduty_invest_tier3_rate) + QLDtier2dutyi);
		}
		else if ((prop_value > QLD_propertyduty_invest_tier3) && (prop_value <= QLD_propertyduty_invest_tier4)){
			prop_duty = ((((prop_value - QLD_propertyduty_invest_tier3)/100)*QLD_propertyduty_invest_tier4_rate) + QLDtier3dutyi);
		}
		else if ((prop_value > QLD_propertyduty_invest_tier4) && (prop_value <= QLD_propertyduty_invest_tier5)){
			prop_duty = ((((prop_value - QLD_propertyduty_invest_tier4)/100)*QLD_propertyduty_invest_tier5_rate) + QLDtier4dutyi);
		}
		else {
			prop_duty = ((((prop_value - QLD_propertyduty_invest_tier5)/100)*QLD_propertyduty_invest_above_tier5_rate) + QLDtier5dutyi);
		}
	}
	else {
		if (prop_value <= QLD_propertyduty_owner_tier1) {
			prop_duty = ((prop_value/100)*QLD_propertyduty_owner_tier1_rate);
		}
		else if ((prop_value > QLD_propertyduty_owner_tier1) && (prop_value <= QLD_propertyduty_owner_tier2)) {
			prop_duty = ((((prop_value - QLD_propertyduty_owner_tier1)/100)*QLD_propertyduty_owner_tier2_rate) + QLDtier1dutyo);
		}
		else {
			prop_duty = ((((prop_value - QLD_propertyduty_owner_tier2)/100)*QLD_propertyduty_owner_above_tier2_rate) + QLDtier2dutyo);
		}
	}

	if ((fhb=="YES")&&(prop_value<160000)&&(loan_purpose=="owner")){
		if(prop_value <=80000){
			prop_duty = 0;
		}
		else if ((prop_value>80000)&&(prop_value<=150000)){
			prop_duty = ((prop_value/100)-500);
		}
		else if ((prop_value>150000)&&(prop_value<=155000)){
			prop_duty = ((prop_value/100)-300);
		}
		else {
			prop_duty = ((prop_value/100)-200);
		}
	}
}

else if (state == "SA") {
	rego_fee = SA_registration_fee;

	if (prop_value <= SA_transfer_title_tier1_amount)
        transfer_fee = SA_transfer_title_tier1_fee;
    if (prop_value > SA_transfer_title_tier1_amount && prop_value <= SA_transfer_title_tier2_amount)
        transfer_fee = SA_transfer_title_tier2_fee;
    if (prop_value > SA_transfer_title_tier2_amount && prop_value <= SA_transfer_title_tier3_amount)
        transfer_fee = SA_transfer_title_tier3_fee;
    if (prop_value > SA_transfer_title_tier3_amount && prop_value <= SA_transfer_title_tier4_amount)
        transfer_fee = SA_transfer_title_tier4_fee;
    if (prop_value > SA_transfer_title_tier4_amount) {
        transfer_fee = ((((prop_value - SA_transfer_title_tier4_amount) / 10000)*SA_transfer_title_above_tier4_rate) + SA_transfer_title_tier4_fee);
	}
	if (prop_value <= SA_propertyduty_tier1) {
		prop_duty = ((prop_value/100)*SA_propertyduty_tier1_rate);
	}

	else if ((prop_value > SA_propertyduty_tier1) && (prop_value <= SA_propertyduty_tier2)) {
		prop_duty = ((((prop_value - SA_propertyduty_tier1)/100)*SA_propertyduty_tier2_rate) + SAtier1duty);
	}

	else if ((prop_value > SA_propertyduty_tier2) && (prop_value <= SA_propertyduty_tier3)) {
		prop_duty = ((((prop_value - SA_propertyduty_tier2)/100)*SA_propertyduty_tier3_rate) + SAtier2duty);
	}

	else if ((prop_value > SA_propertyduty_tier3) && (prop_value <= SA_propertyduty_tier4)) {
		prop_duty = ((((prop_value - SA_propertyduty_tier3)/100)*SA_propertyduty_tier4_rate) + SAtier3duty);
	}

	else if ((prop_value > SA_propertyduty_tier4) && (prop_value <= SA_propertyduty_tier5)) {
		prop_duty = ((((prop_value - SA_propertyduty_tier4)/100)*SA_propertyduty_tier5_rate) + SAtier4duty);
	}
	
	else {
		prop_duty = ((((prop_value - SA_propertyduty_tier5)/100)*SA_propertyduty_above_tier5_rate) + SAtier5duty);
	}
	
	if (loan_amt <= SA_mortgageduty_tier1) {
		mort_duty = SA_mortgageduty_tier1_amount;
	}
	else if ((loan_amt > SA_mortgageduty_tier1) && (loan_amt <= SA_mortgageduty_tier2)) {
		mort_duty = SA_mortgageduty_tier2_amount;
	}
	else if ((loan_amt > SA_mortgageduty_tier2) && (loan_amt <= SA_mortgageduty_tier3)) {
		mort_duty = ((((loan_amt - SA_mortgageduty_tier2)/100)*SA_mortgageduty_tier3_rate) + SA_mortgageduty_tier2_amount);
	}
	else {
		mort_duty = ((((loan_amt - SA_mortgageduty_tier3)/100)*SA_mortgageduty_above_tier3_rate) + SAtier3mortduty);
	}

	if ((fhb=="YES")&&(prop_value<130000)&&(loan_purpose=="owner")){
		if (prop_value<=80000){
			prop_duty = 0;
		}
		else if ((prop_value > 80000)&&(prop_value < 100000)){
			prop_duty = ((prop_value-80000)*0.077);
		}
		else {
			prop_duty = (((prop_value-100000)*0.082)+1540);
		}
	}
}

else if (state == "TAS") {
	rego_fee = TAS_registration_fee;
	transfer_fee = TAS_transfer_title_fee;
	if (prop_value <= TAS_propertyduty_tier1) {
		prop_duty = TAS_propertyduty_tier1_amount;
	}
	else if ((prop_value > TAS_propertyduty_tier1) && (prop_value <= TAS_propertyduty_tier2)) {
		prop_duty = ((prop_value/100)*TAS_propertyduty_tier2_rate);
	}

	else if ((prop_value > TAS_propertyduty_tier2) && (prop_value <= TAS_propertyduty_tier3)) {
		prop_duty = ((((prop_value - TAS_propertyduty_tier2)/100)*TAS_propertyduty_tier3_rate) + TAStier2duty);
	}

	else if ((prop_value > TAS_propertyduty_tier3) && (prop_value <= TAS_propertyduty_tier4)) {
		prop_duty = ((((prop_value - TAS_propertyduty_tier3)/100)*TAS_propertyduty_tier4_rate) + TAStier3duty);
	}

	else if ((prop_value > TAS_propertyduty_tier4) && (prop_value <= TAS_propertyduty_tier5)) {
		prop_duty = ((((prop_value - TAS_propertyduty_tier4)/100)*TAS_propertyduty_tier5_rate) + TAStier4duty);
	}

	else if ((prop_value > TAS_propertyduty_tier5) && (prop_value <= TAS_propertyduty_tier6)) {
		prop_duty = ((((prop_value - TAS_propertyduty_tier5)/100)*TAS_propertyduty_tier6_rate) + TAStier5duty);
	}
	
	else {
		prop_duty = ((((prop_value - TAS_propertyduty_tier6)/100)*TAS_propertyduty_above_tier6_rate) + TAStier6duty);
	}
	
	if (loan_amt <= TAS_mortgageduty_tier1) {
		mort_duty = TAS_mortgageduty_tier1_amount;
	}
	else if ((loan_amt > TAS_mortgageduty_tier1) && (loan_amt <= TAS_mortgageduty_tier2)) {
		mort_duty = ((((loan_amt - TAS_mortgageduty_tier1)/100)*TAS_mortgageduty_tier2_rate) + TAS_mortgageduty_tier1_amount);
	}
	else {
		mort_duty = ((((loan_amt - TAS_mortgageduty_tier2)/100)*TAS_mortgageduty_above_tier2_rate) + TAStier2mortduty);
	}
}

else if (state == "WA") {
	rego_fee = WA_registration_fee;
	if (loan_amt <= WA_mortgageduty_tier1) {
		mort_duty = (loan_amt * WA_mortgageduty_tier1_rate);
	}
	else {
		mort_duty = (((loan_amt - WA_mortgageduty_tier1) * WA_mortgageduty_above_tier1_rate) + WAmortdutytier1)
	}
	if (prop_value <= WA_transfer_fee_tier1) {
		transfer_fee = WA_transfer_fee_tier1_amount;
	}
	else if ((prop_value > WA_transfer_fee_tier1) && (prop_value <= WA_transfer_fee_tier2)) {
		transfer_fee = WA_transfer_fee_tier2_amount;
	}
	else if ((prop_value > WA_transfer_fee_tier2) && (prop_value <= WA_transfer_fee_tier3)) {
		transfer_fee = WA_transfer_fee_tier3_amount;
	}
	else {
		transfer_fee = ((((prop_value - WA_transfer_fee_tier3)/100)*WA_transfer_fee_above_tier3_rate)+WA_transfer_fee_tier3_amount);
	}

	if ((loan_purpose == "owner") && (prop_value <= WA_propertyduty_owner_tier1)){
		prop_duty = ((prop_value/100)*WA_propertyduty_owner_tier1_rate);
	}
	else {
		if (prop_value <= WA_propertyduty_tier1) {	
			prop_duty = ((prop_value/100)*WA_propertyduty_tier1_rate);
		}

		else if ((prop_value > WA_propertyduty_tier1) && (prop_value <= WA_propertyduty_tier2)) {
			prop_duty = ((((prop_value - WA_propertyduty_tier1)/100)*WA_propertyduty_tier2_rate) + WAtier1duty);
		}

		else if ((prop_value > WA_propertyduty_tier2) && (prop_value <= WA_propertyduty_tier3)) {
			prop_duty = ((((prop_value - WA_propertyduty_tier2)/100)*WA_propertyduty_tier3_rate) + WAtier2duty);
		}

		else if ((prop_value > WA_propertyduty_tier3) && (prop_value <= WA_propertyduty_tier4)) {
			prop_duty = ((((prop_value - WA_propertyduty_tier3)/100)*WA_propertyduty_tier4_rate) + WAtier3duty);
		}

		else {
			prop_duty = ((((prop_value - WA_propertyduty_tier4)/100)*WA_propertyduty_above_tier4_rate) + WAtier4duty);
		}	
	}
	if ((fhb=="YES")&&(prop_value<135000)&&(loan_purpose=="owner")){
		prop_duty = prop_duty-500;
	}
}

else if (state == "NT") {
	rego_fee = NT_registration_fee;
	transfer_fee = NT_transfer_title_fee;
	mort_duty = NT_mortgageduty;

	if (prop_value <=NT_propertyduty_tier1) {
		newprop_value = (prop_value / 1000);
		prop_duty = ((0.065 * Math.pow(newprop_value,2)) + (21 * newprop_value));
	}

	else {
		prop_duty = (NT_propertyduty_above_tier1_rate * (prop_value/100));
	}
}

total = (prop_duty + mort_duty + transfer_fee + rego_fee);
total = Math.round(total);
total = format_money(total);
prop_duty = Math.round(prop_duty);
prop_duty = format_money(prop_duty);
mort_duty = Math.round(mort_duty);
mort_duty = format_money(mort_duty);
transfer_fee = Math.round(transfer_fee);
prop_value = format_money(prop_value);
loan_amt = format_money(loan_amt);

dutycalc.prop_value.value = prop_value;
dutycalc.loan_amt.value = loan_amt;
dutycalc.prop_duty.value = prop_duty;
dutycalc.mort_duty.value = mort_duty;
dutycalc.rego_fee.value = rego_fee;
dutycalc.transfer_fee.value = transfer_fee;
dutycalc.total.value = total;
}
}

// Last updated: 15/01/2009
// ChenZuJian@qq.com www.xuemu.net
// Copyright Ben Townsend 2003
// This calculator is licenced to Independent Mortgage Consulting.
//-->