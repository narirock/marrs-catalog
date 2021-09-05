$(Document).ready(function(){
    // BACKDROP HOVER EFFECTS MENU
    $( ".has-dropdown" ).hover(
        function() {
            $(".overlay-menu").css("display", "block");
            // $(".overlay-menu").css("display", "block");
        }, function() {
            $(".overlay-menu").css("display", "none");
        }
    );

    // SLIDER
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
          delay: 3500,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });

    //   DEPARTMENTS MOBILE
    $(".depart-carousel").owlCarousel({
        center: true,
        loop: false,
        items: 1,
        margin: 20,
        dots: false,
        autoplay: true,
        autoplayTimeout: 1700,
        stagePadding: 0,
        responsive: {
            0: {
                items: 2,
                center: true,
            },
            600: {
                items: 2,
                center: true,
            },
            1000: {
                items: 5,
                center: true,
            },
        },
    });

    //   BESTES CAROUSEL -> HOME
    $(".bests-carousel").owlCarousel({
        center: false,
        loop: false,
        items: 1,
        margin: 20,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 2000,
        stagePadding: 0,
        responsive: {
            0: {
                items: 2,
                center: true,
            },
            600: {
                items: 2,
                center: true,
            },
            1000: {
                items: 5,
                center: false,
                autoplay: false
            },
        },
    });

    // PRODUCT MAIN IMAGES

     $(document).ready(function(){

$(".tb").hover(function(){

    $(".tb").removeClass("tb-active");
    $(this).addClass("tb-active");

    current_fs = $(".active");

    next_fs = $(this).attr('id');
    next_fs = "#" + next_fs + "1";

    $("fieldset").removeClass("active");
    $(next_fs).addClass("active");a

    current_fs.animate({}, {
            step: function() {
                current_fs.css({
                'display': 'none',
                'position': 'relative'
            });
            next_fs.css({
            'display': 'block'
            });
        }
    });
});

});


    // OPTION RADIOS
    $('.radio-option .radio-item').click(function(){
        $(this).parent().find('.radio-item').removeClass('selected');
        $(this).addClass('selected');
        var val = $(this).attr('data-value');
        //alert(val);
        $(this).parent().find('input').val(val);
    });


    // QUANTITY BUTTON
    var input = document.querySelector('#qty');
var btnminus = document.querySelector('.qtyminus');
var btnplus = document.querySelector('.qtyplus');

if (input !== undefined && btnminus !== undefined && btnplus !== undefined && input !== null && btnminus !== null && btnplus !== null) {

	var min = Number(input.getAttribute('min'));
	var max = Number(input.getAttribute('max'));
	var step = Number(input.getAttribute('step'));

	function qtyminus(e) {
		var current = Number(input.value);
		var newval = (current - step);
		if(newval < min) {
			newval = min;
		} else if(newval > max) {
			newval = max;
		}
		input.value = Number(newval);
		e.preventDefault();
	}

	function qtyplus(e) {
		var current = Number(input.value);
		var newval = (current + step);
		if(newval > max) newval = max;
		input.value = Number(newval);
		e.preventDefault();
	}

	btnminus.addEventListener('click', qtyminus);
	btnplus.addEventListener('click', qtyplus);

}

    // EDIT INFO CARD CUSOTMER DATA
    $(".info-title").html("<i class='fas fa-user-circle'></i> &nbsp; Informações da sua conta");
    $(".close-info-btn").click(function(){
      $(".edit-box").hide();
      $(".card-info").show();
      $(".info-title").html("<i class='fas fa-user-circle'></i> &nbsp; Informações da sua conta");
    });
    $(".edit-info-btn").click(function(){
      $(".edit-box").show();
      $(".card-info").hide();
      $(".info-title").html("<i class='fas fa-user-edit'></i> &nbsp; Edite suas informações");
    });
});

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

// SLIDER CART FUNCTIONS
// Botao de abrir carrinho
    function openRightMenu() {
        document.getElementById("rightMenu").style.display = "block";
        document.getElementById("cart-backdrop").style.display = "block";
    }
    // Botao de fechar carrinho
    function closeRightMenu() {
        document.getElementById("rightMenu").style.display = "none";
        document.getElementById("cart-backdrop").style.display = "none";
    }
    // Fechar carrinho pressionando a tecla [Esc]
    $(document).keyup(function(e) {
        if (e.key === "Escape") {
            document.getElementById("rightMenu").style.display = "none";
            document.getElementById("cart-backdrop").style.display = "none";
        }
    });


