function obtener(moneda){
    fetch('http://localhost/apirest-dinamica/backend/'+moneda)
    .then(datos=>datos.json())
    .then(datos=>{
        console.log(datos);
        var resultado = document.getElementById('resultado');
        resultado.innerHTML = '';
        for(let dato of datos){
            resultado.innerHTML += `
            <li>ID: ${dato.id} - Valor: ${dato.valor}</li>
            `;
        }
    })
}