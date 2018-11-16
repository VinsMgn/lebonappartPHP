var cpInput = document.getElementById('cpInput');
var cp;
if(cpInput !== undefined){
    cpInput.oninput = function (e) {
        if(e.target.value.length === 5){
            cp = e.target.value;
            getData();
    
    
            var quartInput = document.getElementById('quartInput');
            quartInput.className = 'quartInput-pinned';
        }
    
    };
}

function getData(){

    fetch('/controller/jsData.php?quartiers=')
        .then(res => res.json())
        .then(quartier =>{
            var quartSelect = document.getElementById('quartSelect');
            quartSelect.innerHTML='';
            for(var quart of quartier){
                    if(quart.fk_ville_quartier == cp){

                        var innerOption = document.createElement('option');
                        innerOption.value = quart.nomQuartier;
                        innerOption.textContent = quart.nomQuartier;
                        quartSelect.appendChild(innerOption);
                    }
            }
        })


}
