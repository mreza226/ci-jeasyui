$(document).ready(
	function() 
	{
		$('#message_box').hide();
		
		$('#tt').datagrid({
			pagination: true,
			url: SITE_URL + 'product/get',
			pageSize: '50',
			pageList: [50, 100, 150, 200],
			columns: 
			[[
				{ field:'ck', checkbox:true }
				, { field: 'id', hidden: false, sortable: true, title: 'Kode Product' }
				, { field: 'name', hidden: false, sortable: true, title: 'Nama Product' }
				, { field: 'size', hidden: false, sortable: true, title: 'Ukuran Product'}
				, { field: 'keterangan', hidden: false, sortable: true, title: 'Keterangan Product' }
			]]			
		});		
	}
);


function on_search()
{
	$('#tt').datagrid('load', {
        search_keyword: $('#search_keyword').val()
	});
}

function clear_form()
{

	$('.fm_field').val('');	
}

function on_cancel(){
	// if (approve == 'administrator'){
	// 	clear_form();
	// }else{
	// 	$('.fm_field').val('');
	// 	$('#ot_dt').datebox('setValue', '');
	// 	$('#ot_hour').numberbox('setValue', '');
	// }
	
	$('#dlg').dialog('close');
	$('#tt').datagrid('reload');
}

function on_new()
{
	clear_form();
	$('#dlg').dialog('open').dialog('setTitle', 'New Product');
	$('#message_box').hide();
	$('#tb').tabs('select', 0);
	$('#mode').val('insert');
}

function on_save()
{
	$('#id').prop('disabled', false);
	
	var id = $('#id').val();
	var name = $('#name').val();
	var size = $('#size').val();
	var keterangan = $('#keterangan').val();
	
	if(id != ""){
		if(name != ""){
			if(size != ""){
				if(keterangan != ""){
					$('#ff').form('submit', {
						url: SITE_URL + 'product/on_save',        
						onSubmit: function(param) {
							return $(this).form('validate');
						},
						success: function(result) {
							if (result == '1')
							{
								$('#tt').datagrid('reload');
							}
							else
							{
								$.messager.alert('Danger', result, 'danger');
								
							}
							$('#dlg').dialog('close');
						}
					});
				}else{
					$.messager.alert('Warning', 'Satuan belum dipilih', 'warning');
				}
			}else{
				$.messager.alert('Warning', 'Group Product belum dipilih', 'warning');
			}
		}else {
			$.messager.alert('Warning', 'Nama Product tidak boleh kosong', 'warning');
		}
	}else {
		$.messager.alert('Warning', 'Kode Product tidak boleh kosong', 'warning');
	}
}

function on_edit()
{
	$('#mode').val('update');
	$('#id').prop('disabled', true);
	$('#message_box').hide();
	var row = $('#tt').datagrid('getSelected');
	if (row)
	{
		clear_form();
		$('#ff').form('load', row);
		$('#dlg').dialog('open').dialog('setTitle', 'Edit Product');
		$('#tb').tabs('select', 0);	
	}
	else
	{
		show_alert('error', 'Error', 'Please select data to Edit')
	}
}

function on_delete()
{
	var ids = [];
    var rows = $('#tt').datagrid('getSelections');    
    if (rows.length > 0) 
	{
        for (var i = 0; i < rows.length; i++) 
			ids.push(rows[i].id);
		
		$.messager.confirm('Confirm', 'Are you sure you want to remove selected data?', function(r) {
			if (r) {

				// show progress
				$.messager.progress({
					title: 'Delete Employee',
					msg: 'Processing, Please Wait...'
				});
			
				$.ajax({
					type: 'POST',
					url: SITE_URL + 'product/on_delete',
					data: {
						ids: ids.join(':')
					},
					dataType: 'json',
					success: function(res) 
					{
						$.messager.progress('close');
						if (res == '1')
						{
							$('#tt').datagrid('reload');
						}
						else
						{
							show_alert('error', 'Error', res);
						}						
					}
				});
			}
		});
	}
	else
	{
		show_alert('error', 'Error', 'Please select data to Delete')    
	}
}