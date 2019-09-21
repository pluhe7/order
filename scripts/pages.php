$(document).ready(function() {
	var pageContent;
	function getContent(data){
		pageContent = $.parseJSON(data);
		$('#order-container').empty();
		for (var i = 0; i < 10; i++){
			if (!pageContent[i]) break;
			$('#order-container').append(
				'<tr className="order-block"> <td><h4 className="order-id">Order ID: ' + pageContent[i].order_id + '</h4></td> <td><p className="order-price">Order price: ' + pageContent[i].summ + '</p></td> </tr>')
		}
	}
	function changePage(page){
		pageContent = $.post('/scripts/page_content.php', {page: page, pageContent: pageContent}, getContent);
		
	}
	function totalPages(){
		var total = <?php 
			include $_SERVER['DOCUMENT_ROOT'].'/scripts/total_orders.php';
			echo $total ?>;
		for (var i = 1; i <= ((total / 10) + 1); i++){
			$('#page-nav').append('<a id="page-' + i + '" class="page" href="">' + i + '</a>');
		}
	}
	totalPages();
	changePage(0);
	$(".page").click(function(event) {
		event.preventDefault();
		var curPage =$(this).attr('id').split('-')[1] - 1;
		changePage(curPage);
	}); 
});