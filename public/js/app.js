function newPost() {
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
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
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
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
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
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

function editProfile() {
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
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


