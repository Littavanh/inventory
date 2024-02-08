var allowsave = true;
$(function(){
	$(".editable input, .editable select").change(ValueChanged);
	//$(".delete").click(DeleteClicked);
	$(".delete1").click(DeleteClicked);
	$("#adduser").click(AddRow);
	$("#addpermis").click(AddRow);

	$("#reset").click(function(){
	    	location.reload(true);
	});
	
	$(".qty1").keyup(checkqty);
	$(".qty1").click(checkqty);
	$(".serial_endr").blur(chQty);
	
	$(".cus_code_invoice").keyup(AutoCompleteCus);
	$(".cus_code_invoice").blur(HideList);
	//$(".eq_code_auto").keyup(findDuplicates);
	
	//$(".btnsave").click(checkqty); // the button save
	//$(".btnsave").click(checkqty); // the button save
		
	$(".discount_p").keyup(calc_paid);
	$(".paid_kip").keyup(calc_paid);
	$(".paid_kip").load(calc_paid);
	$(".paid_usd").keyup(calc_paid);
	$(".paid_thb").keyup(calc_paid);
	$(".txtType_cost").change(getTypeCost);
	$(".txtType_cost").load(getTypeCost);
	/*$("#payment").load(function(){
		//alert('sdfsdf');
		calc_paid();
	});
	*/
	// Check the action when form load
	
	//if($('.dis')) $('.dis').prop('disabled',true);
	//if($('.ip_ch')) $('.ip_ch').prop('disabled',true);
	
    $(".date").datepicker({
    	dateFormat: "yy-mm-dd",
		changeMonth: true,
		changeYear: true
	});
	
	 $('#datetime').datepicker({
    	duration: '',
        //showTime: true,
        constrainInput: false
     });
	




})

/*---------- check discount when package is selected -----------------------*/
function reDist(pid){
	var cal = this;
	/*---get package id --*/				
	//var p_id = $(this).closest("tr").find(".reutrn_dist").val();
	var p_id = pid;
	if(p_id != "" && p_id != 0){
		//alert(p_id);
		$.get("function/chDist.php", {"p_id": p_id}, function(data){
			if (data != null){
				var remain = new Number(data);
				if (remain == 1){
					$('.dis').prop('disabled',false);
					//$(cal).closest("tr").find(".reutrn_dist").val("");
									
				}else if(remain !=1 && remain !=0){
					$('.dis').prop('disabled',true);
					$('.dis').val("0");
				}
			}	
		})
	}	
}
/*---------- Get value to calc the paytypecost form v_new-step5.php-----------------------*/
//function getTypeCost(vid, setCost, advCost){
function getTypeCost(){
	var cal = this;
	var vid = $(this).closest("table").find(".txtType_cost").val();
	//alert(vid);
	var total_g = $(this).closest("form").find(".total_g").val();
	var setCost = $(this).closest("form").find(".install_cost").val();
	var advCost = $(this).closest("form").find(".pledge_cost").val();
	// get version 2
	var monthly_cost = $(this).closest("form").find(".monthly_cost").val();
	var ip_cost = $(this).closest("form").find(".ip_cost").val();
	var move_cost = $(this).closest("form").find(".move_cost").val();
	var other_cost = $(this).closest("form").find(".other_cost").val();
	
	//var paid_kip = $(this).closest("form").find(".paid_kip").val();
	var total_g_ = total_g.replace(/,/g, '');
	var setCost_ = setCost.replace(/,/g, '');
	var advCost_ = advCost.replace(/,/g, '');
	// get version 2
	var monthly_cost_ = monthly_cost.replace(/,/g, '');
	var ip_cost_ = ip_cost.replace(/,/g, '');
	var move_cost_ = ip_cost.replace(/,/g, '');
	var other_cost_ = ip_cost.replace(/,/g, '');
	
	
	var bal = 0;
	var df = new DecimalFormat("#,#00.00#"); 
	if(vid==1){
		$(".paid_kip").val(setCost);
		var paid_kip = $(this).closest("form").find(".paid_kip").val();
		var paid_kip_ = paid_kip.replace(/,/g, '');
		bal = setCost_  - paid_kip_;
		$(cal).closest("form").find(".balance").val(df.format(bal));
	}else if(vid==2){
		$(".paid_kip").val(monthly_cost);
		var paid_kip = $(this).closest("form").find(".paid_kip").val();
		var paid_kip_ = paid_kip.replace(/,/g, '');
		bal = monthly_cost_ - paid_kip_;
		$(cal).closest("form").find(".balance").val(df.format(bal));
	}else if(vid==5){
		$(".paid_kip").val(monthly_cost);
		var paid_kip = $(this).closest("form").find(".paid_kip").val();
		var paid_kip_ = paid_kip.replace(/,/g, '');
		bal = move_cost_ - paid_kip_;
		$(cal).closest("form").find(".balance").val(df.format(bal));
	}else if(vid==8){
		$(".paid_kip").val(monthly_cost);
		var paid_kip = $(this).closest("form").find(".paid_kip").val();
		var paid_kip_ = paid_kip.replace(/,/g, '');
		bal = other_cost_ - paid_kip_;
		$(cal).closest("form").find(".balance").val(df.format(bal));
	}else if(vid==12){
		$(".paid_kip").val(ip_cost);
		var paid_kip = $(this).closest("form").find(".paid_kip").val();
		var paid_kip_ = paid_kip.replace(/,/g, '');
		bal = ip_cost_ - paid_kip_;
		$(cal).closest("form").find(".balance").val(df.format(bal));
	}else if(vid==14){
		$(".paid_kip").val(advCost);
		var paid_kip = $(this).closest("form").find(".paid_kip").val();
		var paid_kip_ = paid_kip.replace(/,/g, '');
		bal = advCost_  - paid_kip_;
		$(cal).closest("form").find(".balance").val(df.format(bal));
	}
	
}
/*---------- check discount when package is selected -----------------------*/
function reIp(id){
	var txtipcost = id;
	if(txtipcost != "" && txtipcost != 0){
		$('.ip_ch').prop('disabled',false);
	}else{
		$('.ip_ch').prop('disabled',true);
		$('.ip_ch').val(0);
	}	
}

function supplier(){
	
	var $currentrow = $(this).closest("tr");
    var $list = $currentrow.find(".list");
    var value = $(this).val();
    $list.empty();
	
    if (value != ""){
		//alert(value);
		$('.sp_name').autocomplete("receive/list_supplier.php", {
				width: 260,
				matchContains: true,
				selectFirst: false
		});
		$('.sp_name').result(function(event, data, formatted) {
				$(this).closest("table").find(".sp_id").val(data[1]);
				$(this).closest("table").find("#sp_name").val(data[0]);
				$(this).closest("table").find("#sp_tel").val(data[2]);
				$(this).closest("table").find("#sp_addr").val(data[3]);
				$(this).closest("table").find("#sp_email").val(data[4]);
		});
    }
}
/*---------- check for Customer Exist or Not-----------------------*/
function customer(){
	
	var $currentrow = $(this).closest("tr");
    var $list = $currentrow.find(".list");
    var value = $(this).val();
    $list.empty();
	
    if (value != ""){
		//alert(value);
		$('.cus_name').autocomplete("sale/list_customer.php", {
				width: 260,
				matchContains: true,
				selectFirst: false
		});
		$('.cus_name').result(function(event, data, formatted) {
				$(this).closest("table").find(".cus_id").val(data[1]);
				$(this).closest("table").find("#cus_name").val(data[0]);
				$(this).closest("table").find("#cus_tel").val(data[2]);
				$(this).closest("table").find("#cus_addr").val(data[3]);
				$(this).closest("table").find("#cus_email").val(data[4]);
		});
    }
}

function duplicate(txt){
	$(".eq_code_auto").each(function(){ 
		var thiscode = this.value;
    	if (thiscode != ""){
	    	// Check exist code in the page
    		var count = 0;
    		$(".eq_code_auto").each(function(){
    			if (this.value == thiscode) count++;
    		})
	    	if (count > 1){
	    		alert("ເລກລະຫັດ "+thiscode+" ມີຢູ່ໃນລາຍການແລ້ວ");
	    		allowsave = false;
	    	} else {
	    		allowsave = true;
	    	}
    	}	
	});
	
}
/*----- When disttribute to another in branch -----------*/
function duplicatedist(txt){
	$(".eq_code_auto_d").each(function(){ 
		var thiscode = this.value;
    	if (thiscode != ""){
	    	// Check exist code in the page
    		var count = 0;
    		$(".eq_code_auto_d").each(function(){
    			if (this.value == thiscode) count++;
    		})
	    	if (count > 1){
	    		alert("ເລກລະຫັດ "+thiscode+" ມີຢູ່ໃນລາຍການແລ້ວ");
	    		allowsave = false;
	    	} else {
	    		allowsave = true;
	    	}
    	}	
	});
	
}  
/*----- When delivery to D2D -----------*/
function duplicated(txt){
	$(".serials_t").each(function(){ 
		var thiscode = this.value;
    	if (thiscode != ""){
	    	// Check exist code in the page
    		var count = 0;
    		$(".serials_t").each(function(){
    			if (this.value == thiscode) count++;
    		})
	    	if (count > 1){
	    		alert("ເລກ serial: "+thiscode+" ມີຢູ່ໃນລາຍການແລ້ວ");
	    		allowsave = false;
	    	} else {
	    		allowsave = true;
	    	}
    	}	
	});
	
} 

function selDept(){
	//var sel_dept_id = document.getElementById('section').value;
	//if(sel_sec_id != ""){
		var $currentrow = $(this).closest("form");		
		var $list = $currentrow.find(".seldept");
		var value = $(this).val();
		$list.empty();		
		//if(value !="") {	
			$.getJSON("list_dept.php", function(data){		// ?r_id="+this.value
				for (i in data) {
					$list.append("<option value='"+data[i][0]+"'>"+data[i][1]+"</option>\n");					
				}
			})
		//} else {
		//	$list.append("<span>--select--</span>");
		//}
	//}else{
	
	//}
}


function AddRow(){
		var $newrow = $(".template tr").clone();
		$newrow.find(".eq_name_auto").keyup(AutoComplete);
		$newrow.find(".eq_code_auto").keyup(AutoComplete);
		/*--- only the distribution -------*/
		$newrow.find(".eq_name_auto_q").keyup(AutoComplete_d);
		$newrow.find(".eq_code_auto_q").keyup(AutoComplete_d);
		/*--- only the D2d Delivery -------*/
		$newrow.find(".eq_name_auto_dd").keyup(AutoComplete_dd);
		$newrow.find(".eq_code_auto_dd").keyup(AutoComplete_dd);
		/*--- only the sale transfer to customer -------*/
		$newrow.find(".eq_name_auto_t").keyup(AutoComplete_t);
		$newrow.find(".serials_t").keyup(AutoComplete_t);
		/* $newrow.find(".eq_code_auto_d").blur(HideList); */
		$newrow.find(".qtyq").blur(c_total);
		$newrow.find(".discountq").blur(c_total);
		
		/*----- validate serial number ONlY */
		$newrow.find(".serial_endd").blur(chSerialExist);
		$newrow.find(".serial_endr").blur(chQty);
		$newrow.find(".paid_s").blur(chSerialSell);
		$newrow.find(".paid").blur(cal_recieve);
		//$newrow.find(".paid").blur(chSerialSell);
		/*----------*/
		$newrow.find(".date").removeAttr("id");
		$newrow.find(".eq_code_auto").removeAttr("id");
		$newrow.find(".eq_code_auto").removeClass("ac_input");
		$newrow.find(".eq_code_auto").removeClass("valid");
		$newrow.find(".date").removeClass("hasDatepicker");
		$newrow.find(".date").datepicker({
	    	dateFormat: "yy-mm-dd",
			changeMonth: true,
			changeYear: true
		});
	
		$newrow.find(".qty1").removeAttr("id");
		$newrow.find(".qty1").keyup(checkqty);
		$newrow.find(".qty1").click(checkqty);
		/*------------------ add to check only ----------------*/
		$newrow.find(".delete").click(DeleteClicked);
		$newrow.find(".delete1").click(DeleteClicked1);
		// $newrow.find("input,select").change(IfLastRowAddNewRow);
		$(".editable").append($newrow);
		ReorderEditable()
}
/*new s*/
function timeout_(){
	var $currentrow = $(this).closest("tr");
	var $list = $currentrow.find(".list");
	$list.empty();
}
function HideList(){
	var $elem = $(this);
    setTimeout(function(){
        var $list = $elem.closest("tr").find(".list");
        $list.empty();
    }, 200);
}

function IfLastRowAddNewRow(){
	if ($(this).closest("tr").next().length == 0){
		AddRow();
	}
}


/*--------------- to check the Qty when receive new product Serial Number ----------*/
function chQty(){
	var cal = this;

	/*---get serial number --*/				
	var serial_start = $(this).closest("tr").find(".serial_start").val();
	var serial_end = $(this).closest("tr").find(".serial_endr").val();
	var eid = $(this).closest("tr").find(".id").val();
	
	if(serial_start != "" && serial_end != ""){
		//alert('start'+ serial_start + '+ serial_end' + serial_end);
		$.get("geQty.php", {"eid": eid, "serial_start": serial_start, "serial_end": serial_end}, function(data){
			if (data != null){
				var remain = new Number(data);
				// var newamount = new Number(serial_end.value);
				if (remain <= 0){
					alert('ເລກ Serial_end ຕ້ອງໃຫ່ຍກວ່າ ຫຼື ເທົ່າກັບ Serial_start....!')
					$(serial_end).closest("tr").find(".serial_endr").show();
					$(cal).closest("tr").find(".qtyr").val("");
									
				}else{
					$(cal).closest("tr").find(".qtyr").val(remain);
				}
			}
		})
	}
	
	
}
/*--------------- to check the ----------*/
function calc_paid(){
	var cal = this;
	var vid = $(this).closest("table").find(".txtType_cost").val();
	var cur_id = document.getElementById("cur_id").value;
	var total_g = document.getElementById("total_g").value;
	/* add new, added by kong*/
	var install_cost = $(this).closest("form").find(".install_cost").val();
	var pledge_cost = $(this).closest("form").find(".pledge_cost").val();
	var monthly_cost = $(this).closest("form").find(".monthly_cost").val();
	var ip_cost = $(this).closest("form").find(".ip_cost").val();
	var move_cost = $(this).closest("form").find(".move_cost").val();
	var other_cost = $(this).closest("form").find(".other_cost").val();
	/*-------*/
	
	var usd = $(this).closest("form").find(".usd").val();
	var thb = $(this).closest("form").find(".thb").val();
	var discount_p = $(this).closest("tr").find(".discount_p").val();
	var paid_kip = $(this).closest("tr").find(".paid_kip").val();
	var paid_usd = $(this).closest("tr").find(".paid_usd").val();
	var paid_thb = $(this).closest("tr").find(".paid_thb").val();
	/*---reget value */
	
	install_cost = install_cost.replace(/,/g, '');
	pledge_cost = pledge_cost.replace(/,/g, '');
	monthly_cost = monthly_cost.replace(/,/g, '');
	ip_cost = ip_cost.replace(/,/g, '');
	move_cost = move_cost.replace(/,/g, '');
	other_cost = other_cost.replace(/,/g, '');
	
	discount_p = discount_p.replace(/,/g, '');
	paid_kip = paid_kip.replace(/,/g, '');
	paid_usd = paid_usd.replace(/,/g, '');
	paid_thb = paid_thb.replace(/,/g, '');
	/*----------- validate the money input should be more than 0 */
	if(discount_p<0 || discount_p=='-'){
		alert("ຈ່າຍເງີນຕ້ອງໃຫຍ່ກວ່າ 0");
		$(this).closest("form").find(".discount_p").val();
	} 
	if(paid_kip<0 || paid_kip=='-'){
		alert("ຈ່າຍເງີນຕ້ອງໃຫຍ່ກວ່າ 0");
		$(this).closest("form").find(".paid_kip").val();
	} 
	if(paid_usd<0 || paid_usd=='-'){
		alert("ຈ່າຍເງີນຕ້ອງໃຫຍ່ກວ່າ 0");
		$(this).closest("form").find(".paid_usd").val();
	} 
	if(paid_thb<0 || paid_thb=='-'){
		alert("ຈ່າຍເງີນຕ້ອງໃຫຍ່ກວ່າ 0");
		$(this).closest("form").find(".paid_thb").val();
	} 
	/*------------ end validate money input--------------------------*/
	var total = 0;
	var df = new DecimalFormat("#,#00.00#"); 
	
	if(discount_p =="") discount_p = 0;
	if(paid_kip =="") paid_kip = 0;
	if(paid_usd =="") paid_usd = 0;
	if(paid_thb =="") paid_thb = 0;
	//alert("cy_id="+ cur_id +", total_g="+total_g+", paid_kip="+paid_kip+", paid_usd="+paid_usd+", paid_thb="+paid_thb);
	/*-- check for faster if paid one currency ------*/
	// 1= kip, 2= dollar, 3= baht
	if(cur_id == 1 ){
		if(paid_usd == 0 && paid_thb == 0){
			//total = total_g - discount_p - paid_kip;
			if(vid==1){
				var paid_kip = $(this).closest("form").find(".paid_kip").val();
				var paid_kip_ = paid_kip.replace(/,/g, '');
				total = install_cost  - paid_kip_ - discount_p;
			}else if(vid==2){
				var paid_kip = $(this).closest("form").find(".paid_kip").val();
				var paid_kip_ = paid_kip.replace(/,/g, '');
				total = monthly_cost  - paid_kip_ - discount_p;
			}else if(vid==5){
				var paid_kip = $(this).closest("form").find(".paid_kip").val();
				var paid_kip_ = paid_kip.replace(/,/g, '');
				total = move_cost  - paid_kip_ - discount_p;
			}
			else if(vid==8){
				var paid_kip = $(this).closest("form").find(".paid_kip").val();
				var paid_kip_ = paid_kip.replace(/,/g, '');
				total = other_cost  - paid_kip_ - discount_p;
			}else if(vid==12){
				var paid_kip = $(this).closest("form").find(".paid_kip").val();
				var paid_kip_ = paid_kip.replace(/,/g, '');
				total = ip_cost  - paid_kip_ - discount_p;
			}else if(vid==14){
				var paid_kip = $(this).closest("form").find(".paid_kip").val();
				var paid_kip_ = paid_kip.replace(/,/g, '');
				total = pledge_cost  - paid_kip_ - discount_p;
			}			
			if (total < 0){
				document.getElementById('msgwar').innerHTML = "<span class = 'errChk'>ເງິນທີ່ຈ່າຍເກີນ....!</span>";
			}else{
				document.getElementById('msgwar').innerHTML = "";
			}
			
			$(cal).closest("form").find(".balance").val(df.format(total));
		}else{
			/*----------- use function is better --------*/
			$.get("wait-payment/calc_paid.php", {"cur_id": cur_id, "total_g": total_g, "discount_p": discount_p, "paid_kip": paid_kip, "paid_usd": paid_usd, "paid_thb": paid_thb, "vid": vid, "install_cost": install_cost, "pledge_cost": pledge_cost, "monthly_cost": monthly_cost, "ip_cost": ip_cost, "move_cost": move_cost, "other_cost": other_cost }, function(data){
				//alert("dfg"+data);
				if (data != null){
					var remain = new Number(data);
					// var newamount = new Number(serial_end.value);
					if (remain < 0){
						alert('ເງິນທີ່ຈ່າຍເກີນ....!')
						$(cal).closest("form").find(".balance").val(df.format(data));
										
					}else{
					
						$(cal).closest("form").find(".balance").val(df.format(data));
						
					}
				}
			});
			
		}
	}else if(cur_id == 2){
		if(paid_kip == 0 && paid_thb == 0){
			//total = total_g - discount_p - paid_usd;
			if(vid==1){
				var paid_usd = $(this).closest("form").find(".paid_usd").val();
				var paid_usd_ = paid_usd.replace(/,/g, '');
				total = install_cost  - paid_usd_ - (discount_p/usd);
			}else if(vid==2){
				var paid_usd = $(this).closest("form").find(".paid_usd").val();
				var paid_usd_ = paid_usd.replace(/,/g, '');
				total = monthly_cost  - paid_usd_ - (discount_p/usd);
			}else if(vid==5){
				var paid_usd = $(this).closest("form").find(".paid_usd").val();
				var paid_usd_ = paid_usd.replace(/,/g, '');
				total = move_cost  - paid_usd_ - (discount_p/usd);
			}else if(vid==8){
				var paid_usd = $(this).closest("form").find(".paid_usd").val();
				var paid_usd_ = paid_usd.replace(/,/g, '');
				total = other_cost  - paid_usd_ - (discount_p/usd);
			}else if(vid==12){
				var paid_usd = $(this).closest("form").find(".paid_usd").val();
				var paid_usd_ = paid_usd.replace(/,/g, '');
				total = ip_cost  - paid_usd_ - (discount_p/usd);
			}else if(vid==14){
				var paid_usd = $(this).closest("form").find(".paid_usd").val();
				var paid_usd_ = paid_usd.replace(/,/g, '');
				total = pledge_cost  - paid_usd_ - (discount_p/usd);
			}			
			if (total < 0){
				document.getElementById('msgwar').innerHTML = "<span class = 'errChk'>ເງິນທີ່ຈ່າຍເກີນ....!</span>";
			}else{
				document.getElementById('msgwar').innerHTML = "";
			}
			$(cal).closest("form").find(".balance").val(df.format(total));
		}else{
			/*----------- use function is better --------*/
			$.get("wait-payment/calc_paid.php", {"cur_id": cur_id, "total_g": total_g, "discount_p": discount_p, "paid_kip": paid_kip, "paid_usd": paid_usd, "paid_thb": paid_thb, "vid": vid, "install_cost": install_cost, "pledge_cost": pledge_cost, "monthly_cost": monthly_cost, "ip_cost": ip_cost, "move_cost": move_cost, "other_cost": other_cost }, function(data){
				//alert("dfg"+data);
				if (data != null){
					var remain = new Number(data);
					// var newamount = new Number(serial_end.value);
					if (remain < 0){
						alert('ເງິນທີ່ຈ່າຍເກີນ....!')
						$(cal).closest("form").find(".balance").val(df.format(data));
										
					}else{
					
						$(cal).closest("form").find(".balance").val(df.format(data));
						
					}
				}
			});
		}
	}else{
		if(paid_kip == 0 && paid_usd == 0){
			//total = total_g - discount_p - paid_thb;
			if(vid==1){
				var paid_thb = $(this).closest("form").find(".paid_thb").val();
				var paid_thb_ = paid_thb.replace(/,/g, '');
				total = install_cost  - paid_thb_ - (discount_p/thb);
			}else if(vid==2){
				var paid_thb = $(this).closest("form").find(".paid_thb").val();
				var paid_thb_ = paid_thb.replace(/,/g, '');
				total = monthly_cost  - paid_thb_ - (discount_p/thb);
			}else if(vid==5){
				var paid_thb = $(this).closest("form").find(".paid_thb").val();
				var paid_thb_ = paid_thb.replace(/,/g, '');
				total = move_cost  - paid_thb_ - (discount_p/thb);
			}else if(vid==8){
				var paid_thb = $(this).closest("form").find(".paid_thb").val();
				var paid_thb_ = paid_thb.replace(/,/g, '');
				total = other_cost  - paid_thb_ - (discount_p/thb);
			}else if(vid==12){
				var paid_thb = $(this).closest("form").find(".paid_thb").val();
				var paid_thb_ = paid_thb.replace(/,/g, '');
				total = ip_cost  - paid_thb_ - (discount_p/thb);
			}else if(vid==14){
				var paid_thb = $(this).closest("form").find(".paid_thb").val();
				var paid_thb_ = paid_thb.replace(/,/g, '');
				total = pledge_cost  - paid_thb_ - (discount_p/thb);
			}				
			if (total < 0){
				document.getElementById('msgwar').innerHTML = "<span class = 'errChk'>ເງິນທີ່ຈ່າຍເກີນ....!</span>";
			}else{
				document.getElementById('msgwar').innerHTML = "";
			}
			$(cal).closest("form").find(".balance").val(df.format(total));
		}else{
			/*----------- use function is better --------*/
			$.get("wait-payment/calc_paid.php", {"cur_id": cur_id, "total_g": total_g, "discount_p": discount_p, "paid_kip": paid_kip, "paid_usd": paid_usd, "paid_thb": paid_thb, "vid": vid, "install_cost": install_cost, "pledge_cost": pledge_cost, "monthly_cost": monthly_cost, "ip_cost": ip_cost, "move_cost": move_cost, "other_cost": other_cost }, function(data){
				//alert("dfg"+data);
				if (data != null){
					var remain = new Number(data);
					// var newamount = new Number(serial_end.value);
					if (remain < 0){
						alert('ເງິນທີ່ຈ່າຍເກີນ....!')
						$(cal).closest("form").find(".balance").val(df.format(data));
										
					}else{
					
						$(cal).closest("form").find(".balance").val(df.format(data));
						
					}
				}
			});
		}
	}
	
}

/*------------- calculate the due price when recieve new product ------*/
function cal_recieve(){
	var cal = this;
	var due = $(this).closest("tr").find(".due").val();
	var total_price = $(this).closest("tr").find(".total_price").val();
	var paid = $(this).closest("tr").find(".paid").val();
	var total_price_r = total_price.replace(/,/g, '');
	var paid_r = paid.replace(/,/g, '');
	var total = total_price_r - paid_r;
	if(total >=0 ){
		$(cal).closest("tr").find(".due").val(total);
	}else{
		alert("ທ່ານປ້ອນລາຄາຈ່າຍ (ເງີນທີ່ຈ່າຍ) ຫຼາຍກວ່າ ລາຄາທັງໝົດທີ່ຊື້ສິນຄ້ານີ້");
		$(cal).closest("tr").find(".due").val(total);
	}
}
/*------------- calculate the total in Qoutation form------*/
function c_total(){
	var cal = this;
	var price_sale = $(this).closest("tr").find(".price_sale_q").val();
	var qty = $(this).closest("tr").find(".qtyq").val();
	var discount = $(this).closest("tr").find(".discountq").val();
	var price_sale_q = price_sale.replace(/,/g, '');
	var qty_q = qty.replace(/,/g, '');
	var discount_q = discount.replace(/,/g, '');
	
	var total =(price_sale_q*qty_q) - discount_q;
	if(total >=0 ){
		$(cal).closest("tr").find(".total").val(total);
	}else{
		alert("ກະລຸນາປ້ອນລາຄາ ຫຼື ສ່ວນຫຼຸດກ່ອນ....!");
		$(cal).closest("tr").find(".total").val(total);
	}
}
/*---------------- check serial number exist or not --------------*/
function chSerialSell(){
/**/
	var cal = this;
	var due = $(this).closest("tr").find(".due").val();
	var price_sale = $(this).closest("tr").find(".price_sale").val();
	var paid = $(this).closest("tr").find(".paid_s").val();
	var discount = $(this).closest("tr").find(".discount").val();
	var price_sale_s = price_sale.replace(/,/g, '');
	var paid_s = paid.replace(/,/g, '');
	var discount_s = discount.replace(/,/g, '');
	var total = (price_sale_s - paid_s)-discount_s;
	//alert(price_sale_s+" - "+paid_s + "="+total);
	/*---get serial number --*/				
	var serials1 = $(this).closest("tr").find(".serials_t").val();
	var eid = $(this).closest("tr").find(".id").val();
	//var w_id = document.getElementById("wid").value;
	//var did = document.getElementById("h_doc_id").value;
	//alert('price_sale '+ price_sale + '+ price_buy='+paid+' paid' + paid_s+ "/");
	$.get("chserialsel.php", {"eid": eid, "serials": serials1}, function(data){
		if (data != null){
			var remain = new Number(data);
			// var newamount = new Number(serial_end.value);
			if (remain < 1){
				// $(serial_end).closest("td").find(".serials").text("ເລກ Serial ບໍ່ມີໃນຖານຂໍ້ມູນ");
				//$(serial).closest("td").find(".qty1").val(remain);
				alert('ເລກ Serial ທີ່ທ່ານປ້ອນ ບໍ່ມີໃນຖານຂໍ້ມູນ ຫຼື ຖືກຂາຍແລ້ວ....!')
				$(serials).closest("td").find(".serials").show();
								
			}else{
				if(total >=0 ){
					//$(total).closest("tr").find(".due").show();
					$(cal).closest("tr").find(".due").val(total);
				}else{
					alert("ທ່ານປ້ອນລາຄາຊື້ (ເງີນທີ່ຈ່າຍ) ຫຼາຍກວ່າ ລາຄາຂາຍ");
					$(cal).closest("tr").find(".due").val(total);
				}
			}
		}
	})
	
}

/*---------------- check serial number exist or not // or SEll out --------------*/
function chSerialExist(){
/**/
	var serial_start = $(this).closest("tr").find("input[name='serial_start[]']").val();
	var serial_end = this;
	var serial_end1 = serial_end.value;
	var eid = $(this).closest("tr").find(".eq_id").val();
	var w_id = document.getElementById("wid").value;
	var did = document.getElementById("h_doc_id").value;
	// alert('start'+ serial_start + '+ end' + serial_end1)
	$.get("chserialexist.php", {"eid": eid, "w_id": w_id, "did": did, "serial_start": serial_start, "serial_end1": serial_end1}, function(data){
		if (data != null){
			var remain = new Number(data);
			var newamount = new Number(serial_end.value);
			if (remain < 1){
				$(serial_end).closest("td").find(".start_date").text("ເລກ Serial ບໍ່ມີໃນຖານຂໍ້ມູນ");
				//$(serial).closest("td").find(".qty1").val(remain);
				alert('ເລກ Serial ທີ່ທ່ານປ້ອນ ບໍ່ມີໃນຖານຂໍ້ມູນ ຫຼື ມອບໃຫ້ທີມອືນກ່ອນແລ້ວ....!')
				$(serial_start).closest("td").find(".start_date").show();
								
			}
		}
	})
	
}
/*----------------- validate qty --------------*/
function checkqty(){
	var amt = this;
	var eid = $(this).closest("tr").find(".eq_id").val();
	var w_id = document.getElementById("wid").value;
	var did = document.getElementById("h_doc_id").value;
	
	$.get("checkqty.php", {"eid": eid, "w_id": w_id, "did": did}, function(data){
		if (data != null){
			var remain = new Number(data);
			var newamount = new Number(amt.value);
			if (remain < newamount){
				$(amt).closest("td").find(".qtyerr").text("ອຸປະກອນໃນສາງມີ:"+ remain.toFixed(2));
				$(amt).closest("td").find(".qty1").val(remain);
				$(amt).closest("td").find(".qtyerr").show();
								
			}else{
				if(amt.value <= 0 ){
					$(amt).closest("td").find(".qtyerr").text("ຈໍານວນຕ້ອງໃຫ່ຍກວ່າ 0");
					$(amt).closest("td").find(".qty1").val();
					$(amt).closest("td").find(".qtyerr").show();
				}else{
					$(amt).closest("td").find(".qtyerr").hide();
				}
			}
		}
	})
	
}
function ReorderEditable(){
	var num = 0;
	$(".editable tr").each(function(){
		$(this).find("td").first().children("span").text(num);
		num++;
	})
}

// Appear Value change on Input
function ValueChanged(){
	$(this).closest("tr").find("input[name='type[]']").val("edited");
	$(this).closest("tr").find("input[name='permit_type[]']").val("edited");
	$(this).closest("tr").css("backgroundColor", "#FFE2BC");
	$(this).parent().css("border", "solid #FF9200 0.15em");
}
// on change the destinition value
/*
function AllValueChanged(){
	$(this).closest("form").find("input[name='type[]']").val("edited");
	$(this).closest("form").css("backgroundColor", "#FFE2BC");
	$(this).parent().css("border", "solid #FF9200 0.15em");
}
*/
//
function DeleteClicked(){
	if ($(this).closest("tr").find("input[name='id[]']").val() == ""){
		$(this).closest("tr").remove();
		
	} else {
		$(this).closest("td").css("backgroundColor", "red");
		$(this).closest("tr").fadeTo("medium", 0.2);
		$(this).closest("tr").find("input[name='type[]']").val("deleted");
		$(this).closest("tr").find("input[name='type_g[]']").val("deleted");
		$(this).closest("tr").find("input[type=text], input[type=number], input[type=file], select").attr("disabled", true);
	}
	ReorderEditable();
}
function DeleteClicked1(){
	//if ($(this).closest("tr").find("input[name='eq_id[]']").val() == ""){
	if ($(this).closest("tr").find("input[name='id[]']").val() == ""){
		$(this).closest("tr").remove();
	}
}

function AutoComplete(){
	
	var $currentrow = $(this).closest("tr");
    var $list = $currentrow.find(".list");
    var value = $(this).val();
    $list.empty();
	
    if (value != ""){
		//alert(value);
		$('.eq_name_auto').autocomplete("receive/list_equipment.php", {
				width: 260,
				matchContains: true,
				selectFirst: false
		});
		$('.eq_name_auto').result(function(event, data, formatted) {
				$(this).closest("tr").find(".id").val(data[1]);
				$(this).closest("tr").find(".eq_code_auto").val(data[2]);
				$(this).closest("tr").find(".eq_name_auto").val(data[0]);
				$(this).closest("tr").find(".category_id").val(data[3]);
				$(this).closest("tr").find(".category").val(data[4]);
				$(this).closest("tr").find(".eq_unit").val(data[5]);
		});
		$('.eq_code_auto').autocomplete("receive/list_code_equipment.php", {
				width: 260,
				matchContains: true,
				selectFirst: false
		});
		
		$('.eq_code_auto').result(function(event, data, formatted) {
				$(this).closest("tr").find(".id").val(data[1]);
				$(this).closest("tr").find(".eq_code_auto").val(data[0]);
				$(this).closest("tr").find(".eq_name_auto").val(data[2]);
				$(this).closest("tr").find(".category_id").val(data[3]);
				$(this).closest("tr").find(".category").val(data[4]);
				$(this).closest("tr").find(".eq_unit").val(data[5]);
		});
    }
}
function AutoComplete_d(){
	var wid = document.getElementById("wid").value;
	var $currentrow = $(this).closest("tr");
    var $list = $currentrow.find(".list");
    var value = $(this).val();
    $list.empty();
	
    if (value != ""){
		//alert(value);
		$('.eq_name_auto_q').autocomplete("quotation/list_equipment.php?wid="+wid, {
				width: 260,
				matchContains: true,
				selectFirst: false
		});
		$('.eq_name_auto_q').result(function(event, data, formatted) {
				$(this).closest("tr").find(".eq_id").val(data[1]);
				$(this).closest("tr").find(".eq_code_auto_q").val(data[2]);
				$(this).closest("tr").find(".eq_name_auto_q").val(data[0]);
				$(this).closest("tr").find(".category_id").val(data[3]);
				$(this).closest("tr").find(".category").val(data[4]);
				$(this).closest("tr").find(".eq_unit").val(data[5]);
				$(this).closest("tr").find(".eq_lot").val(data[6]);
		});
		$('.eq_code_auto_q').autocomplete("quotation/list_equipment.php?wid="+wid, {
				width: 260,
				matchContains: true,
				selectFirst: false
		});
		
		$('.eq_code_auto_q').result(function(event, data, formatted) {
				$(this).closest("tr").find(".eq_code_auto_q").val(data[0]);
				$(this).closest("tr").find(".eq_id_auto_q").val(data[1]);
				$(this).closest("tr").find(".eq_name_auto_q").val(data[2]);
				$(this).closest("tr").find(".eq_unit").val(data[3]);
				$(this).closest("tr").find(".category").val(data[4]);
				$(this).closest("tr").find(".price_sale_q").val(data[5]);
				
		});
    }
}
/* autocomplete only the D2d Option add */
function AutoComplete_dd(){
	var wid = document.getElementById("wid").value;
	var $currentrow = $(this).closest("tr");
    var $list = $currentrow.find(".list");
    var value = $(this).val();
    $list.empty();
	
    if (value != ""){
		//alert(value);
		$('.eq_name_auto_dd').autocomplete("d2d_delivery/list_equipment.php?wid="+wid, {
				width: 260,
				matchContains: true,
				selectFirst: false
		});
		$('.eq_name_auto_dd').result(function(event, data, formatted) {
				$(this).closest("tr").find(".eq_id").val(data[1]);
				$(this).closest("tr").find(".eq_code_auto_dd").val(data[2]);
				$(this).closest("tr").find(".eq_name_auto_dd").val(data[0]);
				$(this).closest("tr").find(".category_id").val(data[3]);
				$(this).closest("tr").find(".category").val(data[4]);
				$(this).closest("tr").find(".eq_unit").val(data[5]);
				$(this).closest("tr").find(".eq_lot").val(data[6]);
		});
		$('.eq_code_auto_dd').autocomplete("d2d_delivery/list_code_equipment.php?wid="+wid, {
				width: 260,
				matchContains: true,
				selectFirst: false
		});
		
		$('.eq_code_auto_dd').result(function(event, data, formatted) {
				$(this).closest("tr").find(".eq_id").val(data[1]);
				$(this).closest("tr").find(".eq_code_auto_dd").val(data[0]);
				$(this).closest("tr").find(".eq_name_auto_dd").val(data[2]);
				$(this).closest("tr").find(".category_id").val(data[3]);
				$(this).closest("tr").find(".category").val(data[4]);
				$(this).closest("tr").find(".eq_unit").val(data[5]);
				$(this).closest("tr").find(".eq_lot").val(data[6]);
		});
    }
}
/* autocomplete only the D2d When transfer to Team  */
function AutoComplete_t(){
	//var wid = document.getElementById("wid").value;
	var cur_id = document.getElementById("cur_id").value;
	var $currentrow = $(this).closest("tr");
    var $list = $currentrow.find(".list");
    var value = $(this).val();
    $list.empty();
	
    if (value != ""){
		//alert(value);
		$('.eq_name_auto_t').autocomplete("sale/list_equipment.php?cur_id="+cur_id,{
				width: 260,
				matchContains: true,
				selectFirst: false
		});
		$('.eq_name_auto_t').result(function(event, data, formatted) {
				$(this).closest("tr").find(".id").val(data[2]);
				$(this).closest("tr").find(".serials_t").val(data[1]);
				$(this).closest("tr").find(".eq_code_auto_t").val(data[3]);
				$(this).closest("tr").find(".eq_name_auto_t").val(data[0]);
				$(this).closest("tr").find(".category_id").val(data[4]);
				$(this).closest("tr").find(".category").val(data[5]);
				$(this).closest("tr").find(".eq_unit").val(data[6]);
				$(this).closest("tr").find(".price_sale").val(data[7]);
				//$(this).closest("tr").find(".paid_s").focus();
				
		});
		$('.serials_t').autocomplete("sale/list_code_equipment.php?cur_id="+cur_id, {
				width: 260,
				matchContains: true,
				selectFirst: false
		});
		
		$('.serials_t').result(function(event, data, formatted) {
				$(this).closest("tr").find(".id").val(data[2]);
				$(this).closest("tr").find(".serials_t").val(data[0]);
				$(this).closest("tr").find(".eq_code_auto_t").val(data[1]);
				$(this).closest("tr").find(".eq_name_auto_t").val(data[3]);
				$(this).closest("tr").find(".category_id").val(data[4]);
				$(this).closest("tr").find(".category").val(data[5]);
				$(this).closest("tr").find(".eq_unit").val(data[6]);
				$(this).closest("tr").find(".price_sale").val(data[7]);
				//$(this).closest("tr").find(".paid_s").focus();
		});
    }
}

function AutoCompleteCus(){
    var $currentrow = $(this).closest("table");
    var $list = $currentrow.find(".list");
    var value = $(this).val();
	var lenght_code =  $(this).closest("table").find(".cus_code_invoice").val();
	
	
	//var warehouse = document.getElementById("wid").value;
    $list.empty();
	
    if (value != ""){
        //$.getJSON("receive/findcode.php?code=" + value + "&warehouse="+warehouse, function(data){
		
		$.getJSON("invoice/cus_code.php?cus_code=" + value, function(data){
            //alert(data);
            if (data.length == 1){
                $currentrow.find("#cus_id").val(data[0][0]);
                $currentrow.find("#cus_code").val(data[0][1]);
                $currentrow.find("#cus_name").val(data[0][2]);
                $currentrow.find("#cus_address").val(data[0][3]);
                //var itemamount = new Number(data[0][4]);
               // $currentrow.find(".itemamount").val(itemamount.toFixed(2));
               // $currentrow.find(".id").val(data[0][3]);
				$currentrow.find("#invoice_type").focus();
				$list.empty();
            } else {
                for (i in data){
					
                    $list.append("<li><span class='itemcode'>" + data[i][1] + "</span>: <span class='itemname'>" + data[i][2] + "</span> <span class='itemID'></span></li>");
                }
                $list.children("li").click(function(){
					$(this).closest("table").find("#cus_id").val(data[0][0]);
                    $(this).closest("table").find("#cus_code").val($(this).children(".itemcode").text());
                    $(this).closest("table").find("#cus_name").val($(this).children(".itemname").text());
                    $(this).closest("table").find("#cus_address").val(data[0][3]);
                    //$(this).closest("tr").find(".ID").val($(this).children(".itemID").text());
					//$(this).closest("tr").find(".itemamount").val($(this).children(".itemamount").text());
					$(this).closest("table").find("#invoice_type").focus();
					$(this).closest("table").find("#cus_code").trigger("keyup");
                    $list.empty();
                })
            }
        });
    }
}
/*------------ the function print window ----------------------*/
function printWindow(){
	browserVersion = parseInt(navigator.appVersion)
	if (browserVersion >= 4) window.print()
}
/*------------ action when selling equipment -------------*/
function openPrint(c_id, s_no){
	window.open("sale/ReceiptPrint.php?c_id="+c_id+"&s_no="+s_no);
}

function openPrintQuotation(q_no){
	window.open("quotation/quotationPrint.php?q_no="+q_no);
}