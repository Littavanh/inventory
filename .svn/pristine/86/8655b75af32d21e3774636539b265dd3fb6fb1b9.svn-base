var allowsave = true;
var novalidate = false;
$(function(){
		/*-------------- validation the form receive equipment*/
	 $("#frmreceive").validate({
    	rules: {
        	"sp_name": {required: true},
			"sp_tel": {required: true},
        	"sp_addr": {required: true},
        	"sp_mail": {required: true},
        	"cur_id": {required: true},
			/*--------------------- validate Document Info------------*/
			/*
        	"doc_code": {required: true},
			"tyid": {required: true},
        	"doc_date": {required: true},
        	"docname": {required: true},
        	"file_n": {required: true},
        	"status": {required: true},
        	*/
        	/*--------------------- enter in equipment -------------*/
			"eq_no[]": {required: true},
			"eq_lot[]": {required: true},
            "eq_name[]": {required: true},
            "serial_start[]": {required: true},
            "serial_end[]": {required: true},
            "total_price[]": {required: true},
			
			
			/* "price[]": {number: true, min: 0}, */
    	},
    	
    	messages: {
			
			"sp_name": {
    			required: "<br/>ກະລຸນາປ້ອນ ຊື່ກ່ອນ...!",
    		},
    		"sp_tel": {
    			required: "<br/>ກະລຸນາປ້ອນ ເບີໂທກ່ອນ...!",
    		},
			"sp_addr": {
    			required: "<br/>ກະລຸນາປ້ອນ ທີ່ຢູ່ກ່ອນ...!",
    		},
			"sp_mail": {
    			required: "<br/>ກະລຸນາປ້ອນ ອີເມວ໌ກ່ອນ...! ",
    		},
			"cur_id": {
    			required: "<br/>ກະລຸນາເລືອກສະກຸນເງິນກ່ອນ...! ",
    		},
			/*doc*/
			/*
			"doc_code": {
    			required: "<br/>ກະລຸນາປ້ອນ ເລກທີເອກະສານ...!",
    		},
			"tyid": {
    			required: "<br/>ກະລຸນາເລືອກ ປະເພດເອກະສານ...!",
    		},
			"doc_date": {
    			required: "<br/>ກະລຸນາປ້ອນ ວັນທີກ່ອນ...! ",
    		},
			"docname": {
    			required: "<br/>ກະລຸນາປ້ອນ ຊື່ເອກະສານກ່ອນ...! ",
    		},
			"file_n": {
    			required: "<br/>ກະລຸນາເລືອກໄຟລ໌ກ່ອນ...! ",
    		},"status": {
    			required: "<br/>ກະລຸນາເລືອກສະຖານະ...! ",
    		},
			*/
			/*
			"dest": {
    			required: "<br/>ກະລຸນາເລືອກສາງປາຍທາງ...! ",
    		},
			*/

    	   	/*-------------- the table enter equipment -------------*/
			"eq_no[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ເລືອກເຄື່ອງ ຕາມລະຫັດ !</span><label>"
			},
			
			"eq_lot[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ປ້ອນລ໋ອດກ່ອນ !</span><label>",
				number: "</label><span class = 'req_err' style=\"display:inline;\">ຮັບຕົວເລກເທົ່ານັ້ນ !</span><label>"
			},
		
			"eq_name[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ເລືອກເຄື່ອງ ຕາມຊື່ !</span><label>"},
			"serial_start[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ປ້ອນຈໍານວນກ່ອນ !</span><label>",
					min: "</label><span class = 'req_err' style=\"display:inline;\">ຕ້ອງໃຫຍ່ກ່ວາສູນ !</span><label>",
			},
			"serial_end[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ປ້ອນຈໍານວນກ່ອນ !</span><label>",
					min: "</label><span class = 'req_err' style=\"display:inline;\">ຕ້ອງໃຫຍ່ກ່ວາສູນ !</span><label>",
			},
			"total_price[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ປ້ອນຈໍານວນກ່ອນ !</span><label>",
					min: "</label><span class = 'req_err' style=\"display:inline;\">ຕ້ອງໃຫຍ່ກ່ວາສູນ !</span><label>",
			},
			
			
						
    	}
		
    });
		/*-------------- validation the form receive equipment*/
	 $("#frmSale").validate({
    	rules: {
        	"cus_name": {required: true},
			"cus_tel": {required: true},
        	"cus_addr": {required: true},
        	"cus_mail": {required: true},
        	"dest": {required: true},
        	"cur_id": {required: true},
        	/*--------------------- enter in equipment -------------*/
			"eq_no[]": {required: true},
			"eq_lot[]": {required: true},
            "eq_name[]": {required: true},
            "serial[]": {required: true},
            "paid[]": {required: true},
            //"total_price[]": {required: true},
			
			
			/* "price[]": {number: true, min: 0}, */
    	},
    	
    	messages: {
			
			"cus_name": {
    			required: "<br/>ກະລຸນາປ້ອນ ຊື່ກ່ອນ...!",
    		},
    		"cus_tel": {
    			required: "<br/>ກະລຸນາປ້ອນ ເບີໂທກ່ອນ...!",
    		},
			"cus_addr": {
    			required: "<br/>ກະລຸນາປ້ອນ ທີ່ຢູ່ກ່ອນ...!",
    		},
			"cus_mail": {
    			required: "<br/>ກະລຸນາປ້ອນ ອີເມວ໌ກ່ອນ...! ",
    		},
			"cur_id": {
    			required: "<br/>ກະລຸນາເລືອກສະກຸນເງິນກອ່ນ...! ",
    		},
			/*
			"dest": {
    			required: "<br/>ກະລຸນາເລືອກສາງປາຍທາງ...! ",
    		},
			*/

    	   	/*-------------- the table enter equipment -------------*/
			"eq_no[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ເລືອກເຄື່ອງ ຕາມລະຫັດ !</span><label>"
			},
			
			"eq_lot[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ປ້ອນລ໋ອດກ່ອນ !</span><label>",
				number: "</label><span class = 'req_err' style=\"display:inline;\">ຮັບຕົວເລກເທົ່ານັ້ນ !</span><label>"
			},
		
			"eq_name[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ເລືອກເຄື່ອງ ຕາມຊື່ !</span><label>"},
			"serial[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ເລກ Serial !</span><label>",
			},
			"paid[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ປ້ອນເງິນທີ່ຈ່າຍກອ່ນ !</span><label>"},
			//"total_price[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ປ້ອນຈໍານວນກ່ອນ !</span><label>",
			//min: "</label><span class = 'req_err' style=\"display:inline;\">ຕ້ອງໃຫຍ່ກ່ວາສູນ !</span><label>",
			//},
			
			
						
    	}
		
    });
	
	
	
	//frmupdoc
		/*-------------- validation the form uploaded document ------*/
	 $("#frmupdoc").validate({
    	rules: {
        	/*"sp_id": {required: true}, */
        	"doc_code": {required: true},
			"tyid": {required: true},
        	"doc_date": {required: true},
        	"docname": {required: true},
        	"file_n": {required: true},
        	"status": {required: true},
        	
    	},
    	
    	messages: {
			/*
			"sp_id": {
    			required: "<br/>ກະລຸນາປ້ອນ ຊື່ກ່ອນ...!",
    		},
			*/
    		"doc_code": {
    			required: "<br/>ກະລຸນາປ້ອນ ເລກທີເອກະສານ...!",
    		},
			"tyid": {
    			required: "<br/>ກະລຸນາເລືອກ ປະເພດເອກະສານ...!",
    		},
			"doc_date": {
    			required: "<br/>ກະລຸນາປ້ອນ ວັນທີກ່ອນ...! ",
    		},
			"docname": {
    			required: "<br/>ກະລຸນາປ້ອນ ຊື່ເອກະສານກ່ອນ...! ",
    		},
			"file_n": {
    			required: "<br/>ກະລຸນາເລືອກໄຟລ໌ກ່ອນ...! ",
    		},"status": {
    			required: "<br/>ກະລຸນາເລືອກສະຖານະ...! ",
    		},
			
    	}
		
    });
	/*-------------- validation the form delivery equipment*/
	 $("#frmDelivery").validate({
    	rules: {
			//row:{max:100, min:1},
            
        	"doc_code": {required: true},
        	//"doc_name": {required: true},
        	"doc_date": {required: true, date: true},
        	"recieve_date": {required: true, date: true},
			"refer_code": {required: true},
        	"refer_date": {required: true, date: true},
        	"refer_doctype": {required: true},
        	"dest": {required: true},
        	"file_n": {required: true},
        	"refer_file": {required: true},
        	/*--------------------- enter in equipment -------------*/
			"eq_code[]": {required: true},
            "eq_lot[]": {required: true, number: true},
            "eq_name[]": {required: true},
			"qty[]": {required: true, min: 1},
			/* "price[]": {number: true, min: 0}, */
    	},
    	
    	messages: {
			//row:{max: "ຈຳນວນລາຍການ ສູງສຸດ 100", min: "ຈຳນວນລາຍການ ຕໍ່າສຸດ 1"},
			"doc_code": {
    			required: "<br/>ກະລຸນາປ້ອນເລກທີກ່ອນ...!",
    		},
			//"doc_name": {
    		//	required: "<br/>ກະລຸນາປ້ອນຊື່ເອກະສານ...!",
    		//},
    		"doc_date": {
    			required: "<br/>ກະລຸນາປ້ອນ ວັນທີ (yyyy-mm-dd)",
				date: "ວັນທີບໍ່ຖືກຕ້ອງ"
    		},
			"recieve_date": {
    			required: "<br/>ກະລຸນາປ້ອນ ວັນທີ (yyyy-mm-dd)",
				date: "ວັນທີບໍ່ຖືກຕ້ອງ"
    		},
			"refer_code": {
    			required: "<br/>ກະລຸນາປ້ອນເລກທີກ່ອນ...! ",
    		},
    		"refer_date": {
    			required: "<br/>ກະລຸນາປ້ອນ ວັນທີ (yyyy-mm-dd)",
				date: "ວັນທີບໍ່ຖືກຕ້ອງ"
    		},
    		"dest": {required: "<br/>ກະລຸນາເລືອກ ສາງປາຍທາງ"},
    		"refer_doctype": {required: "<br/>ເລືອກປະເພດເອກະສານກ່ອນ...!"},
			"file_n": {required: "<br />ແນບເອກະສານກ່ອນ !"},
			"refer_file": {required: "<br />ແນບເອກະສານກ່ອນ !"},
    	   	/*-------------- the table enter equipment -------------*/
			"eq_code[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ເລືອກເຄື່ອງ ຕາມລະຫັດ !</span><label>"
			},
			"eq_lot[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ປ້ອນລ໋ອກກ່ອນ !</span><label>",
				number: "</label><span class = 'req_err' style=\"display:inline;\">ຮັບຕົວເລກເທົ່ານັ້ນ !</span><label>"
			},
			"eq_name[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ເລືອກເຄື່ອງ ຕາມຊື່ !</span><label>"},
			"qty[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ປ້ອນຈໍານວນກ່ອນ !</span><label>",
					min: "</label><span class = 'req_err' style=\"display:inline;\">ຕ້ອງໃຫຍ່ກ່ວາສູນ !</span><label>",
			},
			/*
			"price[]": {number: "</label><span class = 'req_err' style=\"display:inline;\">ຮັບຕົວເລກເທົ່ານັ້ນ !</span><label>",
					min: "</label><span class = 'req_err' style=\"display:inline;\">ຕ້ອງໃຫຍ່ກ່ວາສູນ !</span><label>",
			},
			*/
						
    	}
		
    });
	/*-------------- validation the form delivery equipment*/
	 $("#frmD2dDel").validate({
    	rules: {
			//row:{max:100, min:1},
            
        	"doc_code": {required: true},
        	//"doc_name": {required: true},
        	"doc_date": {required: true, date: true},
        	"recieve_date": {required: true, date: true},
			"refer_code": {required: true},
        	"refer_date": {required: true, date: true},
        	"refer_doctype": {required: true},
        	"dest": {required: true},
        	"file_n": {required: true},
        	/* "refer_file": {required: true}, */
			/*----------- only the trans to team --------------*/
        	"team": {required: true},
        	"sell": {required: true},
			
        	/*--------------------- enter in equipment -------------*/
			"eq_code[]": {required: true},
            //"eq_lot[]": {required: true, number: true},
            "eq_name[]": {required: true},
            "serial_start[]": {required: true},
            "serial_end[]": {required: true},
			"qty[]": {required: true, min: 1},
			/* "price[]": {number: true, min: 0},
			*/
    	},
    	
    	messages: {
			//row:{max: "ຈຳນວນລາຍການ ສູງສຸດ 100", min: "ຈຳນວນລາຍການ ຕໍ່າສຸດ 1"},
			"doc_code": {
    			required: "<br/>ກະລຸນາປ້ອນເລກທີກ່ອນ...!",
    		},
			//"doc_name": {
    		//	required: "<br/>ກະລຸນາປ້ອນຊື່ເອກະສານ...!",
    		//},
    		"doc_date": {
    			required: "<br/>ກະລຸນາປ້ອນ ວັນທີ (yyyy-mm-dd)",
				date: "ວັນທີບໍ່ຖືກຕ້ອງ"
    		},
			"recieve_date": {
    			required: "<br/>ກະລຸນາປ້ອນ ວັນທີ (yyyy-mm-dd)",
				date: "ວັນທີບໍ່ຖືກຕ້ອງ"
    		},
			"refer_code": {
    			required: "<br/>ກະລຸນາປ້ອນເລກທີກ່ອນ...! ",
    		},
    		"refer_date": {
    			required: "<br/>ກະລຸນາປ້ອນ ວັນທີ (yyyy-mm-dd)",
				date: "ວັນທີບໍ່ຖືກຕ້ອງ"
    		},
			"team": {required: "<br />ກະລຸນາເລືອກ ທີມງານ !"},
			"sell": {required: "<br />ກະລຸນາເລືອກ ພະນັກງານຂາຍ !"},
    		"dest": {required: "<br/>ກະລຸນາເລືອກ ສາງປາຍທາງ"},
    		"refer_doctype": {required: "<br/>ເລືອກປະເພດເອກະສານກ່ອນ...!"},
			"file_n": {required: "<br />ແນບເອກະສານກ່ອນ !"},
			/* "refer_file": {required: "<br />ແນບເອກະສານກ່ອນ !"}, */
    	   	/*-------------- the table enter equipment -------------*/
			"eq_code[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ເລືອກເຄື່ອງ ຕາມລະຫັດ !</span><label>"
			},
			//"eq_lot[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ປ້ອນລ໋ອກກ່ອນ !</span><label>",
			//	number: "</label><span class = 'req_err' style=\"display:inline;\">ຮັບຕົວເລກເທົ່ານັ້ນ !</span><label>"
			//},
			"eq_name[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ເລືອກເຄື່ອງ ຕາມຊື່ !</span><label>"},
			"serial_start[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ປ້ອນເລກ Serial start!</span><label>"},
			"serial_end[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ປ້ອນເລກ Serial end!</span><label>"},
			"qty[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ປ້ອນຈໍານວນກ່ອນ !</span><label>",
					min: "</label><span class = 'req_err' style=\"display:inline;\">ຕ້ອງໃຫຍ່ກ່ວາສູນ !</span><label>",
			},
			/*
			"price[]": {number: "</label><span class = 'req_err' style=\"display:inline;\">ຮັບຕົວເລກເທົ່ານັ້ນ !</span><label>",
					min: "</label><span class = 'req_err' style=\"display:inline;\">ຕ້ອງໃຫຍ່ກ່ວາສູນ !</span><label>",
			},
			*/
						
    	}
		
    });
	/*---------------- form distribution equipment to --------------------------*/
	$("#frmDistribute").validate({
    	rules: {
			//row:{max:100, min:1},
            
        	"doc_code": {required: true},
        	"doc_name": {required: true},
        	"doc_date": {required: true, date: true},
        	"recieve_date": {required: true, date: true},
			"refer_code": {required: true},
        	"refer_date": {required: true, date: true},
        	"refer_doctype": {required: true},
        	"dest": {required: true},
        	"refer_file": {required: true},
        	"refer_dist": {required: true},
        	"dist_remark": {required: true},
			
        	/*--------------------- enter in equipment -------------*/
			"eq_code[]": {required: true},
            "eq_lot[]": {required: true, number: true},
            "eq_name[]": {required: true},
			"qty[]": {required: true, min: 1},
			"price[]": {number: true, min: 0},
    	},
    	
    	messages: {
			//row:{max: "ຈຳນວນລາຍການ ສູງສຸດ 100", min: "ຈຳນວນລາຍການ ຕໍ່າສຸດ 1"},
			"doc_code": {
    			required: "<br />ກະລຸນາປ້ອນເລກທີກ່ອນ...!",
    		},
			"doc_name": {
    			required: "<br/>ກະລຸນາປ້ອນຊື່ເອກະສານ...!",
    		},
    		"doc_date": {
    			required: "<br/>ກະລຸນາປ້ອນ ວັນທີ (yyyy-mm-dd)",
				date: "ວັນທີບໍ່ຖືກຕ້ອງ"
    		},
			"recieve_date": {
    			required: "<br/>ກະລຸນາປ້ອນ ວັນທີ (yyyy-mm-dd)",
				date: "ວັນທີບໍ່ຖືກຕ້ອງ"
    		},
			"refer_code": {
    			required: "<br/>ກະລຸນາປ້ອນເລກທີກ່ອນ...! ",
    		},
    		"refer_date": {
    			required: "<br/>ກະລຸນາປ້ອນ ວັນທີ (yyyy-mm-dd)",
				date: "ວັນທີບໍ່ຖືກຕ້ອງ"
    		},
    		"dest": {required: "<br/>ກະລຸນາເລືອກ ສາງປາຍທາງ"},
    		"refer_doctype": {required: "<br/>ເລືອກປະເພດເອກະສານກ່ອນ...!"},
			"refer_file": {required: "<br />ແນບເອກະສານກ່ອນ !"},
			"refer_dist": {required: "<br />ປ້ອນຂໍ້ມູນສົ່ງຕໍ່ແກ່ຜູ້ໃດກ່ອນ !"},
			"dist_remark": {required: "<br />ປ້ອນຂໍ້ມູນວິທີຈັດສົ່ງ ຫຼື ໝາຍເຫດກ່ອນ !"},
    	   	/*-------------- the table enter equipment -------------*/
			"eq_code[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ເລືອກເຄື່ອງ ຕາມລະຫັດ !</span><label>"},
			"eq_lot[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ປ້ອນລ໋ອກກ່ອນ !</span><label>",
				number: "</label><span class = 'req_err' style=\"display:inline;\">ຮັບຕົວເລກເທົ່ານັ້ນ !</span><label>"
			},
			"eq_name[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ເລືອກເຄື່ອງ ຕາມຊື່ !</span><label>"},
			"qty[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ປ້ອນຈໍານວນກ່ອນ !</span><label>",
					min: "</label><span class = 'req_err' style=\"display:inline;\">ຕ້ອງໃຫຍ່ກ່ວາສູນ !</span><label>",},
			"price[]": {number: "</label><span class = 'req_err' style=\"display:inline;\">ຮັບຕົວເລກເທົ່ານັ້ນ !</span><label>",
					min: "</label><span class = 'req_err' style=\"display:inline;\">ຕ້ອງໃຫຍ່ກ່ວາສູນ !</span><label>",
			},
						
    	}
	
    });
	$("#frmChangepass").validate({
    	rules: {
            "username[]": {required: true},
            "password[]": {required: true, minlength: 6},
            "confirm_pass[]": {required: true, equalTo: ".password"},
			
    	},
    	
    	messages: {
			
			"username[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ກະລຸນາ ປ້ອນຊື່ກ່ອນ !</span><label>"},
			
			"password[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ກະລຸນາ ປ້ອນລະຫັດຜ່ານກ່ອນ !</span><label>",
				minlength: "</label><span class = 'req_err' style=\"display:inline;\">ຢ່າງໜ້ອຍ 6 ອັກສອນ !</span><label>",
			},
			"confirm_pass[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ກະລຸນາ ຢືນຢັນລະຫັດຜ່ານກ່ອນ !</span><label>",
				equalTo: "</label><span class = 'req_err' style=\"display:inline;\">ຢືນຢັນລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ !</span><label>",
			},
						
    	}
    });
	/*--------- validation the form confirm distribution -----*/
	$("#confirmDist").validate({
    	rules: {
            "confirm_date": {required: true},
            "file_n": {required: true},
			
    	},
    	
    	messages: {
			
			"confirm_date": {required: "<br/> ກະລຸນາ ປ້ອນວັນທີກ່ອນ !"},
			
			"file_n": {required: "<br/> ກະລຸນາ ແນບໄຟລ໌ກ່ອນ !",
			},
						
    	}
    });
	/*--------- validation the form prince setting -----
	$("#frmprice").validate({
    	rules: {
            "cat_cd[]": {required: true},
            "equip_nl": {required: true},
            "price_sell[]": {required: true},
            "price_discount[]": {required: true},
            "condition_sell[]": {required: true},
			
    	},
    	
    	messages: {
			
			"cat_cd[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ກະລຸນາ ລະຫັດກ່ອນ !</span><label>"},
			"equip_nl[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ກະລຸນາ ປ້ອນຊື່ອຸປະກອນ !</span><label>"},
			"price_sell[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ກະລຸນາ ປ້ອນລາຄາກ່ອນ !</span><label>"},
			"price_discount[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ກະລຸນາ ປ້ອນສ່ວນລົດກ່ອນ !</span><label>"},
			"condition_sell[]": {required: "</label><span class = 'req_err' style=\"display:inline;\">ກະລຸນາ ປ້ອນເງືອນໄຂສ່ວນລົດ !</span><label>"},
						
    	}
    });
	*/
	
	// check the duplicate 
	
	$(".serials_t").change(function(){
    	var thiscode = this.value;
    	if (thiscode != ""){
	    	// Check exist code in the page
    		var count = 0;
    		$(".serials_t").each(function(){
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
	
	//$("#frmDistribute").submit(checkqty);
})
/*
function chSerials() 
{
	var serial = chSer();    
	if (serial) {	
		//return true;
	} else { 
		//return false;
		
	}
}
*/

function chSerial(){
	var serial_start = document.forms[0].elements["serial_start[]"];
	var serial_end = document.forms[0].elements["serial_end[]"];
	
	for (var i = 0, len = serial_start.length; i < len; i++) {
		
		var s_start = parseInt(serial_start[i].value);
		var s_end = parseInt(serial_end[i].value);
		var bal = 0;;
		if(!isNaN(s_start) &&  !isNaN(s_end)){
			bal = s_end - s_start;
			if(bal < 0 ){
				alert("ເລກ Serial Start ຕ້ອງໜ້ອຍກວ່າ ຫຼື ເທົ່າ ກັບ Serial End (ໃນແຖວທີ "+(i+1)+")...!");
				// serial_start[i].focus();	
				return false;
			}else{
				//return false;
			}
			
		}else{
			alert("ເລກ Serial ຕ້ອງເປັນຕົວເລກເທົ່ານັ້ນ (ໃນແຖວທີ "+(i+1)+")...!");
			// serial_start[i].focus();	
			return false;
		}
	  
	}
	
	//if (serial.value == '') {
		//document.getElementById('erract').innerHTML = "<span class='errChk' >fghfg...!</span>";		
	//	serial.focus();		
	//	return false;
	//} else {
	//	document.getElementById('erract').innerHTML = "";		
	//	return true;
	//}
}
/*------------------------------------------------------------ validate input in form v_recieve.php --------------------------*/
/*
function teston(){
	
   // var thiscode = this.value;
    var thiscode = document.getElementById("eq_code[0]").value;
    if (thiscode != ""){
		alert(thiscode);
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
}

function validateVtierDD(src, Lines){
	var flag = false;
	var counter = 0;
	for(var ch=1 ; ch<=Lines; ch++){
		var vtierDD = document.getElementsByName("txtoperator"+ch);
	
		if(src.value!=-1 && vtierDD && vtierDD.length > 0){
			for(var i=0; i < vtierDD.length; i++){
				if(src.value == vtierDD[i].value){
					counter++;
					if(counter>1)break;
				}
			}
		} 	
	}
	if(counter>1){
		alert(src.options[src.selectedIndex].text + "  is already selected.");
		src.value="-1";
		return false;
	}else{
		return true;
	}	
}

function doCheck(src, Lines) {
	
	if(validateVtierDD(src, Lines)){

	}
}
*/