<h1>Favourites</h1>

<div class="container mt-5">
    <div class="row text-center" style="display: flex; justify-content: center;">
        
    </div>
<div>

<script>

getData('showFavourite.php', showFavourites);

function showFavourites(data){
    document.querySelector('.row').innerHTML = ``;
    console.log(data);
    if(data[0].player_id){
    data.forEach(player => {
        console.log(player);
    document.querySelector('.row').innerHTML += `
    <div class="mb-4 col-lg-3 col-md-4 col-sm-6 text-center" style="cursor: pointer;" >
        <img src="${player.kep}" class="card-img-top jatekosKartya" onclick="playerHop(this, '${player.kep}')" id="${player.player_id}" alt="${player.player_name}">
        <div class="card-body text-center">
            <h5 class="card-title">${player.player_name}</h5>
            <button onclick="unFavourite('${player.player_id}')" style="border-radius: 20px; background-color: red; color: black; width: 30px; height: 30px;">X</button>
        </div>
    </div>
`;
});
}else{
    document.querySelector('.row').innerHTML = `
        <h1>Még nincsenek kedvenceid.</h1>
    `;
}
}

function playerHop(event, kep) {
    console.log(event.id);
    console.log(kep);
    window.location.href = 'index.php?prog=PlayersStats.php&player=' + event.id + "&photo=" + kep;

}

function unFavourite(id){
    getData('unFavourite.php?player_id=' + id, renderDelResult);
}

function renderDelResult(data){
    console.log(data);
    getData('showFavourite.php', showFavourites);
}

</script>