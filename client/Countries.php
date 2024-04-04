<h1 id="cim">Countries</h1>

<div class="container mt-5">
  <div class="row" style="display: flex; justify-content: center;">

  </div>
</div>

<script src="apiKey.js"></script>
<script>

  let countries = [];
  let page = 1;
  let pageSize = 8;
  let totalPages = 1;

  const url = 'https://api-football-v1.p.rapidapi.com/v3/countries';
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
      countries = data.response;
      console.log(countries);
      showCountries();

    })
    .catch(error => {
      console.error('Error:', error);
    });


  function showCountries() {
    let startIndex = (page - 1) * pageSize;
    let endIndex = startIndex + pageSize;
    let countriestoShow = countries.slice(startIndex, endIndex);
    console.log(countriestoShow);

    document.querySelector('.row').innerHTML = "";

    countriestoShow.forEach((country) => {
      document.querySelector('.row').innerHTML += `
          <div class="mb-4 col-lg-3 col-md-4 col-sm-6" onclick="teamHop(this)" id="${country.name}" style="cursor: pointer;" >
				    <img src="${country.flag}" class="card-img-top" alt="${country.code}">
				    <div class="card-body text-center">
					    <h5 class="card-title">${country.name}</h5>
				    </div>
		    	</div>
            `;
    });

    renderPagination(countries.length);
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
      showCountries();
    
  }

  function teamHop(event) {
    console.log(event.id);
    window.location.href = 'index.php?prog=Teams.php&country=' + event.id;
  }
</script>