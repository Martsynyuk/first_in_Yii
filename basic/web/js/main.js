
"use strict";

// pagination 

$( document ).ready(function() {

	$('.content').on('click', '#close, #no', function(){
		main.close_window_for_delete();
	});
	
	$('.content').on('click', '#yes', function(){
		main.delete_contact($(this).attr('data'));
	});
	
	$('.content').on('click', '.sort, .active_sortFirst, .active_sortSecond',  function(e) {
		main.sort($(this));
		e.preventDefault();
	});
	
	/*$('.contact').on('click', '.top a',  function(e) {
		main.check_all($(this));
		e.preventDefault();
	});
	
	$('.contact').on('click', '.check', function(){
		main.check($(this));
	});
		
	*/$('.cont .pagination ul>li a, .content').on('click', '.pagination a', function(e) {	
		main.pagination($(this).data('page'));
		e.preventDefault();
	});
	
	$('.content').on('click', 'span.delete', function(e) {
		main.window_for_delete($(this));	
		e.preventDefault();
	});
	
});

class Main {
	
	pagination(page)
	{	
		page = page +1;
		
		var url = [$('.container').data('class'), $('.container').data('method')];
				
		var sortFirst = $('.active_sortFirst').data('sort');
		var sortSecond = $('.active_sortSecond').data('sort');
		
		history.pushState(null, null, '/'+ url[0] + '/' + url[1] + '/' + page + '/');
	
		this.ajax(url, page, sortFirst, sortSecond);
	}		
	
	sort(obj)
	{
		console.log('asdasd');
		var url = [$('.container').data('class'), $('.container').data('method')];
		
		var sorting = $(obj).data('sort');
				
		if(sorting == 'FirstNameUp' || sorting == 'FirstNameDown')
		{
			var sortFirst = sorting;
			var sortSecond = $('.active_sortSecond').data('sort');
		}
		else if(sorting == 'LastNameUp' || sorting == 'LastNameDown')
		{
			var sortFirst = $('.active_sortFirst').data('sort');
			var sortSecond = sorting;
		}
			
		var page = $('.active a').data('page');
		page = page + 1;
		
		history.pushState(null, null, '/'+ url[0] + '/' + url[1] + '/' + page + '/');
		
		this.ajax(url, page, sortFirst, sortSecond);
	}
	
	
	ajax(url, page, sortFirst, sortSecond)
	{
		$.ajax({
			type: 'get',
			url: '/' + url[0] + '/' + url[1] + '_ajax',
			data:{'page': page, 'first': sortFirst, 'second': sortSecond},
			response:'html',
			success: function(data){
				$('.content').empty();
				$('.content').append(data);
				$('.contact').empty();
				$('.contact').append(data);
			},
			complete: function(){
				//parent:main.checked_checkbox();
			}
		});
	}
	
	// end pagination
	
	// delete in index file 
	
	window_for_delete(obj)
	{
		$('#delete_contact').css('display', 'block');
		var user = obj.attr('data').split(', ');	
		$('#text').text('You really want to delete contact - ' + user[1] + ' ?');
		$('#yes').attr('data', user)
	}
	
	close_window_for_delete()
	{
		$('#delete_contact').css('display', 'none');	
	}
	
	delete_contact(contact)
	{
		var contact = contact.split(',');
		
		$.ajax({
			type: 'get',
			url: '/contacts/delete',
			data:{'contact': contact[0]},
			success: function(){
				
				$('#yes').css('display', 'none');
				$('#no').css('display', 'none');
				$('#text').text('Contact ' + contact[1] + ' deleted');
	
				var startFrom = 5;
				$('#countdown span').text(startFrom).parent('p').show();
				var timer = setInterval(function(){
					$('#countdown span').text(--startFrom);
				    if(startFrom <= 0) {
				        clearInterval(timer);
				        $('#delete_contact').css('display', 'none');
				        //parent:main.pagination($('.page_active').text());
				    }
				},1000);
	
			}
					  
		});
			
	}
	
	//checkbox
	
	check_all(obj)
	{
		var checking_all = obj.text()
		
		if(checking_all == 'All')
		{			
			$("input:checkbox").prop("checked", true);
			obj.text('Off');
			$("input:checkbox").each(function(key, val){
				parent:main.check(val);		
			});
		}
		else
		{
			$("input:checkbox").prop("checked", false);
			obj.text('All');
			$("input:checkbox").each(function(key, val){
				parent:main.check(val);
			});
		}
	}
	
	check(obj)
	{
		var check = $(obj).attr('data');
		
		if($(obj).is(':checked'))
		{
			
			if($.cookie('select') == null || $.cookie('select') == '')
			{
				$.cookie('select', check, {expires: 1, path: '/'});
			}
			else{
				check = check + ', ' + $.cookie('select');
				$.cookie('select', check, {expires: 1, path: '/'});
			}
		}
		else{
			
			if($.cookie('select') == null || $.cookie('select') == '')
			{
				
			}
			else{
				var id = $.cookie('select').split(', ');
				$.each(id, function(key, val){
				
					if(val == check)
						{					
							id.splice($.inArray(val, id), 1);
						}
				});
				
				var check = id.join(', ');
				
				$.cookie('select', check, {expires: 1, path: '/'});
			}
		 
		}
		
		var contact_id = $.cookie('select').split(', ');
		contact_id = $.unique(contact_id)	
		check = contact_id.join(', ');
				
		$.cookie('select', check, {expires: 1, path: '/'});
	}
	
	checked_checkbox()
	{

		if($.cookie('select') != null)
		{
			var contacts_id = $.cookie('select').split(', ');
	
			$.each(contacts_id, function(key, value){
				
				$("input:checkbox[data='" + value + "']").prop("checked", true);
				
			});
		}
	}
	
}

var main = new Main();

