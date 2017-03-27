<style>
.datagrid-header-row, .datagrid-row {
    height: auto !important;
}
</style>
<script>
</script>

<div class="main-content">
	<header>		
		<h2>
			Product
		</h2>
	</header>
	<section class="container_6 clearfix">
		<div class="grid_6">
			<div style="padding:5px 0;">
				<a id="btn_new" onclick="on_new()" href="javascript:;" class="easyui-linkbutton" data-options="iconCls:'icon-add'" style="width:80px">New</a>

				<a id="btn_edit" onclick="on_edit()" href="javascript:;" class="easyui-linkbutton" data-options="iconCls:'icon-edit'" style="width:80px">Edit</a>

				<a id="btn_delete" onclick="on_delete()" href="javascript:;" class="easyui-linkbutton" data-options="iconCls:'icon-remove'" style="width:80px">Delete</a>

				<div style="float: right">
					<!--<input class="easyui-datebox" id="dt_from" name="dt_from" style="width: 100px" data-options="formatter:myformatter,parser:myparser"></input> To
					<input class="easyui-datebox" id="dt_to" name="dt_to" style="width: 100px" data-options="formatter:myformatter,parser:myparser"></input>-->
					<input placeholder="Search" type="text" id="search_keyword" value="" style="width: 150px" class="fm_field" />
					<a id="btn_search" onclick="on_search()" href="javascript:;" class="easyui-linkbutton" data-options="iconCls:'icon-search'" style="width:40px;"></a>
				</div>
			</div>
			
			<table id="tt" style="width:760px;height:400px"></table>
			<div id="dlg" class="easyui-dialog" title="Basic Dialog" data-options="iconCls:'icon-save', closed:'true' " buttons="#dlg-buttons" modal="true" style="width:450px;height:280px;padding:10px">
			
				<form id="ff" method="post">
			
					<input type="hidden" name="mode" id="mode" class="fm_field"/>
					<table class="form_mode" style="width: 100%">
						<tr>
							<td>Kode Produk</td>
							<td><input class="fm_field" type="text" id="id" name="id" style="width: 100px"></input></td>
						</tr>
						<tr>
							<td>Nama Produk</td>
							<td><input class="fm_field" type="text" id="name" name="name" style="width: 100px"></input></td>
						</tr>	
						<tr>
							<td>Ukuran Produk</td>
							<td><input class="fm_field" type="text" id="size" name="size" style="width: 100px"></input></td>
						</tr>		
						<tr>
							<td>Keterangan Produk</td>
							<td><input class="fm_field" type="text" id="keterangan" name="keterangan" style="width: 100px"></input></td>
						</tr>												
						
					</table>
				</form>				
			</div>
			<div id="dlg-buttons">
				<a href="javascript:;" onclick="on_save()" id="btn_save" class="easyui-linkbutton" style="width: 80px">Save</a>
				<a href="javascript:;" onclick="on_cancel()" id="btn_cancel" class="easyui-linkbutton" style="width: 80px">Cancel</a>
			</div>
		</div>                            
	</section>
</div>