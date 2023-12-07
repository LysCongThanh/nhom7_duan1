// some scripts

// jquery ready start
$(document).ready(function() {
	// jQuery code

  // var html_download = '<a href="http://bootstrap-ecommerce.com/templates.html" class="btn btn-dark rounded-pill" style="font-size:13px; z-index:100; position: fixed; bottom:10px; right:10px;">Download theme</a>';
  //  $('body').prepend(html_download);
    

	//////////////////////// Prevent closing from click inside dropdown
    $(document).on('click', '.dropdown-menu', function (e) {
      e.stopPropagation();
    });


     ///////////////// fixed menu on scroll for desctop
    if ($(window).width() < 768) {

     	$('.nav-home-aside .title-category').click( function(e){
     		e.preventDefault();
     		$('.menu-category').slideToggle('fast', function() { $('.menu-category .submenu').hide() });
     	});

     	$('.has-submenu a').click( function(e){
     		e.preventDefault();
     		$(this).next().slideToggle('fast');
     	});
 
    } // end if


    // custom checkbox inside card effect
    $('.js-check :radio').change(function () {
        var check_attr_name = $(this).attr('name');
        if ($(this).is(':checked')) {
            $('input[name='+ check_attr_name +']').closest('.js-check').removeClass('active');
            $(this).closest('.js-check').addClass('active');
           // item.find('.radio').find('span').text('Add');

        } else {
            item.removeClass('active');
            // item.find('.radio').find('span').text('Unselect');
        }
   
    });

	//////////////////////// Bootstrap tooltip
	if($('[data-toggle="tooltip"]').length>0) {  // check if element exists
		$('[data-toggle="tooltip"]').tooltip()
	} // end if


	// offcanvas menu
	$("[data-trigger]").on("click", function(e){
        e.preventDefault();
        e.stopPropagation();
        var offcanvas_id =  $(this).attr('data-trigger');
        $(offcanvas_id).toggleClass("show");
        $('body').toggleClass("offcanvas-active");
        $(".screen-overlay").toggleClass("show");
    }); 

   	// Close menu when pressing ESC
    $(document).on('keydown', function(event) {
        if(event.keyCode === 27) {
           $(".mobile-offcanvas").removeClass("show");
           $("body").removeClass("overlay-active");
        }
    });
    // Close menu by clicking
    $(".btn-close, .screen-overlay").click(function(e){
    	$(".screen-overlay").removeClass("show");
        $(".mobile-offcanvas").removeClass("show");
        $("body").removeClass("offcanvas-active");
    }); 
    
}); 
// jquery end

// comment_rating
$(document).ready(function() {
    var rating_data = 0;
    $('#add_review').click(function() {
      $('#review_modal').modal('show');
    });

    $(document).on('mouseenter', '.submit_star', function() {
      var rating = $(this).data('rating');
      reset_background();
      for (var count = 1; count <= rating; count++) {
        $('#submit_star_' + count).addClass('text-warning');
      }
    });

    $(document).on('mouseleave', '.submit_star', function() {
      reset_background();
      highlight_stars(rating_data);
    });

    $(document).on('click', '.submit_star', function() {
      rating_data = $(this).data('rating');
      highlight_stars(rating_data);
    });

    function reset_background() {
      for (var count = 1; count <= 5; count++) {
        $('#submit_star_' + count).addClass('star-light');
        $('#submit_star_' + count).removeClass('text-warning');
      }
    }

    function highlight_stars(count) {
      reset_background();
      for (var i = 1; i <= count; i++) {
        $('#submit_star_' + i).addClass('text-warning');
      }
    }

    function reset_popup() {
      rating_data = 0;
      $('#content').val('');
      reset_background();
    }

    $('#save_review').click(function() {
      var user = $('#user').val();
      var pds = $('#pds').val();
      var content = $('#content').val();

      if (rating_data === 0) {
        alert('Vui lòng đánh giá sao trước khi gửi nhận xét!');
        return false;
      }

      if (content == "") {
        alert('Vui lòng nhập nội dung!');
        return false;
      } else {
        $.ajax({
          url: "them-binh-luan",
          method: "POST",
          data: {
            user: user,
            pds: pds,
            content: content,
            rating_data: rating_data
          },
          success: function(data) {
            $('#review_modal').modal('hide');
            alert('Gửi đánh giá thành công');
            reset_popup();
            load_rating();
          }
        });
      }
    });
    load_rating();

    function load_rating() {
      var bookId = $('#pds').val();

      $.ajax({
        url: "load-rating",
        method: "POST",
        data: {
          action: 'load_data',
          product_id: bookId
        },
        dataType: "JSON",
        success: function(data) {
          $('.average_rating').text(data.average_rating);
          $('#total_review').text(data.total_review);

          var starsWidth = (data.average_rating / 5) * 100;
          $('.full-stars').css('width', starsWidth + '%');

          $('#total_five_star_review').text(data.five_star_review);
          $('#total_four_star_review').text(data.four_star_review);
          $('#total_three_star_review').text(data.three_star_review);
          $('#total_two_star_review').text(data.two_star_review);
          $('#total_one_star_review').text(data.one_star_review);


          $('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');
          $('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');
          $('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');
          $('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');
          $('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');

          if (data.review_data && data.review_data.length > 0) {
            var html = '';
            for (var count = 0; count < data.review_data.length; count++) {
              html += '<div class="row mb-3">';


              html += '<div class="col-sm-11">';
              html += '<div class="card">';

              html += '<div class="card-header">';
              html += '<div class="d-flex align-items-center">';
              html += '<div class="rounded-circle bg-primary text-white pt-1 pb-1 text-center" style="width: 30px; height: 30px;">';
              html += '<h3 style="font-size: 1rem;">' + data.review_data[count].name.charAt(0) + '</h3>';
              html += '</div>';
              html += '<b class="ml-3">' + data.review_data[count].name + '</b>'; // Adjusted margin here
              html += '</div>';
              html += '</div>';

              html += '<div class="card-body">';
              for (var star = 1; star <= 5; star++) {
                var class_name = '';
                if (data.review_data[count].rating >= star) {
                  class_name = 'text-warning';
                } else {
                  class_name = 'star-light';
                }
                html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
              }
              html += '<br/>';
              html += '<div class="text-muted">' + data.review_data[count].created_at + '</div>';
              html += '<p class="card-text">' + data.review_data[count].content + '</p>';
              html += '</div>';

              html += '</div>';
              html += '</div>';

              html += '</div>';

            }

            $('#review_content').html(html);

          }

        }
      });
    }

  });