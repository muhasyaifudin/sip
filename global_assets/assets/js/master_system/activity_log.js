var ActivityLog = function () {
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')

	var _componentActivityLog = function () {
		var activity_log_table

		$(document).ready(function() {
			initActivityLogTable()
		})

		var initActivityLogTable = function () {
			activity_log_table = $('#activity_log_table').DataTable({
				destroy: true,
	        	processing: true,
	        	ajax: {
	        		type: "GET",
				    url: qualifyURL("api/master_system/activity_log"),
				    data: {
				        
				    }
				},
				columns: [
		            { defaultContent: '' },
		            { data: "created_at" },
		            { data: "user_name" },
		            { data: "type" },
		            { data: "description", defaultContent: "-" },
		            { defaultContent: "" },
		            { defaultContent: '' } 
		            ], 
		        columnDefs: [
		        	{
		        		targets: 0,
		        		width: '20',
				        searchable: false,
	            		orderable: false,
	            		className: "text-center"
				       
				    },
				    {
				    	targets: -2,
				    	className: "text-center",
				    	data: "model_data",
				    	defaultContent: "-",
				    	render: function (data, type, full, meta) {
				    		var component = '-'
				    		var model_data = JSON.stringify(data)
				    		if (data != null) {
				    			var data_json = model_data.replace(/"/g, "'")

				    			component = '<a href="" title="" class="detail_data" data_log="'+data_json+'" style="color: #000000"><i class="icon-newspaper2"></i></a>'
				    		}
				    		return component
				    	}
				    },
				    {
				    	targets: -1,
				    	className: "text-center",
				    	data: "id",
				    	render : function(data, type, full, meta) {
				    		var full_json = JSON.stringify(full).replace(/"/g, "'")
				    		return '<td class="text-center"> <div class="list-icons"> <div class="dropdown"> <a href="#" class="list-icons-item" data-toggle="dropdown"> <i class="icon-menu9"></i> </a> <div class="dropdown-menu dropdown-menu-right"> <a href="/api/task/item_request/cancel/'+data+'" data_item_request="'+full_json+'" title="" class="dropdown-item item_request_cancel" ><i class="icon-search4"></i> Detail</a> </div> </div> </div> </td> </tr>'
				    	}
				    }
				]
			})
			activity_log_table.on( 'order.dt search.dt', function () {
		        activity_log_table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
		            cell.innerHTML = i+1
		        } )
		    } ).draw()
		}
		
		var initTodayLogTimeLine = function () {
			var total_page = 0
			var current_page = 1
			var base_url = '/api/history/activity_timeline'
					
			$(document).ready(function() {
				getTodayActivityLogData(base_url)		
			})	

			var getTodayActivityLogData = function (url) {
				$.ajax({
					url: url,
					type: 'GET',
					dataType: 'json',
					data: { _token: CSRF_TOKEN },
				})
				.done(function(result) {
					
					setTodayActivityLog(result.today)
				})
				.fail(function(err) {
					console.log(err)
				})
			}

			var setTodayActivityLog = function (today) {
				var component = ''
				if (today.data.length == 0) {
					component = '<div class="text-muted">Aktivitas Kosong</div>'
				}
				$.each(today.data, function(index, val) {
					// console.log(val.causer)
					component += '<div class="list-feed-item"> <div class="text-muted">'+val.created_at+'</div> <a href="#">'+val.causer.name+'</a> '+val.description+' </div>'
				})

				$('#today_activity_log').html(component)

				$('#today_page_info').text('Page '+today.current_page+' from '+today.last_page)

				var today_prev_url = today.prev_page_url ? today.prev_page_url : today.first_page_url
				var today_next_url = today.next_page_url ? today.next_page_url : today.last_page_url


				$('#today_prev').attr('href', today_prev_url)
				$('#today_next').attr('href', today_next_url)


			}

			$('#today_prev, #today_next').click(function(event) {
				event.preventDefault()
				var url = $(this).attr('href')
				getTodayActivityLogData(url)
			})
		}

		var initOldLogTimeLine = function () {
			var total_page = 0
			var current_page = 1
			var base_url = '/api/history/activity_timeline'
					
			$(document).ready(function() {
				getOldActivityLogData(base_url)							
			})	

			var getOldActivityLogData = function (url) {
				$.ajax({
					url: url,
					type: 'GET',
					dataType: 'json',
					data: { _token: CSRF_TOKEN },
				})
				.done(function(result) {
					setOldActivityLog(result.old)
				})
				.fail(function(err) {
					console.log(err)
				})
			}

			var setOldActivityLog = function (old) {
				var component = ''
				console.log(old)
				const { data } = old
				if (data.length == 0) {
					component = '<div class="text-muted">Aktivitas Kosong</div>'
				}

				$.each(old.data, function(index, val) {
					// console.log(val.causer)
					component += '<div class="list-feed-item"> <div class="text-muted">'+val.created_at+'</div> <a href="#">'+val.causer.name+'</a> '+val.description+' </div>'
				})

				$('#old_activity_log').html(component)

				$('#old_page_info').text('Page '+old.current_page+' from '+old.last_page)

				var old_prev_url = old.prev_page_url ? old.prev_page_url : old.first_page_url
				var old_next_url = old.next_page_url ? old.next_page_url : old.last_page_url


				$('#old_prev').attr('href', old_prev_url)
				$('#old_next').attr('href', old_next_url)


			}

			$('#old_prev, #old_next').click(function(event) {
				event.preventDefault()
				var url = $(this).attr('href')
				getOldActivityLogData(url)
			})
		}

		$('#activity_log_table').on('click', '.detail_data', function(event) {
			event.preventDefault()
			var data_json = JSON.parse($(this).attr('data_log').replace(/'/g, '"'))
			var str = JSON.stringify(data_json, undefined, 4)
			showModal('modal_data_log')
			$('#data_view').html(syntaxHighlight(str))

		})

	}
	var syntaxHighlight = function(json) {
	    json = json.replace(/&/g, '&amp').replace(/</g, '&lt').replace(/>/g, '&gt')
	    return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
	        var cls = 'number'
	        if (/^"/.test(match)) {
	            if (/:$/.test(match)) {
	                cls = 'key'
	            } else {
	                cls = 'string'
	            }
	        } else if (/true|false/.test(match)) {
	            cls = 'boolean'
	        } else if (/null/.test(match)) {
	            cls = 'null'
	        }
	        return '<span class="' + cls + '">' + match + '</span>'
	    })
	}
	var showModal = function (selector) {
		$('#'+selector).modal('show')
	}
	var hideModal = function (selector) {
		$('#'+selector).modal('hide')
	}

	var resetForm = function () {
		$('form')[0].reset()
		$('form').find('.select').val('').trigger('change')
	}
	var qualifyURL = function(pathOrURL) {
	   	if (!(new RegExp('^(http(s)?[:]//)','i')).test(pathOrURL)) {
	     	return $(document.body).data('base') + pathOrURL
	   	}

	   return pathOrURL
	}
	return {
		init: function () {
			_componentActivityLog()
		}
	}

}()

document.addEventListener('DOMContentLoaded', function () {
	/* body... */
	ActivityLog.init()
})