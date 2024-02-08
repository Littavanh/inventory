$(function(){
//This function used to divide province, district, viilage budget automatically
$("#btcaldiv").click(function(){
	var bal = 0;
	var div = 0;
	var df = new DecimalFormat("#,#00.00#");
	var row = $('.inputtextpict').length;
	bal = parseFloat($("#bal").val().replace(/,/g, ""));
	div = bal / row;
	$('.inputtextpict').val(df.format(div));
	
});
//This function used to check that selected provinces are duplicated or not when select dropdown list.
$("#addprv").click(function(){
	var duplicated = false
	var prvselectedvalue = $('#prv').val();
	var disselectedvalue = $('#distname').val();
	var villselectedvalue = $('#vill').val();
	//
	$('.provid').each(function(){
		if($(this).val() == prvselectedvalue){
			duplicated = true;
			return;
		}
	});
	//
	$('.distid').each(function(){
		if($(this).val() == disselectedvalue){
			duplicated = true;
			return;
		}
	});
	//
	$('.villid').each(function(){
		if($(this).val() == villselectedvalue){
			duplicated = true;
			return;
		}
	});
	
	if (duplicated){
		alert('ຂໍ້ມູນທີ່ຈະປ້ອນໄດ້ຖືກປ້ອນລົງໄປແລ້ວ!');
		return false;
	}
});
//This function use to calculate budget donor from inputting.
$(".price").keyup(function(){
	var total = 0;
	var bal = 0;
	var df = new DecimalFormat("$#,#00.00#");
	$(".price").each(function(){ total += parseFloat($(this).val().replace(/,/g, "")) });
	if (isNaN(total)) total = "ມີຕົວເລກບາງໂຕທ່ານປ້ອນບໍ່ຖືກຕ້ອງ";
	//$("#totalbudget").text(df.format(total));
	
});
//This function use to calculate budget from inputting.
$(".inputtextpict").keyup(function(){
	var total = 0;
	var left = 0;
	var bal = 0;     
	var df = new DecimalFormat("$#,#00.00#");    
	$(".inputtextpict").each(function(){ total += parseFloat($(this).val().replace(/,/g, "")) });
	if (isNaN(total)) total = "ມີຕົວເລກບາງໂຕທ່ານປ້ອນບໍ່ຖືກຕ້ອງ";
	$("#totalbudgett").text(df.format(total));
	$(".inputtextpict").each(function(){
		bal = parseFloat($("#bal").val().replace(/,/g, ""));
		left = bal - total;
	});
	if (isNaN(left)) left = "ມີຕົວເລກບາງໂຕທ່ານປ້ອນບໍ່ຖືກຕ້ອງ";
	$("#balanceleft").text(df.format(left));
});

});
function strrev(str) {
            if (!str) return '';
            var revstr = '';
            for (i = str.length - 1; i >= 0; i--)
                revstr += str.charAt(i)
            return revstr;
        }

function ReplaceAll(Source, stringToFind, stringToReplace) {
            var temp = Source;
            var index = temp.indexOf(stringToFind);
            while (index != -1) {
                temp = temp.replace(stringToFind, stringToReplace);
                index = temp.indexOf(stringToFind);
            }
            return temp;
}
function AddAndRemoveSeparator(txtbox) {
            var i = 0, Odd = 0; rev = '', result = '';
            txtbox.value = ReplaceAll(txtbox.value, ',', ''); //remove prevoius separators; 
            if (txtbox.value.length <= 3) return;
            rev = strrev(txtbox.value); //reverse string; 
            while (i < rev.length) {
                result += rev.substr(i, 1);
                Odd++;
                if ((Odd == 3) && (i != rev.length - 1)) { //add separator after 3 digits; 
                    result += ',';
                    Odd = 0;
                }
                i++;
            }
            result = strrev(result);
            //            if (result.charAt(1) == ',') { 
            //                result = result.substr(2, result.length-1) 
            //            } 
            txtbox.value = result;

}
function AddAndRemoveSeparator2(txtbox) {
	var result = '';
	var ndot = "";
	txtbox.value = ReplaceAll(txtbox.value, ',', ''); //remove prevoius separators; 
	if (txtbox.value.length <= 3) return;
	result = txtbox.value; 
	result = result.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	txtbox.value = result;
}