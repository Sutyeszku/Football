<h1 id="cim">Players from </h1>

<div class="container mt-5">
    
		<div class="row" style="display: flex; justify-content: center;">
			
        
			
	    </div>
</div>

<script>

const urlParams = new URLSearchParams(window.location.search)
const team = urlParams.get( "team" );
const url = 'https://api-football-v1.p.rapidapi.com/v3/teams?country=' + country;
const options = {
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': 'b0479446b6msh4101f3928608178p17f7d9jsn9ca55f30f53c',
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
      
      const container = document.querySelector('.row');   
      console.log('Response:', data.response);

      data.response.slice(0, 40).forEach(team => {
        console.log(team);
        if (team.team.logo) {
            container.innerHTML += `
			  <div class="mb-4 col-lg-3 col-md-4 col-sm-6" onclick="playerHop(this)" id="${team.team.name}" style="cursor: pointer;" >
				  <img src="${team.team.logo}" class="card-img-top" alt="${team.team.code}">
				  <div class="card-body text-center">
				  	<h5 class="card-title">${team.team.name}</h5>
				  </div>
			  </div>
		    `;
        }
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
    window.location.href = 'index.php?prog=Players.php&team=' + event.id;
}

</script>