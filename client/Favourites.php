<h1>Favourites</h1>

<div class="container mt-5">
    <div class="row" style="display: flex; justify-content: center;">

    </div>
<div>

<script>

getData('showFavourite.php', showFavourites);

function showFavourites(data){
    console.log(data);

}

document.querySelector('.row').innerHTML = `

`;

</script>