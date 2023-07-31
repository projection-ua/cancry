// select drop

$('select').each(function(){
    var $this = $(this), numberOfOptions = $(this).children('option').length;
  
    $this.addClass('select-hidden'); 
    $this.wrap('<div class="select"></div>');
    $this.after('<div class="select-styled"></div>');

    var $styledSelect = $this.next('div.select-styled');
  
    var $list = $('<ul />', {
        'class': 'select-options'
    }).insertAfter($styledSelect);
  
for (var i = 0; i < numberOfOptions; i++) {
	$('<li />', {
		text: $this.children('option').eq(i).text(),
		rel: $this.children('option').eq(i).val()
	}).appendTo($list);
	if ($this.children('option').eq(i).is(':selected')){
		$('li[rel="' + $this.children('option').eq(i).val() + '"]').addClass('is-selected');
		$styledSelect.text($('.select-options li.is-selected').text());
	}
}
  
    var $listItems = $list.children('li');
  
    $styledSelect.click(function(e) {
        e.stopPropagation();
        $('div.select-styled.active').not(this).each(function(){
            $(this).removeClass('active').next('ul.select-options').hide();
        });
        $(this).toggleClass('active').next('ul.select-options').toggle();
    });
	
	

    $listItems.click(function(e) {
        e.stopPropagation();
        $styledSelect.text($(this).text()).removeClass('active');
        $this.val($(this).attr('rel'));
      $list.find('li.is-selected').removeClass('is-selected');
      $list.find('li[rel="' + $(this).attr('rel') + '"]').addClass('is-selected');
        $list.hide();
        //console.log($this.val());
    });
  
    $(document).click(function() {
        $styledSelect.removeClass('active');
        $list.hide();
    });

});



$(function() {
	// copy content to clipboard
	function copyToClipboard(element) {
	  var $temp = $(".input_copy");
	  $("body").append($temp);
	  $temp.val($(element).text()).select();
	  document.execCommand("copy");
	  $temp.remove();
	}
  
	// copy coupone code to clipboard
	$(".icon_copy").on("click", function() {
	  copyToClipboard("#coupon-field");
	  $(".coupon-alert").fadeIn("slow");
	});
});  

$(function() {
    var height = $( '.info_products' ).height(); 
    $( '.gallary_block' ).height(height + 140); 
});

 $(document).ready(function(){

	$('.search_block_icon').on('click',function(){
		$('.search_wrapper').addClass('active');
		$('.search_block').addClass('active');
		$('.search_back').addClass('active');
	});
    $('.close-search').on('click',function(){
		$('.search_back').removeClass('active');
		$('.search_block').removeClass('active');
		$('.search_wrapper').removeClass('active');
	});
    
});

const swiper_image = new Swiper('.swiper_image', {
	pagination: {
		el: '.swiper-pagination',
		clickable: true,
	  }
});
const swiper_related = new Swiper('.swiper_related', {
	navigation: {
		nextEl: '.swiper-next',
		prevEl: '.swiper-prev',
	  },
	slidesPerView: 4,
	spaceBetween: 6,
});


 

