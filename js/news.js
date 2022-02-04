function renderTable(newsList){
    let tBody = newsList.reduce(function(total, val){
        return total + `<tr>
    <td>${val.id}</td>
    <td>${val.title}</td>
    <td>
        <form class="del">
            <input type="hidden" name="id" value="${val.id}">
            <input type="submit" value="delete">
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


