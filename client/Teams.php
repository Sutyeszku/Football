<h1 d="cim">Teams from </h1>

<div class="container mt-5">
		<div class="row" style="display: flex; justify-content: center;">
			
        
			
	    </div>
</div>

<script src="apiKey.js"></script>
<script>

let teams = [];
let page = 1;
let pageSize = 8;
let totalPages = 1;

const urlParams = new URLSearchParams(window.location.search)
const country = urlParams.get( "country" );
const url = 'https://api-football-v1.p.rapidapi.com/v3/teams?country=' + country;
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
      throw new Error(`HTTP error: ${response.status}`);
    }
    return response.json();
  })
  .then(data => {
    teams = data.response;
    console.log(teams);
    showTeams();
  })
  .catch(error => {
    console.error('Error:', error);
  });

  function showTeams() {
    let startIndex = (page - 1) * pageSize;
    let endIndex = startIndex + pageSize;
    let teamstoShow = teams.slice(startIndex, endIndex);
    console.log(teamstoShow);

    document.querySelector('.row').innerHTML = "";

    teamstoShow.forEach((team) => {
      console.log(team);
      
      document.querySelector('.row').innerHTML += `
          <div class="mb-4 col-lg-3 col-md-4 col-sm-6" onclick="playerHop(this)" id="${team.team.id}" style="cursor: pointer;" >
            <img src="${team.team.logo}" class="card-img-top" alt="${team.team.code}">
            <div class="card-body text-center">
              <h5 class="card-title">${team.team.name}</h5>
            </div>
          </div>
          `;
          
    });

    renderPagination(teams.length);
  };

  function renderPagination(totalItems) {
  let elements = document.getElementsByClassName('buttonHolder');
  console.log(elements.length);
  if(elements.length > 0){
    for(let i = 0; i < elements.length; i++){
        elements[i].remove();
    }
  }
  totalPages = Math.ceil(totalItems / pageSize);

  let pageBtn = document.createElement('div');
  pageBtn.classList.add('row');
  pageBtn.classList.add('justify-content-center');
  pageBtn.classList.add('buttonHolder');

  for (let i = 1; i <= totalPages; i++) {
    let button = document.createElement("button");
    button.textContent = i;
    button.classList.add("page-btn");
    button.addEventListener('click', handlePaginationClick);
    if (i === page) {
      button.classList.add("page-active");
    }
    pageBtn.appendChild(button);
    document.querySelector('.container').appendChild(pageBtn);
  }
}

function handlePaginationClick(event) {
      console.log("gomb érték: " + event.target.textContent);
      page = +event.target.textContent;
      showTeams();
    
}

  function playerHop(event){
    console.log(event.id);
    window.location.href = 'index.php?prog=PlayersByTeam.php&team=' + event.id;
}


/*
if (data.response && Array.isArray(data.response)) {
        
        console.log('Response:', data.response);
  
        data.response.slice(0, 40).forEach(team => {
          console.log(team);
          if (team.team.logo) {
            document.querySelector('.row').innerHTML += `
          <div class="mb-4 col-lg-3 col-md-4 col-sm-6" onclick="playerHop(this)" id="${team.team.id}" style="cursor: pointer;" >
            <img src="${team.team.logo}" class="card-img-top" alt="${team.team.code}">
            <div class="card-body text-center">
              <h5 class="card-title">${team.team.name}</h5>
            </div>
          </div>
          `;
          }
        });
      }
      */

</script>