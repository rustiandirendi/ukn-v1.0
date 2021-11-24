function aos_init() {
	AOS.init({
		duration: 1000,
		easing: "ease-in-out",
		once: true,
		mirror: false
	});
}
aos_init();
open_preloader();

function copyText(url) {
    var dummy = document.createElement("textarea");
    document.body.appendChild(dummy);
    dummy.value = url;
    dummy.select();
    document.execCommand("copy");
    document.body.removeChild(dummy);
    swal({
	  text: "successfully copied",
	});
}

var popupModal = new bootstrap.Modal(document.getElementById("weddingPopup"), {});
document.onreadystatechange = function () {
	popupModal.show();
	setTimeout(function(){
		close_preloader();
	},4000);
};

function open_preloader(){
	var customElement = $("<div>", {
	    "css"   : {
	        "font-size"     : "22px",
	        "text-align"    : "center",
	    },
	    "class" : "please-wait",
	    "text"  : "Please Wait..."
	});

	$.LoadingOverlay("show", {
	    image       : "",
	    customAnimation  : "3s fadein",
	    custom      : customElement
	});
}

function close_preloader(){
	$.LoadingOverlay("hide");
}

cekRsvp();

function cekRsvp() {
	var cek = "<?php if($rsvp==null) {echo "x";}else{echo $rsvp;} $rsvp ?>";
	document.getElementById("weddingImgCode").style.display = "none";
	if (cek == "x") {
		document.getElementById("finisRsvp").style.display = "none";
		document.getElementById("yesRsvp").style.display = "none";
	}else{
		document.getElementById("showRsvp").style.display = "none";
		if (cek == "n") {
			document.getElementById("yesRsvp").style.display = "none";
		}
	}
};

function imgDownlodCode(){
	html2canvas(document.querySelector("#imgCode")).then(canvas => {
		var width;
		var height;
		var fileName = "Milea & Dilan"
	    return Canvas2Image.saveAsJPEG(canvas, width, height, fileName);
	});
}

$('#downloadCardRsvp').on('click',function(){
	var name_guest = "<?php echo $name_guest; ?>"
	var address_guest = "<?php echo $address_guest; ?>"
	var kode_guest = "<?php echo $kode_guest; ?>";
	document.getElementById("codeSrc").src = "<?php echo base_url() ?>assets/qrcode/"+kode_guest+".png";
	document.getElementById("codeName").innerHTML = name_guest;
	document.getElementById("codeAddress").innerHTML = address_guest;
	document.getElementById("weddingImgCode").style.display = "block";
	imgDownlodCode();
	document.getElementById("weddingImgCode").style.display = "none";
});
