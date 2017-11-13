<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ThemeGrill
 * @subpackage Suffice
 * @since Suffice 1.0.0
 */

?>

		</div><!-- #content -->
	</div> <!-- .container -->

	<?php
	/**
	 * suffice_before_footer hook
	 */
	do_action( 'suffice_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-top">
			<div class="container">

				<div class="useful-tools clearfix">
					<div class="icon-box icon-box-center icon-box-hexagon exchange-rate-box">
						<div class="icon-box-icon" >
							<div class="icon-box-icon-container">
								<div class="icon-box-inner-icon">
									<div class="fa-tool-icon ex-rate"></div>
								</div>
							</div>
						</div>
						<div class="icon-box-description">
							<h5 class="icon-box-title"><?php echo(__('Exchange Rate', 'default')) ?></h5>
						</div>
						<div class="exchange-rate-banks">
							<h2><?php echo(__('Please select a banking institution', 'default')) ?></h2>
							<ul class="bank-list">
								<li>
									<a target="_blank" href="http://www.boc.cn/sourcedb/whpj/">
										<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/extra/bank_1.jpg' ); ?>" alt="<?php echo(__('Bank of China', 'default')) ?>">
										<h5><?php echo(__('Bank of China', 'default')) ?></h5>
									</a>
								</li>
								<li>
									<a target="_blank" href="http://www.nab.com.au/personal/planning-tools/travel/foreign-exchange-rates">
										<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/extra/bank_2.jpg' ); ?>" alt="<?php echo(__('National Australia Bank', 'default')) ?>">
										<h5><?php echo(__('National Australia Bank', 'default')) ?></h5>
									</a>
								</li>
								<li>
									<a target="_blank" href="https://service.commbank.com.au/guides/personal/other/foreignexchangerates.asp">
										<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/extra/bank_3.jpg' ); ?>" alt="<?php echo(__('Commonwealth Bank of Australia', 'default')) ?>">
										<h5><?php echo(__('Commonwealth Bank of Australia', 'default')) ?></h5>
									</a>
								</li>
								<li>
									<a target="_blank" href="http://www.anz.com.au/aus/RateFee/fxrates/fxpopup.asp">
										<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/extra/bank_4.jpg' ); ?>" alt="<?php echo(__('Australia and New Zealand Bank', 'default')) ?>">
										<h5><?php echo(__('Australia and New Zealand Bank', 'default')) ?></h5>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="icon-box icon-box-center icon-box-hexagon" onclick="openCalc_StampDuty();">
						<div class="icon-box-icon" >
							<div class="icon-box-icon-container">
								<div class="icon-box-inner-icon">
									<div class="fa-tool-icon stamp-duty"></div>
								</div>
							</div>
						</div>
						<div class="icon-box-description">
							<h5 class="icon-box-title"><?php echo(__('Stamp Duty', 'default')) ?></h5>
						</div>
					</div>
					<div class="icon-box icon-box-center icon-box-hexagon" onclick="openCalc();">
						<div class="icon-box-icon" >
							<div class="icon-box-icon-container">
								<div class="icon-box-inner-icon">
									<div class="fa-tool-icon home-loan"></div>
								</div>
							</div>
						</div>
						<div class="icon-box-description">
							<h5 class="icon-box-title"><?php echo(__('Home Loan', 'default')) ?></h5>
						</div>
					</div>
					<div class="icon-box icon-box-center icon-box-hexagon" onclick="location.href='/australian-school'">
						<div class="icon-box-icon" >
							<div class="icon-box-icon-container">
								<div class="icon-box-inner-icon">
									<div class="fa-tool-icon au-school"></div>
								</div>
							</div>
						</div>
						<div class="icon-box-description">
							<h5 class="icon-box-title"><?php echo(__('Australian School', 'default')) ?></h5>
						</div>
					</div>
					<div class="icon-box icon-box-center icon-box-hexagon" onclick="location.href='/immigration-policy'">
						<div class="icon-box-icon" >
							<div class="icon-box-icon-container">
								<div class="icon-box-inner-icon">
									<div class="fa-tool-icon im-policy"></div>
								</div>
							</div>
						</div>
						<div class="icon-box-description">
							<h5 class="icon-box-title"><?php echo(__('Immigration Policy', 'default')) ?></h5>
						</div>
					</div>
				</div>
				<div class="contact-us clearfix">
					<div class="col-md-6">
						<h2><?php echo(__('Contact Us', 'default')) ?></h2>
						<p class="contact-us-content">
							"Dream in Australia, Australia or edge of the source of" Sheng International real estate group, the group is headquartered in Melbourne City,
							the famous Camberwell downtown area. Australia International founded by the Chinese elite in the Australian real estate industry, the group...
						</p>
						<p class="contact-type">Phone: +03 9882 1699</p>
						<p class="contact-type">Email: info@ascendinternational.com.au</p>
					</div>
					<div class="col-md-6">
						<div role="button" class="online-contact-btn" onclick="location.href='/contact-us'"><?php echo(__('Online Contact', 'default')) ?></div>
					</div>
				</div>
				<div class="copy-info clearfix">
					<div class="col-md-8">
						<p class="copy-right">Copyright &copy; 2013-2017 <?php echo(__('All Rights Reserved Ascend International Property Group', 'default')) ?> ABN:46 169 369 822</p>
					</div>
					<div class="col-md-4 text-right">
						<ul class="social-list clearfix">
							<li><a target="_blank" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a target="_blank" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a target="_blank" href="#"><i class="fa fa-qq" aria-hidden="true"></i></a></li>
							<li class="social-wchat">
								<i class="fa fa-weixin" aria-hidden="true"></i>
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/extra/ascend_wchat.jpg' ); ?>" alt="" class="wchat-qbar">
							</li>
							<li><a target="_blank" href="http://www.weibo.com/5236746389/profile?rightmod=1&wvr=5&mod=personinfo"><i class="fa fa-weibo" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div> <!-- end container -->
		</div> <!-- end footer-top -->

	</footer><!-- #colophon -->

	<?php
	/**
	 * suffice_after_footer hook
	 */
	do_action( 'suffice_after_footer' ); ?>

</div><!-- #page -->
<div class="suffice-body-dimmer">
</div>

<?php wp_footer(); ?>


<div id="layerBox" class="layerBox" style="display: none">
	<div class="wrapper clearfix">
		<h2>贷款计算器</h2>
		<div class="calc-form">
			<div class="tips">
				<p>注1：AUD为澳大利亚元（Australian Dollar）的国际货币符号。</p>
				<p>注2：填写贷款额度、利率、期限、支付频率及贷款类型点击计算即可查看偿还额。</p>
				<p>注3：澳洲贷款利率是市场化的，经常变动，不同贷款机构利率也不尽相同，且贷款产品可以选择固定利率和浮动利率。故本计算器默认利率仅供参考。</p>
			</div>
			<form name="calc">
				<div class="row clearfix"><span><label>贷 款 额：</label></span><input type="text" name="loan_amount" class="input-text align-right" /> AUD</div>
				<div class="row clearfix"><span><label>利　　率：</label></span><input type="text" name="interest_rate" class="input-text align-right" value="5.3" /> %</div>
				<div class="row clearfix"><span><label>贷款期限：</label></span><select name="term">
						<option value="30" selected="selected">30 年</option>
						<option value="25">25 年</option>
						<option value="20">20 年</option>
						<option value="15">15 年</option>
						<option value="10">10 年</option>
						<option value="5">5 年</option>
					</select></div>
				<div class="row clearfix"><span><label>支付频率：</label></span><select name="period">
						<option value="月" selected="selected">每　月</option>
						<option value="两周">每两周</option>
						<option value="周">每　周</option>
					</select></div>
				<div class="row clearfix"><span><label>贷款类型：</label></span><select name="rate_type">
						<option value="P_and_I" selected="selected">本金及利息</option>
						<option value="interest_only">仅 利 息</option>
					</select></div>
				<div class="row clearfix btn-row">
					<button type="button" onclick="calcRepay(calc)" name="calculate">计 算</button>
					<button type="reset"> 重 填 </button>
				</div>
				<div class="row clearfix"><span><label> 您将还款：</label></span><input type="text" name="repay_amount" class="input-text align-right" readonly /> AUD 每<input type="text" name="frequency" class="input-text" readonly /></div>
			</form>
		</div>
	</div>
</div>
<div id="layerBox2" class="layerBox" style="display: none">
	<div class="wrapper clearfix">
		<h2>印花税计算器</h2>
		<div class="calc-form">
			<div class="tips">
				<p>本计算器可综合所购澳洲房产价格、贷款金额、房产所在地区、物业用途、购房次数等因素计算印花税税、贷款印花税、房产抵押登记费和所有权转让费。</p>
				<p>如果您只需要计算物业印花税的话，贷款金额可以随意填写。</p>
			</div>
			<form name="dutycalc">
				<div class="row clearfix"><span><label>房产价值：</label></span><input type="text" name="prop_value" class="input-text align-right" /> AUD</div>
				<div class="row clearfix"><span><label>贷款金额：</label></span><input type="text" name="loan_amt" class="input-text align-right" value="" /> AUD</div>
				<div class="row clearfix"><span><label>所在地区：</label></span><select name="state">
						<option value="NSW" selected="selected">新南威尔士州</option>
						<option value="ACT">堪　培　拉</option>
						<option value="SA">南澳大利亚州</option>
						<option value="WA">西澳大利亚州</option>
						<option value="TAS">塔马斯尼亚州</option>
						<option value="VIC">维多利亚州</option>
						<option value="QLD">昆士兰州</option>
						<option value="NT">北部地区</option>
					</select></div>
				<div class="row clearfix"><span><label>物业用途：</label></span><select name="purpose">
						<option value="owner" selected="selected">自己使用</option>
						<option value="invest">投资物业</option>
					</select></div>
				<div class="row clearfix"><span><label>首次置业：</label></span><select name="fhb">
						<option value="NO" selected="selected">否</option>
						<option value="YES">是</option>
					</select></div>
				<div class="row clearfix btn-row">
					<button type="button" onclick="stampduty(dutycalc)" name="calculate">计 算</button>
					<button type="reset"> 重 填 </button>
				</div>
				<div class="row clearfix"><span><label>物业印花税：</label></span><input type="text" name="prop_duty" class="input-text align-right" readonly /> AUD</div>
				<div class="row clearfix"><span><label>贷款印花税：</label></span><input type="text" name="mort_duty" class="input-text align-right" readonly /> AUD</div>
				<div class="row clearfix"><span><label>抵押登记费：</label></span><input type="text" name="rego_fee" class="input-text align-right" readonly /> AUD</div>
				<div class="row clearfix"><span><label>所有权转让费：</label></span><input type="text" name="transfer_fee" class="input-text align-right" readonly /> AUD</div>
				<div class="row clearfix"><span><label>合　　计：</label></span><input type="text" name="total" class="input-text align-right" readonly /> AUD</div>
				<!--<div class="row clearfix"><span><label><a href="#" style="color:#F00; text-decoration:underline;">查看更多内容</a></label></span></div>-->
			</form>
		</div>
	</div>
</div>
</body>
</html>
