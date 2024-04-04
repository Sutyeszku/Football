<h1>Countries</h1>

<div class="container mt-5">
        <div class="row" style="display: flex; justify-content: center;">
            <div class="scroll container" id="scrollContainer">
                <button class="btn btn-primary m-1" id="prevBtn" onclick="prevPage()"><-</button>
                <p id="pageInfo"></p>
                <button class="btn btn-primary m-1" id="nextBtn" >-></button>
            </div>
            <div class="row" id="countryContainer"></div>
        </div>
    </div>


<script src="apiKey.js"></script>

<script>
const url = 'https://api-football-v1.p.rapidapi.com/v3/countries';
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
      throw new Error(`HTTP error! Status: ${response.status}`);
    }
    return response.json();
  })
  .then(data => {

    if (data.response && Array.isArray(data.response)) {
      const container = document.querySelector('.row');   
      const max = data.response.length;
      const start = 0;
      const end = 40;

      showCountries(data.response.slice(start,end));

      // next button
      document.getElementById("nextBtn").addEventListener("click", function(){
        showCountries(data.response.slice((start+1), (start + 40)));
        console.log("+");
        start += 40;
        if (start >= max){
          alert('No more countries to display')
          document.getElementById("next").disabled=true;
        }                
      });
      
      // previous button
      
      
                                  
          
    
      function  showCountries(countries) {     
        countries.forEach((country) => {
          container.innerHTML += `
          <div class="mb-4 col-lg-3 col-md-4 col-sm-6" onclick="teamHop(this)" id="${country.name}" style="cursor: pointer;" >
				    <img src="${country.flag}" class="card-img-top" alt="${country.code}">
				    <div class="card-body text-center">
					    <h5 class="card-title">${country.name}</h5>
				    </div>
		    	</div>
            `;
        })
      };

      showCountries(data.response.slice(0, 40));
    
      
    ///itt volt
    
      
    } else {
      throw new Error('Invalid response format');
    }
  })
  .catch(error => {
    console.error('Error:', error);
  });

function  prevPage() {
        console.log("-");
        if ((start - 40) < 0 ) {
          return false;
        } else{
          showCountries(data.response.slice((start-40),(start-1)))
          start -= 40;
        } 
}

function teamHop(event){
    console.log(event.id);
    window.location.href = 'index.php?prog=Teams.php&country=' + event.id;
}


/*
/////
      data.response.slice(0, 40).forEach(country => {
        if (country.flag) {
            console.log(country);
            container.innerHTML += `
			    <div class="mb-4 col-lg-3 col-md-4 col-sm-6" onclick="teamHop(this)" id="${country.name}" style="cursor: pointer;" >
				    <img src="${country.flag}" class="card-img-top" alt="${country.code}">
				    <div class="card-body text-center">
					    <h5 class="card-title">${country.name}</h5>
				    </div>
		    	</div>
		    `;
        }
      });
*/
</script>    