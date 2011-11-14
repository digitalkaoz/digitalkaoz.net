var addWysiwyg = function()
{
	var config = {
		toolbar:
		[
			['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink'],
            ['Source']
		]
	};

	// Initialize the editor.
	// Callback function can be passed and executed after full instance creation.
	$('textarea').ckeditor(config);
}

$(document).ready(function(){
    if(typeof ckeditor != undefined)
    {
        addWysiwyg();
    }
});
