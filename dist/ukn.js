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
