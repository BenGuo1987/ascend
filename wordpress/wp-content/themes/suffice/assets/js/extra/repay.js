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


function calcRepay(repayments) {

var amt = repayments.loan_amount.value;
amt = input_money(amt);
var interest = parseFloat(repayments.interest_rate.value);
var term = parseInt(repayments.term.options[repayments.term.selectedIndex].value);
var type = repayments.rate_type.options[repayments.rate_type.selectedIndex].value;
var freq = repayments.period.options[repayments.period.selectedIndex].value;

if ((isNaN(amt)) || (amt <= 0)){
	alert("您输入的贷款金额无效，请输入贷款金额且高于0！");
	return;
	}

else if ((interest <= 0) || (interest >= 100)){
	alert("您输入的利率无效，数值必须在0和100之间！");
	return;
	} 

else {

var int_month = (interest/100.0)/12;
var int_fort = (interest/100.0)/26;
var int_week = (interest/100.0)/52;

//if(freq == "month"){
if(freq == "月"){

	var calc_term = term * 12;
	var calc_int = (interest/100.0)/12;
	var calc_rate = 1.0+calc_int;
}

else{
//	if(freq == "fortnight"){
	if(freq == "两周"){
		var calc_term = term * 26;
		var calc_int = (interest/100.0)/26;
		var calc_rate = 1.0+calc_int;
	}
		else{
			var calc_term = term * 52;
			var calc_int = (interest/100.0)/52;
			var calc_rate = 1.0+calc_int;
		}
}

if (type == "P_and_I") { 
 
	var ann = Math.pow(calc_rate, calc_term);
	var repay = amt * calc_int * ann / (ann - 1);
}

else { 

	var repay = (calc_int * amt);
} 

repay = Math.round(repay);
repay = format_money(repay);
repayments.repay_amount.value = repay;
repayments.loan_amount.value = format_money(amt);
repayments.frequency.value = freq;

} 
}


function calculation(detail){
	var _this= detail;
	_this.find('.someThing').show();
	var bHeight = $('body').height();
	if(_this.find(".someThing").length>0){
		var pTop = $('.pic-detail-list2').offset().top;
		var pHeight =  $('.pic-detail-list2').height();
		var dHeight = _this.height();
		var dTop = _this.offset().top;
		var dTop2 = dTop+(dHeight/2);
		var stHeight = _this.find('.someThing').height();
		var stHeight2 = stHeight/2;
		var stTop = _this.find('.someThing').offset().top;
		var sTop = $(window).scrollTop();
		var wHeight = $(window).height();

		if(dTop2-sTop <= stHeight && sTop+stHeight2 > dTop+dHeight){
			_this.find('.someThing').css({'top':-(dTop-sTop)+'px'});
		}else if(sTop+stHeight > dTop+dHeight || sTop+wHeight-dTop2-dHeight <= stHeight2){
			_this.find('.someThing').css({'top':-(stHeight-(sTop+wHeight-dTop))+'px'});
			//alert(-(stHeight-(sTop+wHeight-dTop2)));
		}else{
			_this.find('.someThing').css({'top':-stHeight2+'px'});
		}

		//alert(pTop+","+pHeight+","+dTop+","+dHeight+","+stHeight+","+stHeight2+","+stTop+","+sTop+","+wHeight);
	}
	_this.find('.someThing').hide();
}
/*$('.pic-detail-list2').find('.pic-detail').each(function(){
 calculation($(this));
 });*/
jQuery('.pic-detail-list2').find('.pic-detail').hover(function(){
	//calculation($(this));
	jQuery(this).find('.someThing').show();
	jQuery(this).find('.someThing-ico').show();
},function(){
	jQuery(this).find('.someThing').hide();
	jQuery(this).find('.someThing-ico').hide();
	//$(this).find('.someThing').css({'top':'0'});
});
function openCalc() {
	var i = jQuery.layer({
		type : 1,
		title : false,
		fix : false,
		offset:['50px' , ''],
		area : ['700px','auto'],
		page : {dom : '#layerBox'}
	});
}
function openCalc_StampDuty() {
	var i = jQuery.layer({
		type : 1,
		title : false,
		fix : false,
		offset:['50px' , ''],
		area : ['700px','auto'],
		page : {dom : '#layerBox2'}
	});
}

// Last updated: 15/01/2009
// ChenZuJian@qq.com www.xuemu.net
// Copyright Ben Townsend 2003
// This calculator is licenced to Independent Mortgage Consulting.
//-->

jQuery(function() {
	var $= jQuery;
	$('.school-nav .cat-list').off('click').on('click', 'li', function() {
		var $this = $(this);
		$('.school-nav .cat-list li').removeClass('active');
		$this.addClass('active');
		var $slug = $this.data('slug');
		$('.school-nav .sub-cat-list').addClass('hidden');
		$('.school-nav .sub-cat-list.' + $slug).removeClass('hidden');
		$('.school-items li').hide();
		$('.school-items li.'+ $slug).show();
	});

	$('.school-nav .sub-cat-list').off('click').on('click', 'li', function() {
		var $this = $(this);
		$('.school-nav .sub-cat-list li').removeClass('active');
		$this.addClass('active');
		var $slug = $this.data('slug');
		$('.school-items li').hide();
		$('.school-items li.'+ $slug).show();
	});

	$('.immigration-items .immigration-item').off('click').on('click', '.immigration-item-title', function() {
		var $this = $(this);
		var $thisContent = $this.parent().find('.immigration-item-content');
		if($thisContent.css('display') == 'none') {
			$('.immigration-items .immigration-item .immigration-item-content').slideUp();
			$thisContent.slideDown();
		} else {
			$thisContent.slideUp();
		}

	});

	// mobile header toggle close
	$('.header-action-container').off('click').on('click', function() {
		var $this = $(this);
		console.log('dddd');
		$this.find('.fa').toggleClass('fa-bars fa-times');
		if($this.hasClass('show-close')) {
			$this.removeClass('show-close');
			$('#site-navigation').slideUp();
		} else {
			$this.addClass('show-close');
			$('#site-navigation').slideDown();
		}

	});

	$('.online-contact .aside-contact-btn').off('click').on('click', function(e) {
		e.stopPropagation();
		var $this = $(this);
		$this.toggleClass('active');
		var $contentWrapper = $this.parent();
		$contentWrapper.toggleClass('show');
		var $content = $('.online-contact .online-contact-content');
		$content.toggleClass('show-content');
		var winH = $(window).height();
		if($content.height() > winH) {
			$content.css({
				'height': winH + 'px',
				'overflow-y': 'scroll'
			});
		}
	});

	// $('body').not($('.online-contact .online-contact-content')).off('click').on('click', function(e) {
	// 	e.stopPropagation();
	// 	var $this = $(this);
	//
	// 	if($this.parents('.online-contact').length == 0) {
	// 		var $onlineBtn = $('.online-contact .aside-contact-btn');
	// 		$onlineBtn.removeClass('active');
	// 		$('.online-contact .online-contact-content').removeClass('show-content');
	// 	}
	// });

	var $body = $('.intro-video').parents('body');
	if($body.length == 0) {
		$('.online-contact').show();
	} else {
		$body.find('.site-header').hide();
		$body.find('.site-footer').hide();
	}

	$('.feature-search-city').off('click').on('click', function() {
		if($('.search-city-list').css('display') == 'none') {
			$('.search-city-list').slideDown();
		} else {
			$('.search-city-list').slideUp();
		}
	});

	$('.search-city-list').on('click', 'li', function(e) {
		e.stopPropagation();
		var $this = $(this);
		var $searchValue = $('.feature-search-city .search-value');
		$searchValue.attr('data-city', $this.data('city')).text($this.text());
		$('.search-city-list').slideUp();
		var $keywords = $('.feature-search-text');
		if($keywords.val() != '') {
			var href = location.href.split('?')[0];
			window.location = href + '?keywords='+$keywords.val() + '&city='+$searchValue.data('city');
		}
	});

	$('.feature-search-text').on('keypress', function(e) {
		if(event.keyCode == "13") {
			$this = $(this);
			var $searchValue = $('.feature-search-city .search-value');
			var href = location.href.split('?')[0];
			window.location = href + '?keywords='+$this.val() + '&city='+$searchValue.data('city');
		}
	});

});