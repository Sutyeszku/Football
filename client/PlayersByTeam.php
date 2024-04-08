<h1 id="cim">Players</h1>

<div class="container mt-5">
		<div class="row playerCards" style="display: flex; justify-content: center;">
      <h1 class="text-center">Goalkeepers</h1>
      <div class="row goalkeepers" style="display: flex; justify-content: center;">
        
      </div>
      <h1 class="text-center">Defenders</h1>
      <div class="row defenders" style="display: flex; justify-content: center;">

      </div>
      <h1 class="text-center">Midfielders</h1>
      <div class="row midfielders" style="display: flex; justify-content: center;">

      </div>
      <h1 class="text-center">Attackers</h1>
      <div class="row attackers" style="display: flex; justify-content: center;">

      </div>		
	  </div>
</div>

<script src="apiKey.js"></script>
<script>

const urlParams = new URLSearchParams(window.location.search);
const teamId = urlParams.get( "team" );
const url = 'https://api-football-v1.p.rapidapi.com/v3/players/squads?team=' + teamId;
const options = {
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': apiKey,
		'X-RapidAPI-Host': 'api-football-v1.p.rapidapi.com'
	}
};

///////////////////////////////////////////////////////////
fetch(url, options)
  .then(response => {
    if (!response.ok) {
      throw new Error(`HTTP error: ${response.status}`);
    }
    return response.json();
  })
  .then(data => {

    if (data.response && Array.isArray(data.response)) {
        
      console.log('Response:', data.response);
      
      data.response.forEach(arr => {
        console.log(arr);
        console.log(arr.players)
        arr.players.forEach(player =>{
          if(player.photo){
            
            if(player.position == 'Goalkeeper'){
              document.querySelector('.goalkeepers').innerHTML += `
            <div class="mb-4 col-lg-3 col-md-4 col-sm-6" onclick="playerHop(this)" id="${player.id}" style="cursor: pointer;" >
				        <img src="${player.photo}" class="card-img-top jatekosKartya" alt="${player.name}">
				      <div class="card-body text-center">
				  	    <h5 class="card-title">${player.name}</h5>
				       </div>
			       </div>
            `;
            }

            if(player.position == 'Defender'){
              document.querySelector('.defenders').innerHTML += `
            <div class="mb-4 col-lg-3 col-md-4 col-sm-6" onclick="playerHop(this)" id="${player.id}" style="cursor: pointer;" >
				        <img src="${player.photo}" class="card-img-top jatekosKartya" alt="${player.name}">
				      <div class="card-body text-center">
				  	    <h5 class="card-title">${player.name}</h5>
				       </div>
			       </div>
            `;
            }

            if(player.position == 'Midfielder'){
              document.querySelector('.midfielders').innerHTML += `
            <div class="mb-4 col-lg-3 col-md-4 col-sm-6" onclick="playerHop(this)" id="${player.id}" style="cursor: pointer;" >
				        <img src="${player.photo}" class="card-img-top jatekosKartya" alt="${player.name}">
				      <div class="card-body text-center">
				  	    <h5 class="card-title">${player.name}</h5>
				       </div>
			       </div>
            `;
            }

            if(player.position == 'Attacker'){
              document.querySelector('.attackers').innerHTML += `
            <div class="mb-4 col-lg-3 col-md-4 col-sm-6" onclick="playerHop(this)" id="${player.id}" style="cursor: pointer;" >
				        <img src="${player.photo}" class="card-img-top jatekosKartya" alt="${player.name}">
				      <div class="card-body text-center">
				  	    <h5 class="card-title">${player.name}</h5>
				       </div>
			       </div>
            `;
            }

          }

        });
      });
    } else {
      throw new Error('Invalid response format');
    }
  })
  .catch(error => {
    console.error('Error:', error);
  });

  
  function playerHop(event){
    console.log(event.id);
    window.location.href = 'index.php?prog=PlayersStats.php&player=' + event.id;
}


</script>