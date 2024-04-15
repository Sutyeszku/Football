<div class="input-group rounded">
  <input type="search" id="searchBar" class="form-control rounded text-center" style="width: 50px; margin-bottom: 25px" placeholder="Search a Player" aria-label="Search" aria-describedby="search-addon"/>
</div>

<div class="row playerContainer text-center" style="width: 80%;">

</div>

<script>

document.getElementById('searchBar').addEventListener('change', () => {
  const name = searchBar.value;
  console.log(name);
  searchPlayer(name);
});

function searchPlayer(name) {
  const url = 'https://api-football-v1.p.rapidapi.com/v2/players/search/' + name;
const options = {
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': 'b0479446b6msh4101f3928608178p17f7d9jsn9ca55f30f53c',
		'X-RapidAPI-Host': 'api-football-v1.p.rapidapi.com'
	}
};

fetch(url, options)
    .then(response => {
      if (!response.ok) {
        throw new Error(`HTTP error: ${response.status}`);
      }
      return response.json();
    })
    .then(data => {
      console.log(data);
      console.log(data.api.results);
      if(data.api.results == 0){
        console.log("geci");
          document.querySelector('.playerContainer').innerHTML = `
            <h1 class="text-center" style="text-center">Nincs ilyen játékos!</h1>
          `;
      }else{
        data.api.players.forEach(player => {
        if(player.firstname && player.lastname){
          document.querySelector('.playerContainer').innerHTML += `
        <div class="col-lg-4 col-md-4 col-sm-6 text-center" onclick="playerHop(this)" id="${player.player_id}" style="border: 1px solid lightgray; border-radius: 25px;  cursor: pointer;" >
            <h5>${player.firstname}</h5>
            <h5>${player.lastname}</h5>
        </div>
        `;
        }
      });
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
}

function playerHop(event) {
    console.log(event.id);
    window.location.href = 'index.php?prog=PlayersStats.php&player=' + event.id;
}

</script>