function setData(data) {
    var target_input = $('#' + localStorage.getItem('target_input'));
    target_input.val(data);
}

function HandlePopupResult(result) {
    tinymce.activeEditor.execCommand('mceInsertContent', false, result);
    //tinymce.get('work_description').getBody().innerHTML += result;
}