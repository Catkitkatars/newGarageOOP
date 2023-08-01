function send_request(id, like_dislike) {
    const url = '../requests/dis_likes_updater.php';
    
    const data = new FormData();
    data.append('id', id);
    data.append('like_dislike', like_dislike);

    
    const request_options = {
      method: 'POST',
      body: data
    };
    
    return fetch(url, request_options)
    .then(response => {
      if (response.ok) {
        return response.json();
      } else {
        throw new Error('Error:' + response.status);
      }
    })
    .catch(error => {
      console.error(error);
    });
}
  

document.addEventListener('click',function(event){
    
    
    if (event.target.closest('.likes')) {
        let check = false;
        let elem = event.target.closest('.likes');
        let childElemLike = elem.querySelector('.like_dislike');
        let childElemActive = elem.querySelector('.like_dislike_active');
        

        let parentElement = elem.parentElement;
        let likes_counter = parentElement.querySelector('.likes_counter');
        let another_elem_active = parentElement.querySelector('.like_dislike_active');
        

        if(another_elem_active && another_elem_active != childElemActive) {
            another_elem_active.classList.remove('like_dislike_active');
            another_elem_active.classList.add('like_dislike');
            send_request(another_elem_active.dataset.id, -1)
            .then(() => {
                if(!check) {
                    likes_counter.innerText = parseInt(likes_counter.innerText) + 1;
                    check = true; 
                }
              })
              .catch(error => {
                console.error(error);
              });
        }
    
        if (childElemLike) {
            childElemLike.classList.remove('like_dislike');
            childElemLike.classList.add('like_dislike_active');
            send_request(childElemLike.dataset.id, 1)
            .then(() => {
                if(!check) {
                    likes_counter.innerText = parseInt(likes_counter.innerText) + 1;
                    check = true;
                } 
              })
              .catch(error => {
                console.error(error);
              });
        }
    
        if (childElemActive) {
            childElemActive.classList.remove('like_dislike_active');
            childElemActive.classList.add('like_dislike');
            send_request(childElemActive.dataset.id, 1)
            .then(() => {
                if(!check) {
                    likes_counter.innerText = parseInt(likes_counter.innerText) - 1;
                    check = true; 
                }
              })
              .catch(error => {
                console.error(error);
              });
        }
    }
    if(event.target.closest('.dislikes')) {
        let check = false;
        let elem = event.target.closest('.dislikes');
        let childElemLike = elem.querySelector('.like_dislike');
        let childElemActive = elem.querySelector('.like_dislike_active');

        let parentElement = elem.parentElement;
        let likes_counter = parentElement.querySelector('.likes_counter');
        let another_elem_active = parentElement.querySelector('.like_dislike_active');

        if(another_elem_active && another_elem_active != childElemActive) {
            another_elem_active.classList.remove('like_dislike_active');
            another_elem_active.classList.add('like_dislike');
            send_request(another_elem_active.dataset.id, 1)
            .then(() => {
                if(!check) {
                    likes_counter.innerText = parseInt(likes_counter.innerText) - 1;
                    check = true;
                }
              })
              .catch(error => {
                console.error(error);
              });
            
        }
    
        if (childElemLike) {
            childElemLike.classList.remove('like_dislike');
            childElemLike.classList.add('like_dislike_active');
            send_request(childElemLike.dataset.id, -1)
            .then(() => {
                if(!check) {
                    if(parseInt(likes_counter.innerText) > 0) {
                        likes_counter.innerText = parseInt(likes_counter.innerText) - 1;
                        check = true;
                    }
                }
              })
              .catch(error => {
                console.error(error);
              });
        }
    
        if (childElemActive) {
            childElemActive.classList.remove('like_dislike_active');
            childElemActive.classList.add('like_dislike');
            send_request(childElemActive.dataset.id, -1)
            .then(() => {
                if(!check) {
                    if(parseInt(likes_counter.innerText) > 0) {
                        likes_counter.innerText = parseInt(likes_counter.innerText) + 1;
                        check = true;
                    }
                }
              })
              .catch(error => {
                console.error(error);
              });
        }
    }
})


