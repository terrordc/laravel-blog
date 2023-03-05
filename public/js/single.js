function showEditForm(id){
    current_id = id;


    var this_id = current_id.replace(/\D/g, ""); //112

    


//    var comment_body_id = edit_button.parentElement.parentElement.parentElement.id;

//    var comment_body = document.getElementById(comment_body_id);

document.getElementById('comment-body-' + this_id).classList.add('d-none');
document.getElementById('appendhere-' + this_id).classList.remove('d-none');

// document.getElementById('appendhere-' + this_id).innerHTML = form;

 }

 function hideEditForm(id){
    current_id = id;


    var this_id = current_id.replace(/\D/g, ""); //112

    document.getElementById('appendhere-' + this_id).classList.add('d-none');
document.getElementById('comment-body-' + this_id).classList.remove('d-none');


 }
