$("#btnWikipedia").click(function() 
	{
		if($("#searchWiki").val() == "")
			{
				$("#searchWiki").val("Digite sua busca");
			}
		else
			{
				wordSend = $("#searchWiki").val();
				//url of PHP API
				var urlJsonWiki = 'apiwiki.php?wordSend='+wordSend;
				$.ajax({
					type: 'GET',
					url: urlJsonWiki,
					dataType: "xml",
					success: function(result){
						$(result).find('api').each(function () {
							//clean the elements
							$(".responseWiki").empty();
							$(".titleWiki").empty();
							//print the title of result
							$(".titleWiki").replaceWith('<div class="titleWiki">'+wordSend+'</div>');
							//print the result
							$(".responseWiki").replaceWith('<div class="responseWiki">'+$(this).find('extract').text()+'</div> ');
							//if search is empty, the result is the following warning
							if($(this).find('extract').text() == "")
								{
									$(".responseWiki").replaceWith('<div class="responseWiki">Nada encontrado com a busca acima, tente novamente.</div> ');
								}
		      			});
		    		}
				});
	    	}
});
