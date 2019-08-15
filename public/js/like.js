/**
 *
 * @param e
 * @constructor
 */
function Like(e)
{
    let request = new XMLHttpRequest();
    const HTTP_REQUEST_READY_STATE = 4;
    const HTTP_REQUEST_STATUS_OK = 200;
    const HTTP_REQUEST_STATUS_UN_AUTH = 401;
    const HTTP_REQUEST_STATUS_UN_VERIFY = 402;
    let params = {book_id: e.getAttribute('data-id')};

    request.open('POST', '/like');
    request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute("content"));
    request.send(JSON.stringify(params));

    request.onreadystatechange = function () {
        if (request.readyState === HTTP_REQUEST_READY_STATE) {
            switch (request.status) {
                case HTTP_REQUEST_STATUS_OK:
                    let like = +e.innerHTML.substring(10, 9);
                    if (!e.classList.contains('red')) {
                        e.classList.add('red');
                        e.innerHTML = 'Нравится ' + ++like;
                    } else {
                        e.classList.remove('red');
                        e.innerHTML = 'Нравится ' + --like;
                    };
                    break;
                case HTTP_REQUEST_STATUS_UN_AUTH:
                    alert("Пожалуйста авторизуйтесь");
                    break;
                case HTTP_REQUEST_STATUS_UN_VERIFY:
                    alert("Подтвердите свой аккаунт")
            }
        }
    };
}

/**
 *
 * @param e
 */
function addLike(e) {
        Like(e);
}
