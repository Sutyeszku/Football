<div class="container mt-5">
		<div class="row" style="display: flex; justify-content: center;">
			
        
			
	    </div>
</div>

<script src="apiKey.js"></script>
<script>

const urlParams = new URLSearchParams(window.location.search);
const playerId = urlParams.get( "player" );
const url = 'https://api-football-v1.p.rapidapi.com/v2/players/player/' + playerId;
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
      /*
      data.response.forEach(arr => {
        console.log(arr);
        console.log(arr.players)
        arr.players.forEach(player =>{
          if(player.photo){
            document.querySelector('.row').innerHTML += `
            <div class="mb-4 col-lg-3 col-md-4 col-sm-6" onclick="playerHop(this)" id="${player.id}" style="cursor: pointer;" >
				        <img src="${player.photo}" class="card-img-top" alt="${player.name}">
				      <div class="card-body text-center">
				  	    <h5 class="card-title">${player.name}</h5>
				       </div>
			       </div>
            `;
          }

        });
      });*/
    } else {
      throw new Error('Invalid response format');
    }
  })
  .catch(error => {
    console.error(error);
  });

</script>