alert('я хуесос');

function showEditForm(id){
    current_id = id;


    var this_id = current_id.replace(/\D/g, ""); //112

    
    var edit_button = document.getElementById(id);

    edit_button.style.display = 'none';

   var comment_body_id = edit_button.parentElement.parentElement.parentElement.id;

   var comment_body = document.getElementById(comment_body_id);

   comment_body.classList.add('d-none');
document.getElementById('appendhere-' + this_id).innerHTML = 'huipisda';


    // <a href="{{ route('comments.update', $comment->id) }}" class="btn btn-primary me-3 mb-1">Edit</a>
}
