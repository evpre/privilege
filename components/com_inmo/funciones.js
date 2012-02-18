function add_file_field(){
	var container=document.getElementById('file_container');
	var file_field=document.createElement('input');
	file_field.name='images[]';
	file_field.type='file';
	container.appendChild(file_field);
	var br_field=document.createElement('br');
	container.appendChild(br_field);
	
}