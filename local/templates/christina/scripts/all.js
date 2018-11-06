$(document).ready(function(){

    $(document).on('click', '.news__btn.load_more', function(){

        var targetContainer = $('.news__items'),          //  Контейнер, в котором хранятся элементы
            url =  $('.news__btn.load_more').attr('data-url');    //  URL, из которого будем брать элементы

        if (url !== undefined) {
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'html',
                success: function(data){

                    //  Удаляем старую навигацию
                    $('.news__btn.load_more').remove();

                    var elements = $(data).find('.newsajax'),  //  Ищем элементы
                        pagination = $(data).find('.news__btn.load_more');//  Ищем навигацию

                    targetContainer.append(elements);   //  Добавляем посты в конец контейнера
                    targetContainer.append(pagination); //  добавляем навигацию следом

                }
            })
        }

    });
    
    $(document).on('click', '.comment__btn.load_more', function(){

        var targetContainer = $('.consult_wr__comments'),          //  Контейнер, в котором хранятся элементы
            url =  $('.comment__btn.load_more').attr('data-url');    //  URL, из которого будем брать элементы

        if (url !== undefined) {
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'html',
                success: function(data){

                    //  Удаляем старую навигацию
                    $('.comment__btn.load_more').remove();

                    var elements = $(data).find('.consult_wr__comment'),  //  Ищем элементы
                        pagination = $(data).find('.comment__btn.load_more');//  Ищем навигацию

                    targetContainer.append(elements);   //  Добавляем посты в конец контейнера
                    targetContainer.append(pagination); //  добавляем навигацию следом

                }
            })
        }

    });

});

function city(id){
	$.ajax({
		type: "POST",
		url: "/include/city.php",
		data: ( {"id" : id} ),
		success: function(html){
			//$('.orderres').html(html);
		}
	});
}

function revall(id){
	$.ajax({
		type: "POST",
		url: "/include/revall.php",
		data: ( {"id" : id} ),
		success: function(html){
			$('#revall').html(html);
		}
	});
	
}
function addcartbasket(id){
	var quant = $('#quantity').val();
	$.ajax({
		type: "POST",
		url: "/include/add_cart.php",
		data: ( {"id" : id, "quant": quant} ),
		success: function(html){			
			$('.rescart').html(html);
		}
	});
	
	$.ajax({
		type: "POST",
		url: "/include/cart.php",
		success: function(html){
			$('#result_cart').html(html);
			
		}
	});
}

function addcart(id) {
	var quant = $('#quantity').val();
	$.ajax({
		type: "POST",
		url: "/include/add_cart.php",
		data: ( {"id" : id, "quant": quant} ),
		success: function(html){			
			$('.rescart').html(html);
		}
	});
	
	$.ajax({
		type: "POST",
		url: "/include/add_cart2.php",
		data: ( {"id" : id, "quant": quant} ),
		success: function(html){			
			$('.rescart2').html(html);
		}
	});
	
}

function editadres(id){
	$.ajax({
		type: "POST",
		url: "/include/editadres.php",
		data: ( {"id" : id} ),
		success: function(html){
			$('#res-adres').html(html);
		}
	});
}

function votyes(id){
	$.ajax({
		type: "GET",
		url: "/include/voteyes.php",
		data: ( {"id" : id} ),
		success: function(html){
			$('#reslike-'+id).html(html);
		}
	});

	return false;
}

function votno(id){
	$.ajax({
		type: "GET",
		url: "/include/voteno.php",
		data: ( {"id" : id} ),
		success: function(html){
			$('#reslike-'+id).html(html);
		}
	});
	
	return false;
}
