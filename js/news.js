function renderTable(newsList){
    let tBody = newsList.reduce(function(total, val){
        return total + `<tr>
    <td>${val.id}</td>
    <td>${val.title}</td>
    <td style="display: flex">
        <form class="del">
            <input type="hidden" name="id" value="${val.id}">
            <input type="submit" value="delete">
        </form>
        <form class="edit-btn">
            <input type="hidden" name="id" value="${val.id}">
            <input type="submit" value="edit">
        </form>
    </td>
</tr>`;
    }, '');
    document.querySelector('#all tbody').innerHTML = tBody;
    let delForms = document.querySelectorAll('#all .del');
    for(form of delForms){
        form.onsubmit = function(event){
            let data = new FormData(this);
            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function(){
                if(this.readyState === 4){
                    if(this.status === 200){//TODO check status
                        fillTable();
                    }else{
                        alert('Some problems at server');
                    }
                }
            };
            xhr.open('POST', '/news/delete');
            xhr.send(data);
            event.preventDefault();
        };
    }
    let editForm = document.querySelectorAll('.edit-btn');
    editForm.forEach(form => {
        form.addEventListener('submit', (e) => {
            let editForm = document.querySelector('#edit');
            let editTitle = editForm.querySelector('#title');
            let editText = editForm.querySelector('#text');
            let editId = editForm.querySelector('[name=id]');

            let idx = e.target.querySelector('form>[name=id]').value;
            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function(){
                if(this.readyState === 4){
                    if(this.status === 200){
                        let newsList = JSON.parse(this.response);
                        let news = newsList.find(news => news.id === idx);

                        editTitle.value = news.title;
                        editText.value = news.text;
                        editId.value = news.id;
                        editForm.style.display = 'block';
                    }else{
                        console.error('Some problems at server');
                    }
                }
            };
            xhr.open('GET', '/news/all');
            xhr.send();




            e.preventDefault();
        })
    })
}

function fillTable(){
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(this.readyState === 4){
            if(this.status === 200){
                let newsList = JSON.parse(this.response);
                renderTable(newsList);
            }else{
                console.error('Some problems at server');
            }
        }
    };
    xhr.open('GET', '/news/all');
    xhr.send();
}

fillTable();

document.getElementById('add').onclick = function(){
    document.getElementById('create').style.display = 'initial';
};
document.forms.create.onsubmit = function(event){
    let data = new FormData(this);
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(this.readyState === 4){
            if(this.status === 201){
                alert('News created');
                fillTable();
            }else{
                alert('Some problems at server');
            }
        }
    };
    xhr.open('POST', '/news/store');
    xhr.send(data);
    this.reset();
    this.parentElement.style.display = 'none';
    event.preventDefault();
};

// document.querySelector('#edit-form').addEventListener('submit', e => {
//     let data = new FormData(this);
//
//     let xhr = new XMLHttpRequest();
//     xhr.onreadystatechange = function() {
//         if(this.readyState === 4){
//             if(this.status === 200){
//                 alert('News created');
//                 fillTable();
//             }else{
//                 alert('Some problems at server');
//             }
//         }
//     }
//     xhr.open('POST', '/news/store');
//     xhr.send(data);
//     e.target.parentElement.style.display = 'none';
//     e.preventDefault();
// })

document.querySelector('#edit-form').onsubmit = function(event){
    let data = new FormData(this);
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(this.readyState === 4){
            if(this.status === 200){
                alert('News created');
                fillTable();
            }else{
                alert('Some problems at server');
            }
        }
    };
    xhr.open('POST', '/news/update');
    xhr.send(data);
    this.reset();
    this.parentElement.style.display = 'none';
    event.preventDefault();
};
