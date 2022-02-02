function fillTable(){
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(this.readyState === 4){
            if(this.status === 200){
                let newsList = JSON.parse(this.response);
                console.log(newsList);
                //TODO show in table
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


