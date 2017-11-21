$(document).ready(function () {
	//tooltip menu
	$("input#resultados").tipso({
		  showArrow: true,
		  position: 'right',
		  background: 'rgba(0, 0, 0, 0.5)',
		  color: '#eee',
		  useTitle: false,
		  animationIn: 'bounceIn',
		  animationOut: 'bounceOut',
		  size: 'small'
	});
	
	$("input#resultados").keyup(function () {
    var data = this.value.split(" ");
 
    var jo = $("tbody#resultadoBus").find("tr");
    if (this.value == "") {
        jo.show();
        return;
    }
    jo.hide();

    jo.filter(function (i, v) {
        var $t = $(this);
        for (var d = 0; d < data.length; ++d) {
            if ($t.text().toUpperCase().indexOf(data[d].toUpperCase()) >= 0) {
                return true;
            }
        }
        return false;
    })
    .show();
}).focus(function () {
    this.value = "";
    $(this).css({
        "color": "black"
    });
    $(this).unbind('focus');
}).css({
    "color": "#C0C0C0"
});
});