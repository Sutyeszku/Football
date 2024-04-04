<h1>Leagues</h1>

<table id="leaguesTable" class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Logo</th>
    </tr>
  </thead>
  <tbody id="leaguesTableBody"></tbody>
</table>

<script src="apiKey.js"></script>

<script>
const url = 'https://api-football-v1.p.rapidapi.com/v3/leagues';
const options = {
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': apiKey,
		'X-RapidAPI-Host': 'api-football-v1.p.rapidapi.com'
	}
};

fetch(url, options)
  .then(response => {
    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }
    return response.json();
  })
  .then(data => {

    if (data.response && Array.isArray(data.response)) {
      const leaguesTableBody = document.getElementById("leaguesTableBody");
      // Filter the first 100 leagues

      console.log('Response:', data.response);

      data.response.slice(0, 50).forEach(competition => {
        

        if (competition.league) {
          console.log(competition.league);
            
            const leagueRow = document.createElement("tr");
            leagueRow.innerHTML = `
              <td>${competition.league.id}</td>
              <td>${competition.league.name}</td>
              <td><img class="img-fluid" src="${competition.league.logo}" width="50"></td>
            `;
            leaguesTableBody.appendChild(leagueRow);
          
        }
      });
    } else {
      throw new Error('Invalid response format');
    }
  })
  .catch(error => {
    console.error('Error:', error);
  });
</script>