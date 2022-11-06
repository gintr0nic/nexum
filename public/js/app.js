function newPost() {
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: $('#buttonPost').attr('url'),
        type: 'POST',
        dataType: 'json',
        data: $("#formNewPost").serialize(),
        statusCode: {
            200: function (response) {
                location.reload()
            },
        }
    });
}

function editPost() {
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: $('#buttonEditPost').attr('url'),
        type: 'POST',
        dataType: 'json',
        data: $("#formEditPost").serialize(),
        statusCode: {
            200: function (response) {
                location.reload()
            },
            403: function (response) {
                alert('Non sei autorizzato ad eseguire questa operazione!', 'danger')
            }
        }
    });
}

function deletePost() {
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: $('#buttonDeletePost').attr('url'),
        type: 'POST',
        statusCode: {
            200: function (response) {
                location.reload()
            },
            403: function (response) {
                alert('Non sei autorizzato ad eseguire questa operazione!', 'danger')
            }
        }
    });
}

function staffDeletePost() {
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: $('#buttonStaffDeletePost').attr('url'),
        type: 'POST',
        data: {
            reason: $("#message-text").val(),
        },
        statusCode: {
            200: function (response) {
                location.reload()
            },
            403: function (response) {
                alert('Non sei autorizzato ad eseguire questa operazione!', 'danger')
            }
        }
    });
}

function deleteBlog() {
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: $('#buttonDeleteBlog').attr('url'),
        type: 'POST',
        statusCode: {
            200: function (response) {
                location.replace($('#buttonDeleteBlog').attr('dest'))
            },
            403: function (response) {
                alert('Non sei autorizzato ad eseguire questa operazione!', 'danger')
            }
        }
    });
}

function editProfile() {
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: $('#buttonEdit').attr('url'),
        type: 'POST',
        dataType: 'json',
        data: $("#formEdit").serialize(),
        statusCode: {
            200: function (response) {
                alert('Profilo modificato con successo!', 'success')
            },
            403: function (response) {
                alert('Non sei autorizzato ad eseguire questa operazione!', 'danger')
            }
        }
    });
}

function sendFriendRequest(user) {
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: $('#buttonSendFriendRequest').attr('url'),
        type: 'POST',
        dataType: 'json',
        data: { to: user },
        statusCode: {
            200: function (response) {
                //alert('Richiesta inviata!', 'success')
                $('#buttonSendFriendRequest').html('Richiesta inviata');
            },
            403: function (response) {
                alert('Non sei autorizzato ad eseguire questa operazione!', 'danger')
            }
        }
    });
}

function acceptRequest(id) {
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: $('#buttonAcceptRequest').attr('url'),
        type: 'POST',
        dataType: 'json',
        data: { id: id },
        statusCode: {
            200: function (response) {
                //alert('Richiesta inviata!', 'success')
                location.reload()
            },
            403: function (response) {
                alert('Non sei autorizzato ad eseguire questa operazione!', 'danger')
            }
        }
    });
}

function refuseRequest(id) {
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: $('#buttonRefuseRequest').attr('url'),
        type: 'POST',
        dataType: 'json',
        data: { id: id },
        statusCode: {
            200: function (response) {
                //alert('Richiesta inviata!', 'success')
                location.reload()
            },
            403: function (response) {
                alert('Non sei autorizzato ad eseguire questa operazione!', 'danger')
            }
        }
    });
}

function removeFriend(username) {
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: $('#buttonRemoveFriend').attr('url'),
        type: 'POST',
        dataType: 'json',
        data: { username: username },
        statusCode: {
            200: function (response) {
                //alert('Richiesta inviata!', 'success')
                location.reload()
            },
            403: function (response) {
                alert('Non sei autorizzato ad eseguire questa operazione!', 'danger')
            }
        }
    });
}

function removeStaff(username) {
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: $('#buttonRemoveStaff').attr('url'),
        type: 'POST',
        dataType: 'json',
        data: { username: username },
        statusCode: {
            200: function (response) {
                //alert('Richiesta inviata!', 'success')
                location.reload()
            },
            403: function (response) {
                alert('Non sei autorizzato ad eseguire questa operazione!', 'danger')
            }
        }
    });
}

const alertPlaceholder = document.getElementById('alertPlaceholder')

const alert = (message, type) => {
    const wrapper = document.createElement('div')
    wrapper.innerHTML = [
        `<div class="alert alert-${type} alert-dismissible" role="alert">`,
        `   <div>${message}</div>`,
        '   <button type="button" class="btn-close" data-bs-dismiss="alert"></button>',
        '</div>'
    ].join('')

    alertPlaceholder.append(wrapper)
}


